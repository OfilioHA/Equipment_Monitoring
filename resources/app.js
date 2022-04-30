import { createApp } from "vue";
import App from "./App.vue";
const app = createApp(App);

import { router } from "./routes";
app.use(router);

import PrimeVue from "primevue/config";
import ToastService from 'primevue/toastservice';
import ConfirmationService from 'primevue/confirmationservice';
app
    .use(PrimeVue)
    .use(ToastService)
    .use(ConfirmationService)


app.mount('#app');