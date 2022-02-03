<template>

	<header>
		<div class="header__content" v-bind:class="[isCollapsed ? 'pl-75' : 'pl-300']">
			<select @change="changeOption($event)" v-model="selected">
				<option value="ru">Русcкий</option>
				<option value="ua">Українська</option>
				<option value="en">English</option>
			</select>
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
  	},
  	methods:{
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
  		    	this.isCollapsed = false
  		    }
  		  },
  		returnSidebarData(){
  			return [
          {
            href: '/dashboard',
            title: this.$t('Главная'),
            icon: 'fas fa-home'
          },
          {
          	href: '/products_type',
            title: this.$t('Типы товаров'),
            icon: 'fas fa-truck',
          },
          {
          	href: '/products_for_sale',
            title: this.$t('Товары на продажу'),
            icon: 'fas fa-hand-holding-usd',
          },
          {
            title: this.$t('Отчеты'),
            icon: 'fas fa-chart-pie',
            child: [
              {
                href: '/reports/cashbox',
                title: this.$t('Касса'),
                icon: 'fas fa-cash-register',
              },
              {
                href: '/reports/finance',
                title: this.$t('Финансы'),
                icon: 'fas fa-chart-line',
              },

              {
              	href: '/reports/purchases',
                title: this.$t('Закупки'),
                icon: 'fas fa-shopping-cart',
              },
            ]
          },
          {
          	href: '/transfers',
            title: this.$t('Трансферы'),
            icon: 'fas fa-exchange-alt',
          },
          {
          	href: '/shops',
            title: this.$t('Магазины'),
            icon: 'fas fa-store',
          },
          {
          	href: '/storages',
            title: this.$t('Склады'),
            icon: 'fas fa-boxes',
          },
          {
          	href: '/users',
            title: this.$t('Пользователи'),
            icon: 'fas fa-users',
          },
          {
            title: this.$t('Настройки'),
            icon: 'fas fa-cogs',
            child: [
              {
                href: '/settings/translates',
                title: this.$t('Переводы'),
                icon: 'fas fa-language',
              },
              {
                href: '/settings/permissions',
                title: this.$t('Разрешения'),
                icon: 'fas fa-lock-open',
              },
              {
                href: '/settings/roles',
                title: this.$t('Роли'),
                icon: 'fas fa-unlock',
              },
              {
                href: '/settings/measures',
                title: this.$t('Единицы измерения'),
                icon: 'fas fa-weight-hanging',
              },
              {
                href: '/settings/companies',
                title: this.$t('Компании'),
                icon: 'fas fa-building',
              },
            ]
          },
        ]
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
      	isCollapsed: false,
      	selected: this.$cookies.get('lang'),
        menu: this.returnSidebarData()
      }
    },
    
  }
</script>

<script>
	
</script>

