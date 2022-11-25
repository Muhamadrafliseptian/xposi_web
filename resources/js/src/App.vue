<template>
    <!-- HEADER-->
    <app-header/>

    <router-view/>

    <app-footer/>
    <!-- END -->
</template>

<script>
import Header from "@/views/partials/HeaderComponent.vue";
import Footer from "@/views/partials/FooterComponent.vue";
export default {
    name: "Application",
    components: {
        "app-header": Header,
        "app-footer": Footer,
    },
};
</script>
