<template>
    <div id="app">
      <Header />
      <div class="main-content">
        <Sidebar />
        <div class="content">
          <div class="container">
            <router-view></router-view>
          </div>
        </div>
      </div>
    <!--   <Footer /> -->
    </div>
  </template>
  
  <script>
  import Header from './Header.vue';
  import Sidebar from './Sidebar.vue';
  import Footer from './footer.vue';
  
  export default {
    name: 'App',
    components: {
      Header,
      Sidebar,
      Footer,
    },
  };
  </script>
  
  <style>
  /* Add global styles if needed */
  .main-content {
    display: flex;
  }
  
  .content {
    flex-grow: 1;
    padding: 20px;
  }
  </style>
  