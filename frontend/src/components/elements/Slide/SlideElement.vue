<template>
  <div class="slide_elements">
    <div class="title-element"><h3>INFORMATION</h3></div>

    <vue-glide
      type="carousel"
      v-bind:autoplay="2000"
      v-bind:hoverpause="true"
      v-bind:perView="1"
      v-bind:animationDuration="5000"
      v-bind:gap="0"
      v-if="infomations !== null"
    >
      <vue-glide-slide v-for="infomation in infomations" :key="infomation.id">
        <h4 class="info_title" >{{ infomation.name }}</h4>
        <InfoContent :content="infomation.content"></InfoContent>
      </vue-glide-slide>
      <template slot="control">
        <button class="btn_control_slide" data-glide-dir="<">
          <img
            src="https://img.icons8.com/fluency-systems-regular/48/000000/long-arrow-left.png"
          />
        </button>
        <button class="btn_control_slide" data-glide-dir=">">
          <img
            src="https://img.icons8.com/fluency-systems-regular/48/000000/long-arrow-right.png"
          />
        </button>
      </template>
    </vue-glide>
  </div>
</template>

<script>
import SectionSlider from "@/components/elements/Slide/SectionSlider.vue";
import { Glide, GlideSlide } from "vue-glide-js";
import "vue-glide-js/dist/vue-glide.css";
import axios from "axios";

export default {
  components: {
    [Glide.name]: Glide,
    [GlideSlide.name]: GlideSlide,
    'InfoContent': SectionSlider
  },
  props: {
    autoplay: Number,
    hoverpause: Boolean,
    perView: Number,
    animationDuration: Number,
    gap: Number,
  },
  data() {
    return {
      infomations: null,
    };
  },

  /*Sử dụng axios để lấy dữ liệu khi component được tạo thành công*/
  created() {
    axios.get(process.env.VUE_APP_SERVER_URL + 'infomation')
    .then(response => {
      this.infomations = response.data
      console.log( response.data);
    })
    .catch(e => {
      console.log(e)
    })
  },
  /*Sử dụng axios để lấy dữ liệu khi component được tạo thành công*/
};
</script>

<style scoped>
.slide_elements {
  width: 100%;
  height: 500px;
  border: 0px solid red;
  display: grid;
  grid-template-columns: 1fr 3fr 1fr;
  grid-template-rows: minmax(auto, auto) 4fr;
  align-items: center;
}

.slide_items {
  grid-row: 2/3;
  grid-column: 2/3;
  border: 0px solid tomato;
  background-color: #fff;
  display: none;
}

.about {
  text-align: justify;
}

.glide {
  grid-row: 2/3;
  grid-column: 1/4;
}

.glide__slide {
  overflow: auto;
  height: 300px;
}

#control_slide_bar{
  position: absolute;
  /* border: 1px solid; */
  z-index: 2;
  top: 50%;
  display: flex;
  width: 100%;
  justify-content: space-between;
  align-content: center;
}

.btn_control_slide {
  border: none;
  background: none;
}

.info_title {
  text-transform: uppercase;
}

@media only screen and (max-width: 650px) {
  .slide_elements {
    height: auto;
  }

  .infomation_content {
    flex-direction: column;
  }

  .glide__slide {
    overflow: auto;
    height: auto;
  }

  .info_text_content{
    width: 100%;
  }
}
</style>