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
	        		<div class="card_counter">
	        			<i @click="card.counter == 1 ? card.counter = 1 : card.counter--" class="fas fa-minus"></i>
	        			<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1'); if(this.value == '') this.value = 1;" v-model="card.counter">
	        			<i @click="card.counter++" class="fas fa-plus"></i>
	        		</div>
	        		<div class="basket_card__price">
	        			<label for="price">{{ $t('Цена') }}:</label>
	        			<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1'); if(this.value == '') this.value = 1;" name="price" :value="card.price*card.counter">
	        		</div>
	        	</div>
	        	<div class="basket_card_ingridients">

	        		<div class="card_dropdown_button" @click="toggleClassForDropdownInBasket(card.id)">
	        			
	        			<i class="fas fa-chevron-down" :class="selected_dropdown_in_basket.includes(card.id) ? 'fa-chevron-up' : 'fa-chevron-down'" ></i>
	        			<span>{{$t('Состав')}}</span>

	        			
	        		</div>

	        		<div v-show="selected_dropdown_in_basket.includes(card.id)" class="card_dropdown_content">
	        			<div class="card_item" v-for="card_ingridient in card.product_types">
	        				<span>
	        					{{card_ingridient.name}}:
	        				</span>

	        				<span style="word-break: break-all; text-align: end;">
	        					<input name="ingridient_val" type="number" :step="card_ingridient.quantity_in_main_measure_type" :value="card_ingridient.quantity_in_main_measure_type">
	        					{{card_ingridient.main_measure_type.name}}
	        				</span>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        

	      </div>

	      <div class="getting-started-example-styled__actions">
	        <button @click="" class="btn btn-success">
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
				<i @click="card.counter == 1 ? card.counter = 1 : card.counter--" class="fas fa-minus"></i>
				<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1'); if(this.value == '') this.value = 1; card.counter = this.value;" v-model="card.counter">
				<i @click="card.counter++" class="fas fa-plus"></i>
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
		       })
		       loader.hide()
		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		window.location.href = '/403';
  		     	}
  		     })
  		     
        },
        methods: {
        	toggleClassForIcon(card_data) {
        		let stop_function = 0
        		let selected_cards = this.selected_cards
        		this.cards_for_sailing.forEach(function callback(el, index, array) {

        			if(el.id == card_data.id){
        				console.log(array, index)
        				array = array.splice(index, 1)
        				selected_cards.splice(selected_cards.indexOf(card_data.id), 1)
        				stop_function = 1
        				return;
        				
        			}
        		})

        		if(!stop_function){
        			console.log(card_data)
        			this.cards_for_sailing.push(card_data)
        			this.selected_cards.push(card_data.id)
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
        		console.table(this.cards_for_sailing)
        		this.modal_show = true
        	},

        	toggleClassForDropdownInBasket(card_id){
        		if(this.selected_dropdown_in_basket.indexOf(card_id) != -1){
        			this.selected_dropdown_in_basket.splice(this.selected_dropdown_in_basket.indexOf(card_id), 1)
        		}
        		else{
        			this.selected_dropdown_in_basket.push(card_id)
        		}
        	}
        },
    }
</script>