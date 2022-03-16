<script>
export default {
  methods: {
    $can(permissionName) {
      if (!(JSON.parse(localStorage.getItem('isAdmin')))) {
        console.log(JSON.parse(localStorage.getItem('isAdmin')));
        return Permissions.indexOf(permissionName) !== -1;
      }
      return true
    },
  },
};
</script>
