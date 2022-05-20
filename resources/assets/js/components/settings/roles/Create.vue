<template>
	<notifications position="bottom right" />
	<h1 class="tac">{{ $t('Создание роли') }}</h1>
	<form @submit="create_role">
		<div class="form_content">
			<div style="width: 300px; margin-inline: auto;" class="form_item ">
				<label for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.human_name">
			</div>
			<div class="permissions_blocks">
				<div v-for="(permission_list, name) in permissions" class="permission_block">
					<div class="permission_name">{{name}}</div>
					<div class="permission_item" v-for="permission in permission_list">
						<input type="checkbox" @change="togglePermissionList(permission.id)"> {{permission.ability}}
					</div>
				</div>
			</div>
			<button style="margin-inline:auto;" class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
		</div>
		
	</form>
	
</template>

<script>
export default{
	data(){
		return{
			formData: {},
			permissions: null,
			selected_permissions: [],
		} 
	},
	mounted(){
		document.title = this.$t('Создание роли');
		this.emitter.emit("isLoading", true);
		this.axios.get('/api/permissions').then((response) => {
			this.permissions = response.data.data
			this.emitter.emit("isLoading", false);
		})
		
	},
	created () {
        
    },
    methods:{
    	create_role: function(e){
    		e.preventDefault()
    		this.emitter.emit("isLoading", true);
    		console.log(this.formData)
    		this.formData.permissions = this.selected_permissions
    		this.axios.post('/api/roles', this.formData ).then((response) => {
    			console.log(response.data.data.id)
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    		}).catch(err => {
    			console.log()
    		})
    		this.emitter.emit("isLoading", false);
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
