<template>
		<sidebar-menu :menu="menu" />
		<div style="padding-left: 295px;">
			<router-view></router-view>
		</div>
</template>

<script>
  export default {
    data() {
      return {
        menu: [
          {
            header: 'Main Navigation',
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
          	href: '/purchases',
            title: 'Purchases',
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
        ],
      }
    },
    methods:{

    }
  }
</script>

