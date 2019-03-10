<template>
    <app-form link-style="justify-content: flex-end; margin-right: -1rem;">
        <template v-slot:link>
            <button type="button"
                    class="mm-text-btn mm-btn-small mm-text-btn-light"
                    @click="$router.push({name: 'registration'})">
                <span v-text="$translate.registration"></span> <i class="material-icons">keyboard_arrow_right</i>
            </button>
        </template>

        <template v-slot:title>
            {{$translate.login}}
        </template>

        <form-field name="email" :label="$translate.email" :error-message="null"></form-field>
        <form-field name="password" :label="$translate.password" :error-message="null"></form-field>

        <div class="checkbox-wrapper">
            <form-checkbox name="remember" :label="$translate.remember" :error-message="null"></form-checkbox>
        </div>

        <button type="button"
                class="mm-btn mm-btn-medium mm-btn-dark"
                v-text="$translate.login"
                @submit.prevent="alert()"></button>
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
        }
    }
</script>