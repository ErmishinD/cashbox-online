require('./bootstrap');

import {createApp, onMounted} from 'vue';
import {createStore} from 'vuex'
import VueCookies from "vue3-cookies";
import VueSidebarMenu from 'vue-sidebar-menu'
import axios from 'axios'
import VueAxios from 'vue-axios'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import Notifications from '@kyvg/vue3-notification'
import VueGoodTablePlugin from 'vue-good-table-next';

import "gitart-vue-dialog/dist/style.css";
import {GDialog} from "gitart-vue-dialog";

// import the styles
import 'vue-good-table-next/dist/vue-good-table-next.css'

import i18n from './i18n'

import Permissions from './mixins/Permissions';

import useAuth from "./composables/auth";

import router from './routes/index'


// Create a new store instance.
const store = createStore({
    state() {
        appLanguage: localStorage.getItem("appLanguage") || process.env.VUE_APP_I18N_LOCALE || 'ru'
    },
    getters() {
        getAppLanguage: (state) => state.appLanguage
    },
    mutations: {
        setAppLanguage(state, language) {
            state.appLanguage = language;
            localStorage.setItem("language", language); // Whenever we change the appLanguage we save it to the localStorage
        }
    }
})


const app = createApp({
    setup() {
        const {getUser} = useAuth()
        onMounted(getUser)
    }
})

app.config.globalProperties.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
app.config.globalProperties.$companyId = document.querySelector("meta[name='company-id']").getAttribute('content');
app.config.globalProperties.$userName = document.querySelector("meta[name='user_name']").getAttribute('content');
app.config.globalProperties.$csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
app.config.globalProperties.$isAdmin = document.querySelector("meta[name='is_superadmin']").getAttribute('content');

app.use(VueSidebarMenu)
app.use(router).use(i18n).use(store)

app.use(VueCookies, {
    expireTimes: "30d",
    path: "/",
    domain: "",
    secure: true,
    sameSite: "None"
});
app.use(VueAxios, axios).use(VueGoodTablePlugin);
app.use(VueLoading)
app.use(GDialog).use(Notifications)

app.mixin(Permissions)


app.mount("#app");
