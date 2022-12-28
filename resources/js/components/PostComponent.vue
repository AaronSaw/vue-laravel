<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create new post</div>
          <div class="card-body">
            <p id="success"></p>
            <form @submit.prevent="addNewPost">
              <input type="text" name="title" v-model="newPost" />
              <input type="submit" value="Submit" />
            </form>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>id</th>
                  <th>title</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="post in posts"
                  :key="post.id"
                >
                  <td>{{ post.id }}</td>
                  <td  @dblclick="deletePost(post.id)">{{ post.title }}</td>
                </tr>
              </tbody>
            </table>
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
      newPost: "",
      posts: [],
    };
  },
  mounted() {
    this.getPost();
  },
  methods: {
    async getPost() {
      await axios
        .get("/post")
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => {
          consol.log(error);
          this.posts = [];
        });
    },
    addNewPost(event) {
      axios.post("/post", { title: this.newPost }).then((response) => {
        $("#success").html(response.data.message);
        this.newPost = "";
        this.getPost();
      });
    },
    deletePost(id){
        axios.delete(`/post/${id}`).then((response)=>{
             $("#success").html(response.data.message);
             this.getPost();
        })
    }
  },
};
</script>
