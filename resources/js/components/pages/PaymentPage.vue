<template>
    <div class="container">
        <h1>PAYMENT PAGE</h1>
        <div>COMPONENTE CARRELLO</div>
        <!-- {{ authorization }} -->
        <!-- <form id="payment-form" action="api/token" method="post"> -->
        <!-- Putting the empty container you plan to pass to
            `braintree.dropin.create` inside a form will make layout and flow
            easier to manage -->

        <!-- <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                    <li :key="error" :v-for="error in errors">{{ error }}</li>
                </ul>
            </p> -->

        <!-- <div class="form-group">
                <label for="name">Nome</label>
                <input
                    type="text"
                    v-model="name"
                    maxlength="100"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder="Inserisci il tuo nome"
                    required
                />
            </div>

            <div class="form-group">
                <label for="surname">Cognome</label>
                <input
                    type="text"
                    v-model="surname"
                    maxlength="100"
                    class="form-control"
                    name="surname"
                    id="surname"
                    placeholder="Inserisci il tuo cognome"
                    required
                />
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input
                    type="text"
                    v-model="address"
                    maxlength="100"
                    class="form-control"
                    name="address"
                    id="address"
                    placeholder="Inserisci il tuo indirizzo"
                    required
                />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    v-model="email"
                    maxlength="100"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="Inserisci la tua email"
                    required
                />
            </div>
        </form> -->
        <!-- <div>Payment form</div> -->
        <!-- {{ authorization }} -->
        <v-braintree
            :authorization="authorization"
            @success="onSuccess"
            locale="it_IT"
            @error="onError"
        ></v-braintree>
        <div>
            <p v-if="error" class="text-red-500 mb-4">
                {{ error }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "PaymentPage",
    props: ["authorization"],
    data() {
        return {
            error: "",
            name: null,
            surname: null,
            address: null,
            email: null,
        };
    },
    methods: {
        // checkForm(e) {
        //     if (this.name && this.surname && this.address && this.email) {
        //         return true;
        //     }

        //     this.errors = [];

        //     if (!this.name) {
        //         this.errors.push("Name required.");
        //     }
        //     if (!this.surname) {
        //         this.errors.push("Surname required.");
        //     }
        //     if (!this.address) {
        //         this.errors.push("Address required.");
        //     }
        //     if (!this.email) {
        //         this.errors.push("Email required.");
        //     }

        //     e.preventDefault();
        // },
        onSuccess(payload) {
            let token = payload.nonce;
            this.$emit("onSuccess", token);
        },
        onError(error) {
            let message = error.message;
            if (message === "No payment method is available.") {
                this.error = "Seleziona un metodo di pagamento";
            } else {
                this.error = message;
            }
            this.$emit("onError", message);
        },
    },
};
</script>

<style></style>
