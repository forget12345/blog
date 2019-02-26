<template>
  <div>
    <el-container style="">
      <el-header id="header">
        <Nav :Category="category" ></Nav>
      </el-header>
      <el-container style="margin:auto;width:1100px;margin-top:95px">
        <el-main style="width:70%;padding-top:0">
          <div style="width:95%;margin:auto;text-align:left;" class="infolist">
            <el-input v-model="input" placeholder="请输入访问口令"></el-input>
          </div>
        </el-main>
        <el-aside
          id="test"
          style="width:330px;"
        >
          <user_info  v-bind:Category="category"  style="position: fixed; width: 330px;"></user_info>
        </el-aside>
      </el-container>
    </el-container>
  </div>
</template>

<script>
import Nav from "./templete/nav";
import blog_content from "./templete/blog_content";
import user_info from "./templete/user_info";

export default {
  name: "HelloWorld",
  components: { Nav, user_info, blog_content },
  data() {
    return {
      category: [],
      index:1
    };
  },
  mounted: function() {
    // console.log(this.getElementLeft(document.getElementById("test")));
    this.getCategory()
  },
  methods: {
    getCategory: function() {
      var _this = this;
      this.axios.get("public/category").then(function(response) {
        if (response != false) {
          _this.category=response.data.data;
          console.log(response.data.data)
        }
      });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.el-menu .el-menu--horizontal {
  /* border: none */
}
.el-menu {
  border: none !important;
}
</style>

<style scoped>
#header {
  height: 61px !important;
  padding: 0;
  margin: auto;
  width: 100%;
  border-bottom: solid 1px #e6e6e6;
  box-shadow: 0 0 45px 0 rgba(16, 16, 16, 0.1);
  /* transform: translateY(-100%); */
  transition: transform 0.3s linear;
  margin-bottom: 45px;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  position: fixed;
  z-index: 10;
  right: 0;
  left: 0;
  top: 0;
}
.infolist {
  -webkit-box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(16, 16, 16, 0.1);
  border-radius: 10px;
  text-align: left;
  padding: 10px;
  margin-bottom: 10px;
}
#user_img {
  width: 70px;
  text-align: left;
  border-radius: 50%;
  float: left;
  border: 1px solid white;
  border-size: border-box;
}
#user_brief_info {
  width: 230px;
  margin-left: 6px;
  vertical-align: middle;
  float: left;
}
#user_name {
  font-size: 15px;
  font-weight: 700;
  padding-bottom: 6px;
  font-family: Helvetica, Hiragino Sans GB;
}
#share {
  margin-top: 15px;
  margin-left: 5px;
}
#share a {
  color: cadetblue;
}
/* #logo:hover{
   transition: all 0.6s;

   transform: scale(1.4);
} */
</style>
