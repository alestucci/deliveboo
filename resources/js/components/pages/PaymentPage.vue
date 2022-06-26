<template>
    <div class="container">
        <h1>PAYMENT PAGE</h1>
        <div>COMPONENTE CARRELLO</div>
        <div>Payment form</div>
        <v-braintree
            :authorization="authorization"
            @success="onSuccess"
            @error="onError"
        ></v-braintree>
    </div>
</template>

<script>
export default {
    name: "PaymentPage",
    props: {
        authorization: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            //
        };
    },
    methods: {
        onSuccess(payload) {
            // let nonce = payload.nonce;
            // Do something great with the nonce...
        },
        onError(error) {
            // let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },
    },
};
</script>

<style></style>
