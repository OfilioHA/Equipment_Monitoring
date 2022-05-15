<template>
  <div>
    <h3>Comandos Disponibles</h3>
    <Divider />
    <div>
      <Button 
        v-for="(command, index) in commands"
        :key="index"
        :label="command.nickname" 
        class="p-button-outlined"
        @click="execute(command)"
      /> 
    </div>
  </div>
</template>

<script>
import Button from "primevue/button";
import Divider from "primevue/divider";
import { ref, toRefs } from "vue";
import { useFetch } from "../../libs/useFetch";

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
    const loading = ref(false);

    const execute = async (command)=>{
      const { id } = command.pivot;
      const { data } = await useFetch(`commands/execute/${id}`, loading);

    } 

    return {
      commands,
      execute
    }
  },
};
</script>