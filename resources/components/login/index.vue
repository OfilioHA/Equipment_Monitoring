<template>
  <div class=" h-full grid grid-nogutter justify-content-center align-items-center">
    <div class="md:col-3">
      <Form />
    </div>
  </div>
</template>

<script>
import Form from "./form.vue";

export default {
  components: {
    Form,
  },
};
</script>


<style scoped>
.h-full {
  min-height: 100vh;
}
</style>