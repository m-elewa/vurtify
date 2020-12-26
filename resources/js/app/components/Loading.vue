<script>
export default {

    data() {
      return {
          show: false
      }
    },

    computed: {
    },

    watch: {

    },

    methods: {
        showLoading() {
            this.show = true
        },
        hideLoading() {
            setTimeout(() => {
                this.show = false
            },1000)
        },
        toggleLoading() {
            this.show = !this.show
        },
    },

    mounted() {
    }
}
</script>

<template>
    <div>
        <transition
            enter-active-class="animate__animated animate__faster animate__zoomIn"
            leave-active-class="animate__animated animate__faster animate__zoomOut"
        >
            <div v-show="show" class="overlay">
                <div class="spinner-border text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </transition>

        <div v-show="show" class="hiden-overlay"></div>
    </div>
</template>

<style lang="sass" scoped>
    .overlay
        display: flex
        justify-content: center
        align-items: center
        position: absolute
        z-index: 1052
        background: rgba(39, 42, 43, 0.6)
        border-radius: 4px
        right: 0
        left: 0
        top: 0
        bottom: 0

    .hiden-overlay
        display: flex
        justify-content: center
        align-items: center
        position: absolute
        z-index: 1051
        opacity: 0
        border-radius: 4px
        right: 0
        left: 0
        top: 0
        bottom: 0

    .spinner-border
        width: 5rem
        height: 5rem

</style>

