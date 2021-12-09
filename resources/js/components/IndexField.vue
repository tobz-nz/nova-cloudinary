<template>
  <panel-item :field="field">
    <template slot="value">
      <CVideo
        v-if="field.value.resource_type === 'video'"
        :id="field.name"
        :name="field.name"
        :src="field.value.url"
        :width="field.value.width"
        :height="field.value.height"
        class="block w-full card rounded cursor-pointer hoverableImage small"
        @click.prevent="openMediaLibrary"
      ></CVideo>
      <CAudio
        v-else-if="field.value.is_audio === true"
        :id="field.name"
        :name="field.name"
        :src="field.value.url"
        :width="field.value.width"
        :height="field.value.height"
        class="block w-full card rounded cursor-pointer hoverableImage small"
        @click.prevent="openMediaLibrary"
      ></CAudio>
      <CImage
        v-else
        :id="field.name"
        :name="field.name"
        :src="field.value.url"
        class="block w-full card rounded cursor-pointer hoverableImage small"
        @click.prevent="openMediaLibrary"
        alt="Cloudinary image url"
      ></CImage>
    </template>
  </panel-item>
</template>

<script>
import CVideo from "./Video.vue";
import CAudio from "./Audio.vue";
import CImage from "./Image.vue";

export default {
  props: ["resource", "resourceName", "resourceId", "field"],
  components: { CVideo, CAudio, CImage },
};
</script>
