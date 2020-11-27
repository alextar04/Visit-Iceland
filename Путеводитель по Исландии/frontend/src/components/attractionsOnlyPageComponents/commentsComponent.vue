<template>
    <div>
        <p class="lifehacks" style="margin-left: 20%; margin-right: 20%;"><i class="fas fa-mountain mr-2"></i>Комментарии</p>
        <div>
        <form @submit.prevent="addNewComment">
        <div class="card bg-light border-secondary" style="margin-left: 20%; margin-right: 20%;">
            <div class="card-body">
                <textarea class="form-control" id="exampleFormControlTextarea1" v-model="text" placeholder="Напишите что-нибудь..." rows="3"></textarea>
                <a style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;">{{error}}</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <button type="submit" class="btn btn-outline-secondary" id="addButton" style="margin: 5px 5px 5px 5px">Добавить</button>
                </small>
            </div>
        </div>
        <br>
        </form>
        </div>
        <comment
            v-for="oneComment in commentsList"
            v-bind:comment="oneComment"
            v-on:remove-comment="removeComment"
            v-on:update-comment="updateComment"
        />
    </div>
</template>


<script>
import comment from '@/components/attractionsOnlyPageComponents/comment.vue'
export default{
    data(){
        return{
            text: '',
            error: '' 
        }
    },
    props: ['commentsList'],
    components: {
        comment
    },
    methods: {
        removeComment(id){
            this.$emit('remove-comment', id)
        },
        updateComment(id, text){
            this.$emit('update-comment', id, text)
        },
        addNewComment(){
            if (this.text.trim() === ""){
                this.error = "Пустой текст"
                return
            }
            if (this.getSignInStatus() === "Войти"){
                this.error = "Выполните вход в систему"
                return
            }
                this.$emit('add-comment', this.text)
                this.text = ""
                this.error = ""
        },
        getSignInStatus(){
            if (localStorage.getItem('user') === null){
                return "Войти"
            }else{
                let email = JSON.parse(localStorage.getItem('user')).email
                return email
            }
        },
    }
}
</script>

<style >
</style>