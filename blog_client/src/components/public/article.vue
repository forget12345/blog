<template>
  <div>
    <el-container style="">
      <el-header id="header">
        <Nav :Category="category"></Nav>
      </el-header>
      <el-container style="margin:auto;width:1100px;margin-top:95px">
        <el-main style="width:70%;padding-top:0">
          <div class="infolist" style="width:95%;margin:auto;text-align:left;">
            <h2 style="font-size: 22px;line-height: 1.4;margin-bottom: 14px;">{{show_title}}</h2>
            <div class="show_level_2_title">
              <a
                class="username"
                href="javascript:void(0);"
              >TimeYuLi</a>
              <em class="time">{{show_time}}</em>
            </div>

            <div v-html="show_conten"></div>

          </div>
        </el-main>
        <el-aside
          id="test"
          style="width:330px;"
        >
          <user_info
            v-bind:Category="category"
            style="position: fixed; width: 330px;"
          ></user_info>
        </el-aside>
      </el-container>
      <el-footer>©2019 TimeYuLi</el-footer>
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
      index: 1,
      blog: [],
      page: 1,
      size: 10,
      show_title: "loading",
      show_conten: "loading",
      show_time: "loading"
    };
  },
  mounted: function() {
    // console.log(this.getElementLeft(document.getElementById("test")));
    this.getCategory();
    this.getBlog();
  },
  methods: {
    getCategory: function() {
      var _this = this;
      this.axios.get("public/category").then(function(response) {
        if (response != false) {
          _this.category = response.data.data;
          console.log(response.data.data);
        }
      });
    },
    getBlog: function() {
      var _this = this;
      this.axios
        .get("public/oneblog", {
          params: {
            id: this.$route.query.id
          }
        })
        .then(function(response) {
          if (response != false) {
            var data = response.data.data[0];
            console.log(data.title);
            _this.show_title = data.title;
            _this.show_conten = data.text;
            _this.show_time = data.created;
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
.time {
  color: rgba(0, 0, 0, 0.3);
  display: inline-block;
  vertical-align: middle;
  margin: 0 10px;
  font-size: 15px;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  line-height: 20px;
  word-wrap: break-word;
  word-break: break-all;
  letter-spacing: 0.034em;
}
.username {
  color: #576b95;
  text-decoration: none;
  letter-spacing: 0.034em;
}
.show_level_2_title {
  margin-bottom: 22px;
}
</style>
