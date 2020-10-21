<template>
  <div>
    <headerComponent
      v-bind:listCityPlaceholder="listCity"
    />
    <contentComponent />
    <footerComponent />
  </div>
</template>


<script>
import headerComponent from '@/components/header.vue'
import contentComponent from '@/views/homePage.vue'
import footerComponent from '@/components/footer.vue'
export default {
  name: 'app',
  data(){
    return{
      listCity: [
        {id: 0, name: "Рейкъявик"},
        {id: 1, name: "Коупавогюр"},
        {id: 2, name: "Хабнарфьодюр"},
        {id: 3, name: "Акюрейри"},
        {id: 4, name: "Кеблавик"},
        ]
    }
  },
  components: {
    headerComponent,
    contentComponent,
    footerComponent
  }
}
</script>

<style lang="css">
  @import './components/projectStyleFile.css'
</style>
