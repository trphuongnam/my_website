<template>
  <header id="header">
    <nav id="topmenu">
      <ul id="menu">
        <li class="menuItem">
          <router-link to="/" tag="a" class="menuLink">Home</router-link>
        </li>
      </ul>
      <div id="btn_downloadCV">
        <button type="button" class="btn btn-success">DOWNLOAD MY FULL CV</button>
      </div>
    </nav>
  </header>
</template>

<script>
export default {};
</script>

<style scoped>
#header {
  width: 100%;
  height: 100px;
  box-sizing: border-box;
  padding-bottom: 20px;
  grid-column: 1/4;
  grid-row: 1/2;
}

#topmenu {
  width: 100%;
  height: 100px;
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

#btn_downloadCV{
  justify-content: flex-end;
}


@media screen and (max-width: 320px) {
  #header {
    height: auto;
  }

  #topmenu{
    flex-direction: column;
  }
}
</style>