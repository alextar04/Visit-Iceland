<template>
    <div>
    <p class="lifehacks" style="margin-left: 20%; margin-right: 20%;"><i :class="sectionStickerPlaceholder"></i>{{ nameSectionPlaceholder }}</p>
        <!-- Для больших экранов -->
        <div class="row applicationRow">
            <div class="col-lg-6 py-2">
                <div class="card card-body h-100" style="border: none;" v-if="listFourNotesPlaceholder.length == 4">
                    <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i></a>{{ listFourNotesPlaceholder[0].text.split(listFourNotesPlaceholder[0].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[0].keyword }}</a>{{ listFourNotesPlaceholder[0].text.split(listFourNotesPlaceholder[0].keyword)[1] }}</p>
                    <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listFourNotesPlaceholder[1].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listFourNotesPlaceholder[1].text.split(listFourNotesPlaceholder[1].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[1].keyword }}</a>{{ listFourNotesPlaceholder[1].text.split(listFourNotesPlaceholder[1].keyword)[1] }}</p>
                </div>
            </div>

            <div class="col-lg-6 py-2">
            <div class="card card-body h-100" style="border: none;" v-if="listFourNotesPlaceholder.length == 4">
                <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listFourNotesPlaceholder[2].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listFourNotesPlaceholder[2].text.split(listFourNotesPlaceholder[2].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[2].keyword }}</a>{{ listFourNotesPlaceholder[2].text.split(listFourNotesPlaceholder[2].keyword)[1] }}</p>
                <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i></a>{{ listFourNotesPlaceholder[3].text.split(listFourNotesPlaceholder[3].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[3].keyword }}</a>{{ listFourNotesPlaceholder[3].text.split(listFourNotesPlaceholder[3].keyword)[1] }}</p>
            </div>
            </div>
        </div>

        <!-- Для малых экранов -->
        <div class="smallScreen" style="margin-left: 20%; margin-right: 20%;">
        <div v-if="listFourNotesPlaceholder.length == 4">
            <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i></a>{{ listFourNotesPlaceholder[0].text.split(listFourNotesPlaceholder[0].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[0].keyword }}</a>{{ listFourNotesPlaceholder[0].text.split(listFourNotesPlaceholder[0].keyword)[1] }}</p>
            <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listFourNotesPlaceholder[1].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listFourNotesPlaceholder[1].text.split(listFourNotesPlaceholder[1].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[1].keyword }}</a>{{ listFourNotesPlaceholder[1].text.split(listFourNotesPlaceholder[1].keyword)[1] }}</p>
            <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listFourNotesPlaceholder[2].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listFourNotesPlaceholder[2].text.split(listFourNotesPlaceholder[2].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[2].keyword }}</a>{{ listFourNotesPlaceholder[2].text.split(listFourNotesPlaceholder[2].keyword)[1] }}</p>
            <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i></a>{{ listFourNotesPlaceholder[3].text.split(listFourNotesPlaceholder[3].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listFourNotesPlaceholder[3].keyword }}</a>{{ listFourNotesPlaceholder[3].text.split(listFourNotesPlaceholder[3].keyword)[1] }}</p>
        </div>
        </div>
    </div>
</template>

<script>
export default{
  props: ['nameSectionPlaceholder','sectionStickerPlaceholder','listFourNotesPlaceholder'],
  methods:{
        getImgUrl: function(picture) {
            return require('@/assets'+picture)
        }
  },
}
</script>

<style>
</style>