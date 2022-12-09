<template>
    <!-- HEADER-->
    <app-header />

    <app-hero />

    <main id="main">
        <app-about />
        <app-features />
        <app-book />
        <app-event />
        <app-gallery />
    </main>
    <app-contact />
    <!-- END -->
</template>

<script>
import Header from "@/views/partials/HeaderComponent.vue";
import Hero from "@/views/components/Hero.vue";
import About from "@/views/components/About.vue";
import Features from "@/views/components/Features.vue";
import Book from "@/views/components/Book.vue";
import Event from "@/views/components/Event.vue";
import Gallery from "@/views/components/Gallery.vue";
import Contact from "@/views/partials/ContactComponent.vue";
export default {
    name: "App",
    components: {
        "app-header": Header,
        "app-hero": Hero,
        "app-about": About,
        "app-features": Features,
        "app-book": Book,
        "app-event": Event,
        "app-gallery": Gallery,
        "app-contact": Contact,
    },
};
</script>
