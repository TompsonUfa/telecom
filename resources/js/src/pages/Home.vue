<template>
    <div class="row">
        <div class="col-12 mb-3">
            <h3 class="title">Добавить запись</h3>
        </div>
        <div class="col-12">
           <AppForm @submit.prevent @submitForm="submitForm">
               <slot>Добавить</slot>
           </AppForm>
        </div>
    </div>
</template>

<script>
import AppForm from "@/components/AppForm.vue";
import {mapActions} from "vuex";

export default {
    components:{
        AppForm,
    },
    methods: {
       ...mapActions(['createEquipment']),
        submitForm(equipment){
          this.createEquipment(equipment);
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
