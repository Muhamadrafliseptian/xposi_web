<template>
    <section id="features">
        <div
            class="container"
            id="hanging-icons"
            data-aos-duration="2000"
            data-aos="fade-up"
        >
            <h2 class="pb-2 border-bottom mb-5">Features On Apps</h2>
            <div class="row g-4 row-cols-1 row-cols-lg-3">
                <template v-if="dataFeatures.length">
                    <div
                        class="col d-flex align-items-start"
                        v-for="(features, index) in dataFeatures"
                        :key="index"
                    >
                        <div
                            class="d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3"
                        >
                            <i class="fas fa-user mt-2"></i>
                        </div>
                        <div>
                            <h3 class="fs-2">{{ features.title_features }}</h3>
                            <p>
                                {{ features.description_features }}
                            </p>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <center v-if="spinner">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">...</span>
                        </div>
                    </center>
                    <div class="col-md-12" v-if="output">
                        <div class="alert alert-danger text-center">
                            <i>
                                <strong>
                                    Maaf, Data Anda Belum Tersedia
                                </strong>
                            </i>
                        </div>
                    </div>
                </template>
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
