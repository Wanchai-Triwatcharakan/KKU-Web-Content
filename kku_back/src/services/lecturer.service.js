import axios from "axios";

export const svGetLecture = () => {
  return axios.get("lecture/data").then((res) => res).catch((err) => err)
}