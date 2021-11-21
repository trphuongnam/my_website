<template>
  <div id="skill">
    <div class="skill_elements">
      <div class="title-element"><h3>SKILL</h3></div>
      <div id="skill_content">
        <vue-glide
          type="carousel"
          v-bind:autoplay="2000"
          v-bind:hoverpause="true"
          v-bind:perView="5"
          v-bind:gap="50"
          v-bind:breakpoints = {1200:{perView:4},800:{perView:2},500:{perView:1}}
        >
          <vue-glide-slide v-for="image in images" :key="image.id">
            <img
              class="slide-img"
              v-bind:src="image.url"
              v-bind:alt="image.name"
            />
            <p class="skill_name">{{image.name}}</p>
          </vue-glide-slide>
        </vue-glide>
      </div>
    </div>
  </div>
</template>

<script>
import { Glide, GlideSlide } from "vue-glide-js";
import "vue-glide-js/dist/vue-glide.css";

export default {
  components: {
    [Glide.name]: Glide,
    [GlideSlide.name]: GlideSlide,
  },
  props: {
    autoplay: Number,
    hoverpause: Boolean,
    type: String,
    perView: Number,
    gap: Number,
    breakpoints: Object
  },
  data() {
    return {
      images: [
        {
          id: 1,
          url: "https://img.icons8.com/color/100/000000/html-5--v1.png",
          name: "HTML 5"
        },
        {
          id: 2,
          url: "https://img.icons8.com/color/100/000000/css3.png",
          name: "CSS 3"
        },
        {
          id: 3,
          url: "https://img.icons8.com/color/100/000000/javascript--v1.png",
          name: "Javascript"
        },
        {
          id: 4,
          url: "https://img.icons8.com/officel/100/000000/php-logo.png",
          name: "PHP"
        },
        {
          id: 5,
          url: "https://img.icons8.com/fluency/100/000000/laravel.png",
          name: "Laravel"
        },
      ],
    };
  },
};
</script>

<style scoped>
#skill {
  width: 100%;
  height: 100%;
  border: 0px solid rebeccapurple;
  grid-column: 1/4;
  grid-row: 4/5;
}

.skill_elements {
  width: 100%;
  height: 500px;
  border: 0px solid red;
  display: grid;
  grid-template-columns: 1fr 3fr 1fr;
  grid-template-rows: minmax(auto, auto) 4fr;
  align-items: center;
}

#skill_content {
  grid-column: 1/4;
  grid-row: 2/3;
}

.glide {
  grid-row: 2/3;
  grid-column: 1/4;
}

.glide__slide {
  overflow: hidden;
  display: inline-block;
  height: 200px;
  background: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.skill_name{
  display: block;
}

.btn_control_slide{
  border: none;
  background: none;
}
</style>