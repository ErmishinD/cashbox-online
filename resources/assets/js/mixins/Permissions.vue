<script>
  export default {
    methods: {
      $can(permissionName) {
      	if(!(this.$isAdmin)){
      		return Permissions.indexOf(permissionName) !== -1;
      	}
        return true
      },
    },
  };
</script>