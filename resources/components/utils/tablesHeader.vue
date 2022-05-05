<template>
  <div>
    <h3>
        <em class="pi pi-fw pi-server"></em>
        {{title}}
    </h3>
    <Divider />
    <div>
        <Button 
            icon="pi pi-plus"
            label="Agregar"
            @click="toggleDialog"
        />
    </div>
  </div>
</template>

<script>
import Divider from "primevue/divider";
import Button from "primevue/button";
import { toRefs } from "vue";

export default {
    components: {
        Divider,
        Button
    },
    props: {
        title: {
            type: String,
            required: true,
        },
        dialog: {
            type: Object,
            required: true
        }
    },
    setup(props){
        const { dialog } = toRefs(props);

        const toggleDialog = () =>{
            dialog.value.state = !dialog.value.state
        }

        return {
            toggleDialog
        }
    },
}
</script>