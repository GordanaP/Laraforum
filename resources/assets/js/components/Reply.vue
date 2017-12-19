<template>
    <div>
        <li v-for="error in errors">{{ error }}</li>
    </div>
</template>

<script>
    import Like from './Like.vue'

    export default {
        components : {Like},
        props: ['reply'],
        data () {
            return {
                editing: false,
                body: this.reply.body,
                errors: {}
            }
        },
        computed: {
            hasErrors () {
                return Object.keys(this.errors).length > 0
            }
        },
        methods : {
            update () {
                axios.patch('/replies/' + this.reply.id, {
                    body : this.body
                }).then((response) => {
                    this.editing = false
                    $.notify({
                        title: "Success:",
                        message: "Your reply has been updated"
                    }, {
                        type: 'success'
                    });
                }).catch((error) => this.errors = error.response.data.errors)

                if(this.hasErrors)
                {
                    this.editing = true
                }
            },
            cancel () {
                this.clearErrors()
                this.body = this.reply.body
                this.editing = false
            },
            clearErrors () {
                this.errors = {}
            },
            destroy () {
                axios.delete('/replies/' + this.reply.id).then((response) => {
                    $(this.$el).fadeOut(300, () => {
                        $.notify({
                            title: "Success:",
                            message: response.data.message
                        }, {
                            type: 'success'
                        });
                    })
                });
            }
        }
    }
</script>