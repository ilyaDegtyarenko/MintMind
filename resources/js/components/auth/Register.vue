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

        <form-field name="name" :label="$translate.name" :error-message="null"></form-field>
        <form-field name="email" :label="$translate.email" :error-message="null"></form-field>
        <form-field name="password" :label="$translate.password" :error-message="null"></form-field>
        <form-field name="password_confirmation" :label="$translate.password_confirmation" :error-message="null"></form-field>

        <div class="checkbox-wrapper">
            <form-checkbox name="agreement" :label="$translate.agreement" :error-message="null"></form-checkbox>
        </div>

        <button type="button"
                class="mm-btn mm-btn-medium mm-btn-dark"
                v-text="$translate.registration"
                @submit.prevent="alert()"></button>
    </app-form>
</template>

<script>
    import Form from '@components/ui/Form';
    import FormField from '@components/ui/FormField';
    import FormCheckbox from '@components/ui/FormCheckbox';

    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: 'Register',
        components: {
            'app-form': Form,
            'form-field': FormField,
            'form-checkbox': FormCheckbox
        },
        computed: {
            ...mapGetters('AUTH_MODULE', {
                getName: 'GET_NAME',
                getEmail: 'GET_EMAIL',
                getPassword: 'GET_PASSWORD',
                getAgreement: 'GET_AGREEMENT'
            })
        },
        methods: {
            ...mapActions('AUTH_MODULE', {
                setName: 'SET_NAME',
                setEmail: 'SET_EMAIL',
                setPassword: 'SET_PASSWORD',
                setAgreement: 'SET_AGREEMENT'
            })
        },
        mounted() {
            console.warn('register');
        }
    }
</script>