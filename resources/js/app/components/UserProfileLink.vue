<script>
import {
    mapState,
    mapMutations
} from 'vuex'

export default {
    props: {
        initProfile: {
            type: Object,
            default: function () {
                return {
                    name: '',
                    profile_photo_url: ''
                }
            }
        }
    },

    data() {
      return {

      }
    },

    computed: {
        ...mapState('user', [
            'profile'
        ])
    },

    methods: {
        ...mapMutations('user', [
            'setUserProfile'
        ])
    },

    created() {
        this.setUserProfile(this.initProfile)
    }
}
</script>

<template>
    <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button"
        data-bs-toggle="dropdown">
            <img :src="profile.profile_photo_url" :alt="profile.name"
                class="rounded-circle img-fluid me-2" style="width: 30px;height:30px">
            {{ profile.name }}
        </a>
</template>

