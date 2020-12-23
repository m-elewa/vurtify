<script>
import { mapState, mapActions, mapMutations } from 'vuex'
import { debounce } from 'lodash';
import Modal from './Modal'
import Loading from './Loading';

export default {
    components: {
        Modal,
        Loading
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
        ]),
        upload: debounce(function(data){
            this.updateProfilePhoto(data)
        }, 500),
    }
}
</script>

<template>
    <div>
        <teleport to="body">
            <loading ref="loading"></loading>

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
                            @click="upload({ profilePhoto, submitRoute, modal: $refs.modal, loading: $refs.loading })">Upload</button>
                    </div>
                </template>
            </modal>
        </teleport>

        <div class="d-flex align-items-center justify-content-center ">
            <div class="profile-photo" style="width: 200px;height:200px" @click="$refs.modal.showModal()">
                <div
                    class="rounded-circle img-thumbnail profile-photo-caption d-flex align-items-center justify-content-center h-100 w-100">
                    <div class="profile-photo-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i>
                    </div>
                </div>
                <img :src="profile.profilePhotoUrl" :alt="profile.name" class="rounded-circle img-thumbnail"
                    style="width: 200px;height:200px">
            </div>
        </div>
    </div>
</template>

