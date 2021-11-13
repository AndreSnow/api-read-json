<template>
  <admin-layout>
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table
                id="data_table"
                class="table-striped table-bordered"
                style="width: 100%"
              >
                <thead>
                  <tr>
                    <th>Idade</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Plano</th>
                  </tr>
                </thead>
                <tbody>
                  <template v-for="proposal in proposals">
                    <tr v-for="value in proposal.dadosBenefs">
                      <td>{{ value.idade }}</td>
                      <td>{{ value.nome }}</td>
                      <td>
                        {{
                          value.preco.toLocaleString("pt-BR", {
                            style: "currency",
                            currency: "BRL",
                          })
                        }}
                      </td>
                      <td>{{ proposal.plano }}</td>
                    </tr>
                  </template>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Idade</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Plano</th>
                  </tr>
                </tfoot>
              </table>
              <h5 class="text-center pt-4">
                Preço total
                {{
                  proposals[0].precoTotal.toLocaleString("pt-BR", {
                    style: "currency",
                    currency: "BRL",
                  })
                }}
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "@/layouts/AdminLayout.vue";
import RequestMethods from "@/components/mixins/RequestMethods.js";

export default {
  components: {
    AdminLayout,
  },
  name: "Planiums",
  data() {
    return {
      proposals: "",
      req: "",
      plans: [],
      planium: [],
      plan_selected: "",
      cost_center_selected: "",
    };
  },
  mounted() {
    this.getUserAuth();
    this.getProposal();
  },
  methods: {
    loadTable() {
      $(document).ready(function () {
        $("#data_table").DataTable({
          language: {
            lengthMenu: "Exibindo &nbsp _MENU_ &nbsp registros por página",
            zeroRecords: "Nada encontrado - desculpe",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "Nenhum registro disponível",
            infoFiltered: "(filtrado de _MAX_ registros totais)",
          },
          retrieve: true,
        });
      });
    },
    getUserAuth() {
      let userAuth = this.$store.getters.getUser;
      if (userAuth) {
        this.user = this.$store.getters.getUser;
      }
    },
  },
  mixins: [RequestMethods],
};
</script>
