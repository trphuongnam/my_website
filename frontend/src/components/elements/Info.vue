<template>
  <div id="shortInfo">
    <div id="avatar">
      <img v-bind:src="image" v-bind:alt="website_name" />
    </div>
    <div id="description">
      <h2 id="title-header">{{website_name}}</h2>
      <h4>{{short_desc}}</h4>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { urlConfigMixin } from '@/mixins/urlConfigMixin.js'

export default {
  mixins: [urlConfigMixin],
  data() {
    return {
      image: null,
      website_name: "",
      short_desc: ""
    };
  },

  // Hàm created() Khi trang load xong thì gọi tới server để lấy dữ liệu về
  created(){
    axios.get(this.serverUrl + "website_infomation")
    .then(response => {
      this.image = this.serverUrlImage + response.data[0].avatar
      this.website_name = response.data[0].website_name
      this.short_desc = response.data[0].short_desc
    })
    .catch(error => {
      console.log(error)
      this.errored = true
    })
  }
};
</script>

<style scoped>
#shortInfo {
  width: 100%;
  padding: 0 20px 20px;
  box-sizing: border-box;
  grid-column: 1/4;
  grid-row: 2/3;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-image: url("../../assets/images/bgr2.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  z-index: 0;
}
#description {
  width: 80%;
  box-sizing: border-box;
  text-align: center;
  padding-right: 20px;
}
#avatar {
  width: 250px;
  height: 250px;
  box-sizing: border-box;
  overflow: hidden;
  border-radius: 50%;
  display: flex;
  align-items: center;
  border: 15px solid #fff;
}
#avatar img {
  width: 100%;
  height: auto;
  box-sizing: border-box;
}
#title-header {
  font-size: 44px;
  font-family: Heebo;
  line-height: 1.5;
  color: #fff;
}

#description > h4{
  color: aliceblue;
}

.text {
  font-size: 16px;
  margin: 35px 0px;
}

@media only screen and (max-width: 768px) {
  #shortInfo {
    padding: 0;
  }
  #description {
    width: 100%;
    padding-right: 0px;
  }
  #title-header{
    font-size: 2rem;
  }
  #description {
    width: 100%;
    padding-right: 0;
  }
}

@media screen and (max-width: 320px) {
  #title-header{
    font-size: 1.5rem;
  }

  #avatar{
    width: 80vw;
    height: 80vw;
  }
}

</style>