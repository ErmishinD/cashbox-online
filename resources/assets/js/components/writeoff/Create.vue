<template>
	<notifications position="bottom right" />
	<GDialog style="z-index: 9999;" :persistent="true" v-model="set_storage_show" max-width="700">
	    <div class="getting-started-example-styled">
	      <div class="getting-started-example-styled__content">
	        <div class="getting-started-example-styled__title">
	        	{{ $t('Выберите склад') }}:
	        </div>
	        <select v-model="selected_storage"  class="def_select center-flex" name="select_storage" id="">
	        	<optgroup v-for="shop in storage_list" :label="shop.name">
	        		<option v-for="storage in shop.storages" :value="storage.id">{{storage.name}}</option>
	        	</optgroup>
	        </select>
	      </div>


	      <div class="getting-started-example-styled__actions">

	      	<button @click="this.set_storage_show=false" :disabled="!this.selected_storage" class="btn btn-success">
	          {{ $t('Выбрать') }}
	        </button>
	      </div>
	    </div>
	  </GDialog>

	  <GDialog style="z-index: 9999;" :persistent="false" v-model="basket_modal_show" max-width="700">
	      <div class="getting-started-example-styled">
	        <div class="getting-started-example-styled__content">
	          <div class="getting-started-example-styled__title">
	          	{{ $t('Подтверждение списания') }}
	          	<div class="select_storage">
	          		<span>{{ $t('Выберите склад') }}:</span>
	          		<select v-model="selected_storage" class="def_select" name="select_storage" id="">
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

	        <div class="custom_notification custom_notification_error" v-show="overlimited_product_types.length">
		      		<span v-if="overlimited_product_types.length == 1">{{$t('На складе недостаточно товара')}}: </span>
		      		<span v-else>{{$t('На складе недостаточно товаров')}}: </span>
		      		<span class="overlimited_items" v-for="item in overlimited_product_types">| {{item.name}} - {{Math.abs(item.overlimited_quantity_in_main_measure_type)}}{{item.main_measure_type.name}} | </span>
		  		</div>

	        <div class="getting-started-example-styled__actions">

	        	<button @click="saveWriteOff" :disabled="overlimited_product_types.length" class="btn btn-success">
	            {{ $t('Сохранить') }}
	          </button>
	        </div>
	      </div>
	    </GDialog>

	  <h1 class="tac content_title">
		  {{ $t('Списание') }}
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
			<div class="card_img"  :style="{'background-image': `url(${card.photo})`}">
				<div class="card_img_href" :id="'card_img_href_'+card.id">
					<i class="fas " :class="selected_products.find(item => item.id == card.id) ? 'fa-trash' : 'fa-plus'"  @click="toggleClassForIcon(card)"></i>
				</div>
			</div>

			<div class="card_content" :class="selected_products.find(item => item.id == card.id) ? 'bc-lightgreen' : ' '">
				<div class="card_title tac">{{card.name}}</div>

				<div class="card_items">
					<div class="card_item">
						<span>
							{{ $t('Кол-во на складе') }}:
						</span>

						<span style="word-break: break-all; text-align: end;">
							{{card.current_quantity_in_main_measure_type}}{{card.main_measure_type.name}}
						</span>
					</div>
					<div v-if="card.expired_current_quantity_in_main_measure_type" class="card_item" style="border-top: 1px solid #000;">
						<span>
							{{ $t('Просрочено на складе') }}:
						</span>

						<span style="word-break: break-all; text-align: end;">
							{{card.expired_current_quantity_in_main_measure_type}}{{card.main_measure_type.name}}
						</span>
					</div>
				
			</div>
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
			selected_storage: null,
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
        	selected_storage(){
        		if(this.selected_storage){
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
		// console.log(this.product_type_id, this.storage_id)
		this.selected_storage = this.storage_id
		this.axios.post('/api/storages/get_for_purchase', {company_id:1}).then(response => {
			this.storage_list = response.data.data
			// console.log(this.storage_list)
			if(!this.storage_id){
				this.set_storage_show = true

			}
			else{
				this.selected_storage = this.storage_id
			}
		})

		this.render_list_items(true)


	},
	unmounted(){

		this.unmounted = true
	},
	created () {
        document.title = this.$t('Списание')
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
    	toggleClassForIcon(card_data) {
    		let stop_function = 0
    		let cards = this.cards
    		let selected_product = this.selected_products.find(item => item.id == card_data.id)
    		if(selected_product){
    			this.selected_products.splice(this.selected_products.indexOf(selected_product), 1)
    		}
    		else{
    			this.selected_products.push(card_data)
    			// console.log(this.selected_products)
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
    			let item_quantity = item.amount * item.quantity
    			if(item_quantity > parseInt(product_in_storage.current_quantity ? product_in_storage.current_quantity : 0) + parseInt(product_in_storage.expired_current_quantity ? product_in_storage.expired_current_quantity : 0)){
    				item.overlimited_quantity_in_main_measure_type = ((item.quantity * item.amount) - (parseInt(item.current_quantity ? item.current_quantity : 0) + parseInt(item.expired_current_quantity ? item.expired_current_quantity : 0))) / item.main_measure_type.quantity
    				this.overlimited_product_types.push(item)
    			}
    		})
    		
    	},

    	getCurrentQuantity(){
			this.axios.post('/api/product_types/get_current_quantity', {storage_ids:[this.selected_storage], with_expired:1}).then(response => {
				this.storage_balance = response.data.data
				this.storage_balance.forEach(item => {
					let product = this.cards.find(prod => prod.id == item.id)
					if(product){
						
						let new_product = Object.assign(product, item)
						product = new_product
					}
					
				})
				console.log(this.cards)
			})
    	},

    	saveWriteOff(){
    		let write_off_data = {}
    		console.log(this.selected_products)
			this.emitter.emit("isLoading", true);
			write_off_data.storage_id = this.selected_storage
			write_off_data.product_types = this.selected_products
			write_off_data.product_types.forEach(el => {
				el.quantity *= el.amount
				el.product_type_id = el.id
			})
			console.log(write_off_data)
			this.axios.post('/api/storages/write_off', write_off_data).then((response) => {
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
    				// console.log(this.in_progress_loading_data)
    				if (bottomOfWindow) {
    				  this.render_list_items(false)
    				}
    			}
    		};
    	},
    },
}
</script>
