<template>
  <header id="header">
    <MobileMenu></MobileMenu>
    <nav id="topmenu">
      <ul id="menu">
        <li class="menuItem">
          <router-link to="/" tag="a" class="menuLink">Home</router-link>
        </li>
        <li class="menuItem">
          <router-link to="/" tag="a" class="menuLink">My Blogs</router-link>
        </li>
        <li class="menuItem">
          <a href="#contact_item" class="menuLink">Contact</a>
        </li>
      </ul>
      <div id="btn_downloadCV">
        <a :href="myCV" class="btn btn-success" target='_blank'>DOWNLOAD MY FULL CV</a>
      </div>
    </nav>
    
  </header>
</template>

<script>
import MobileMenu from "@/components/elements/Menu/MobileMenu";
import axios from 'axios'
import { urlConfigMixin } from '@/mixins/urlConfigMixin.js'

export default {
  components:{
    MobileMenu
  },
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
    } catch (error) {
      console.log(error)
    }
  },
};
</script>

<style scoped>
#header {
  width: 100%;
  height: 50px;
  box-sizing: border-box;
  padding-bottom: 20px;
  grid-column: 1/4;
  grid-row: 1/2;
  padding: 0px 20px;
  background-color: #fff;
  z-index: 1;
}

#topmenu {
  width: 100%;
  height: 50px;
  font-size: 20px;
  line-height: 43px;
  text-align: right;
  grid-column: 1/4;
  box-sizing: border-box;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

#menu {
  height: 100%;
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: center;
  margin: 0;
  padding: 0;
}

.menuItem {
  margin-right: 20px;
}
.menuItem:last-child {
  margin-right: 0px;
}
.menuItem .menuLink {
  text-decoration: none;
  color: #000;
}

.menuItem .menuLink:hover {
  text-decoration: none;
  color: coral;
  position: relative;
}

/*.menuItem .menuLink::after {
  transition: width 10s;
}
*/
.menuItem .menuLink:hover::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 2rem;
  border-bottom: 2px solid red;
  width: 100%;
  -webkit-transition: all 3s;
    transition: all 3s;
}


#btn_downloadCV{
  justify-content: flex-end;
}

@media screen and (max-width: 560px) {
  #header {
    height: 0;
    position: relative;
  }

  #topmenu{
    flex-direction: column;
    overflow: hidden;
    z-index: 100;
    position: absolute;
    left: 0;
    background-color: aliceblue;
    display: none;
  }

  #menu {
    flex-direction: column;
    border: 0px solid red;
    align-items: flex-start;
  }
}

@media screen and (max-width: 320px) {
  #topmenu{
    flex-direction: column;
    font-size: 1em;
  }
}
</style>
