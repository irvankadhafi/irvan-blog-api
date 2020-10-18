import Vue from 'vue'
import Vuex from 'vuex'
import auth  from "./auth"

Vue.use(Vuex)
export default new Vuex.Store ({
    state : {
        info: [],
    },
    mutations : {
        SET_Info (state, info) {
            state.info = info
        }
    },
    actions : {
        loadInfo ({ commit }) {
            axios
                .get('/info')
                .then(response => response.data)
                .then(info => {
                    // console.log(items);
                    commit('SET_Info', info)
                })
        }
    },
    modules : {
        auth
    },
    getters : {
        info(state) {
            return state.info;
        }
    },
})
