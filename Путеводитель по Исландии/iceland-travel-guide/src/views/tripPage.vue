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
        pageName: "Как добраться",
        startImagePath: require('@/assets/tripPageImages/tripPage0.jpg'),
        generalNameChapters: "Виды транспорта",
        generalLogoChapters: "fas fa-car mr-2",
        listChapters: [
          {id: 0, text: "Самолет", photoPath: require('@/assets/tripPageImages/tripPage1.jpg'), link: "/trip#plane"},
          {id: 1, text: "Паром", photoPath: require('@/assets/tripPageImages/tripPage2.jpeg'), link: "/trip#ferry"},
          {id: 2, text: "Прокат авто",  photoPath: require('@/assets/tripPageImages/tripPage3.png'), link: "/trip#loanAuto"},
        ],
        nameSection1: "Самолет",
        sectionSticker1: "fas fa-plane mr-2",
        listTwoNotes1: [
          {id: 0, text: "Если вы живете в Москве, то самый простой и очевидный вариант проезда до исландской столицы Рейкьявик – самолет. Стоимость авиабилета на прямой рейс Москва – Рейкьявик от €284 в две стороны. Рейсы компании С7 «Сибирь» из московского аэропорта Домодедово в аэропорт Рейкьявика – Кефлавик выполняются 6 раз в неделю.", keyword:"Сибирь", photoPath: require('@/assets/tripPageImages/tripPage1.jpg')},
          {id: 1, text: "Помимо прямого рейса, из Москвы или Санкт-Петербурга в Рейкьявик можно добраться с пересадкой в Прибалтике – Риге, Вильнюсе или Хельсинки. Зачастую цена билета с пересадкой выйдет дешевле билета на прямой рейс. Стоимость авиабилета с пересадкой Москва – Хельсинки – Рейкьявик составит от €173 в две стороны. Перелет из Хельсинки выполняет компания Finnair.", keyword:"€173", photoPath: require('@/assets/tripPageImages/tripPageSub1.jpg')},
        ],
        photo1: require('@/assets/tripPageImages/tripPage1.jpg'),
        nameSection2: "Паром",
        sectionSticker2: "fas fa-ship mr-2",
        listTwoNotes2: [
          {id: 0, text: "Если вы ищете приключений и располагаете большим количеством свободного времени, и у вас нет морской болезни, можете отправиться в Исландию на пароме.", keyword:"морской болезни", photoPath: require('@/assets/tripPageImages/tripPage4.jpg')},
          {id: 1, text: "После приезда в Данию начинается самая интересная часть путешествия – вам надо добраться до порта Хиртсхальс (Hirtshals). Время в пути из порта Хиртсхальс (Hirtshals) в Дании до порта Сейдисфьордюр (Seyðisfjörður) в восточной части Исландии – около 2 суток. Перевозки осуществляет паромная компания Smyril Line, которая предоставляет возможность проезда с собственным автомобилем.", keyword:"до порта Хиртсхальс", photoPath: require('@/assets/tripPageImages/tripPageSub3.jpg')},
        ],
        photo2: require('@/assets/tripPageImages/tripPage4.jpg'),
        nameSection3: "Прокат авто",
        sectionSticker3: "fas fa-car mr-2",
        listTwoNotes3: [
            {id: 0, text: "Итак, самыми бюджетными на рынке автопроката Исландии остаются авто класса мини — от 68 EUR за день пользования. Компактные автомобили и универсалы стоят порядка 77—150 EUR, внедорожники и мини-вэны — 150—630 EUR и т. д.", keyword:"Исландии", photoPath: require('@/assets/tripPageImages/tripPage3.png')},
            {id: 1, text: "В стоимость аренды, как правило, включают нелимитированный пробег в пределах страны, страховку на случай угона и ДТП, круглосуточное информационное обслуживание от компании.", keyword:"стоимость", photoPath: require('@/assets/tripPageImages/tripPageSub5.jpg')},
        ],
        photo3: require('@/assets/tripPageImages/tripPage3.png'),
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
