import axios from 'axios';

const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

export default axios.create({
    baseURL: BASE_URL,
    headers: {'X-CSRF-TOKEN' : CSRF_TOKEN, 'X-Requested-With' : 'XMLHttpRequest'},
})