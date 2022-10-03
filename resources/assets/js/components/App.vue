<template>

	<notifications position="bottom right" />
  <loading v-model:active="isLoading"
                 :can-cancel="false"
                 :is-full-page="fullPage"
                 loader="spinner"/>
	<GDialog v-model="modal_show" style="z-index: 9999;" :persistent="true" max-width="700">
	    <div class="getting-started-example-styled">
	      <div class="getting-started-example-styled__content">
	        <div class="getting-started-example-styled__title">
	        	{{ $t('Выберите магазин') }}:
	        </div>
	        <select class="def_select center-flex" v-model="current_shop_in_select" id="">
	        		<option v-for="shop in shop_by_company_list" :value="shop.id">{{shop.name}}</option>
	        </select>
	      </div>


	      <div class="getting-started-example-styled__actions">

	      	<button @click="changeShop" :disabled="!this.current_shop_in_select" class="btn btn-success">
	          {{ $t('Выбрать') }}
	        </button>
	      </div>
	    </div>
	  </GDialog>
	<header >
		<div class="header__content " v-bind:class="[isCollapsed ? 'pl-75' : 'pl-300']">
			<span>{{this.$userName}}</span>
			<select name="select_storage" style="margin-left: 20px;" v-if="!this.$isAdmin" @change="changeShop" v-model="current_shop">
				<option v-for="shop in shop_by_company_list" :value="shop.id">{{shop.name}}</option>
			</select>
			<select @change="changeOption($event)" style="margin-left: auto; margin-right: 20px;" class="" v-model="selected">
				<option value="ru">Русcкий</option>
				<option value="ua">Українська</option>
				<option value="en">English</option>
			</select>
			<button class="btn btn-primary"  onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">{{ $t('Выход') }}</button>

            <form id="logout-form" action="/logout" method="POST">
            	 <input type="hidden" name="_token" :value="this.$csrf">
			</form>


		</div>
	</header>

	<sidebar-menu  :collapsed="isCollapsed" :menu="menu" @update:collapsed="onToggleCollapse">
		<template  v-slot:toggle-icon><img v-bind:class="[isCollapsed ? '' : 'trans-180deg']" src="../../img/sidebar_arrow.svg" alt=""></template>
	</sidebar-menu>
	<div id="main_content" v-bind:class="[isCollapsed ? 'pl-75' : 'pl-300']">

		<router-view></router-view>
	</div>


</template>

