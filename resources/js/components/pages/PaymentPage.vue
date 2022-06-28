<template>
    <div class="container">
        <h1>PAYMENT PAGE</h1>
        <div>COMPONENTE CARRELLO</div>
        <!-- {{ authorization }} -->
        <form id="payment-form" @submit.prevent="GetData()" method="POST">


            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                    <li :key="error" :v-for="error in errors">{{ error }}</li>
                </ul>
            </p>

            <div class="form-group">
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

            <button>Prosegui</button>
        </form>
        <!-- <div>Payment form</div> -->
        <!-- {{ authorization }} -->
        <v-braintree
            v-show="showPayment"
            :authorization="authorization"
            @success="onSuccess"
            locale="it_IT"
            @error="onError"
        ></v-braintree>
        <!-- <div>
            <p v-if="error" class="text-red-500 mb-4">
                {{ error }}
            </p>
        </div> -->
    </div>
</template>

<script>
export default {
    name: "PaymentPage",
    props: ["userId"],
    data() {
        return {
            url: "http://127.0.0.1:8000/api/make/payment",
            errors: [],
            error: "",
            name: null,
            surname: null,
            address: null,
            email: null,
            showPayment: false,
            // property: {
            //     token: "",
            //     amount: 10
            // },
            amount: 10,
            authorization: "sandbox_bnksx356_d5p5v68sp25kr37b",
        };
    },
    methods: {
        checkForm(e) {
            if (this.name && this.surname && this.address && this.email) {
                return true;
            }

            this.errors = [];

            if (!this.name) {
                this.errors.push("Name required.");
            }
            if (!this.surname) {
                this.errors.push("Surname required.");
            }
            if (!this.address) {
                this.errors.push("Address required.");
            }
            if (!this.email) {
                this.errors.push("Email required.");
            }

            e.preventDefault();
        },
        onSuccess (payload) {
            let nonce = payload.nonce;
            // Do something great with the nonce...
            console.log(nonce);
            Axios.post(this.url, {
                params: {
                    nonce: nonce,
                    amount: this.amount,
                }
            }).then(response => {
                console.log(response.data.message)
            })
        },
        onError (error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
            console.log(message);
            // if (message === "No payment method is available.") {
            //     this.error = "Seleziona un metodo di pagamento";
            //     console.log(this.error)

            // } else {
            //     this.error = message;
            //     console.log(this.error)

            // }
            // console.log(this.error)
        },
        // onSuccess(payload) {
        //     this.property.token = payload.nonce;
        //     Axios.post(this.url, {
        //         params: this.property
        //     }).then(response => {
        //         console.log(response)
        //     })
        //     // this.$router.push({ name: 'CheckoutSuccess' })
        // },
        // onError(error) {
        //     let message = error.message;
        //     if (message === "No payment method is available.") {
        //         this.error = "Seleziona un metodo di pagamento";
        //         console.log(this.error)

        //     } else {
        //         this.error = message;
        //         console.log(this.error)

        //     }
        //     console.log(this.error)

        //     this.$emit("onError", message);
        // },
        active() {
            this.showPayment = true
        },
        GetData() {
            this.active()
            // Axios.post(this.url, {
            //     params: {
            //         name: this.name,
            //         surname: this.surname,
            //         address: this.address,
            //         email: this.email
            //     }
            // }).then(response => {
            //     console.log(response)
            // })
        }
    },
};
</script>

<style></style>
