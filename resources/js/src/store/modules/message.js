export default {
    actions: {
    },
    mutations: {
        updateMessage(state, data){
            state.message = data;
        },
    },
    state: {
        message: [],
    },
    getters: {
        message (state){
            return state.message;
        },
    },
}
