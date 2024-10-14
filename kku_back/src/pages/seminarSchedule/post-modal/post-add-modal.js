import React, { useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { useTranslation } from "react-i18next";
import { svCreateSchedule } from "../../../services/post.service";
import ButtonUI from "../../../components/ui/button/button";
import PreviewImageUI from "../../../components/ui/preview-image/preview-image";
import FieldsetUI from "../../../components/ui/fieldset/fieldset";
import SwalUI from "../../../components/ui/swal-ui/swal-ui";
import CheckBoxUI from "../../../components/ui/check-box/check-box";
import CKeditorComponent from "../../../components/ui/ckeditor/ckeditor";

import "./post-add-modal.scss";
import Box from "@mui/material/Box";
import Modal from "@mui/material/Modal";
import IconButton from "@mui/material/IconButton";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faAdd, faMinus, faXmark } from "@fortawesome/free-solid-svg-icons";
import { FormControlLabel, FormGroup, Switch, TextField } from "@mui/material";
import { DateTimePicker } from "@mui/x-date-pickers/DateTimePicker";
import { AdapterMoment } from "@mui/x-date-pickers/AdapterMoment";
import { LocalizationProvider, MobileTimePicker } from "@mui/x-date-pickers";
import moment from "moment";
import Checkbox from '@mui/material/Checkbox';

const addDataDefault = {
  id: null,
  thumbnail: "",
  thumbnail_name: "",
  thumbnail_title: "",
  thumbnail_alt: "",
  title: "",
  keyword: "",
  description: "",
  topic: "",
  slug: "",
  redirect: "",
  priority: 1,
  display: true,
  pin: false,
  isMainContent: false,
  language: "",
  category: "," //,
}

const addDataValidDefault = {
  category: false,
  formValid: false,
  thumbnail_title: false,
  thumbnail_alt: false,
  title: false,
  keyword: false,
  description: false,
  slug: false,
  redirect: false,
  isMainContent: false,
  thumbnail_name: false
}
const thumbnailDefault = { thumbnail: true, src: "", file: null, name: null, remove: false }
const url =  window.location.origin + "/";

