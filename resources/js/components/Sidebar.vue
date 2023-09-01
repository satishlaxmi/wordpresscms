<template>
  <aside class="admin-sidebar" :class="{ 'collapsed': isCollapsed }">
    <div class="sidebar-header">
      <h4>Dashboard</h4>
      <button @click="toggleSidebar" class="toggle-button">
        <i class="fa fa-bars"></i>
      </button>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li><router-link to="/dashboard">Dashboard</router-link></li>
        <li>
          <select id="postdropdown_sidebar" class="form-control" v-model="selectedCategory">
            <option value="posts">Posts</option>
            <option value="allpost">All Posts</option>
            <option value="addnew">Add New</option>
            <option value="category">Category</option>
            <option value="tag">Tag</option>
            <!-- Add more categories as needed -->
          </select>
        </li>
        <li><router-link to="/media">Media</router-link></li>
        <!-- Add more sidebar links as needed -->
      </ul>
    </nav>
  </aside>
</template>

<script>
export default {
  name: 'Sidebar',
  data() {
    return {
      isCollapsed: false,
      selectedCategory: 'posts'
    };
  },
  methods: {
    toggleSidebar() {
      this.isCollapsed = !this.isCollapsed;
    },
    checkScreenWidth() {
      if (window.innerWidth <= 768) {
        this.isCollapsed = true;
      } else {
        this.isCollapsed = false;
      }
    }
  },
  watch: {
    selectedCategory(newValue) {
      if (newValue === 'allpost') {
        this.$router.push('/allpost');
      } else if (newValue === 'addnew') {
        this.$router.push('/addnew');
      } else if (newValue === 'category') {
        this.$router.push('/categories');
      } else if (newValue === 'tag') {
        this.$router.push('/tags');
      }
    }
  },
  mounted() {
    // Check the screen width on component mount
    this.checkScreenWidth();
    
    // Add a listener to check the screen width when the window is resized
    window.addEventListener('resize', this.checkScreenWidth);
  },
  beforeUnmount() {
    // Remove the resize listener when the component is unmounted
    window.removeEventListener('resize', this.checkScreenWidth);
  }
};
</script>

<style scoped>
.admin-sidebar {
  background-color: #222;
  color: #fff;
  width: 150px;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  transition: transform 0.3s;
}

@media (max-width: 768px) {
  .admin-sidebar.collapsed {
    transform: translateX(-100%);
  }
}

.sidebar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid #333;
}

.toggle-button {
  background: none;
  border: none;
  color: #fff;
  cursor: pointer;
  font-size: 1.5rem;
}

.sidebar-nav {
  padding: 20px;
}

.sidebar-nav ul {
  list-style: none;
  padding: 0;
}

.sidebar-nav ul li {
  margin-bottom: 15px;
}

a {
  color: #fff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>
  