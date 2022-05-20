<template>
   
    <h1 class="tac"><button class="btn btn-primary pull-left pos-ab" onclick="javascript:history.back()"><i class="fas fa-arrow-left mr-10"></i>{{$t('Назад')}}</button>{{$t('Просмотр трансфера')}}</h1>
    <div v-if="transfer.from_storage" class="common_info">
      <div class="row-btw"><span>
        {{$t('Склад-отправитель')}}: <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: transfer.from_storage.id}}">{{transfer.from_storage.name}}</router-link>
            <span v-else>{{transfer.from_storage.name}}</span>
      </span>
      <span>
        {{$t('Склад-получатель')}}: <router-link class="redirect_from_table" v-if="$can('Storage_show')" :to="{name: 'storages_show', params: {id: transfer.to_storage.id}}">{{transfer.to_storage.name}}</router-link>
            <span v-else>{{transfer.to_storage.name}}</span>
      </span>
      </div>
      <div class="row-btw"><span>
        {{$t('Дата трансфера')}}: {{transfer.created_at}}
      </span>
      <span>
        {{$t('Оператор')}}: <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: transfer.transferred_by.id}}">{{transfer.transferred_by.name}}</router-link>
            <span v-else>{{transfer.transferred_by.name}}</span>
      </span>
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
            {{props.row.quantity / props.row.main_measure_type.quantity}} {{props.row.main_measure_type.name}}
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
      transfer: [{
        from_storage:[],
        to_storage:[],
        transferred_by:[],
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
      ],
      rows: [],
    };
  },
  mounted(){
    this.render_list_items()
  	document.title = this.$t('Просмотр трансфера');
  },
  created(){

  },
  methods:{
  	render_list_items: function(){
  		this.emitter.emit("isLoading", true);
  		
  		this.axios.get(`/api/transfers/${this.id}`).then((response) => {
             this.transfer = response.data['data']
  		       this.rows = this.transfer.product_types
             console.log(this.rows)
  		       this.emitter.emit("isLoading", false);

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