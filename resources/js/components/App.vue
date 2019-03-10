<template>
    <div id="wrapper">
        <transition appear appear-active-class="header-appear">
            <app-header></app-header>
        </transition>

        <app-sidebar></app-sidebar>

        <main>
            <transition mode="out-in"
                        appear
                        appear-active-class="content-container-enter"
                        enter-active-class="content-container-enter"
                        leave-active-class="content-container-leave">

                <keep-alive>
                    <router-view></router-view>
                </keep-alive>
            </transition>
        </main>

        <transition appear appear-active-class="footer-appear">
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
        data: () => ({}),
        mounted() {
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
    }
</script>

<style lang="scss">
    @import '@scss/variables';
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
        -webkit-box-shadow: inset 2px 2px 5px rgba(0, 0, 0, .2);
        -moz-box-shadow: inset 2px 2px 5px rgba(0, 0, 0, .2);
        box-shadow: inset 2px 2px 5px rgba(0, 0, 0, .2);
    }

    body::-webkit-scrollbar-thumb {
        background-color: #504f50;
        border: 1px solid var(--dark-color);
    }

    main {
        align-items: center;
        justify-content: center;
        flex: 1 0 auto;
        margin: 65px 5px 5px 5px;
    }

    ul, ol {
        list-style-type: none;
    }

    .disable-hover {
        pointer-events: none;
    }
</style>

<style lang="scss" scoped>
    @import '@scss/mixins';

    main {
        display: flex;
        flex-flow: column wrap;
    }

    /*
    * Animations.
    */

    /* Content container. */
    .content-container-enter {
        @include animation(content-container-enter 250ms cubic-bezier(0.390, 0.575, 0.565, 1.000) both);
    }

    @include keyframes(content-container-enter) {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .content-container-leave {
        @include animation(content-container-leave 150ms ease-out both);
    }

    @include keyframes(content-container-leave) {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }

    /* Header. */
    .header-appear {
        @include animation(header-appear 275ms cubic-bezier(0.250, 0.460, 0.450, 0.940) both);
    }

    @include keyframes(header-appear) {
        0% {
            opacity: 0;
            @include transform(translateY(-1000px));
        }
        100% {
            opacity: 1;
            @include transform(translateY(0));
        }
    }

    .footer-appear {
        @include animation(footer-appear 275ms cubic-bezier(0.250, 0.460, 0.450, 0.940) both);
    }

    @include keyframes(footer-appear) {
        0% {
            opacity: 0;
            @include transform(translateY(1000px));
        }
        100% {
            opacity: 1;
            @include transform(translateY(0));
        }
    }
</style>