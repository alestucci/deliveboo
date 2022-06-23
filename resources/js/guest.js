require("./bootstrap");

window.Vue = require("vue").default;
window.Axios = require("axios");

import App from "./components/App.vue";

import PageHome from "./components/pages/PageHome.vue";

import PagePayment from "./components/pages/PagePayment.vue";

import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "PageHome",
            component: PageHome,
        },
        {
            path: "/payment",
            name: "PagePayment",
            component: PagePayment,
        },
    ],
});

const app = new Vue({
    el: "#app",
    render: (h) => h(App),
    router,
});
