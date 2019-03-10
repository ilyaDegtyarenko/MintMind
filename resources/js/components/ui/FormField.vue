<template>
    <label class="mm-field">
        <textarea v-if="textarea"
                  :class="{'with-error': errorMessage}"
                  :name="name"
                  :disabled="disabled"
                  placeholder=" "
                  rows="5"></textarea>

        <input v-else
               :class="{'with-error': errorMessage}"
               :name="name"
               :disabled="disabled"
               placeholder=" ">

        <span v-text="label"></span>

        <small v-if="errorMessage"
               id="field-error-message"
               style="color: var(--error-color);">
            * {{errorMessage}}
        </small>
    </label>
</template>

<script>
    export default {
        name: 'FormField',
        props: {
            name: {
                type: String,
                required: true
            },
            label: {
                type: String,
                required: true
            },
            disabled: {
                type: Boolean,
                default: false
            },
            textarea: {
                type: Boolean,
                default: false
            },
            errorMessage: {
                type: String,
                default: null
            }
        }
    }
</script>

<style scoped>
    textarea {
        resize: none;
    }
</style>