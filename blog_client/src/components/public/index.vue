<template>
  <div>
    <el-container style="">
      <el-header id="header">
        <Nav :Category="category"></Nav>
      </el-header>
      <el-container style="margin:auto;width:1100px;margin-top:95px">
        <el-main style="width:70%;padding-top:0">
          <div style="width:95%;margin:auto;text-align:left;">
            <blog_content
              id="blog_content"
              :data="blog"
            ></blog_content>
            <!-- <div
              style="display:block"
              class="el-button el-button--primary"
              type="button"
            >加载更多</div> -->
            <div
              v-if="loading&&begin_data==false"
              id="loading"
            >
              <i
                id="loading_ioc"
                class="el-icon-loading"
              ></i>加载中请稍后
            </div>
            <div
              v-if="not_data&&begin_data==false"
              id="loading"
            >
              <i
                id="loading_ioc"
                class="el-icon-warning"
              ></i>已经全部加载完！
            </div>
            <div
              v-if="begin_data"
              id="loading"
            >
              <i
                id="loading_ioc"
                class="el-icon-warning"
              ></i>没有相关数据，请试试其他的吧！
            </div>
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
      <!-- <el-footer>©2019 TimeYuLi</el-footer> -->
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
      loading: false, //加载中标志
      not_data: false, //不在执行下拉加载
      category: "",
      begin_data: false //一开始就是没有数据
    };
  },
  mounted: function() {
    // console.log(this.getElementLeft(document.getElementById("test")));
    this.getCategory();
    this.getBlog();
    window.addEventListener("scroll", this.handleScroll, true); // 监听（绑定）滚轮滚动事件
    // this.searchByCategory();
  },
  methods: {
    getWindowHeight: function() {
      var windowHeight = 0;
      if (document.compatMode == "CSS1Compat") {
        windowHeight = document.documentElement.clientHeight;
      } else {
        windowHeight = document.body.clientHeight;
      }
      return windowHeight;
    },
    //滚动条到底部的距离
    getScrollBottomHeight: function() {
      return (
        this.getPageHeight() - this.getScrollTop() - this.getWindowHeight()
      );
    },
    //页面高度
    getPageHeight: function() {
      return document.querySelector("html").scrollHeight;
    },
    //滚动条顶 高度
    getScrollTop: function() {
      var scrollTop = 0,
        bodyScrollTop = 0,
        documentScrollTop = 0;
      if (document.body) {
        bodyScrollTop = document.body.scrollTop;
      }
      if (document.documentElement) {
        documentScrollTop = document.documentElement.scrollTop;
      }
      scrollTop =
        bodyScrollTop - documentScrollTop > 0
          ? bodyScrollTop
          : documentScrollTop;
      return scrollTop;
    },
    handleScroll: function() {
      console.log();
      if (
        this.getScrollBottomHeight() < 50 &&
        this.loading == false &&
        this.not_data == false
      ) {
        this.loading = true;
        this.page = this.page + 1;
        this.getBlog("push");
      }
    },
    getCategory: function() {
      var _this = this;
      this.axios.get("public/category").then(function(response) {
        if (response != false) {
          _this.category = response.data.data;
          console.log(response.data.data);
        }
      });
    },
    getBlog: function(type = "first") {
      var _this = this;
      console.log(_this.blog);
      this.axios
        .get("public/getblog", {
          params: {
            page: _this.page,
            size: _this.size,
            category: this.$route.query.id
          }
        })
        .then(function(response) {
          if (response != false) {
            if (response.data.data.length == 0) {
              _this.not_data = true;
            }
            if (type == "first") {
              _this.blog = response.data.data;
              if (_this.blog.length == 0) {
                _this.begin_data = true;
              }
            } else {
              _this.blog = _this.blog.concat(response.data.data);
              _this.loading = false;
            }
          }
        });
    },
    destroyed: function() {
      window.removeEventListener("scroll", this.handleScroll); //  离开页面清除（移除）滚轮滚动事件
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
#loading {
  font-family: inherit;
  text-align: center;
  color: #8a8a8a;
  font-size: 22px;
}
#loading_ioc {
  color: #2196f3;
  margin-right: 5px;
}
</style>
