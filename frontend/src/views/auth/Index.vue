<template>
    <v-container fluid fill-height>
        <v-layout justify-center align-center>
            <v-flex shrink>
                <!--                <h1 class="display-4">{{$vuetify.t('$vuetify.noDataText')}}</h1>-->
                <h1 class="display-3">{{ $tc('attributes.password', 0) }}</h1>
                <h1 class="display-3">{{ $tc('attributes.password', 4) }}</h1>
                <h1 class="display-3">{{ $tc('attributes.password', 11) }}</h1>
                <h1 class="display-3">{{ $tc('attributes.password', 31) }}</h1>
                <h1 class="display-3">{{ $tc('attributes.password', 1020342) }}</h1>

                <!--                <v-tooltip right>-->
                <!--                    <template v-slot:activator="{ on }">-->
                <!--                        <v-btn :href="source" icon large target="_blank" v-on="on">-->
                <!--                            <v-icon large>code</v-icon>-->
                <!--                        </v-btn>-->
                <!--                    </template>-->
                <!--                    <span>Source</span>-->
                <!--                </v-tooltip>-->

                <!--                <v-tooltip right>-->
                <!--                    <template v-slot:activator="{ on }">-->
                <!--                        <v-btn icon large href="https://codepen.io/johnjleider/pen/qxQWda" target="_blank" v-on="on">-->
                <!--                            <v-icon large>create</v-icon>-->
                <!--                        </v-btn>-->
                <!--                    </template>-->
                <!--                    <span>Codepen</span>-->
                <!--                </v-tooltip>-->


                <!--                <v-toolbar app>-->
                <!--                    <v-toolbar-title class="headline text-uppercase">-->
                <!--                        <span>Vuetify</span>-->
                <!--                        <span class="font-weight-light">MATERIAL DESIGN</span>-->
                <!--                    </v-toolbar-title>-->
                <!--                    <v-spacer></v-spacer>-->
                <!--                    <v-btn-->
                <!--                            flat-->
                <!--                            href="https://github.com/vuetifyjs/vuetify/releases/latest"-->
                <!--                            target="_blank"-->
                <!--                    >-->
                <!--                        <span class="mr-2">Latest Release</span>-->
                <!--                    </v-btn>-->
                <!--                </v-toolbar>-->
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>

  export default {
    name: 'Index'
  }
</script>
