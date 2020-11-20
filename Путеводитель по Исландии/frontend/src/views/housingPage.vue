<template>
  <div>
    <headerComponent
      v-bind:listCityPlaceholder="listCity"
    />
    <startingImage
        v-bind:pageNamePlaceholder="pageName"
        v-bind:startImagePathPlaceholder="startImagePath"
    />
    <listChapters
      v-bind:listChaptersPlaceholder="listChapters"
      v-bind:generalNameChaptersPlaceholder="generalNameChapters"
      v-bind:generalLogoChaptersPlaceholder="generalLogoChapters"
      v-bind:getCountStringsFunction="getStringIndexesForChapters"
      v-bind:setScreenNameFunction="setPageName"
    />
    <a id="#hotel"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection1"
        v-bind:sectionStickerPlaceholder="sectionSticker1"
        v-bind:listTwoNotesPlaceholder="listTwoNotes1"
    />
    <photo
        v-bind:photoPathPlaceholder="photo1"
    /><br>
    <a id="#kemping"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection2"
        v-bind:sectionStickerPlaceholder="sectionSticker2"
        v-bind:listTwoNotesPlaceholder="listTwoNotes2"
    />
    <photo
        v-bind:photoPathPlaceholder="photo2"
    /><br>
    <a id="#guestHouse"></a>
        <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection3"
        v-bind:sectionStickerPlaceholder="sectionSticker3"
        v-bind:listTwoNotesPlaceholder="listTwoNotes3"
    />
    <photo
        v-bind:photoPathPlaceholder="photo3"
    /><br>
    <footerComponent />
  </div>
</template>

<script>
import headerComponent from '@/components/commonComponents/header.vue'
import footerComponent from '@/components/commonComponents/footer.vue'
import startingImage from '@/components/commonComponents/startingImage.vue'
import listChapters from '@/components/commonComponents/listChapters.vue'
import sectionComponent from '@/components/attractionsOnlyPageComponents/sectionAttractionsPage.vue'
import photo from '@/components/commonComponents/photo.vue'
import Axios from 'axios'

export default{
    data(){
      return{
        listCity: [],
        pageName: "Где жить",
        startImagePath: null,
        generalNameChapters: "Виды жилья",
        generalLogoChapters: "fas fa-campground mr-2",
        listChapters: [],
        nameSection1: "Отели",
        sectionSticker1: "fas fa-plane mr-2",
        listTwoNotes1: [],
        photo1: null,
        nameSection2: "Кемпинги",
        sectionSticker2: "fas fa-campground mr-2",
        listTwoNotes2: [],
        photo2: null,
        nameSection3: "Гостевые дома",
        sectionSticker3: "fas fa-home mr-2",
        listTwoNotes3: [],
        photo3: null,
      }
    },
    computed: {
    getStringIndexesForChapters: function(){
      let countString = this.listChapters.length / 3
      var array = new Array(countString).fill(0)
      for (var i=0; i<countString; i++){
        array[i] = i
      }
      return array
    }},
  created(){
    const instance = Axios.create({
      baseURL: 'http://127.0.0.1:1199/api/v1'
    })

    instance.get('/city/names').then((response) => this.listCity = response.data)
    this.getStartImagePath(instance)
    this.getHousingChapters(instance)
    this.getListNotes(instance, 'hotels')
    this.getListNotes(instance, 'kempings')
    this.getListNotes(instance, 'guest houses')
    this.getPhotos(instance)
  },
  components: {
    headerComponent,
    footerComponent,
    startingImage,
    listChapters,
    sectionComponent,
    photo,
  },
  methods: {
    setPageName: function(pagename){},

    getStartImagePath: function(instance){
      var thisEnv = this
      instance.get('/housing/mainphoto').then(function(mainphoto){
              thisEnv.startImagePath = mainphoto.data.photo.split("@/assets")[1]
          })
    },

      getHousingChapters: function(instance){
      var thisEnv = this
      var result = []
      var responseChapterList = []
      instance.get('/housing/chapters').then(function(responseHousing){
          responseChapterList = responseHousing.data
          // Обработка данных для каждого раздела
          responseChapterList.forEach((chapter) => {
                chapter.photoPath = chapter.photoPath.split("@/assets")[1]
                result.push(chapter)
              })
              thisEnv.listChapters = result
          })
    },

    getListNotes: function(instance, nameChapter){
        var thisEnv = this
        var result = []
        instance.get('/housing/notes?housing='+nameChapter).then(function(responseNote){
          var dataResponseNote = responseNote.data
          // Обработка данных для каждого раздела
          dataResponseNote.forEach((note) => {
                note.photoPath = note.photoPath.split("@/assets")[1]
                result.push(note)
              })
              //console.log(result)
              switch (nameChapter){
                case 'hotels':
                    thisEnv.listTwoNotes1 = result
                    break;
                case 'kempings':
                    thisEnv.listTwoNotes2 = result
                    break;
                case 'guest houses':
                    thisEnv.listTwoNotes3 = result
                    break;
              }
          })
    },

    getPhotos: function(instance){
        var thisEnv = this
        instance.get('housing/photos').then(function(photos){
              let dataPhoto = photos.data
              thisEnv.photo1 = dataPhoto[1].photo.split("@/assets")[1]
              thisEnv.photo2 = dataPhoto[2].photo.split("@/assets")[1]
              thisEnv.photo3 = dataPhoto[3].photo.split("@/assets")[1]
        })
    }


  }
}
</script>

<style lang="css">
  @import '../components/projectStyle.css'
</style>
