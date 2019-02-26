<template>
  <div id="nav">
    <el-menu
      :default-active="activeIndex"
      class="el-menu-demo"
      mode="horizontal"
      style="width:1100px;margin:auto"
      @select="handleSelect"
    >
      <img
        id="logo"
        src="/static/logo.ico"
        alt=""
      >
      <div id="name">blog</div>
      <el-menu-item
        @click="article()"
        index="1"
      >首页</el-menu-item>
      <el-submenu index="2">
        <template
          id="sss"
          slot="title"
        >分类Tags</template>
        <el-menu-item
          style="margin:2px"
          v-for="one in Category"
          :key="String(one.Id)"
          :index="String(one.Id)+'_child'"
          @click="article(String(one.Id))"
        >{{one.name}}</el-menu-item>

      </el-submenu>
      <el-menu-item
        @click="router_go('collection')"
        index="collection"
      >收藏室</el-menu-item>
      <el-menu-item
        @click="router_go('remuse')"
        index="remuse"
      >简历</el-menu-item>

    </el-menu>
  </div>
</template>
<script>
export default {
  props: ["Category"],
  data() {
    return {
      activeIndex: "",
      router: true
    };
  },
  mounted: function() {
    // console.log($route.path)
    console.log()
    if(this.$route.path=='/remuse'){
      this.activeIndex="remuse"
    }else if(this.$route.path=='/collection'){
      this.activeIndex="collection"
    }else{
       this.activeIndex="1"
    }
  },
  methods: {
    handleSelect(key, keyPath) {
      // console.log(key, keyPath);
    },
    router_go(path) {
      this.$router.push({
        path: path
      });
    },
    article(id) {
      this.$router.push({
        path: "/tmp",
        query: {
          id: id
        }
      });
    }
  },
  watch: {}
};
</script>
<style scoped>
#logo {
  border: 0;
  float: left;
  height: 45px;
  margin-top: 7.5px;
  border-radius: 50%;
}
#name {
  float: left;
  line-height: 61px;
  float: left;
  height: 60px;
  margin: 0 10px;
  color: #777;
  font-size: 18px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
</style>
