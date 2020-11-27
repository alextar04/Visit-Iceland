<template>
  <div>
    <headerComponent
      v-bind:listCityPlaceholder="listCity"
    />
    <div v-if="listChapters.length > 0">
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
      v-bind:screenName="pageSlug"
    />
    </div>


    <div v-if="listChapters.length == 3">
        <a id="#history"></a>
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
        <a id="#interesting"></a>
        <sectionComponent 
            v-bind:nameSectionPlaceholder="nameSection2"
            v-bind:sectionStickerPlaceholder="sectionSticker4"
            v-bind:listFourNotesPlaceholder="listFourNotes2"
        />
        <photo
            v-bind:photoPathPlaceholder="photo3"
        /><br>
        <photo
            v-bind:photoPathPlaceholder="photo4"
        /><br>
        <a id="#recomends"></a>
        <sectionComponent 
            v-bind:nameSectionPlaceholder="nameSection3"
            v-bind:sectionStickerPlaceholder="sectionSticker3"
            v-bind:listFourNotesPlaceholder="listFourNotes3"
        />
        <photo
            v-bind:photoPathPlaceholder="photo5"
        /><br>
        <photo
            v-bind:photoPathPlaceholder="photo6"
        />
    </div>




    <div v-if="listChapters.length == 6">
        <a id="#history"></a>
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
        <a id="#geography"></a>
        <sectionComponent 
            v-bind:nameSectionPlaceholder="nameSection2"
            v-bind:sectionStickerPlaceholder="sectionSticker2"
            v-bind:listFourNotesPlaceholder="listFourNotes2"
        />
        <photo
            v-bind:photoPathPlaceholder="photo3"
        /><br>
        <a id="#climate"></a>
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
        <a id="#interesting"></a>
        <sectionComponent 
            v-bind:nameSectionPlaceholder="nameSection4"
            v-bind:sectionStickerPlaceholder="sectionSticker4"
            v-bind:listFourNotesPlaceholder="listFourNotes4"
        />
        <photo
            v-bind:photoPathPlaceholder="photo6"
        /><br>
        <photo
            v-bind:photoPathPlaceholder="photo7"
        /><br>
        <a id="#buying"></a>
        <sectionComponent 
            v-bind:nameSectionPlaceholder="nameSection5"
            v-bind:sectionStickerPlaceholder="sectionSticker5"
            v-bind:listFourNotesPlaceholder="listFourNotes5"
        />
        <photo
            v-bind:photoPathPlaceholder="photo8"
        /><br>
        <a id="#transport"></a>
        <sectionComponent 
            v-bind:nameSectionPlaceholder="nameSection6"
            v-bind:sectionStickerPlaceholder="sectionSticker6"
            v-bind:listFourNotesPlaceholder="listFourNotes6"
        />
        <photo
            v-bind:photoPathPlaceholder="photo9"
        /><br>
        <photo
            v-bind:photoPathPlaceholder="photo10"
        />
    </div>
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
        idCurrentCity: null,
        pageSlug: this.$route.params.name,
        pageName: null,
        startImagePath: null,
        generalNameChapters: "Полезные лайфхаки",
        generalLogoChapters: "fas fa-paperclip mr-2",
        listChapters: [],
        nameSection1: null,
        sectionSticker1: "fas fa-monument mr-2",
        listFourNotes1: [],
        photo1: null,
        photo2: null,
        nameSection2: null,
        sectionSticker2: "fas fa-globe-europe mr-2",
        listFourNotes2: [],
        photo3: null,
        nameSection3: null,
        sectionSticker3: "fas fa-snowflake mr-2",
        listFourNotes3: [],
        photo4: null,
        photo5: null,
        nameSection4: null,
        sectionSticker4: "fas fa-umbrella-beach mr-2",
        listFourNotes4: [],
        photo6: null,
        photo7: null,
        nameSection5: null,
        sectionSticker5: "fas fa-shopping-cart mr-2",
        listFourNotes5: [],
        photo8: null,
        nameSection6: null,
        sectionSticker6: "fas fa-car mr-2",
        listFourNotes6: [],
        photo9: null,
        photo10: null,
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
    }
  },

  created(){
      const instance = Axios.create({
        baseURL: 'http://127.0.0.1:1199/api/v1'
      })

      let thisEnv = this
      let pagename = this.pageSlug
      if (pagename !== "null"){
          instance.get('/city/getbyname?engname='+pagename).then(function(response){
              if (response.data != null){
                  document.title = response.data.name
                  thisEnv.pageName = response.data.name
                  thisEnv.idCurrentCity = response.data.id

                  instance.get('/city/names').then((response) => thisEnv.listCity = response.data)
                  thisEnv.getStartImagePath(instance, thisEnv.idCurrentCity)
                  thisEnv.getCityChapters(instance, thisEnv.idCurrentCity)
                  thisEnv.getPhotos(instance, thisEnv.idCurrentCity)
              }
          })
        }
  },

  methods:{

     setPageName: function(slugname){
        let thisEnv = this 
        const instance = Axios.create({
          baseURL: 'http://127.0.0.1:1199/api/v1'
        })

        if (slugname !== null){
            instance.get('/city/getbyname?engname='+slugname).then(function(response){
            document.title = response.data.name
            thisEnv.pageName = response.data.name
            thisEnv.idCurrentCity = response.data.id
          })
        }
     },

    getStartImagePath: function(instance, idCity){
      var thisEnv = this
      instance.get('/city/mainphoto?idCity='+idCity).then(function(mainphoto){
              thisEnv.startImagePath = mainphoto.data.photo.split("@/assets")[1]
          })
    },

    getCityChapters: function(instance, idCity){
      var thisEnv = this
      var result = []
      var responseChapterList = []
      instance.get('city/chapters?idCity='+idCity).then(function(responseCity){
          responseChapterList = responseCity.data
          // Обработка данных для каждого раздела
          responseChapterList.forEach((chapter) => {
                chapter.photoPath = chapter.photoPath.split("@/assets")[1]
                result.push(chapter)
              })
              thisEnv.listChapters = result
              thisEnv.setCityNameChapters(instance)
              thisEnv.getNotes(instance, idCity)
          })
    },

    setCityNameChapters: function(instance){
      for (const [index, chapter] of this.listChapters.entries()) {
          this['nameSection'+(index+1)] = chapter.text
      }
    },

    getNotes: function(instance, idCity){
        var thisEnv = this
        instance.get('city/getnotes?idCity='+idCity).then(function(chapter){
              var dataResponseNote = chapter.data
              // Обработка данных для каждого раздела
              for (const [index, chapter] of dataResponseNote.entries()) {
                  var allNotes = []
                  chapter.forEach((note) => {
                      note.photoPath = note.photoPath.split("@/assets")[1]
                      allNotes.push(note)
                  })
                  thisEnv['listFourNotes'+(index+1)] = allNotes
              }
        })
    },


    getPhotos: function(instance, idCity){
        var thisEnv = this
        instance.get('city/photo?idCity='+idCity).then(function(photos){
              let dataPhoto = photos.data
              for (var i = 0; i < dataPhoto.length; i++) { 
                    thisEnv['photo'+(i+1)] = dataPhoto[i].photo.split("@/assets")[1]
              }
        }
      )}


  },
  components: {
    headerComponent,
    footerComponent,
    startingImage,
    listChapters,
    sectionComponent,
    photo,
  },
}
</script>

<style lang="css">
  @import '../components/projectStyle.css'
</style>
