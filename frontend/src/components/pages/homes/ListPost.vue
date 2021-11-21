<template>
  <div id="list-post">
    <h3 class="title-element">LIST POSTS</h3>
    <div class="container">
      <div class="row g-2">
        <div class="col-6" v-for="post in posts" v-bind:key="post.id" >
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
        },
        {
          id: 3,
          title: 'What is CSS',
          date: '12/10/2021',
          category: 'HTML',
          description: 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.'
        },
        {
          id: 4,
          title: 'What is CSS',
          date: '12/10/2021',
          category: 'HTML',
          description: 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.'
        },
        {
          id: 5,
          title: 'What is CSS',
          date: '12/10/2021',
          category: 'HTML',
          description: 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.'
        },
        {
          id: 6,
          title: 'What is CSS',
          date: '12/10/2021',
          category: 'HTML',
          description: 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.'
        }
      ]
    }
  }
}
</script>

<style scoped>
  #list-post{
    width: 100%;
    height: 400px;
    border: 1px solid blue;
    box-sizing: border-box;    
    grid-column: 1/4;
    grid-row: 4/5;
  }

  .content{
    width: 80%;
    margin: 0 auto;
  }
</style>