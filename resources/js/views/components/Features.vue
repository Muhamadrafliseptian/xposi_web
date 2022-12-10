<template>
    <section id="features" class="features">
        <div class="container">
            <div
                class="row feature-icons"
                data-aos="fade-up"
                data-aos-duration="2000"
            >
                <h3>Ratione mollitia eos ab laudantium rerum beatae quo</h3>
                <div class="row">
                    <div
                        class="col-xl-4 text-center"
                        data-aos="fade-right"
                        data-aos-duration="2000"
                    >
                        <img
                            src="assets/img/features-3.png"
                            class="img-fluid p-4"
                            alt=""
                        />
                    </div>
                    <template v-if="dataFeatures.length">
                        <div class="col-xl-8 d-flex content">
                            <div class="row align-self-center gy-4">
                                <div
                                    class="col-md-6 icon-box"
                                    data-aos="fade-up"
                                    data-aos-duration="2000"
                                    v-for="(features, index) in dataFeatures"
                                    :key="index"
                                >
                                    <i :class="features.icon_features"></i>
                                    <div>
                                        <h4>{{ features.title_features }}</h4>
                                        <p>
                                            {{ features.description_features }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from "axios";
export default {
    name: "Features",
    data() {
        return {
            dataFeatures: [],
            spinner: false,
            output: false,
        };
    },
    created() {
        this.getFeatures();
    },
    methods: {
        async getFeatures() {
            try {
                this.spinner = true;
                const response = await axios.get("features");

                if (response.data == "Data Anda Belum Tersedia") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataFeatures = response.data;
                        this.spinner = false;
                    }, 1000);
                }
            } catch (error) {
                console.log("Oopss. Error");
            }
        },
    },
};
</script>
