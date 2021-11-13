<template>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <nav-bar></nav-bar>
      <sidebar-container
        :user="this.$store.getters.getUser.name"
      ></sidebar-container>
      <content-wrapper store="Planium">
        <slot />
      </content-wrapper>
      <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <footer-vue></footer-vue>
    </div>
  </body>
</template>
<script>
import NavBar from "@/components/NavBar.vue";
import SidebarContainer from "@/components/SidebarContainer.vue";
import ContentWrapper from "@/components/ContentWrapper.vue";
import FooterVue from "@/components/FooterVue.vue";

export default {
  components: {
    NavBar,
    SidebarContainer,
    ContentWrapper,
    FooterVue,
  },
  name: "Admin",
  data() {
    return {
      user: false,
    };
  },
  mounted() {
    this.getUserAuth();
  },
  methods: {
    getUserAuth() {
      let userAuth = this.$store.getters.getUser;
      if (!userAuth) {
        this.$router.push("/login");
      } 
      this.user = this.$store.getters.getUser;
    },
  },
};
</script>
