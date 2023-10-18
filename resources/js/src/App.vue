<template>
    <router-link to="/page">page</router-link>
    <router-link to="/">home</router-link>
    <router-view></router-view>
</template>

<script>
export default {
    data(){
        return{
            name: "roman"
        }
    }
}
</script>
<style lang="scss">
    .main {
        &__title{
            color:red;
        }
    }
</style>
