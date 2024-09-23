import React, { useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { useTranslation } from "react-i18next";
import { svCreatePost } from "../../../services/post.service";
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
import {
  LocalizationProvider,
  MobileTimePicker,
  TimePicker,
} from "@mui/x-date-pickers";
import moment from "moment";
import { height } from "@fortawesome/free-regular-svg-icons/faAddressBook";

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
  category: ",", //,
};

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
  thumbnail_name: false,
};
const thumbnailDefault = {
  thumbnail: true,
  src: "",
  file: null,
  name: null,
  remove: false,
};
const url = window.location.origin + "/";

/* Export Component */
const ModalAddPost = (props) => {
  const { t } = useTranslation("post-page");
  const { isOpen, menuList, category, totalData } = props;
  const language = useSelector((state) => state.app.language);
  const isSuperAdmin = useSelector(
    (state) => state.auth.userPermission.superAdmin
  );
  const [addData, setAddData] = useState(addDataDefault);
  const [addDataValid, setAddDataValid] = useState(addDataValidDefault);
  const [previews, setPreviews] = useState(thumbnailDefault);
  const [moreImage, setMoreImage] = useState([]);
  const [checkboxList, setCheckBoxList] = useState([]);
  const [ckValue, setCkValue] = useState("");
  const [displayDate, setDisplayDate] = useState(null);
  const [hiddenDate, setHiddenDate] = useState(null);
  const [isFetching, setIsFetching] = useState(false);
  const [textAreaValue, setTextAreaValue] = useState("");
  const [scheduleList, setScheduleList] = useState([
    { startTime: null, endTime: null, details: "" },
  ]);

  useEffect(() => {
    if (isOpen) {
      setHiddenDate(null);
      setDisplayDate(null);
      setCkValue("");
      setAddData({ ...addDataDefault, priority: totalData + 1 });
      setAddDataValid(addDataValidDefault);
      setPreviews(thumbnailDefault);
      setMoreImage([]);

      const result = category.map((d) => {
        return { ...d, checked: false };
      });
      setCheckBoxList(result);

      // console.log("result",result);
    }
  }, [isOpen]);

  // console.log("checkboxList",checkboxList);

  const setPreviewHandler = (data) => {
    if (data.file) {
      setAddData({ ...addData, thumbnail_name: data.file.name });
    }
    if (data.src === undefined) {
      setPreviews(thumbnailDefault);
    } else {
      setPreviews(data);
    }
  };

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
      },
    ]);
  };

  const setMoreImagePreviewHandler = (data) => {
    console.log("data", data);
    if (data.file === undefined) {
      const result = moreImage.filter((m, index) => index !== data.index);
      console.log("result", result);
      setMoreImage(result);
    } else {
      const result = moreImage.map((m, index) => {
        if (index === data.index) {
          m.src = data.src;
          m.file = data.file;
          m.name = data.file.name;
        }
        return m;
      });
      setMoreImage(result);
    }
  };

  const displayHandleChange = (newValue) => {
    setDisplayDate(newValue);
  };

  const hiddenHandleChange = (newValue) => {
    setHiddenDate(newValue);
  };

  const changeMoreImageData = (i, obj) => {
    const result = moreImage.map((m, index) => {
      return index === i ? obj : m;
    });
    setMoreImage(result);
  };

  const saveModalHandler = () => {
    const cateListId = checkboxList
      .filter((f) => f.checked)
      .reduce((o, n) => o + n.id + ",", ",");
    // console.log("cateListId",cateListId);
    /* Validator */
    setAddDataValid({
      ...addDataValid,
      title: addData.title === "",
      slug: addData.slug === "",
      // category: (cateListId === ","),
      description: addData.description === "",
    });

    if (addData.title === "" || addData.description === "" || isFetching) {
      //(cateListId === ",") ||
      return false;
    }

    setIsFetching(true);

    /* Prepare Data */
    const formData = new FormData();
    if (previews.file) {
      formData.append("Thumbnail", previews.file);
      formData.append("ThumbnailName", addData.thumbnail_name);
      formData.append("ThumbnailTitle", addData.thumbnail_title);
      formData.append("ThumbnailAlt", addData.thumbnail_alt);
    }
    let moreImageLength = moreImage.length;
    if (moreImageLength > 0) {
      for (let i = 0; i < moreImageLength; i++) {
        if (moreImage[i].index !== undefined) {
          formData.append(`Images[]`, moreImage[i].file);
          formData.append("ImagesName[]", moreImage[i].name);
          formData.append("ImagesTitle[]", moreImage[i].title);
          formData.append("ImagesAlt[]", moreImage[i].alt);
        }
      }
    }

    formData.append("category", ",4,"); //cateListId
    formData.append("isMainContent", addData.isMainContent ? 1 : 0);
    formData.append("title", addData.title);
    formData.append("keyword", addData.keyword);
    formData.append(
      "description",
      addData.description ? addData.description : ""
    );
    formData.append("slug", addData.slug);
    formData.append("topic", addData.topic);
    formData.append("content", ckValue);
    formData.append("redirect", addData.redirect);
    formData.append(
      "display_date",
      displayDate ? moment(displayDate).format() : null
    );
    formData.append(
      "hidden_date",
      hiddenDate ? moment(hiddenDate).format() : null
    );
    formData.append("display", addData.display ? 1 : 0);
    formData.append("pin", addData.pin ? 1 : 0);
    formData.append("priority", addData.priority);
    formData.append("language", language);

    /* Fetch Data */
    svCreatePost(formData).then((res) => {
      setIsFetching(false);
      if (res.status) {
        props.setClose(false);
        props.setRefreshData((prev) => prev + 1);
      }
      SwalUI({ status: res.status, description: res.description });
    });
  };

  return (
    <LocalizationProvider dateAdapter={AdapterMoment}>
      <Modal
        disableEnforceFocus
        open={isOpen}
        onClose={() => props.setClose(false)}
        className={"modal-add-post"}
        aria-labelledby="modal-add-post"
        aria-describedby="modal-add-post"
      >
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
              onClick={() => props.setClose(false)}
            >
              <FontAwesomeIcon icon={faXmark} />
            </IconButton>
          </div>
          <div className="modal-body overflow-scroll-custom">
            <fieldset className="modal-fieldset">
              <legend className="modal-legend">{t("ModalAddPostTitle")}</legend>

              <div className="form-details" style={{ width: "100%" }}>
                <FieldsetUI className="image-setting" label={t("ข้อมูลรูปภาพ")}>
                  <PreviewImageUI
                    className="add-image"
                    previews={previews}
                    setPreviews={setPreviewHandler}
                  />

                  <div className="image-detail">
                    <TextField
                      onChange={(e) =>
                        setAddData((prevState) => {
                          return {
                            ...prevState,
                            thumbnail_title: e.target.value,
                          };
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
                          return {
                            ...prevState,
                            thumbnail_alt: e.target.value,
                          };
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
                <h3 className="post-detail-title">{t("รายละเอียด")}</h3>
                <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, title: e.target.value };
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
                <TextField
                  onChange={(e) =>
                    setAddData((prevState) => {
                      return { ...prevState, description: e.target.value };
                    })
                  }
                  value={addData.description}
                  className="text-field-custom"
                  fullWidth={true}
                  error={addDataValid.description}
                  id="cate-description"
                  label="Description"
                  size="small"
                />

                <div className="input-date">
                  <div className="input-half pr">
                    <DateTimePicker
                      className="date-input"
                      size="small"
                      label={t("ModalDateDisplay")}
                      value={displayDate}
                      onChange={displayHandleChange}
                      renderInput={(params) => <TextField {...params} />}
                    />
                  </div>
                  <div className="input-half pl">
                    <DateTimePicker
                      className="date-input"
                      sx={{ width: 250 }}
                      label={t("ModalDateHidden")}
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
                        value={schedule.startTime}
                        onChange={(newValue) =>
                          handleChangeSchedule(index, "startTime", newValue)
                        }
                        renderInput={(params) => <TextField {...params} />}
                      />
                    </div>
                    <div className="input-half pl">
                      <MobileTimePicker
                        className="date-input"
                        sx={{ width: 250 }}
                        label={t("End Time")}
                        value={schedule.endTime}
                        onChange={(newValue) =>
                          handleChangeSchedule(index, "endTime", newValue)
                        }
                        renderInput={(params) => <TextField {...params} />}
                      />
                    </div>
                    <div className="input-half pll">
                      <TextField
                        className="date-input"
                        label={t("รายระเอียด")}
                        placeholder={t("Enter details")}
                        multiline
                        minRows={1}
                        value={schedule.details}
                        onChange={(e) =>
                          handleChangeSchedule(index, "details", e.target.value)
                        }
                        variant="outlined"
                        fullWidth
                        style={{ width: "100%" }}
                      />
                    </div>
                  </div>
                ))}

                <h3 className="post-detail-title">{t("การแสดงผล")}</h3>
                <div className="setting-controls">
                  <div className="switch-form">
                    <FormGroup>
                      <FormControlLabel
                        control={
                          <Switch
                            onChange={(e) =>
                              setAddData({
                                ...addData,
                                display: e.target.checked,
                              })
                            }
                            checked={addData.display}
                          />
                        }
                        label={t("แสดงบนเว็บไซต์")}
                        labelPlacement="start"
                      />
                    </FormGroup>
                  </div>
                  <div className="switch-form">
                    <FormGroup>
                      <FormControlLabel
                        control={
                          <Switch
                            onChange={(e) =>
                              setAddData({ ...addData, pin: e.target.checked })
                            }
                            checked={addData.pin}
                          />
                        }
                        label={t("ปักหมุด")}
                        labelPlacement="start"
                      />
                    </FormGroup>
                  </div>

                  <div className="switch-form">
                    <FormGroup>
                      <FormControlLabel
                        control={
                          <Switch
                            onChange={(e) =>
                              setAddData({ ...addData, pin: e.target.checked })
                            }
                            checked={addData.pin}
                          />
                        }
                        label={t("ห้อง 1")}
                        labelPlacement="start"
                      />
                    </FormGroup>
                  </div>
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
              onClick={saveModalHandler}
            >
              {t("บันทึก")}
            </ButtonUI>
            <ButtonUI
              className="btn-cancel"
              on="cancel"
              width="md"
              onClick={() => props.setClose(false)}
            >
              {t("ยกเลิก")}
            </ButtonUI>
          </div>
        </Box>
      </Modal>
    </LocalizationProvider>
  );
};

export default ModalAddPost;
