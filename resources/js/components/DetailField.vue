<template>
    <panel-item :field="field">
        <template slot="value">
            <CVideo v-if="field.value.resource_type === 'video'"
                    :id="field.name"
                    :name="field.name"
                    :src="field.value.url"
                    :width="field.value.width"
                    :height="field.value.height"
                    class="block w-full card rounded cursor-pointer hoverableImage"
                    @click.prevent="openMediaLibrary"></CVideo>
            <CImage
                v-else
                :id="field.name"
                :name="field.name"
                :src="field.value.url"
                class="block w-full card rounded cursor-pointer hoverableImage"
                @click.prevent="openMediaLibrary"
                alt="Cloudinary image url"></CImage>
        </template>
    </panel-item>
</template>

<script>
import CVideo from './Video.vue'
import CImage from './Image.vue'

export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
    components: {CVideo, CImage},
}
</script>
