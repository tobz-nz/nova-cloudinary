<template>
    <audio :src="src" preload="none" ref="caudio" @click="toggle" v-on:dblclick="reset" controls class="cloudinary-audio"></audio>
</template>

<script>
export default {
    props: ['src'],
    methods: {
        reset() {
            const vid = this.$refs.caudio
            vid.currentTime = 0
            vid.play()
        },

        toggle() {
            const vid = this.$refs.caudio
            if (vid.paused)
                vid.play()
            else vid.pause()
        }
    }
}
</script>

