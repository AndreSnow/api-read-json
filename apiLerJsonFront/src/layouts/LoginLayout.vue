<template>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="/login"><b>Planium</b></a>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Faça login para iniciar sua sessão</p>

          <form>
            <div class="input-group mb-3">
              <input
                type="email"
                class="form-control"
                placeholder="Email"
                v-model="email"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                v-model="password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-primary btn-block" @click="login()">
                  <i v-if="req" class="fas fa-spinner fa-spin"></i>
                  Login
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</template>
<script>
import Vue from "vue";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
Vue.use(VueToast);
export default {
  name: "LoginLayout",
  components: {
  },
  data() {
    return {
      user: false,
      email: "",
      password: "",
      req: false,
    };
  },
  mounted() {
    let userAuth = this.$store.getters.getUser;
    if (userAuth) {
      this.user = this.$store.getters.getUser;
      this.$router.push("/planiums");
    }
  },
  methods: {
    login: function () {
      this.req = true;
      this.$http
        .post(
          `${this.$ApiUrl}api/users/login`,
          {
            email: this.email,
            password: this.password,
          },
          {
            headers: {
              "Accept": "application/json",
              "Content-Type": "application/json",
            },
          }
        )
        .then((response) => {
          sessionStorage.setItem("user", JSON.stringify(response.data));
          this.$store.commit("setUser", response.data);
          this.$router.push("/planiums");

          this.req = false;
          Vue.$toast.open({
            message: `Bem vindo ${response.data.name}!`,
            type: "success",
            position: "top-right",
          });
        })
        .catch((error) => {
          this.req = false;
          Vue.$toast.open({
            message: "Não autorizado, verifique suas credenciais.",
            type: "error",
            position: "top-right",
          });
        });
    },
  },
};
</script>
