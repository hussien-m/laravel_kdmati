import _ from 'lodash';
window._ = _;

import 'bootstrap';
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'hussienkey',
    cluster:"mt1",
    forceTLS: true,
    disableStats: true,
    wsHost: window.location.hostname,
    wssPort: 6001,
    enabledTransports: ['ws', 'wss'],
});
