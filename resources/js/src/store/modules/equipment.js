import axios from "axios";
export default {
    actions: {
        getEquipments(ctx, [page = 1, search = '']){
            axios
                .get(`/api/equipment` , {
                    params: {
                        page: page,
                        q: search,
                    }
                })
                .then(res => {
                    const equipments = res.data.data;
                    const pagination = res.data.meta;
                    ctx.commit('updateEquipments', equipments)
                    ctx.commit('updatePagination', pagination)
                })
                .catch(err => {
                    console.log('error: ' + err)
                })
        },
        getTypes(ctx){
            axios
                .get('/api/equipment-type')
                .then(res =>{
                    const types = res.data.data;
                    ctx.commit('updateTypes', types)
                })
                .catch(err => {
                    console.log('error: ' + err)
                })
        },
        createEquipment(ctx, data){
            axios
                .post('/api/equipment', {"equipments": {data}})
                .then(res => {
                    ctx.commit('updateMessage', res.data)
                })
                .catch(err => {
                    console.log('error: ' + err)
                })
        },
        editEquipment(ctx, [data, id]){
            const newType = data['equipment_type_id'];
            const newNumber = data['serial_number'];
            const newDesc = data['desc'];
            axios
                .put('/api/equipment/' + id, {
                    equipment_type_id: newType,
                    serial_number: newNumber,
                    desc:newDesc,
                })
                .then(res => {
                  const page = ctx.getters.pagination.current_page;
                  const search = typeof ctx.getters.search == "string" ? ctx.getters.search : '';
                  ctx.dispatch('getEquipments', [page, search]);
                })
                .catch(err => {
                    console.log('error: ' + err)
                })
        },
        deleteEquipment(ctx, id){
            axios
                .delete('/api/equipment/' + id)
                .then(res => {
                    const page = ctx.getters.pagination.current_page;
                    const search = typeof ctx.getters.search == "string" ? ctx.getters.search : '';
                    ctx.dispatch('getEquipments', [page, search]);
                })
        },
        updateSearch(ctx, data) {
            ctx.commit('updateSearch', data)
            ctx.dispatch('getEquipments', [1, data]);
        }
    },
    mutations: {
        updateSearch(state, data){
            state.search = data
        },
        updateEquipments(state, data){
            state.equipments = data;
        },
        updatePagination(state, data){
            state.pagination = data;
        },
        updateTypes(state, data){
            state.types = data;
        }
    },
    state: {
        search: [],
        equipments: [],
        pagination: [],
        types: [],
    },
    getters: {
        search(state){
            return state.search;
        },
        equipments(state){
            return state.equipments;
        },
        pagination(state){
            return state.pagination;
        },
        types(state){
            return state.types;
        }
    },
}
