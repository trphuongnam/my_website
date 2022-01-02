<template>
  <div id="footer">
    <div id="btn_downloadCV">
      <a :href="myCV" class="btn btn-success" target='_blank'>DOWNLOAD MY FULL CV</a>
    </div>
    <ul id="menu">
      <li class="menuItem">
        <a href=""><i class="bi bi-facebook"></i></a>
      </li>
    </ul>
    <p>Copyright &copy; 2021 <br> Design by Tran Phuong Nam</p>
  </div>
</template>

<script>
import axios from 'axios'
import { urlConfigMixin } from '@/mixins/urlConfigMixin.js'

export default {
  mixins: [urlConfigMixin],
  data() {
    return{
      myCV: null,
    }
  },
  async created() {
    try {
      var response = await axios.get(this.serverUrl + 'download/mycv')
      this.myCV = this.serverUrlPDF + response.data
    } catch (e) {
      console.log(e)
    }
    
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#footer{
  grid-row: 8/9;
  grid-column: 1/4;
  padding-top: 10px;
  background-color: #fff;
  z-index: 0;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
