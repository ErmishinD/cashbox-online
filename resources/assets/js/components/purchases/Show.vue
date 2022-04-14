<template>
   
  <div>
    <h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{$t('Просмотр закупки')}}</h1>
    <div v-if="purchases.storage" class="common_info">
      <div class="row-btw"><span>
        {{$t('Склад')}}: <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: purchases.storage.id}}">{{purchases.storage.name}}</router-link>
            <span v-else>{{purchases.storage.name}}</span>
      </span>
      <span>
        {{$t('Оператор')}}: <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: purchases.user.id}}">{{purchases.user.name}}</router-link>
            <span v-else>{{purchases.user.name}}</span>
      </span></div>
      <div class="row-btw"><span>
        {{$t('Дата закупки')}}: {{purchases.created_at}}
      </span>
      <span>
        {{$t('Общая сумма')}}: {{purchases.all_amount}}
      </span></div>
    </div>
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span  v-if="props.column.field == 'name'">
            <router-link class="redirect_from_table" v-if="$can('ProductType_show')" :to="{name: 'products_type_show', params: {id: props.row.id}}">{{props.row.name}}</router-link>
            <span v-else>{{props.row.name}}</span>
          </span>

          <span  v-if="props.column.field == 'product_types_count'">
            {{props.row.quantity}} {{props.row.main_measure_type.name}}
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
      purchases: [{
        storage:[],
        user:[],
      }],
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Кол-во'),
          field: 'product_types_count',
        },
        {
          label: this.$t('Срок годности'),
          field: 'expiration_date',
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
  	document.title = this.$t('Просмотр закупки');
  },
  created(){

  },
  methods:{
  	render_list_items: function(){
  		var loader = this.$loading.show({
  		        canCancel: false,
  		        loader: 'dots',});
  		
  		this.axios.get(`/api/product_purchases/${this.id}`).then((response) => {
             this.purchases = response.data['data']
  		       this.rows = this.purchases.product_types
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