import VueRouter from 'vue-router';
import Login from "../pages/Login";
import Vue from "vue";

Vue.use(VueRouter);

const routes = [
    { path: '/auth/login', component: Login },

];

const router = new VueRouter({
    routes // short for `routes: routes`
})

export default router;
