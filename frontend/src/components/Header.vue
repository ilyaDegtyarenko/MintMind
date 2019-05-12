<template>
    <header>
        <v-toolbar app fixed clipped-left>
            <v-toolbar-title>Application</v-toolbar-title>
            <v-toolbar-side-icon @click.stop="$emit('toggle-sidebar')"></v-toolbar-side-icon>
        </v-toolbar>
<!--        <div id="logo" @click="$router.push({name: 'index'})">-->
<!--            <img src="images/header-logo.png" width="45" alt="Light site logo for header."> {{$translate.app_name}}-->
<!--        </div>-->

<!--        <div v-if="testAuth"-->
<!--             id="menu-hamburger"-->
<!--             :class="{'open': isMenuOpen}"-->
<!--             @click="isMenuOpen = !isMenuOpen">-->

<!--            <span></span>-->
<!--            <span></span>-->
<!--            <span></span>-->
<!--            <span></span>-->
<!--        </div>-->

<!--        <div v-else id="auth-link">-->
<!--            <transition mode="out-in" name="fade" appear>-->
<!--                <button v-if="$route.name === 'login'"-->
<!--                        class="mm-text-btn mm-btn-medium mm-text-btn-dark"-->
<!--                        key="registration"-->
<!--                        v-ripple-effect-->
<!--                        v-text="$translate.registration"-->
<!--                        @click="$router.push({name: 'registration'})"></button>-->

<!--                <button v-else-->
<!--                        class="mm-text-btn mm-btn-medium mm-text-btn-dark"-->
<!--                        v-ripple-effect-->
<!--                        v-text="$translate.login"-->
<!--                        @click="$router.push({name: 'login'})"-->
<!--                        key="login"></button>-->
<!--            </transition>-->
<!--        </div>-->

        <!--<div style="padding: 1rem;">ТЕКЕСТ ОПРОСА</div>-->
        <!--<nav>-->
        <!--<router-link tag="a"-->
        <!--:to="{name: 'registration'}"-->
        <!--class="item"-->
        <!--v-text="'Registration'">-->
        <!--</router-link>-->

        <!--<router-link tag="a"-->
        <!--:to="{name: 'login'}"-->
        <!--class="item"-->
        <!--v-text="'Login'">-->
        <!--</router-link>-->

        <!--<router-link tag="a"-->
        <!--:to="{name: 'survey', params: {id: 'survey-id'}}"-->
        <!--class="item"-->
        <!--v-text="'Survey'">-->
        <!--</router-link>-->
        <!--</nav>-->
    </header>
</template>

<script>
    export default {
        name: 'Header',
        data: () => ({
            isMenuOpen: false,
            testAuth: false
        })
    }
</script>

<style lang="scss" scoped>
    header {
        /*z-index: 100;*/
        /*position: fixed;*/
        /*display: flex;*/
        /*align-items: center;*/
        /*justify-content: space-between;*/
        /*width: 100%;*/
        /*top: 0;*/
        /*left: 0;*/
        /*padding: 7px 20px;*/
        /*background-color: var(--dark-color);*/
        /*color: var(--light-color);*/
        /*-webkit-user-select: none;*/
        /*-moz-user-select: none;*/
        /*-ms-user-select: none;*/
        /*user-select: none;*/
        /*-webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, .5);*/
        /*-moz-box-shadow: 0 2px 5px rgba(0, 0, 0, .5);*/
        /*box-shadow: 0 2px 5px rgba(0, 0, 0, .5);*/

        #logo {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #auth-link {
            button {
                padding: 12px;
            }
        }

        #menu-hamburger {
            width: 27px;
            height: 20px;
            cursor: pointer;
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: .5s ease-in-out;
            -moz-transition: .5s ease-in-out;
            -o-transition: .5s ease-in-out;
            transition: .5s ease-in-out;

            span {
                display: block;
                position: absolute;
                width: 100%;
                height: 3px;
                left: 0;
                opacity: 1;
                background: var(--light-color);
                -webkit-border-radius: 1px;
                -moz-border-radius: 1px;
                border-radius: 1px;
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
                -webkit-transition: .25s ease-in-out;
                -moz-transition: .25s ease-in-out;
                -o-transition: .25s ease-in-out;
                transition: .25s ease-in-out;

                &:nth-child(1) {
                    top: 0;
                }

                &:nth-child(2), &:nth-child(3) {
                    top: 8px;
                }

                &:nth-child(4) {
                    top: 16px;
                }
            }

            &.open span {
                &:nth-child(1) {
                    width: 0;
                    top: 8px;
                    left: 50%;
                }

                &:nth-child(2) {
                    -webkit-transform: rotate(45deg);
                    -moz-transform: rotate(45deg);
                    -o-transform: rotate(45deg);
                    transform: rotate(45deg);
                }

                &:nth-child(3) {
                    -webkit-transform: rotate(-45deg);
                    -moz-transform: rotate(-45deg);
                    -o-transform: rotate(-45deg);
                    transform: rotate(-45deg);
                }

                &:nth-child(4) {
                    width: 0;
                    top: 8px;
                    left: 50%;
                }
            }
        }
    }
</style>
