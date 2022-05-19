<template>
	<notifications position="bottom right" />
	<h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{ $t('Редактирование товара для продажи') }}</h1>
	<form class="tac form" @submit="UpdateProduct">
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
					v-model="default_selected_contains"
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
				<input type="number"  class="form-control" step="any" v-model="contain.quantity_in_main_measure_type">
				<select class="form-control"  v-model="contain.quantity" required>
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
			productData: {},
			categories: {},
			contains_for_multiselect: [],
			default_selected_contains: [],
			selected_contains: [],
			cost_price: 0,
			products_without_cost: [],
			contains: null,
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
        document.title = this.$t('Редактирование товара для продажи');
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get(`/api/sell_products/${this.id}`).then((response) => {
			this.formData = response.data.data
			this.productData = response.data.data
			this.productData.product_types.forEach(item => {
				item.quantity = item.main_measure_type.quantity
				this.selected_contains.push(item)
				this.default_selected_contains.push(item)
				loader.hide()
			}).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
			
		})

			this.axios.get('/api/product_types/get_for_select').then((response) => {
				console.log(response.data.data)
				this.contains_for_multiselect = response.data.data
			})
		
		this.axios.get('/api/categories').then((response) => {
                this.categories = response.data.data
                this.formData.category_id = this.formData.category.id
                loader.hide()
            }).catch(function(error){
                if(error.response.status == 403){
                    loader.hide()
                    this.$router.push({ name: '403' })
                }
            })
		
    },
    methods:{
    	calcCostPrice(){
    		this.cost_price = 0
    		this.products_without_cost = []
    		
    		this.selected_contains.forEach(item => {
    			if(item.price_per_unit){
    				
    				if(item.quantity_in_main_measure_type && item.quantity){
    					this.cost_price += item.quantity_in_main_measure_type * item.quantity * item.price_per_unit
    				}
    			}
    			else{
    				this.products_without_cost.push({id: item.id, name: item.name})
    			}
    		})
    	},
    	SetContain(contain) {
    		this.axios.get(`/api/product_types/get_short_info/${contain.id}`).then((response) => {
    			response.data.data.quantity_in_main_measure_type = 0
    			response.data.data.selected_measure_type = null
    			this.selected_contains.push(response.data.data)
    		})
    		
    	},
    	UnsetContain(contain){
    		this.selected_contains.splice(this.selected_contains.indexOf(this.selected_contains.find(item => item.id == contain.id)), 1)
    	},
    	UpdateProduct(e) {
    		e.preventDefault()
    		if(!this.selected_contains.length){
    			this.$notify({
	    				text: this.$t('Укажите состав!'),
	    				type: 'error',
	    			});
    			return
    		}
    		let photo = document.querySelector("input[type='file']").getAttribute('value')
    		if(photo){
    			this.formData.photo = photo
    		}
    		
    		let product_types = {}
    		console.log(this.selected_contains)
    		this.selected_contains.forEach(item => {
    			product_types[item.id] = {'quantity' : item.quantity_in_main_measure_type * item.quantity}
    		})
    		this.formData.product_types = product_types
    		var loader = this.$loading.show({
    		        canCancel: false,
    		        loader: 'dots',});
    		this.axios.put(`/api/sell_products/${this.id}`, this.formData).then((response) => {
    			this.$notify({
    				text: this.$t('Успешно!'),
    				type: 'success',
    			});
    			loader.hide()
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
