<template>
  <div>
    <headerComponent
      v-bind:listCityPlaceholder="listCity"
    />
    <carouselWithButton
      v-bind:listContentsPlaceholder="listContents"
    />
    <listChapters
      v-bind:listChaptersPlaceholder="listChapters"
      v-bind:generalNameChaptersPlaceholder="generalNameChapters"
      v-bind:generalLogoChaptersPlaceholder="generalLogoChapters"
      v-bind:getCountStringsFunction="getStringIndexesForChapters"
      v-bind:setScreenNameFunction="setPageName"
    />
    <mainDescription
      v-bind:descriptionFirstPlaceholder="descriptionFirst"
      v-bind:descriptionSecondPlaceholder="descriptionSecond"
      v-bind:basePicturePathPlaceholder="basePicturePath"
    />
    <carouselBase
      v-bind:listPhotosPathPlaceholder="listPhotosPath"
      v-bind:id="id0"
    />
    <br>
    <videoContent
      v-bind:videoContentLinkPlaceholder="videoLink"
    />
    <br><br>
    <a id="#notes"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection"
        v-bind:sectionStickerPlaceholder="sectionSticker"
        v-bind:listFourNotesPlaceholder="listFourNotes"
    />
    <footerComponent />
  </div>
</template>

<script>
import headerComponent from '@/components/commonComponents/header.vue'
import footerComponent from '@/components/commonComponents/footer.vue'
import carouselWithButton from '@/components/homeOnlyPageComponents/carouselWithButton.vue'
import listChapters from '@/components/commonComponents/listChapters.vue'
import mainDescription from '@/components/homeOnlyPageComponents/mainDescription.vue'
import carouselBase from '@/components/commonComponents/carouselBase.vue'
import videoContent from '@/components/homeOnlyPageComponents/videoContent.vue'
import sectionComponent from '@/components/homeOnlyPageComponents/homePageSection.vue'
import Axios from 'axios'

export default{
    data(){
      return{
        listCity: [],
        listContents: [],
        generalNameChapters: "Полезные лайфхаки",
        generalLogoChapters: "fas fa-paperclip mr-2",
        listChapters: [],
        descriptionFirst: null,
        descriptionSecond: null,
        basePicturePath: null,
        listPhotosPath: [],
        id0: "carouselExampleControls0",
        videoLink: "",
        nameSection: "На заметку",
        sectionSticker: "fas fa-mobile-alt mr-2",
        listFourNotes: []
      }
    },
  created(){
    const instance = Axios.create({
      baseURL: 'http://127.0.0.1:1199/api/v1'
    })

    instance.get('/city/names').then((response) => this.listCity = response.data)
    this.getListContents(instance)
    this.getMainContentChapters(instance)
    this.getDescriptions(instance)
    this.loadPictures(instance)
    instance.get('/maincontent/getvideo').then((response) => this.videoLink = response.data.link)
    this.getListNotes(instance)
    
  },
  computed: {
    getStringIndexesForChapters: function(){
      if (this.listChapters != undefined){
        let countString = this.listChapters.length / 3
        var array = new Array(countString).fill(0)
        for (var i=0; i<countString; i++){
          array[i] = i
        }
        return array
      }
    }
  },
  methods:{
    setPageName: function(pagename){},

    getMainContentChapters: function(instance){
      var thisEnv = this
      var result = []
      var responseMainContentList = []
      instance.get('/maincontent/chapters').then(function(responseMainContent){
          responseMainContentList = responseMainContent.data
          // Обработка данных для каждого раздела
          responseMainContentList.forEach((maincontent) => {
                maincontent.photoPath = maincontent.photoPath.split("@/assets")[1]
                result.push(maincontent)
              })
              thisEnv.listChapters = result
          })
    },

    getListContents: function(instance){
      var thisEnv = this
      var result = []
      var responseListContents = []
      instance.get('/maincontent/photo').then(function(startPhotos){
        responseListContents = startPhotos.data
        responseListContents.forEach((photoWithLink) => {
          if (photoWithLink.text != ""){
            photoWithLink.photoPath = photoWithLink.photo.split("@/assets")[1]
            delete photoWithLink.photo
            if (responseListContents.indexOf(photoWithLink) == 0){
              photoWithLink.activeForFirst = "carousel-item active"
            } else{
              photoWithLink.activeForFirst = "carousel-item"
            }
            result.push(photoWithLink)
          }
        })
        thisEnv.listContents = result
      })
    },

    getDescriptions: function(instance){
      var thisEnv = this

      instance.get('maincontent/description').then(function(description){
          let descriptionData = description.data.text.split('(new-page)')
          thisEnv.descriptionFirst = descriptionData[0]
          thisEnv.descriptionSecond = descriptionData[1]
          instance.get('maincontent/photo').then(function(photos){
              var responseListPhotos = photos.data
              responseListPhotos = responseListPhotos.filter(function(photo){
                return photo.text == ""
              })
              thisEnv.basePicturePath = responseListPhotos[0].photo.split("@/assets")[1]
          })
      })
    },

    loadPictures: function(instance){
      var thisEnv = this
      var responseListPhotos = []
      var result = []
      instance.get('maincontent/photo').then(function(photos){
        responseListPhotos = photos.data

        responseListPhotos = responseListPhotos.filter(function(photo){
          return photo.text == ""
        })

        responseListPhotos.shift()
        responseListPhotos.forEach((photo) => {
            photo.photoPath = photo.photo.split("@/assets")[1]
            delete photo.photo
            if (responseListPhotos.indexOf(photo) == 0){
                photo.activeForFirst = "carousel-item active"
            } else {
                photo.activeForFirst = "carousel-item"
              }
            result.push(photo)
        })
          thisEnv.listPhotosPath = result
      })
    },

    getListNotes: function(instance){
      var thisEnv = this
      var responseListNotes = []
      instance.get('maincontent/notes').then(function(notes){
        let dataNotes = notes.data
        thisEnv.listFourNotes = dataNotes
      })
    }

  },
  components: {
    headerComponent,
    footerComponent,
    carouselWithButton,
    listChapters,
    mainDescription,
    carouselBase,
    videoContent,
    sectionComponent,
  }
}
</script>

<style lang="css">
  @import '../components/projectStyle.css'
</style>