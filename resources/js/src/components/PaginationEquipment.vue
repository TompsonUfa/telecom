<template>
    <ul class="pagination">
        <li class="page-item">
            <a @click.prevent="this.getEquipments([pagination.current_page - 1, search])" class="page-link" href="#" :class='pagination.current_page == 1 ? "disabled" : null' >Назад</a>
        </li>
        <li v-for="link in pagination.links" :class="link.active ? 'active' : ''">
            <template class="page-item" v-if="Number(link.label) &&
                        (pagination.current_page - link.label < 2 &&
                        pagination.current_page - link.label > -2) ||
                        Number(link.label) === 1 || Number(link.label) === pagination.last_page">
                <a @click.prevent="this.getEquipments([link.label, search])" class="page-link" href="#">{{link.label}}</a>
            </template>
        </li>
        <li class="page-item">
            <a @click.prevent="this.getEquipments([pagination.current_page + 1, search])" class="page-link" href="#"
               :class='pagination.current_page == pagination.last_page ? "disabled" : null'>
                Дальше
            </a>
        </li>
    </ul>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

 export default {
     computed:{
         ...mapGetters(['pagination']),
     },
     methods: {
         ...mapActions(['getEquipments']),
     },
 }
</script>

<style scoped lang="scss">

</style>
