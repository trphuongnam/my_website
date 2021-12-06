<template>
  <div id="app">
    <div id="wrapper">
      <Header></Header>
      <Info></Info>
      <Slide></Slide>
      <Skill></Skill>
      <Contact></Contact>
      <Map></Map>
      <Footer></Footer>
    </div>
  </div>
</template>

<script>
import Header from "@/components/elements/Header.vue";
import Info from "@/components/elements/Info.vue";
import Slide from "@/components/elements/Slide.vue";
import Skill from "@/components/elements/Skill.vue";
import Contact from "@/components/elements/Contact.vue";
import Map from "@/components/elements/Map.vue";
import Footer from "@/components/elements/Footer.vue";

export default {
  components: {
    Header,
    Info,
    Slide,
    Skill,
    Footer,
    Map,
    Contact,
  },
};
</script>
<style>
@import url("https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;500&display=swap");
@import url("assets/css/reset.css");

#app {
  font-family: Heebo, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background-image: radial-gradient(circle, #0058ff, #007cff, #0098ff, #00b0ff, #14c5f6);
  background-position: center;
  height: 100%;
  min-height: 100vh;
  background-size: 100%;
}
#wrapper {
  width: 100%;
  height: auto;
  margin: 0 auto;
  display: grid;
  grid-template-rows: auto 500px repeat(4, minmax(auto, auto));
  grid-template-columns: 1fr 3fr 1fr;
  /*padding: 20px 50px 50px 50px;*/
  box-shadow: #106ebf 0px 10px 7px 7px;
}
#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}

.title-element {
  font-size: 0.5rem;
  color: #000;
  grid-column: 2/3;
  grid-row: 1/2;
  text-align: left;
  position: relative;
  padding-top: 0.5em;
  margin-bottom: 10px;
}

.title-element h3{
  font-size: 2rem;
}

.title-element::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 2rem;
    border-bottom: 5px solid #df3143;
}

.link-title {
  text-decoration: none;
}

.title-element {
  font-weight: 500;
}

.description {
  font-weight: 200;
  text-align: justify;
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
  opacity: 0.5;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

@media screen and (min-width: 1200px){
  #wrapper {
    width: 1200px;
  }
}

@media only screen and (max-width: 768px){
  #wrapper {
    padding: 0 10px;
  }
}

@media only screen and (max-width: 600px){
  .title-element {
    margin-bottom: 20px;
  }
}


@media screen and (max-width: 230px){
  .title-element h3{
    font-size: 12vw;
  }  
}
</style>
