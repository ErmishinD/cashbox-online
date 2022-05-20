<template @change_shop="render_list_items(true)">
	<notifications position="bottom right" />
	<GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="700">
	    <div class="getting-started-example-styled">
	      <div class="getting-started-example-styled__content">
	        <div class="getting-started-example-styled__title">
	        	{{ $t('Подтверждение продажи') }}
	        </div>

	        <div v-for="card in cards_for_sailing" class="basket_card">
	        	<div  class="basket_card_content">
	        		<div class="basket_card__photo_name">
	        			<img :src="card.photo" class="basket_card__photo">
	        			<span class="basket_card__name">{{card.name}}</span>
	        		</div>
	        		<!-- <div class="card_counter">
	        			<i @click="card.counter == 1 ? card.counter = 1 : card.counter--;  card.sum_all = (100*card.price*card.counter)/100" class="fas fa-minus"></i>
	        			<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1'); if(this.value == '') this.value = 1; " v-model="card.counter">
	        			<i @click="card.counter++; card.sum_all = (100*card.price*card.counter)/100" class="fas fa-plus"></i>
	        		</div> -->
	        		<div class="basket_card__price">
	        			<label for="price">{{ $t('Цена') }}:</label>
	        			<input type="number" min="1" name="price" v-model="card.current_price">
	        		</div>
	        		<div class="basket_card__actions">
	        			<button class="btn btn-primary" @click="cloneBasketItem(card)"><i class="fas fa-clone"></i></button>
	        			<button class="btn btn-danger" @click="removeBasketItem(card)"><i class="fas fa-trash"></i></button>
	        		</div>
	        	</div>
	        	<div class="basket_card_ingridients" v-if="card.product_types">

	        		<div class="card_dropdown_button" @click="toggleClassForDropdownInBasket(card.list_number_data)">

	        			<i class="fas fa-chevron-down" :class="selected_dropdown_in_basket.includes(card.list_number_data) ? 'fa-chevron-up' : 'fa-chevron-down'" ></i>
	        			<span>{{$t('Состав')}}</span>


	        		</div>

	        		<div v-show="selected_dropdown_in_basket.includes(card.list_number_data)" class="card_dropdown_content">
	        			<div class="card_item" v-for="card_ingridient in card.product_types">
	        				<span>
	        					{{card_ingridient.name}}:
	        				</span>

	        				<span style="word-break: break-all; text-align: end;">
	        					<input :disabled="card.product_types.length == 1"  :name="'ingridient_val_'+card_ingridient.id" type="number" @change="recountProductTypes(card_ingridient.id, card_ingridient.main_measure_type.quantity)" v-model="card_ingridient.quantity_in_main_measure_type">
	        					{{card_ingridient.main_measure_type.name}}
	        				</span>
	        			</div>
	        		</div>
	        	</div>


	        </div>
	      </div>
	      <div class="getting-started-example-styled__etc">
		      <div class="basket_sum">
		      {{$t('Итого')}}:	{{countAllProductsPrice}}грн

		      </div>
		      <div class="custom_notification custom_notification_error" v-show="overlimited_product_types.length">
		      		<span v-if="overlimited_product_types.length == 1">{{$t('На складе недостаточно товара')}}: </span>
		      		<span v-else>{{$t('На складе недостаточно товаров')}}: </span>
		      		<span class="overlimited_items" v-for="item in overlimited_product_types">| {{item.name}} - {{Math.abs(item.overlimited_quantity_in_main_measure_type)}}{{item.main_measure_type_name}} | </span>
		  		</div>
	  		</div>

	      <div class="getting-started-example-styled__actions">

	      	<button @click="FixSale('_card')" :disabled="overlimited_product_types.length" class="btn btn-warning">
	          {{ $t('Оплачено картой') }}
	        </button>
	        <button @click="FixSale('_cash')" :disabled="overlimited_product_types.length" class="btn btn-success">
	          {{ $t('Оплачено') }}
	        </button>
	      </div>
	    </div>
	  </GDialog>
	<div class="tac content_title">
		{{$t('Главная')}}
	</div>

	<div class="dashboard_actions_row">
		<input @change="search" :placeholder="$t('Поиск товара')" type="text">
        <select @change="getByCategory" v-model="selected_category">
            <option value="">{{$t('Все категории')}}</option>
            <option v-for="category in categories" :value="category.id">{{category.name}}</option>
            <option value="without_category">{{$t('Без категорий')}}</option>
        </select>
		<button  :disabled="!(this.cards_for_sailing.length)" @click="openBasket" class="btn btn-success">
			{{$t('Перейти к товарам')}}
			<span class="counter_basket_circle"><span class="counter_basket">{{this.cards_for_sailing.length}}</span></span>

		</button>
	</div>

	<div class="cards">
		<div v-for="card in cards" class="card">
			<div class="card_img"  :style="{'background-image': `url(${card.photo})`}">
				<div class="card_img_href" :id="'card_img_href_'+card.id">
					<i class="fas " :class="selected_cards.includes(card.id) ? 'fa-trash' : 'fa-plus'"  @click="toggleClassForIcon(card)"></i>
				</div>
			</div>

			<div class="card_content" :class="selected_cards.includes(card.id) ? 'bc-lightgreen' : ' '">
				<div class="card_title tac">{{card.name}}</div>
				<div class="card_items" >
					<div class="card_item">
						<span>
							{{ $t('Цена') }}:
						</span>

						<span style="word-break: break-all; text-align: end;">
							{{card.price}}грн
						</span>
					</div>
				</div>
			</div>

			<div class="card_counter" :class="selected_cards.includes(card.id) ? 'bc-lightgreen' : ' '" v-if="selected_cards.includes(card.id)">
				<i @click="clickCounter(card, 'minus')" class="fas fa-minus"></i>
				<input type="text" disabled step="any" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1'); if(this.value == '') this.value = 1; " v-model="card.counter">
				<i @click="clickCounter(card, 'plus')" class="fas fa-plus"></i>
			</div>

			<div class="card_dropdown">
				<div class="card_dropdown_button" @click="toggleClassForDropdown(card.id)">

					<i class="fas fa-chevron-down" :class="selected_dropdown.includes(card.id) ? 'fa-chevron-up' : 'fa-chevron-down'" ></i>
					<span>{{$t('Состав')}}</span>

					<div v-show="selected_dropdown.includes(card.id)" class="card_dropdown_content">
						<div class="card_item" v-for="card_ingridient in card.product_types">
							<span>
								{{card_ingridient.name}}:
							</span>

							<span style="word-break: break-all; text-align: end;">
								{{card_ingridient.quantity_in_main_measure_type}}{{card_ingridient.main_measure_type.name}}
							</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</template>

