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