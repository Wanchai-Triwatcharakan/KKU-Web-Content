import React, { useEffect, useState } from "react";
import HeadPageComponent from "../../components/layout/headpage/headpage";
import { useTranslation } from "react-i18next";
import './lecture.scss';
import LectureTab from "./lecture-tab/LectureTab";
import {
  faAdd,
  faImages,
  faRedo,
  faPersonHarassing,
  faNewspaper,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import ButtonUI from "../../components/ui/button/button";
import {
  Autocomplete,
  FormControl,
  InputLabel,
  MenuItem,
  Select,
  TextField,
} from "@mui/material";
import { useDispatch, useSelector } from "react-redux";
import ContentFormatButton from "../../components/ui/toggle-format/toggle-format";
import { getMenuList, getPosts } from "../../services/post.service";
import { svGetLecture } from "../../services/lecturer.service";
import { appActions } from "../../store/app-slice";

export default function Lecturer() {

  const dispatch = useDispatch();
  const { t } = useTranslation(["post-page"]);
  const pageAvailable = useSelector(
    (state) => state.app.frontOffice.pageAvailable
  );
  const language = useSelector((state) => state.app.language);
  const [postTab, setPostTab] = useState("0");
  const [isRowDisplay, setIsRowDisplay] = useState(false);
  const [postData, setPostData] = useState([]);
  const [pageControl, setPageControl] = useState("");
  const [menuList, setMenuList] = useState([]);
  const [category, setCategory] = useState([]);
  const [refreshData, setRefreshData] = useState(0);
  const [postModalAdd, setPostModalAdd] = useState(false);
  const [selectedPostName, setSelectedPostName] = useState(undefined);
  const [selectedCateId, setSelectedCateId] = useState(0);
  const isSuerperAdmin = useSelector(
    (state) => state.auth.userPermission.superAdmin
  );

  const [dataLecture, setDataLecture] = useState([]);

  useEffect(() => {
    getMenuList(language).then((res) => {
      if (res.status) {
        let arr = [];
        for (let obj of res.category) {
          arr[`${obj.id}`] = {
            id: obj.id,
            title: obj.cate_title,
            language: obj.language,
            level: obj.cate_level,
            rootId: obj.cate_root_id,
            parentId: obj.cate_parent_id,
            checked: false,
          };
        }
        setCategory(arr);
        setMenuList(res.menu);
      }
    });
  }, [language]);

  useEffect(() => {
    setPostData([]);
    dispatch(appActions.isSpawnActive(true));
    getPosts(language).then((res) => {
      if (res.status) {
        setPostData(res.data);
      }
      dispatch(appActions.isSpawnActive(false));
    });
  }, [refreshData, language]);

  const filteredData = postData.filter((post) => {
    const matchesName = selectedPostName
      ? post.title === selectedPostName
      : true;
    const matchesCate = selectedCateId
      ? post.category.split(",")[1] === selectedCateId.toString()
      : true;
    return matchesName && matchesCate;
  });

  useEffect(() => {
    svGetLecture().then((res) => {
      // console.log(res)
      setDataLecture(res.data.data)
    })
  }, [])

  return (
    <section>
      <HeadPageComponent
        h1={t("วิทยากร")}
        icon={<FontAwesomeIcon icon={faPersonHarassing} />}
        breadcrums={[{ title: t("วิทยากร"), link: false }]}
      />
      <div className="card-control fixed-width">
        <LectureTab 
          postModalAdd={postModalAdd}
          setPostModalAdd={setPostModalAdd}
          setRefreshData={() => setRefreshData(refreshData + 1)}
          pageControl={pageControl}
          category={category}
          setCategory={setCategory}
          menuList={menuList}
          postTab={postTab}
          setPostTab={setPostTab}
          postData={dataLecture}
          isRowDisplay={isRowDisplay}
        />
      </div>
    </section>
  )
}
