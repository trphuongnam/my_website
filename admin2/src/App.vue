<template>
  <router-view />
</template>

<style lang="scss">
// Import Main styles for this application
@import 'styles/style';
.margin_right_10 {
  margin-right: 10px;
}

.bgr_loading {
  background-color: rgba(0, 0, 0, 0.6);
  width: 100%;
  height: 100%;
  z-index: 100;
  position: absolute;
  top: 30%;
  left: 0;
}

.bgr_loading img {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
