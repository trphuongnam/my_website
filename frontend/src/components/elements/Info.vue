<template>
  <div id="shortInfo">
    <div id="avatar">
      <img v-bind:src="image" v-bind:alt="website_name" />
    </div>
    <div id="description">
      <h2 id="title-header">{{website_name}}</h2>
      <h4>PHP Developer & Trainer</h4>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      image: require("../../assets/images/avata.jpg"),
      website_name: "",
      short_desc: ""
    };
  },

  // Hàm created() Khi trang load xong thì gọi tới server để lấy dữ liệu về
  created(){
    axios.get("http://127.0.0.1:8000/api/website_infomation")
    .then(response => {
      // this.image = response.data[0].avatar
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
}
</style>