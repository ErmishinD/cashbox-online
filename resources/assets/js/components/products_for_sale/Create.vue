<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Создание товара для продажи') }}</h1>
	<form class="tac form" @submit="CreateProduct">
		<div class="form_content">
			<div class="form_item">
				<label class="tal" for="name">{{ $t('Название') }}*:</label>
				<input type="text" required class="form-control" name="name" v-model="formData.name">
			</div>
			<div class="form_item">
				<label class="tal" for="type">{{ $t('Категория') }}:</label>
				<select class="form-control" name="category" v-model="formData.category_id">
					<option v-for="category in categories" :value="category.id">{{category.name}}</option>
				</select>
			</div>
			<div class="form_item">
				<VueMultiselect  
					v-model="value"
					:options="contains_for_multiselect"
					track-by="name"
					label="name"
					:multiple="true"
					:placeholder="$t('Укажите состав')"
					selectLabel=""
					@select="SetContain"
					@remove="UnsetContain"
									>
				</VueMultiselect>
			</div>
			<div class="form_item" v-for="contain in selected_contains">
				<span style="margin-right: 10px;">{{contain.name}}</span>
				<input type="number" min="0" class="form-control" step="any" v-model="contain.amount">
				<select class="form-control" v-model="contain.quantity" required>
					<option v-for="measure_type in contain.measure_types" :value="measure_type.quantity">{{measure_type.name}}</option>
				</select>
			</div>				
			<file-pond
			    name="photo"
			    ref="pond"
			    v-bind:file="formData.photo"
			    v-on:init="handleFilePondInit"
			    :multiple="false"
			    maxFiles='1'
			    labelIdle="Фото товара: перетащите файлы вручную или <span class='filepond--label-action'> Навигация </span>"
			    accept="image/png, image/jpeg, image/gif"
			    :required="false"
			/>	
			<div class="form_item">
				<label class="tal" for="price">{{ $t('Цена') }}*:</label>
				<input type="number" min="1" max="999999.99" step="any" required class="form-control" name="price" v-model="formData.price">
			</div>

			<div class="custom_notification custom_notification_success form_item" v-show="cost_price">
		      		{{$t('Себестоимость товара')}}: {{cost_price}} грн
		  		</div>

		  	<div class="custom_notification custom_notification_warn" v-show="products_without_cost.length">
		      		<span>{{$t('Невозможно вычислить себестоимость таких товаров')}}:</span>
		      		<span v-for="product in products_without_cost" class="mr-5">| {{product.name}} |</span>
		  		</div>
			
			<button :disabled="!selected_contains.length" style="margin-inline:auto;"  class="btn btn-success mt-10" type="submit">{{ $t('Сохранить') }}</button>
		</div>
	</form>
	
</template>

<script>
// Import FilePond
import vueFilePond, { setOptions } from 'vue-filepond';
import VueMultiselect from 'vue-multiselect'
// Import the plugin code
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import the plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

// Import styles
import 'filepond/dist/filepond.min.css';
import "vue-multiselect/dist/vue-multiselect.css"

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
        VueMultiselect,
    },
	data(){
		return{
			formData: {
				company_id: this.$userId,
			},
			cost_price: 0,
			products_without_cost: [],
			categories: {},
			contains_for_multiselect: [],
			selected_contains: [],
			value: null,
		} 
	},
	watch:{
		selected_contains: {
		    handler() {
		      if(this.selected_contains.length){
		      	this.calcCostPrice()
		      }
		      
		    },
		    deep: true
		  },
	},
	mounted(){
		

	},
	created () {
        document.title = this.$t('Создание товара для продажи');
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/product_types/get_for_select').then((response) => {
			console.log(response.data.data)
			this.contains_for_multiselect = response.data.data
			loader.hide()
		}).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })

        this.axios.get('/api/categories').then((response) => {
			this.categories = response.data.data
			loader.hide()
		}).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
		
		
    },
    methods:{
    	SetContain(contain) {
    		this.axios.get(`/api/product_types/get_short_info/${contain.id}`).then((response) => {
    			response.data.data.amount = 0
    			response.data.data.selected_measure_type = null
    			this.selected_contains.push(response.data.data)
    		})
    		
    	},
    	UnsetContain(contain){
    		this.selected_contains.splice(this.selected_contains.indexOf(this.selected_contains.find(item => item.id == contain.id)), 1)
    	},
    	calcCostPrice(){
    		this.cost_price = 0
    		this.products_without_cost = []
    		this.selected_contains.forEach(item => {
    			if(item.price_per_unit){
    				if(item.amount && item.quantity){
    					this.cost_price += item.amount * item.quantity * item.price_per_unit
    				}
    			}
    			else{
    				this.products_without_cost.push({id: item.id, name: item.name})
    			}
    		})
    		console.log(this.cost_price)
    		console.log(this.products_without_cost)
    	},
    	CreateProduct(e) {
    		e.preventDefault()
    		this.formData.photo = document.querySelector("input[type='file']").getAttribute('value')
    		let product_types = {}
    		this.selected_contains.forEach(item => {
    			product_types[item.id] = {'quantity' : item.amount * item.quantity}
    		})
    		this.formData.product_types = product_types
    		var loader = this.$loading.show({
    		        canCancel: false,
    		        loader: 'dots',});
    		this.axios.post('/api/sell_products', this.formData).then((response) => {
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			loader.hide()
    			this.$router.push({ name: 'products_for_sale_show', params: {id: response.data.data.id}  })
    		}).catch(err => {
    			if(err.response.data.errors.name){
    				this.$notify({
	    				text: this.$t('Данное название уже существует!'),
	    				type: 'error',
	    			});
    			}
    		})
    	},
    },
}
</script>

