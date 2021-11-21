<template>
  <div id="recent-post">
    <h3 class="title-element">RECENT POSTS</h3>
    <div class="container px-4">
      <div class="row gx-5">
        <div class="col" v-for="post in posts" v-bind:key="post.id" >
          <div class="p-3 border bg-light">
            <a href="#" class="link-title"><h3>{{post.title}}</h3></a>
            <p class="datetime">{{post.date}} | {{post.category}}</p>
            <p class="description">{{post.description}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: [
        {
          id: 1,
          title: 'Table trong HTML',
          date: '12/10/2021',
          category: 'HTML',
          description: 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.'
        },
        {
          id: 2,
          title: 'What is CSS',
          date: '12/10/2021',
          category: 'HTML',
          description: 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.'
        }
      ]
    }
  },
}
</script>

<style scoped>
  #recent-post{
    width: 100%;
    height: 400px;
    box-sizing: border-box;
    border: 1px solid blue;
  }
  .content{
    width: 80%;
    margin: 0 auto;
  }
</style>