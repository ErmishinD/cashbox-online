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
	
	<sidebar-menu  :menu="menu" @update:collapsed="onToggleCollapse">
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
  			
  		},
  		changeOption (event) {
  			this.changeLanguage(event.target.value)
  			
  		},
  		returnSidebarData(){
  			return [
          {
            href: '/dashboard',
            title: 'Dashboard',
            icon: 'fas fa-home'
          },
          {
          	href: '/products_type',
            title: 'Products type',
            icon: 'fas fa-truck',
          },
          {
          	href: '/products_for_sale',
            title: 'Products for sale',
            icon: 'fas fa-hand-holding-usd',
          },
          {
            title: 'Reports',
            icon: 'fas fa-chart-pie',
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
            icon: 'fas fa-exchange-alt',
          },
          {
          	href: '/shops',
            title: 'Shops',
            icon: 'fas fa-store',
          },
          {
          	href: '/storages',
            title: 'Storages',
            icon: 'fas fa-boxes',
          },
          {
          	href: '/users',
            title: 'Users',
            icon: 'fas fa-users',
          },
          {
            title: 'Settings',
            icon: 'fas fa-cogs',
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
              {
                href: '/settings/companies',
                title: 'Companies'
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

