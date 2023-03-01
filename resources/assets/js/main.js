// require('./bootstrap');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { createApp, h } from 'vue';
import { createStore } from 'vuex'
import { createWebHistory, createRouter } from "vue-router"
import VueCookies from "vue3-cookies";
import VueSidebarMenu from 'vue-sidebar-menu'
import axios from 'axios'
import VueAxios from 'vue-axios'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import Notifications from '@kyvg/vue3-notification'
import VueGoodTablePlugin from 'vue-good-table-next';
import mitt from 'mitt';
import Chart from 'chart.js/auto';
import { createI18n } from 'vue-i18n'


import "gitart-vue-dialog/dist/style.css";
import { GDialog } from "gitart-vue-dialog";

// import the styles
import 'vue-good-table-next/dist/vue-good-table-next.css'

import en from './locales/en.json'
import ua from './locales/ua.json'
import ru from './locales/ru.json'


import Permissions from './mixins/Permissions.vue';
import GetBackgroundImage from './mixins/GetBackgroundImage.vue';

/* import app */
import App from './components/App.vue'

/* import dashboard */
import DashboardIndex from './components/dashboard/Index.vue'
import DashboardShow from './components/dashboard/Show.vue'

/* import counterparties */
import CounterpartyIndex from './components/counterparties/Index.vue'
import CounterpartyCreate from './components/counterparties/Create.vue'
import CounterpartyEdit from './components/counterparties/Edit.vue'
import CounterpartyShow from './components/counterparties/Show.vue'

/* import products_type */
import ProductsTypeIndex from './components/products_type/Index.vue'
import ProductsTypeCreate from './components/products_type/Create.vue'
import ProductsTypeEdit from './components/products_type/Edit.vue'
import ProductsTypeShow from './components/products_type/Show.vue'

/* import products_for_sale */
import ProductsForSaleIndex from './components/products_for_sale/Index.vue'
import ProductsForSaleCreate from './components/products_for_sale/Create.vue'
import ProductsForSaleEdit from './components/products_for_sale/Edit.vue'
import ProductsForSaleShow from './components/products_for_sale/Show.vue'

/* import purchases */
import PurchasesIndex from './components/purchases/Index.vue'
import PurchasesCreate from './components/purchases/Create.vue'
import PurchasesShow from './components/purchases/Show.vue'
import PurchasesEdit from './components/purchases/Edit.vue'

/* import reports */
	/* import cashbox */
	import ReportsCashboxIndex from './components/reports/cashbox/Index.vue'
	import ReportsCashboxCollections from './components/reports/cashbox/Collections.vue'

	/* import finance */
	import ReportsFinanceIndex from './components/reports/finance/Index.vue'

	/* import purcsases */
	import ReportsPurchasesIndex from './components/reports/purchases/Index.vue'

	/* import thresholds */
	import ReportsThresholdsIndex from './components/reports/thresholds/Index.vue'

	/* import profits */
	import ReportsProfitsIndex from './components/reports/profits/Index.vue'

	/* import recommendations */
	import ReportsRecommendationsIndex from './components/reports/recommendations/Index.vue'

/* import transfers */
import TransfersIndex from './components/transfers/Index.vue'
import TransfersCreate from './components/transfers/Create.vue'
import TransfersConfirm from './components/transfers/Confirm.vue'
import TransfersShow from './components/transfers/Show.vue'

/* import shops */
import ShopsIndex from './components/shops/Index.vue'
import ShopsCreate from './components/shops/Create.vue'
import ShopsEdit from './components/shops/Edit.vue'
import ShopsShow from './components/shops/Show.vue'

/* import storages */
import StoragesIndex from './components/storages/Index.vue'
import StoragesCreate from './components/storages/Create.vue'
import StoragesEdit from './components/storages/Edit.vue'
import StoragesShow from './components/storages/Show.vue'

/* import users */
import UsersIndex from './components/users/Index.vue'
import UsersCreate from './components/users/Create.vue'
import UsersEdit from './components/users/Edit.vue'
import UsersShow from './components/users/Show.vue'

/* import settings */
import SettingsTranslates from './components/settings/Translates.vue'
import SettingsPermissions from './components/settings/Permissions.vue'
	/* import roles */
	import SettingsRolesIndex from './components/settings/roles/Index.vue'
	import SettingsRolesCreate from './components/settings/roles/Create.vue'
	import SettingsRolesEdit from './components/settings/roles/Edit.vue'
	/* import measures */
	import SettingsMeasuresIndex from './components/settings/measures/Index.vue'
	import SettingsMeasuresCreate from './components/settings/measures/Create.vue'
	import SettingsMeasuresEdit from './components/settings/measures/Edit.vue'

	/* import companies */
	import SettingsCompaniesIndex from './components/settings/companies/Index.vue'
	import SettingsCompaniesCreate from './components/settings/companies/Create.vue'
	import SettingsCompaniesEdit from './components/settings/companies/Edit.vue'
	import SettingsCompaniesShow from './components/settings/companies/Show.vue'

	/* import categories */
	import SettingsCategoriesIndex from './components/settings/categories/Index.vue'
	import SettingsCategoriesCreate from './components/settings/categories/Create.vue'
	import SettingsCategoriesEdit from './components/settings/categories/Edit.vue'

	/* import audites */
	import SettingsAuditesIndex from './components/settings/audites/Index.vue'

