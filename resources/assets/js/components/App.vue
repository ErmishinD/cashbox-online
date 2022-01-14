<template>
	<header>
		<div class="header__content" v-bind:class="[isCollapsed ? 'pl-75' : 'pl-300']">
			<select @change="changeOption($event)" v-model="selected">
				<option value="ru">Руский</option>
				<option value="ua">Українська</option>
				<option value="en">English</option>
			</select>
		</div>
	</header>
	<sidebar-menu  :menu="menu" @update:collapsed="onToggleCollapse">
		<template  v-slot:toggle-icon><img v-bind:class="[isCollapsed ? '' : 'trans-540deg']" src="../../img/sidebar_arrow.svg" alt=""></template>
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
  			
  		},
  		changeOption (event) {
  			this.changeLanguage(event.target.value)
  			
  		},
  		returnSidebarData(){
  			return [
          {
            header:  this.$t('navigation'),
            hiddenOnCollapse: true
          },
          {
            href: '/dashboard',
            title: 'Dashboard',
            icon: 'fa fa-user'
          },
          {
          	href: '/products_type',
            title: 'Products type',
            icon: 'fa fa-chart-area',
          },
          {
          	href: '/products_for_sale',
            title: 'Products for sale',
            icon: 'fa fa-chart-area',
          },
          {
            title: 'Reports',
            icon: 'fa fa-chart-area',
            child: [
              {
                href: '/reports/cashbox',
                title: 'Cashbox'
              },
              {
                href: '/reports/finance',
                title: 'Finance'
              },

              {
              	href: '/reports/purchases',
                title: 'Purchases'
              },
            ]
          },
          {
          	href: '/transfers',
            title: 'Transfers',
            icon: 'fa fa-chart-area',
          },
          {
          	href: '/shops',
            title: 'Shops',
            icon: 'fa fa-chart-area',
          },
          {
          	href: '/storages',
            title: 'Storages',
            icon: 'fa fa-chart-area',
          },
          {
          	href: '/users',
            title: 'Users',
            icon: 'fa fa-chart-area',
          },
          {
            title: 'Settings',
            icon: 'fa fa-chart-area',
            child: [
              {
                href: '/settings/translates',
                title: 'Translates'
              },
              {
                href: '/settings/permissions',
                title: 'Permissions'
              },
              {
                href: '/settings/roles',
                title: 'Roles'
              },
              {
                href: '/settings/measures',
                title: 'Measures'
              },
            ]
          },
        ]
  		},
  	},
    data() {
      return {
      	isCollapsed: false,
      	selected: this.$cookies.get('lang'),
        menu: this.returnSidebarData()
      }
    },
    
  }
</script>

<script>
	
</script>

