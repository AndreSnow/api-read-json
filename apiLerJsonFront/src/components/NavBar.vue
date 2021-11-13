<template>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="float-right nav-item d-none d-sm-inline-block">
        <button class="btn btn-sccess" @click="logout()">Sair</button>
      </li>
    </ul>
  </nav>
</template>

<script>
import RequestMethods from "@/components/mixins/RequestMethods.js";
export default {
  name: "NavBar",
  data() {
    return {};
  },
  mixins: [RequestMethods],
};
</script>
