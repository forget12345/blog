<template>
  <div id="nav">
    <el-menu
      :default-active="activeIndex2"
      class="el-menu-demo"
      mode="horizontal"
      @select="handleSelect"
    >
        <el-menu-item index="1">博客管理</el-menu-item>
        <el-menu-item index="2">写博客</el-menu-item>
        <el-menu-item index="3">个人信息设置</el-menu-item>
    </el-menu>
    {{id}}
  </div>
</template>
<script>
export default {
  props: ["id"],
  data() {
    return {
      activeIndex: "1",
      activeIndex2: "2"
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
</script>