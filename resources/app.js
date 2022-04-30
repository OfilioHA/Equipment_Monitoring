import { createApp } from "vue";
import App from "./App.vue";
const app = createApp(App);

import PrimeVue from "primevue/config";
import ToastService from 'primevue/toastservice';
import ConfirmationService from 'primevue/confirmationservice';
app
    .use(PrimeVue)
    .use(ToastService)
    .use(ConfirmationService)


app.mount('#app');