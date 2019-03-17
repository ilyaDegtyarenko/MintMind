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
        props: {
            authUser: {
                type: Object,
                default: () => ({})
            }
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
            this.$nextTick(() => this.$store.dispatch('MAIN/SWITCH_INTERACTION', true).catch(error => {
                alert(this.$translate.app_error);
                throw new Error(error);
            }));
            return;
            this.disableHoverEffectsWhenScrolling();


            this.$store.dispatch('LOCAL_STORAGE/SET_STORAGE_DATA', {
                key: 'someKey',
                value: [123]
            }).catch(error => {
                alert(this.$translate.app_error);
                throw new Error(error);
            });
            console.warn(this.$store.getters['LOCAL_STORAGE/GET_STORAGE_DATA']('someKey'));
            console.warn(this.$store.getters['MAIN/IS_INTERACTION_ENABLED']);
            setTimeout(() => {
                console.warn(this.$store.getters['MAIN/IS_INTERACTION_ENABLED']);
            }, 1000);

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

    a {
        color: inherit;
        font-size: .85rem;
        border-bottom: 1px dashed transparent;

        &:hover:not(:active) {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg id='squiggle-link' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:ev='http://www.w3.org/2001/xml-events' viewBox='0 0 20 4'%3E%3Cstyle type='text/css'%3E.squiggle{animation:shift .3s linear infinite;}@keyframes shift {from {transform:translateX(0);}to {transform:translateX(-20px);}}%3C/style%3E%3Cpath fill='none' stroke='%2347ca8c' stroke-width='2' class='squiggle' d='M0,3.5 c 5,0,5,-3,10,-3 s 5,3,10,3 c 5,0,5,-3,10,-3 s 5,3,10,3'/%3E%3C/svg%3E");
            background-position: 0 100%;
            background-size: auto .14rem;
            background-repeat: repeat-x;
            text-decoration: none;
        }

        &:active {
            border-bottom-color: #47ca8c;
            text-decoration: none;
        }
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
        margin: 64px 5px 5px 5px;
    }
</style>