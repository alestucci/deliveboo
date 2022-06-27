<template>
  <div class="position-relative">
    <div class="container">
      <h1 class="name text-center pb-4">{{ user.name }}</h1>
      <!-- CARDS DEI PIATTI -->
      <div class="d-flex flex-wrap justify-content-start m-2">
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
                  <button @click="decreaseQuantity()" class="btn btn-primary text-white py-2 px-3">
                    -
                  </button>
                  <input
                    type="number"
                    class="form-control p-2 dish-quantity text-center"
                    v-model="dish.quantity"
                  />
                  <button @click="increaseQuantity()" class="btn btn-primary text-white py-2 px-3">
                    +
                  </button>
                <!-- </div> -->
                <!-- <div class="w-100 d-flex justify-content-center"> -->
                  <button
                    @click="
                      addToCart(dish.id, dish.name, dish.quantity, dish.price)
                    "
                    class="
                      btn btn-primary
                      text-white
                      py-2
                      px-3
                      mx-1
                    "
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
    </div>

    <div class="card position-absolute top-0 end-0" style="width: 18rem">
      <div class="card-header">Carrello</div>
      <ul
        v-for="itemInCartLs in cart"
        class="list-group list-group-flush"
        :key="itemInCartLs.id"
      >
        <li class="list-group-item">
          <div>{{ itemInCartLs[1] }}</div>
          <div>{{ itemInCartLs[2] }}</div>
          <div>
            {{
              parseFloat(itemInCartLs[3] / 100)
                .toFixed(2)
                .toString()
                .replace(".", ",")
            }}
          </div>
        </li>
      </ul>
      <button @click="refreshCart()" class="btn btn-primary">
        Aggiorna Carrello
      </button>
      <div class="card-footer text-center" @click="clearCart()">Svuota il carrello</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantMenu",
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
    addToCart(dishId, dishName, dishQty, dishPrice) {
      if (dishQty > 0) {
        // let dishIndexInCart = this.cart.forEach(Element);
        // console.log(dishIndexInCart);
        // if (dishIndexInCart === -1) {
          this.cartItem = [dishId, dishName, dishQty, dishPrice];
          //this.cart.push(this.cartItem);
          this.key = "cartItem" + this.localStorageIndex;
          localStorage.setItem(this.key, this.cartItem.join("|"));
        // } else {
        //   console.log("e mo?");
        // }
      }
      this.localStorageIndex++;
      this.refreshCart();
    },
    increaseQuantity() {
      this.dish.quantity++
    },
    decreaseQuantity() {
      this.dish.quantity--
    },
    refreshCart() {
      this.cart = [];
      for (var key in localStorage) {
        if (key.indexOf("cart") > -1) {
          this.cartItemLs = localStorage.getItem(key);
          //console.log(this.cartItemLs);
          this.cartItemsLsArray = this.cartItemLs.split("|");
          this.cart.push(this.cartItemsLsArray);
        }
      }
      //console.log(this.cart);
    },
    clearCart() {
      localStorage.clear();
    }
  },
  created() {
    this.GetData(this.url + "/user/" + this.slug);
    this.refreshCart();
  },
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
  width: 250px;
}
</style>