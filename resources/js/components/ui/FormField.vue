<template>
    <label class="mm-field">
        <textarea v-if="textarea"
                  :class="{'with-error': errorMessage}"
                  :name="name"
                  :disabled="disabled"
                  placeholder=" "
                  rows="5"></textarea>

        <input v-else
               :type="type"
               :class="{'with-error': errorMessage}"
               :name="name"
               :disabled="disabled"
               placeholder=" "
               @input="$emit('input', $event.target.value)">

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
            type: {
                type: String,
                default: 'text'
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