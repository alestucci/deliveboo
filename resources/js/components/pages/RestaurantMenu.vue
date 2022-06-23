<template>
  <div>
    <div class="container">
      <h1 class="name text-center pb-4">{{ user.name }}</h1>
      <!-- CARDS DEI PIATTI -->
      <div class="d-flex flex-wrap">
        <div v-for="dish in dishes" :key="dish.id" class="card">
          <div v-show="dish.available === 1" class="card h-100 r-15">
            <div class="card-body d-flex flex-column justify-content-center">
              <div></div>
              <h5 class="card-title d-flex justify-content-between">
                {{ dish.name }}
              </h5>
              <h5 class="card-title d-flex justify-content-between">
                {{ dish.price }}
              </h5>
              <p class="card-text py-3">{{ dish.description }}</p>
              <p class="card-text py-3">{{ dish.ingredients }}</p>
            </div>
            <!-- AGGIUNGI AL CARRELLO -->
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary text-white p-2 decrease">-</button>
              <input
                type="number"
                class="form-control p-2 dish-quantity"
                value="0"
              />
              <button class="btn btn-primary text-white p-2 increase">+</button>
            </div>
            <button class="btn btn-primary text-white p-2 add-to-cart">
              <i class="fa-solid fa-cart-shopping text-center"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div v-show="cart.lenght" class="cart">
      <table>
        <tr>
          <td>
            {{ dish.name }}
          </td>
          <td>
            {{ dish.price }}
          </td>
          <td>
            {{ quantity }}
          </td>

        </tr>
      </table>
    </div> -->
  <!-- </div> -->
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

      // cart: [],
      // cartItem: ['dish.id', 'Qty', 'dish.price']
      //
    };
  },
  methods: {
    GetData(url) {
      Axios.get(url).then((response) => {
        this.user = response.data.response.user;
        this.dishes = response.data.response.dishes;
        console.log(response.data.response);
      });
    },
  },
  created() {
    this.GetData(this.url + "/user/" + this.slug);
  },
};
</script>

<style lang="scss" scoped>
</style>