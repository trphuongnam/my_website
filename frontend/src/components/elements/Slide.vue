<template>
  <div id="slide">
    <SlideElement></SlideElement>
  </div>
</template>

<script>
import SlideElement from '@/components/elements/Slide/SlideElement.vue'

export default {
  components: {
    SlideElement
  },
}
</script>

<style scoped>
  #slide{
    width: 100%;
    height: 100%;
    border: 0px solid yellow;
    grid-column: 1/4;
    grid-row: 3/4;
    background-color: #fff;
    z-index: 0;
  }
</style>