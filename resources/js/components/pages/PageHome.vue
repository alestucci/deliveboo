<template>
  <div>
    <div class="container">
      <!-- filter bar -->
      <div class="row">
        <div class="col-md-6">
          <select
            @change="GetData(url + '/users')"
            class="form-select"
            aria-label="Default select example"
            name="category"
            id="category"
            v-model="filters.category"
          >
            <option value="" selected>Select a category</option>
            <option
              v-for="category in metadata.categories"
              :key="category.id"
              :value="category.id"
            >
              {{ category.name }}
            </option>
          </select>
        </div>
      </div>

      <!-- cards container -->

      <div class="cards-cont row p-3">
        <div
          v-for="user in users"
          :key="user.id"
          class="card col-12 col-sm-6 col-md-4 col-lg-3"
        >
          <router-link
            :to="{ name: 'RestaurantMenu', params: { slug: user.slug } }"
            class="inner-card"
          >
            <h1>
              {{ user.name }}
            </h1>

            <p>{{ user.street }} - {{ user.city }}</p>

            <p>Phone: {{ user.phone_number }}</p>

            <div v-for="restaurant in user_category" :key="restaurant.id">
              <p v-show="restaurant.user_id == user.id">
                <span
                  class="category"
                  v-for="(category, index) in restaurant.categories"
                  :key="category.slug"
                >
                  <span>{{ category }}</span>
                  <span v-if="index + 1 < restaurant.categories.length">
                    ,
                  </span>
                </span>
              </p>
            </div>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PageHome",
  data() {
    return {
      url: "http://aletucci.dynv6.net:9000/api/v1",
      // url: 'http://127.0.0.1:8000/api/v1',
      users: [],
      metadata: {},
      filters: {
        category: "",
      },
      user_category: [],
      defaultValue: false,
    };
  },
  methods: {
    GetData(url) {
      Axios.get(url, {
        params: this.filters,
      }).then((response) => {
        this.users = response.data.response.data;
        this.user_category = response.data.response.array;
        console.log(this.users);
      });
    },
  },
  created() {
    this.GetData(this.url + "/users?home");

    Axios.get(this.url + "/metadata").then((response) => {
      this.metadata = response.data;

      console.log(this.metadata.category_users);
    });
  },
  computed: {
    defaultFilter() {
      if (this.filters.category === "") {
        return this.GetData(this.url + "/users?home");
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.form-select {
  margin-left: 0.6rem;
  width: fit-content;
}

.card {
  background: transparent;
  padding: 0.5rem;
  border: none;
  .inner-card {
    text-decoration: none;
    background: #ab3328;
    padding: 0.6rem;
    height: 100%;
    border-radius: 25px;
    color: #fff;
    h1 {
      color: #f49e4c;
    }
  }
}
</style>
