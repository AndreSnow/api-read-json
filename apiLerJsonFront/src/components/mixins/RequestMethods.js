export default {
    methods: {
        logout() {
            this.$store.commit("setUser", null);
            sessionStorage.clear();
            this.user = false;
            this.$router.push("/login");
        },
        getProposal() {
            this.req = true;
            this.$http
                .get(
                    `${this.$ApiUrl}api/simulation/proposta`,
                    {
                        headers: {
                            Accept: "application/json",
                            Authorization: `Bearer ${this.user.token}`,
                            "Content-Type": "application/json",
                        },
                    }
                )
                .then((response) => {
                    this.req = false;
                    this.proposals = response.data;
                    this.loadTable();
                })
                .catch((error) => {
                    this.req = false;
                    Vue.$toast.open({
                        message: "Occorreu um erro :(",
                        type: "error",
                        position: "top-right",
                    });
                });
        },
    },
}