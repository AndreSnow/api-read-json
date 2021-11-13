<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <router-link class="brand-link" to="/">
      <img
        src="https://www.planium.io/wordpress/wp-content/uploads/2018/11/logo-Planium-07.svg"
        alt="Logo"
        class=""
        width="200px"
      />
    </router-link>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <router-link class="d-block" to="users">{{ user }}</router-link>
        </div>
      </div>
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <router-link class="nav-link" to="/planiums">
              <i class="nav-icon fas fa-gift"> </i>
              <p>Planos</p>
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
</template>
<script>
export default {
  name: "SidebarContainer",
  props: ["user", "tenant_id", "role"],
  data() {
    return {};
  },
};
</script>
