import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

const opts = {}
import 'material-design-icons-iconfont/dist/material-design-icons.css'

export default new Vuetify({
    icons: {
      iconfont: 'mdi', // default - only for display purposes
      iconfont: 'fa4',
      iconfont: 'md',
    },
  })
