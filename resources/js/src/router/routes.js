import home from "@/pages/Home.vue"
import equipments from "@/pages/Equipments.vue";

const routes = [
    {
        path: '/',
        component: home,
    },
    {
        path: '/equipments',
        component: equipments,
    }
]

export default routes;
