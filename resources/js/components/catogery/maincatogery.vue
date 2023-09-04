<template>
  <div class="container ">
    <h4 class="text-center mb-2">Categories</h4>
    <div class="row d-flex justify-content-left ">
      <div class="col-md-8 offset-md-2">
        <form @submit.prevent="addCategory" id="add_catogery" class="bg-white p-4 rounded shadow">
          <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" id="name" class="form-control" @keyup="slugMaker" v-m  odel="category.name">
            <span class="text-danger" v-if="validationErrors.name">{{ validationErrors.name.toString() }}</span>
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" id="slug" class="form-control" v-model="category.slug">
            <span class="text-danger" v-if="validationErrors.slug">{{ validationErrors.slug.toString() }}</span>

          </div>
          <div class="mb-3">
            <label for="parent" class="form-label pe-2 "> Parent  </label>
            <select name="parent" id="parent" v-model="category.parent">
              <option v-for="categoryItem in catogerylist" :key="categoryItem.name" :value="categoryItem.name">
                {{ categoryItem.name }}
              </option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Add Category</button>
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
      validationErrors: {},
      catogerylist: [],
      category: {
        name: '',
        slug: '',
        parent: '',
      },
    };
  },
  methods: {
    slugMaker() {
    this.category.slug = this.category.name.toLowerCase().replace(/\s+/g, '-');
    console.log(this.category);
  },
    getCatogery() {
      axios
        .get('http://localhost:8000/api/catogery/get')
        .then(response => {
          this.catogerylist = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addCategory() {
      axios
        .post('http://localhost:8000/api/catogery/add', this.category, {
          headers: {
            'Content-Type': 'application/json',
          },
        })
        .then(response => {
          // Handle success, e.g., redirect to the category page
          this.category.slug = " ";
          this.category.name=" ";
          this.$router.push({ name: 'category', params: { id: response.data.id } });
          
        })
        .catch(error => {
          if (error.response.status === 422) {
        // Validation failed, populate validationErrors object
        this.validationErrors = error.response.data.errors;
      } else {
        console.log(error);
      }
          console.log(error);
        });
    },
  },
  mounted() {
    // Call the getCatogery method when the component is mounted
    this.getCatogery();
  },
};
</script>
