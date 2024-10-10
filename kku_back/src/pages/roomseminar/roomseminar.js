import React, { useState, useEffect } from "react";
import { useTranslation } from "react-i18next";
import HeadPageComponent from "../../components/layout/headpage/headpage";
import {
  faAdd,
  faImages,
  faRedo,
  faNewspaper,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import "./roomseminar.scss";
import RoomTab from "./room-tab/room-tab";
import { useDispatch, useSelector } from "react-redux";
import ButtonUI from "../../components/ui/button/button";
import ContentFormatButton from "../../components/ui/toggle-format/toggle-format";
import PostTab from "../seminarSchedule/post-tab/post-tab";
import { appActions } from "../../store/app-slice";
import { getMenuList, getPosts } from "../../services/post.service";
import { svGetRoomSeminar } from "../../services/roomseminar.service";

export default function RoomSeminar() {
  const dispatch = useDispatch();
  const { t } = useTranslation(["post-page"]);
  const [roomSeminar, setRoomSeminar] = useState([]);
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
  const isAdmin = useSelector((state) => state.auth.userPermission.admin);

  useEffect(() => {
    setPostData([]);
    dispatch(appActions.isSpawnActive(true));
    svGetRoomSeminar().then((res) => {
      setPostData(res.data.data);
      dispatch(appActions.isSpawnActive(false));
    });
  }, [refreshData]);

  const filteredData = postData.filter((post) => {
    const matchesName = selectedPostName
      ? post.title === selectedPostName
      : true;
    const matchesCate = selectedCateId
      ? post.category.split(",")[1] === selectedCateId.toString()
      : true;
    return matchesName && matchesCate;
  });

  return (
    <section id="post-page">
      <HeadPageComponent
        h1={t("จัดการห้องสัมมนา")}
        icon={<FontAwesomeIcon icon={faNewspaper} />}
        breadcrums={[{ title: t("จัดการห้องสัมมนา"), link: false }]}
      />
      <div className="card-control fixed-width">
        <div style={{ paddingBottom: "0" }} className="card-head">
          <div className="head-action">
            <h2 className="head-title">
              <ButtonUI
                onClick={() => setRefreshData(refreshData + 1)}
                on="create"
                isLoading={false}
                icon={<FontAwesomeIcon icon={faRedo} />}
              >
                {t("ดึงข้อมูล")}
              </ButtonUI>
            </h2>
            <ContentFormatButton
              isRowDisplay={isRowDisplay}
              setIsRowDisplay={setIsRowDisplay}
            />
            {(isSuerperAdmin || isAdmin) && (
              <ButtonUI
                onClick={() => setPostModalAdd(true)}
                className="btn-add-post"
                on="create"
                icon={<FontAwesomeIcon icon={faAdd} />}
              >
                {t("เพิ่มโพส")}
              </ButtonUI>
            )}
          </div>
        </div>
        {/* {
          roomSeminar.map((room) => (
            <div>{room.title}</div>
          ))
        } */}
        {/* <RoomTab 
          dataRoom={roomSeminar} 
        /> */}
        <RoomTab
          postModalAdd={postModalAdd}
          setPostModalAdd={setPostModalAdd}
          setRefreshData={() => setRefreshData(refreshData + 1)}
          pageControl={pageControl}
          category={category}
          setCategory={setCategory}
          menuList={menuList}
          postTab={postTab}
          setPostTab={setPostTab}
          postData={filteredData}
          isRowDisplay={isRowDisplay}
        />
      </div>
    </section>
  );
}
