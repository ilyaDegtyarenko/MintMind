<template>
    <div id="wrapper">
        <transition name="header" appear>
            <app-header></app-header>
        </transition>

        <app-sidebar></app-sidebar>

        <main>
            <transition mode="out-in" name="content" appear>
                <keep-alive>
                    <router-view></router-view>
                </keep-alive>
            </transition>
        </main>

        <transition name="footer" appear>
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

    .content-enter-active, .content-leave-active {
        transition: opacity 250ms cubic-bezier(0.390, 0.575, 0.565, 1.000);
    }

    .content-enter, .content-leave-to {
        opacity: 0;
    }

    .header-enter-active, .header-leave-active {
        transition: opacity 275ms cubic-bezier(0.250, 0.460, 0.450, 0.940), transform 275ms cubic-bezier(0.250, 0.460, 0.450, 0.940);
    }

    .header-enter, .header-leave-to {
        opacity: 0;
        @include transform(translateY(-1000px));
    }

    .footer-enter-active, .footer-leave-active {
        transition: opacity 275ms cubic-bezier(0.250, 0.460, 0.450, 0.940), transform 275ms cubic-bezier(0.250, 0.460, 0.450, 0.940);
    }

    .footer-enter, .footer-leave-to {
        opacity: 0;
        @include transform(translateY(1000px));
    }
</style>