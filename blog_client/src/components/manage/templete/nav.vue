<template>
  <div id="nav">
    <el-menu
      :default-active="activeIndex2"
      class="el-menu-demo"
      mode="horizontal"
      @select="handleSelect"
      :router="router"
      style="width:1100px;margin:auto"
    >
      <el-menu-item index="index">博客管理</el-menu-item>
      <el-menu-item index="new">work 空间</el-menu-item>
      <el-menu-item index="PersonalInfoSet">个人信息设置</el-menu-item>
    </el-menu>
  </div>
</template>
<script>
export default {
  props: ["id"],
  data() {
    return {
      activeIndex: "1",
      activeIndex2: this.id,
      router: true,
      loginAgain: this.getCookie("check_login_fail")
    };
  },
  mounted: function() {
    if (this.getCookie("check_login_fail") == "true") {
       this.delCookie("check_login_fail")
       this.delCookie("auth_name")
      this.$router.push({ path: "login" });
    }
    this.getCookie("auth_name") == null
      ? function() {
          this.$router.push({ path: "login" });
          this.$message({
            message: "请先进行登录，再进行操作",
            type: "warning"
          });
        }
      : "";
  },
  methods: {
    handleSelect(key, keyPath) {
      // console.log(key, keyPath);
      
    }
  },
  watch: {
    loginAgain(val, oldVal) {
      if (val == true) {
        this.delCookie("check_login_fail");
        this.$router.push({ path: "login" });
      }
    }
  }
};
</script>
<style>
#nav {
  border-bottom: solid 1px #e6e6e6;
}
.el-menu {
  border: none !important;
}
</style>