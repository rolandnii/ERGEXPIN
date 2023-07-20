import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// let csrf = document.querySelector("meta[name=csrf-token]").getAttribute("content")

window.Pusher = Pusher;


    window.Echo = new Echo({
                broadcaster: 'pusher',
                key: import.meta.env.VITE_PUSHER_APP_KEY,
                cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
                forceTLS: true,
                // auth: {
                  
                //     headers: { "X-CSRF-Token": csrf },
                //   },
                //   authEndpoint: "/broadcasting/auth/user.admin",
            });

Pusher.logToConsole = true;

window.Echo.channel("user")
.listen("Register",(e)=> {
    console.info(e)
})

