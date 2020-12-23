<script>
import { Modal } from 'bootstrap';

export default {

    data() {
      return {
          modalObject: {}
      }
    },

    computed: {
    },

    watch: {

    },

    methods: {
        showModal() {
            this.modalObject.show()
        },
        hideModal() {
            this.modalObject.hide()
        },
        toggleModal() {
            this.modalObject.toggle()
        },
    },

    mounted() {
        this.modalObject = new Modal(this.$refs.modalElement)
    }
}
</script>

<template>
    <div class="modal app-modal fade" tabindex="-1" ref="modalElement">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close" @click="hideModal">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>

            <div class="modal-body text-center pt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                                <h4 v-if="$slots['modal-title']" class="portfolio-modal-title text-secondary text-uppercase mb-0"
                                    id="portfolioModal6Label">
                                    <slot name="modal-title"></slot>
                                </h4>

                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>

                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pb-5 d-flex justify-content-center">
                <slot name="modal-footer"></slot>
            </div>
        </div>
    </div>
</div>

</template>

