<template>
    <section id="gallery">
        <div class="album py-5" data-aos="fade-up" data-aos-duration="2000">
            <div class="container">
                <template v-if="dataGallery.length">
                    <h2 class="pb-2 border-bottom mb-5">Gallery</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div
                            class="col"
                            v-for="(gallery, index) in dataGallery"
                            :key="index"
                        >
                            <div class="card shadow-sm">
                                <img
                                    :src="gallery.image_gallery"
                                    class="bd-placeholder-img card-img-top"
                                    width="100%"
                                    height="225"
                                    role="img"
                                    focusable="false"
                                    alt=""
                                />
                                <title>Placeholder</title>
                                <rect
                                    width="100%"
                                    height="100%"
                                    fill="#55595c"
                                />
                                <div class="card-body">
                                    <p class="card-title">
                                        {{ gallery.title_gallery }}
                                    </p>
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <small class="text-muted">{{
                                            gallery.created_at
                                        }}</small>
                                    </div>
                                </div>
                            </div>
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
    name: "Gallery",
    data() {
        return {
            dataGallery: [],
            spinner: false,
            output: false,
        };
    },
    created() {
        this.getGallery();
    },
    methods: {
        async getGallery() {
            try {
                this.spinner = true;
                const response = await axios.get("gallery");

                if (response.data == "Data Anda Belum Tersedia") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataGallery = response.data;
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
