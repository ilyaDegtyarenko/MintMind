<template>
    <footer>
        <img src="images/footer.png" width="65" alt="Dark site logo for footer.">

        <ul>
            <li v-text="$translate.feedback"></li>
            <li v-text="$translate.faq"></li>
            <li v-text="$translate.charity"></li>
        </ul>

        <ul>
            <li v-text="$translate.contacts"></li>
            <li v-text="$translate.agreement"></li>
            <li v-text="$translate.privacy_policy"></li>
        </ul>
    </footer>
</template>

<script>
    export default {
        name: 'Footer'
    }
</script>

<style lang="scss" scoped>
    footer {
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-shrink: 0;
        padding: 5%;
        font-size: .9rem;
        background: var(--dark-color);
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-box-shadow: 0 -2px 5px rgba(0, 0, 0, .5);
        -moz-box-shadow: 0 -2px 5px rgba(0, 0, 0, .5);
        box-shadow: 0 -2px 5px rgba(0, 0, 0, .5);

        ul {
            li {
                color: #626162;
                cursor: pointer;

                &:hover {
                    text-decoration: underline;
                }

                &:active {
                    color: #8d8d8d;
                }
            }
        }
    }
</style>