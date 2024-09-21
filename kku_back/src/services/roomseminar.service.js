import axios from "axios";

export const svGetRoomSeminar = () => {
  return axios.get('roomseminar/data')
  .then((res) => res).catch((err) => err)
}