<template>
    <div>
        <li v-for="error in errors">{{ error }}</li>
    </div>
</template>

<script>
    export default {
        props: ['reply'],
        data () {
            return {
                editing: false,
                body: this.reply.body,
                errors: {}
            }
        },
        methods : {
            update () {
                axios.patch('/replies/' + this.reply.id, {
                    body : this.body
                }).then((response) => {
                    console.log(response)
                }).catch((error) => this.errors = error.response.data.errors)

                if(this.errors = {})
                {
                    this.editing = true
                }
                else{
                    this.editing = false
                    flash('Reply updated')
                }
            },
            destroy(){
                axios.delete('/replies/' + this.reply.id).then((response) => {
                    $(this.$el).fadeOut(300, () => {
                    flash(response.data.message)

                    })
                });

            }
        }
    }
</script>