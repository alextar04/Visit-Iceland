<template>
  <div>
    <headerComponent
      v-bind:listCityPlaceholder="listCity"
      @get-comments="getComments"
    />
    <listChapters
      v-bind:listChaptersPlaceholder="listChapters"
      v-bind:generalNameChaptersPlaceholder="generalNameChapters"
      v-bind:generalLogoChaptersPlaceholder="generalLogoChapters"
      v-bind:getCountStringsFunction="getStringIndexesForChapters"
      v-bind:setScreenNameFunction="setPageName"
    />
    <a id="#1a"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection1"
        v-bind:sectionStickerPlaceholder="sectionSticker1"
        v-bind:listTwoNotesPlaceholder="listTwoNotes1"
    />
    <carouselBase
      v-bind:listPhotosPathPlaceholder="listPhotosPath1"
      v-bind:id="id1"
    /><p></p>
    <a id="#2a"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection2"
        v-bind:sectionStickerPlaceholder="sectionSticker2"
        v-bind:listTwoNotesPlaceholder="listTwoNotes2"
    />
    <carouselBase
      v-bind:listPhotosPathPlaceholder="listPhotosPath2"
      v-bind:id="id2"
    /><p></p>
    <a id="#3a"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection3"
        v-bind:sectionStickerPlaceholder="sectionSticker3"
        v-bind:listTwoNotesPlaceholder="listTwoNotes3"
    />
    <carouselBase
      v-bind:listPhotosPathPlaceholder="listPhotosPath3"
      v-bind:id="id3"
    /><br>
    <comments
      v-bind:commentsList="commentsList"
      @remove-comment="removeComment"
      @add-comment="addComment"
      @update-comment="updateComment"
    />
    <br>
    <footerComponent />
  </div>
</template>

<script>
import headerComponent from '@/components/commonComponents/header.vue'
import footerComponent from '@/components/commonComponents/footer.vue'
import listChapters from '@/components/commonComponents/listChapters.vue'
import sectionComponent from '@/components/attractionsOnlyPageComponents/sectionAttractionsPage.vue'
import carouselBase from '@/components/commonComponents/carouselBase.vue'
import comments from '@/components/attractionsOnlyPageComponents/commentsComponent.vue'
import Axios from 'axios'


