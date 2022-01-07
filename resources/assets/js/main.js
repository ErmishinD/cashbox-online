require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

/* import app */
import App from './components/App'

/* import dashboard */
import DashboardIndex from './components/dashboard/Index'

/* import products_type */
import ProductsTypeIndex from './components/products_type/Index'
import ProductsTypeCreate from './components/products_type/Create'
import ProductsTypeEdit from './components/products_type/Edit'

/* import products_for_sale */
import ProductsForSaleIndex from './components/products_for_sale/Index'
import ProductsForSaleCreate from './components/products_for_sale/Create'
import ProductsForSaleEdit from './components/products_for_sale/Edit'

/* import purchases */
import PurchasesIndex from './components/purchases/Index'
import PurchasesCreate from './components/purchases/Create'
import PurchasesEdit from './components/purchases/Edit'

/* import reports */
	/* import cashbox */
	import ReportsCashboxIndex from './components/reports/cashbox/Index'
	import ReportsCashboxCreate from './components/reports/cashbox/Create'
	import ReportsCashboxEdit from './components/reports/cashbox/Edit'

	/* import finance */
	import ReportsFinanceIndex from './components/reports/finance/Index'

/* import transfers */
import TransfersIndex from './components/transfers/Index'
import TransfersCreate from './components/transfers/Create'
import TransfersConfirm from './components/transfers/Confirm'

/* import shops */
import ShopsIndex from './components/shops/Index'
import ShopsCreate from './components/shops/Create'
import ShopsEdit from './components/shops/Edit'

/* import storages */
import StoragesIndex from './components/storages/Index'
import StoragesCreate from './components/storages/Create'
import StoragesEdit from './components/storages/Edit'

/* import users */
import UsersIndex from './components/users/Index'
import UsersCreate from './components/users/Create'
import UsersEdit from './components/users/Edit'

/* import settings */
import SettingsTranslates from './components/settings/Translates'
import SettingsPermissions from './components/settings/Permissions'
import SettingsRoles from './components/settings/Roles'
	/* import measures */
	import SettingsMeasuresIndex from './components/settings/measures/Index'
	import SettingsMeasuresCreate from './components/settings/measures/Create'
	import SettingsMeasuresEdit from './components/settings/measures/Edit'



const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/dashboard',
			name: 'home',
			component: DashboardIndex
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
			path: '/products_type/edit',
			name: 'products_type_edit',
			component: ProductsTypeEdit
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
			path: '/products_for_sale/edit',
			name: 'products_for_sale_edit',
			component: ProductsForSaleEdit
		},
		{
			path: '/purchases',
			name: 'purchases_index',
			component: PurchasesIndex
		},
		{
			path: '/purchases/create',
			name: 'purchases_create',
			component: PurchasesCreate
		},
		{
			path: '/purchases/edit',
			name: 'purchases_edit',
			component: PurchasesEdit
		},
		{
			path: '/reports/cashbox',
			name: 'reports_casbox_index',
			component: ReportsCashboxIndex
		},
		{
			path: '/reports/cashbox/create',
			name: 'reports_casbox_create',
			component: ReportsCashboxCreate
		},
		{
			path: '/reports/cashbox/edit',
			name: 'reports_casbox_edit',
			component: ReportsCashboxEdit
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
			path: '/shops/edit',
			name: 'shops_edit',
			component: ShopsEdit
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
			path: '/storages/edit',
			name: 'storages_edit',
			component: StoragesEdit
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
			path: '/users/edit',
			name: 'users_edit',
			component: UsersEdit
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
			name: 'settings_roles',
			component: SettingsRoles
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
			path: '/settings/measures/edit',
			name: 'settings_measures_edit',
			component: SettingsMeasuresEdit
		},
	]
})

const app = new Vue({
	el:'#app',
	components: {
		App
	},
	router
})