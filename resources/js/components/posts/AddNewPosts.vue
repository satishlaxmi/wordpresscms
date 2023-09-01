<template>
    <div class="container mt-5">
      <h2 class="text-center">Add New Post</h2>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <form @submit.prevent="addPost" class="bg-white p-4 rounded shadow">
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" class="form-control" v-model="post.title">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
              <textarea id="description" class="form-control" rows="6" v-model="post.description"></textarea>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="tag" class="form-label">Tag</label>
                <textarea id="tag" class="form-control" rows="1" v-model="post.tag"></textarea>
              </div>
              <div class="col">
                <label for="categories" class="form-label">Categories</label>
                <select id="categories" class="form-control" v-model="post.categories" multiple>
                <option value="category1">Cate  gory 1</option>
                <option value="category2">Category 2</option>
                <option value="category3">Category 3</option>
              </select>
              </div>
          </div>
          <div class="mb-3">
          <label for="featureImage" class="form-label">Feature Image</label>
          <input type="file" id="featureImage" class="form-control-file" @change="handleImageUpload">
            <img
              v-if="post.featureImage"
              :src="post.featureImage"
              alt="Feature Image"
              class="mt-2 img-fluid"
              style="max-width: 200px; max-height: 200px;" 
            >
        </div>
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
        description: '',
        tag: '',
        categories: [],
        featureImageFile: null, // Add a property for the image file
      },
    };
  },
  methods: {
    addPost() {
      // Create a FormData object and append form data
      const formData = new FormData();
      formData.append('title', this.post.title);
      formData.append('description', this.post.description);
      formData.append('tag', this.post.tag);
      formData.append('categories', JSON.stringify(this.post.categories));
      formData.append('featureImage', this.post.featureImageFile); // Append the image file

      axios
        .post('http://localhost:8000/api/post/add', formData, {
          headers: {
            'Content-Type': 'multipart/form-data', // Set the content type for FormData
          },
        })
        .then(response => {
          this.$router.push({ name: 'home' });
        })
        .catch(error => {
          console.log(error);
        });
    },
    handleImageUpload(event) {
      const selectedFile = event.target.files[0];
      if (selectedFile) {
        this.post.featureImageFile = selectedFile; // Store the selected image file
        this.post.featureImage = URL.createObjectURL(selectedFile); // Display a preview
      }
    },
  },
};
</script>
