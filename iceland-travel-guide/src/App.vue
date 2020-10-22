<template>
  <div>
    <headerComponent
      v-bind:listCityPlaceholder="listCity"
    />
    <homePage />
    <footerComponent />
  </div>
</template>


<script>
import headerComponent from '@/components/header.vue'
//import sectionComponent from '@/components/section.vue'
import homePage from '@/views/homePage.vue'
import footerComponent from '@/components/footer.vue'
export default {
  name: 'app',
  data(){
    return{
      listCity: [
        {id: 0, name: "Рейкъявик"},
        {id: 1, name: "Коупавогюр"},
        {id: 2, name: "Хабнарфьодюр"},
        {id: 3, name: "Акюрейри"},
        {id: 4, name: "Кеблавик"},
        ],
        /*
        <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection"
        v-bind:sectionStickerPlaceholder="sectionSticker"
        v-bind:listFourNotesPlaceholder="listFourNotes"
        />
        
        nameSection: "История",
        sectionSticker: "fas fa-monument mr-2",
        listFourNotes: [
          {id: 0, text: "Исландия была заселена норвежскими и кельтскими иммигрантами в течение конца IX и начала X веков. Согласно средневековой «Книге о заселении Исландии» (исл. Landnámabók), Ингольф Арнарсон, первый исландский поселенец, построил в 874 году свою ферму на полуострове, где сейчас расположен Рейкьявик. Место было названо Reykjavík («Дымная бухта») из-за столбов пара, которые поднимались от горячих источников и производили глубокое впечатление на поселенцев.", keyword:"«Книге о заселении Исландии» (исл. Landnámabók)"},
          {id: 1, text: "Много веков спустя, около середины XVIII века, маленький городок начал вырастать возле фермы Рейкьявик благодаря королевскому казначею Скули Магнуссону, известному как «отец Рейкьявика», который основал шерстяные мастерские в Рейкьявике в рамках своей деятельности по модернизации исландской экономики. Это послужило толчком к началу развития Рейкьявика как города. Статус города Рейкьявик получил 18 августа 1786 года.", keyword:"Скули Магнуссону", photoPath: require('@/assets/cityPageImages/cityPageSub1.jpg')},
          {id: 2, text: "После установления власти норвежских королей над островом, Рейкьявик становится центром сбора дани и налогов, а также важным центром торговли с Норвегией, Англией и Ганзой. С ускорением экономического прогресса в XX веке рос и Рейкьявик, но особенно быстрое развитие он получил во второй половине XX века.", keyword:"центром торговли с Норвегией, Англией и Ганзой", photoPath: require('@/assets/cityPageImages/cityPageSub2.jpg')},
          {id: 3, text: "Во время Второй мировой войны Рейкьявик приобрёл стратегически важное значение для американских и английских судов, которые несли патрульную службу в водах Северной Атлантики. 10 мая 1940 года, после того как Германия оккупировала Данию и Норвегию, британские войска высадились в Рейкьявике в ходе операции «Форк». Они не встретили никакого сопротивления. В декабре 1943 г. закончился срок действия договора о личной унии Дании и Исландии, заключённого в 1918 г. 17 июня 1944 г. Исландия была провозглашена независимой республикой, и её столицей официально был признан город Рейкьявик.", keyword:"независимой республикой"},
        ],*/
    }
  },
  components: {
    headerComponent,
    homePage,
    //sectionComponent,
    footerComponent,
  }
}
</script>

<style lang="css">
  @import './components/projectStyleFile.css'
</style>
