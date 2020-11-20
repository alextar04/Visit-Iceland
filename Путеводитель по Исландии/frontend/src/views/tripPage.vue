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
    <a id="#plane"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection1"
        v-bind:sectionStickerPlaceholder="sectionSticker1"
        v-bind:listTwoNotesPlaceholder="listTwoNotes1"
    />
    <photo
        v-bind:photoPathPlaceholder="photo1"
    /><br>
    <a id="#ferry"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection2"
        v-bind:sectionStickerPlaceholder="sectionSticker2"
        v-bind:listTwoNotesPlaceholder="listTwoNotes2"
    />
    <photo
        v-bind:photoPathPlaceholder="photo2"
    /><br>
    <a id="#loanAuto"></a>
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
        pageName: "Как добраться",
        startImagePath: null,
        generalNameChapters: "Виды транспорта",
        generalLogoChapters: "fas fa-car mr-2",
        listChapters: [],
        nameSection1: "Самолет",
        sectionSticker1: "fas fa-plane mr-2",
        listTwoNotes1: [],
        photo1: null,
        nameSection2: "Паром",
        sectionSticker2: "fas fa-ship mr-2",
        listTwoNotes2: [],
        photo2: null,
        nameSection3: "Прокат авто",
        sectionSticker3: "fas fa-car mr-2",
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
    this.getTripChapters(instance)
    this.getListNotes(instance, 'plane')
    this.getListNotes(instance, 'ferry')
    this.getListNotes(instance, 'loanAuto')
    this.getPhotos(instance)
  },

  methods:{
     setPageName: function(pagename){},

     getStartImagePath: function(instance){
        var thisEnv = this
        instance.get('/trip/mainphoto').then(function(mainphoto){
                thisEnv.startImagePath = mainphoto.data.photo.split("@/assets")[1]
            })
    },

     getTripChapters: function(instance){
      var thisEnv = this
      var result = []
      var responseChapterList = []
      instance.get('/trip/chapters').then(function(responseTrip){
          responseChapterList = responseTrip.data
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
        instance.get('/trip/notes?trip='+nameChapter).then(function(responseNote){
          var dataResponseNote = responseNote.data
          // Обработка данных для каждого раздела
          dataResponseNote.forEach((note) => {
                note.photoPath = note.photoPath.split("@/assets")[1]
                result.push(note)
              })
              switch (nameChapter){
                case 'plane':
                    thisEnv.listTwoNotes1 = result
                    break;
                case 'ferry':
                    thisEnv.listTwoNotes2 = result
                    break;
                case 'loanAuto':
                    thisEnv.listTwoNotes3 = result
                    break;
              }
          })
    },

    getPhotos: function(instance){
        var thisEnv = this
        instance.get('kitchen/photos').then(function(photos){
              let dataPhoto = photos.data
              thisEnv.photo1 = dataPhoto[1].photo.split("@/assets")[1]
              thisEnv.photo2 = dataPhoto[4].photo.split("@/assets")[1]
              thisEnv.photo3 = dataPhoto[3].photo.split("@/assets")[1]
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
