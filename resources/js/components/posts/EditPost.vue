<template>
    <div>
        <h3 class="text-center">Edit Post</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updatePost">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="post.title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="post.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
import axios from 'axios'; // Import axios

export default {
    data() {
        return {
            post: {}
        }
    },
    created() {
        axios
            .get(`http://localhost:8000/api/post/edit/${this.$route.params.id}`)
            .then((response) => {
                this.post = response.data;
            });
    },
    methods: {
        updatePost() {
            axios
                .post(`http://localhost:8000/api/post/update/${this.$route.params.id}`, this.post)
                .then((response) => {
                    this.$router.push({ name: 'home' });
                });
        }
    }
};
</script>
