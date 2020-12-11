<template>
<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <a v-if="getSignInStatus() !== 'Войти'">
            <div class="modal-header text-center">
              <h5 class="modal-title w-100" id="exampleModalLabel" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;" >Личный кабинет</h5>
              <button type="button" class="close" data-dismiss="modal" @click="parentRefresh()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            </a>

            <a v-if="getSignInStatus() === 'Войти'">
            <div class="modal-header text-center">
              <h5 class="modal-title w-100" id="exampleModalLabel" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Вход в систему</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            </a>

            <div class="modal-body">
              <a v-if="getSignInStatus() === 'Войти'">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Email</label>
                  <input type="email" class="form-control" v-model="email" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;" aria-describedby="emailHelp" placeholder="Введите Email">
                  <div class="error" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; margin-top: 10px">{{errors.email}}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Пароль</label>
                  <input type="password" class="form-control" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;" v-model="password" placeholder="Введите пароль">
                  <div class="error" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none; margin-top: 10px">{{errors.password}}</div>
                </div>

                <div class="row" style="font-weight: normal; text-transform: initial; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">

                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1" style="font-weight: normal; text-transform: initial; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">
                        Зарегестрироваться
                      </label>
                    </div>
                  </div>

                  <div class="col">
                  </div>
                </div>
              </form>
              </a>

              <a v-if="getSignInStatus() !== 'Войти'">
                <h5 >Вы вошли как: {{ getSignInStatus() }}</h5>
              </a>

            </div>

            <a v-if="getSignInStatus() === 'Войти'">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="parentRefresh()" data-dismiss="modal" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Закрыть</button>
                <button type="button" class="btn btn-primary" v-on:click="signIn" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Отправить</button>
              </div>
            </a>

            <a v-if="getSignInStatus() !== 'Войти'">
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="parentRefresh()" data-dismiss="modal" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Закрыть</button>
                <button type="button" class="btn btn-primary" v-on:click="logout" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Выйти</button>
                </div>
            </a>

          </div>
        </div>
      </div>
</div>
</template>

<script>
import User from '@/components/commonComponents/user.vue'
import Axios from 'axios'

export default{
  data() {
      return {
        email: '',
        password: '',
        errors: {}
      }
    },
    methods: {
      signIn(e) {
        let thisEnv = this
        if (this.validate()) {
          
          if (this.needRegistration()){
              this.signUp(e)
              return
          }

          const instance = Axios.create({
              baseURL: 'http://127.0.0.1:1199/api/v1'
          })
          var token = null
          instance.post('/user/signin', {"login": thisEnv.email, "password": thisEnv.password}).then(function(responseToken){
              token = responseToken.data

              if (token != false){
                  User.login({
                    email: thisEnv.email,
                    accessToken: token
                  })

                  e.preventDefault()
                  thisEnv.$forceUpdate()
                  thisEnv.parentRefresh()
              } else {
                  thisEnv.errors.email = 'Введены неверные данные'
                  thisEnv.errors.password = ''
                  thisEnv.password = ''
                  e.preventDefault()
               }
          })
        }
      },

      needRegistration(){
        return(document.getElementById('gridCheck1').checked)
      },

      signUp(e){
          let thisEnv = this
          var token = null
          const instance = Axios.create({
              baseURL: 'http://127.0.0.1:1199/api/v1'
          })

          instance.post('/user/signup', {"login": thisEnv.email, "password": thisEnv.password}).then(function(responseToken){
              token = responseToken.data.token

              if (responseToken.data.statusText == undefined){
                  User.login({
                    email: thisEnv.email,
                    accessToken: token
                  })

                  e.preventDefault()
                  thisEnv.$forceUpdate()
                  thisEnv.parentRefresh()
              } else {
                  thisEnv.errors.email = 'Пользователь с таким логином уже существует!'
                  thisEnv.errors.password = ''
                  thisEnv.password = ''
                  document.getElementById('gridCheck1').checked = false
                  e.preventDefault()
               }
          })
      },

      validate() {
        this.errors = {}
        if (this.email.trim().length === 0) {
          this.errors.email = 'Заполните Email.'
        }
        if (this.password.trim().length === 0) {
          this.errors.password = 'Заполните Пароль.'
        }
        return Object.keys(this.errors).length === 0
      },


    logout() {
      let thisEnv = this
      const instance = Axios.create({
            baseURL: 'http://127.0.0.1:1199/api/v1'
      })
      let token = JSON.parse(localStorage.getItem('user')).accessToken

      instance.post('/user/exit', {"token": token}).then(function(response){
            if (response.data.accessToken == null){
                User.logout()
                thisEnv.password = ''
                thisEnv.$forceUpdate()
                thisEnv.parentRefresh()
            }
      })
    },


    getSignInStatus(){
      if (localStorage.getItem('user') === null){
        return "Войти"
      }else{
        let email = JSON.parse(localStorage.getItem('user')).email
        return email
      }
    },
    parentRefresh(){
      this.$emit('refresh-after-sign-in')
    }
  },
}
</script>