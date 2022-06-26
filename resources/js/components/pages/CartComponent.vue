<template>
    <div>
        <h1>CARRELLO</h1>
        <router-link :to="{ name: 'PaymentPage' }" class="btn btn-primary">
            Paga con Braintree
        </router-link>
    </div>
</template>

<script>
export default {
    name: "CartComponent",
};
</script>

<style></style>
