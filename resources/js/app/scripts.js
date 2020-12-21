import 'bootstrap';
import '../navbar';
import './toasts';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent';

// init Vue
createApp({
    components: {
        ExampleComponent,
    }
}).mount("#app")
