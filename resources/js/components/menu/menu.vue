<template>
    <div class="container d-flex justify-content-center">
      <div class="col-md-4">
        <h3 class="text-center">Posts</h3>
        <draggable v-model="post" tag="ul" group="meals">
          <template #item="{ element: postItem }">
            <div class="col-10 border border-2 text-center">{{ postItem }}</div>
          </template>
        </draggable>
      </div>
      <div class="col-md-4">
        <h3 class="text-center">Menu Labels</h3>
        <draggable v-model="menu" tag="ul" group="meals">
          <template #item="{ element: menuItem }">
            <div class="col-10 border border-2 text-center">{{ menuItem }}</div>
          </template>
        </draggable>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
          <button class="btn btn-primary me-md-2" type="button" @click="getMenu">Load Data</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import draggable from 'vuedraggable';
  import axios from 'axios';
  
  export default {
    data() {
      return {
        post: [],
        menu: [],
      };
    },
    methods: {
      getMenu() {
        axios
          .get('http://localhost:8000/api/catogery/add')
          .then(response => {
            console.log(response.data);
            /* this.post = response.data.posts;
            this.menu = response.data.menu; */
          })
          .catch(error => {
            console.log(error);
          });
      },
    },
    // Use the created lifecycle hook to load data when the component is created
    created() {
      this.getMenu();
    },
  };
  </script>
  