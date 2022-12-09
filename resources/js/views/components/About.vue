<template>
    <section id="about">
        <div
            class="container col-xxl-10 px-4 py-5"
            data-aos="fade-up"
            data-aos-duration="2000"
        >
            <div
                class="row flex-lg-row-reverse align-items-center g-5 py-5"
                v-for="(about, index) in dataAbout"
                :key="index"
            >
                <div class="col-10 col-sm-8 col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3 text-primary">
                        {{ about.title_about }}
                    </h1>
                    <p class="lead">
                        {{ about.description_about }}
                    </p>
                </div>
                <div class="col-lg-6">
                    <img
                        :src="about.image_about"
                        class="d-block mx-lg-auto img-fluid"
                        alt="Bootstrap Themes"
                        width="700"
                        height="500"
                        loading="lazy"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from "axios";
export default {
    name: "About",
    data() {
        return {
            dataAbout: [],
        };
    },
    created() {
        this.getAbout();
    },
    methods: {
        async getAbout() {
            try {
                const response = await axios.get("about");
                this.dataAbout = response.data;
            } catch (error) {
                console.log("Oopss. Error");
            }
        },
    },
};
</script>
