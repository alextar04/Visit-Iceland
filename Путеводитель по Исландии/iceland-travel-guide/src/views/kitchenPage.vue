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
        pageName: "Исландская кухня",
        startImagePath: require('@/assets/kitchenPageImages/kitchenPage0.jpg'),
        generalNameChapters: "Обзор меню",
        generalLogoChapters: "fas fa-bread-slice mr-2",
        listChapters: [
          {id: 0, text: "Стритфуд", photoPath: require('@/assets/kitchenPageImages/kitchenPage1.jpg'), link: "/kitchen#streetfood"},
          {id: 1, text: "Рестораны/кафе", photoPath: require('@/assets/kitchenPageImages/kitchenPage2.png'), link: "/kitchen#cafe"},
          {id: 2, text: "Бары",  photoPath: require('@/assets/kitchenPageImages/kitchenPage3.jpg'), link: "/kitchen#bars"},
        ],
        nameSection1: "Стритфуд",
        sectionSticker1: "fas fa-hamburger mr-2",
        listFourNotes1: [
          {id: 0, text: "Жители Рейкьявика обожают хот-доги. Возле киоска Bæjarins beztu pylsur (Tryggvatagata, 1) всегда огромные очереди. The Guardian назвал здешние сосиски в булке лучшими в Европе, а еще тут не погнушался пообедать сам Билл Клинтон.", keyword:"хот-доги"},
          {id: 1, text: "В Icelandic Fish & Chips (Tryggvagata, 11) вас ждут огромные порции. Рыба здесь везде – она даже служит плафонами для светильников и входит в состав лимонада.", keyword:"Рыба", photoPath: require('@/assets/kitchenPageImages/kitchenPageSub1.jpg')},
          {id: 2, text: "Из экзотики, которую нужно попробовать – соленая лакрица. Батончики с ней продаются на каждой заправке, но дешевле всего купить ее в одном из многочисленных супермаркетов Bonus.", keyword:"соленая лакрица", photoPath: require('@/assets/kitchenPageImages/kitchenPageSub2.jpg')},
          {id: 3, text: "Тут же стоит взять на пробу местный самый популярный завтрак: молочный продукт Skyr – то ли сыр, то ли йогурт.", keyword:"Skyr"},
        ],
        photo1: require('@/assets/kitchenPageImages/kitchenPage5.jpg'),
        photo2: require('@/assets/kitchenPageImages/kitchenPage4.jpg'),
        nameSection2: "Рестораны/кафе",
        sectionSticker2: "fas fa-coffee mr-2",
        listFourNotes2: [
          {id: 0, text: "Кухня Исландии не отличается особым разнообразием – рыба в рыбе под рыбным соусом. Самым изысканным деликатесом тут считается протухшее акулье мясо. Если к таким экспериментам вы еще не готовы, возьмите на заметку места с более традиционными блюдами.", keyword:"Кухня Исландии"},
          {id: 1, text: "Sægreifinn (Geirsgata, 8). Лучшего места для того, чтобы отведать суп из лобстера, не найти. К тому же цены тут на порядок ниже обычных.", keyword:"Sægreifinn (Geirsgata, 8)", photoPath: require('@/assets/kitchenPageImages/kitchenPageSub3.jpg')},
          {id: 2, text: "Fiskmarkaðurinn (Aðalstræti, 12) – небольшой рыбный ресторанчик с блюдами японской кухни. Здесь подают вкусный сашими и десерты. Цены, правда, высокие. Лучше зарезервировать место заранее, иначе рискуете сюда не попасть.", keyword:"Fiskmarkaðurinn (Aðalstræti, 12)", photoPath: require('@/assets/kitchenPageImages/kitchenPageSub4.jpg')},
          {id: 3, text: "Создателям Laundromat cafe (Austurstræti, 9) пришла в голову идея: в прачечных люди могут не только ждать, пока закончится стирка, но и провести время с пользой. Выпить пива, например, или пообедать.", keyword:"Laundromat cafe (Austurstræti, 9)"},
        ],
        photo3: require('@/assets/kitchenPageImages/kitchenPage6.png'),
        nameSection3: "Бары",
        sectionSticker3: "fas fa-beer mr-2",
        listFourNotes3: [
          {id: 0, text: "Mikkeller&Friends (Hverfisgata, 12). Бар расположен в одном из самых старых домов столичного района 101. Раньше тут находился первый исландский госпиталь с рентген-оборудованием, потом приют для женщин.", keyword:"Mikkeller&Friends (Hverfisgata, 12)"},
          {id: 1, text: "The English Pub. Здесь не найдете каких-то чисто исландских фишек или изысканного меню, но дегустировать пиво местных сортов дешевле всего именно тут: бокал Gull будет стоить всего €4.", keyword:"The English Pub.", photoPath: require('@/assets/kitchenPageImages/kitchenPageSub5.jpg')},
          {id: 2, text: "Microbar (Vesturgata, 2) не зря который год подряд занимает первое место в рейтингах лучших пабов Рейкьявика. Тут очень любят \"зависать\" местные жители, поэтому если хотите ощутить настоящий пульс ночной жизни города, вам сюда. Только здесь удастся попробовать абсолютно все сорта исландского пива, заказав специальные пробники по 170 мл.", keyword:"Microbar (Vesturgata, 2)", photoPath: require('@/assets/kitchenPageImages/kitchenPageSub6.jpg')},
          {id: 3, text: "В Gaukurinn (Tryggvagata, 22) вы сможете не только попробовать лучшие шоты, но и попасть на какой-нибудь ивент: например, караоке-пати или вечер стендап-комедии.", keyword:"В Gaukurinn (Tryggvagata, 22)"},
        ],
        photo4: require('@/assets/kitchenPageImages/kitchenPage7.jpg'),
        photo5: require('@/assets/kitchenPageImages/kitchenPage8.jpg'),
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
