<template>
    <br>
        <p class="lifehacks" style="margin-left: 20%; margin-right: 20%;"><i :class="generalLogoChaptersPlaceholder"></i>{{ generalNameChaptersPlaceholder.toUpperCase() }}:</p>
        <div v-for="index in getCountStringsFunction" :key="index">
            <div class="card-deck" style="margin-left: 20%; margin-right: 20%;">
            <div class="card" v-for="chapter in listChaptersPlaceholder.slice(3*index, 3*(index+1))" :key="chapter.id">
                <div class="img-wrap">
                <router-link class="linkClass" :to="chapter.link">
                <img class="card-img-top" :src="chapter.photoPath" alt="Card image cap">
                    <h1 style="bottom: 40%;"><router-link class="fontPart linkClass" style="color: linen" :to="chapter.link">{{ chapter.text }}</router-link></h1>
                    <h1 style="bottom: 30%;"><router-link class="linkClass" style="color: linen;" :to="chapter.link">___</router-link></h1>
                </router-link>
                </div>
            </div>
            </div>
            <p></p>
        </div>
</template>

<script>
export default{
  props: ['listChaptersPlaceholder',
          'generalNameChaptersPlaceholder',
          'generalLogoChaptersPlaceholder',
          'getCountStringsFunction'
          ]
}
</script>


<style lang="css">
</style>