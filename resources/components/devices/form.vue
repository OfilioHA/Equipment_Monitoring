<template>
  <Dialog
    v-model:visible="show.state"
    header="Agregar Dispositvo"
    :draggable="false"
    :breakpoints="{'960px': '75vw'}" 
    :style="{width: '50vw'}"
    modal
  >
    <form class="form-grid grid">
      <div class="field md:col-6 col-12">
        <label for="device-username">Usuario</label>
        <InputText 
            id="device-username"
            class="inputfield w-full" 
            type="text" 
            v-model="username" 
        />
      </div>
      <div class="field md:col-6 col-12">
        <label for="device-password">Contraseña</label>
        <Password 
            id="device-password" 
            class="inputfield w-full"
            v-model="password" 
            :feedback="false"
            toogleMask
        />
      </div>
      <div class="field md:col-6 col-12">
        <label for="device-ip">Dirección IP</label>
        <InputText 
            id="device-ip"
            class="inputfield w-full" 
            type="text" 
            v-model="ip" 
        />
      </div>
      <div class="field md:col-6 col-12">
        <label for="device-mask">Máscara</label>
        <InputText 
            id="device-mask"
            class="inputfield w-full" 
            type="text" 
            v-model="mask" 
        />
      </div>
    </form>
  </Dialog>
</template>

<script>
import Dialog from "primevue/dialog";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import { reactive, toRefs } from "vue";

export default {
  props: {
    show: {
      type: Object,
      required: true,
    },
  },
  components: {
    Dialog,
    InputText,
    Password,
  },
  setup() {
    const form = reactive({
      username: "",
      password: "",
      ip: "",
      mask: "",
    });

    return {
      ...toRefs(form),
    };
  },
};
</script>

<style>
    .field label{
        display: block;
    }
    input[type="password"]{
        width: 100% !important;
    }

</style>