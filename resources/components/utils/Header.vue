<template>
  <header class="mb-5">
    <MenuBar>
      <template #start>
        <h2 class="my-0">Sistema de Monitoreo</h2>
      </template>
      <template #end>
        <ConfigMenu />
      </template>
    </MenuBar>
  </header>
</template>

<script>
import ConfigMenu from "./ConfigMenu";
import MenuBar from "primevue/menubar";
import { ref } from "vue";

export default {
  components: {
    MenuBar,
    ConfigMenu,
  },
  setup() {
    const menu = ref([
      {
        label: "Inicio",
        icon: "pi pi-fw pi-home",
      },
      {
        label: "Dispositivos",
        icon: "pi pi-fw pi-server",
        items: [
          {
            label: "Agregar",
            icon: "pi pi-fw pi-plus",
          },
          {
            label: "Listar",
            icon: "pi pi-fw pi-bars",
          },
        ],
      },
    ]);

    return {
      menu,
    };
  },
};
</script>