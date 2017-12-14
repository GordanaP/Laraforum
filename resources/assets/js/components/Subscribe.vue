<template>
    <div>
        <button class="btn btn-link btn-sm" @click="toggle">
            <i class="fa fa-envelope-o" :class="active"></i>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['thread'],
        data () {
            return {
                subscribed : this.thread.isSubscribed,
                url: '/subscriptions/' + this.thread.slug
            }
        },
        computed : {
            active() {
                return [this.subscribed ? 'active' : '']
            }
        },
        methods : {
            toggle() {
                this.subscribed ? this.unsubscribe() : this.subscribe()
            },
            subscribe () {
                axios.post(this.url).then((response) => {
                    flash(response.data.message)
                })

                this.subscribed = true

            },
            unsubscribe() {
                axios.delete(this.url).then((response) => {
                    flash(response.data.message)
                })
                this.subscribed = false
            }
        }
    }
</script>

<style>
    .active : {color : #9A161A;}
</style>