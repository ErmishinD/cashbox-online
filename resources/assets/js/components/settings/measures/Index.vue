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
            <button @click="delMeasureType" class="btn btn-danger">
              {{ $t('Удалить') }}
            </button>
          </div>
        </div>
      </GDialog>
  	  <router-link :to="{name: 'settings_measures_create'}">
  	  	<button v-if="this.$can('MeasureType_create')" class="btn btn-success pull-right mb-10" >{{ $t('Добавить единицу измерения') }}</button>
  	  </router-link>
  	
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
        <span v-if="props.column.field == 'equal'">
          {{props.row.quantity}} {{props.row.base_measure_type_name}}
        </span>
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link v-if="this.$can('MeasureType_edit')" :to="{name: 'settings_measures_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a v-if="this.$can('MeasureType_delete')" @click="onOpen(props.row)" href="#"><i class="fas fa-trash-alt"></i></a>
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
      measure_types: null,
      modal_show: false,
      current_name: null,
      current_id: null,
      columns: [
        {
          label: this.$t('Название'),
          field: 'name',
        },
        {
          label: this.$t('Эквивалент'),
          field: 'equal',
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
  	document.title = this.$t('Единицы измерения');
  },
  methods:{
  	render_list_items: function(){
  		this.emitter.emit("isLoading", true);
  		
  		this.axios.get('/api/measure_types').then((response) => {
  		       this.measure_types = response.data['data']
  		       this.rows = this.measure_types
  		       this.emitter.emit("isLoading", false);

  		     })
  	},
      onOpen(params){
        this.modal_show = true
        this.current_name = params.name
        this.current_id = params.id
        console.log(params)
      },
      delMeasureType(){
        axios.delete(`/api/measure_types/${this.current_id}`, {
          
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

