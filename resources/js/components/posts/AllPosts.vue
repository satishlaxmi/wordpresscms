
<template>
    <div class="page-content">
      <h3 class="text-center">All Posts</h3><br/>
      <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="post in posts" :key="post.id">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.description }}</td>
                <td>{{ post.created_at }}</td>
                <td>{{  post.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit</router-link>
                        <button class="btn btn-danger" @click="deletePost(post.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>      
        </table>
    </div>
  </template>
  
  <script>
  
  import axios from 'axios'; // Import axios

export default {
    data() {
        return {
            posts: []
        };
    },
    created() {
        axios
            .get('http://localhost:8000/api/posts')
            .then(response => {
                this.posts = response.data;
            });
    },
    methods: {
        deletePost(id) {
            axios
                .delete(`http://localhost:8000/api/post/delete/${id}`)
                .then(response => {
                    this.posts = this.posts.filter(post => post.id !== id);
                });
        }
    }
};
  </script>
  
  <style scoped>
  .page-content {
    display: flex;
    flex-direction: column;
    padding-left: 150px; /* Adjust this based on your sidebar width */
  }
  
  @media (max-width: 992px) {
    .page-content {
      padding-left: 0; /* Reset padding when sidebar is collapsed */
    }
  }
  </style>
  


