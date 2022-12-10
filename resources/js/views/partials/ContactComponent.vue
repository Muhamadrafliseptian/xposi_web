<template>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-duration="2000">
            <header class="section-header">
                <h2>Contact Us</h2>
            </header>
            <div class="row gy-4">
                <div
                    class="col-lg-6"
                    v-for="(profile_company, index) in dataCompany"
                    :key="index"
                >
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>
                                    {{ profile_company.company_address }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>
                                    {{ profile_company.company_phone_number }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>
                                    {{ profile_company.company_email }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br />9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form
                        method="post"
                        class="php-email-form"
                        @submit.prevent="sendmessage"
                    >
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Your Name"
                                    required
                                    v-model="message.name"
                                    id="name"
                                />
                            </div>

                            <div class="col-md-6">
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Your Email"
                                    required
                                    v-model="message.email"
                                    id="email"
                                />
                            </div>

                            <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="subject"
                                    placeholder="Subject"
                                    required
                                    v-model="message.subject"
                                    id="subject"
                                />
                            </div>

                            <div class="col-md-12">
                                <textarea
                                    class="form-control"
                                    name="text"
                                    rows="6"
                                    placeholder="Message"
                                    required
                                    v-model="message.text"
                                    id="text"
                                ></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>

                                <button type="submit">
                                    <span v-if="loading">
                                        <i> Form Is Proccessing</i>
                                    </span>
                                    <span v-else> Send Message </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import axios from "axios";
export default {
    name: "Contact",
    data() {
        return {
            dataCompany: [],
            message: [],
            loading: false,
        };
    },
    created() {
        this.getCompany();
    },
    methods: {
        async getCompany() {
            try {
                const response = await axios.get("profile_company");
                this.dataCompany = response.data;
            } catch (error) {
                console.log("Oopss. Error");
            }
        },
        sendmessage() {
            if (
                this.message.name &&
                this.message.email &&
                this.message.subject &&
                this.message.text
            ) {
                axios
                    .post("message", {
                        message_name: this.message.name,
                        message_email: this.message.email,
                        message_subject: this.message.subject,
                        message_text: this.message.text,
                    })
                    .then((response) => {
                        this.loading = true;
                        setTimeout(() => {
                            this.loading = false;
                            alert("Data Berhasil di Tambahkan");
                            window.location = "/";
                        }, 1000);
                    })
                    .catch((error) => {
                        alert("Harap Isi Form Dengan Benar");
                    });
            }
        },
    },
};
</script>
