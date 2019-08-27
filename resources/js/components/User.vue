<template>
    <div class="user-management">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/">
                        Laravel
                    </a>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ currentUser.name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="list_user table-responsive container">
            <br>
            <b-pagination
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
                    aria-controls="my-table"
                    align="center"
            ></b-pagination>
            <b-table
                    id="my-table"
                    :items="list_users"
                    :per-page="perPage"
                    :current-page="currentPage"
                    :fields="fields"
                    :caption-top="true"
                    :sort-by.sync="sortBy"
                    :sort-desc.sync="sortDesc"
                    responsive="sm"
            >
                <template slot="[role]" slot-scope="data">
                    <div v-for="role in data.item.roles ">
                    {{ role.name }}
                    </div>
                </template>
                <template slot="[action]" slot-scope="data">
                    <div v-if="checkIsAdmin()">
                    <b-button variant="success" @click="showEditModal(data.item, data.index, $event.target)">
                        Edit
                    </b-button>
                    <b-button variant="danger">Delete</b-button>
                    </div>
                </template>
            </b-table>
        </div>
        <hr>
        <div class="create-user container" >
            <b-form @submit="createUser">
                <div class="row">
                    <div class="col-md-3">
                        <b-input v-model="userCreate.name" :state="nameValidation" placeholder="Name..."></b-input>
                        <b-form-invalid-feedback :state="nameValidation">
                            Your name must be longer 8 characters.
                        </b-form-invalid-feedback>
                        <b-form-valid-feedback :state="nameValidation">
                            Success!
                        </b-form-valid-feedback>
                    </div>
                    <div class="col-md-3">
                        <b-input v-model="userCreate.email" :state="emailValidation" placeholder="User email..."></b-input>
                        <b-form-invalid-feedback :state="emailValidation">
                            Your email must be email type!
                        </b-form-invalid-feedback>
                        <b-form-valid-feedback :state="emailValidation">
                            Success!
                        </b-form-valid-feedback>
                    </div>
                    <div class="col-md-3">
                        <b-form-select class="form-control" v-model="userCreate.role">
                            <option value="employee">Employee</option>
                            <option value="saler">Saler</option>
                            <option value="admin">Admin</option>
                        </b-form-select>
                    </div>
                    <div class="col-md-3">
                        <b-button  variant="primary" @click="createUser">Create</b-button>
                    </div>
                </div>
            </b-form>
        </div>
        <!-- Table User -->

        <!--modal-->
        <b-modal
                :id="modalEditForm.id"
                ref="modal"
                :title="modalEditForm.title"
                ok-only @hide="resetInfoModal"
                centered
        >
            <b-form @submit.stop.prevent="editUser">
                <b-input-group prepend="Username">
                    <b-input v-model="modalEditForm.content.name" :state="nameValidation"></b-input>
                    <b-form-invalid-feedback :state="nameValidation">
                        Your name must be longer 8 characters.
                    </b-form-invalid-feedback>
                    <b-form-valid-feedback :state="nameValidation">
                        Success!
                    </b-form-valid-feedback>
                </b-input-group>
                <br>
                <b-input-group prepend="Email">
                    <b-form-input v-model="modalEditForm.content.email" :state="emailValidation"></b-form-input>
                    <b-form-invalid-feedback :state="emailValidation">
                        Your email must be email type!
                    </b-form-invalid-feedback>
                    <b-form-valid-feedback :state="emailValidation">
                        Success!
                    </b-form-valid-feedback>
                </b-input-group>
                <br>
                <b-input-group prepend="Role">
                    <b-form-select class="form-control" v-model="modalEditForm.content.role">
                        <option value="employee">Employee</option>
                        <option value="saler">Saler</option>
                        <option value="admin">Admin</option>
                    </b-form-select>
                </b-input-group>
            </b-form>
        </b-modal>
        <!--end modal-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                userCreate: {
                  name: '',
                  email: '',
                  role: 'employee'
                },
                currentUser: {},
                list_users: [],
                perPage: 3,
                currentPage: 3,
                fields: ['name', 'email', 'role', 'action'],
                sortBy: 'name',
                sortDesc: false,
                check: false,
                modalEditForm: {
                    id: 'modal-edit-form',
                    title: '',
                    content: ''
                }
            }
        },
        created() {
            this.getCurrentUser();
            this.getListUsers();
        },
        methods: {
            getCurrentUser() {
                axios.get('/getCurrentUser')
                    .then(response => {
                        this.currentUser = response.data;
                        this.checkIsAdmin();
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            getListUsers() {
                axios.get('/users')
                    .then(response => {
                        this.list_users = response.data;
                        this.list_users.forEach(user => {
                            Vue.set(user, 'isEdit', false)
                        });
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            checkIsAdmin() {

                if (this.currentUser.roles) {
                    let check = false;
                    this.currentUser.roles.forEach(role => {
                        if (role.name === 'admin') {
                            check = true;
                        }
                    });
                    return check;
                }
            },
            createUser(evt) {
                evt.preventDefault();

                axios.post('/users', {
                    user: this.userCreate
                })
                    .then( response => {
                        console.log(response);
                        this.userCreate = {};
                        this.getListUsers();
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            editModal(item) {
                console.log(item)
            },
            showEditModal(item, index, button) {
                console.log(item, index, button);
                this.modalEditForm.title = `edit: ${index}`;
                this.$bvModal.show('modal-edit-form');
                this.modalEditForm.content = item;
            },
            resetInfoModal() {
                this.infoModal.title = '';
                this.infoModal.content = '';
            },
        },
        computed: {
            rows() {
                return this.list_users.length
            },
            nameValidation() {
                if(this.userCreate.name.length == 0) {

                    return null;
                }
                return this.userCreate.name.length > 7;
            },
            emailValidation() {
                if (!this.userCreate.email) {
                    return null;
                }
                const emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                return emailReg.test(this.userCreate.email);
            }
        }

    }
</script>

<style scoped>

</style>