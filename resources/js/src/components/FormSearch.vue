<template>
    <div class="form">
        <input  v-model="search" type="text"
               class="form-control form__input" placeholder="Поиск...">
        <i @click="updateSearch(search)" class="bi bi-search form__icon"></i>
    </div>
</template>

<script>
    import {mapActions} from "vuex";

    export default {
        methods: {
            ...mapActions(['getEquipments', 'updateSearch']),
        },
    }
</script>

<style scoped lang="scss">
.form {
    position: relative;
    &__icon {
        position: absolute;
        top: 16px;
        right: 20px;
        color: #9ca3af;
        font-size: 16px;
        cursor: pointer;
    }
    &__input {
        height: 55px;
        text-indent: 10px;
        border-radius: 10px;
        &:focus{
            outline: none !important;
        }
    }
}
</style>
