<template>
  <div id="footer">
    <div id="btn_downloadCV">
      <button type="button" class="btn btn-success">DOWNLOAD MY FULL CV</button>
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
export default {
  
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#footer{
  grid-row: 7/8;
  grid-column: 1/4;
  margin-top: 10px;
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
