<template>
    <div>
    <p class="lifehacks" style="margin-left: 20%; margin-right: 20%;"><i :class="sectionStickerPlaceholder"></i>{{ nameSectionPlaceholder }}</p>
        <!-- Для больших экранов -->
        <div class="row applicationRow">
            <div class="col-lg-6 py-2">
                <div class="card card-body h-100" style="border: none;" v-if="listTwoNotesPlaceholder.length == 2">
                    <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listTwoNotesPlaceholder[0].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listTwoNotesPlaceholder[0].text.split(listTwoNotesPlaceholder[0].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listTwoNotesPlaceholder[0].keyword }}</a>{{ listTwoNotesPlaceholder[0].text.split(listTwoNotesPlaceholder[0].keyword)[1] }}</p>
                </div>
            </div>

            <div class="col-lg-6 py-2">
            <div class="card card-body h-100" style="border: none;" v-if="listTwoNotesPlaceholder.length == 2">
                <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listTwoNotesPlaceholder[1].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listTwoNotesPlaceholder[1].text.split(listTwoNotesPlaceholder[1].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listTwoNotesPlaceholder[1].keyword }}</a>{{ listTwoNotesPlaceholder[1].text.split(listTwoNotesPlaceholder[1].keyword)[1] }}</p>
            </div>
            </div>
        </div>

        <!-- Для малых экранов -->
        <div class="smallScreen" style="margin-left: 20%; margin-right: 20%;">
        <div v-if="listTwoNotesPlaceholder.length == 2">
            <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listTwoNotesPlaceholder[0].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listTwoNotesPlaceholder[0].text.split(listTwoNotesPlaceholder[0].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listTwoNotesPlaceholder[0].keyword }}</a>{{ listTwoNotesPlaceholder[0].text.split(listTwoNotesPlaceholder[0].keyword)[1] }}</p>
            <p class="applicationP"><a><i :class="sectionStickerPlaceholder"></i><img class="right rounded-circle" :src="getImgUrl(listTwoNotesPlaceholder[1].photoPath)" style="width: 10vw; height: 10vw;"></a>{{ listTwoNotesPlaceholder[1].text.split(listTwoNotesPlaceholder[1].keyword)[0] }} <a class="applicationP" style="font-weight: bold;">{{ listTwoNotesPlaceholder[1].keyword }}</a>{{ listTwoNotesPlaceholder[1].text.split(listTwoNotesPlaceholder[1].keyword)[1] }}</p>
        </div>
        </div>
    </div>
</template>

<script>
export default{
  props: ['nameSectionPlaceholder','sectionStickerPlaceholder','listTwoNotesPlaceholder'],
  methods:{
        getImgUrl: function(picture) {
            return require('@/assets'+picture)
        }
  },
}
</script>

<style>
</style>