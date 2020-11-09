<template>
  <div id="app">
    <b-container class="bv-example-row">
      <HelloWorld msg="Welcome to Your Vue.js App" />
    </b-container>
  </div>
</template>

<script>
import HelloWorld from "./components/HelloWorld.vue";

export default {
  name: "App",
  components: {
    HelloWorld
  }
};
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  // text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
html,
body {
  background: #ffb347; /* fallback for old browsers */
  background: -webkit-linear-gradient(
    to right,
    #ffcc33,
    #ffb347
  ); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(
    to right,
    #ffcc33,
    #ffb347
  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
</style>
