<template>
  <LoginLayout></LoginLayout>
</template>
<script>
import LoginLayout from "@/layouts/LoginLayout.vue";

export default {
  name: "Login",
  components: {
    LoginLayout,
  },
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    
  },
};
</script>
