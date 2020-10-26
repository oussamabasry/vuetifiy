import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        user: null,
        drawer: true,
        listcondidacies: [

        ],
        fullBranch: 'Génie du Logiciel et des Systèmes Informatiques Distribués',
        branch: 'GLSID'
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload
        },
        changeDrawer(state, payload) {
            state.drawer = payload
        },
        setBranch(state, payload) {
            state.branch = payload
        },
        setFullBranch(state, payload) {
            state.fullBranch = payload
        },
        setListCondidacies(state, payload) {
            state.listcondidacies = payload
        },
        acceptCondidacieAction(state, payload) {
            state.listcondidacies = payload
        },
        refuseCondidacieAction(state, payload){
            state.listcondidacies = payload
        }

    },


    actions: {
        async upDateCondidacies({ commit }) {

            try {
                const response = await axios.get('/api/glsid-condidacies?branch=' + this.state.branch);
                commit('setListCondidacies', response.data);
            } catch (error) {
                console.error(error);
            }
        },

        async acceptCondidacie({ commit }, idCondidacie) {

            try {
                const response = await axios.post('/api/accept', { 'id': idCondidacie });
                var list = this.state.listcondidacies;
                for (let condidat of list) {
                    if (condidat.id === idCondidacie) {
                        condidat.accepted = 1;
                        break;
                    }
                }
                commit('acceptCondidacieAction', list);
            } catch (error) {
                console.error(error);
            }
        },
        async refuseCondidacie({ commit }, idCondidacie) {

            try {
                const response = await axios.post('/api/refuse', { 'id': idCondidacie });
                var list = this.state.listcondidacies;
                for (let condidat of list) {
                    if (condidat.id === idCondidacie) {
                        condidat.accepted = 0;
                        break;
                    }
                }
                commit('refuseCondidacieAction', list);
            } catch (error) {
                console.error(error);
            }
        }

    },
    getters: {
        user(state) {
            return state.user
        },
        drawer(state) {
            return state.drawer
        },

        getCondidateById: (state) => (id) => {
            return state.listcondidacies.find(cand => cand.id === id)
        },



        getListCondidacies(state) {
            return state.listcondidacies;
        },





        getBranch(state) {
            return state.branch;
        },
        getFullBranch(state) {
            return state.fullBranch;
        }
    },

})
