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
    <a id="#cemping"></a>
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
        pageName: "Где жить",
        startImagePath: require('@/assets/housingPageImages/housingImage0.jpg'),
        generalNameChapters: "Виды жилья",
        generalLogoChapters: "fas fa-campground mr-2",
        listChapters: [
          {id: 0, text: "Отели", photoPath: require('@/assets/housingPageImages/housingImage1.jpg'), link: "/housing#hotel"},
          {id: 1, text: "Кемпинги", photoPath: require('@/assets/housingPageImages/housingImage2.jpg'), link: "/housing#cemping"},
          {id: 2, text: "Гостевые дома",  photoPath: require('@/assets/housingPageImages/housingImage3.jpg'), link: "/housing#guestHouse"},
        ],
        nameSection1: "Отели",
        sectionSticker1: "fas fa-plane mr-2",
        listTwoNotes1: [
          {id: 0, text: "Самая известная гостиничная сеть — Fosshotel. Это 9 отелей, расположенных в разных частях Исландии, близ крупных городов и популярных туристических мест. Самой большой известностью пользуется отель Fosshotel Skaftafell, расположенный рядом с национальным парком Скафтафетль.", keyword:"Fosshotel Skaftafell", photoPath: require('@/assets/housingPageImages/housingImage1.jpg')},
          {id: 1, text: "Еще одна цепочка — Icelandair, которая включает отели Edda, работающие только летом, и фешенебельные Icelandair. Последние расположены в крупных городах страны и славятся скандинавским стилем в интерьере и предлагаемой кухне. Самый известный из них — Nordica в Рейкьявике.", keyword:"фешенебельные Icelandair", photoPath: require('@/assets/housingPageImages/housingSub1.jpg')},
        ],
        photo1: require('@/assets/housingPageImages/housingImage1.jpg'),
        nameSection2: "Кемпинги",
        sectionSticker2: "fas fa-campground mr-2",
        listTwoNotes2: [
          {id: 0, text: "Цена на кемпинг состоит из нескольких составляющих в первую очередь это каждый человек, который останавливается в кемпинге. Не количество палаток, а именно количество человек. Стоимость на одного человека колеблется от 1000 ISK до 2000 ISK (примерно 10-20$). Отдельная оплата за палатку чаще всего отсутствует.", keyword:"1000 ISK до 2000 ISK", photoPath: require('@/assets/housingPageImages/housingSub2.jpg')},
          {id: 1, text: "Также, чаще всего, дополнительно придется заплатить за горячий душ - около 300-350 ISK с человека. Хотя в некоторых кемпингах душ бесплатный. Во всех кемпингах есть парковка, где можно поставить машину и это входит в стоимость проживания в кемпинге.", keyword:"300-350 ISK", photoPath: require('@/assets/tripPageImages/tripPageSub3.jpg')},
        ],
        photo2: require('@/assets/housingPageImages/housingImage2.jpg'),
        nameSection3: "Гостевые дома",
        sectionSticker3: "fas fa-home mr-2",
        listTwoNotes3: [
            {id: 0, text: "Гостевые дома в Исландии – очень популярный вид проживания. Есть небольшие домики, в которые можно заселиться большой компанией, без соседей. Гестхаусы здесь занимают переходное положение между дорогими отелями и дешевыми хостелами.", keyword:"небольшие домики", photoPath: require('@/assets/housingPageImages/housingSub3.jpg')},
            {id: 1, text: "Большинство гостевых домов расположены в пригородах, в непосредственной близости от природных достопримечательностей. Здесь же можно распробовать блюда национальной кухни или, выбрав вариант с собственной кухней, готовить себе самостоятельно.", keyword:"непосредственной близости от природных достопримечательностей", photoPath: require('@/assets/housingPageImages/housingImage3.jpg')},
        ],
        photo3: require('@/assets/housingPageImages/housingImage3.jpg'),
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
