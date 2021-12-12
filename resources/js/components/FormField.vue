<template>
    <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
        <template slot="field">
            <div class="cloudinary-field-container" v-if="value">
                <svg v-if="field.nullable" @click.prevent="reset" class="absolute inline-block p-1 text-sm text-white bg-danger rounded-full cursor-pointer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="0 0 20 20" version="1.1">
                    <title>Clear</title>
                    <polygon fill="currentColor" fill-rule="evenodd" id="Combined-Shape" points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644"></polygon>
                </svg>

                <CAudio
                    v-if="field.value.is_audio === true"
                    :id="field.name"
                    :name="field.name"
                    :src="field.value.url"
                    :width="field.value.width"
                    :height="field.value.height"
                    class="block w-full card rounded cursor-pointer hoverableImage cloudinary-audio"
                    @click.prevent="openMediaLibrary"
                    ></CAudio>
                <CVideo v-else-if="value.resource_type === 'video'"
                    :id="field.name"
                    :name="field.name"
                    :src="value.url"
                    :width="value.width"
                    :height="value.height"
                    class="block w-full card rounded cursor-pointer hoverableImage"
                    @click.prevent="openMediaLibrary"></CVideo>
                <CImage
                    v-else
                    :id="field.name"
                    :name="field.name"
                    :src="value.url"
                    class="block w-full card rounded cursor-pointer hoverableImage"
                    @click.prevent="openMediaLibrary"
                    alt="Cloudinary image url"></CImage>
            </div>
            <button v-if="!field.readonly"
                @click.prevent="openMediaLibrary"
                class="mt-4 form-file-btn btn btn-default btn-primary flex items-center select-none" style="gap: 0.5rem">
                <svg width="25" height="15" viewBox="0 0 122 80" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M98.91 28.11C96.3228 19.9973 91.2371 12.9102 84.3799 7.86159C77.5227 2.81299 69.245 0.061363 60.73 -7.39936e-07C53.5308 -0.0412827 46.4564 1.8798 40.267 5.55683C34.0775 9.23385 29.0069 14.5279 25.6 20.87C19.3385 21.9921 13.5984 25.0833 9.21539 29.6936C4.83235 34.304 2.03506 40.1928 1.23066 46.5031C0.426258 52.8133 1.65673 59.2156 4.74299 64.7781C7.82925 70.3405 12.6102 74.7729 18.39 77.43L19.14 77.77H19.19V69.27C15.2251 66.8361 12.1211 63.2226 10.313 58.9359C8.50503 54.6492 8.08364 49.9042 9.10793 45.366C10.1322 40.8278 12.5509 36.7238 16.0249 33.6293C19.4988 30.5348 23.854 28.6049 28.48 28.11L30.58 27.89L31.5 26C34.1122 20.4641 38.2505 15.7889 43.4285 12.5241C48.6064 9.25934 54.6088 7.54061 60.73 7.57C68.0238 7.62146 75.091 10.11 80.8077 14.6399C86.5245 19.1699 90.5627 25.4811 92.28 32.57L93 35.43H96C100.836 35.5292 105.442 37.5156 108.833 40.9648C112.225 44.4141 114.133 49.0528 114.15 53.89C114.15 60.94 110.08 66.71 103.15 69.63V77.69L103.65 77.53C114.79 73.88 121.71 64.82 121.71 53.89C121.664 47.5639 119.33 41.4681 115.139 36.7293C110.948 31.9904 105.183 28.9287 98.91 28.11Z"/>
                    <path d="M46.07 76.79L47.73 78.45C47.7748 78.4961 47.8052 78.5543 47.8174 78.6175C47.8296 78.6806 47.8231 78.7459 47.7987 78.8054C47.7742 78.8649 47.733 78.916 47.6799 78.9523C47.6268 78.9887 47.5643 79.0087 47.5 79.01H34.4C32.8087 79.01 31.2826 78.3779 30.1574 77.2526C29.0321 76.1274 28.4 74.6013 28.4 73.01V47.57C28.4 47.4825 28.3652 47.3985 28.3033 47.3367C28.2415 47.2748 28.1575 47.24 28.07 47.24H25.27C25.2049 47.2407 25.141 47.222 25.0864 47.1864C25.0318 47.1508 24.989 47.0999 24.9633 47.04C24.9376 46.9801 24.9303 46.914 24.9422 46.8499C24.954 46.7858 24.9846 46.7267 25.03 46.68L36.15 35.56C36.1807 35.5289 36.2173 35.5041 36.2576 35.4873C36.298 35.4704 36.3413 35.4617 36.385 35.4617C36.4287 35.4617 36.472 35.4704 36.5124 35.4873C36.5527 35.5041 36.5893 35.5289 36.62 35.56L47.73 46.68C47.7748 46.7261 47.8052 46.7843 47.8174 46.8475C47.8296 46.9106 47.8231 46.9759 47.7987 47.0354C47.7742 47.0949 47.733 47.146 47.6799 47.1823C47.6268 47.2187 47.5643 47.2387 47.5 47.24H44.66C44.5715 47.24 44.4865 47.2744 44.4231 47.336C44.3596 47.3976 44.3226 47.4816 44.32 47.57V72.57C44.324 74.1524 44.953 75.6691 46.07 76.79V76.79Z"/>
                    <path d="M70.64 76.79L72.31 78.45C72.3554 78.4967 72.386 78.5558 72.3978 78.6199C72.4097 78.684 72.4024 78.7501 72.3767 78.81C72.351 78.8699 72.3082 78.9208 72.2536 78.9564C72.199 78.992 72.1351 79.0107 72.07 79.01H59C57.4087 79.01 55.8826 78.3779 54.7574 77.2526C53.6321 76.1274 53 74.6013 53 73.01V54C53 53.9115 52.9656 53.8265 52.904 53.7631C52.8424 53.6996 52.7584 53.6626 52.67 53.66H49.84C49.7757 53.6587 49.7132 53.6387 49.6601 53.6023C49.607 53.566 49.5658 53.5149 49.5413 53.4554C49.5169 53.3959 49.5104 53.3306 49.5226 53.2675C49.5348 53.2043 49.5652 53.1461 49.61 53.1L60.72 42C60.7507 41.9689 60.7873 41.9441 60.8276 41.9272C60.868 41.9104 60.9113 41.9017 60.955 41.9017C60.9987 41.9017 61.042 41.9104 61.0824 41.9272C61.1227 41.9441 61.1593 41.9689 61.19 42L72.31 53.08C72.3554 53.1267 72.386 53.1858 72.3978 53.2499C72.4097 53.314 72.4024 53.3801 72.3767 53.44C72.351 53.4999 72.3082 53.5509 72.2536 53.5864C72.199 53.622 72.1351 53.6407 72.07 53.64H69.23C69.1416 53.6426 69.0576 53.6796 68.996 53.743C68.9344 53.8065 68.9 53.8915 68.9 53.98V72.57C68.9014 74.151 69.5267 75.6675 70.64 76.79V76.79Z"/>
                    <path d="M95.22 76.79L96.88 78.45C96.9248 78.4961 96.9552 78.5543 96.9674 78.6175C96.9796 78.6806 96.9731 78.7459 96.9487 78.8054C96.9242 78.8649 96.883 78.916 96.8299 78.9523C96.7768 78.9887 96.7143 79.0087 96.65 79.01H83.54C81.9487 79.01 80.4226 78.3779 79.2974 77.2526C78.1721 76.1274 77.54 74.6013 77.54 73.01V60.38C77.54 60.2925 77.5052 60.2085 77.4433 60.1467C77.3815 60.0848 77.2975 60.05 77.21 60.05H74.41C74.3436 60.0507 74.2786 60.0314 74.2233 59.9945C74.1681 59.9577 74.1253 59.9051 74.1004 59.8435C74.0756 59.7819 74.0699 59.7143 74.0841 59.6495C74.0983 59.5846 74.1317 59.5256 74.18 59.48L85.3 48.37C85.3298 48.3392 85.3656 48.3146 85.4051 48.2979C85.4446 48.2811 85.4871 48.2725 85.53 48.2725C85.5729 48.2725 85.6154 48.2811 85.6549 48.2979C85.6944 48.3146 85.7302 48.3392 85.76 48.37L96.88 59.48C96.9283 59.5256 96.9617 59.5846 96.9759 59.6495C96.9901 59.7143 96.9844 59.7819 96.9595 59.8435C96.9347 59.9051 96.8919 59.9577 96.8367 59.9945C96.7814 60.0314 96.7164 60.0507 96.65 60.05H93.8C93.7125 60.05 93.6285 60.0848 93.5667 60.1467C93.5048 60.2085 93.47 60.2925 93.47 60.38V72.57C93.474 74.1524 94.103 75.6691 95.22 76.79V76.79Z"/>
                </svg>

                <span>Select</span>
            </button>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import CAudio from './Audio.vue'
import CVideo from './Video.vue'
import CImage from './Image.vue'

export default {
    mixins: [FormField, HandlesValidationErrors],
    components: { CVideo, CAudio, CImage },
    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || null
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, JSON.stringify(this.value || null))
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },

        reset() {
            this.$emit('input', this.value = null)
        },

        update(value) {
            this.value = value
            this.$emit('input', value)
        },

        openMediaLibrary() {
            if (!window.cloudinary) return alert("Cloudinary isn't loaded")
            const V = this
            window.cloudinary.openMediaLibrary({
                cloud_name: this.field.cloudName,
                api_key: this.field.apiKey,
                folder: this.field.path || null,
            }, {
                insertHandler: ({assets}) => {
                    if (!assets || !assets.length) return
                    V.update(assets[0])
                }
            })
        }
    },

    mounted() {
        if (document.getElementById('cloudinary-script')) return; // was already loaded
        var scriptTag = document.createElement("script")
        scriptTag.src = "https://media-library.cloudinary.com/global/all.js"
        scriptTag.id = "cloudinary-script"
        document.getElementsByTagName('head')[0].appendChild(scriptTag)
    }

}
</script>
