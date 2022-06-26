<template>
    <div>
        <div class="container">
            <h1 class="name text-center pb-4">{{ user.name }}</h1>
            <!-- CARDS DEI PIATTI -->
            <div class="d-flex flex-wrap justify-content-start m-2">
                <div v-for="dish in dishes" :key="dish.id" class="m-2">
                    <div class="card h-100 r-15 overflow-hidden">
                        <div
                            class="h-100 d-flex flex-column justify-content-between"
                        >
                            <h4 class="card-header text-center">
                                {{ dish.name }}
                            </h4>
                            <div class="card-body">
                                <h5 class="text-decoration-underline">
                                    Descrizione
                                </h5>
                                <p class="card-text py-3">
                                    {{ dish.description }}
                                </p>
                                <h5 class="text-decoration-underline">
                                    Ingredienti
                                </h5>
                                <p class="card-text py-3">
                                    {{ dish.ingredients }}
                                </p>
                                <h5 class="text-decoration-underline">
                                    Allergies
                                </h5>
                                <p class="card-text py-3">
                                    {{ dish.allergies }}
                                </p>
                            </div>
                            <h5 class="text-center">
                                € {{ parseFloat(dish.price / 100).toFixed(2) }}
                            </h5>
                            <!-- AGGIUNGI AL CARRELLO -->
                            <div class="d-flex justify-content-center">
                                <button
                                    class="btn btn-primary text-white p-2 decrease"
                                >
                                    -
                                </button>
                                <input
                                    type="number"
                                    class="form-control p-2 dish-quantity text-center"
                                    v-model="dish.quantity"
                                />
                                <button
                                    class="btn btn-primary text-white p-2 increase"
                                >
                                    +
                                </button>
                            </div>
                            <button
                                @click="
                                    addToCart(
                                        dish.id,
                                        dish.quantity,
                                        dish.price
                                    )
                                "
                                class="btn btn-primary text-white p-2 add-to-cart"
                                :disabled="!dish.available"
                            >
                                <i
                                    class="fa-solid fa-cart-shopping text-center"
                                ></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="width: 18rem">
            <div class="card-header">Carrello</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
            </ul>
            <div class="card-footer">Card footer</div>
        </div>

        <cart-component></cart-component>
    </div>
</template>

<script>
import CartComponent from "./CartComponent.vue";

export default {
    name: "RestaurantMenu",
    components: {
        CartComponent,
    },
    props: ["slug"],
    // props: ['restaurantId', 'restaurantName'],
    data() {
        return {
            url: "http://127.0.0.1:8000/api/v1",
            user: [],
            dishes: [],
            defaultValue: false,
            cartItem: [],
            cart: [],
            localStorageIndex: 1,
            key: "",
        };
    },
    methods: {
        GetData(url) {
            Axios.get(url).then((response) => {
                this.user = response.data.response.user;
                this.dishes = response.data.response.dishes;
                // console.log(response.data.response);
            });
        },
        addToCart(dishId, dishQty, dishPrice) {
            if (dishQty > 0) {
                this.cartItem = [dishId, dishQty, dishPrice];
                //this.cart.push(this.cartItem);
                this.key = "cartItem" + this.localStorageIndex;
                localStorage.setItem(this.key, this.cartItem.join("|"));
            }
            console.log(dishId);
            console.log(dishQty);
            console.log(dishPrice);
            console.log(this.cartItem);
            console.log(this.cart);
            this.localStorageIndex++;
        },
    },
    created() {
        this.GetData(this.url + "/user/" + this.slug);
    },
};
</script>

<style lang="scss" scoped>
.card {
    width: 250px;
}
</style>
