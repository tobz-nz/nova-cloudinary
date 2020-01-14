<template>
    <panel-item :field="field">
        <template slot="value" v-if="field.value">
            <CVideo v-if="field.value.indexOf('video/upload/') > -1"
                :src="field.value"
                class="align-bottom rounded w-40 h-40"></CVideo>
            <CImage v-else :src="field.value"
                class="align-bottom rounded w-40 h-40" style="object-fit: cover;" />
        </template>
    </panel-item>
</template>

<script>
import CVideo from './Video.vue'
import CImage from './Image.vue'
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
    components: { CVideo, CImage }
}
</script>
