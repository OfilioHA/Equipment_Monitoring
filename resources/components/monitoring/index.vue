<template>
  <DefaultLayout>
    <main class="grid mx-5">
      <div class="col-12" v-if="!loading">
        <h3>Dirección: {{ computer.ip }}</h3>
        <Divider />
      </div>
      <div class="col-4" v-for="(command, key) in computer.commands" :key="key">
        <Card class="p-card-custom-my">
          <template #title>
            <div class="flex justify-content-between align-items-center">
              {{ command.name }}
              <Badge :severity="command.state ? 'success' : 'danger'">
                {{ command.state ? "¡Exitoso!" : "¡Error!" }}
              </Badge>
            </div>
            <Divider />
          </template>
          <template #content>
            <p class="mt-0">
              {{ command.output }}
            </p>
          </template>
        </Card>
      </div>
    </main>
  </DefaultLayout>
</template>


<script>
import DefaultLayout from "../layouts/Default.vue";
import Card from "primevue/card";
import Divider from "primevue/divider";
import Badge from "primevue/badge";
import { useRoute } from "vue-router";
import { onMounted, ref, onBeforeUnmount } from "vue";
import { useFetch } from "../../libs/useFetch";

export default {
  components: {
    DefaultLayout,
    Card,
    Divider,
    Badge,
  },
  setup() {
    const {
      params: { id },
    } = useRoute();

    const interval = ref(null);
    const loading = ref(true);
    const computer = ref({
      ip: "",
      commands: [],
    });
    const time = 5;

    onMounted(async () => {
      interval.value = setInterval(async () => {
        const { data } = await useFetch(`monitoring/${id}`, loading);
        Object.assign(computer.value, data);
        const errors = data.commands.some((e)=> e.status);
        if(errors) clearInterval(interval.value);
      }, time * 1000);
    });

    onBeforeUnmount(() => clearInterval(interval.value));

    return {
      computer,
      loading
    };
  },
};
</script>

<style>
.p-card-custom-my .p-card-content {
  height: 200px;
  overflow: scroll;
  margin-right: -5px;
}
</style>