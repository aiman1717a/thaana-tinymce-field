<template>
    <default-field :field="field" :errors="errors" :full-width-content="true">
        <template slot="field">
            <editor
                :api-key="field.api_key"
                :init="new_options"
                :class="errorClasses && classes"
                :placeholder="field.name"
                v-model="value"
            />
        </template>
    </default-field>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova';
    import Editor from '@tinymce/tinymce-vue';

    export default {
        components: {
            'editor': Editor
        },
        data(){
            return{
                init: {},
            }
        },
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        computed: {
            url: function() {
                var ref = this;
                if(ref.field.driver_type === 'cloud'){
                    return '/nova-vendor/thaana-tinymce-field/save-image-in-cloud';
                }
                return '/nova-vendor/thaana-tinymce-field/save-image';
            },

            new_options: function () {
                return {...this.field.options, ...this.init};
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
        },
        mounted() {
            var ref = this;
            this.init = {
                images_upload_handler: async function(blobInfo, success, failure) {
                    let formData = new FormData();
                    formData.append('file', blobInfo.blob());
                    formData.append('folder', ref.field.folder);

                    return await window.axios.post(ref.url,
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(function (response) {
                            if(ref.field.path !== null){
                                success(ref.field.path + response.data.location);
                            } else {
                                success(response.data.location);
                            }
                    }).catch(function (error) {
                        failure(error.statusCode)
                    })
                },
                setup: function (editor) {
                    if(ref.field.thaana){
                        thaanaKeyboard.defaultKeyboard = 'phonetic';
                        editor.on('keypress', function (e) {
                            thaanaKeyboard.value = '';
                            thaanaKeyboard.handleKey(e);
                            editor.insertContent(thaanaKeyboard.value);
                        });
                    }
                }
            }
        }
    }
</script>
