<template>
  <div id="nav">
    <el-menu
      :default-active="activeIndex2"
      class="el-menu-demo"
      mode="horizontal"
      @select="handleSelect"
      :router="router"
    >
      <el-menu-item index="index">博客管理</el-menu-item>
      <el-menu-item index="new">写博客</el-menu-item>
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
      router: true
    };
  },
  mounted: function() {
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
  }
};
</script>