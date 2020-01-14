<template v-if="field.value" >
    <CVideo v-if="field.value.indexOf('video/upload/') > -1"
        :src="field.value"
        class="align-bottom rounded w-16 h-16" style="object-fit: cover;"></CVideo>
    <CImage v-else :src="field.value"
            class="align-bottom rounded w-12 h-12" style="object-fit: cover;" />
</template>

<script>
import CVideo from './Video.vue'
import CImage from './Image.vue'
export default {
    props: ['resourceName', 'field'],
    components: { CVideo, CImage }
}
</script>
