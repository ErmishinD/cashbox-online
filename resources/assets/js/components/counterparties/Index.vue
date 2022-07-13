<template>
   
  <div>
    <notifications position="bottom right" />
    <GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
        <div class="getting-started-example-styled">
          <div class="getting-started-example-styled__content">
            <div class="getting-started-example-styled__title">
              {{ $t('Внимание') }}!
            </div>

            <p>{{ $t('Вы уверены, что хотите удалить') }} "{{current_name}}"?</p>
          </div>

          <div class="getting-started-example-styled__actions">
            <button @click="delCounterparty" class="btn btn-danger">
              {{ $t('Удалить') }}
            </button>
          </div>
        </div>
      </GDialog>
  	  <router-link :to="{name: 'counterparties_create'}">
  	  	<button v-if="this.$can('Counterparty_create')" class="btn btn-success pull-right mb-10" >{{ $t('Добавить контрагента') }}</button>
  	  </router-link>
  	
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link v-if="$can('Counterparty_show')" :to="{name: 'counterparties_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link v-if="this.$can('Category_edit')" :to="{name: 'counterparties_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="this.$can('Counterparty_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      counterparties: null,
      modal_show: false,
      current_name: null,
      current_id: null,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
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
  	document.title = this.$t('Контрагенты');
  },
  methods:{
  	render_list_items: function(){
  		this.emitter.emit("isLoading", true);
  		
  		this.axios.get('/api/counterparties').then((response) => {
  		       this.counterparties = response.data['data']
  		       this.rows = this.counterparties
  		       this.emitter.emit("isLoading", false);

  		     })
  	},
      onOpen(params){
        this.modal_show = true
        this.current_name = params.name
        this.current_id = params.id
        console.log(params)
      },
      delCounterparty(){
        axios.delete(`/api/counterparties/${this.current_id}`, {
          
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
  },
};
</script>