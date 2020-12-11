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
    <a id="#streetfood"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection1"
        v-bind:sectionStickerPlaceholder="sectionSticker1"
        v-bind:listFourNotesPlaceholder="listFourNotes1"
    />
    <photo
        v-bind:photoPathPlaceholder="photo1"
    /><br>
    <photo
        v-bind:photoPathPlaceholder="photo2"
    /><br>
    <a id="#cafe"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection2"
        v-bind:sectionStickerPlaceholder="sectionSticker2"
        v-bind:listFourNotesPlaceholder="listFourNotes2"
    />
    <photo
        v-bind:photoPathPlaceholder="photo3"
    /><br>
    <a id="#bars"></a>
        <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection3"
        v-bind:sectionStickerPlaceholder="sectionSticker3"
        v-bind:listFourNotesPlaceholder="listFourNotes3"
    />
    <photo
        v-bind:photoPathPlaceholder="photo4"
    /><br>
    <photo
        v-bind:photoPathPlaceholder="photo5"
    /><br>
    <footerComponent />
  </div>
</template>

<script>
import headerComponent from '@/components/commonComponents/header.vue'
import footerComponent from '@/components/commonComponents/footer.vue'
import startingImage from '@/components/commonComponents/startingImage.vue'
import listChapters from '@/components/commonComponents/listChapters.vue'
import sectionComponent from '@/components/commonComponents/section.vue'
import photo from '@/components/commonComponents/photo.vue'
import Axios from 'axios'

export default{
    data(){
      return{
        listCity: [],
        pageName: "Исландская кухня",
        startImagePath: null,
        generalNameChapters: "Обзор меню",
        generalLogoChapters: "fas fa-bread-slice mr-2",
        listChapters: [],
        nameSection1: "Стритфуд",
        sectionSticker1: "fas fa-hamburger mr-2",
        listFourNotes1: [],
        photo1: null,
        photo2: null,
        nameSection2: "Рестораны/кафе",
        sectionSticker2: "fas fa-coffee mr-2",
        listFourNotes2: [],
        photo3: null,
        nameSection3: "Бары",
        sectionSticker3: "fas fa-beer mr-2",
        listFourNotes3: [],
        photo4: null,
        photo5: null,
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
    this.getKitchenChapters(instance)
    this.getListNotes(instance, 'streetfood')
    this.getListNotes(instance, 'cafe')
    this.getListNotes(instance, 'bars')
    this.getPhotos(instance)
  },

  methods:{
    setPageName: function(pagename){},

    getStartImagePath: function(instance){
      var thisEnv = this
      instance.get('/kitchen/mainphoto').then(function(mainphoto){
              thisEnv.startImagePath = mainphoto.data.photo.split("@/assets")[1]
          })
    },


    getKitchenChapters: function(instance){
      var thisEnv = this
      var result = []
      var responseChapterList = []
      instance.get('/kitchen/chapters').then(function(responseKitchen){
          responseChapterList = responseKitchen.data
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
        instance.get('/kitchen/notes?kitchen='+nameChapter).then(function(responseNote){
          var dataResponseNote = responseNote.data
          // Обработка данных для каждого раздела
          dataResponseNote.forEach((note) => {
                note.photoPath = note.photoPath.split("@/assets")[1]
                result.push(note)
              })
              switch (nameChapter){
                case 'streetfood':
                    thisEnv.listFourNotes1 = result
                    break;
                case 'cafe':
                    thisEnv.listFourNotes2 = result
                    break;
                case 'bars':
                    thisEnv.listFourNotes3 = result
                    break;
              }
          })
    },

    getPhotos: function(instance){
        var thisEnv = this
        instance.get('kitchen/photos').then(function(photos){
              let dataPhoto = photos.data
              thisEnv.photo1 = dataPhoto[5].photo.split("@/assets")[1]
              thisEnv.photo2 = dataPhoto[4].photo.split("@/assets")[1]
              thisEnv.photo3 = dataPhoto[6].photo.split("@/assets")[1]
              thisEnv.photo4 = dataPhoto[7].photo.split("@/assets")[1]
              thisEnv.photo5 = dataPhoto[8].photo.split("@/assets")[1]
        })
    }

  },
  components: {
    headerComponent,
    footerComponent,
    startingImage,
    listChapters,
    sectionComponent,
    photo,
  }
}
</script>

<style lang="css">
  @import '../components/projectStyle.css'
</style>
