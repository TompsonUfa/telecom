<template>
    <table class="table table-striped" v-if="equipments.length > 0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Тип оборудования</th>
            <th scope="col">Маска</th>
            <th scope="col">Серийный номер</th>
            <th scope="col">Примечание</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(equipment, index) in equipments">
            <td>{{index + 1}}</td>
            <td>{{equipment.equipment_type.name}}</td>
            <td>{{equipment.equipment_type.mask}}</td>
            <td>{{equipment.serial_number}}</td>
            <td>{{equipment.desc}}</td>
            <td>
                <button @click="$emit('removeEquipment', index)" class="btn btn-danger">Убрать</button>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "TempTable",
        props: {
            equipments: Array,
        },
    }
</script>

<style scoped lang="scss">

</style>
