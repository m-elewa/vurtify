<script>
import { Modal } from 'bootstrap';

export default {

    data() {
      return {
        modalObject: {},
        animation: {
            start: false,
            end: false,
        },
      }
    },

    methods: {
        showModal() {
            this.modalObject.show()
        },
        hideModal() {
            this.animation.end = true
            // wait for the animation to finish
            setTimeout(() => {
                this.modalObject.hide()
                this.animation.end = false
            },500)

        },
        toggleModal() {
            this.modalObject.toggle()
        },
    },

    mounted() {
        // init modal
        this.modalObject = new Modal(this.$refs.modalElement, {
            backdrop: 'static',
            keyboard: false,
        })

        document.addEventListener('show.bs.modal', (event) => {
            this.animation.start = true
        })

        document.addEventListener('hide.bs.modal', (event) => {
            this.animation.start = false
        })

        document.addEventListener('hidePrevented.bs.modal', (event) => {
            this.hideModal()
        })
    }
}
</script>

<template>
    <div class="modal app-modal animate__animated animate__faster"
        :class="{'animate__zoomInDown': animation.start, 'animate__zoomOutDown': animation.end}" tabindex="-1"
        ref="modalElement">
        <div class="modal-dialog modal-xl">
            <div class="modal-content animate__animated">

                <button class="close" type="button" @click="hideModal">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>

                <div class="modal-body text-center pt-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h4 v-if="$slots['modal-title']"
                                    class="portfolio-modal-title text-secondary text-uppercase mb-0"
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