<script>
	import { GDialog } from 'gitart-vue-dialog'
	import "gitart-vue-dialog/dist/style.css";

  import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

  export default {
	 components: {
    	GDialog,
      Loading,
  	  },
  	data: {

  	},
  	mounted(){
  		this.$root.$i18n.locale = this.$cookies.get('lang')
  		this.menu = this.returnSidebarData()
  		this.keyUp()
  		if(!this.$isAdmin){
  			this.axios.post('/api/shops/get_by_company').then((response) => {
  				this.shop_by_company_list = response.data.data
  				console.log(!this.current_shop && !this.$isAdmin)
  			})
  			if(!this.current_shop){
  				this.modal_show = true
  			}
  		}
      this.emitter.on("isLoading", res => {
                  this.isLoading = res
                });
      this.axios.interceptors.response.use(
          response => response,
          error => {

              if (error.response?.status == 404) {
                this.emitter.emit("isLoading", false);
                  this.$router.push({ name: '404' })
              }
              else if (error.response?.status == 403) {
                this.emitter.emit("isLoading", false);
                  this.$router.push({ name: '403' })
              }
              return Promise.reject(error)
          }
      )

  	},
  	methods:{
  		keyUp(){
  			document.addEventListener('keyup', function(event){
  				var activeElement = document.activeElement;
  				if(activeElement.tagName.toLowerCase() != 'input'){
  					if(event.key == 'ArrowLeft'){
  						javascript:history.back()
  					}
  					else if(event.key == 'ArrowRight'){
  						javascript:history.forward()
  					}
  				}

  			});
  		},
  		changeShop() {
  			if(this.current_shop_in_select){
  				this.current_shop = this.current_shop_in_select

  			}
  			this.axios.post('/api/change_shop', {shop_id : this.current_shop}).then((response) => {
          this.emitter.emit("change_shop", this.current_shop);
  				this.modal_show = false
  				this.$shopId = this.current_shop
  			})
  		},
  		changeLanguage (locale) {
  		  this.$root.$i18n.locale = locale
  		  this.$cookies.set('lang', locale);
  		  this.$root.selectedLanguage = locale
  		  this.isDropdownOpened = false
  		  this.menu = this.returnSidebarData()
  		},
  		onToggleCollapse(collapsed) {
  			this.isCollapsed = !this.isCollapsed
  			this.$cookies.set('isCollapsed', this.isCollapsed);
  		},
  		changeOption (event) {
  			this.changeLanguage(event.target.value)

  		},
  		updateWidth() {
  		    this.width = window.innerWidth;
  		    if(this.width < 992){
  		    	this.isCollapsed = true
  		    }
  		    else{
  		    	this.isCollapsed = true
  		    }
  		  },
  		returnSidebarData(){
  			let sidebar_data = []
  			let sidebar_reports_child = []
  			let sidebar_settings_child = []
        let sidebar_actions_child = []

  			sidebar_data.push({
	            href: '/dashboard',
	            title: this.$t('Главная'),
	            icon: 'fas fa-home'
          	})

  			if(this.$can('ProductType_access')){
  				sidebar_data.push({
	          	href: '/products_type',
	            title: this.$t('Типы товаров'),
	            icon: 'fas fa-truck',
	          })
  			}

  			if(this.$can('SellProduct_access')){
  				sidebar_data.push({
	          	href: '/products_for_sale',
	            title: this.$t('Товары на продажу'),
	            icon: 'fas fa-hand-holding-usd',
	          })
  			}

  			if(this.$can('ExternalSale_access')){
  				sidebar_data.push({
	          	href: '/external_sales',
	            title: this.$t('Предпродажи'),
	            icon: 'fas fa-clipboard-question',
	          })
  			}


	          /* reports */

	          if(this.$can('Cashbox_access')){
	          	sidebar_reports_child.push({
	            href: '/reports/cashbox',
	            title: this.$t('Касса'),
	            icon: 'fas fa-cash-register',
	          })
	          }

	          if(this.$can('Report_warningThreshold')){
	          	sidebar_reports_child.push({
	            href: '/reports/thresholds',
	            title: this.$t('Предупреждения'),
	            icon: 'fas fa-circle-exclamation',
	          })
	          }

	          if(this.$can('Report_purchaseRecommendations')){
	          	sidebar_reports_child.push({
	            href: '/reports/recommendations',
	            title: this.$t('Рекомендации'),
	            icon: 'fas fa-circle-check',
	          })
	          }

	          if(this.$can('Report_profit')){
	          	sidebar_reports_child.push({
	            href: '/reports/profits',
	            title: this.$t('Прибыль'),
	            icon: 'fas fa-arrow-trend-up',
	          })
	          }


	          // sidebar_reports_child.push({
	          //   href: '/reports/finance',
	          //   title: this.$t('Финансы'),
	          //   icon: 'fas fa-chart-line',
	          // })
              //
	          // if(this.$can('ProductPurchase_access')){
	          // 	sidebar_reports_child.push({
	          //   href: '/reports/purchases',
	          //   title: this.$t('История закупок'),
	          //   icon: 'fas fa-shopping-cart',
	          // })
	          // }

	          if(this.$can('Report_access')){
	          	sidebar_data.push({
		            title: this.$t('Отчеты'),
		            icon: 'fas fa-chart-pie',
		            child: sidebar_reports_child
		          })
	          }


		      /* end reports */

		      if(this.$can('ProductPurchase_access')){
	          	sidebar_actions_child.push({
	            href: '/purchases',
	            title: this.$t('Закупки'),
	            icon: 'fas fa-shopping-cart',
	          })
	          }

          if(this.$can('WriteOff_access')){
              sidebar_actions_child.push({
              href: '/write_off',
              title: this.$t('Списание'),
              icon: 'fas fa-ban',
            })
            }

          if(this.$can('Transfer_access')){
              sidebar_actions_child.push({
              href: '/transfers',
              title: this.$t('Трансферы'),
              icon: 'fas fa-exchange-alt',
            })
            }

          sidebar_data.push({
                title: this.$t('Действия'),
                icon: 'fas fa-dolly',
                child: sidebar_actions_child
              })

		      if(this.$can('Shop_access')){
		      	sidebar_data.push({
	              	href: '/shops',
	                title: this.$t('Магазины'),
	                icon: 'fas fa-store',
		      	})
		      }

		      if(this.$can('Storage_access')){
		      	sidebar_data.push({
	              		href: '/storages',
	              	  title: this.$t('Склады'),
	              	  icon: 'fas fa-boxes',
		      	})
		      }

		      if(this.$can('Counterparty_access')){
		      	sidebar_data.push({
	              	href: '/counterparty',
		            title: this.$t('Контрагенты'),
		            icon: 'fas fa-id-card-clip',
		      	})
		      }

		      if(this.$can('User_access')){
		      	sidebar_data.push({
	              	href: '/users',
		            title: this.$t('Пользователи'),
		            icon: 'fas fa-users',
		      	})
		      }


		     /* settings */

		     // sidebar_settings_child.push({
       //          href: '/settings/translates',
       //          title: this.$t('Переводы'),
       //          icon: 'fas fa-language',
       //        })


             if(this.$can('Role_access')){
             	sidebar_settings_child.push({
             	   href: '/settings/roles',
             	  title: this.$t('Роли'),
             	  icon: 'fas fa-unlock',
             	 })
             }

             if(this.$can('MeasureType_access')){
             	sidebar_settings_child.push({
                href: '/settings/measures',
                title: this.$t('Единицы измерения'),
                icon: 'fas fa-weight-hanging',
               })
             }

             if(this.$can('Category_access')){
              sidebar_settings_child.push({
                href: '/settings/categories',
                title: this.$t('Категории'),
                icon: 'fas fa-list-alt',
               })
             }

             if(this.$can('Audit_access')){
              sidebar_settings_child.push({
                href: '/settings/audites',
                title: this.$t('История изменений'),
                icon: 'fas fa-list-ol',
               })
             }


               if(this.$can('Company_access')){
               	sidebar_settings_child.push({
               	 href: '/settings/companies',
               	 title: this.$t('Компании'),
               	 icon: 'fas fa-building',
               	})
               }


               sidebar_data.push({
		            title: this.$t('Настройки'),
		            icon: 'fas fa-cogs',
		            child: sidebar_settings_child
		          })


		     /* end settings */

  			return sidebar_data
  		},
  	},
  	created() {
  	  window.addEventListener('resize', this.updateWidth);
  	  this.updateWidth()
  	  console.log(this.width)
  	},
    data() {
      return {
      	width: 0,
        isLoading:false,
      	isCollapsed: true,
      	selected: this.$cookies.get('lang'),
        menu: this.returnSidebarData(),
        shop_by_company_list: {},
        current_shop: this.$shopId,
        current_shop_in_select : null,
        modal_show: false,
      }
    },

  }
</script>

<script>

</script>

