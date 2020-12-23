<script>
import { mapState, mapActions, mapMutations } from 'vuex'
import Modal from './Modal'

export default {
    components: {
        Modal
    },

    props: {
        submitRoute: {
            type: String
        }
    },

    data() {
      return {
          profilePhoto: null
      }
    },

    computed: {
        ...mapState('user', {
            profile: 'profile',
            errors: state => state.errors.profilePhoto,
        })
    },

    methods: {
        ...mapActions('user', [
            'updateProfilePhoto'
        ])
    }
}
</script>

<template>
    <div class="d-flex align-items-center justify-content-center ">
        <div class="profile-photo" style="width: 200px;height:200px" @click="$refs.modal.showModal()">
            <div
                class="rounded-circle img-thumbnail profile-photo-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="profile-photo-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i>
                </div>
            </div>
            <img :src="profile.profile_photo_url" :alt="profile.name" class="rounded-circle img-thumbnail"
                style="width: 200px;height:200px">
        </div>

        <teleport to="body">
            <modal ref="modal">
                <template v-slot:modal-title>
                    upload profile photo
                </template>

                <template v-slot:default>
                    <form id="upload-profile-photo-form">
                        <div class="input-group has-feedback pb-2">
                            <input id="photo" type="file"
                                class="form-control" name="photo"
                                required :class="{ 'is-invalid': errors.photo }" @change="profilePhoto = $event">
                            <label class="input-group-text"
                                for="photo">Profile Photo</label>

                                <span v-if="errors.photo" class="invalid-feedback" role="alert">
                                    <strong>{{ errors.photo[0] }}</strong>
                                </span>
                        </div>
                    </form>
                </template>

                <template v-slot:modal-footer>
                    <div class="d-grid gap-2 col-4 mx-auto">
                        <button type="button" class="btn btn-primary text-white fw-bold fs-5"
                            @click="updateProfilePhoto({profilePhoto, submitRoute, modal: $refs.modal})">Upload</button>
                    </div>
                </template>
            </modal>
        </teleport>
    </div>
</template>

