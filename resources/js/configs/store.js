import axios from 'axios'

let h = `http://${location.host}/`

try{
    h = document.querySelector('meta[name="app_host"]').content + '/'
} catch(e){
    console.warn("app_host tidak terdeteksi pada meta tag", "😢😢");
}

let token = localStorage.getItem('authToken');
let Authorization
if(token)
    Authorization = `Bearer ${token}`

axios.defaults.headers.common = {
    Authorization: Authorization,
    "Accept": "application/json",
};

export const csrf = document.querySelector('meta[name="csrf-token"')?.content

export const host = (url)=>`${h}${url}`
export const api = (url)=>host(`api/${url}`)