/* Export Component */
const ModalAddPost = (props) => {
  const { t } = useTranslation('post-page')
  const { isOpen, menuList, category, totalData, dataRoom } = props
  const language = useSelector(state => state.app.language)
  const isSuperAdmin = useSelector(state => state.auth.userPermission.superAdmin)
  const [ addData , setAddData ] = useState(addDataDefault)
  const [ addDataValid , setAddDataValid ] = useState(addDataValidDefault)
  const [previews, setPreviews] = useState(thumbnailDefault);
  const [moreImage, setMoreImage] = useState([]);
  const [checkboxList, setCheckBoxList] = useState([]);
  const [ckValue, setCkValue ] = useState("")
  const [displayDate, setDisplayDate] = useState(null);
  const [hiddenDate, setHiddenDate] = useState(null); 
  const [isFetching, setIsFetching] = useState(false);
  const [scheduleList, setScheduleList] = useState([
    { startTime: null, endTime: null, details: "" },
  ]);
  const [checkedRooms, setCheckedRooms] = useState([]);
  const [openModal, setOpenModal] = useState(false); // state สำหรับเปิด/ปิด modal
  const [currentSchedule, setCurrentSchedule] = useState(null);
  const handleOpenModal = (index) => {
    setCurrentSchedule(index);  // เก็บ index ของ schedule ที่คลิก
    setOpenModal(true);         // เปิด Modal
  };
  const handleCloseModal = () => setOpenModal(false);

  useEffect(() => {
    if(isOpen) {
      setHiddenDate(null)
      setDisplayDate(null)
      setCkValue("")
      setAddData({...addDataDefault, priority: totalData + 1})
      setAddDataValid(addDataValidDefault)
      setPreviews(thumbnailDefault)
      setMoreImage([])
      
      const result = category.map(d =>  {
        return { ...d, checked: false }
      })
      setCheckBoxList(result) 

      // console.log("result",result);
    }
  }, [isOpen])

  // console.log("checkboxList",checkboxList);
  const handleAddSchedule = () => {
    setScheduleList([
      ...scheduleList,
      { startTime: null, endTime: null, details: "" },
    ]);
  };

  const handleChangeSchedule = (index, field, value) => {
    const newList = [...scheduleList];
    newList[index][field] = value;
    setScheduleList(newList);
  };
  const handleRemoveSecondRow = () => {
    // if (scheduleList.length > 1) {
      const newList = scheduleList.filter((_, i) => i !== 1);
      setScheduleList(newList);
    // }
  };

  const setPreviewHandler = (data) => {
    if(data.file) {
      setAddData({...addData, thumbnail_name: data.file.name})
    }
    if(data.src === undefined){
      setPreviews(thumbnailDefault)
    } else {
      setPreviews(data)
    }
  }

  const addMoreImage = (data) => { 
    setMoreImage([
      ...moreImage,
      { 
        src: data.src, 
        file: data.file, 
        name: data.file.name, 
        index: moreImage.length,
        remove: true,
        title: "", 
        alt: "",
      }
    ])
  }
  
  const setMoreImagePreviewHandler = (data) => {
    console.log("data",data);
    if(data.file === undefined) {
      const result = moreImage.filter((m, index) => (index !== data.index))
      console.log("result",result);
      setMoreImage(result)
    
    } else {
      const result = moreImage.map((m, index) => {
        if(index === data.index) {
          m.src = data.src;
          m.file = data.file;
          m.name = data.file.name;
        }
        return m
      })
      setMoreImage(result)
    }
   
  }

  const displayHandleChange = (newValue) => {
    setDisplayDate(newValue);
  }
  
  const hiddenHandleChange = (newValue) => {
    setHiddenDate(newValue);
  }
  
  const changeMoreImageData = (i, obj) => { 
    const result = moreImage.map((m, index) => {
      return (index === i)?obj:m;
    })
    setMoreImage(result)
  }

  const handleCheckboxChange = (roomId) => {
    setCheckedRooms((prevCheckedRooms) => {
      if (prevCheckedRooms.includes(roomId)) {
        return prevCheckedRooms.filter((id) => id !== roomId);
      } else {
        return [...prevCheckedRooms, roomId];
      }
    });
  };

  const handleCKEditorChange = (index, value) => {
    handleChangeSchedule(index, "details", value); // อัปเดตค่า description ของ schedule ใน scheduleList
  };
 
  const saveModalHandler = () => {
    // console.log(JSON.stringify(scheduleList))
    // return false;
    const cateListId = checkboxList.filter(f => (f.checked)).reduce((o,n) => o + n.id + ",",",")
    // console.log("cateListId",cateListId);
    /* Validator */
    setAddDataValid({
      ...addDataValid, 
      title: (addData.title === ""),
      slug: (addData.slug === ""),
      // category: (cateListId === ","),
      description: (addData.description === "")
    })

    if((addData.title === "") || (addData.description === "") || isFetching){ //(cateListId === ",") || 
      return false;
    }

    setIsFetching(true)
    
    /* Prepare Data */
    const formData = new FormData();
    if(previews.file) { 
      formData.append('Thumbnail', previews.file)
      formData.append('ThumbnailName', addData.thumbnail_name)
      formData.append('ThumbnailTitle', addData.thumbnail_title)
      formData.append('ThumbnailAlt', addData.thumbnail_alt)
    }
    let moreImageLength = moreImage.length
    if(moreImageLength > 0 ) {
      for(let i=0; i < moreImageLength; i++) {
        if(moreImage[i].index !== undefined){
          formData.append(`Images[]`, moreImage[i].file)
          formData.append("ImagesName[]", moreImage[i].name)
          formData.append("ImagesTitle[]", moreImage[i].title)
          formData.append("ImagesAlt[]", moreImage[i].alt)
        }
      }
    }

    formData.append('category', ",4,") //cateListId
    formData.append('isMainContent', (addData.isMainContent)?1:0)
    formData.append('title', addData.title)
    formData.append('keyword', addData.keyword)
    formData.append('description', (addData.description?addData.description:""))
    formData.append('slug', addData.slug)
    formData.append('topic', addData.topic)
    formData.append('content', ckValue)
    formData.append('redirect', addData.redirect)
    formData.append('display_date', displayDate?moment(displayDate).format():null)
    formData.append('hidden_date', hiddenDate?moment(hiddenDate).format():null) 
    formData.append('display', (addData.display)?1:0)
    formData.append('pin', (addData.pin)?1:0)
    formData.append('priority', addData.priority)
    formData.append('language', language)
    formData.append('schedulelist', JSON.stringify(scheduleList))
    formData.append('open_room', JSON.stringify(checkedRooms))
    
    /* Fetch Data */
    svCreateSchedule(formData).then(res => {
      setIsFetching(false)
      if(res.status) {
        props.setClose(false)
        props.setRefreshData(prev => prev + 1)
      }
      SwalUI({status: res.status, description: res.description})
    })
  } 

  return (
    <LocalizationProvider dateAdapter={AdapterMoment}>
      <Modal
        disableEnforceFocus
        open={isOpen}
        onClose={() => props.setClose(false)}
        className={"modal-add-post"}
        aria-labelledby="modal-add-post"
        aria-describedby="modal-add-post" > 
        <Box className="modal-custom">
          <div className="modal-header">
            <h2>
              <FontAwesomeIcon icon={faAdd} />
              <span>{t("เพิ่มโพส")}</span>
            </h2>
            <IconButton
              className="param-generator"
              color="error"
              sx={{ p: "10px" }}
              onClick={() => props.setClose(false)} >
              <FontAwesomeIcon icon={faXmark} />
            </IconButton>
          </div>
          <div className="modal-body overflow-scroll-custom">
            <fieldset className="modal-fieldset">
              <legend className="modal-legend">{t("ModalAddPostTitle")}</legend>
              {/* <CheckBoxUI 
                className="cate-menu-list" 
                error={addDataValid.category}
                menuList={menuList}
                data={checkboxList}
                setData={setCheckBoxList} 
                t={t} /> */}

              <div className="form-details" style={{width: "100%"}}>
                <FieldsetUI className="image-setting" label={t("ข้อมูลรูปภาพ")}>
                  <PreviewImageUI
                    className="add-image" 
                    previews={previews}
                    setPreviews={setPreviewHandler} />
                    
                  <div className="image-detail">
                    {/* <TextField
                      onChange={(e) =>
                        setAddData((prevState) => {
                          return { ...prevState, thumbnail_name: e.target.value }
                        })
                      }
                      value={addData.thumbnail_name}
                      className="text-field-custom"
                      fullWidth={true}
                      error={addDataValid.thumbnail_name}
                      id="image-name"
                      label="Image name"
                      size="small"
                    /> */}
                    <TextField
                      onChange={(e) =>
                        setAddData((prevState) => {
                          return { ...prevState, thumbnail_title: e.target.value }
                        })
                      }
                      value={addData.thumbnail_title}
                      className="text-field-custom"
                      fullWidth={true}
                      error={addDataValid.thumbnail_title} 
                      id="image-title"
                      label="Image title"
                      size="small"
                    />
                    <TextField
                      onChange={(e) =>
                        setAddData((prevState) => {
                          return { ...prevState, thumbnail_alt: e.target.value }
                        })
                      }
                      value={addData.thumbnail_alt}
                      className="text-field-custom"
                      fullWidth={true}
                      error={addDataValid.thumbnail_alt}
                      id="image-tag"
                      label="Alt description"
                      size="small"
                    />
                  </div>

                </FieldsetUI>
                {/* <FieldsetUI className="more-image-setting" label={t("รูปภาพเพิ่มเติม")}>
            
                  {moreImage.map((m, index ) =>  (
                    <div className="image-control" key={index}>
                      <PreviewImageUI
                        className="add-more-image" 
                        previews={{src: m.src, file: m.file, index, remove: true }}
                        setPreviews={setMoreImagePreviewHandler} 
                      />
                      <div className="image-detail">
                          <TextField
                            onChange={(e) => changeMoreImageData(index, {...m, name: e.target.value})}
                            value={m.name}
                            className="text-field-custom"
                            fullWidth={true}
                            id={`image-name-${index}`}
                            label={`Image Name ${index + 1}`}
                            size="small"
                          />
                          <TextField
                              onChange={(e) => changeMoreImageData(index, {...m, title: e.target.value})}
                              value={m.title}
                              className="text-field-custom"
                              fullWidth={true}
                              error={addDataValid.thumbnail_title} 
                              id="image-title"
                              label="Image title"
                              size="small"
                          />
                          <TextField
                              onChange={(e) => changeMoreImageData(index, {...m, alt: e.target.value})}
                              value={m.alt}
                              className="text-field-custom"
                              fullWidth={true}
                              error={addDataValid.thumbnail_alt}
                              id="image-tag"
                              label="Alt description"
                              size="small"
                          />
                      </div>
                    </div>
                  ))}

                  <div className="image-control" >
                    <PreviewImageUI
                      srcError={"/images/add-image.jpg"}
                      className="add-image" 
                      previews={{src: "", file: "", remove: false}}
                      setPreviews={addMoreImage} 
                    />
                  </div>

                </FieldsetUI> */}
                <h3 className="post-detail-title">{t("รายละเอียด")}</h3>
                <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, title: e.target.value }
                    })
                  }
                  value={addData.title}
                  className="text-field-custom"
                  fullWidth={true}
                  error={addDataValid.title}
                  id="cate-title"
                  label="Title"
                  size="small"
                />
                {/* <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, keyword: e.target.value }
                    })
                  }
                  value={addData.keyword}
                  className="text-field-custom"
                  fullWidth={true}
                  error={addDataValid.keyword}
                  id="cate-keyword"
                  label="Keyword"
                  size="small"
                /> */}
                <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, description: e.target.value }
                    })
                  }
                  value={addData.description}
                  className="text-field-custom"
                  fullWidth={true}
                  error={addDataValid.description}
                  id="cate-description"
                  label="Description"
                  size="small"
                  multiline
                  minRows={2}
                />
                {/* <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, slug: e.target.value }
                    })
                  }
                  placeholder="slug/example"
                  value={addData.slug}
                  className="text-field-custom"
                  fullWidth={true}
                  error={addDataValid.slug}
                  id="cate-url"
                  label={url}
                  size="small"
                /> */}
                {/* <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, topic: e.target.value }
                    })
                  }
                  placeholder="Topic Name"
                  value={addData.topic}
                  className="text-field-custom"
                  fullWidth={true}
                  error={addDataValid.topic}
                  id="inp-topic"
                  label="Topic"
                  size="small"
                /> */}
                {/* <div style={{marginTop: "1rem"}} className="ck-content">
                  <label className="ck-add-post">Content</label>
                  <CKeditorComponent
                    ckNameId="ck-add-post"
                    value={ckValue} 
                    onUpdate={setCkValue} 
                  />
                </div> */}
                {/* <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, redirect: e.target.value }
                    })
                  }
                  placeholder="Link Url"
                  value={addData.redirect}
                  className="text-field-custom"
                  fullWidth={true}
                  error={addDataValid.redirect}
                  id="cate-redirect"
                  label="Redirect"
                  size="small"
                /> */}

                <div className="input-date">
                  <div className="input-half pr">
                    <DateTimePicker
                      className="date-input"
                      size="small"
                      label={t("Date Display")}
                      value={displayDate}
                      onChange={displayHandleChange}
                      renderInput={(params) => <TextField {...params} />}
                    />
                  </div>
                  <div className="input-half pl">
                    <DateTimePicker
                      className="date-input"
                      sx={{ width: 250 }}
                      label={t("Date Hidden")}
                      value={hiddenDate}
                      onChange={hiddenHandleChange}
                      renderInput={(params) => <TextField {...params} />}
                    />
                  </div>
                </div>

                <div className="seminar-schedule">
                  <h3 className="post-title">{t("ตารางสัมมนา")}</h3>
                  <div className="add-seminar" onClick={handleAddSchedule}>
                    <FontAwesomeIcon icon={faAdd} />
                    <p>เพิ่มตาราง</p>
                  </div>{" "}
                </div>

                {scheduleList.map((schedule, index) => (
                  <div className="input-time" key={index}>
                    <div className="input-half pr">
                      <MobileTimePicker
                        className="date-input"
                        size="small"
                        label={t("Start Time")}
                        value={schedule.startTime ? new Date(`1970-01-01T${schedule.startTime}`) : null}
                        onChange={(newValue) => {
                          const dateValue = newValue instanceof Date ? newValue : new Date(newValue);
                          handleChangeSchedule(index, "startTime", dateValue.toLocaleTimeString('en-GB', { hour12: false })) // แปลงเป็น HH:mm:ss
                        }}              
                        renderInput={(params) => <TextField {...params} />}
                      />
                    </div>
                    <div className="input-half pl">
                      <MobileTimePicker
                        className="date-input"
                        sx={{ width: 250 }}
                        label={t("End Time")}
                        value={schedule.endTime ? new Date(`1970-01-01T${schedule.endTime}`) : null}
                        onChange={(newValue) => {
                          const dateValue = newValue instanceof Date ? newValue : new Date(newValue);
                          handleChangeSchedule(index, "endTime", dateValue.toLocaleTimeString('en-GB', { hour12: false })) // แปลงเป็น HH:mm:ss
                        }}
                        renderInput={(params) => <TextField {...params} />}
                      />
                    </div>
                    <div className="input-half pll">
                    <TextField
                        className="date-input"
                        label={t("รายระเอียด")}
                        placeholder={t("Enter details")}
                        multiline
                        rows={2}
                        value={schedule.details}
                        // onChange={(e) =>
                        //   handleChangeSchedule(index, "details", e.target.value)
                        // }
                        variant="outlined"
                        fullWidth
                        style={{ width: "100%" }}
                        onClick={() => handleOpenModal(index)} // เมื่อคลิกที่ TextField จะเปิด Modal
                        InputProps={{
                          readOnly: true, // กำหนดให้ TextField เป็นแบบอ่านอย่างเดียว
                        }} 
                      />

                      <Modal
                        open={openModal} // เปิด Modal เมื่อ openModal เป็น true
                        onClose={handleCloseModal} // ปิด Modal เมื่อคลิกข้างนอก
                      >
                        <div className="modal-container">
                          {" "}
                          {/* เพิ่ม container เพื่อจัดกลางจอ */}
                          <div className="ck-input">
                            <div className="modal-header">
                              <h2 className="flex items-center">
                                {" "}
                                {/* ใช้ flex เพื่อจัดเรียง */}
                                <FontAwesomeIcon
                                  icon={faAdd}
                                  className="mr-2"
                                />{" "}
                                {/* เว้นระยะห่าง */}
                                <span>{t("เพิ่มรายละเอียด")}</span>
                              </h2>
                              <IconButton
                                className="param-generator"
                                color="error"
                                sx={{ p: "10px" }}
                                onClick={handleCloseModal}
                              >
                                <FontAwesomeIcon icon={faXmark} />
                              </IconButton>
                            </div>

                            <div className="ck-content" style={{ marginTop: "1rem" }}>
                              {currentSchedule !== null && (
                                <CKeditorComponent
                                  ckNameId="ck-add-post"
                                  value={scheduleList[currentSchedule].details}  // แสดง description ตาม schedule ที่คลิก
                                  onUpdate={(value) => handleCKEditorChange(currentSchedule, value)}  // เรียกฟังก์ชัน handleCKEditorChange เมื่อ CKEditor เปลี่ยนค่า
                                />
                              )}
                            </div>

                            <div className="modal-footer">
                              <ButtonUI
                                onClick={handleCloseModal}
                                className="btn-save"
                                on="save"
                                width="md"
                              >
                                {t("ยืนยัน")}
                              </ButtonUI>
                              {/* <ButtonUI
                                className="btn-cancel"
                                on="cancel"
                                width="md"
                                onClick={handleCloseModal}
                              >
                                {t("ยกเลิก")}
                              </ButtonUI> */}
                            </div>
                          </div>
                        </div>
                      </Modal>



                      {/* {index !== 0 && ( */}
                      <IconButton
                        className="param-generator"
                        color="error"
                        sx={{ p: "10px" }}
                        onClick={handleRemoveSecondRow}
                      >
                        <FontAwesomeIcon icon={faXmark} />
                      </IconButton>
                       {/* )} */}
                    </div>
                  </div>
                ))}

                <h3 className="post-detail-title">{t("ห้องสัมมนา")}</h3>
                <div className="setting-controls" style={{ border: '1px solid #e5e7eb', borderRadius: '4px', padding: '0 0.5rem' }}>
                  {dataRoom.map((room) => (
                    <div key={room.id} style={{ padding: '0 1rem'}}>
                      <FormControlLabel
                        control={
                          <Checkbox
                            checked={checkedRooms.includes(room.id)} // ตรวจสอบว่า roomId อยู่ใน array checkedRooms หรือไม่
                            onChange={() => handleCheckboxChange(room.id)} // เรียกฟังก์ชันเมื่อมีการเปลี่ยนแปลง
                            color="primary"
                          />
                        }
                        label={room.title}
                      />
                    </div>
                  ))}
                </div>

                <h3 className="post-detail-title">{t("การแสดงผล")}</h3>
                <div className="setting-controls">
                  <div className="switch-form">
                    <FormGroup>
                      <FormControlLabel  control={<Switch onChange={(e) => setAddData({...addData, display: e.target.checked})} checked={addData.display} />} label={t("แสดงบนเว็บไซต์")} labelPlacement="start" />
                    </FormGroup>
                  </div>
                  <div className="switch-form">
                    <FormGroup>
                      <FormControlLabel  control={<Switch onChange={(e) => setAddData({...addData, pin: e.target.checked})} checked={addData.pin} /> }  label={t("ปักหมุด")}  labelPlacement="start" />
                    </FormGroup>
                  </div>
                  {/* {isSuperAdmin && (
                    <div className="switch-form">
                      <FormGroup>
                        <FormControlLabel  control={<Switch onChange={(e) => setAddData({...addData, isMainContent: e.target.checked})} checked={addData.isMainContent} /> }   label="หัวข้อหลัก" labelPlacement="start" />
                      </FormGroup>
                    </div>
                  )} */}
              
                  {/* <div className="input-group">
                    <div className="inp"> 
                      <ButtonUI
                        color="error"
                        onClick={(e) => (addData.priority > 1)?setAddData({...addData, priority: addData.priority - 1}):""} >
                        <FontAwesomeIcon icon={faMinus} />
                      </ButtonUI>
                      <span className="title">
                        {t("ความสำคัญ")} {addData.priority}
                      </span>
                      <ButtonUI onClick={(e) => setAddData({...addData, priority: addData.priority + 1}) }>
                        <FontAwesomeIcon icon={faAdd} />
                      </ButtonUI>
                    </div>
                  </div> */}
                </div>
              </div>
            </fieldset>
          </div>
          <div className="modal-footer">
            <ButtonUI
              loader={true}
              isLoading={isFetching}
              className="btn-save"
              on="save"
              width="md"
              onClick={saveModalHandler} >
              {t("บันทึก")}
            </ButtonUI>
            <ButtonUI
              className="btn-cancel"
              on="cancel"
              width="md" 
              onClick={()=>props.setClose(false)}>
              {t("ยกเลิก")}
            </ButtonUI>
          </div>
        </Box>
      </Modal>
    </LocalizationProvider>
  )
}

export default ModalAddPost;
