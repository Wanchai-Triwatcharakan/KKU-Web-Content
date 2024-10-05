import axios from "axios";

export const svGetRoomSeminar = () => {
  return axios.get('roomseminar/data')
  .then((res) => res).catch((err) => err)
}

export const svCreateRoom = (formData) => {
  return axios.post('roomseminar/create', formData)
  .then((res) => res).catch((err) => err)
}

export const svUpdateRoom = (formData, id) => {
  return axios.post(`roomseminar/update/${id}`, formData).then( 
    (res) =>  { return { status: true, description: res.data.description, data: res.data.data }},
    (error) => { return { status: false, description: (!error.response.data)?"Something went wrong.": error.response.data.description } }
  )
}

export const svDeleteRoom = (id) => {
  return axios.delete(`roomseminar/delete/${id}`).then( 
    (res) =>  { return { status: true, description: res.data.description, data: res.data.data }},
    (error) => { return { status: false, description: (!error.response.data)?"Something went wrong.": error.response.data.description } }
  )
}
