<template>
  <div>
    {{ setPageName }}
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
        v-bind:photoPathPlaceholder="photo7"
    /><br>
    <a id="#transport"></a>
    <sectionComponent 
        v-bind:nameSectionPlaceholder="nameSection6"
        v-bind:sectionStickerPlaceholder="sectionSticker6"
        v-bind:listFourNotesPlaceholder="listFourNotes6"
    />
    <photo
        v-bind:photoPathPlaceholder="photo8"
    /><br>
    <photo
        v-bind:photoPathPlaceholder="photo9"
    />
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
        pageName: this.$route.params.name,
        startImagePath: require('@/assets/cityPageImages/cityPage0.jpg'),
        generalNameChapters: "Полезные лайфхаки",
        generalLogoChapters: "fas fa-paperclip mr-2",
        listChapters: [
          {id: 0, text: "История", photoPath: require('@/assets/cityPageImages/cityPage1.jpeg'), link: "Рейкъявик#history"},
          {id: 1, text: "География", photoPath: require('@/assets/cityPageImages/cityPage2.png'), link: "#geography"},
          {id: 2, text: "Климат",  photoPath: require('@/assets/cityPageImages/cityPage3.jpg'), link: "#climate"},
          {id: 3, text: "Интересное",  photoPath: require('@/assets/cityPageImages/cityPage4.jpg'), link: "#interesting"},
          {id: 4, text: "Покупки",  photoPath: require('@/assets/cityPageImages/cityPage5.jpg'), link: "#buying"},
          {id: 5, text: "Транспорт",  photoPath: require('@/assets/cityPageImages/cityPage6.png'), link: "#transport"},
        ],
        nameSection1: "История",
        sectionSticker1: "fas fa-monument mr-2",
        listFourNotes1: [
          {id: 0, text: "Исландия была заселена норвежскими и кельтскими иммигрантами в течение конца IX и начала X веков. Согласно средневековой «Книге о заселении Исландии» (исл. Landnámabók), Ингольф Арнарсон, первый исландский поселенец, построил в 874 году свою ферму на полуострове, где сейчас расположен Рейкьявик. Место было названо Reykjavík («Дымная бухта») из-за столбов пара, которые поднимались от горячих источников и производили глубокое впечатление на поселенцев.", keyword:"«Книге о заселении Исландии» (исл. Landnámabók)"},
          {id: 1, text: "Много веков спустя, около середины XVIII века, маленький городок начал вырастать возле фермы Рейкьявик благодаря королевскому казначею Скули Магнуссону, известному как «отец Рейкьявика», который основал шерстяные мастерские в Рейкьявике в рамках своей деятельности по модернизации исландской экономики. Это послужило толчком к началу развития Рейкьявика как города. Статус города Рейкьявик получил 18 августа 1786 года.", keyword:"Скули Магнуссону", photoPath: require('@/assets/cityPageImages/cityPageSub1.jpg')},
          {id: 2, text: "После установления власти норвежских королей над островом, Рейкьявик становится центром сбора дани и налогов, а также важным центром торговли с Норвегией, Англией и Ганзой. С ускорением экономического прогресса в XX веке рос и Рейкьявик, но особенно быстрое развитие он получил во второй половине XX века.", keyword:"важным центром торговли с Норвегией, Англией и Ганзой", photoPath: require('@/assets/cityPageImages/cityPageSub2.jpg')},
          {id: 3, text: "Во время Второй мировой войны Рейкьявик приобрёл стратегически важное значение для американских и английских судов, которые несли патрульную службу в водах Северной Атлантики. 10 мая 1940 года, после того как Германия оккупировала Данию и Норвегию, британские войска высадились в Рейкьявике в ходе операции «Форк». Они не встретили никакого сопротивления. В декабре 1943 г. закончился срок действия договора о личной унии Дании и Исландии, заключённого в 1918 г. 17 июня 1944 г. Исландия была провозглашена независимой республикой, и её столицей официально был признан город Рейкьявик.", keyword:"независимой республикой"},
        ],
        photo1: require('@/assets/cityPageImages/cityPage7.jpg'),
        photo2: require('@/assets/cityPageImages/cityPage8.jpg'),
        nameSection2: "География",
        sectionSticker2: "fas fa-globe-europe mr-2",
        listFourNotes2: [
          {id: 0, text: "Рейкьявик расположен в юго-западной части острова, на полуострове Сельтьяднарнес. Город расположен в зоне сдвига тектонических плит, поэтому для него характерны небольшие землетрясения.", keyword:"Рейкьявик"},
          {id: 1, text: "Через Рейкьявик протекает река Эдлидаау. Она не судоходна, однако богата рыбой. Так как город находится недалеко от полярного круга, для него характерны очень светлые белые ночи летом и очень короткий (около 4 часов) световой день зимой.", keyword:"река Эдлидаау", photoPath: require('@/assets/cityPageImages/cityPageSub3.jpg')},
          {id: 2, text: "Самая северная в мире столица, самый чистый и самый богатый город, одна из самых культурных столиц, город литературы — это все о «Дымящейся бухте», о Рейкьявике — столице Исландии.", keyword:"Самая северная в мире столица", photoPath: require('@/assets/cityPageImages/cityPageSub4.jpg')},
          {id: 3, text: "В городе несколько десятков термальных бассейнов, на его территории нет промышленных предприятий, а водой из геотермальных источников обогревают дома.", keyword:"геотермальных источников"},
        ],
        photo3: require('@/assets/cityPageImages/cityPage9.png'),
        nameSection3: "Климат",
        sectionSticker3: "fas fa-snowflake mr-2",
        listFourNotes3: [
          {id: 0, text: "Несмотря на то, что Рейкьявик находится на севере Атлантики, климат в городе намного благоприятнее, чем у многих других местностей, располагающихся на такой же широте (64°).", keyword:"Несмотря на то, что Рейкьявик находится на севере Атлантики"},
          {id: 1, text: "Средняя зимняя температура сравнима с температурой Нью-Йорка. Зимой в столице Исландии температура редко опускается ниже −10 °C. Всё это благодаря воздействию тёплых вод Гольфстрима. В России подобный климат можно наблюдать на о. Симушир.", keyword:"Средняя зимняя температура сравнима с температурой Нью-Йорка.", photoPath: require('@/assets/cityPageImages/cityPageSub5.jpg')},
          {id: 2, text: "Климат умеренный морской (по Алисову — субарктический), зима мягкая, с оттепелями (средняя температура января −1…+3 °C) благодаря влиянию течения Ирмингера, лето умеренно-прохладное (средняя температура июля +10…+13 °C).", keyword:"Климат умеренный морской", photoPath: require('@/assets/cityPageImages/cityPageSub6.jpg')},
          {id: 3, text: "Лето умеренно-прохладное (средняя температура июля +10…+13 °C). Осадков 850 мм в год. Вода в заливе зимой не замерзает. Характерны частые перемены погоды.", keyword:"умеренно-прохладное"},
        ],
        photo4: require('@/assets/cityPageImages/cityPage10.jpg'),
        photo5: require('@/assets/cityPageImages/cityPage11.jpg'),
        nameSection4: "Интересное",
        sectionSticker4: "fas fa-umbrella-beach mr-2",
        listFourNotes4: [
          {id: 0, text: "Хадльгримскиркья - лютранская церковь, которая используется в качестве обзорной вышки, с которой открывается замечательный вид на Рейкьявик и окружающие его горы. Перед церковью расположена статуя Лейфа Счастливого, подаренная Соединёнными Штатами Америки в 1930 году в честь тысячелетнего юбилея Исландского парламента.", keyword:"Хадльгримскиркья"},
          {id: 1, text: "Харпа - площадка для проведения многочисленных фестивалей, концертов (в том числе бесплатных), шоу, выступлений и презентаций. Большое внимание уделяется концертам народной исландской музыки.", keyword:"Харпа", photoPath: require('@/assets/cityPageImages/cityPageSub7.jpg')},
          {id: 2, text: "Перлан - (исл. Perlan — «жемчужина») — городская котельная, здание с голубой полусферической крышей-куполом, находящееся на вершине холма Оскюлид (Öskjuhlíð), самом крупном холме Рейкьявика (Исландия). Незаселённый холм покрыт лесом, тем не менее, Перлан виден практически со всех концов города.", keyword:"Перлан", photoPath: require('@/assets/cityPageImages/cityPageSub8.jpg')},
          {id: 3, text: "Хевди - старинный особняк, расположенный на севере столицы Исландии, Рейкьявика. Был построен в 1909 году и первоначально являлся резиденцией французского консула.", keyword:"Хевди"},
        ],
        photo6: require('@/assets/cityPageImages/cityPage12.jpg'),
        photo7: require('@/assets/cityPageImages/cityPage13.jpg'),
        nameSection5: "Покупки",
        sectionSticker5: "fas fa-shopping-cart mr-2",
        listFourNotes5: [
          {id: 0, text: "Самый центр Рейкьявика украшает Gullkúnst Helgu, который делает ставку на создание дорогих вещиц, способных подчеркнуть красоту каждой девушки и женщины. Для этого дизайнеры зачастую используют самые непредсказуемые материалы для ювелирных украшений: местную лаву, базальтовый фарфор, нешлифованные алмазы и даже полудрагоценные камни.", keyword:"Gullkúnst Helgu"},
          {id: 1, text: "Mýrin — современный и роскошный магазин исландского дизайна, который представляет скрупулезно отобранные творения 60-ти дизайнеров Исландии. Эти творения поражают энергией и творчеством, которые компактно и элегантно вписались в такие предметы как мебель, ткани, домашняя утварь и, конечно же, украшения.", keyword:"Mýrin", photoPath: require('@/assets/cityPageImages/cityPageSub8.jpg')},
          {id: 2, text: "Дизайнерская мода в столице Исландии представлена несколькими привлекательными бутиками, которые достойны внимания. Например, это марка Kalda по созданию одежды от сестер-модельеров. Творения этого бренда радуют простотой и современностью.", keyword:"Kalda", photoPath: require('@/assets/cityPageImages/cityPageSub9.jpg')},
          {id: 3, text: "В подчинении Eydís Björg Sæmundsdóttir самые стильные бутики в Рейкьявике под брендом Freebird (некогда Tiia). Данный бутик специализируется на одежде стиля бохо-шик. К слову, совсем недавно его коллекции пополнились единицами, представленными скандинавскими дизайнерами, такими как Munthe plus Simonsen, Lollys Laundry, Rabens Saloner и продукция собственно бренда Freebird.", keyword:"Freebird (некогда Tiia)."},
        ],
        photo7: require('@/assets/cityPageImages/cityPage14.jpg'),
        nameSection6: "Транспорт",
        sectionSticker6: "fas fa-car mr-2",
        listFourNotes6: [
          {id: 0, text: "Международный аэропорт Кеблавик находится в 50 км от Рейкьявика, куда автобусы ходят каждые 45 минут или отходят через 40-50 минут после прилета рейса. От аэропорта до BSI (Центрального автовокзала Рейкьявика) курсируют автобусы Flybus или Gray Line Iceland — они одни из самых дешевых.", keyword:"Flybus или Gray Line Iceland"},
          {id: 1, text: "Пароходы и моторные суда осуществляют регулярные перевозки между прибрежными городами и поселками, а также между побережьем и южными островами. От центрального порта Рейкьявика Skarfabakki за 10-15 минут можно добраться до острова Видей — популярного места отдыха горожан и центра притяжения туристов.", keyword:"Skarfabakki", photoPath: require('@/assets/cityPageImages/cityPageSub9.jpg')},
          {id: 2, text: "Однако если вы планируете походить по местным музеям, то более выгодный вариант — карта Reykjavik Welcome Card. Карта на день стоит 3600 ISK и дает право неограниченного проезда на городских автобусах, пароме на остров Видей, а также бесплатный вход или скидки в музеях, бассейнах и других достопримечательностях Рейкьявика.", keyword:"Reykjavik Welcome Card", photoPath: require('@/assets/cityPageImages/cityPageSub10.jpg')},
          {id: 3, text: "Посмотреть достопримечательности центра исландской столицы можно на автобусах City Sightseeing bus, которые ходят каждые полчаса. Ярко-красные даблдккеры можно встретить в туристический сезон с мая по август. Билет на сутки обойдется в 3300 ISK.", keyword:"City Sightseeing bus"},
        ],
        photo8: require('@/assets/cityPageImages/cityPage15.jpg'),
        photo9: require('@/assets/cityPageImages/cityPage16.jpg'),
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
    },
    setPageName: function(){
      document.title = this.pageName
    }
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
