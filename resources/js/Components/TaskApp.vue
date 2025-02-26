<template>
    <div class="container d-flex mt-5">
        <!-- Left Side: Task Form -->
        <div class="w-50 p-4">
            <h4 class="fw-bold">Add a Task</h4>
            <form @submit.prevent="addTask">
                <input v-model="title" class="form-control mb-2" placeholder="Title" required />
                <textarea v-model="description" class="form-control mb-2" placeholder="Description"></textarea>
                <button class="btn btn-primary w-100" type="submit">Add</button>
            </form>
        </div>

        <!-- Vertical Divider -->
        <div class="border-end"></div>

        <!-- Right Side: Task List -->
        <div class="w-50 p-4">
            <ul class="list-unstyled">
                <li v-for="task in tasks" :key="task.id" class="task-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold">{{ task.title }}</h5>
                        <p class="mb-0">{{ task.description }}</p>
                    </div>
                    <button class="btn btn-outline-dark" @click="markComplete(task.id)">Done</button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            tasks: [],
            title: '',
            description: ''
        };
    },
    mounted() {
        this.fetchTasks();
    },
    methods: {
        fetchTasks() {
            axios.get('/api/tasks').then(response => {
                this.tasks = response.data;
            });
        },
        addTask() {
            axios.post('/api/tasks', { title: this.title, description: this.description }).then(() => {
                this.title = '';
                this.description = '';
                this.fetchTasks();
            });
        },
        markComplete(id) {
            axios.put(`/api/tasks/${id}`, { completed: 1 }).then(() => {
                this.fetchTasks();
            });
        }
    }
};
</script>

<style scoped>
.container {
    max-width: 900px;
    margin: auto;
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}
.task-item {
    background: #d1d1d1;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 10px;
}
</style>
