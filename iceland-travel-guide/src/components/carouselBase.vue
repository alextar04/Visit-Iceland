<template>
  <div>
    <div
      id="carouselExampleControls1"
      class="carousel slide"
      data-ride="carousel"
      style="margin-left: 20%; margin-right: 20%;"
    >
      <div class="carousel-inner">
          <div v-for="content in listPhotosPathPlaceholder" :key="content.id" :class="content.activeForFirst">
            <img class="d-block w-100" :src="content.photoPath" alt="Third slide">
          </div>
      </div>

      <a
        class="carousel-control-prev"
        href="#carouselExampleControls1"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleControls1"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</template>

<script>
export default{
  props: ['listPhotosPathPlaceholder']
}
</script>

<style>
</style>