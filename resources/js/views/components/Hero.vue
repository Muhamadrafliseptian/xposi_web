<template>
    <section id="hero" class="hero">
        <div
            class="container col-xxl-10 py-5"
            data-aos="fade-up"
            data-aos-duration="2000"
        >
            <div
                class="row flex-lg-row-reverse align-items-center g-5"
                v-for="(hero, index) in dataHero"
                :key="index"
            >
                <div class="col-10 col-sm-8 col-lg-6">
                    <img
                        :src="hero.image_hero"
                        class="d-block mx-lg-auto img-fluid"
                        alt="Bootstrap Themes"
                        width="700"
                        height="500"
                        loading="lazy"
                    />
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">
                        {{ hero.title_hero }}
                    </h1>
                    <p class="lead">
                        {{ hero.description_hero }}
                    </p>
                    <div class="text-center text-lg-start">
                        <a
                            href=""
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center"
                        >
                            <span>Get Started</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from "axios";
export default {
    name: "Hero",
    data() {
        return {
            dataHero: [],
        };
    },
    created() {
        this.getHero();
    },
    methods: {
        async getHero() {
            try {
                const response = await axios.get("hero");
                this.dataHero = response.data;
            } catch (error) {
                console.log("Oopss. Error");
            }
        },
    },
};
</script>
