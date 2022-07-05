import {createApp} from 'vue'
import App from './App.vue'
import './index.css'
import VueGtag from "vue-gtag"

createApp(App).use(VueGtag, {
    config: {
        id: "G-533VF6LJKG",
        params: {
            anonymize_ip: true
        }
    }
}).mount("#app");

