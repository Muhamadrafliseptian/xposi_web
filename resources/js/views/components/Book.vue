<template>
    <section id="book">
        <div class="" data-aos="fade-right" data-aos-duration="2000">
            <template v-if="dataBook.length">
                <div class="container">
                    <h2 class="pb-2 border-bottom pt-5">Features On Apps</h2>
                </div>
                <div class="container col-xxl-6 text-center py-5">
                    <div
                        class="row"
                        v-for="(how_book, index) in dataBook"
                        :key="index"
                    >
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ how_book.title_book }}
                                    </h5>
                                    <p class="card-text">
                                        {{ how_book.description_book }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                            <strong> Maaf, Data Anda Belum Tersedia </strong>
                        </i>
                    </div>
                </div>
            </template>
        </div>
    </section>
</template>
<script>
import axios from "axios";
export default {
    name: "Book",
    data() {
        return {
            dataBook: [],
            spinner: false,
            output: false,
        };
    },
    created() {
        this.getBook();
    },
    methods: {
        async getBook() {
            try {
                this.spinner = true;
                const response = await axios.get("how_book");

                if (response.data == "Data Anda Belum Tersedia") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataBook = response.data;
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