/* import write-off */
import WriteOffIndex from './components/writeoff/Index.vue'
import WriteOffShow from './components/writeoff/Show.vue'
import WriteOffCreate from './components/writeoff/Create.vue'

/* import external sales */
import ExternalSalesIndex from './components/external_sales/Index.vue'
import ExternalSalesHistory from './components/external_sales/History.vue'

/* import 404 */
import PageNotFound from './components/404.vue'

/* import 403 */
import BadPermissions from './components/403.vue'


// Create a new store instance.
// const store = createStore({
//   state() {
//       appLanguage: localStorage.getItem("appLanguage") || process.env.VUE_APP_I18N_LOCALE || 'ru'
//     },
//     getters() {
//       getAppLanguage: (state) => state.appLanguage
//     },
//     mutations: {
//       setAppLanguage (state, language) {
//         state.appLanguage = language;
//         localStorage.setItem("language", language); // Whenever we change the appLanguage we save it to the localStorage
//       }
//     }
// })


// Create a new router instance.
const router = createRouter({
	history: createWebHistory(),
	routes: [
		{
			path: '/dashboard',
			name: 'home',
			component: DashboardIndex
		},
		{
			path: '/sale_detail/:id',
			name: 'sale_detail',
			component: DashboardShow,
			props: true
		},
		{
			path: '/counterparty',
			name: 'counterparties_index',
			component: CounterpartyIndex
		},
		{
			path: '/counterparty/create',
			name: 'counterparties_create',
			component: CounterpartyCreate
		},
		{
			path: '/counterparty/edit/:id',
			name: 'counterparties_edit',
			component: CounterpartyEdit,
			props: true
		},
		{
			path: '/counterparty/:id',
			name: 'counterparties_show',
			component: CounterpartyShow,
			props: true
		},
		{
			path: '/products_type',
			name: 'products_type_index',
			component: ProductsTypeIndex
		},
		{
			path: '/products_type/create',
			name: 'products_type_create',
			component: ProductsTypeCreate
		},
		{
			path: '/products_type/edit/:id',
			name: 'products_type_edit',
			component: ProductsTypeEdit,
			props: true
		},
		{
			path: '/products_type/:id',
			name: 'products_type_show',
			component: ProductsTypeShow,
			props: true
		},
		{
			path: '/products_for_sale',
			name: 'products_for_sale_index',
			component: ProductsForSaleIndex
		},
		{
			path: '/products_for_sale/create',
			name: 'products_for_sale_create',
			component: ProductsForSaleCreate
		},
		{
			path: '/products_for_sale/edit/:id',
			name: 'products_for_sale_edit',
			component: ProductsForSaleEdit,
			props: true
		},
		{
			path: '/products_for_sale/:id',
			name: 'products_for_sale_show',
			component: ProductsForSaleShow,
			props: true
		},
		{
			path: '/purchases',
			name: 'purchases_index',
			component: PurchasesIndex,
			props: true
		},
		{
			path: '/purchases/purchase_detail/:id',
			name: 'purchases_show',
			component: PurchasesShow,
			props: true
		},
		{
			path: '/purchases/edit/:id',
			name: 'purchases_edit',
			component: PurchasesEdit,
			props: true
		},
		{
			path: '/purchases/create',
			name: 'purchases_create',
			component: PurchasesCreate,
			props: true
		},
		{
			path: '/reports/purchases',
			name: 'reports_purchases_index',
			component: ReportsPurchasesIndex
		},
		{
			path: '/reports/cashbox',
			name: 'reports_casbox_index',
			component: ReportsCashboxIndex
		},
		{
			path: '/reports/cashbox/collections',
			name: 'reports_cashbox_collections',
			component: ReportsCashboxCollections,
			props: true
		},
		{
			path: '/reports/finance',
			name: 'reports_finance_index',
			component: ReportsFinanceIndex
		},
		{
			path: '/reports/thresholds',
			name: 'reports_thresholds_index',
			component: ReportsThresholdsIndex
		},
		{
			path: '/reports/profits',
			name: 'reports_profits_index',
			component: ReportsProfitsIndex
		},
		{
			path: '/reports/recommendations',
			name: 'reports_recommendations_index',
			component: ReportsRecommendationsIndex
		},
		{
			path: '/transfers',
			name: 'transfers_index',
			component: TransfersIndex
		},
		{
			path: '/transfers/create',
			name: 'transfers_create',
			component: TransfersCreate
		},
		{
			path: '/transfers/confirm',
			name: 'transfers_confirm',
			component: TransfersConfirm
		},
		{
			path: '/transfers/:id',
			name: 'transfers_show',
			component: TransfersShow,
			props: true
		},
		{
			path: '/shops',
			name: 'shops_index',
			component: ShopsIndex
		},
		{
			path: '/shops/create',
			name: 'shops_create',
			component: ShopsCreate
		},
		{
			path: '/shops/edit/:id',
			name: 'shops_edit',
			component: ShopsEdit,
			props: true
		},
		{
			path: '/shops/:id',
			name: 'shops_show',
			component: ShopsShow,
			props: true
		},
		{
			path: '/storages',
			name: 'storages_index',
			component: StoragesIndex
		},
		{
			path: '/storages/create',
			name: 'storages_create',
			component: StoragesCreate
		},
		{
			path: '/storages/edit/:id',
			name: 'storages_edit',
			component: StoragesEdit,
			props: true
		},
		{
			path: '/storages/:id',
			name: 'storages_show',
			component: StoragesShow,
			props: true
		},
		{
			path: '/users',
			name: 'users_index',
			component: UsersIndex
		},
		{
			path: '/users/create',
			name: 'users_create',
			component: UsersCreate
		},
		{
			path: '/users/edit/:id',
			name: 'users_edit',
			component: UsersEdit,
			props: true
		},
		{
			path: '/users/:id',
			name: 'users_show',
			component: UsersShow,
			props: true
		},
		{
			path: '/settings/translates',
			name: 'settings_translates',
			component: SettingsTranslates
		},
		{
			path: '/settings/permissions',
			name: 'settings_permissions',
			component: SettingsPermissions
		},
		{
			path: '/settings/roles',
			name: 'settings_roles_index',
			component: SettingsRolesIndex
		},
		{
			path: '/settings/roles/create',
			name: 'settings_roles_create',
			component: SettingsRolesCreate
		},
		{
			path: '/settings/roles/edit/:id',
			name: 'settings_roles_edit',
			component: SettingsRolesEdit,
			props: true
		},
		{
			path: '/settings/measures',
			name: 'settings_measures_index',
			component: SettingsMeasuresIndex
		},
		{
			path: '/settings/measures/create',
			name: 'settings_measures_create',
			component: SettingsMeasuresCreate
		},
		{
			path: '/settings/measures/edit/:id',
			name: 'settings_measures_edit',
			component: SettingsMeasuresEdit,
			props: true
		},
		{
			path: '/settings/companies',
			name: 'settings_companies_index',
			component: SettingsCompaniesIndex
		},
		{
			path: '/settings/companies/create',
			name: 'settings_companies_create',
			component: SettingsCompaniesCreate
		},
		{
			path: '/settings/companies/:id',
			name: 'settings_companies_show',
			component: SettingsCompaniesShow,
			props: true
		},
		{
			path: '/settings/companies/edit/:id',
			name: 'settings_companies_edit',
			component: SettingsCompaniesEdit,
			props: true
		},
		{
			path: '/settings/categories',
			name: 'settings_categories_index',
			component: SettingsCategoriesIndex
		},
		{
			path: '/settings/categories/create',
			name: 'settings_categories_create',
			component: SettingsCategoriesCreate
		},
		{
			path: '/settings/categories/edit/:id',
			name: 'settings_categories_edit',
			component: SettingsCategoriesEdit,
			props: true
		},
		{
			path: '/settings/audites',
			name: 'settings_audites_index',
			component: SettingsAuditesIndex
		},
		{
			path: '/write_off',
			name: 'write_off_index',
			component: WriteOffIndex,
			props: true,
		},
		{
			path: '/write_off/create',
			name: 'write_off_create',
			component: WriteOffCreate,
			props: true,
		},
		{
			path: '/write_off/:id',
			name: 'write_off_show',
			component: WriteOffShow,
			props: true
		},
		{
			path: '/external_sales',
			name: 'external_sales_index',
			component: ExternalSalesIndex,
			props: true,
		},
		{
			path: '/external_sales/history',
			name: 'external_sales_history',
			component: ExternalSalesHistory,
			props: true,
		},
		{
			path: '/logout',
			name: 'logout'
		},
		{ 
			path: "/:catchAll(.*)", 
			redirect: '/404',
		  	
		},
		{
			path: "/404",
			name: '404',
			component: PageNotFound 
		},
		{
			path: "/403",
			name: '403',
			component: BadPermissions 
		},
	]
})


const app = createApp({
    render: ()=>h(App)
})

const i18n = createI18n({
  locale: 'ru',
  messages: {
    en,
    ua,
    ru
  }
})

const emitter = mitt();

app.config.globalProperties.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
app.config.globalProperties.$companyId = document.querySelector("meta[name='company-id']").getAttribute('content');
app.config.globalProperties.$userName = document.querySelector("meta[name='user_name']").getAttribute('content');
app.config.globalProperties.$csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
app.config.globalProperties.$isAdmin = document.querySelector("meta[name='is_superadmin']").getAttribute('content');
app.config.globalProperties.$shopId = document.querySelector("meta[name='shop_id']").getAttribute('content');
app.config.globalProperties.emitter = emitter;


app.use(VueSidebarMenu)
app.use(router).use(i18n)

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

app.mixin(Permissions).mixin(GetBackgroundImage)



app.mount("#app");