import axios from '../../axios'
import { useToast } from 'vue-toastification'

const toast = useToast()

// initial state
const state = () => ({
  user: {
      name: '',
      email: ''
  },
  profile: {
      name: '',
      profile_photo_url: ''
  },
  errors: {}
})

// getters
const getters = {
    userData (state) {
      return state.user
    }
  }

// actions
const actions = {
    updateUserProfile ({ state, commit }, submitRoute) {
        commit('setUserFormErrors', {})
        axios.put(submitRoute, state.user).then((res)=>{
            if(res.data.status === 'ok') {
                commit('setUserFormErrors', {})
                commit('setUserData', res.data.data)
                toast.success(res.data.message)

            } else if (res.data.status === 'error' ) {
                commit('setUserFormErrors', res.data.data)
                toast.error('Form Error!')

            } else {
                toast.error('Unknown Error!')
            }
            console.log('res', res)

        }).catch(err => {
            toast.error('Server Error!')
            console.log('Catch unknown server error', err)

        })
    }
}

// mutations
const mutations = {
    setUserData (state, { name, email }) {
        state.user = { name, email }
        state.profile.name = name
        state.profile.email = email
    },
    setUserFormErrors (state, errors) {
        state.errors = errors
    },
    setUserProfile (state, profile) {
        state.profile = profile
    }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
