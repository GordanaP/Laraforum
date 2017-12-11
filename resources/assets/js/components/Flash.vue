<template>
    <div class="flash-alert" v-show="show">
        <div class="alert alert-danger" role="danger">
            <strong>Success!</strong> {{ body }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['message'],
        data () {
            return {
                body : '',
                show: false
            }
        },
        created()
        {
            if (this.message)
            {
                this.flash(this.message)
            }

            window.events.$on('flash', message => this.flash(message))
        },
        methods: {
            flash (message) {
                this.body = message
                this.show = true

                this.hide()
            },
            hide () {
                setTimeout(() => {
                    this.show = false
                }, 3000)
            }
        }
    }
</script>

<style>

    .flash-alert {
        position: fixed;
        right: 25px;
        bottom: 25px;
    }

</style>