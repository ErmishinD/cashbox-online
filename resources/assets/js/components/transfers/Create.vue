<template>
	<notifications position="bottom right" />
	<GDialog style="z-index: 9999;" :persistent="true" v-model="set_storage_show" max-width="700">
	    <div class="getting-started-example-styled">
	      <div class="getting-started-example-styled__content">
	        <div class="getting-started-example-styled__title">
	        	{{ $t('Выберите склад') }}:
	        </div>
	        <select v-model="storage_from"  class="def_select center-flex" name="select_storage" id="">
	        	<optgroup v-for="shop in storage_list" :label="shop.name">
	        		<option v-for="storage in shop.storages" :value="storage.id">{{storage.name}}</option>
	        	</optgroup>
	        </select>
	      </div>


	      <div class="getting-started-example-styled__actions">

	      	<button @click="this.set_storage_show=false" :disabled="!this.storage_from" class="btn btn-success">
	          {{ $t('Выбрать') }}
	        </button>
	      </div>
	    </div>
	  </GDialog>

	  <GDialog style="z-index: 9999;" :persistent="false" v-model="basket_modal_show" max-width="700">
	      <div class="getting-started-example-styled">
	        <div class="getting-started-example-styled__content">
	          <div class="getting-started-example-styled__title">
	          	{{ $t('Подтверждение трансфера') }}
	          	<div class="select_storage">
	          		<span>{{ $t('Выберите склад-отправитель') }}:</span>
	          		<select v-model="storage_from" class="def_select" name="select_storage" id="">
	          		<optgroup v-for="shop in storage_list" :label="shop.name">
	          			<option v-for="storage in shop.storages" :value="storage.id">{{storage.name}}</option>
	          		</optgroup>
	          	</select>
	          	</div>

	          	<div class="select_storage">
	          		<span>{{ $t('Выберите склад-получатель') }}:</span>
	          		<select v-model="storage_to" class="def_select" name="select_storage" id="">
	          		<optgroup v-for="shop in storage_list" :label="shop.name">
	          			<option v-for="storage in shop.storages" :value="storage.id">{{storage.name}}</option>
	          		</optgroup>
	          	</select>
	          	</div>

	          </div>

	          <div v-for="card in selected_products" class="basket_card">
	          	<div class="basket_card_rows">
	          		<div  class="basket_card_row">
	          			<div class="basket_card__photo_name">
	          				<img :src="card.photo" class="basket_card__photo">
	          				<span class="basket_card__name">{{card.name}}</span>
	          			</div>
	          			<div class="basket_card__amount">
	          				<label for="amount">{{ $t('Кол-во') }}:</label>
	          				<input step="any" name="amount" type="number" min="0" v-model="card.amount">
	          				<select v-model="card.quantity" name="" id="">
	          					<option :value="measure_type.quantity" v-for="measure_type in card.measure_types">{{measure_type.name}}</option>
	          				</select>
	          			</div>
	          			<div class="basket_card__actions">
	          				<button class="btn btn-primary" @click="cloneBasketItem(card)"><i class="fas fa-clone"></i></button>
	          				<button class="btn btn-danger" @click="removeBasketItem(card)"><i class="fas fa-trash"></i></button>
	          			</div>
	          		</div>
	          	</div>



	          </div>

	          
	        </div>

	        <div class="custom_notification custom_notification_error" v-show="!storage_to">
	        	<span>{{$t('Не выбран склад-получатель!')}}</span>
	        </div>

	        <div class="custom_notification custom_notification_error" v-show="overlimited_product_types.length">
		      		<span v-if="overlimited_product_types.length == 1">{{$t('На складе недостаточно товара')}}: </span>
		      		<span v-else>{{$t('На складе недостаточно товаров')}}: </span>
		      		<span class="overlimited_items" v-for="item in overlimited_product_types">| {{item.name}} - {{Math.abs(item.overlimited_quantity_in_main_measure_type)}}{{item.main_measure_type.name}} | </span>
		  		</div>

	        <div class="getting-started-example-styled__actions">

	        	<button @click="saveTransfer" :disabled="overlimited_product_types.length" class="btn btn-success">
	            {{ $t('Сохранить') }}
	          </button>
	        </div>
	      </div>
	    </GDialog>

	  <h1 class="tac content_title">
		  {{ $t('Трансфер') }}
		</h1>

	<div class="dashboard_actions_row">
		<input @change="search" :value="this.changable_product_name" :placeholder="$t('Поиск товара')" type="text">
		<button  :disabled="!(this.selected_products.length)" @click="openBasket" class="btn btn-success">
			{{$t('Перейти к товарам')}}
			<span class="counter_basket_circle"><span class="counter_basket">{{this.selected_products.length}}</span></span>

		</button>
	</div>

	<div class="cards">
		<div v-for="card in cards" class="card">
			<div class="card_img"  :style="{'background-image': $getBackgroundImage(card.photo)}">
				<div class="card_img_href" :id="'card_img_href_'+card.id">
					<i class="fas " :class="selected_products.find(item => item.id == card.id) ? 'fa-trash' : 'fa-plus'"  @click="toggleClassForIcon(card)"></i>
				</div>
			</div>

			<div class="card_content" :class="selected_products.find(item => item.id == card.id) ? 'bc-lightgreen' : ' '">
				<div class="card_title tac">{{card.name}}</div>
			</div>
		</div>
	</div>
