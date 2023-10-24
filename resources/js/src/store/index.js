import { createStore } from "vuex"
import equipment from "@/store/modules/equipment.js"

const store = createStore({
    modules: {
        equipment,
    }
})

export default store;
