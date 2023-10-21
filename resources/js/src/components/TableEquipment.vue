<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Тип оборудования</th>
            <th scope="col">Серийный номер</th>
            <th scope="col">Примечание</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(equipment, index) in equipments" :key="equipment.id">
            <th scope="row">{{index + 1}}</th>
            <td>{{ equipment.equipment_type.name }}</td>
            <td>{{ equipment.serial_number }}</td>
            <td>{{ equipment.desc }}</td>
            <td>
                <div class="d-flex gap-2">
                    <div class="btn btn-primary" @click="$emit('showModalEdit', equipment)">Редактировать</div>
                    <div class="btn btn-danger" @click="this.deleteEquipment(equipment.id)">Удалить</div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

 export default {
     computed:{
         ...mapGetters(['equipments']),
     },
     emits: ['showModalEdit'],
     methods:{
        ...mapActions(['deleteEquipment']),
     }
 }
</script>



<style scoped lang="scss">

</style>
