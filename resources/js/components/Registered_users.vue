<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Registered Users Table</h1>                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">User Type</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers" :key="customer.id">
                                    <td>{{ customer.customer_id }}</td>
                                    <td>{{ customer.customer_first_name }}</td>
                                    <td>{{ customer.customer_last_name }}</td>
                                    <td>{{ customer.customer_email }}</td>
                                    <td>{{ customer.customer_username }}</td>
                                    <td>{{ customer.customer_user_type }}</td>
                                    <td v-if="customer.customer_status == 'active'">
                                        <!-- <span class="badge badge-pill badge-success"  >{{ customer.status.charAt(0).toUpperCase() + customer.status.substr(1) }}</span> -->
                                        <span class="badge badge-pill badge-success"  >{{ customer.customer_status }}</span>
                                    </td>
                                    <td v-else>
                                        <!-- <span class="badge badge-pill badge-warning" >{{ customer.status.charAt(0).toUpperCase() + customer.status.substr(1) }}</span> -->
                                        <span class="badge badge-pill badge-warning" >{{ customer.customer_status }}</span>
                                    </td>                                    
                                </tr>                    
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>        
    </div>
</template>

<script>
    import axios from 'axios';
	import Form from 'vform'

	export default {        
		data() {			
			return {		
                customers : {},				
			}
		},
        methods : {                       
            loadCustomers() {               
                axios.get('admin/customer')
                .then(( {data}) => (this.customers = data.data))
                .catch(function(error) {
                    console.log(error);
                });                
            },           
        },
        created() {
            this.loadCustomers();
        },		
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>
