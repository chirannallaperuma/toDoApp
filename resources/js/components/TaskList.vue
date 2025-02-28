<template>
    <div>
        <h1>Todo List</h1>
        <form @submit.prevent="addTask">
            <input v-model="title" placeholder="Title" required />
            <input v-model="description" placeholder="Description" required />
            <button type="submit">Add</button>
        </form>
        <ul>
            <li v-for="task in tasks" :key="task.id">
                <span>{{ task.title }} - {{ task.description }}</span>
                <button @click="completeTask(task.id)">Done</button>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return { tasks: [], title: '', description: '' };
    },
    methods: {
        fetchTasks() {
            axios.get('/api/tasks').then(res => this.tasks = res.data);
        },
        addTask() {
            axios.post('/api/tasks', { title: this.title, description: this.description })
                .then(() => { this.title = ''; this.description = ''; this.fetchTasks(); });
        },
        completeTask(id) {
            axios.put(`/api/tasks/${id}`).then(() => this.fetchTasks());
        }
    },
    created() {
        this.fetchTasks();
    }
};
</script>
