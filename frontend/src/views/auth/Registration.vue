<template>
    <!--    <app-form link-style="justify-content: flex-start; margin-left: -1rem;">-->
    <!--        <template v-slot:link>-->
    <!--            <button type="button"-->
    <!--                    class="mm-text-btn mm-btn-small mm-text-btn-light redirect-link"-->
    <!--                    v-ripple-effect-->
    <!--                    @click="$router.push({name: 'login'})">-->
    <!--                <i class="material-icons">keyboard_arrow_left</i> <span v-text="$translate.login"></span>-->
    <!--            </button>-->
    <!--        </template>-->

    <!--        <template v-slot:title>-->
    <!--            {{$translate.registration}}-->
    <!--        </template>-->

    <!--        <form-field v-model="formData.name"-->
    <!--                    name="name"-->
    <!--                    :label="$translate.name"-->
    <!--                    :error-message="errors.name"-->
    <!--                    @input="errors.name = null"/>-->

    <!--        <form-field v-model="formData.email"-->
    <!--                    type="email"-->
    <!--                    name="email"-->
    <!--                    :label="$translate.email"-->
    <!--                    :error-message="errors.email"-->
    <!--                    @input="errors.email = null"/>-->

    <!--        <form-field v-model="formData.password"-->
    <!--                    type="password"-->
    <!--                    name="password"-->
    <!--                    :label="$translate.password"-->
    <!--                    :error-message="errors.password"-->
    <!--                    @input="errors.password = null"/>-->

    <!--        <form-field v-model="formData.password_confirmation"-->
    <!--                    type="password"-->
    <!--                    name="password_confirmation"-->
    <!--                    :label="$translate.password_confirmation"-->
    <!--                    :error-message="errors.password_confirmation"-->
    <!--                    @input="errors.password_confirmation = null"/>-->

    <!--        <div class="checkbox-wrapper">-->
    <!--            <form-checkbox name="agreement"-->
    <!--                           :label="''"-->
    <!--                           :error-message="errors.agreement"-->
    <!--                           :hide-error-message="true"-->
    <!--                           @change="(boolean) => {formData.agreement = boolean; errors.agreement = null;}"/>-->

    <!--            <a href="#" v-text="$translate.agreement" @click.prevent="isAgreementEmbeddedWindowVisible = true"></a>-->
    <!--        </div>-->

    <!--        <button type="button"-->
    <!--                :class="['mm-btn mm-btn-medium mm-btn-dark', {'disabled-button': isRegistrationButtonDisabled()}]"-->
    <!--                v-ripple-effect-->
    <!--                v-text="$translate.registration"-->
    <!--                :disabled="isRegistrationButtonDisabled()"-->
    <!--                @click="register()"></button>-->

    <!--        <transition name="fade">-->
    <!--            <div v-show="isAgreementEmbeddedWindowVisible" id="agreement-embedded-window" ref="agreementEmbeddedWindow">-->
    <!--                <agreement embed></agreement>-->
    <!--            </div>-->
    <!--        </transition>-->
    <!--    </app-form>-->
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'Registration',
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
      switchInteraction (boolean) {
        this.$store.dispatch('MAIN/SWITCH_INTERACTION', boolean)
            .catch(error => {
              alert(this.$translate.app_error)
              throw new Error(error)
            })
      },
      register () {
        if (Object.values(this.errors).find(value => !!value)) return false

        this.switchInteraction(false)

        this.$recaptcha('registration')
            .then((token) => {
              axios.post('/re-captcha/verify', { token })
                   .then(() => makeRegistration())
                   .catch(error => {
                     if (error.response.data.hasOwnProperty('error')) {
                       alert(error.response.data.error)
                     } else {
                       alert(this.$translate.app_error)
                     }
                     throw new Error(error)
                   })
            })
            .catch(error => {
              alert(this.$translate.app_error)
              throw new Error(error)
            })

        let makeRegistration = () => {
          axios.post('/auth/registration', this.formData)
               .then(response => {
                 // eslint-disable-next-line
                 console.log(response)

                 this.switchInteraction(true)
               })
               .catch(error => {
                 if (Number(error.response.status) === 422) {
                   let errors = {}
                   for (let fieldName in error.response.data) {
                     if (error.response.data.hasOwnProperty(fieldName)) {
                       errors[fieldName] = (error.response.data[fieldName] || []).join('. ')
                     }
                   }

                   this.switchInteraction(true)
                   this.$nextTick(() => this.errors = errors)
                 } else if (error.response.data.hasOwnProperty('error')) {
                   alert(error.response.data.error)
                 } else {
                   alert(this.$translate.app_error)
                 }
               })
        }
      },
      isRegistrationButtonDisabled () {
        return !this.$store.getters['MAIN/IS_INTERACTION_ENABLED'] || Boolean(Object.values(this.errors).find(field => (field !== null)))
      }
    },
    mounted () {
      let agreementEmbeddedWindow = this.$refs.agreementEmbeddedWindow
      agreementEmbeddedWindow.addEventListener('click', (event) => {
        if (event.target !== agreementEmbeddedWindow) return false
        this.isAgreementEmbeddedWindowVisible = false
      }, false)
    }
  }
</script>

<style lang="scss" scoped>
    .redirect-link {
        border-right: 2px solid !important;
    }

    .checkbox-wrapper {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    #agreement-embedded-window {
        z-index: 100003;
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(255, 255, 255, .55);
    }
</style>
