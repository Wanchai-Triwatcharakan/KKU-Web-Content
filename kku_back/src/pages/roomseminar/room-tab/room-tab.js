import React, { useState } from 'react';
import { Box, Tabs, Tab, Typography } from '@mui/material';
import { faEyeSlash, faFolderOpen,  faMapPin, faLanguage, faLink, faPenNib, faStopwatch, faWindowRestore } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { useTranslation } from "react-i18next";


// ฟังก์ชัน TabPanel สำหรับแสดงเนื้อหาของแต่ละแท็บ
function TabPanel(props) {
  const { children, value, index, ...other } = props;

  return (
    <div
      role="tabpanel"
      hidden={value !== index}
      id={`tabpanel-${index}`}
      aria-labelledby={`tab-${index}`}
      {...other}
    >
      {value === index && (
        <Box p={3}>
          <Typography>{children}</Typography>
        </Box>
      )}
    </div>
  );
}

// ฟังก์ชันสำหรับเชื่อมโยง tab กับ tabpanel
function a11yProps(index) {
  return {
    id: `tab-${index}`,
    'aria-controls': `tabpanel-${index}`,
  };
}


const tabLists = [
  { value: 0 , title: "ทั้งหมด", icon: <FontAwesomeIcon icon={faFolderOpen} /> },
  { value: 1 , title: "แสดงบนเว็บไซต์", icon: <FontAwesomeIcon icon={faWindowRestore} /> },
  { value: 2 , title: "ปักหมุด", icon: <FontAwesomeIcon icon={faMapPin} /> },
  { value: 3 , title: "ซ่อนบนเว็บไซต์", icon: <FontAwesomeIcon icon={faEyeSlash} /> },
] 

export default function RoomTab({ dataRoom }) {
  const { t } = useTranslation('post-page')
  const [value, setValue] = useState(0);

  // ฟังก์ชันเปลี่ยนแท็บ
  const handleChange = (event, newValue) => {
    setValue(newValue);
  };

  return (
    <Box sx={{ width: '100%' }}>
      <Tabs value={value} onChange={handleChange} aria-label="basic tabs example">
        {tabLists.map((tab) => (
          <Tab className="post-tab-header" 
            value={tab.value} 
            key={tab.value} 
            icon={tab.icon} 
            label={t(tab.title)} />
        ))}
      </Tabs>

      {tabLists.map((tab, index) => (
        <TabPanel key={index} value={value} index={index}>
          {dataRoom.length > 0 ? (
            <ul>
              {dataRoom
                .map((room) => (
                  <li key={room.id}>{room.title}</li> // แสดงชื่อห้องสัมมนา
                ))}
            </ul>
          ) : (
            <Typography>No data available</Typography>
          )}
        </TabPanel>
      ))}
    </Box>
  )
}

