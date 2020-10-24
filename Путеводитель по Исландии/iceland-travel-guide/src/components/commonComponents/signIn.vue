<template>
<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <a v-if="getSignInStatus() !== 'Войти'">
            <div class="modal-header text-center">
              <h5 class="modal-title w-100" id="exampleModalLabel" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;" >Личный кабинет</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                  <div class="error">{{errors.email}}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">Пароль</label>
                  <input type="password" class="form-control" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;" v-model="password" placeholder="Введите пароль">
                  <div class="error">{{errors.password}}</div>
                </div>

                <div class="row" style="font-weight: normal; text-transform: initial; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">
                  <div class="custom-control custom-radio col">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Зарегестрироваться</label>
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
        if (this.validate()) {
          // SEND Ajax запрос
          User.login({
            email: this.email,
            accessToken: 'ksdjflksjdflkjdslkfj!#'
          })
        }
        e.preventDefault();
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
        User.logout()
        this.$forceUpdate()
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
      location.reload()
    }
  },
}
</script>