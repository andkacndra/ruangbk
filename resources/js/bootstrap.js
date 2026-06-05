import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] =
    'XMLHttpRequest';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',

    key: 'ruangbk-key',

    wsHost: '127.0.0.1',
    wsPort: 8080,

    forceTLS: false,

    enabledTransports: ['ws'],
});

window.userId =
    document
    .querySelector(
        'meta[name="user-id"]'
    )
    ?.content;

if (
    window.userId &&
    window.Echo
) {

    window.Echo.private(
        `App.Models.User.${window.userId}`
    )
    .notification(
        (notification) => {

            window.dispatchEvent(
                new CustomEvent(
                    'new-notification',
                    {
                        detail:
                            notification
                    }
                )
            );

        }
    );
}
