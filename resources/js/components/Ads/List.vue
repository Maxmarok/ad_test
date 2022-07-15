<template>
    <div>
        <div class="panel panel-default col-12">
            <div class="panel-heading">
                <h1>Список объявлений</h1>

                <div>
                    <router-link :to="{name: 'create'}" class="btn btn-success">Создать объявление</router-link>
                </div>
            </div>

            <div class="panel-body" v-if="ads">
                <div v-if="ads.data.length > 0">
                    <div class="panel-navigation">
                        <pagination :limit=3 align="left" :data="ads" :show-disabled=true @pagination-change-page="changePage">
                            <span class="pagination-icon-arrow"></span>
                            <span class="pagination-icon-arrow"></span>
                        </pagination>

                        <div class="panel-sorting">
                            <select v-model="order" @change="changeSort">
                                <option value="created_at" selected>Дата создания</option>
                                <option value="price">Цена</option>
                            </select>

                            <select v-model="sort" @change="changeSort">
                                <option value="desc" selected>По убыванию</option>
                                <option value="asc">По возврастанию</option>
                            </select>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Фото</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="ad in ads.data" :key="ad.id">
                            <td>
                                <router-link :to="{ name: 'item', params: { id: ad.id } }" v-html="ad.title" />
                            </td>
                            <td>{{ ad.fullPrice }}</td>
                            <td><img width="50" :src="ad.photo"></td>
                        </tr>
                        </tbody>
                    </table>

                    <pagination :limit=3 align="left" :data="ads" :show-disabled=true @pagination-change-page="changePage">
                        <span class="pagination-icon-arrow"></span>
                        <span class="pagination-icon-arrow"></span>
                    </pagination>
                </div>

                <div v-else>
                    <p>Объявление не найдены, <router-link :to="{name: 'create'}">создайте первое объявление</router-link>!</p>
                </div>
            </div>

            <div v-else>
                <p>Загружается список объявлений...</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {ADS_GET_LIST} from "../../api-routes"
    import pagination from 'laravel-vue-pagination';

    export default {
        components: {
            pagination,
        },
        data() {
            return {
                ads: null,
                order: 'created_at',
                sort: 'desc',
            }
        },

        mounted() {
            this.getList();
        },

        methods: {
            getList() {
                axios.post(ADS_GET_LIST, {page: this.page, order: this.order, sort: this.sort})
                    .then(res => {
                        console.log(res);
                        this.ads = res.data;
                    });
            },
            changePage(page) {
                this.page = page;
                this.getList();
            },
            changeSort() {
                this.getList();
            },
        }
    }
</script>
