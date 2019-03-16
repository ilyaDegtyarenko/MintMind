<template>
    <app-form link-style="justify-content: flex-end; margin-right: -1rem;">
        <template v-slot:link>
            <button type="button"
                    class="mm-text-btn mm-btn-small mm-text-btn-light redirect-link"
                    v-ripple-effect
                    @click="$router.push({name: 'registration'})">
                <span v-text="$translate.registration"></span> <i class="material-icons">keyboard_arrow_right</i>
            </button>
        </template>

        <template v-slot:title>
            {{$translate.login}}
        </template>

        <form-field v-model="formData.email"
                    type="email"
                    name="email"
                    :label="$translate.email"
                    :error-message="errors.email"
                    @input="errors.email = null"/>

        <form-field v-model="formData.password"
                    type="password"
                    name="password"
                    :label="$translate.password"
                    :error-message="errors.password"
                    @input="errors.password = null"/>

        <div class="checkbox-wrapper">
            <form-checkbox name="remember"
                           :label="$translate.remember"
                           :error-message="errors.remember"
                           @change="(boolean) => {formData.remember = boolean; errors.remember = null;}"/>
        </div>

        <button type="button"
                :class="['mm-btn mm-btn-medium mm-btn-dark', {'disabled-button': isLoginButtonDisabled()}]"
                v-ripple-effect
                v-text="$translate.login"
                :disabled="isLoginButtonDisabled()"
                @click="login()"></button>
    </app-form>
</template>

<script>
    import Form from '@components/ui/Form';
    import FormField from '@components/ui/FormField';
    import FormCheckbox from '@components/ui/FormCheckbox';

    export default {
        name: 'Login',
        components: {
            'app-form': Form,
            'form-field': FormField,
            'form-checkbox': FormCheckbox
        },
        data: () => ({
            formData: {
                email: null,
                password: null,
                remember: false
            },
            errors: {}
        }),
        methods: {
            login() {
                console.log(Object.values(this.errors));
                if (Object.values(this.errors).find(value => !!value)) {
                    alert('Fix errors.');
                    return;
                }

                axios.post('/auth/login',
                    this.formData
                ).then((response) => {
                    console.log(response);
                }).catch((error) => {
                    if (Number(error.response.status) === 422) {
                        let errors = {};

                        for (let fieldName in error.response.data) {
                            if (error.response.data.hasOwnProperty(fieldName)) {
                                errors[fieldName] = (error.response.data[fieldName] || []).join('. ');
                            }
                        }

                        this.errors = errors;
                    }
                });
            },
            isLoginButtonDisabled() {
                return Boolean(Object.values(this.errors).find(field => (field !== null)));
            }
        }
    }
</script>

<style scoped>
    .redirect-link {
        border-left: 2px solid !important;
    }
</style>