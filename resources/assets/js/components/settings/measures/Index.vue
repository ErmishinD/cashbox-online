<template>
   
  <div>
    <notifications position="bottom right" />
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
  		var loader = this.$loading.show({
  		        canCancel: false,
  		        loader: 'dots',});
  		
  		this.axios.get('/api/measure_types').then((response) => {
  		       this.measure_types = response.data['data']
  		       this.rows = this.measure_types
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

