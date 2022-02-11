<template>

	<header >
		<div class="header__content " v-bind:class="[isCollapsed ? 'pl-75' : 'pl-300']">
			<span>{{this.$userName}}</span>
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

  export default {
  	data: {
  		
  	},
  	mounted(){
  		this.$root.$i18n.locale = this.$cookies.get('lang')
  		this.menu = this.returnSidebarData()
  		this.keyUp()
  	},
  	methods:{
  		keyUp(){
  			document.addEventListener('keyup', function(event){
  			    if(event.key == 'ArrowLeft'){
  			    	javascript:history.back()
  			    }
  			    else if(event.key == 'ArrowRight'){
  			    	javascript:history.forward()
  			    }
  			});
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
	         

	          /* reports */

	          if(this.$can('Cashbox_access')){
	          	sidebar_reports_child.push({
	            href: '/reports/cashbox',
	            title: this.$t('Касса'),
	            icon: 'fas fa-cash-register',
	          }) 
	          }
	          

	          sidebar_reports_child.push({
	            href: '/reports/finance',
	            title: this.$t('Финансы'),
	            icon: 'fas fa-chart-line',
	          }) 

	          if(this.$can('ProductPurchase_access')){
	          	sidebar_reports_child.push({
	            href: '/reports/purchases',
	            title: this.$t('Закупки'),
	            icon: 'fas fa-shopping-cart',
	          }) 
	          }
	          
	          if(this.$can('Report_access')){
	          	sidebar_data.push({
		            title: this.$t('Отчеты'),
		            icon: 'fas fa-chart-pie',
		            child: sidebar_reports_child 
		          }) 
	          }
	          

		      /* end reports */

		      sidebar_data.push({
	              href: '/transfers',
	              title: this.$t('Трансферы'),
	              icon: 'fas fa-exchange-alt',
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
		      
		      if(this.$can('User_access')){
		      	sidebar_data.push({
	              	href: '/users',
		            title: this.$t('Пользователи'),
		            icon: 'fas fa-users',
		      	})
		      }
		      

		     /* settings */

		     sidebar_settings_child.push({
                href: '/settings/translates',
                title: this.$t('Переводы'),
                icon: 'fas fa-language',
              }) 

             sidebar_settings_child.push({
                href: '/settings/permissions',
                title: this.$t('Разрешения'),
                icon: 'fas fa-lock-open',
              }) 

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
      	isCollapsed: true,
      	selected: this.$cookies.get('lang'),
        menu: this.returnSidebarData()
      }
    },
    
  }
</script>

<script>
	
</script>

