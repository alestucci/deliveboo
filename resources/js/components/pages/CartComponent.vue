<template>
    <div>
        <h1>CARRELLO</h1>
        <router-link
            :to="{
                name: 'PaymentPage',
                params: { authorization: tokenApi },
            }"
            :authorization="tokenApi"
            class="btn btn-primary"
        >
            Paga con Braintree
        </router-link>
        <!-- {{ tokenApi }} -->
        <!-- <payment-page :authorization="tokenApi"></payment-page> -->
    </div>
</template>

<script>
import PaymentPage from "./PaymentPage.vue";
export default {
    components: { PaymentPage },
    name: "CartComponent",
    data() {
        return {
            url: "http://127.0.0.1:8000/api/generate",
            tokenApi: "",
        };
    },
    methods: {
        GetData(url) {
            Axios.get(url).then((response) => {
                this.tokenApi = response.data.token;
                // console.log(response);
            });
        },
    },
    mounted() {
        // const response = await this.$axios.get("api/generate");
        // this.tokenApi = response;
        this.GetData(this.url);
    },
};
</script>

<style></style>
