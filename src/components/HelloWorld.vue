<template>
  <b-card-group deck>
    <b-card
      class="window"
      header-tag="header"
      footer-tag="footer"
      bg-variant="dark"
      text-variant="white"
    >
      <template #header>
        <h6 class="mb-0">Terminal emulator</h6>
      </template>
      <b-card-text>
        <b-list-group class="history-container">
          <b-list-group-item
            v-for="item in history"
            :key="item.id"
            @click="currentinput = item.input"
          >
            <div>
              <code class="command">
                {{ item.input }}
              </code>
            </div>
            <pre class="codelike">{{ item.output }}</pre>
          </b-list-group-item>
          <b-list-group-item active>
            <div class="text-muted">
              {{ currentinput }}
            </div>
            <code class="error">{{ error }}</code>
            <code> ({{ state }}) </code>
          </b-list-group-item>
        </b-list-group>
      </b-card-text>
      <template #footer>
        <b-form @submit="execute">
          <b-input-group class="mt-3">
            <b-form-input
              variant="outline-success"
              v-model="currentinput"
            ></b-form-input>
            <b-input-group-append>
              <b-button variant="outline-success" @click="execute"
                >Execute</b-button
              >
            </b-input-group-append>
          </b-input-group>
        </b-form>
      </template>
    </b-card>
  </b-card-group>
</template>

<script>
const axios = require("axios").default;

export default {
  name: "HelloWorld",
  props: {
    msg: String
  },
  data: function() {
    return {
      error: "",
      currentinput: "",
      state: "pending executiuon",
      history: [
        {
          id: "sdf",
          input: "command",
          output: "output"
        },
        {
          id: "scdf",
          input: "command",
          output: "output"
        }
      ]
    };
  },
  methods: {
    execute: function(evt) {
      evt.preventDefault();
      this.error = "";
      this.state = "executing";
      axios
        .post("exec.php", {
          command: this.currentinput
        })
        .then(response => {
          console.log(response);
          this.history.push(response.data);
          this.currentinput = "";
          this.state = "pending executiuon";
        })
        .catch(error => {
          console.log(error);
          console.log(this);
          this.state = "Failed";

          this.error = error;
        });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.window {
  border-radius: 1em;
}
.history-container .list-group-item {
  background: #343a40;
}
.form-control {
  background: #252a2f;
  color: #fff;
}
code,
.codelike {
  color: #78e93f;
}
.error {
  color: #e83e8c;
}
.command {
  color: #3fe1e9;
}
</style>
