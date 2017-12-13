<template>
    <div>
        <button class="btn btn-link btn-sm" @click="toggle">
            <span class="glyphicon" :class="active"></span>
            <span v-text="count"></span>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['reply'],
        data () {
            return {
                count: this.reply.likesCount,
                liked: this.reply.isLiked,
                url: '/replies/' + this.reply.id + '/likes'
            }
        },
        computed : {
            active() {
                return [this.liked ? 'active glyphicon-heart' : 'glyphicon-heart-empty']
            }
        },
        methods : {
            toggle(){
                this.liked ? this.unlike() : this.like()
            },
            like () {
                axios.post(this.url)
                this.liked = true
                this.count++
            },
            unlike() {
                axios.delete(this.url)
                this.liked = false
                this.count--
            }
        }
    }
</script>

<style>
    .active {color: #9A161A;}
</style>