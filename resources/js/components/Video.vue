<template>
  <video :src="src"
    preload="none"
    poster="https://cdn.day4.now.sh/day4agency/video_poster.png"
    ref="cvideo"
    @click="toggle"
    v-on:dblclick="reset"
    class="cloudinary-video"></video>
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

<style lang="scss">
.cloudinary-video {
  &[poster] {
    object-fit: cover;
  }
}
</style>