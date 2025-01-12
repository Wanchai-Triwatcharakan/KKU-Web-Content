import React, { Fragment, useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { appActions } from "../../../store/app-slice";
import { authActions } from "../../../store/auth-slice";
import { useTranslation } from "react-i18next";

import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import "./sidebar.scss";
import {
  faCaretDown,
  faListOl,
  faSignsPost,
  faSitemap,
  faNewspaper,
  faGamepad,
  faBoxOpen,
  faImages,
  faTools,
  faLanguage,
  faUserShield,
  faCircleInfo,
  faStreetView,
  faInbox,
  faComments,
  faFileCsv,
  faHome,
  faIcons,
  faPersonHarassing,
  faEnvelope,
  faShoppingCart,
  faBars,
  faCube,
  faAddressBook,
  faHouseUser,
  faBook,
  faHotel,
  faTable,
  faPeopleRoof,
  faImage,
} from "@fortawesome/free-solid-svg-icons";
import { Button } from "@mui/material";
import NavLink from "./navlink";
import { Link } from "react-router-dom";

const SidebarComponent = (props) => {
  const { t, i18n } = useTranslation("sidebar");

  const dispatch = useDispatch();
  const uPermission = useSelector((state) => state.auth.userPermission);
  const selectedLanguage = useSelector((state) => state.app.language);
  const webPath = useSelector((state) => state.app.webPath);
  const activateLanguage = useSelector((state) => state.auth.activateLanguage);
  const pagesAllow = useSelector((state) => state.app.pages);
  const uploadPath = useSelector((state) => state.app.uploadPath);
  const isDevMode = useSelector((state) => state.app.isDevMode);

  const languageSelectHandler = (lang) => {
    i18n.changeLanguage(lang);
    dispatch(appActions.changeLanguage(lang));
  };

  const toggleSubMenu = (event) => {
    const subMenu = event.target.closest(".has-child");
    subMenu.classList.toggle("opened");
  };

  const closeSidebarhandler = (e) => {
    /* ย่อแถบทำงานเฉพาะ width < 768 */
    let elRoot = document.querySelector("#root");
    if (elRoot && elRoot.offsetWidth <= 900) {
      props.collapseHandler(true);
    }
  };

  const openManual = () => {
    const version = Math.floor(Date.now() / 1000);
    const url = `${uploadPath}upload/manual/manual.pdf?v=${version}`;
    window.open(url, "_blank");
  };

  return (
    <aside className="aside">
      <nav>
        <Link className="sidenav-header" to="/">
          <figure
            style={{ background: "#fff", borderRadius: "100%" }}
            className="figure-image"
          >
            <img
              // src="https://berdedd.com/backend/images/Logo-Wynnsoft-Management.png"
              src="/images/logo.png"
              className="website-logo"
            />
          </figure>
          <div className="website-powerby">
            <p>HHP&HP</p>
            <p className="sub-website">{t("Managements")}</p>
          </div>
        </Link>

        <hr className="line-section" />
        <div className="title-section">{t("จัดการภาษา")}</div>
        <div className="language-selection">
          {activateLanguage.map((lang) => (
            <Button
              variant="outlined"
              key={lang}
              onClick={(e) => languageSelectHandler(lang)}
              className={`btn-lang ${
                lang.toLowerCase() === selectedLanguage.toLowerCase()
                  ? "selected"
                  : ""
              }`}
            >
              {lang}
            </Button>
          ))}
        </div>

        {/* <hr className="line-section gap " /> */}
        <div className="sidenav-main">
          {pagesAllow.groups.category && (
            <Fragment>
              <hr className="line-section gap" />
              <ul className="nav-menu">
                <div className="title-section">
                  {t("จัดการหมวดหมู่ (เมนู)")}
                </div>
                <li className="menu-link has-child opened">
                  <a
                    className={`navlink `}
                    title={t("ProductsTitleMenu")}
                    onClick={toggleSubMenu}
                  >
                    <FontAwesomeIcon
                      icon={faCaretDown}
                      className="toggle-submenu"
                    />
                    <span className="collap-title">
                      <FontAwesomeIcon icon={faBars} />
                    </span>
                    <div className="menu-title">{t("หมวดหมู่ (เมนู)")}</div>
                  </a>
                  <div className="child-menu ">
                    <ul className="nav-items ">
                      {pagesAllow.categories && (
                        <NavLink
                          onClick={closeSidebarhandler}
                          to="/categories"
                          className={`items `}
                          title={t("หมวดหมู่หลัก")}
                          liClass="sub-items"
                        >
                          <span className="collap-title">
                            <FontAwesomeIcon icon={faSitemap} />
                          </span>
                          <span className="menu-title">
                            {t("หมวดหมู่หลัก")}
                          </span>
                        </NavLink>
                      )}
                      {/* {pagesAllow.subcategories && (
                        <NavLink
                          onClick={closeSidebarhandler}
                          to="/subcategories"
                          className={`items `}
                          title={t("หมวดหมู่ย่อย")}
                          liClass="sub-items"
                        >
                          <span className="collap-title">
                            <FontAwesomeIcon icon={faSitemap} />
                          </span>
                          <span className="menu-title">
                            {t("หมวดหมู่ย่อย")}
                          </span>
                        </NavLink>
                      )} */}
                    </ul>
                  </div>
                </li>
              </ul>
            </Fragment>
          )}

          {/* {pagesAllow.groups.product && (
          <Fragment>
            <hr className="line-section gap" />
            <ul className="nav-menu">
              <div className="title-section">
                {t("จัดการสินค้า, บริการ ฯลฯ")}
              </div>
              <li className="menu-link has-child opened">
                <a
                  className={`navlink `}
                  title={t("สินค้า, บริการ ฯลฯ")}
                  onClick={toggleSubMenu}
                >
                  <FontAwesomeIcon
                    icon={faCaretDown}
                    className="toggle-submenu"
                  />
                  <span className="collap-title">
                    <FontAwesomeIcon icon={faShoppingCart} />
                  </span>
                  <div className="menu-title">{t("สินค้า, บริการ ฯลฯ")}</div>
                </a>
                <div className="child-menu ">
                  <ul className="nav-items ">
                    {pagesAllow.products && (
                      <li>
                        <NavLink
                          onClick={closeSidebarhandler}
                          to="/products"
                          className={`items `}
                          title={t("สินค้า")}
                          liClass="sub-items"
                        >
                          <span className="collap-title">
                            <FontAwesomeIcon icon={faCube} />
                          </span>
                          <span className="menu-title">{t("สินค้า")}</span>
                        </NavLink>
                      </li>
                    )}
                    {pagesAllow.services && (
                      <NavLink
                        onClick={closeSidebarhandler}
                        to="/services"
                        className={`items `}
                        title={t("บริการ")}
                        liClass="sub-items"
                      >
                        <span className="collap-title">
                          <FontAwesomeIcon icon={faCube} />
                        </span>
                        <span className="menu-title">{t("บริการ")}</span>
                      </NavLink>
                    )}
                    {pagesAllow.designs && (
                      <NavLink
                        onClick={closeSidebarhandler}
                        to="/designs"
                        className={`items `}
                        title={t("แบบบ้าน")}
                        liClass="sub-items"
                      >
                        <span className="collap-title">
                          <FontAwesomeIcon icon={faCube} />
                        </span>
                        <span className="menu-title">{t("แบบบ้าน")}</span>
                      </NavLink>
                    )}
                    {pagesAllow.portfolios && (
                      <NavLink
                        onClick={closeSidebarhandler}
                        to="/portfolios"
                        className={`items `}
                        title={t("ผลงาน")}
                        liClass="sub-items"
                      >
                        <span className="collap-title">
                          <FontAwesomeIcon icon={faCube} />
                        </span>
                        <span className="menu-title">{t("ผลงานของเรา")}</span>
                      </NavLink>
                    )}
                  </ul>
                </div>
              </li>
            </ul>
          </Fragment>
        )} */}

          {pagesAllow.groups.article && (
            <Fragment>
              <hr className="line-section gap" />
              <div className="title-section">
                {t("จัดการคอนเทนต์เพิ่มเติม")}
              </div>
              <ul className="nav-menu">
                {pagesAllow.posts && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/posts"
                    className={`navlink `}
                    title={t("ข่าวสาร")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                      <FontAwesomeIcon icon={faNewspaper} />
                    </span>
                    <span className="menu-title">{t("ข่าวสาร")}</span>
                  </NavLink>
                )}
                {pagesAllow.lecturers && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/lecturers"
                    className={`navlink `}
                    title={t("วิทยากร")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                    <FontAwesomeIcon icon={faAddressBook} />
                    </span>
                    <span className="menu-title">{t("วิทยากร")}</span>
                  </NavLink>
                )}
                {pagesAllow.activityphoto && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/activityphoto"
                    className={`navlink `}
                    title={t("ภาพกิจกรรม")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                    <FontAwesomeIcon icon={faImage} />
                    </span>
                    <span className="menu-title">{t("ภาพกิจกรรม")}</span>
                  </NavLink>
                )}
                {pagesAllow.seminarSchedule && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/seminarschedule"
                    className={`navlink `}
                    title={t("ตารางการสัมมนา")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                      <FontAwesomeIcon icon={faTable} />
                    </span>
                    <span className="menu-title">{t("ตารางการสัมมนา")}</span>
                  </NavLink>
                )}
                {pagesAllow.seminarSchedule && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/roomseminar"
                    className={`navlink `}
                    title={t("จัดการห้องสัมมนา")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                    <FontAwesomeIcon icon={faPeopleRoof} />
                    </span>
                    <span className="menu-title">{t("จัดการห้องสัมมนา")}</span>
                  </NavLink>
                )}
                {pagesAllow.hotelpost && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/hotelpost"
                    className={`navlink `}
                    title={t("ที่พักและเส้นทาง")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                      <FontAwesomeIcon icon={faHotel} />
                    </span>
                    <span className="menu-title">{t("ที่พักและเส้นทาง")}</span>
                  </NavLink>
                )}
                {pagesAllow.postscontent && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/postscontent"
                    className={`navlink `}
                    title={t("บทความ")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                      <FontAwesomeIcon icon={faBook} />
                    </span>
                    <span className="menu-title">{t("บทความ")}</span>
                  </NavLink>
                )}
                {pagesAllow.messages && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/messages"
                    className={`navlink `}
                    title={t("จดหมาย")}
                    liClass="menu-link"
                  >
                    <span className="collap-title">
                      <FontAwesomeIcon icon={faEnvelope} />
                    </span>
                    <span className="menu-title">{t("จดหมาย")}</span>
                  </NavLink>
                )}
              </ul>
            </Fragment>
          )}

          {pagesAllow.groups.system && (
            <Fragment>
              <hr className="line-section gap" />
              <div className="title-section">{t("SettingsTitle")}</div>
              <ul className="nav-menu">
                {pagesAllow.slides && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="slides"
                    className={`navlink `}
                    title={t("ภาพและโฆษณา")}
                    liClass="menu-link"
                  >
                    <figure className="faIcon">
                      <FontAwesomeIcon icon={faImages} />
                    </figure>
                    <div className="menu-title">{t("ภาพและโฆษณา")}</div>
                  </NavLink>
                )}

                {pagesAllow.webinfo && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/webinfo"
                    className={`navlink `}
                    title={t("ตั้งค่าข้อมูลเว็บไซต์")}
                    liClass="menu-link"
                  >
                    <figure className="faIcon">
                      <FontAwesomeIcon icon={faCircleInfo} />
                    </figure>
                    <div className="menu-title">{t("ตั้งค่าข้อมูลเว็บไซต์")}</div>
                  </NavLink>
                )}

                {pagesAllow.admins &&
                  (uPermission.superAdmin ||
                    uPermission.admin ||
                    uPermission.officer) && (
                    <NavLink
                      onClick={closeSidebarhandler}
                      to="/admins"
                      className={`navlink `}
                      title={t("ตั้งค่าผู้ดูแลระบบ")}
                      liClass="menu-link"
                    >
                      <figure className="faIcon">
                        <FontAwesomeIcon icon={faUserShield} />
                      </figure>
                      <div className="menu-title">{t("ตั้งค่าผู้ดูแลระบบ")}</div>
                    </NavLink>
                  )}

                {pagesAllow.languages && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/languages"
                    className={`navlink `}
                    title={t("LanguagePage")}
                    liClass="menu-link"
                  >
                    <figure className="faIcon">
                      <FontAwesomeIcon icon={faLanguage} />
                    </figure>
                    <div className="menu-title">{t("LanguagePage")}</div>
                  </NavLink>
                )}

                {pagesAllow.configs && uPermission.superAdmin && (
                  <NavLink
                    onClick={closeSidebarhandler}
                    to="/configs"
                    className={`navlink `}
                    title={t("ตั้งค่าระบบ")}
                    liClass="menu-link"
                  >
                    <figure className="faIcon">
                      <FontAwesomeIcon icon={faTools} />
                    </figure>
                    <div className="menu-title">{t("ตั้งค่าระบบ")}</div>
                  </NavLink>
                )}
                <div className="menu-link">
                  <a
                    // href={`${uploadPath}upload/manual/manual.pdf?v=${version}`}
                    className={`navlink `}
                    target="_blank"
                    title="คู่มือ"
                    onClick={openManual}
                  >
                    <figure className="faIcon">
                      <FontAwesomeIcon icon={faBook} />
                    </figure>
                    <div className="menu-title">คู่มือ</div>
                  </a>
                </div>
              </ul>
            </Fragment>
          )}
        </div>

        <hr className="line-section gap" />
      </nav>
      <ul
        className="nav-menu mini-bar"
        style={{ marginTop: "auto", paddingRight: ".5rem" }}
      >
        <li className="menu-link footerLink">
          <a
            href={webPath}
            target="_blank"
            className="navlink pink-btn "
            title={t("เข้าสู่เว็บไซต์")}
          >
            <figure className="faIcon">
              <FontAwesomeIcon icon={faHome} />
            </figure>
            <span className="menu-title">{t("เข้าสู่เว็บไซต์")}</span>
          </a>
        </li>
      </ul>
      <p className="powerBy">Backoffice v. 1 </p>
    </aside>
  );
};
export default SidebarComponent;
