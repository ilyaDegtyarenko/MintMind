<template>
    <form>
        <div id="link" :style="linkStyle">
            <slot name="link"></slot>
        </div>

        <div id="title">
            <slot name="title"></slot>
        </div>

        <slot></slot>
    </form>
</template>

<script>
    export default {
        name: 'Form',
        props: {
            linkStyle: {
                type: String,
                default: null
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '@scss/mixins';

    form {
        display: flex;
        flex-flow: column wrap;
        min-width: 30%;
        max-width: 800px;
        padding: 1rem 2rem;
        @include box-shadow(0 2px 4px -1px rgba(0, 0, 0, .2), 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12));

        .mm-field, .mm-btn, .checkbox-wrapper {
            margin: 8px 0;
        }

        .checkbox-wrapper {
            display: flex;
            justify-content: center;
        }

        #link {
            display: flex;
            margin-bottom: 1rem;

            button {
                display: flex;
                align-items: center;
            }
        }

        #title {
            margin: .5rem;
            font-size: 2rem;
            text-align: center;
        }
    }
</style>