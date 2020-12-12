<template>
  <div>
    <nav
      class="uk-margin uk-navbar uk-margin-remove-bottom uk-background-secondary uk-light"
      uk-navbar=""
    >
      <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
          <li>
            <a
              class="uk-navbar-toggle"
              uk-navbar-toggle-icon
              href="#offcanvas"
              uk-toggle
            ></a>
          </li>
          <li><router-link to="/">My-taverne</router-link></li>
          <li><router-link to="/comunity">les Guildes</router-link></li>
        </ul>
      </div>

      <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
          <li>
            <a uk-icon="user"></a>
            <div uk-dropdown="pos: top-right">
              <ul class="uk-nav uk-dropdown-nav">
                <li class="uk-active"><a href="#">settings</a></li>
                <li>
                  <a
                    href="#"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >logout</a
                  >
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    logout() {
      localStorage.removeItem("tweetr-token");

      this.$router.push("/logout");
    },
  },
};
</script>

<style scoped>
</style>
