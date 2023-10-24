<template>
    <div class="row">
        <div class="col-12 mb-3">
            <h3 class="title">Добавить запись</h3>
        </div>
        <div class="col-12">
           <app-form @submit.prevent @submitForm="submitForm" class="mb-3">
               <slot>Добавить</slot>
           </app-form>
        </div>
        <div class="col-12">
            <temp-table @removeEquipment="this.removeEquipment" :equipments="this.equipments"></temp-table>
        </div>
        <div class="col-12 text-center">
            <button @click="this.postEquipments" v-if="this.equipments.length > 0" class="btn btn-success">Выгрузить</button>
        </div>
    </div>
</template>

<script>
import AppForm from "@/components/AppForm.vue";
import TempTable from "@/components/TempTable.vue";
import {mapActions} from "vuex";

export default {
    components:{
        AppForm,
        TempTable
    },
    data(){
        return {
           equipments: []
        }
    },
    methods: {
       ...mapActions(['createEquipment']),
        submitForm(equipment){
            this.equipments.push(equipment);
        },
        postEquipments(){
            let newEquipments = this.equipments.map(item => {
                let {equipment_type, ...rest} = item;
                return {
                    equipment_type_id: equipment_type.id,
                    ...rest
                };
            });
            this.createEquipment(newEquipments);
            this.equipments = [];
        },
        removeEquipment(index){
            this.equipments.splice(index, 1);
        }

    },
}
</script>

<style lang="scss" scoped>

</style>
