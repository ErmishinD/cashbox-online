<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Редактирование роли') }}</h1>
	<form @submit="update_role">
		<div class="form_content">
			<div style="width: 300px; margin-inline: auto;" class="form_item ">
				<label for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.human_name">
			</div>
			<div class="permissions_blocks">
				<div v-for="(permission_list, name) in permissions" class="permission_block">
					<div class="permission_name">{{name}}</div>
					<div class="permission_item" v-for="permission in permission_list">
						<input type="checkbox" :checked="selected_permissions.find(item => item == permission.id)" @change="togglePermissionList(permission.id)"> {{permission.ability}}
					</div>
				</div>
			</div>
			<button style="margin-inline:auto;" class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
		</div>
		
	</form>
	
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			formData: {},
			permissions: null,
			selected_permissions: [],
		} 
	},
	mounted(){
		document.title = this.$t('Редактирование роли')
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/permissions').then((response) => {
			this.permissions = response.data.data
			this.axios.get(`/api/roles/${this.id}`).then((result) => {
				this.formData = result.data.data
				this.formData.permissions.forEach(item => {
					this.selected_permissions.push(item)
				})
			})
		}).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
		loader.hide()
	},
	created () {
        
    },
    methods:{
    	update_role: function(e){
    		e.preventDefault()
    		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
    		console.log(this.formData)
    		this.formData.permissions = this.selected_permissions
    		this.axios.put(`/api/roles/${this.id}`, this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    		}).catch(err => {
    			console.log()
    		})
    		loader.hide()
    	},
    	togglePermissionList(permission_id){
    		if(this.selected_permissions.find(item => item == permission_id)){
    			this.selected_permissions.splice(this.selected_permissions.indexOf(permission_id), 1)
    		}
    		else{
    			this.selected_permissions.push(permission_id)
    		}
    		console.log(this.selected_permissions)
    	}
    },
}
</script>
