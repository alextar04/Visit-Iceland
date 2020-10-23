<template>
<div class="card" style="width: 60%; ">
        <img class="contentClass" :src="photoPathPlaceholder" alt="">
</div>
</template>

<script>
export default{
    props: ['photoPathPlaceholder']
}
</script>