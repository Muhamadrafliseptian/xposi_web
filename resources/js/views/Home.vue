<template>
    <app-hero />

    <main id="main">
        <app-about />

        <app-features />

        <app-event />

        <app-book />

        <app-gallery />

        <app-contact />
    </main>
</template>

<script>
import Hero from "@/views/components/HeroComponent.vue";
import About from "@/views/components/AboutComponent.vue";
import Features from "@/views/components/FeaturesComponent.vue";
import Event from "@/views/components/EventComponent.vue";
import Book from "@/views/components/BookComponent.vue";
import Gallery from "@/views/components/GalleryComponent.vue";
import Contact from "@/views/components/ContactComponent.vue";

export default {
    name: "Home",
    components: {
        "app-hero": Hero,
        "app-about": About,
        "app-features": Features,
        "app-event": Event,
        "app-book": Book,
        "app-gallery": Gallery,
        "app-contact": Contact,
    },
};
</script>
