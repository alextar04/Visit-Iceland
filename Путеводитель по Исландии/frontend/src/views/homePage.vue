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
export default{
    data(){
      return{
        listCity: [
        {id: 0, name: "Рейкъявик"},
        {id: 1, name: "Коупавогюр"},
        {id: 2, name: "Хабнарфьодюр"},
        {id: 3, name: "Акюрейри"},
        {id: 4, name: "Кеблавик"},
        ],
        listContents: [
          {id: 0, text: "Средневековая-столица-викингов", photoPath: require('@/assets/homePageImages/startPage1.jpg'), activeForFirst: "carousel-item active", link: "Рейкъявик"},
          {id: 1, text: "Бассейн-под открытым-небом", photoPath: require('@/assets/homePageImages/startPage2.jpg'), activeForFirst: "carousel-item", link: "/attractions#2a"},
          {id: 2, text: "Уникальный-галечный-пляж", photoPath: require('@/assets/homePageImages/startPage3.jpg'), activeForFirst: "carousel-item", link: "/attractions#3a"},
        ],
        generalNameChapters: "Полезные лайфхаки",
        generalLogoChapters: "fas fa-paperclip mr-2",
        listChapters: [
          {id: 0, text: "Столица", photoPath: require('@/assets/homePageImages/startPage4.jpg'), link: "Рейкъявик"},
          {id: 1, text: "Что посмотреть", photoPath: require('@/assets/homePageImages/startPage5.jpg'), link: "attractions"},
          {id: 2, text: "Кухня",  photoPath: require('@/assets/homePageImages/startPage6.jpg'), link: "kitchen"},
          {id: 3, text: "Как добраться",  photoPath: require('@/assets/homePageImages/startPage7.png'), link: "trip"},
          {id: 4, text: "Где жить",  photoPath: require('@/assets/homePageImages/startPage8.jpg'), link: "housing"},
          {id: 5, text: "На заметку",  photoPath: require('@/assets/homePageImages/startPage9.jpg'), link: "#notes"},
        ],
        descriptionFirst: "Тут не найдешь ни пятизвездочных отелей, ни шикарных клубов, да и ни к чему эти излишества: в Исландию едут не за тем, чтобы провести все свое время в столице. Но прежде чем отправиться в путь по окружной дороге навстречу ледникам, водопадам и фьордам, стоит побродить по пустынным улицам северного города. Где именно бродить и на что смотреть – читай в нашем гайде. Лучший способ передвижения по Исландии в мае (и не только) – арендованный автомобиль: рейсовые автобусы на дальние расстояния еще не ходят, автостопом ездить ненадежно, а на велосипеде в это время слишком холодно.",
        descriptionSecond: "Исландия – это страна про все времена года: в каждом сезоне найдется что-то особенное. Поздней весной теплеет на юге, хотя на севере еще лежит снег, а водопады наполовину закованы в лед. Зима – самое время для голубых пещер и северного сияния. Осенью голубой лед все еще голубой, достопримечательности все еще достопримечательны, а вот туристов гораздо меньше, чем в высокий сезон. Итак, помимо очевидной теплой непродуваемой одежды и удобной обуви, стоит захватить с собой купальник и плавки – в Исландии на каждом шагу встречаются горячие бассейны, не искупаться в которых грешновато.",
        basePicturePath: require('@/assets/homePageImages/startPage10.jpg'),
        listPhotosPath: [
          {id: 0, photoPath: require('@/assets/homePageImages/startPage11.jpg'), activeForFirst: "carousel-item active"},
          {id: 1, photoPath: require('@/assets/homePageImages/startPage12.jpg'), activeForFirst: "carousel-item"},
          {id: 2, photoPath: require('@/assets/homePageImages/startPage13.jpg'), activeForFirst: "carousel-item"},
        ],
        id0: "carouselExampleControls0",
        videoLink: "https://www.youtube.com/embed/wb84vvYSPEU",
        nameSection: "На заметку",
        sectionSticker: "fas fa-mobile-alt mr-2",
        listFourNotes: [
          {id: 0, text: "Stætó.is (Android) / (iPhone) – приложение с расписанием и маршрутом автобусов.", keyword:"Stætó.is (Android) / (iPhone)"},
          {id: 1, text: "Appy Hour (Android) / (iPhone) – подсказывает счастливые часы в заведениях, когда можно попасть на неплохую скидку.", keyword:"Appy Hour (Android) / (iPhone) "},
          {id: 2, text: "AuroraNotifier и Aurora Forecast – расскажут о шансах увидеть северное сияние над Рейкьявиком.", keyword:"AuroraNotifier и Aurora Forecast"},
          {id: 3, text: "Название города правильно произносить с ударением на последний слог – РейкьявИк.", keyword:"РейкьявИк"},
        ]
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
  methods:{
     setPageName: function(pagename){}
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