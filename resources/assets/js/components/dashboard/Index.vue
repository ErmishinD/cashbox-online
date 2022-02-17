<template>
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
	        					<input :disabled="card.product_types.length == 1"  :name="'ingridient_val_'+card_ingridient.id" type="number" @change="recountProductTypes(card_ingridient.id)" v-model="card_ingridient.quantity_in_main_measure_type">
	        					{{card_ingridient.main_measure_type.name}}
	        				</span>
	        			</div>
	        		</div>
	        	</div>

	        
	        </div>
	      </div>

	      <div class="getting-started-example-styled__actions">
	      	<div class="basket_sum">
	      		{{countAllProductsPrice}}

	      	</div>
	      	<div class="" v-show="overlimited_product_types.length">sdfsdgdfg</div>
	        <button @click="FixSale" class="btn btn-success">
	          {{ $t('Подтвердить') }}
	        </button>
	      </div>
	    </div>
	  </GDialog>
	<div class="tac content_title">
		{{$t('Главная')}}
	</div>

	<div class="dashboard_actions_row">
		<input :placeholder="$t('Поиск товара')" type="text">
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
				<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1'); if(this.value == '') this.value = 1; card.counter = this.value;"  v-model="card.counter">
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
    			cards_for_sailing: [],
    			selected_dropdown: [],
    			selected_cards: [],
    			selected_dropdown_in_basket: [],
    			product_types_in_basket: [],
    			products_for_sale_in_basket: [],
    			product_types_in_storages: [],
    			overlimited_product_types: [],
    			modal_show: false,
    		}
    	},
        created () {
            document.title = this.$t('Главная');

        },
        mounted(){
        	var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
        	this.axios.get('/api/sell_products').then((response) => {
		       this.cards = response.data['data']
		       this.cards.forEach(el => {
		       		el.counter = 1;
		       		el.current_price = el.price
		       		el.product_types.forEach(elem => {
		       			elem.current_quantity = elem.quantity_in_main_measure_type
		       		})
		       })
		       loader.hide()
		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		window.location.href = '/403';
  		     	}
  		     })

  		     this.axios.post('/api/product_purchases/get_for_dashboard', {shop_id : 1}).then((response) => {
		       this.product_types_in_storages = response.data['data']
		       
		       loader.hide()
		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		window.location.href = '/403';
  		     	}
  		     })
  		     
        },
        computed: {

            countAllProductsPrice() {
              let sum = 0;
              this.cards_for_sailing.forEach(el => {
              	sum += parseFloat(el.current_price)
              })
              return parseFloat(sum).toFixed(2)
            }
          },
        methods: {
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
        				
        				// array.splice(index, 1)
        				index_for_removing.push(index)

        				cards[card_data.id - 1].counter = 1
        				if(selected_cards.indexOf(card_data.id) != -1){
        					selected_cards.splice(selected_cards.indexOf(card_data.id), 1)
        				}
        				
        				stop_function = 1

        				card_data.product_types.forEach(elem => {
        					if(product_types_in_basket.find(item => item.id === elem.id)){

	    						let item = product_types_in_basket.find(item => item.id === elem.id)
	    						item.quantity -= parseFloat(elem.quantity)

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

        			card_data.product_types.forEach(el => {
        				if(this.product_types_in_basket.find(item => item.id === el.id)){
        					let item = this.product_types_in_basket.find(item => item.id === el.id)
        					item.quantity += parseFloat(el.quantity)
        					
        				}
        				else{
        					this.product_types_in_basket.push({'id' : el.id, 'quantity': el.quantity})
        				}
        				
        			})
        			
        		}
        		
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

        	FixSale() {
        		console.table(this.cards_for_sailing)
        	},

        	clickCounter(card, action){
        		if(action == 'minus'){
        			if(card.counter != 1){
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
        			card.counter == 1 ? card.counter = 1 : card.counter--

        		}
        		else{
        			
        			card.product_types.forEach(el => {
        				let item = this.product_types_in_basket.find(item => item.id === el.id)
        				item.quantity = item.quantity - (el.quantity * card.counter) + (el.quantity * (card.counter + 1))
        			})
        			let copy_card = Object.assign({}, card);
        			copy_card.list_number_data = this.cards_for_sailing.length + 1
        			this.cards_for_sailing.push(copy_card)
        			console.log(this.cards_for_sailing)
        			card.counter++
        			
        		}
        	},

        	recountProductTypes(product_type_id){
        		let sum = 0
        		let items = document.querySelectorAll(`input[name=ingridient_val_${product_type_id}]`)
        		console.log(items)
        		items.forEach(el => {
        			sum += parseFloat(el.value)
        		})
        		let item = this.product_types_in_basket.find(item => item.id === product_type_id)
        		item.quantity = sum
        		console.table(this.product_types_in_basket)
        		console.table(this.product_types_in_storages)
        		this.compareWithStorage()
        	},

        	cloneBasketItem(card_data){
        		console.log()
        		let copy_card = Object.assign({}, card_data);
        		let copy_product_types = []
        		copy_card.product_types.forEach(el => {
        			copy_product_types.push(Object.assign({}, el))
        		})
        		copy_card.product_types = copy_product_types
        		copy_card.list_number_data = this.cards_for_sailing.length + 1
        		Promise.resolve(this.cards_for_sailing.push(copy_card)).then(result => {
        		    this.product_types_in_basket.forEach(el => {
        		    	this.recountProductTypes(el.id)
        		    })
        		});

        	},

        	removeBasketItem(card_data){
        		let cards = this.cards
        		Promise.resolve(
        			this.cards_for_sailing.forEach(function callback(el, index, array) {
        				if (el.list_number_data == card_data.list_number_data){
        					array.splice(index, 1)
        					cards[card_data.id - 1].counter -= 1
        				}
        			})
        			).then(result => {
        		    this.product_types_in_basket.forEach(el => {
        		    	this.recountProductTypes(el.id)
        		    })
        		});
        		
        		
        	},

        	compareWithStorage() {
        		let product_types_in_storages = this.product_types_in_storages
        		let overlimited_product_types = this.overlimited_product_types

        		// this.product_types_in_basket.forEach(function callback(el, index, array) {
        			
        		// 	product_types_in_storages.forEach(function callback(elem, elem_index, elem_array) {
        		// 		console.log(array, elem_array)
        		// 		if(el.id == elem.id){
        					
        		// 			if(elem.current_quantity - el.quantity < 0){
        		// 				overlimited_product_types.push(elem.name)
        		// 				console.log('dsfsdfsd')
        		// 			}
        		// 			else{
        		// 				el.splice(index, 1)
        		// 			}
        		// 		}
        		// 	})
        		// })

        		for(let i=0; i < this.product_types_in_basket.length; i++){
        			
        			for(let j=0; j < this.product_types_in_storages.length; j++){
        				
        				if(this.product_types_in_basket[i].id == this.product_types_in_storages[j].id){
        					console.log('sdfsdf')
        					if(this.product_types_in_storages[j].current_quantity - this.product_types_in_basket[i].quantity < 0){
        						this.overlimited_product_types.push(this.product_types_in_storages[j].name)
        						console.log(this.overlimited_product_types)
        					}
        					
        				}
        			}
        		}
        		
        	}
        },
    }
</script>