<template>
	<div class="">{{formData.id}} - {{formData.name}} - {{formData.barcode}}</div>
	<form @submit="update_product_info">
		<input type="text" name="id" v-model="formData.id">
		<input type="text" name="name" v-model="formData.name">
		<input type="text" name="barcode" v-model="formData.barcode">
        <file-pond
            name="photo"
            ref="pond"
            v-bind:file="formData.photo"
            v-on:init="handleFilePondInit"
            labelIdle="Перетащите файлы вручную или <span class='filepond--label-action'> Навигация </span>"
        />
		<button type="submit">{{ $t('Сохранить') }}</button>
	</form>

</template>


<script>

// Import FilePond
import vueFilePond, { setOptions } from 'vue-filepond';

// Import styles
import 'filepond/dist/filepond.min.css';

// Create FilePond component
const FilePond = vueFilePond();
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
    data(){
        return{
            product: [],
            formData: {},
        }
    },
    mounted(){
        var loader = this.$loading.show({
            canCancel: false,
            loader: 'dots',});
        this.axios.get('/api/product_types/'+this.id).then((response) => {
            this.product = response.data['data']
            document.title = this.product['name'];
            this.formData = {id: this.product.id,
                name: this.product.name,
                barcode: this.product.barcode,
                photo: ''
            }
            loader.hide()
        }).catch(function(error){
            if(error.response.status == 403){
                this.$router.push({ name: '403' })
            }
        })
    },
    created () {

    },
    methods:{
        update_product_info: function(e){
            e.preventDefault()
            this.formData.photo = document.querySelector("input[type='file']").getAttribute('value')
            this.axios.put('/api/product_types/'+this.id, this.formData).then((response) => {
            	console.log(response)
            })
        },
        handleFilePondInit: function () {
            console.log('FilePond has initialized');

            // example of instance method call on pond reference
            // this.$refs.pond.getFiles();
        },
    },
    components: {
        FilePond,
    },
}
</script>
