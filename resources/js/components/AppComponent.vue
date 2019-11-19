<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <h2 class="text-center">Foods</h2>
        <draggable v-model="foods" group="order">
          <div class="list-group" v-for="food in foods" :key="food.id">
            <div class="list-group-item">{{ food.name }}</div>
          </div>
        </draggable>
      </div>
      <div class="col-3">
        <h2 class="text-center">Orders</h2>
        <draggable v-model="orders" group="order" @change="onChange">
          <div class="list-group" v-for="order in orders" :key="order.id">
            <div class="list-group-item">{{ order.name }}</div>
          </div>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";

export default {
  components: {
    draggable: draggable
  },
  computed: {
    url_host: function() {
      return this.$root.$data.url_host;
    }
  },
  data() {
    return {
      foods: [],
      orders: [],
      drag: false
    };
  },
  methods: {
    getFoods() {
      var _this = this;
      axios({
        method: "post",
        url: _this.url_host + "/api/foods"
      })
        .then(response => {
          if (response.data.message === "success") {
            _this.foods = response.data.data;
          } else {
            window.alert(response.data.message);
          }
        })
        .catch(error => {
          window.alert(error);
        });
    },
    getOrder() {
      var _this = this;
      axios({
        method: "post",
        url: _this.url_host + "/api/orders"
      })
        .then(response => {
          if (response.data.message === "success") {
            _this.orders = response.data.data;
          } else {
            window.alert(response.data.message);
          }
        })
        .catch(error => {
          window.alert(error);
        });
    },
    updateFood() {
      var _this = this;

      var data = {
        foods: _this.foods
      };

      axios({
        method: "put",
        url: _this.url_host + "/api/foods",
        data: data
      })
        .then(response => {
          if (response.data.message === "success") {
            _this.updateOrder();
          } else {
            return false;
          }
        })
        .catch(error => {
          window.alert(error);
          return false;
        });
    },
    updateOrder() {
      var _this = this;

      var data = {
        orders: _this.orders
      };

      axios({
        method: "put",
        url: _this.url_host + "/api/orders",
        data: data
      })
        .then(response => {
          if (response.data.message === "success") {
            _this.getFoods();
            _this.getOrder();
          } else {
            return false;
          }
        })
        .catch(error => {
          window.alert(error);
          return false;
        });
    },
    onChange(evt) {
      var _this = this;

      _this.updateFood();
    }
  },
  created() {
    var _this = this;

    _this.getFoods();
    _this.getOrder();
  }
};
</script>