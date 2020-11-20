<template>
<div class="card" style="width: 60%; ">
        <img class="contentClass" :src="getImgUrl(photoPathPlaceholder)" alt="">
</div>
</template>

<script>
export default{
    props: ['photoPathPlaceholder'],
    methods:{
        getImgUrl: function(picture) {
            return picture === null ? picture : require('@/assets'+picture)
        }
  },
}
</script>