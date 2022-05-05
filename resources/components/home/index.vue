<template>
    <DefaultLayout>
        <main class="grid grid-nogutter justify-content-around">
            <Devices />
            <History />
        </main>
    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../layouts/Default";
import Devices from "../devices/list";
import History from "../history/list";

export default {
    components: {
        DefaultLayout, 
        Devices,
        History
    }
}
</script>