export default{
    data(){
      return{
        listCity: [],
        generalNameChapters: "Что посетить",
        generalLogoChapters: "fas fa-mountain mr-2",
        listChapters: [],
        nameSection1: "Туристические маршруты",
        sectionSticker1: "fas fa-mountain mr-2",
        listTwoNotes1: [],
        id1: "carouselExampleControls1",
        listPhotosPath1: [],
        nameSection2: "Природные чудеса",
        sectionSticker2: "fas fa-mountain mr-2",
        listTwoNotes2: [],
        id2: "carouselExampleControls2",
        listPhotosPath2: [],
        nameSection3: "Знаменитые места",
        sectionSticker3: "fas fa-mountain mr-2",
        listTwoNotes3: [],
        id3: "carouselExampleControls3",
        listPhotosPath3: [],
        commentsList: [],
    }},
  created(){
    const instance = Axios.create({
      baseURL: 'http://127.0.0.1:1199/api/v1'
    })

    instance.get('/city/names').then((response) => this.listCity = response.data)
    this.getAttractionChapters(instance)
    this.getPhotos(instance)
    this.getComments(instance)
    
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


  methods:{
     setPageName: function(pagename){},


     removeComment(id){
        var thisEnv = this
        const instance = Axios.create({
            baseURL: 'http://127.0.0.1:1199/api/v1'
        })
        let token = JSON.parse(localStorage.getItem('user')).accessToken

        instance.post('/attraction/delete_comment', {"accesstoken": token, "id": id}).then(function(responseDelete){
            let deleteStatus = responseDelete.data
            if (deleteStatus.status != null){
                thisEnv.commentsList = thisEnv.commentsList.filter(t => t.id != id)
            }
        })
     },


     updateComment(id, text){
        var thisEnv = this
        const instance = Axios.create({
            baseURL: 'http://127.0.0.1:1199/api/v1'
        })
        let recievedtext = text
        let token = JSON.parse(localStorage.getItem('user')).accessToken

        var index = 0
        for (index; index < thisEnv.commentsList.length; index++){
                if (thisEnv.commentsList[index].id == id){
                  break
                }
        }
        let oldText = thisEnv.commentsList[index].text 
        thisEnv.commentsList[index].text = text

        instance.post('/attraction/edit_comment', {"accesstoken": token, "id": id, "text": recievedtext}).then(function(responseComment){
            let dataComment = responseComment.data
            // При неудачном обновлении, вернуть старый текст
            if (dataComment.text != thisEnv.commentsList[index].text){
                thisEnv.commentsList[index].text = oldText
            }
        })
     },


     addComment(text){
        var thisEnv = this
        const instance = Axios.create({
            baseURL: 'http://127.0.0.1:1199/api/v1'
        })
        let recievedtext = text
        let token = JSON.parse(localStorage.getItem('user')).accessToken

        instance.post('/attraction/new_comment', {"accesstoken": token, "text": recievedtext}).then(function(responseComment){
            let dataComment = responseComment.data

            thisEnv.commentsList.unshift({
              id: dataComment.id,
              username: dataComment.username,
              date: dataComment.date,
              text: dataComment.text,
              changeMode: false,
              textExported: '',
              firstRender: true
            })
        })
     },


     getSignInStatus(){
      if (localStorage.getItem('user') === null){
        return "Войти"
      }else{
        let email = JSON.parse(localStorage.getItem('user')).email
        return email
      }
    },

    getAttractionChapters: function(instance){
      var thisEnv = this
      var result = []
      var responseMainContentList = []
      instance.get('/attraction/chapters').then(function(responseMainContent){
          responseMainContentList = responseMainContent.data
          // Обработка данных для каждого раздела
          responseMainContentList.forEach((maincontent) => {
                maincontent.photoPath = maincontent.photoPath.split("@/assets")[1]
                result.push(maincontent)
              })
              thisEnv.listChapters = result
              for (const [index, chapter] of thisEnv.listChapters.entries()) {
                  thisEnv.getListNotes(instance, chapter.text, index)
              }
          })
    },

    getListNotes: function(instance, nameChapter, index){
        var thisEnv = this
        instance.get('/attraction/note?attractionname='+nameChapter).then(function(responseNote){
              var dataResponseNote = responseNote.data
              dataResponseNote.photoPath = dataResponseNote.photoPath.split("@/assets")[1]
              thisEnv['listTwoNotes'+(Math.floor(index/2) + 1)].push(dataResponseNote)
          })
    },

    getPhotos: function(instance){
        var thisEnv = this
        instance.get('attraction/photo').then(function(photos){
              let dataPhoto = photos.data
              for (var index=0; index<dataPhoto.length; index++){
                  let photoObject = {}
                  photoObject.photoPath = dataPhoto[index].photo.split("@/assets")[1]
                  photoObject.activeForFirst = ""
                  if (index % 2 == 0){
                    photoObject.activeForFirst = "carousel-item active"
                  } else {
                    photoObject.activeForFirst = "carousel-item"
                  }
                  thisEnv['listPhotosPath'+(Math.floor(index/2) + 1)].push(photoObject)
              }
        })
      },

    getComments: function(instance){
      var thisEnv = this
      instance.get('attraction/comments').then(function(comments){
              let dataComments = comments.data
              var response = []
              dataComments.forEach((comment) => {
                  comment.changeMode = false,
                  comment.textExported = '',
                  comment.firstRender = true
                  response.push(comment)
              })
              thisEnv.commentsList = response
        })
    },

  },
  components: {
    headerComponent,
    footerComponent,
    listChapters,
    sectionComponent,
    carouselBase,
    comments
  }
}
</script>

<style lang="css">
  @import '../components/projectStyle.css'
</style>
