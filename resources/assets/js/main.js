require('./bootstrap');

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


import "gitart-vue-dialog/dist/style.css";
import { GDialog } from "gitart-vue-dialog";

// import the styles
import 'vue-good-table-next/dist/vue-good-table-next.css'

import i18n from './i18n'


import Permissions from './mixins/Permissions';

/* import app */
import App from './components/App'

/* import dashboard */
import DashboardIndex from './components/dashboard/Index'
import DashboardShow from './components/dashboard/Show'

/* import products_type */
import ProductsTypeIndex from './components/products_type/Index'
import ProductsTypeCreate from './components/products_type/Create'
import ProductsTypeEdit from './components/products_type/Edit'
import ProductsTypeShow from './components/products_type/Show'

/* import products_for_sale */
import ProductsForSaleIndex from './components/products_for_sale/Index'
import ProductsForSaleCreate from './components/products_for_sale/Create'
import ProductsForSaleEdit from './components/products_for_sale/Edit'
import ProductsForSaleShow from './components/products_for_sale/Show'

/* import purchases */
import PurchasesIndex from './components/purchases/Index'
import PurchasesCreate from './components/purchases/Create'
import PurchasesShow from './components/purchases/Show'
import PurchasesEdit from './components/purchases/Edit'

/* import reports */
	/* import cashbox */
	import ReportsCashboxIndex from './components/reports/cashbox/Index'
	import ReportsCashboxCollections from './components/reports/cashbox/Collections'

	/* import finance */
	import ReportsFinanceIndex from './components/reports/finance/Index'

	/* import purcsases */
	import ReportsPurchasesIndex from './components/reports/purchases/Index'

/* import transfers */
import TransfersIndex from './components/transfers/Index'
import TransfersCreate from './components/transfers/Create'
import TransfersConfirm from './components/transfers/Confirm'
import TransfersShow from './components/transfers/Show'

/* import shops */
import ShopsIndex from './components/shops/Index'
import ShopsCreate from './components/shops/Create'
import ShopsEdit from './components/shops/Edit'
import ShopsShow from './components/shops/Show'

/* import storages */
import StoragesIndex from './components/storages/Index'
import StoragesCreate from './components/storages/Create'
import StoragesEdit from './components/storages/Edit'
import StoragesShow from './components/storages/Show'

/* import users */
import UsersIndex from './components/users/Index'
import UsersCreate from './components/users/Create'
import UsersEdit from './components/users/Edit'
import UsersShow from './components/users/Show'

/* import settings */
import SettingsTranslates from './components/settings/Translates'
import SettingsPermissions from './components/settings/Permissions'
	/* import roles */
	import SettingsRolesIndex from './components/settings/roles/Index'
	import SettingsRolesCreate from './components/settings/roles/Create'
	import SettingsRolesEdit from './components/settings/roles/Edit'
	/* import measures */
	import SettingsMeasuresIndex from './components/settings/measures/Index'
	import SettingsMeasuresCreate from './components/settings/measures/Create'
	import SettingsMeasuresEdit from './components/settings/measures/Edit'

	/* import companies */
	import SettingsCompaniesIndex from './components/settings/companies/Index'
	import SettingsCompaniesCreate from './components/settings/companies/Create'
	import SettingsCompaniesEdit from './components/settings/companies/Edit'
	import SettingsCompaniesShow from './components/settings/companies/Show'

	/* import categories */
	import SettingsCategoriesIndex from './components/settings/categories/Index'
	import SettingsCategoriesCreate from './components/settings/categories/Create'
	import SettingsCategoriesEdit from './components/settings/categories/Edit'

	/* import audites */
	import SettingsAuditesIndex from './components/settings/audites/Index'

/* import write-off */
import WriteOffIndex from './components/writeoff/Index'
import WriteOffShow from './components/writeoff/Show'
import WriteOffCreate from './components/writeoff/Create'

/* import 404 */
import PageNotFound from './components/404'

/* import 403 */
import BadPermissions from './components/403'


// Create a new store instance.
const store = createStore({
  state() {
      appLanguage: localStorage.getItem("appLanguage") || process.env.VUE_APP_I18N_LOCALE || 'ru'
    },
    getters() {
      getAppLanguage: (state) => state.appLanguage
    },
    mutations: {
      setAppLanguage (state, language) {
        state.appLanguage = language;
        localStorage.setItem("language", language); // Whenever we change the appLanguage we save it to the localStorage
      }
    }
})


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

const emitter = mitt();

app.config.globalProperties.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
app.config.globalProperties.$companyId = document.querySelector("meta[name='company-id']").getAttribute('content');
app.config.globalProperties.$userName = document.querySelector("meta[name='user_name']").getAttribute('content');
app.config.globalProperties.$csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
app.config.globalProperties.$isAdmin = document.querySelector("meta[name='is_superadmin']").getAttribute('content');
app.config.globalProperties.$shopId = document.querySelector("meta[name='shop_id']").getAttribute('content');
app.config.globalProperties.emitter = emitter;


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