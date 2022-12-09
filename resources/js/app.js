import "./bootstrap";

import { createApp } from "vue";

import axios from "axios";
import App from "./src/App.vue";

axios.defaults.baseURL = "http://127.0.0.1:8000/api/";
createApp(App).mount("#app");
