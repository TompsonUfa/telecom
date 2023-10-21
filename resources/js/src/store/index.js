import { createStore } from "vuex"
import equipment from "@/store/modules/equipment.js"
import message from "@/store/modules/message.js";
const store = createStore({
    modules: {
        equipment,
        message
    }
})

export default store;
