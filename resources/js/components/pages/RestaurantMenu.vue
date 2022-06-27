<template>
  <div class="position-relative">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="name text-center pb-4">{{ user.name }}</h1>
        </div>
      </div>
      <!-- CARDS DEI PIATTI -->
      <div class="d-flex flex-row">
        <div class="col-9 d-flex flex-wrap justify-content-start m-2 overflow-auto">
          <div v-for="dish in dishes" :key="dish.id" class="m-2">
            <div class="card h-100 r-15 overflow-hidden">
              <div class="h-100 d-flex flex-column justify-content-between">
                <h4 class="card-header text-center">
                  {{ dish.name }}
                </h4>
                <div class="card-body">
                  <h5 class="text-decoration-underline">Descrizione</h5>
                  <p class="card-text py-3">{{ dish.description }}</p>
                  <h5 class="text-decoration-underline">Ingredienti</h5>
                  <p class="card-text py-3">{{ dish.ingredients }}</p>
                  <h5 class="text-decoration-underline">Allergies</h5>
                  <p class="card-text py-3">{{ dish.allergies }}</p>
                </div>
                <h5 class="text-center">
                  €
                  {{
                    parseFloat(dish.price / 100)
                      .toFixed(2)
                      .toString()
                      .replace(".", ",")
                  }}
                </h5>
                <!-- AGGIUNGI AL CARRELLO -->
                <div v-show="dish.available" class="w-75 mx-auto">
                  <div class="d-flex justify-content-center mt-2 mb-3 mx-1">
                    <counter-component @passData="updateCount" />
                    <button
                      @click="
                        addToCart(
                          user.id,
                          dish.id,
                          dish.name,
                          quantity,
                          dish.price
                        )
                      "
                      class="btn btn-primary text-white py-2 px-3 mx-1"
                    >
                      <i class="fa-solid fa-cart-shopping text-center"></i>
                    </button>
                  </div>
                </div>
                <div v-show="!dish.available">
                  <h2 class="text-center text-danger py-3">
                    Al momento non disponibile
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>

        <cart-component class="col-3" :user-id="user.id"/>
      </div>
    </div>
  </div>
</template>

<script>
import CartComponent from "./CartComponent.vue";
import CounterComponent from "./CounterComponent.vue";

export default {
  name: "RestaurantMenu",
  components: {
    CartComponent,
    CounterComponent,
  },
  props: ["slug"],
  // props: ['restaurantId', 'restaurantName'],
  data() {
    return {
      url: "http://aletucci.dynv6.net:9000/api/v1",
      user: [],
      dishes: [],
      defaultValue: false,
      cartItem: [],
      cartItemLs: "",
      cartItemsLsArray: [],
      cart: [],
      localStorageIndex: 1,
      key: "",
      quantity: 0,
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
    addToCart(userId, dishId, dishName, dishQty, dishPrice) {
      if (dishQty > 0) {
        // let dishIndexInCart = this.cart.forEach(Element);
        // console.log(dishIndexInCart);
        // if (dishIndexInCart === -1) {
        this.cartItem = [dishId, dishName, dishQty, dishPrice];
        // console.log(this.cartItem);
        //this.cart.push(this.cartItem);
        this.key = "user" + userId + "cartItem" + this.localStorageIndex;
        localStorage.setItem(this.key, this.cartItem.join("|"));
        // } else {
        //   console.log("e mo?");
        // }
      }
      this.localStorageIndex++;
      this.refreshCart();
    },
    refreshCart() {
      this.cart = [];
      for (let key in localStorage) {
        if (key.indexOf('user'+this.user.id) > -1) {
          console.log(this.user.id);
          this.cartItemLs = localStorage.getItem(key);
          //console.log(this.cartItemLs);
          this.cartItemsLsArray = this.cartItemLs.split("|");
          this.cart.push(this.cartItemsLsArray);
        }
      }
      console.log(localStorage);
    },
    // clearCart() {
    //   localStorage.clear();
    //   this.refreshCart();
    // },
    updateCount(count) {
      this.quantity = count;
      console.log(count);
    },
  },
  created() {
    this.GetData(this.url + "/user/" + this.slug);
  },
  updated() {
    //this.refreshCart();

  }
  // computed: {
  //     update() {
  //       if(this.cartItem !== []) {
  //         console.log('yes')
  //         return this.refreshCart();
  //       }
  //     }
  // }
};
</script>

<style lang="scss" scoped>
.card {
  width: 200px;
}
</style>
