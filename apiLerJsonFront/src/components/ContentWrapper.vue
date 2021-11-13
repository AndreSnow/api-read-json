<template>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ store }}</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
import RequestMethods from "@/components/mixins/RequestMethods.js";

export default {
  name: "NavBar",
  props: ["store"],
  data() {
    return {};
  },
  mixins: [RequestMethods],
};
</script>
