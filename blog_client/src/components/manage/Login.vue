<template>
  <div class="login">
    <img
      src="/static/logo.ico"
      alt=""
    >
    <div>
      <el-input
        placeholder="请输入账户"
        v-model="username"
      >
        <template slot="prepend">账户：</template>
      </el-input>
    </div>
    <div>
      <el-input
        placeholder="请输入账户"
        v-model="password"
      >
        <template slot="prepend">账户：</template>
      </el-input>
    </div>
    <el-button
      @click="login"
      id="logo"
      type="primary"
      round
    >登录</el-button>
  </div>
</template>

<script>
export default {
  name: "login",
  data() {
    return {
      username: "",
      password: ""
    };
  },
  methods: {
    login: function() {
      var _this = this;
      this.axios
        .post("/manage/login", {
          username: this.username,
          password: this.password
        })
        .then(function(response) {
          _this.$message({
            message: "登录成功",
            type: "success"
          });
          _this.$router.push({ path: "index" });
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.login {
  width: 500px;
  margin: 200px auto 0 auto;
}
.login div {
  margin-top: 10px;
}
img {
  border-radius: 50%;
  margin-bottom: 40px;
}
#logo {
  margin-top: 30px;
  width: 500px;
}
</style>
