<template>
  <div>
    <h1 class="name text-center pb-4">{{ restaurantName }}</h1>
    <!-- CARDS DEI PIATTI -->
    <div class="d-flex flex-wrap">
      <div v-for="dish in dishes" :key="dish.id">
        <div
          v-show="dish.user_id === restaurantId && dish.available === 1"
          class="card h-100 r-15"
        >
          <div class="card-body d-flex flex-column justify-content-center">
            <div>
              <h5 class="card-title d-flex justify-content-between">
                {{ dish.name }}
              </h5>
              <p class="card-text py-3">{{ dish.description }}</p>
              <p class="card-text py-3">{{ dish.ingredients }}</p>
            </div>
            <!-- AGGIUNGI AL CARRELLO -->
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary text-white p-2 decrease">-</button>
              <input type="number" class="form-control p-2 dish-quantity" value="0" />
              <button class="btn btn-primary text-white p-2 increase">+</button>
            </div>
            <button class="btn btn-primary text-white p-2 add-to-cart">
              <i class="fa-solid fa-cart-shopping text-center"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div v-show="cart.lenght" class="cart">
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
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantMenu",
  // props: ['restaurantId', 'restaurantName'],
  data() {
    return {
      url: "http://127.0.0.1:8000/api/v1",
      users: [],
      metadata: {},
      filters: {
        category: "",
      },
      user_category: [],
      defaultValue: false,
      //Da eliminare una volta fatti funzionare i props
      restaurantId: 10,
      restaurantName: "Trattoria da Vincenzo",

      cart: [],

    };
  },
  methods: {
    GetData(url) {
      Axios.get(url, {
        params: this.filters,
      }).then((response) => {
        this.users = response.data.response.data;
        this.user_category = response.data.response.array;
        this.dishes = response.data.response.dishes;
      });
    },
    

  },
  created() {
    this.GetData(this.url + "/users?home");
    Axios.get(this.url + "/metadata").then((response) => {
      this.metadata = response.data;
    });
  },
  computed() {
    cardtotal();

  }
};
</script>
