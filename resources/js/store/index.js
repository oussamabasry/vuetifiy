import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        status: localStorage.getItem('status') || '',
        token: localStorage.getItem('token') || '',
        user: {},
        role: localStorage.getItem('role') || '',
        drawer: true,
        listcondidacies: [],
        fullBranch: 'Génie du Logiciel et des Systèmes Informatiques Distribués (GLSID)',
        branch: 'GLSID',
        departement: 'Département Mathématique et Informatique ',
    },

    mutations: {

        auth_request(state) {
            state.status = 'loading'
            localStorage.setItem('status', 'loading')
        },
        auth_success(state, data) {
            state.status = 'success'
            localStorage.setItem('status', 'success')
            state.token = data.token
            state.user = data.user
        },
        auth_error(state) {
            state.status = 'error'
            localStorage.setItem('status', 'error')
        },
        logout(state) {
            state.status = ''
            state.token = ''
            state.user = {}
        },

        setUser(state, payload) {
            state.user = payload
        },

        changeDrawerToFalse(state) {
            state.drawer = false;
        },
        changeDrawer(state, payload) {
            state.drawer = !payload
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
        setDepartement(state, payload) {
            state.departement = payload
        },
        acceptCondidacieAction(state, payload) {
            state.listcondidacies = payload
        },
        refuseCondidacieAction(state, payload) {
            state.listcondidacies = payload
        }

    },


    actions: {

        login({ commit }, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request')
                axios({ url: '/api/auth/login', data: user, method: 'POST' })
                    .then(resp => {


                        localStorage.setItem('token', resp.data.token)

                        localStorage.setItem('role', resp.data.user.role)
                        //   axios.defaults.headers.common['Authorization'] = `beare${resp.data.token}`
                        commit('auth_success', resp.data)
                        resolve(resp)
                    })
                    .catch(err => {
                        commit('auth_error')
                        localStorage.removeItem('token')
                        localStorage.removeItem('status')
                        localStorage.removeItem('role')
                        reject(err)
                    })
            })
        },

        logout({ commit }) {
            return new Promise((resolve, reject) => {
                commit('logout')
                localStorage.removeItem('token')
                localStorage.removeItem('status')
                localStorage.removeItem('role')
                //delete axios.defaults.headers.common['Authorization']
                resolve()
            })
        },



        async upDateCondidacies({ commit }) {


            axios.get('/api/auth/condidacies?branch=' + this.state.branch, {
                headers: {
                    'Authorization': `bearer ${this.state.token}`
                }
            })
                .then((res) => {
                    commit('setListCondidacies', res.data);
                })
                .catch((error) => {
                    console.error(error)
                })


        },

        async acceptCondidacie({ commit }, idCondidacie) {

            try {
                const response = await axios.post('/api/auth/accept', { 'id': idCondidacie }, {
                    headers: {
                        'Authorization': `bearer ${this.state.token}`
                    }
                }
                );

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
                const response = await axios.post('/api/auth/refuse', { 'id': idCondidacie }, {
                    headers: {
                        'Authorization': `bearer ${this.state.token}`
                    }
                });

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

        isLoggedIn: state => !!state.token,
        authStatus: state => state.status,
        token: state => state.token,
        role: state => state.role,
        user: state => state.user,
        drawer: state => state.drawer,
        getCondidateById: (state) => (id) => {
            return state.listcondidacies.find(cand => cand.id === id)
        },
        getListCondidacies: state => state.listcondidacies,
        getBranch: state => state.branch,
        getFullBranch: state => state.fullBranch,
        getDepartement: state=> state.departement,
    },

})

export default store;