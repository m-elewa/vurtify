<script>
import {
    mapState,
    mapActions,
    mapMutations
} from 'vuex'
import { pick } from 'lodash';

export default {
    props: {
        initUser: {
            type: Object,
            default: function () {
                return {
                    name: '',
                    email: ''
                }
            }
        },
        submitRoute: {
            type: String
        }
    },

    data() {
      return {
        profileData: {
            name: '',
            email: ''
        },
      }
    },

    computed: {
        ...mapState('user', {
            profile: 'profile',
            errors: state => state.errors.profileData,
        })
    },

    methods: {
        ...mapActions('user', [
            'updateUserProfile'
        ]),
        ...mapMutations('user', [
            'setUserProfile'
        ])
    },

    created() {
        this.profileData = pick(this.initUser, ['name', 'email'])
    }
}
</script>

<template>
    <div class="card mb-4">
        <div class="card-body">
            <h6 class="card-title py-1">
                Profile Information
            </h6>
            <form @submit.prevent="updateUserProfile({ submitRoute, profileData })">
                <div class="custom-form-floating">
                    <input v-model="profileData.name" placeholder="Name" id="name" type="text" class="form-control" name="name"
                        autocomplete="name" required :class="{ 'is-invalid': errors.name }">
                    <label for="name">Name</label>

                    <span v-if="errors.name" class="invalid-feedback" role="alert">
                        <strong>{{ errors.name[0] }}</strong>
                    </span>
                </div>

                <div class="custom-form-floating">
                    <input required v-model="profileData.email" placeholder="Email" id="email" type="text"
                        class="form-control" name="email" autocomplete="email" :class="{ 'is-invalid': errors.email }">
                    <label for="password-confirm">Email</label>

                    <span v-if="errors.email" class="invalid-feedback" role="alert">
                        <strong>{{ errors.email[0] }}</strong>
                    </span>
                </div>

                <div class="form-group mb-0 mt-2">
                    <button type="submit" class="btn btn-primary text-white px-4">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

