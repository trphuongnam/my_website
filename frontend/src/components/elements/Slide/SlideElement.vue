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
    >
      <vue-glide-slide v-for="infomation in infomations" :key="infomation.id">
        <h4 class="info_title">{{ infomation.name }}</h4>
        <div
          class="infomation_content"
          v-html="cutParagraph(infomation.content)"
        ></div>
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
    perView: Number,
    animationDuration: Number,
    gap: Number,
  },
  data() {
    return {
      infomations: [
        {
          id: 1,
          name: "Abouts",
          content:
            "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam quis dignissimos harum voluptas, dolor velit perferendis maxime quam possimus provident nisi distinctio modi commodi dolores aperiam dicta ea? A, dicta! &curren; Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam quis dignissimos harum voluptas, dolor velit perferendis maxime quam possimus provident nisi distinctio modi commodi dolores aperiam dicta ea? A, dicta!",
        },
        {
          id: 2,
          name: "Experiences",
          content:
            "Công ty CP Khiết Long <br> 01/2020 - 01/2021 <br> PHP DEVELOPER &curren; Công ty TNHH Rikai Technology <br> 07/2021 - Hiện tại <br> PHP DEVELOPER/ Trainer",
        },
        {
          id: 3,
          name: "Educations",
          content:
            "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam quis dignissimos harum voluptas, dolor velit perferendis maxime quam possimus provident nisi distinctio modi commodi dolores aperiam dicta ea? A, dicta!",
        },
      ],
    };
  },
  methods: {
    cutParagraph: function (infoContent) {
      let arrayText = infoContent.split("&curren;");
      let content = "";
      if (arrayText.length > 1) {
        for (let i = 0; i < arrayText.length; i++) {
          content +=
            "<section class='info_text_content' style='width: 100%; background-color: #fff; padding: 20px'>" +
            arrayText[i] +
            "</section>";
        }
      } else {
        content = infoContent;
      }
      return content;
    },
  },
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

.infomation_content {
  display: flex;
  flex-direction: row;
  align-items: center;
  text-align: justify;
  justify-content: space-around;
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