<script>

	import { GDialog } from 'gitart-vue-dialog'
	import "gitart-vue-dialog/dist/style.css";

    export default {
    	components: {
		    GDialog,
		  },
    	data(){
    		return{
    			cards: [],
                categories: [],
                selected_category: '',
    			cards_for_sailing: [],
    			selected_dropdown: [],
    			selected_cards: [],
    			selected_dropdown_in_basket: [],
    			product_types_in_basket: [],
    			products_for_sale_in_basket: [],
    			product_types_in_storages: [],
    			overlimited_product_types: [],
    			in_progress_loading_data: false,
    			modal_show: false,
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
    			all_data_is_loaded: false,
    			unmounted: false,
    			shop_id: this.$shopId
    		}
    	},
        created () {
            document.title = this.$t('Главная');
        },
        watch:{
        	shop_id(){
        		this.resetData()
        	}
        },
        mounted(){
            this.axios.post('/api/product_types/get_current_quantity', {shop_id : this.shop_id}).then((response) => {
                   this.product_types_in_storages = response.data['data']

                 })
            this.emitter.on("change_shop", res => {
                  this.shop_id = res
                  this.render_list_items(true)
                });
        	 if(this.shop_id){
                // console.log(document.addEventListener('change_shop', this.render_list_items(true)))
        	 	document.addEventListener('scroll', this.scrolltoGetMoreData)
	  		     this.render_list_items(true)
        	 }

             this.axios.get('/api/categories').then((response) => {
                this.categories = response.data['data']
             })

        },
        unmounted(){
            this.emitter.off('change_shop')
        	this.unmounted = true
        },
        computed: {

            countAllProductsPrice() {
              let sum = 0;
              this.cards_for_sailing.forEach(el => {
              	sum += parseFloat(el.current_price)
              })
              return parseFloat(sum.toFixed(10))
            }
          },
        methods: {
            getByCategory(){    
                this.serverParams.columnFilters.category_id = this.selected_category
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
        	search(e){
        		this.serverParams.columnFilters.name = e.target.value
        		this.render_list_items(true)
        	},
        	render_list_items(is_not_paginate){
        		console.log(this.cards_for_sailing.find)
        		this.in_progress_loading_data = true
        		this.emitter.emit("isLoading", true);
        		if(is_not_paginate){
        			this.serverParams.page = 1
        		}
	        	this.axios.post('/api/sell_products/get_paginated', this.serverParams).then((response) => {
	        		let data = response.data
	        		if(is_not_paginate){
	        			Promise.resolve(this.cards = data.pagination.data).then(result => {
	        				this.in_progress_loading_data = false
	        				this.cards.forEach(el => {
	        					let card =this.cards_for_sailing.find(item => item.id == el.id)
	        					if(card){
	        						el.counter = card.counter
	        					}

	        				})
	        			})
	        			this.cards.forEach(el => {
	        					el.counter = 1;
	        					el.current_price = el.price
	        					el.product_types.forEach(elem => {
	        						elem.current_quantity = elem.quantity_in_main_measure_type
	        					})
	        			})
	        		}
			        else{
			        	Promise.resolve(Array.prototype.push.apply(this.cards, data.pagination.data)).then(result => {
			        		this.in_progress_loading_data = false
			        	})
			        	console.log(this.cards)
			        }

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
        		let selected_cards = this.selected_cards
        		let product_types_in_basket = this.product_types_in_basket
        		let cards = this.cards
        		console.log(this.cards_for_sailing)
        		let index_for_removing = []
        		let cards_for_sailing = this.cards_for_sailing
        		this.cards_for_sailing.forEach(function callback(el, index, array) {
        			console.log(index, array.length)
        			if(el.id == card_data.id){
        				index_for_removing.push(index)
        				let card = cards.find(el => el.id == card_data.id)
        				card.counter = 1
        				if(selected_cards.indexOf(card_data.id) != -1){
        					selected_cards.splice(selected_cards.indexOf(card_data.id), 1)
        				}
        				stop_function = 1
        				card_data.product_types.forEach(elem => {
        					if(product_types_in_basket.find(item => item.id === elem.id)){

	    						let item = product_types_in_basket.find(item => item.id === elem.id)
	    						item.quantity -= parseFloat(elem.quantity.toFixed(10))

	    					}
        				})
        			}
        		})
        		index_for_removing.forEach(function callback(el, index, array) {
        			cards_for_sailing.splice(el-index, 1)
        		})
        		if(!stop_function){
        			console.log(card_data)
        			card_data.list_number_data = this.cards_for_sailing.length + 1
        			this.cards_for_sailing.push(card_data)
        			this.selected_cards.push(card_data.id)
        			let card = this.cards.find(el => el.id == card_data.id)
        			card.counter = 1
        			card_data.product_types.forEach(el => {
        				if(this.product_types_in_basket.find(item => item.id === el.id)){
        					let item = this.product_types_in_basket.find(item => item.id === el.id)
        					item.quantity += parseFloat(el.quantity.toFixed(10))

        				}
        				else{
        					this.product_types_in_basket.push({'id' : el.id, 'quantity': el.quantity, 'equal' : el.main_measure_type.quantity, 'name_measure_type' : el.main_measure_type.name})
        				}

        			})
        		}
        		this.compareWithStorage()
        	},

        	toggleClassForDropdown(card_id){
        		if(this.selected_dropdown.indexOf(card_id) != -1){
        			this.selected_dropdown.splice(this.selected_dropdown.indexOf(card_id), 1)
        		}
        		else{
        			this.selected_dropdown.push(card_id)
        		}
        	},

        	openBasket() {

        		this.modal_show = true
        		this.cards_for_sailing.forEach(el => {
        			el.sum_all = el.counter * el.price
        		})
        		console.table(this.product_types_in_basket)
        		console.table(this.product_types_in_storages)
        	},

        	toggleClassForDropdownInBasket(card_id){
        		if(this.selected_dropdown_in_basket.indexOf(card_id) != -1){
        			this.selected_dropdown_in_basket.splice(this.selected_dropdown_in_basket.indexOf(card_id), 1)
        		}
        		else{
        			this.selected_dropdown_in_basket.push(card_id)
        		}
        	},

        	FixSale(payment_type) {
        		this.emitter.emit("isLoading", true);
        		let data_for_sailing = this.cards_for_sailing

        		data_for_sailing.forEach(el => {
        			el.sell_product_id = el.id
        			el.amount = parseFloat(el.current_price)
        			el.product_types.forEach(elem => {
        				elem.quantity = elem.quantity_in_main_measure_type * elem.main_measure_type.quantity
        			})
        		})

        		let sale_data = {
        			'shop_id': 1,
        			'transaction_type' : '_in',
        			'payment_type' : payment_type,
        			'amount': this.countAllProductsPrice,
        			'operator_id' : 1,
        			'sell_products' : data_for_sailing
        		}

        		this.axios.post('/api/cashbox/mass_create', sale_data).then((response) => {
        			this.$notify({
        				text: this.$t('Успешно!'),
        				type: 'success',
        			});
        			this.emitter.emit("isLoading", false);
        			this.resetData()
        			this.render_list_items(true)
        		})
        	},

        	resetData(){
        		this.cards_for_sailing = []
        		this.selected_dropdown = []
        		this.selected_cards = []
        		this.selected_dropdown_in_basket = []
        		this.product_types_in_basket = []
        		this.products_for_sale_in_basket = []
        		this.product_types_in_storages = []
        		this.overlimited_product_types = []
        		this.modal_show = false
        	},

        	clickCounter(card, action){
        		if(action == 'minus'){
        			if(card.counter != 0){
        				card.product_types.forEach(el => {
        					let item = this.product_types_in_basket.find(item => item.id === el.id)
        					item.quantity = item.quantity - (el.quantity * card.counter) + (el.quantity * (card.counter - 1))
        				})

        				try{
	        				this.cards_for_sailing.forEach(function callback(el, index, array) {

	        						if(el.id == card.id){
	        							array.splice(index, 1)

	        							throw 'Break';
	        						}


	        				})
	        			} catch (e) {
						  if (e !== 'Break') throw e
						}
        			}

        			console.log(this.cards_for_sailing)
        			card.counter == 0 ? card.counter = 0 : card.counter--
                    if(card.counter == 0){
                        this.selected_cards.splice(this.selected_cards.indexOf(card.id), 1)
                    }

        		}
        		else{

        			card.product_types.forEach(el => {
        				let item = this.product_types_in_basket.find(item => item.id === el.id)
        				item.quantity = item.quantity - (el.quantity * card.counter) + (el.quantity * (card.counter + 1))
        			})
        			let copy_card = Object.assign({}, card);
        			let copy_product_types = []
        			copy_card.product_types.forEach(el => {
        				copy_product_types.push(Object.assign({}, el))
        			})
        			copy_card.list_number_data = this.cards_for_sailing.length + 1
        			copy_card.product_types = copy_product_types
        			this.cards_for_sailing.push(copy_card)
        			console.log(this.cards_for_sailing)
        			card.counter++

        		}
        		this.compareWithStorage()
        	},

        	recountProductTypes(product_type_id, product_type_equal){
        		let sum = 0
        		let items = document.querySelectorAll(`input[name=ingridient_val_${product_type_id}]`)
        		items.forEach(el => {
        			sum += parseFloat(el.value * product_type_equal)
        		})
        		let item = this.product_types_in_basket.find(item => item.id === product_type_id)
        		item.quantity = parseFloat(sum.toFixed(10))
        		this.compareWithStorage()
        	},

        	cloneBasketItem(card_data){
        		console.log(card_data)
        		card_data.counter++
        		let card_find = this.cards.find(el => el.id == card_data.id)
        		card_find.counter = card_data.counter
        		let copy_card = Object.assign({}, card_data);
        		let copy_product_types = []
        		copy_card.product_types.forEach(el => {
        			copy_product_types.push(Object.assign({}, el))
        		})
        		copy_card.product_types = copy_product_types
        		copy_card.list_number_data = this.cards_for_sailing.length + 1
        		Promise.resolve(this.cards_for_sailing.push(copy_card)).then(result => {
        		    this.product_types_in_basket.forEach(el => {
        		    	this.recountProductTypes(el.id, el.equal)
        		    })
        		});

        	},

        	removeBasketItem(card_data){
        		let cards = this.cards
        		let selected_cards = this.selected_cards
        		Promise.resolve(
        			this.cards_for_sailing.forEach(function callback(el, index, array) {
        				if (el.list_number_data == card_data.list_number_data){
        					array.splice(index, 1)

        					let card = cards.find(el => el.id == card_data.id)
        					card.counter--

        					if(cards[card_data.id - 1].counter == 0){

        						selected_cards.forEach(function callback(elem, elem_index, elem_array){
        							console.log(el.id, elem)
        							if(el.id == elem){

        								elem_array.splice(elem_index, 1)

        								return
        							}
        						})
        					}
        				}
        			})
        			).then(result => {
        		    this.product_types_in_basket.forEach(el => {
        		    	this.recountProductTypes(el.id, el.equal)
        		    })
        		});


        	},

        	compareWithStorage() {

        		let product_types_in_storages = this.product_types_in_storages
        		let overlimited_product_types = this.overlimited_product_types



        		for(let i=0; i < this.product_types_in_basket.length; i++){

        			for(let j=0; j < this.product_types_in_storages.length; j++){

        				if(this.product_types_in_basket[i].id == this.product_types_in_storages[j].id){

        					let comparing = this.product_types_in_storages[j].current_quantity - this.product_types_in_basket[i].quantity

        					if(comparing < 0){
        						let stop_comparing = false
        						this.overlimited_product_types.forEach(el => {

        							if(el.id == this.product_types_in_basket[i].id){
        								el.overlimited_quantity = comparing
        								el.overlimited_quantity_in_main_measure_type = parseFloat((comparing / product_types_in_storages[j].main_to_base_equivalent).toFixed(10))
        								stop_comparing = true
        								return
        							}
        						})
        						if(!stop_comparing){
        							let copy_overlimited_product_types = Object.assign({}, product_types_in_storages[j])
        							this.overlimited_product_types.push(
        								{
        									'id' : copy_overlimited_product_types.id,
        									'name' : copy_overlimited_product_types.name,
        									'overlimited_quantity' : comparing,
        									'overlimited_quantity_in_main_measure_type': parseFloat((comparing / product_types_in_storages[j].main_to_base_equivalent).toFixed(10)),
        									'main_measure_type_name' : this.product_types_in_basket[i].name_measure_type
        								})
        							this.$notify({
        								text: this.$t('На складе не хватает товара: ') + copy_overlimited_product_types.name,
        								type: 'error',
        							});
        						}

        					}
        					else{

        						let id = this.product_types_in_basket[i].id

        						let index_for_removing = []
        						let overlimited_product_types = this.overlimited_product_types
        						this.overlimited_product_types.forEach(function callback(el, index, array) {
        							if(el.id == id){
        								index_for_removing.push(index)

        							}
        						})

        						index_for_removing.forEach(function callback(el, index, array) {
        							overlimited_product_types.splice(el-index, 1)
        						})
        					}

        				}
        			}
        		}
        		console.log(this.overlimited_product_types)
        	},
        	manualInputCounter(card){
        		console.log('card')
        	}
        },
    }
</script>
