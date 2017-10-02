<template>
    <div>
        <div v-bind:class="{ 'no-records': true, 'hide-button': areRecords() }">
             
            <h2>Looks like you have not loaded any customers yet!</h2>
            <button type="button" @click='getCustomers' class="btn btn-default btn-lg">Click to load customers 
                <span v-bind:class="{ 'spinner' : true, 'show' : loading }">
                    <span class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></span>
                </span>
            </button>
        </div>

        <div class='records'>
            <v-client-table :data="tableData" :columns="columns" :options="options">
                <template slot="website" scope="props">
                    <div>
                        <a :href="props.row.website">Link</a>
                    </div>
                </template>
            </v-client-table>
        </div> 
        
    </div>
</template>

<script> 

    export default {
        data () {
             return {
                loading: false,
                columns: ['id','first_name','last_name','email','gender','ip_address','company','city','title','website'],
                tableData: [],
                 options: {
                    templates: {
                        
                    }
                 }
             }
        },

        mounted() {
        },
        
        methods : {   
            
            getCustomers(){
                this.loading = true;
                axios.get("/api/customers").then((res) => {
                    this.loading = false;
                    this.tableData = res.data;
                });
            },

            areRecords(){
                return this.tableData.length;
            }
        }
    }
</script>
