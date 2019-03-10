<template>
    <app-form link-style="justify-content: flex-start; margin-left: -1rem;">
        <template v-slot:link>
            <button type="button"
                    class="mm-text-btn mm-btn-small mm-text-btn-light"
                    @click="$router.push({name: 'login'})">
                <i class="material-icons">keyboard_arrow_left</i> <span v-text="$translate.login"></span>
            </button>
        </template>

        <template v-slot:title>
            {{$translate.registration}}
        </template>

        <form-field v-model="formData.name"
                    name="name"
                    :label="$translate.name"
                    :error-message="errors.name"
                    @input="errors.name = null">
        </form-field>

        <form-field v-model="formData.email"
                    type="email"
                    name="email"
                    :label="$translate.email"
                    :error-message="errors.email"
                    @input="errors.email = null">
        </form-field>

        <form-field v-model="formData.password"
                    type="password"
                    name="password"
                    :label="$translate.password"
                    :error-message="errors.password"
                    @input="errors.password = null">
        </form-field>

        <form-field v-model="formData.password_confirmation"
                    type="password"
                    name="password_confirmation"
                    :label="$translate.password_confirmation"
                    :error-message="errors.password_confirmation"
                    @input="errors.password_confirmation = null">
        </form-field>

        <div class="checkbox-wrapper">
            <form-checkbox name="agreement"
                           :label="$translate.agreement"
                           :error-message="errors.agreement"
                           @change="(boolean) => {formData.agreement = boolean; errors.agreement = null;}"></form-checkbox>

        </div>

        <button type="button"
                class="mm-btn mm-btn-medium mm-btn-dark"
                v-text="$translate.registration" @click="register()"></button>
    </app-form>
</template>

<script>
    import Form from '@components/ui/Form';
    import FormField from '@components/ui/FormField';
    import FormCheckbox from '@components/ui/FormCheckbox';

    export default {
        name: 'Register',
        components: {
            'app-form': Form,
            'form-field': FormField,
            'form-checkbox': FormCheckbox
        },
        data: () => ({
            formData: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
                agreement: null
            },
            errors: {}
        }),
        methods: {
            register() {
                axios.post('/auth/registration',
                    this.formData
                ).then((response) => {
                    console.log(response);
                }).catch((error) => {
                    if (Number(error.response.status) === 422) {
                        for (let fieldName in error.response.data) {
                            if (error.response.data.hasOwnProperty(fieldName)) {
                                let errorText = (error.response.data[fieldName] || []).join('. ');
                                this.$set(this.errors, fieldName, errorText);
                            }
                        }
                    }
                });
            }
        }
    }
</script>