</template>


<script>
import { GDialog } from 'gitart-vue-dialog'
import "gitart-vue-dialog/dist/style.css";

export default{

	components: {
		    GDialog,
		  },
	props: [
		'product_type_id',
		'storage_id',
		'product_name'
	],
	data(){
		return{
			set_storage_show: false,
			basket_modal_show: false,
			storage_list: [],
			selected_products: [],
			storage_from: null,
			storage_to: null,
			cards: [],
			storage_balance: [],
			error_while_saving: false,
			in_progress_loading_data: false,
			all_data_is_loaded: false,
			unmounted: false,
			is_search_from_other_page: false,
			changable_product_name: this.product_name,
			overlimited_product_types: [],
			serverParams: {

			  columnFilters: {
			  	name: '',
			  },
			  sort: {
			      field: '',
			      type: '',
			  },
			  page: 1,
			  perPage: 20
			},
		}
	},
	watch:{
			// при изменении склада меняется баланс товаров
        	storage_from(){
        		if(this.storage_from){
        			this.getCurrentQuantity()
        			
        		}
        		
        	},
        	selected_products: {
        	    handler() {
        	      if(this.storage_balance.length){
        	      	this.compareWithStorage()
        	      }
        	      
        	    },
        	    deep: true
        	  },
        },
	mounted(){
		document.addEventListener('scroll', this.scrolltoGetMoreData)
		console.log(this.product_type_id, this.storage_id)
		this.storage_from = this.storage_id
		this.axios.post('/api/storages/get_for_purchase', {company_id:1}).then(response => {
			this.storage_list = response.data.data
			console.log(this.storage_list)
			if(!this.storage_id){
				this.set_storage_show = true

			}
			else{
				this.storage_from = this.storage_id
			}
		})

		this.render_list_items(true)


	},
	unmounted(){

		this.unmounted = true
	},
	created () {
        document.title = this.$t('Трансфер')
    },
    methods: {
    	render_list_items(is_not_paginate=true){
    		this.in_progress_loading_data = true
    		this.emitter.emit("isLoading", true);
    		if(is_not_paginate){
    			this.serverParams.page = 1
    		}
    		if(this.product_type_id && !this.is_search_from_other_page){
    			this.serverParams.columnFilters.name = this.product_name

    		}
    		this.axios.post('/api/product_types/get_for_purchase', this.serverParams).then(response => {
    			let data = response.data
	    			if(is_not_paginate){
	    				Promise.resolve(this.cards = response.data.pagination.data).then(result => {
	    					this.in_progress_loading_data = false
	    				})
	    				
	    				if(this.product_type_id && !this.is_search_from_other_page){
	    					let selected_out_card = this.cards.find(item => item.id == this.product_type_id)
	    					this.selected_products.push(selected_out_card)
	    					this.is_search_from_other_page = true
	    				}
	    			}
	    			else{
	    				Promise.resolve(Array.prototype.push.apply(this.cards, data.pagination.data)).then(result => {
	    					this.in_progress_loading_data = false
	    				})
	    			}

	    			this.cards.forEach(el => {
	    					el.amount = 0
	    					el.expiration = 0;
	    					el.quantity = 1
	    					el.current_price = 0
	    				})

	    			if(data.pagination.last_page != data.pagination.current_page){
	    				 this.serverParams.page = data.pagination.current_page+1
	    				 this.all_data_is_loaded = false
	    			}
	    			else{
	    				this.all_data_is_loaded = true
	    			}

	    			this.emitter.emit("isLoading", false);
    			})

    	},
    	getCurrentQuantity(){
    		this.axios.post('/api/product_types/get_current_quantity', {storage_ids:[this.storage_from]}).then(response => {
    			this.storage_balance = response.data.data
    		})
    	},
    	toggleClassForIcon(card_data) {
    		let stop_function = 0
    		let cards = this.cards
    		let selected_product = this.selected_products.find(item => item.id == card_data.id)
    		if(selected_product){
    			this.selected_products.splice(this.selected_products.indexOf(selected_product), 1)
    		}
    		else{
    			this.selected_products.push(card_data)
    			console.log(this.selected_products)
    		}
    	},
    	openBasket(){
    		this.basket_modal_show = true
    	},
    	cloneBasketItem(card){
    		let new_card = {...card}
    		new_card.amount = 0
    		new_card.expiration = 0;
    		new_card.quantity = 1
    		new_card.current_price = 0
    		this.selected_products.push(new_card)
    	},
    	removeBasketItem(card){
    		let card_for_remove = this.selected_products.find(item => item == card)
    		this.selected_products.splice(this.selected_products.indexOf(card_for_remove), 1)
    	},
    	// сравнение кол-ва выбранного товара с кол-вом этого товара на складе
    	compareWithStorage(){
    		this.overlimited_product_types = []
    		this.selected_products.forEach(item => {
    			let product_in_storage = this.storage_balance.find(product => product.id == item.id)
    			console.log(product_in_storage)
    			console.log(item)
    			let item_quantity = item.amount * item.quantity
    			if(item_quantity > product_in_storage.current_quantity){
    				item.overlimited_quantity_in_main_measure_type = ((item.quantity * item.amount) - product_in_storage.current_quantity) / product_in_storage.main_measure_type.quantity
    				this.overlimited_product_types.push(item)
    			}
    		})
    		console.log(this.overlimited_product_types)
    	},
    	saveTransfer(){
    		let transfer_data = {}
    		console.log(this.selected_products)
			this.emitter.emit("isLoading", true);
			transfer_data.from_storage_id = this.storage_from
			transfer_data.to_storage_id = this.storage_to
			transfer_data.product_types = this.selected_products
			transfer_data.product_types.forEach(el => {
				el.quantity *= el.amount
				el.product_type_id = el.id
			})
			console.log(transfer_data)
			this.axios.post('/api/storages/transfer', transfer_data).then((response) => {
				this.$notify({
					text: this.$t('Успешно!'),
					type: 'success',
				});
				this.getCurrentQuantity()
				this.emitter.emit("isLoading", false);
				this.basket_modal_show = false
				this.selected_products = []
			})

    	},
    	search(e){
    		this.changable_product_name = e.target.value
    		this.serverParams.columnFilters.name = e.target.value
    		this.render_list_items(true)
    	},
    	scrolltoGetMoreData(){

    		window.onscroll = () => {
    			if(!this.all_data_is_loaded && !this.unmounted) {
    				let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight >= (document.body.scrollHeight - 100) && !this.in_progress_loading_data
    				console.log(this.in_progress_loading_data)
    				if (bottomOfWindow) {
    				  this.render_list_items(false)
    				}
    			}
    		};
    	},
    },
}
</script>