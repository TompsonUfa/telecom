<template>
    <div class="modal fade" id="modal-edit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Обновить данные</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <AppForm :item="item" @submit.prevent @submitForm="submitForm">
                        <slot>Обновить</slot>
                    </AppForm>
                </div>
            </div>
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
    data(){
        return{

        }
    },
    props: {
        item: Object,
        editModal: Object,
    },
    methods: {
        ...mapActions(['editEquipment']),
        submitForm(equipment, id){
            this.editEquipment([equipment, id]);
            this.editModal.toggle();
        }
    },
    emits: ['submitForm']
}
</script>

<style scoped lang="scss">

</style>
