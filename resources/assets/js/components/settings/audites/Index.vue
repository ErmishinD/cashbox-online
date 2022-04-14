<template>

  <div>

    <vue-good-table style="position: static;"
      mode="remote"
      v-on:page-change="onPageChange"
      v-on:sort-change="onSortChange"
      v-on:column-filter="onColumnFilter"
      v-on:per-page-change="onPerPageChange"
      :totalRows="totalRecords"
      :isLoading.sync="isLoading"
      :pagination-options="{
        enabled: true,
      }"
      :columns="columns"
      :rows="rows"
      :line-numbers="true"
      >
      <template #table-row="props">
        <span  v-if="props.column.field == 'user.name'">
          <router-link class="redirect_from_table" v-if="$can('User_show')" :to="{name: 'users_show', params: {id: props.row.user.id}}">{{props.row.user.name}}</router-link>
          <span v-else>{{props.row.user.name}}</span>
        </span>

        <span v-if="props.column.field == 'action'">
          {{$t(props.row.action)}}
        </span>

        <span class="redirect_from_table" @click="redirectToRoute(props.row)" v-if="props.column.field == 'text'">
          {{props.row.text}}
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
      totalRecords: 0,
      serverParams: {
        columnFilters: {
        },
        sort: {
            field: '',
            type: '',
        },
        page: 1,
        perPage: 10
      },
      columns: [
        {
          label: this.$t("Оператор"),
          field: 'user.name'
        },
        {
          label: this.$t("Дата изменения"),
          field: 'created_at'
        },
        {
          label: this.$t("Действие"),
          field: 'action',
        },
        {
          label: this.$t("Описание"),
          field: 'text'
        },
        
      ],
      rows: [],
    };
  },
  mounted(){
  	this.render_list_items()
  	document.title = this.$t('Архив закупок');
  },
  methods:{
  	render_list_items: function(){
  		this.loadItems()
  	},
    redirectToRoute(row){
      let params = new Object()
      let row_params = Object.entries(row.params)
      row_params.forEach(item => {
        params[item[0]] = item[1]
      })
      this.$router.push({ name: row.route, params: params })
    },
      updateParams(newProps) {
          this.serverParams = Object.assign({}, this.serverParams, newProps);
      },

      onPageChange(params) {
          this.updateParams({page: params.currentPage});
          this.loadItems();
      },

      onPerPageChange(params) {
          this.updateParams({perPage: params.currentPerPage, page: 1});
          this.loadItems();
      },

      onSortChange(params) {
  	    let data = Object.assign({}, params)[0]

          
          this.updateParams({
              sort: [{
                  type: data.type,
                  field: data.field,
              }],
              page: 1
          });
          this.loadItems();
      },

      onColumnFilter(params) {
        console.log(params.columnFilters.type)
          this.updateParams(params);
          this.loadItems();
      },

      // load items is what brings back the rows from server
      loadItems() {
          var loader = this.$loading.show({
              canCancel: false,
              loader: 'dots',});
          this.axios.post('/api/system_logs/get_paginated', this.serverParams).then((response) => { 
              this.rows = response.data['pagination']['data']
              this.totalRecords = response.data['pagination']['total'];
              loader.hide()

          }).catch(function(error){
            if(error.response.status == 403){
            	loader.hide()
                this.$router.push({ name: '403' })
            }
        })
      }
  },
};
</script>