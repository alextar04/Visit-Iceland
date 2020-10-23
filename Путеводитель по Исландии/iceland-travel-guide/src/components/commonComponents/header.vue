<template>
<div>
<!-- Navigation -->
      <nav class="navbar navbar-expand-xl navbar-light bg-white">
        
        <div>
          <img src="@/assets/icelandFlag.png" width="70" height="35">
          <router-link onClick={this.forceUpdate} to="/"><button type="button" class="btn btn-link shadow-none">ПУТЕВОДИТЕЛЬ<br>ПО ИСЛАНДИИ</button></router-link>
        </div>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- Левая часть нав.бара -->
          <ul class="navbar-nav mr-auto"></ul>

          <!-- Правая часть нав.бара -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link onClick={this.forceUpdate} class="nav-link" to="/"><i class="fas fa-warehouse mr-2"></i>Обзор<span class="sr-only">(current)</span></router-link>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-city mr-2"></i>Города</a>
              <div class="dropdown-menu adaptiveSize">
                <div v-for="city in listCityPlaceholder" :key="city.id">
                    <button class="dropdown-item" type="button"><router-link class="linkClass" :to="city.name">{{ city.name }}</router-link></button>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="attractions"><i class="fas fa-tram mr-2"></i>Что посмотреть</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="kitchen"><i class="fas fa-utensils mr-2"></i>Кухня</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="trip"><i class="fas fa-plane mr-2"></i>Как добраться</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="housing"><i class="fas fa-igloo mr-2"></i>Где жить</router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-target="#exampleModal" data-toggle="modal"><i class="fas fa-door-open mr-2"></i>Войти</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header text-center">
              <h5 class="modal-title w-100" id="exampleModalLabel" >Вход в систему</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Пароль</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
                </div>

                <div class="row" style="font-weight: normal; text-transform: initial; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">
                  <div class="custom-control custom-radio col">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Запомнить в системе</label>
                  </div>

                  <div class="col">
                    <a class="linkClass" href="#" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; text-decoration: none;">
                      Зарегестрироваться
                    </a>
                  </div>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Отправить</button>
            </div>
          </div>
        </div>
      </div>
</div>
</template>

<script>
export default{
  props: ['listCityPlaceholder']
}
</script>

<style>
</style>