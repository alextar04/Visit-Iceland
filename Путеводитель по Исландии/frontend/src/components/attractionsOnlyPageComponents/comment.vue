<template>
    <div>
        <div class="card bg-light border-secondary" style="margin-left: 20%; margin-right: 20%;">
            <div class="card-body">
                <h6 class="card-text">{{ comment.username }}</h6>

                <h6 class="card-text"><small class="text-muted">{{ comment.date }}</small></h6>
                <a v-if="changeMode == true">{{ fillTextExported() }}</a>
                <textarea v-if="changeMode == true" v-model="textExported" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ textExported }}</textarea>
                <a v-else class="card-text" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;">{{ comment.text }}</a>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <!--
                    <a v-if="checkCommentHolder()" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;"><button v-if="changeMode == false" type="button" v-on:click="setChangeMode()" class="btn btn-outline-secondary" style="margin: 5px 5px 5px 5px">Изменить</button></a>
                    <a v-if="checkCommentHolder()" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;"><button v-if="changeMode" type="button" v-on:click="updateComment(comment.id, textExported)" class="btn btn-outline-success" style="margin: 5px 5px 5px 5px">Применить</button></a>
                    <a v-if="checkCommentHolder()" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; letter-spacing: 0px;"><button type="button" v-on:click="$emit('remove-comment', comment.id)" class="btn btn-outline-danger" style="margin: 5px 5px 5px 5px">Удалить</button></a>
                    -->
                    <button v-if="changeMode == false" type="button" v-on:click="setChangeMode()" class="btn btn-outline-secondary" style="margin: 5px 5px 5px 5px">Изменить</button>
                    <button v-if="changeMode" type="button" v-on:click="updateComment(comment.id, textExported)" class="btn btn-outline-success" style="margin: 5px 5px 5px 5px">Применить</button>
                    <button type="button" v-on:click="$emit('remove-comment', comment.id)" class="btn btn-outline-danger" style="margin: 5px 5px 5px 5px">Удалить</button>
                </small>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
export default{
    data(){
        return {
            changeMode: false,
            textExported: ''
        }
    },
    props: ['comment'],
    methods:{
        setChangeMode(){
            this.changeMode = true
        },
        updateComment(id, textExported){
            this.$emit('update-comment', id, textExported)
            this.changeMode = false
        },
        fillTextExported(){
            if (this.textExported == ''){
                this.textExported = this.comment.text
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
        }
    }
}
</script>

<style lang="css">
.btn:focus {
  box-shadow: none !important;
  outline: none !important;
}
</style>