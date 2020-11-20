<template>
<div>
    <br>
    <p style="margin-left: 20%; font-size: 19pt; font-weight: 900;">{{ pageNamePlaceholder }}</p>
    <div class="card" style="width: 60%; ">
        <img class="contentClass" :src="getImgUrl(startImagePathPlaceholder)" alt="">
    </div>
</div>
</template>

<script>
export default{
    props: ['pageNamePlaceholder','startImagePathPlaceholder'],
    methods:{
        getImgUrl: function(picture) {
            return picture === null ? picture : require('@/assets'+picture)
        }
  },
}
</script>