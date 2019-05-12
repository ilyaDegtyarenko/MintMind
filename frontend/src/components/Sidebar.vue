<template>
    <v-navigation-drawer v-model="drawer"
                         app
                         right
                         fixed
                         clipped
                         temporary>
        <v-list dense>
            <v-list-tile @click="">
                <v-list-tile-action>
                    <v-icon>dashboard</v-icon>
                </v-list-tile-action>

                <v-list-tile-content>
                    <v-list-tile-title>Dashboard</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>

            <v-list-tile @click="">
                <v-list-tile-action>
                    <v-icon>settings</v-icon>
                </v-list-tile-action>

                <v-list-tile-content>
                    <v-list-tile-title>Settings</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>

    <!--        <ul>-->
    <!--            <li v-text="$translate.feedback"></li>-->
    <!--            <li v-text="$translate.faq"></li>-->
    <!--            <li v-text="$translate.charity"></li>-->
    <!--        </ul>-->

    <!--        <ul>-->
    <!--            <li v-text="$translate.contacts"></li>-->
    <!--            <li v-text="$translate.agreement" @click="$router.push({name: 'agreement'})"></li>-->
    <!--            <li v-text="$translate.privacy_policy" @click="$router.push({name: 'policy'})"></li>-->
    <!--        </ul>-->
</template>

<script>
  export default {
    name: 'Sidebar',
    props: {
      show: Boolean
    },
    computed: {
      drawer: {
        get () {
          return this.show
        },
        set (value) {
          if (!value) this.$emit('hide')
        }
      }
    }
  }
</script>
