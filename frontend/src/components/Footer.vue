<template>
    <v-footer class="hidden-xs-only" height="auto" app>
        <v-container class="pa-0" fluid>
            <v-layout justify-center align-center>
                <v-flex shrink>
                    <v-img :src="require('../assets/dark-logo.png')"
                           class="ma-1"
                           width="26"
                           alt="Dark logo."
                           contain/>
                </v-flex>
            </v-layout>
        </v-container>
    </v-footer>
</template>

<script>
  export default {
    name: 'Footer'
  }
</script>
