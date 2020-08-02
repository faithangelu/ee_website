<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Users Table</h1>

                        <div class="card-tools">
                            <!-- <button class="btn btn-info">Add New User</button> -->
                            <button
                                type="button"
                                class="btn btn-primary"
                                @click="newUser"
                            >
                                Add New User
                                <i class="fa fa-user-plus fa-fw"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td v-if="user.status == 'active'">
                                        <span class="badge badge-pill badge-success"  >{{ user.status.charAt(0).toUpperCase() + user.status.substr(1) }}</span>
                                    </td>
                                    <td v-else>
                                        <span class="badge badge-pill badge-warning" >{{ user.status.charAt(0).toUpperCase() + user.status.substr(1) }}</span>
                                    </td>
                                    <td>
                                        <a @click="viewUser(user)" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye fa-fw" data-toggle="tooltip" title="View"></i>
                                        </a>
                                        <a @click="editUser(user)" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit fa-fw" data-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        <a @click="deleteUser(user.id)" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash fa-fw" data-toggle="tooltip" title="Delete"></i>
                                        </a>
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
        <div
            class="modal fade"
            id="userModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="userModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">
                            
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateUser() : createUser()">
                        
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('email')
                                    }"
                                />
                                <has-error :form="form" field="email"></has-error>
                            </div>                            
                            <div class="form-group">
                                <label>Password</label>
                                <input
                                    v-model="form.password"
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('password')
                                    }"
                                />
                                <has-error :form="form" field="password"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input
                                    v-model="form.password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    autocomplete="new-password"                                   
                                />
                            </div>
                            <div class="form-group">
                                <label>Status</label>                            
                                <select name="status" id="status" class="form-control" placeholder="P" v-model="form.status" :class="{
                                        'is-invalid': form.errors.has('status')
                                    }">
                                    <option selected disabled>Please select User status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <has-error :form="form" field="status"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </form>

                </div>
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
				editmode: false,
                users : {},
				form: new Form({
                    id: '',
					name: '',
                    email: '',
                    password : '',
                    password_confirmation : '',
					status: '',
				}),
			}
		},
        methods : {                     
            newUser() {
                this.editmode = false;
                this.form.reset();
                $('#userModal').modal('show');
                $('#userModalLabel').html('Add new User');
            },
            viewUser(user) {
                // this.form.get(`/user/${user}`); 
                this.form.fill(user);
                $('#userModal').modal('show');
                $('#userModalLabel').html('View User');
                $('.form-control').attr('readonly', 'readonly');
            },
            editUser(user) {
                this.editmode = true;
                this.form.reset();
                $('#userModal').modal('show');
                $('#userModalLabel').html('Edit User');
                this.form.fill(user);
            },
            loadUsers() {               
                axios.get('admin/user')
                .then(( {data}) => (this.users = data.data))
                .catch(function(error) {
                    console.log(error);
                });                
            },
            createUser() {                
                this.form.post('admin/user')
                .then(({ data }) => {
                    Toast.fire({
                        icon: data.status,
                        title: data.message
                    })
                    $('#userModal').modal('hide');
                    this.loadUsers();
                })
                .catch(()=> {
                    Toast.fire({
                        icon: data.status,
                        title: data.message                           
                    })
                });                            
            },            
            updateUser() {
                this.form.put(`admin/user/${this.form.id}`)
                .then(( { data }) => {
                    // success
                    $('#userModal').modal('hide');
                    Swal.fire(
                        'Updated!',
                        data.message,
                        data.status
                    )    
                    this.loadUsers();               
                })
                .catch(() => {
                    
                });
            },
            deleteUser(id) {
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((response) => {
                    if (response.value) {
                        this.form.delete(`admin/user/${id}`).then(({ data }) => {
                            console.log(data)
                            Swal.fire(
                                'Deleted!',
                                data.message,
                                data.status
                            )
                            this.loadUsers();

                        }).catch(() => {
                            Swal.fire(
                                'Failed',
                                'Something went wrong',
                                'warning'                
                            )
                        })
                    }
                })

            }
        },
        created() {
            this.loadUsers();
        },		
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>
