import axios from 'axios';
const url = 'http://127.0.0.1:8000/api/';


export const http = axios.create({
    baseURL: 'http://127.0.0.1:8000/api/'
});

export default ({
    url
})