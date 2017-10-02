<template>
    <div>

        <div v-bind:class="{ 'no-records': true, 'hide-button': areRecords() }">
            <h1>Looks like you have not loaded any customers yet!</h1>
            <button type="button" @click='getCustomers' class="btn btn-default btn-lg">Click to load customers</button>
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
                axios.get("/api/customers").then((res) => {
                    this.tableData = res.data;
                });
            },

            areRecords(){
                return this.tableData.length;
            }
        }
    }
</script>
