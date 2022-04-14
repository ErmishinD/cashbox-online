<template>
   
  <div>
    <h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{$t('Просмотр продажи')}}</h1>
    <div v-if="cashbox.shop" class="common_info">
      <div class="row-btw"><span>
        {{$t('Магазин')}}: <router-link class="redirect_from_table" v-if="$can('Shop_show')" :to="{name: 'shops_show', params: {id: cashbox.shop.id}}">{{cashbox.shop.name}}</router-link>
            <span v-else>{{cashbox.shop.name}}</span>
      </span>
      <span>
        {{$t('Оператор')}}: <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: cashbox.operator.id}}">{{cashbox.operator.name}}</router-link>
            <span v-else>{{cashbox.operator.name}}</span>
      </span></div>
      <div class="row-btw"><span>
        {{$t('Дата продажи')}}: {{cashbox.created_at}}
      </span>
      <span>
        {{$t('Общая сумма')}}: {{cashbox.all_amount}}
      </span></div>
    </div>
    <div v-if="cashbox.collected_at" class="row-btw">
      <span >
        {{$t('Дата инкассации')}}: <router-link class="redirect_from_table" v-if="$can('Cashbox_history')" :to="{name: 'reports_cashbox_collections', params: {collected_at: cashbox.collected_at}}">{{cashbox.collected_at}}</router-link>
            <span v-else>{{cashbox.collected_at}}</span>
      </span>
      <span>
        {{$t('Инкассатор')}}: <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: cashbox.collector.id}}">{{cashbox.collector.name}}</router-link>
            <span v-else>{{cashbox.collector.name}}</span>
      </span>
    </div>
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span  v-if="props.column.field == 'name'">
            <router-link class="redirect_from_table" v-if="$can('SellProduct_show')" :to="{name: 'products_for_sale_show', params: {id: props.row.id}}">{{props.row.name}}</router-link>
            <span v-else>{{props.row.name}}</span>
          </span>
      </template>
    </vue-good-table>
  </div>
</template>



<script>
export default {
	 props:[
      'id'
   ],
  data(){
    return {
      cashbox: [{
        shop:[],
        user:[],
      }],
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Стоимость'),
          field: 'amount',
        },
      ],
      rows: [],
    };
  },
  mounted(){
      this.render_list_items()
  	
  	document.title = this.$t('Просмотр продажи');
  },
  created(){

  },
  methods:{
  	render_list_items: function(){
  		var loader = this.$loading.show({
  		        canCancel: false,
  		        loader: 'dots',});
  		
  		this.axios.get(`/api/cashbox/${this.id}`).then((response) => {
             this.cashbox = response.data['data']
  		       this.rows = this.cashbox.sell_products
             console.log(this.rows)
  		       loader.hide()

  		     }).catch(function(error){
            if(error.response.status == 403){
              loader.hide()
                this.$router.push({ name: '403' })
            }
        })
  	},
  },
};
</script>


<style scoped>
  .row-btw{
    margin-bottom: 10px;
  }
</style>