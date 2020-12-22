import axios from 'axios';

const http = axios.create({
    headers: {
        common: {
            'X-Requested-With': 'XMLHttpRequest',
        }
    }
});

export default http
