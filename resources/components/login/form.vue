<template>
    <Card
        title="Monitoreo"
    >
        <template #content>
            <form class="from-grid grid grid-nogutter">
                <div class="fieldset">
                    <label for=""></label>
                    <InputText 
                        type="text"
                        v-model="username"
                    />
                </div>
            </form>
        </template>
    </Card>
</template>

<script>
import Card from "primevue/card";
import InputText from "primevue/inputtext";
import { ref } from "vue";

export default {
    components: {
        Card,
        InputText
    },
    setup() {
        const username = ref('');

        return { 
            username
        }
    },
}
</script>