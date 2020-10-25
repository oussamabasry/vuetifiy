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
        setListCondidacies(state,payload){
            state.listcondidacies = payload
        }

    },
    actions: {
        async upDateCondidacies({commit}){
           
                try {
                  const response = await axios.get('/api/glsid-condidacies?branch='+this.state.branch);
                  commit('setListCondidacies',response.data);
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

        getCondidates: (state) => {
            return state.listcondidacies
        },
        getGlsidCondidacies(state) {

            return state.listcondidacies.filter(
                (cond) => cond.filiere === "GLSID"
            );
        },
        getBdccCondidacies(state) {

            return state.listcondidacies.filter(
                (cond) => cond.filiere === "BDCC"
            );
        },
        getGilCondidacies(state) {

            return state.listcondidacies.filter(
                (cond) => cond.filiere === "GIL"
            );
        },
        getGmsiCondidacies(state) {

            return state.listcondidacies.filter(
                (cond) => cond.filiere === "GMSI"
            );
        },
        getSeerCondidacies(state) {

            return state.listcondidacies.filter(
                (cond) => cond.filiere === "SEER"
            );
        },
        getGecsiCondidacies(state) {

            return state.listcondidacies.filter(
                (cond) => cond.filiere === "GECSI"
            );
        },

       getListCondidacies(state){
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
