<template>
    <label class="mm-checkbox">
        <input type="checkbox"
               :name="name"
               :disabled="disabled"
               @change="$emit('change', $event.target.checked)">

        <span v-text="label"
              :class="{'with-error': errorMessage}"></span>

        <small v-if="!hideErrorMessage && errorMessage"
               id="field-error-message"
               style="color: var(--error-color);">
            * {{errorMessage}}
        </small>
    </label>
</template>

<script>
    export default {
        name: 'FormCheckbox',
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
            hideErrorMessage: {
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