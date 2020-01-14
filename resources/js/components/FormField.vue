<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <div v-if="value">
                <svg @click.prevent="zoom = !zoom" class="zoomer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12zM7 7V5h2v2h2v2H9v2H7V9H5V7h2z"/></svg>
                <button @click.prevent="reset" class="p-1 mt-1 text-sm inline-block bg-danger text-white rounded">Clear</button>
                <CVideo v-if="value.indexOf('video/upload/') > -1"
                    :id="field.name"
                    :name="field.name"
                    :src="value"
                    class="block w-full card rounded cursor-pointer hoverableImage"
                    :class="{zoom}"
                    :title="zoom ? 'Zoom out' : 'Change Video'"
                    @click.prevent="zoom ? zoom = false : openMediaLibrary()"></CVideo>
                <CImage
                    v-else
                    :id="field.name"
                    :name="field.name"
                    :src="value"
                    class="block w-full card rounded cursor-pointer hoverableImage"
                    :class="{zoom}"
                    :title="zoom ? 'Zoom out' : 'Change Image'"
                    @click.prevent="zoom ? zoom = false : openMediaLibrary()"
                    alt="Cloudinary image url"
                />
                <div class="img-placeholder"></div>
            </div>
            <button v-else
                @click.prevent="openMediaLibrary"
                class="m-4 form-file-btn btn btn-default btn-primary select-none">Select</button>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import CVideo from './Video.vue'
import CImage from './Image.vue'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],
    data() {
        return {
            zoom: false
        }
    },
    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },
        reset() {
            this.$emit('input', this.value = '')
        },
        update(val) {
            if (val.indexOf('image/upload/') > -1)
                val = val.replace(/image\/upload\/(v\d+|f_auto[^\/]*)\//, 'image/upload/f_auto,c_limit,q_auto:best,w_480/')
            this.$emit('input', val)
        },
        openMediaLibrary() {
            if (!window.cloudinary) return alert("Cloudinary isn't loaded")
            const V = this
            window.cloudinary.openMediaLibrary({
                cloud_name: this.field.cloudName,
                api_key: this.field.apiKey,
                multiple: !!this.field.allow_multiple
            }, {
                insertHandler: ({assets}) => {
                if (!assets || !assets.length) return
                    V.update(V.value = assets.map(a => a.secure_url).join(';'))
                }
            })
        }
    },
    components: { CVideo, CImage },
    mounted() {
        if (document.getElementById('cloudinary-script')) return; // was already loaded
        var scriptTag = document.createElement("script")
        scriptTag.src = "https://media-library.cloudinary.com/global/all.js"
        scriptTag.id = "cloudinary-script"
        document.getElementsByTagName('head')[0].appendChild(scriptTag)
    }

}
</script>

<style scoped lang="scss">
.hoverableImage {
    height: 200px;
    min-width: 200px;
    max-width: 100%;
    object-fit: contain;
    object-position: center;
    background: #e4e4e4;

    &.zoom {
        transition: .4s;
        position: fixed;
        width: 100%;
        left: 0;
        top: 0;
        height: 600px;
        background: rgba(255,255,255,0.8);

        +.img-placeholder {
            display: block;
            height: 200px;
            width: 200px;
        }
    }
}

.zoomer {
    float: left;
    width: 1rem;
    margin: 0.5rem;
    background: var(--primary-dark);
    fill: #fff;
    box-shadow: 0 0 0 4px var(--primary-dark);
    cursor: pointer;
}
</style>