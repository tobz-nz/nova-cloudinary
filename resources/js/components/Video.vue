<template>
    <video :src="src" preload="none" :poster="src.replace(/\.[\w\d]+$/, '.jpg')" ref="cvideo" @click="toggle" v-on:dblclick="reset" controls class="cloudinary-video"></video>
</template>

<script>
export default {
    props: ['src'],
    methods: {
        reset() {
            const vid = this.$refs.cvideo
            vid.currentTime = 0
            vid.play()
        },

        toggle() {
            const vid = this.$refs.cvideo
            if (vid.paused)
                vid.play()
            else vid.pause()
        }
    }
}
</script>

