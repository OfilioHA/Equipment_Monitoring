<template>
  <Card>
    <template #title> Monitoreo </template>
    <template #content>
      <form class="from-grid grid grid-nogutter">
        <div class="field col-12">
          <label for="login-username">Usuario</label>
          <InputText
            id="login-username"
            type="text"
            v-model="username"
            class="inputfield w-full"
          />
        </div>
        <div class="field col-12">
          <label for="login-password">Contraseña</label>
          <Password
            id="login-password"
            class="inputfield w-full"
            v-model="password"
            :feedback="false"
            toggleMask
          />
        </div>
        <div class="col-12">
          <Button
            label="Ingresar"
            type="submit"
            
          />
        </div>
      </form>
    </template>
  </Card>
</template>

<script>
import Card from "primevue/card";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import { ref } from "vue";

export default {
  components: {
    Card,
    InputText,
    Password,
    Button
  },
  setup() {
    const username = ref("");
    const password = ref("");

    return {
      username,
      password,
    };
  },
};
</script>

<style>
#login-password {
  width: 100% !important;
}
</style>