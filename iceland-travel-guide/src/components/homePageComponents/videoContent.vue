<template>
<iframe width=60% height=450 style="margin-left: 20%;" :src="videoContentLinkPlaceholder" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</template>

<script>
export default{
  props: ['videoContentLinkPlaceholder'
          ]
}
</script>


<style lang="css">
</style>