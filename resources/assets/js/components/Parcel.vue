<template>
    <div>
        <form :action="actionSave" method="POST" enctype="multipart/form-data" class="form form-horizontal">
            <input type="hidden" name="_method" :value="method" v-if="method">
            <input type="hidden" name="_token" :value="csrfToken">
            <fieldset>

                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Название</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="title" v-model="title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Пункт отправления</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="from" v-model="from" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Пункт назначения</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="to" v-model="to" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Внутренняя доставка(км)</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="km_domestic" v-model="km_domestic" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Международная доставка(км)</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="km_international" v-model="km_international" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Стоимость доставки</label>
                    <div class="col-md-5">
                        {{price}} руб.
                    </div>
                </div>

            </fieldset>



            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>

        </form>
        <form :action="actionDelete" method="POST" v-if="this.parcel" @submit="beforeDelete">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" :value="csrfToken">
            <button type="submit" class="btn btn-danger col-md-offset-3">Удалить</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Parcel",

        props: [
            'actionSave',
            'method',
            'domesticPerKm',
            'internationalPerKm',
            'csrfToken',
            'parcel',
            'actionDelete',
        ],

        computed: {
            price() {
                return this.calculatePrice();
            }
        },

        data(){
            return {
                title: this.parcel ? this.parcel.title : '',
                from: this.parcel ? this.parcel.from : '',
                to: this.parcel ? this.parcel.to : '',
                km_domestic: this.parcel ? this.parcel.km_domestic : 0,
                km_international: this.parcel ? this.parcel.km_international : 0,
            }
        },

        methods: {
            calculatePrice() {
                return this.km_domestic * this.domesticPerKm + this.km_international * this.internationalPerKm;
            },
            beforeDelete(event) {
                if (!confirm('Вы уверены?')) {
                    event.preventDefault();
                }


            }
        }
    }
</script>

<style scoped>

</style>