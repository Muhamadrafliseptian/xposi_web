<template>
    <section id="event">
        <div
            class="container px-4 py-5"
            data-aos="fade-up"
            data-aos-duration="2000"
            id="custom-cards"
        >
            <h2 class="pb-2 border-bottom">Event Popular</h2>

            <div
                class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5"
            >
                <template v-if="dataEvent.length">
                    <div
                        class="col"
                        v-for="(event_newest, index) in dataEvent"
                        :key="index"
                    >
                        <div
                            class="card card-cover img-fluid h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg"
                            :style="{
                                'background-image':
                                    'url(' + event_newest.event_image + ')',
                            }"
                        >
                            <div
                                class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"
                            >
                                <h3
                                    class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"
                                >
                                    {{ event_newest.event_name }}
                                </h3>
                                <p>
                                    {{ event_newest.event_description }}
                                </p>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="me-auto">
                                        <img
                                            src="https://github.com/twbs.png"
                                            alt="Bootstrap"
                                            width="32"
                                            height="32"
                                            class="rounded-circle border border-white"
                                        />
                                    </li>
                                    <li class="d-flex align-items-center me-3">
                                        <svg
                                            class="bi me-2"
                                            width="1em"
                                            height="1em"
                                        >
                                            <use xlink:href="#geo-fill" />
                                        </svg>
                                        <small>{{
                                            event_newest.event_time
                                        }}</small>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="fas fa-calendar me-2"></i>
                                        <small>{{
                                            event_newest.event_date
                                        }}</small>
                                    </li>
                                </ul>
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
    name: "Event",
    data() {
        return {
            dataEvent: [],
            spinner: false,
            output: false,
        };
    },
    created() {
        this.getEvent();
    },
    methods: {
        async getEvent() {
            try {
                this.spinner = true;
                const response = await axios.get("event_newest");

                if (response.data == "Data Anda Belum Tersedia") {
                    setTimeout(() => {
                        this.output = true;
                        this.spinner = false;
                    }, 1000);
                } else {
                    setTimeout(() => {
                        this.dataEvent = response.data;
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
