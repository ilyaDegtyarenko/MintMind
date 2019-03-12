<template>
    <div id="wrapper">
        <transition name="slide-bottom" appear>
            <app-header></app-header>
        </transition>

        <app-sidebar></app-sidebar>

        <main>
            <transition mode="out-in" name="fade" appear>
                <keep-alive>
                    <router-view></router-view>
                </keep-alive>
            </transition>
        </main>

        <transition name="slide-top" appear>
            <app-footer></app-footer>
        </transition>
    </div>
</template>

<script>
    import Header from '@components/layout/Header';
    import Sidebar from '@components/layout/Sidebar';
    import Footer from '@components/layout/Footer';

    export default {
        name: 'App',
        components: {
            'app-header': Header,
            'app-sidebar': Sidebar,
            'app-footer': Footer
        },
        methods: {
            disableHoverEffectsWhenScrolling() {
                let body = document.body,
                    timer;

                window.addEventListener('scroll', () => {
                    clearTimeout(timer);
                    if (!body.classList.contains('disable-hover')) {
                        body.classList.add('disable-hover');
                    }

                    timer = setTimeout(() => {
                        body.classList.remove('disable-hover');
                    }, 500);
                }, false);
            }
        },
        mounted() {
            this.disableHoverEffectsWhenScrolling();

            this.$nextTick(() => this.$store.dispatch('MAIN/SWITCH_INTERACTION', true));

            this.$store.dispatch('LOCAL_STORAGE/SET_STORAGE_DATA', {key: 'someKey', value:[123]}).catch((error) => console.error(error));
            console.warn(this.$store.getters['LOCAL_STORAGE/GET_STORAGE_DATA']('someKey'));

            console.log('%c Mounted', 'color: green;');
        }
    }
</script>

<style lang="scss">
    @import '@scss/variables';
    @import '@scss/mixins';
    @import '@scss/form-elements';

    *, *::before, *::after {
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
        -webkit-font-smoothing: subpixel-antialiased;
    }

    *::-moz-selection {
        background: var(--mint-color);
    }

    *::selection {
        background: var(--mint-color);
    }

    html, body, #app, #wrapper {
        margin: 0;
        height: 100%;
    }

    #wrapper {
        display: flex;
        flex-direction: column;
    }

    body::-webkit-scrollbar {
        width: 12px;
        background-color: var(--dark-color);
    }

    body::-webkit-scrollbar-track {
        @include box-shadow(inset 2px 2px 5px rgba(0, 0, 0, .2));
    }

    body::-webkit-scrollbar-thumb {
        background-color: #504f50;
        border: 1px solid var(--dark-color);
    }

    ul, ol {
        list-style-type: none;
    }

    .disable-hover {
        pointer-events: none;
    }

    .disabled-button {
        opacity: .8;
        pointer-events: none;
        cursor: initial;
        color: var(--disabled-color);
    }

    /*
    * Animations.
    */

    // Fade.
    .fade-enter-active, .fade-leave-active {
        @include transition(opacity 250ms cubic-bezier(0.390, 0.575, 0.565, 1.000));
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    // Slide bottom.
    .slide-bottom-enter-active, .slide-bottom-leave-active {
        @include transition(opacity 450ms cubic-bezier(0.250, 0.460, 0.450, 0.940), transform 400ms cubic-bezier(0.250, 0.460, 0.450, 0.940));
    }

    .slide-bottom-enter, .slide-bottom-leave-to {
        opacity: 0;
        @include transform(translateY(-1000px));
    }

    // Slide top.
    .slide-top-enter-active, .slide-top-leave-active {
        @include transition(opacity 450ms cubic-bezier(0.250, 0.460, 0.450, 0.940), transform 400ms cubic-bezier(0.250, 0.460, 0.450, 0.940));
    }

    .slide-top-enter, .slide-top-leave-to {
        opacity: 0;
        @include transform(translateY(1000px));
    }
</style>

<style lang="scss" scoped>
    main {
        display: flex;
        flex-flow: column wrap;
        align-items: center;
        justify-content: center;
        flex: 1 0 auto;
        margin: 65px 5px 5px 5px;
    }
</style>