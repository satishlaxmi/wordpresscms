<template>
  <div class="container">
    <h2 class="text-center">Media Library</h2>
    <div class="row d-flex justify-content-center">
      <div class="col-md-11">
        <div class="card">
          <div class="card- ">
            <div class="media-list">
              <div class="row">
                <!-- Loop through mediaItems in groups of 5 -->
                <div
                  class="col-md-3 "
                  v-for="media in mediaItems"
                  :key="media.id"
                >
                  <div class="media-item">
                    <img :src="media.url" :alt="media.name" class="media-thumbnail img-fluid" >
                    <div class="media-info">
                      <div class="media-title">{{ media.name }}</div>
                      <div class="media-actions">
                        <button class="btn btn-sm btn-secondary">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of media items loop -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        mediaItems: []
      };
    },
    mounted() {
      this.fetchMediaItems();
    },
    methods: {
      fetchMediaItems() {
        axios.get('http://localhost:8000/api/media') // Replace with your API endpoint
          .then(response => {
            this.mediaItems = response.data;
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  };
  </script>
  
  <style scoped>
  /* Your styles here */
  </style>
  