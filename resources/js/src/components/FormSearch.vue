<template>
    <div class="form">
        <i class="bi bi-search form__icon"></i>
        <input @input="updateSearch(search)" v-model="search" type="text"
               class="form-control form__input" placeholder="Поиск...">
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
        left: 20px;
        color: #9ca3af;
        font-size: 16px;
    }
    &__input {
        height: 55px;
        text-indent: 33px;
        border-radius: 10px;
    }
}
</style>
