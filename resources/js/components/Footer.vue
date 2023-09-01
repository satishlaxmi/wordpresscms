<template>
  <footer class="admin-footer">
    <p>&copy; 2023 Your Admin Panel. All rights reserved.</p>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
};
</script>

<style scoped>
.admin-footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px;

  /* Add responsive styles */
  @media (max-width: 768px) {
    padding: 20px;
  }
}
</style>
