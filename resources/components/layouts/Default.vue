<template>
    <Header />
    <main>
        <router-view />
    </main>
    <Footer />
</template>

<script>
import Header from "../utils/Header"
import Footer from "../utils/Footer"

export default {
    components: {
        Header,
        Footer
    }
}
</script>