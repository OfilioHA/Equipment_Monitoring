<template>
  <Button
    class="p-button-rounded p-button-info"
    icon="pi pi-user"
    aria-haspopup="true"
    aria-controls="config_menu"
    @click="toggle"
  />
  <Menu 
    id="config_menu" 
    ref="menu" 
    :model="items" 
    :popup="true">
  </Menu>
</template>

<script>
import Button from "primevue/button";
import Menu from "primevue/menu";
import { ref } from "vue";

export default {
  components: {
    Button,
    Menu,
  },
  setup() {
    const menu = ref();
    const items = ref([
      {
        label: "Configuraciones",
        items: [
          {
            label: "Salir",
            icon: "pi pi-fw pi-power-off",
          },
        ],
      },
    ]);

    const toggle = (event) =>{
        menu.value.toggle(event);
    }

    return {
      items,
      toggle,
      menu
    };
  },
};
</script>
