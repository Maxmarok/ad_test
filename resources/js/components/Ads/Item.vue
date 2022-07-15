<template>
    <div class="d-flex flex-column">
        <div class="form-group mx-auto col-12 col-lg-6">
            <router-link :to="{name: 'list'}" class="btn btn-default btn-primary">Вернуться к списку объявлений</router-link>
        </div>

        <div class="panel panel-default col-12 col-lg-6" v-if="ad">
            <h1 class="panel-heading text-center mb-4" v-html="ad.title" />
            <div class="panel-body">
                <div class="d-flex flex-column">
                    <div class="col-xs-12 form-group">
                        <label class="control-label">Цена</label>
                        <input readonly v-model="ad.fullPrice" class="form-control">
                    </div>

                    <div class="col-xs-12 form-group">
                        <label class="control-label">Описание</label>
                        <textarea readonly v-model="ad.description" class="form-control" />
                    </div>

                    <div class="col-xs-12 form-group" v-if="ad.photo || (ad.photosArr && ad.photosArr.length > 0)">
                        <label class="control-label">Ссылки на фотографии</label>
                        <input readonly :value="ad.photo" class="form-control mb-2">
                        <input readonly v-for="ad in ad.photosArr" :key="ad" :value="ad" class="form-control mb-2">
                    </div>
                </div>

                <div>
                    <router-link :to="{name: 'create'}" class="btn btn-success">Создать новое объявление</router-link>
                </div>
            </div>
        </div>

        <div class="panel panel-default col-12 col-lg-6" v-else>
            <p v-if="error">Объявление не найдено, <router-link :to="{name: 'create'}">создайте новое объявление</router-link></p>
            <p v-else>Загружается объявление #{{id}}...</p>
        </div>
    </div>
</template>

<script>
    import {ADS_GET_ITEM} from "../../api-routes"
    import pagination from 'laravel-vue-pagination';

    export default {
        components: {
            pagination,
        },
        data() {
            return {
                ad: null,
                id: null,
                error: false,
            }
        },

        mounted() {
            this.id = this.$route.params.id;
            this.getItem();
        },

        methods: {
            getItem() {
                axios.post(ADS_GET_ITEM, {id: this.id, fields: true})
                    .then(res => {
                        if(res.data) {
                            this.ad = res.data;
                        } else {
                            this.error = true;
                        }
                    });
            },
        }
    }
</script>
