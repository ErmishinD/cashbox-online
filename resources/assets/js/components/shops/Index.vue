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
  	        <button @click="delShop" class="btn btn-danger">
  	          {{ $t('Удалить') }}
  	        </button>
  	      </div>
  	    </div>
  	  </GDialog>
  	  <router-link :to="{name: 'shops_create'}">
  	  	<button v-if="this.$can('Shop_create')" class="btn btn-success pull-right mb-10" >{{ $t('Добавить магазин') }}</button>
  	  </router-link>
  	
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link v-if="this.$can('Shop_show')" :to="{name: 'shops_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link v-if="this.$can('Shop_edit')" :to="{name: 'shops_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="this.$can('Shop_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      shops: null,
      modal_show: false,
      current_name: null,
      current_id: null,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Адрес'),
          field: 'address',
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
  	document.title = this.$t('Магазины');
  },
  methods:{
  	onOpen(params){
  		this.modal_show = true
  		this.current_name = params.name
  		this.current_id = params.id
  		console.log(params)
  	},
  	delShop(){
  		axios.delete(`/api/shops/${this.current_id}`, {
  		  
  		}).then((response) => {
  			this.render_list_items()
  			this.modal_show = false
        this.$notify({
            text: this.$t('Успешно!'),
            type: 'success',
          });
  		}).catch(error => {
        if(error.response.status == 409){
          this.$notify({
            text: this.$t('Ошибка при удалении!'),
            type: 'error',
          });
          
        }
      }).finally((result) => {
        this.modal_show = false
      })

  	},
  	render_list_items: function(){
  		this.emitter.emit("isLoading", true);
  		
  		this.axios.get('/api/shops').then((response) => {
  		       this.shops = response.data['data']
  		       this.rows = this.shops
  		       this.emitter.emit("isLoading", false);

  		     })
  	},
  },
};
</script>
