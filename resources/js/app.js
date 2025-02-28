import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { createApp } from 'vue';


import TaskList from './components/TaskList.vue';

createApp(TaskList).mount('#app');
