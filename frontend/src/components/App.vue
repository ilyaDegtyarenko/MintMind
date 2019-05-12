<template>
    <v-app dark>
        <app-header @toggle-sidebar="() => sidebar.show = !sidebar.show"/>

        <app-sidebar :show="sidebar.show" @hide="() => sidebar.show = false"/>

        <v-content>
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </v-content>

        <app-footer/>
    </v-app>
</template>

<script>
  import Header from './Header'
  import Sidebar from './Sidebar'
  import Footer from './Footer'

  export default {
    name: 'App',
    components: {
      'app-header': Header,
      'app-sidebar': Sidebar,
      'app-footer': Footer
    },
    data: () => ({
      sidebar: {
        show: false
      }
    }),
    methods: {
      disableHoverEffectsWhenScrolling () {
        let body = document.body,
          timer

        window.addEventListener('scroll', () => {
          clearTimeout(timer)
          if (!body.classList.contains('disabled-hover')) {
            body.classList.add('disabled-hover')
          }

          timer = setTimeout(() => {
            body.classList.remove('disabled-hover')
          }, 500)
        }, false)
      }
    },
    beforeCreate () {

        /* Setting locale. */
      document.documentElement.lang = this.$i18n.locale = (Object.keys(this.$i18n.messages).includes(navigator.language) ? navigator.language : 'en')
    },
    created () {
      this.disableHoverEffectsWhenScrolling()
    },
    mounted () {
      // this.$nextTick(() => {
      //   this.$store.dispatch('MAIN/SWITCH_INTERACTION', true)
      //       .catch(error => {
      //         alert(this.$translate.app_error)
      //         throw new Error(error)
      //       })
      // })

      // this.$store.dispatch('LOCAL_STORAGE/SET_STORAGE_DATA', {
      //       key: 'someKey',
      //       value: [123]
      //     })
      //     .catch(error => {
      //       alert(this.$translate.app_error)
      //       throw new Error(error)
      //     })

      // console.warn(this.$store.getters['LOCAL_STORAGE/GET_STORAGE_DATA']('someKey'))
      // console.warn(this.$store.getters['MAIN/IS_INTERACTION_ENABLED'])
      // setTimeout(() => {
      //   console.warn(this.$store.getters['MAIN/IS_INTERACTION_ENABLED'])
      // }, 1000)

      // eslint-disable-next-line
      console.log('%cMounted', 'color: green;')
    }
  }
</script>
