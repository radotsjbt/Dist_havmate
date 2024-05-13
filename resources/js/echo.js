import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Assign Pusher to window object, this is required for Laravel Echo
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
});
