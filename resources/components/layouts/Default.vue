<template>
    <Header />
    <slot />
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