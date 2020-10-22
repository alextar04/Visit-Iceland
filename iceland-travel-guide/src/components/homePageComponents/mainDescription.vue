<template>
<p style="margin-left: 20%; font-size: 19pt; font-weight: 900;">Исла́ндия</p>
        <div class="card" style="width: 60%; ">
          <div class="card-body">
            <a class="card-text">
              <a class="fab fa-facebook-f mr-1" style="color: gray; text-decoration: none" href = "https://www.facebook.com"></a>
              <a class="fab fa-twitter mr-1" style="color: gray;  text-decoration: none" href = "https://twitter.com"></a>
              <a class="fab fa-vk mr-1" style="color: gray;  text-decoration: none" href = "https://vk.com/alextar04"></a>
              <a class="fab fa-github mr-1" style="color: gray;  text-decoration: none" href = "https://github.com/alextar04"></a>
              <small class="text-muted mr-1">30.09.20  Изображение: Алексей Таран</small>
            </a>
          </div>
          <img class="contentClass" :src="basePicturePathPlaceholder" alt="">
        </div>
        

        <!-- Версия для больших экранов -->
        <div class="row applicationRow">
          <div class="col-lg-6 py-2">
              <div class="card card-body h-100 border-0" style="border: none;">
                  <p class="descriptionBold">{{ descriptionFirstPlaceholder }}</p>
              </div>
          </div>

          <div class="col-lg-6 py-2">
            <div class="card card-body h-100 border-0" style="border: none;">
                <p class="descriptionSlim">{{ descriptionSecondPlaceholder }}</p>
            </div>
          </div>
      </div>

      <!-- Версия для малых экранов -->
      <div class="smallScreen" style="margin-left: 20%; margin-right: 20%;">
        <div>
          <br>
          <p class="descriptionBold">{{ descriptionFirstPlaceholder }}</p>
          <p class="descriptionSlim">{{ descriptionSecondPlaceholder }}</p>
        </div>
      </div>
</template>

<script>
export default{
  props: ['basePicturePathPlaceholder',
          'descriptionFirstPlaceholder',
          'descriptionSecondPlaceholder'
          ]
}
</script>


<style lang="css">
</style>