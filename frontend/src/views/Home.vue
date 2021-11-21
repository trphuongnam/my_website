<template>
  <div class="home">
    <RecentPost/>
    <ListPost/>
  </div>
</template>

<script>
import RecentPost from '@/components/pages/homes/RecentPost.vue'
import ListPost from '@/components/pages/homes/ListPost.vue'

export default {
  name: 'Home',
  components: {
    RecentPost,
    ListPost
  }
}
</script>
<style scoped>
  .home{
    padding: 0px 20px;
    background-color: #EDF7FA;
    width: 100%;
    grid-column: 1/4;
    grid-row: 3/4;
  }
</style>