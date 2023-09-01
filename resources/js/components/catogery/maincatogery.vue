<template>
    <div class="container mt-5">
      <h2 class="text-center">Catogery</h2>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form @submit.prevent="addPost" class="bg-white p-4 rounded shadow">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" class="form-control" v-model="post.title">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
              <textarea id="content" class="form-control" rows="6" v-model="post.content"></textarea>
            </div>
            <div class="mb-3">
              <label for="categories" class="form-label">Categories</label>
              <select id="categories" class="form-control" v-model="post.categories" multiple>
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <option value="category3">Category 3</option>
                <!-- Add more categories as needed -->
              </select>
            </div>
            <!-- Add more fields like tags, featured image, etc. -->
  
            <button type="submit" class="btn btn-primary">Publish</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        post: {
          title: '',
          content: '',
          categories: [] // Initialize an empty array for selected categories
        }
      };
    },
    methods: {
      addPost() {
        axios
          .post('http://localhost:8000/api/post/add', this.post)
          .then(response => {
            this.$router.push({ name: 'home' });
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  };
  </script>
  