<template>
  <div>
    <headerComponent
      v-bind:listCityPlaceholder="listCity"
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
        generalNameChapters: "Что посетить",
        generalLogoChapters: "fas fa-mountain mr-2",
        listChapters: [
          {id: 0, text: "Золотое кольцо", photoPath: require('@/assets/attractionPageImages/attractionsPage1.jpg'), link: "/attractions#1a"},
          {id: 1, text: "Тингведилир", photoPath: require('@/assets/attractionPageImages/attractionsPage2.jpg'), link: "/attractions#1a"},
          {id: 2, text: "Хейкадалюр",  photoPath: require('@/assets/attractionPageImages/attractionsPage3.jpg'), link: "/attractions#2a"},
          {id: 3, text: "Голубая лагуна",  photoPath: require('@/assets/attractionPageImages/attractionsPage4.jpg'), link: "/attractions#2a"},
          {id: 4, text: "Рейнисфьяра",  photoPath: require('@/assets/attractionPageImages/attractionsPage5.jpg'), link: "/attractions#3a"},
          {id: 5, text: "Колонна мира",  photoPath: require('@/assets/attractionPageImages/attractionsPage6.jpg'), link: "/attractions#3a"},
        ],
        nameSection1: "Туристические маршруты",
        sectionSticker1: "fas fa-mountain mr-2",
        listTwoNotes1: [
          {id: 0, text: "Золотое кольцо - самый популярный среди туристов экскурсионный маршрут по Исландии. Наиболее интересными природными достопримечательностями в нем являются водопад Гюдльфосс, национальный парк Тингведлир, горячая река в Хверагерди, долина гейзеров Хёйкадалур с гейзерами Строккюр и Гейсир. Некоторые туроператоры предлагают однодневные экскурсии по этому маршруту, однако опытные путешественники советуют уделить ему хотя бы 2-3 дня.", keyword:"Золотое кольцо", photoPath: require('@/assets/attractionPageImages/attractionsPage1.jpg')},
          {id: 1, text: "Тингведлир - национальный парк внесен в список объектов, охраняемых ЮНЕСКО. Основан в 1928 году. Располагается парк в 40 км от столицы, на границе двух литосферных плит. Здесь не редко случаются землетрясения. В состав парка входит самое крупное в Исландии озеро Тингвадлаватн глубиной около 100 метров. Часть парка является активной вулканической зоной. Наиболее примечательным вулканом на этой территории является вулкан Хенгиль.", keyword:"Тингведлир", photoPath: require('@/assets/attractionPageImages/attractionsPage2.jpg')},
        ],
        id1: "carouselExampleControls1",
        listPhotosPath1: [
          {id: 0, photoPath: require('@/assets/attractionPageImages/attractionsPage7.jpg'), activeForFirst: "carousel-item active"},
          {id: 1, photoPath: require('@/assets/attractionPageImages/attractionsPage8.jpg'), activeForFirst: "carousel-item"},
        ],
        nameSection2: "Природные чудеса",
        sectionSticker2: "fas fa-mountain mr-2",
        listTwoNotes2: [
          {id: 0, text: "Хейкадалюр - необычная долина расположена на юге Исландии и входит в маршрут «Золотого кольца». Многочисленность гейзеров в этом месте привлекает внимание множества туристов. Примечателен гейзер с названием Гейсир. Великий Гейзер выбрасывает большие струи пара несколько раз в день, однако непериодично. Второй популярный гейзер с названием Строккоюр более предсказуем – он выпускает струи горячей воды каждые 10 минут.", keyword:"Хейкадалюр", photoPath: require('@/assets/attractionPageImages/attractionsPage3.jpg')},
          {id: 1, text: "Голубая лагуна - Геотермальный природный комплекс. Курорт известен во всем мире, некоторые называют его символом страны. Полуостров, где расположен природный бассейн, образован из пористой лавы, через которую просачивается морская вода, образуя небесно-бирюзовый цвет. Температура воды даже зимой не меньше +37°С. Минеральная вода комплекса имеет уникальный состав, в ней нет бактерий. Дно покрыто полезной для здоровья белой глиной.", keyword:"Голубая лагуна", photoPath: require('@/assets/attractionPageImages/attractionsPage4.jpg')},
        ],
        id2: "carouselExampleControls2",
        listPhotosPath2: [
          {id: 0, photoPath: require('@/assets/attractionPageImages/attractionsPage9.jpg'), activeForFirst: "carousel-item active"},
          {id: 1, photoPath: require('@/assets/attractionPageImages/attractionsPage10.jpg'), activeForFirst: "carousel-item"},
        ],
        nameSection3: "Знаменитые места",
        sectionSticker3: "fas fa-mountain mr-2",
        listTwoNotes3: [
          {id: 0, text: "Рейнисфьяра - популярен среди туристов благодаря черному вулканическому песчаному берегу. Образован он за долгие годы дробления водой застывшей лавы. Живописные гроты из черного блестящего камня на берегу как будто переносят отдыхающих в другую реальность. Длина пляжа составляет более 5 км, а ширина – несколько десятков метров. Рядом с берегом расположены высокие базальтовые колонны, которые называют «Пальцы тролля».", keyword:"Рейнисфьяра", photoPath: require('@/assets/attractionPageImages/attractionsPage5.jpg')},
          {id: 1, text: "Колонна мира - мемориал установлен в память о музыканте Джоне Ленноне. Инициатором установки стала его вдова Йоко Оно. Памятник представляет собой белый каменный пьедестал. Из него в небо идут лучи света, образуя башню. В хорошую безоблачную погоду высота лучей может достигать четырех км. По замыслу авторов проекта башня символизирует борьбу за мир во всем мире, которую начали Джон Леннон и Йоко Оно в 60-ые годы XX века.", keyword:"Колонна мира", photoPath: require('@/assets/attractionPageImages/attractionsPage6.jpg')},
        ],
        id3: "carouselExampleControls3",
        listPhotosPath3: [
          {id: 0, photoPath: require('@/assets/attractionPageImages/attractionsPage11.jpg'), activeForFirst: "carousel-item active"},
          {id: 1, photoPath: require('@/assets/attractionPageImages/attractionsPage12.jpg'), activeForFirst: "carousel-item"},
        ],
        commentsList: [
          {id: 1, username: "Алексей", date: "25/10/20 15:04" , text: "Две недели прошли на привезенных из дома макаронах и рыбешке, которую исландские рыбаки в портах отдавали бесплатно, ловя мой адски голодный взгляд. Но именно тогда, в 2014 году, я решил, что эта страна стоит всех денег и даже больше. Это другая планета, помесь Марса и Нептуна."},
          {id: 2, username: "Сергей", date: "25/10/20 15:04" , text: "Две недели прошли на привезенных из дома макаронах и рыбешке, которую исландские рыбаки в портах отдавали бесплатно, ловя мой адски голодный взгляд. Но именно тогда, в 2014 году, я решил, что эта страна стоит всех денег и даже больше. Это другая планета, помесь Марса и Нептуна."},
          {id: 3, username: "Михаил", date: "25/10/20 15:04" , text: "Две недели прошли на привезенных из дома макаронах и рыбешке, которую исландские рыбаки в портах отдавали бесплатно, ловя мой адски голодный взгляд. Но именно тогда, в 2014 году, я решил, что эта страна стоит всех денег и даже больше. Это другая планета, помесь Марса и Нептуна."}
        ]
    }},
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
        this.commentsList = this.commentsList.filter(t => t.id != id)
     },
     updateComment(id, text){
       this.commentsList[id-1].text = text
     },
     addComment(text){
       let id = this.commentsList.length + 1
       let recievedtext = text
       var date = new Date();
       let dateString = ("0" + date.getDate()).slice(-2) + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" +
    date.getFullYear().toString().slice(-2) + " " + ("0" + date.getHours()).slice(-2) + ":" + ("0" + date.getMinutes()).slice(-2);
       let user = this.getSignInStatus()
       this.commentsList.unshift({
         id: id,
         username: user,
         date: dateString,
         text: recievedtext,
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
