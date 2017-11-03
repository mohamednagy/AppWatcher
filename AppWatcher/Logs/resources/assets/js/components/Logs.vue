<template>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-bars"></i> LATEST LOGS</h3>

        <div class="box-tools">
            <pagination :data="logs" v-on:pagination-change-page="getLogs" class="pagination pagination-sm no-margin pull-right"></pagination>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="col-12 box-table-filter form-inline">
            <span class="filter-label"><b><i class="fa fa-filter"></i> Filter: </b></span>
                <div class="col-md-4">
                    <label class="control-label">Type</label>
                    <select class="form-control" v-model="selectedLogType" v-on:change="getLogs()">
                        <option value="">all</option>
                        <option value="0">Error</option>
                        <option value="1">Warning</option>
                        <option value="2">Info</option>
                    </select>
                </div>
            </div>
        <table class="table">
          <tr>
            <th>Log</th>
            <th style="width: 150px">Time</th>
            <th style="width: 40px">Type</th>
          </tr>
          <tbody>
              <tr v-for="log in logs.data">
                <td>{{log.log}}</td>
                <td>
                  {{log.created_at}}
                </td>
                <td><a v-on:click="Bus.$emit('log-tag-selected', log.type)" class="badge" v-bind:class="'bg-'+log.type">{{log.type}}</a></td>
              </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
</template>

<script>
    import axios from 'axios';
    import Paginate from 'laravel-vue-pagination';

    export default {
        components: {
            'pagination': Paginate
        },
        data() {
            return {
                logs: {},
                errors: [],
                Bus: window.Bus,
                selectedTags: null,
                selectedLogType: ''
                
            }
        },
        created(){
            let _this = this;
            window.Bus.$on('log-tag-selected', function (tagName) {
                _this.selectedTags = tagName;
                _this.getLogs();
            });
        },
        mounted() {
            this.getLogs();
        },
        methods: {
            getLogs : function(page){
                var type = this.$attrs['log-type'] || null;
                var url = "logs?page="+(page || 1);
                if(type){
                    url +=  "&type="+type;
                }
                if(this.selectedTags){
                    url += "&tag="+this.selectedTags;
                }
                if(this.selectedLogType.length != 0){
                    url +='&type='+this.selectedLogType;
                }
                axios.get(url)
                .then(response => {
                  // JSON responses are automatically parsed.
                  this.logs = response.data;
                })
                .catch(e => {
                  this.errors.push(e)
                })
              }
        }
    }
</script>
