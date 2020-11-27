<template>
    <div>
        <div class="card bg-light border-secondary" style="margin-left: 20%; margin-right: 20%;">
            <div class="card-body">
                <h6 class="card-text">{{ comment.username }}</h6>

                <h6 class="card-text"><small class="text-muted">{{ comment.date }}</small></h6>
                <a v-if="comment.changeMode == true">{{ fillTextExported() }}</a>
                <textarea v-if="comment.changeMode == true" v-model="comment.textExported" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ comment.textExported }}</textarea>
                <a v-else class="card-text" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;">{{ comment.text }}</a>
            </div>
            <div class="card-footer" v-if="checkCommentHolder()">
                <small class="text-muted">
                    <a v-if="checkCommentHolder()" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;"><button v-if="comment.changeMode == false" type="button" v-on:click="setChangeMode()" class="btn btn-outline-secondary" style="margin: 5px 5px 5px 5px">Изменить</button></a>
                    <a v-if="checkCommentHolder()" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;"><button v-if="comment.changeMode" type="button" v-on:click="updateComment(comment.id, comment.textExported)" class="btn btn-outline-success" style="margin: 5px 5px 5px 5px">Применить</button></a>
                    <a v-if="checkCommentHolder()" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;"><button type="button" v-on:click="$emit('remove-comment', comment.id)" class="btn btn-outline-danger" style="margin: 5px 5px 5px 5px">Удалить</button></a>
                </small>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
export default{
    data(){
        return {}
    },
    props: ['comment'],
    methods:{
        setChangeMode(){
            this.comment.changeMode = true
        },
        updateComment(id, textExported){
            if (textExported.trim() == ''){
                textExported = "Напишу комментарий позднее!"
            }
            this.$emit('update-comment', id, textExported)
            this.comment.changeMode = false
        },
        fillTextExported(){
            if ((this.comment.textExported == '') && (this.comment.firstRender == true)){
                this.comment.textExported = this.comment.text
                this.comment.firstRender = false
            }
        },
        checkCommentHolder(){
            return (this.comment.username === this.getSignInStatus())
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

<style lang="css">
.btn:focus {
  box-shadow: none !important;
  outline: none !important;
}
</style>