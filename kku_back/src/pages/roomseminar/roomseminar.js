import React, { useState, useEffect } from 'react'
import { useTranslation } from "react-i18next";
import HeadPageComponent from '../../components/layout/headpage/headpage'
import {
  faAdd,
  faImages,
  faRedo,
  faNewspaper,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import './roomseminar.scss';
import { svGetRoomSeminar } from '../../services/roomseminar.service';
import RoomTab from './room-tab/room-tab';

export default function RoomSeminar() {
  const { t } = useTranslation(["post-page"]);
  const [roomSeminar, setRoomSeminar] = useState([]);
  useEffect(() => {
    svGetRoomSeminar().then((res) => {
      setRoomSeminar(res.data.data)
    })
  }, [])
  return (
    <section id="post-page">
      <HeadPageComponent
        h1={t("จัดการห้องสัมมนา")}
        icon={<FontAwesomeIcon icon={faNewspaper} />}
        breadcrums={[{ title: t("จัดการห้องสัมมนา"), link: false }]}
      />
      <div className="card-control fixed-width">
        {
          roomSeminar.map((room) => (
            <div>{room.title}</div>
          ))
        }
        <RoomTab 
          dataRoom={roomSeminar} 
        />
      </div>
    </section>
  )
}
