<template>
    <DefaultLayout>
        <main class="grid grid-nogutter mx-2">
            <Devices />
        </main>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../layouts/Default";
import Devices from "../devices/list";

export default {
    components: {
        DefaultLayout, 
        Devices
    }
}
</script>