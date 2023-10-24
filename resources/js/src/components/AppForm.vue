<template>
    <form @submit.prevent="submitForm()">
        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" v-model="form.type" :class="validatedClass('type')">
                <option disabled value="">Пожалуйста, выберите один из них</option>
                <option v-for="type in types" :key="type.id" :value=type>{{type.name}}</option>
            </select>
            <label for="floatingSelect">Тип оборудования</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInputNumber" placeholder="" v-model="form.number"
                   :class="validatedClass('number')">
            <label for="floatingInputNumber">Серийные номера</label>
        </div>
        <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="" id="floatingTextarea" v-model="form.desc">
                    </textarea>
            <label for="floatingTextarea">Примечание</label>
        </div>
        <button class="btn btn-primary"><slot></slot></button>
    </form>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    data(){
        return {
            errorsValidated: {
                type: null,
                number: null,
            },
            wasValidated: false,
            form: {
                id: null,
                type: null,
                number: null,
                desc: null,
            },
        }
    },
    computed: {
        ...mapGetters(['types', 'selected']),
        validatedClass(){
            return (input) => {
                return {
                    'is-valid': this.wasValidated && !this.errorsValidated[input],
                    'is-invalid': this.wasValidated && this.errorsValidated[input],
                }
            }
        }
    },
    created() {
        this.form = this.selected; // Присваиваем значение из геттера в свойство myData
    },
    methods: {
        ...mapActions(['getTypes']),
        validated(){
            this.errorsValidated.type = [];
            this.errorsValidated.number = [];

            if(!this.form.type){
                this.errorsValidated.type.push('Поле "Тип оборудования" обязательно для заполнения.')
            } else {
                delete this.errorsValidated.type;
            }
            if (!this.form.number){
                this.errorsValidated.number.push('Поле "Серийные номера" обязательно для заполнения.')
            } else {
                delete this.errorsValidated.number;
            }

            this.wasValidated = true;
        },
        submitForm(){

            this.validated();

            if (!Object.keys(this.errorsValidated).length){
                const equipment = {
                    equipment_type: this.form.type,
                    serial_number: this.form.number,
                    desc: this.form.desc,
                }

                this.$emit('submitForm', equipment , this.form.id ? this.form.id : null);

                this.form.type = "";
                this.form.number = "";
                this.form.desc = "";
                this.wasValidated = false;
            }
        }
    },

    mounted() {
        this.getTypes();
    },
    emits: [
        'submitForm',
    ]
}
</script>

<style scoped lang="scss">

</style>
