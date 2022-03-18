<template>

  <div>
  	<GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
  	    <div class="getting-started-example-styled">
  	      <div class="getting-started-example-styled__content">
  	        <div class="getting-started-example-styled__title">
  	          {{ $t('Внимание') }}!
  	        </div>

  	        <p>{{ $t('Вы уверены, что хотите удалить') }} "{{current_name}}"?</p>
  	      </div>

  	      <div class="getting-started-example-styled__actions">
  	        <button @click="delProduct" class="btn btn-danger">
  	          {{ $t('Удалить') }}
  	        </button>
  	      </div>
  	    </div>
  	  </GDialog>
  	  <router-link :to="{name: 'products_for_sale_create'}">
  	  	<button class="btn btn-success pull-right mb-10" >{{ $t('Добавить товар') }}</button>
  	  </router-link>
  	
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link :to="{name: 'products_for_sale_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link :to="{name: 'products_for_sale_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
          </span>
        </template>
    </vue-good-table>
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
    return {
      products: null,
      modal_show: false,
      current_name: null,
      current_id: null,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Цена'),
          field: 'price',
        },
        {
          label: this.$t('Действия'),
          field: 'actions',
          sortable: false,
          width: '65px',
        },
      ],
      rows: [],
    };
  },
  mounted(){
  	this.render_list_items()
  	document.title = this.$t('Товары на продажу');
  },
  methods:{
  	onOpen(params){
  		this.modal_show = true
  		this.current_name = params.name
  		this.current_id = params.id
  		console.log(params)
  	},
  	delProduct(){
  		axios.delete(`/api/sell_products/${this.current_id}`, {
  		  
  		}).then((response) => {
  			this.render_list_items()
  			this.modal_show = false
  		});

  	},
  	render_list_items: function(){
  		var loader = this.$loading.show({
  		        canCancel: false,
  		        loader: 'dots',});
  		
  		this.axios.get('/api/sell_products').then((response) => {
  		       this.products = response.data['data']
  		       this.rows = this.products
  		       loader.hide()

  		     }).catch(function(error){
  		     	if(error.response.status == 403){
  		     		this.$router.push({ name: '403' })
  		     	}
  		     })
  	},
  },
};
</script>