<template>
    <p></p>
        <p class="lifehacks" style="margin-left: 20%; margin-right: 20%;"><i :class="generalLogoChaptersPlaceholder"></i>{{ generalNameChaptersPlaceholder.toUpperCase() }}:</p>
        
        <div v-for="index in getCountStringsFunction" :key="index">
            <div class="card-deck" style="margin-left: 19%; margin-right: 19%;">
            <div class="card" v-for="chapter in listChaptersPlaceholder.slice(3*index, 3*(index+1))" :key="chapter.id">
                <div class="img-wrap">
                <a class="linkClass" href="#">
                <img class="card-img-top" :src="chapter.photoPath" alt="Card image cap">
                    <h1 style="bottom: 40%;"><a class="fontPart linkClass" style="color: linen" href="#">{{ chapter.text }}</a></h1>
                    <h1 style="bottom: 30%;"><a class="linkClass" style="color: linen;" href="#">___</a></h1>
                </a>
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