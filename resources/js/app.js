import axios from "axios";

window.Vue = require("vue");
window.axios = axios;

require("./bootstrap");

Vue.use(axios);

import App from "./components/AppComponent.vue";

const app = new Vue({
    el: "#app",
    data() {
        return {
            url_host: window.location.origin
        };
    },
    render(h) {
        return h(App);
    }
});
