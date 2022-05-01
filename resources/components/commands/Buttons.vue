<template>
  <div>
    <h3>Comandos Disponibles</h3>
    <Divider />
    <div>
      <Button 
        v-for="(commmand, index) in commands"
        :key="index"
        :label="commmand.line" 
        class="p-button-outlined"
      /> 
    </div>
  </div>
</template>

<script>
import Button from "primevue/button";
import Divider from "primevue/divider";
import { toRefs } from "vue";

export default {
  components: {
    Button,
    Divider,
  },
  props: {
    commands: {
      type: Array,
    },
  },
  setup(props) {
    const { commands } = toRefs(props);
  
    return {
      commands
    }
  },
};
</script>