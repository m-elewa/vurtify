import 'bootstrap'
import '../navbar'
import './toasts'
import { createApp } from 'vue'
import UpdateProfile from './components/UpdateProfile'
import UserProfileLink from './components/UserProfileLink'
import UpdateProfilePhoto from './components/UpdateProfilePhoto'
import store from '../store'
// vue toastification
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

// init Vue 3
const app = createApp({
    components: {
        UpdateProfile,
        UserProfileLink,
        UpdateProfilePhoto,
    }
})

app.use(Toast);
app.use(store)

app.mount("#app")
