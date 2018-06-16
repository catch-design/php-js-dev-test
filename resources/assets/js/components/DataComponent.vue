<template>
    <div class="users">
        <div class="card card-cascade narrower mt-5">

            <!--Card image-->
            <div class="view view-cascade gradient-card-header purple-gradient narrower py-4 mx-4 mb-3 d-flex justify-content-center align-items-center">

                <h4 class="white-text font-weight-bold text-uppercase mb-0">Table name</h4>

            </div>
            <!--/Card image-->

            <div class="px-4">

                <!--Table-->
                <table class="table table-hover table-responsive-md mb-0">

                    <!--Table head-->
                    <thead>
                    <tr>
                        <th scope="row">id</th>
                        <th class="th-lg">First Name</th>
                        <th class="th-lg">Last Name</th>
                        <th class="th-lg">Email</th>
                        <th class="th-lg">Gender</th>
                        <th class="th-lg">IP Address</th>
                        <th class="th-lg">Title</th>
                        <th class="th-lg">City</th>
                        <th class="th-lg">Company</th>
                        <th class="th-lg">Website</th>
                    </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody v-if="users">
                    <tr v-for="user in users">
                        <th scope="row"> {{ user.id }}</th>
                        <td>{{ user.first_name }}</td>
                        <td>{{ user.last_name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.gender }}</td>
                        <td>{{ user.ip_address }}</td>
                        <td  v-if="user.title !== null">{{ user.title.title }}</td>
                        <td  v-else>N/A</td>
                        <td  v-if="user.city !== null">{{ user.city.city }}</td>
                        <td  v-else>N/A</td>
                        <td>{{ user.company.company }}</td>
                        <td><a :href="user.website" target="_blank" style="color: #0b51c5;">Website</a></td>
                    </tr>
                    </tbody>
                    <!--Table body-->
                </table>

            </div>

            <hr class="my-0">

            <!--Bottom Table UI-->
            <div class="d-flex justify-content-center">

                <!--Pagination -->
                <nav class="my-4 pt-2">
                    <ul class="pagination pagination-circle pg-purple mb-0">
                        <!--Arrow left-->
                        <li class="page-item">
                            <a class="page-link" aria-label="Previous" :disabled="! prevPage" @click.prevent="goToPrev">
                                <span aria-hidden="true">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">{{ paginationCount }}</li>
                        <!--Arrow right-->
                        <li class="page-item">
                            <a class="page-link" aria-label="Next" :disabled="! nextPage" @click.prevent="goToNext">
                                <span aria-hidden="true">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--/Pagination -->

            </div>
            <!--Bottom Table UI-->

        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    const getUsers = (page, callback) => {
        const params = { page };

        axios
            .get('/api/users', { params })
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };

    export default {
        data() {
            return {
                users: [],
                meta: [],
                links: [],
            };
        },
        created: function(e){
            axios.get('/api/users').then(response => {
                     this.users = response.data.data;
                     this.links = response.data.links;
                     this.meta = response.data.meta;
                });
            },
        computed: {
            nextPage() {
                if (!this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }

                return this.meta.current_page + 1;
            },
            prevPage() {
                if (!this.meta || this.meta.current_page === 1) {
                    return;
                }

                return this.meta.current_page - 1;
            },
            paginationCount() {
                if (!this.meta) {
                    return;
                }

                const {current_page, last_page} = this.meta;

                return `${current_page} of ${last_page}`;
            },
            beforeRouteEnter (to, from, next) {
                getUsers(to.query.page, (err, data) => {
                    next(vm => vm.setData(err, data));
                });
            },
            // when route changes and this component is already rendered,
            // the logic will be slightly different.
            beforeRouteUpdate (to, from, next) {
                this.users = this.links = this.meta = null
                getUsers(to.query.page, (err, data) => {
                    this.setData(err, data);
                    next();
                });
            },
        },
        methods: {
            goToNext() {
                axios.get('/api/users?page='+this.nextPage).then(response => {
                    this.users = response.data.data;
                    this.links = response.data.links;
                    this.meta = response.data.meta;
                });
            },
            goToPrev() {
                axios.get('/api/users?page='+this.prevPage).then(response => {
                    this.users = response.data.data;
                    this.links = response.data.links;
                    this.meta = response.data.meta;
                });
            },
            setData(err, { data: users, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.users = users;
                    this.links = links;
                    this.meta = meta;
                }
            },
        }
    }
</script>
