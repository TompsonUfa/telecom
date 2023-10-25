<template>
    <div class="row">
        <div class="col-12 mb-3">
            <h3 class="title">Записи</h3>
        </div>
        <div class="col-12 mb-3">
            <form-search></form-search>
        </div>
        <div class="col-12">
            <div class="table-wrap">
                <table-equipment @showModalEdit="showModalEdit"></table-equipment>
            </div>
        </div>
        <div class="col-12">
            <pagination-equipment></pagination-equipment>
        </div>
    </div>
    <modal-edit v-if="select" :editModal="editModal" ></modal-edit>
</template>

<script>
import TableEquipment from "@/components/TableEquipment.vue";
import PaginationEquipment from "@/components/PaginationEquipment.vue";
import FormSearch from "@/components/FormSearch.vue";
import ModalEdit from "@/components/ModalEdit.vue";
import {mapActions} from "vuex";
import { Modal } from 'bootstrap'

export default {
    components: {
        TableEquipment,
        PaginationEquipment,
        FormSearch,
        ModalEdit
    },
    data(){
        return{
            search: "",
            editModal: null,
        }
    },
    methods: {
        ...mapActions(['getEquipments', 'select']),
        showModalEdit(item){
            this.select(item);
            this.editModal.toggle();
        },
    },
    mounted() {
        this.getEquipments([]);
        this.editModal = new Modal(document.getElementById('modal-edit'));
    }
}
</script>


<style scoped lang="scss">
    .table-wrap{
        overflow: auto;
    }
</style>
