<template>
    <img :src="src" v-on:error="onError">
</template>

<script>
export default {
    props: ['src'],
    methods: {
        onError() {
            this.$refs.cimg.src = 'https://cdn.day4.now.sh/day4agency/not_found.png'
        }
    }
}
</script>
