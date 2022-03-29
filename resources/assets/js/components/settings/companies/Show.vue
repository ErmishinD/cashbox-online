<template>
	<div class="tac content_title">
		{{company.name}}
		<small><router-link :to="{name: 'settings_companies_edit', params: {ids: company.id}}">{{ $t('Редактировать') }}</router-link></small>
	</div>
	<div class="details col-12">
		<div class="col-6 detail">
			<div class="detail__title">
				<i class="fas fa-store"></i><span>{{ $t('Магазины') }}</span>
			</div>
			<vue-good-table style="position: static;"
		      :columns="shops_columns"
		      :rows="shops_rows"
		      :line-numbers="true">
		    </vue-good-table>
		</div>
		<div class="col-6 detail">
			<div class="detail__title">
				<i class="fas fa-users"></i><span>{{ $t('Сотрудники') }}</span>
			</div>
			<vue-good-table style="position: static;"
		      :columns="workers_columns"
		      :rows="workers_rows"
		      :line-numbers="true">
		      <template #table-row="props">
		      	  <span class="" v-if="props.column.field == 'roles'" v-for="role in props.row.roles">
		      	    {{role['human_name']}}
		      	  </span>
		          <span class="table_actions" v-if="props.column.field == 'actions'">
		            <a :href="'/login-as/' + props.row.id"><i class="fas fa-sign-out-alt"></i></a>
		          </span>
		        </template>
		    </vue-good-table>
		</div>
	</div>
</template>

<script>
export default{
	props: [
		'id'
	],
	data(){
		return{
			company: [],
			shops_columns: [
			  {
			    label: this.$t('Название'),
			    field: 'name',
			  },
			  {
			    label: this.$t('Адрес'),
			    field: 'address',
			  },
			],
			shops_rows: [],
			workers_columns: [
			  {
			    label: this.$t('Название'),
			    field: 'name',
			  },
			  {
			    label: this.$t('Роль'),
			    field: 'roles',
			  },
			  {
			    label: '',
			    field: 'actions',
			    sortable: false,
			    width: '30px',
			  },
			],
			workers_rows: [],
		} 
	},
	mounted(){
		var loader = this.$loading.show({
		        canCancel: false,
		        loader: 'dots',});
		this.axios.get('/api/companies/'+this.id).then((response) => {
		       this.company = response.data['data']
		       this.shops_rows = this.company['shops']
		       this.workers_rows = this.company['employees']
		       document.title = this.company['name'];
		       loader.hide()
		       console.table(this.company)
		     }).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
		
	},
	created () {
        
    },
}
</script>