<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Редактирование категории') }}</h1>
	<form class="tac form" @submit="update_category">
		<div style="width: 100%;">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<file-pond
                    name="photo"
                    ref="pond"
                    v-bind:file="formData.photo"
                    v-on:init="handleFilePondInit"
                    :multiple="false"
                    maxFiles='1'
                    labelIdle="Фото категории: перетащите файлы вручную или <span class='filepond--label-action'> Навигация </span>"
                    accept="image/png, image/jpeg, image/gif"
                    :required="false"
                /> 
			<button style="margin-inline:auto;" class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
		</div>
	</form>
</template>

<script>

// Import FilePond
import vueFilePond, { setOptions } from 'vue-filepond';
// Import the plugin code
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import the plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

// Import styles
import 'filepond/dist/filepond.min.css';

// Create FilePond component
const FilePond = vueFilePond(FilePondPluginImagePreview);
// FilePond.registerPlugin(FilePondPluginImagePreview);

setOptions({
    server: {
        url: '/api/file_upload',
        headers: {
            'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
        },
        process: {
            onload: function (response) {
                document.querySelector("input[type='file']").setAttribute('value', response)

                return response
            },
        }
    }
});

export default{
	props: [
		'id'
	],
	components: {
        FilePond,
    },
data(){
	return{
		formData: {
			
		},
	} 
},
mounted(){
	var loader = this.$loading.show({
	        canCancel: false,
	        loader: 'dots',});
	this.axios.get('/api/categories/'+this.id).then((response) => {
	       this.formData = response.data['data']
	       document.title = this.formData['name'];
	       loader.hide()
	     }).catch(function(error){
        if(error.response.status == 403){
        	loader.hide()
            this.$router.push({ name: '403' })
        }
    })
	
},
created () {
    
},
methods:{
	update_category: function(e){
		e.preventDefault()
		var loader = this.$loading.show({
	        canCancel: false,
	        loader: 'dots',});
		console.log(this.formData)
		let photo = document.querySelector("input[type='file']").getAttribute('value')
    		if(photo){
    			this.formData.photo = photo
    		}
		this.axios.put('/api/categories/'+this.id, this.formData ).then((response) => {
			console.log(response.data.data.id)
			this.$notify({
				text: this.$t('Успешно!'),
				type: 'success',
			});
		}).catch(err => {
			console.log()
			if(err.response.data.errors.name){
				this.$notify({
					text: this.$t('Данное название категории уже существует!'),
					type: 'error',
				});
			}
			else{
					this.$notify({
					text: this.$t('Произошла ошибка!'),
					type: 'error',
				});
			}
		}).finally(result => {
			loader.hide()
		})
	}
},
}
</script>