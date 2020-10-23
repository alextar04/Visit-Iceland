<template>
  <div>
    <div
      id="carouselExampleControls"
      class="carousel slide"
      data-ride="carousel"
      style="margin-left: 0%; margin-right: 0%; height: 90vh"
    >
      <div class="carousel-inner" style="height: 90vh">
        <div v-for="content in listContentsPlaceholder" :key="content.id" :class="content.activeForFirst" style="height: 90vh">
          <div class="img-wrap">
            <img
              :src="content.photoPath"
              class="img-responsive"
              style="height: 90vh; width: 100%"
            />
            <h1 style="bottom: 52%"><a>{{ content.text.split("-")[0].toUpperCase() }}</a></h1>
            <h1 style="bottom: 46%"><a>{{ content.text.split("-")[1].toUpperCase() }}</a></h1>
            <h1 style="bottom: 40%"><a>{{ content.text.split("-")[2].toUpperCase() }}</a></h1>
            <h1 style="bottom: 20%">
              <button type="button" class="btn btn-light">
                <router-link class="linkClass" :to="content.link">Подробнее</router-link>
              </button>
            </h1>
          </div>
        </div>
      </div>

      <a
        class="carousel-control-prev"
        href="#carouselExampleControls"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleControls"
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
  props: ['listContentsPlaceholder']
}
</script>

<style>
</style>