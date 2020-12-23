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
            },1000);
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
    <div v-show="show" class="overlay">
        <div class="spinner-border text-light" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .overlay {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        z-index: 1051;
        background: rgba(39, 42, 43, 0.6);
        // transition: all 200ms ease-in-out;
        border-radius: 4px;
        right: 0;
        left: 0;
        top: 0;
        bottom: 0;
    }
</style>

