<template>
    <div class="container">
        <!-- TODO: button da rimpiazzare con il componente carrello -->
        <button class="btn btn-primary mb-3">COMPONENTE CARRELLO</button>

        <!-- Putting the empty container you plan to pass to
        `braintree.dropin.create` inside a form will make layout and flow
        easier to manage -->

        <!-- <p v-if="errors.length">
            <b>Please correct the following error(s):</b>
            <ul>
                <li :key="error" :v-for="error in errors">{{ error }}</li>
            </ul>
        </p> -->

        <!-- <form action="/" method="post">
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
            </div> -->

        <!-- <div id="dropin-container"></div>
            <div class="wrap">
                <input
                    class="payment_btn btn btn-success"
                    type="submit"
                    value="Invia il pagamento"
                />
                <a class="payment_btn btn btn-primary">Ritorna al carrello</a
                >
            </div>

            <input type="hidden" id="nonce" name="payment_method_nonce" />
            <input type="hidden" id="cart" name="cart" /> -->

        <div id="dropin-wrapper">
            <div id="checkout-message"></div>
            <div id="dropin-container"></div>
            <button id="submit-button">Submit payment</button>
        </div>
        <!-- </form> -->
    </div>
</template>

<script>
export default {
    name: "PagePayment",
    data() {
        return {
            errors: [],
            name: null,
            surname: null,
            address: null,
            email: null,
        };
    },
    methods: {
        // toggleCheckout(){
        //     this.$store.commit('toggleCheckout');
        //     console.log(this.$store.state.checkout);
        // },
        checkForm: function (e) {
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
    },
    mounted() {
        // var button = document.querySelector("#submit-button");
        // braintree.dropin.create(
        //     {
        //         authorization: "{{ Braintree_ClientToken::generate() }}",
        //         container: "#dropin-container",
        //     },
        //     function (createErr, instance) {
        //         button.addEventListener("click", function () {
        //             instance.requestPaymentMethod(function (err, payload) {
        //                 $.get(
        //                     "payment.process",
        //                     { payload },
        //                     function (response) {
        //                         if (response.success) {
        //                             alert("Payment successfull!");
        //                         } else {
        //                             alert("Payment failed");
        //                         }
        //                     },
        //                     "json"
        //                 );
        //             });
        //         });
        //     }
        // );
        // var button = document.querySelector("#submit-button");
        // braintree.dropin.create(
        //     {
        //         // Insert your tokenization key here
        //         authorization: "<dwqhtjyrtywsnhvw>",
        //         container: "#dropin-container",
        //     },
        //     function (createErr, instance) {
        //         button.addEventListener("click", function () {
        //             instance.requestPaymentMethod(function (
        //                 requestPaymentMethodErr,
        //                 payload
        //             ) {
        //                 // When the user clicks on the 'Submit payment' button this code will send the
        //                 // encrypted payment information in a variable called a payment method nonce
        //                 $.ajax({
        //                     type: "POST",
        //                     url: "/checkout",
        //                     data: { paymentMethodNonce: payload.nonce },
        //                 }).done(function (result) {
        //                     // Tear down the Drop-in UI
        //                     instance.teardown(function (teardownErr) {
        //                         if (teardownErr) {
        //                             console.error(
        //                                 "Could not tear down Drop-in UI!"
        //                             );
        //                         } else {
        //                             console.info(
        //                                 "Drop-in UI has been torn down!"
        //                             );
        //                             // Remove the 'Submit payment' button
        //                             $("#submit-button").remove();
        //                         }
        //                     });
        //                     if (result.success) {
        //                         $("#checkout-message").html(
        //                             '<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>'
        //                         );
        //                     } else {
        //                         console.log(result);
        //                         $("#checkout-message").html(
        //                             "<h1>Error</h1><p>Check your console.</p>"
        //                         );
        //                     }
        //                 });
        //             });
        //         });
        //     }
        // );
        console.log("Component payment mounted.");
        var data;
        axios
            .get("payment.process")
            .then((response) => {
                data = response.data;

                console.log(data);
                // call `braintree.dropin.create` code here
                // const form = document.getElementById("payment-form");
                // braintree.dropin.create(
                //     {
                //         authorization: data,
                //         container: "#dropin-container",
                //     },
                //     (error, dropinInstance) => {
                //         if (error) console.error(error);
                //         form.addEventListener("submit", (event) => {
                //             event.preventDefault();
                //             dropinInstance.requestPaymentMethod(
                //                 (error, payload) => {
                //                     if (error) console.error(error);
                //                     // Step four: when the user is ready to complete their
                //                     //   transaction, use the dropinInstance to get a payment
                //                     //   method nonce for the user's selected payment method, then add
                //                     //   it a the hidden field before submitting the complete form to
                //                     //   a server-side integration
                //                     document.getElementById("nonce").value =
                //                         payload.nonce;
                //                     document.getElementById("cart").value =
                //                         JSON.stringify(this.$store.state.cart);
                //                     form.submit();
                //                 }
                //             );
                //         });
                //     }
                // );
            })
            .catch((error) => {});
    },
};
</script>

<style lang="scss" scoped></style>
