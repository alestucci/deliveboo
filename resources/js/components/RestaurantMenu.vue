<template>
  <div class="col">
    <div class="card h-100 r-15">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <h5 class="card-title d-flex justify-content-between">
            <!-- <a
              href="{{ route('user.dishes.show', $dish->id) }}"
              class="text-decoration-none text-uppercase"
              >{{$dish->name}}</a
            > -->
            @if ($dish->available == 1)
            <i class="fas fa-check"></i>
            @else
            <i class="fas fa-times"></i>
            @endif
          </h5>
          <!-- <p class="card-text py-3">{{$dish->ingredients}}</p> -->
        </div>
        <div class="d-flex justify-content-around">
          <a
            class="btn btn-primary text-white px-4"
            href="{{ route('user.dishes.edit', $dish->id) }}"
            >{{ __("Edit") }}</a
          >
          <button
            class="btn btn-danger delete-button text-white px-4"
            data-id="{{ $dish->id }}"
          >
            {{ __("Delete") }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "RestaurantMenu",
  data: {
	props: ['restaurantId']
  },
  methods: {
    addToCart() {
      console.log("Added 2 Cart");
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
