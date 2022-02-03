<template>

  <div>
  	<GDialog style="z-index: 9999;" :persistent="false" v-model="modal_show" max-width="500">
  	    <div class="getting-started-example-styled">
  	      <div class="getting-started-example-styled__content">
  	        <div class="getting-started-example-styled__title">
  	          Attention!
  	        </div>

  	        <p>Are you sure for delete "{{current_name}}"?</p>
  	      </div>

  	      <div class="getting-started-example-styled__actions">
  	        <button @click="delCompany" class="btn btn-danger">
  	          Submit
  	        </button>
  	      </div>
  	    </div>
  	  </GDialog>
  	  <router-link :to="{name: 'settings_companies_create'}">
  	  	<button class="btn btn-success pull-right mb-10" >Add company</button>
  	  </router-link>
  	
    <vue-good-table style="position: static;"
      :columns="columns"
      :rows="rows"
      :line-numbers="true">
      <template #table-row="props">
          <span class="table_actions" v-if="props.column.field == 'actions'">
            <router-link :to="{name: 'settings_companies_show', params: {id: props.row.id}}"><i class="fas fa-eye"></i></router-link>
            <router-link :to="{name: 'settings_companies_edit', params: {id: props.row.id}}"><i class="fas fa-edit"></i></router-link>
            <a @click="onOpen(props.row)" href="#"><i   class="fas fa-trash-alt"></i></a>
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
      companies: null,
      modal_show: false,
      current_name: null,
      current_id: null,
      columns: [
        {
          label: 'Name',
          field: 'name',
        },
        {
          label: 'Actions',
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
  	document.title = 'Companies';
  },
  methods:{
  	onOpen(params){
  		this.modal_show = true
  		this.current_name = params.name
  		this.current_id = params.id
  		console.log(params)
  	},
  	delCompany(){
  		axios.delete(`/api/companies/${this.current_id}`, {
  		  
  		}).then((response) => {
  			this.render_list_items()
  			this.modal_show = false
  		});

  	},
  	render_list_items: function(){
  		var loader = this.$loading.show({
  		        canCancel: false,
  		        loader: 'dots',});
  		
  		this.axios.get('/api/companies').then((response) => {
  		       this.companies = response.data['data']
  		       this.rows = this.companies
  		       loader.hide()

  		     })
  	},
  },
};
</script>


<!-- <template>
	<div v-for="company in companies" class="" >
		{{company['id']}} - {{company}}
	</div>

</template>


<script>
	export default{
		data(){
			return{
				companies: null,
				
			} 
		},
		setup() {
			
		},
		mounted(){
			var loader = this.$loading.show({
			        canCancel: false,
			        loader: 'dots',});
			
			this.axios.get('/api/companies').then((response) => {
			       this.companies = response.data['data']
			       loader.hide()

			     })

		},
		created () {
            document.title = "Products for sale";
            

        },
	}
</script> -->


