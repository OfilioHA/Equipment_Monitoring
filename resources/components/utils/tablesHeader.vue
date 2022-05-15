<template>
  <div>
    <h2>
        <em class="pi pi-fw pi-server"></em>
        {{title}}
    </h2>
    <Divider />
    <div class="tb-header-bottom">
        <Button 
            v-if="dialog != undefined"
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

<style scoped>
.tb-header-bottom{
    height: 36.4px;
}
</style>