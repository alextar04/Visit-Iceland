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
                    <button class="dropdown-item" type="button"><router-link onClick={this.forceUpdate} class="linkClass" :to="city.name">{{ city.name }}</router-link></button>
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
              {{ checkSignIn() }}
              <a class="nav-link" href="#" data-target="#exampleModal" data-toggle="modal"><i class="fas fa-door-open mr-2"></i>{{ username }}</a>
            </li>
          </ul>
        </div>
      </nav>

      <signIn 
        v-on:refresh-after-sign-in="checkSignIn"
      />
</div>
</template>

<script>
import signIn from '@/components/commonComponents/signIn.vue'
export default{
  data(){
        return {
            username: "Войти"
        }
  },
  props: ['listCityPlaceholder'],
  components: {
    signIn,
  },
  methods:{
    checkSignIn(){
      if (localStorage.getItem('user') === null){
        this.username = "Войти"
      }else{
        let email = JSON.parse(localStorage.getItem('user')).email
        this.username = email
      }
    },
  }
}
</script>

<style>
</style>