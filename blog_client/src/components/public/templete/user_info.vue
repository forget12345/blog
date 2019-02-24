<template>
  <div>
    <div class="infolist ">
      <img
        id="user_img"
        src="/static/logo.ico"
        alt=""
      >
      <div id="user_brief_info">
        <div id="user_name">TimeYuLi</div>
        <div> 刚刚开始想做个产品，但是后来不知怎么就开始写代码了!平时喜欢逼逼叨，但不碎碎念。</div>
      </div>
      <div style="clear:both"></div>
      <div id="share">
        <a href="https://github.com/forget12345">GitHub:https://github.com/</a>
      </div>
    </div>

    <el-card class="box-card infolist">
      <div
        class="el-icon-document"
        style="margin-bottom: 10px;font-weight: bold;"
      >独立作品</div>
      <div
        v-for="o in 4"
        :key="o"
        class="text item"
        style="margin-bottom:2px"
      >
        {{'表白墙 ' + o +'：使用前端后端的技术使用前端后端的技术' }}
      </div>
    </el-card>
    <div class="infolist">
      <div
        class="el-icon-document"
        style="margin-bottom: 10px;font-weight: bold;"
      >Tags</div>
      <div>
        <el-tag style="margin:2px" v-for="one in Category" :key="one.Id">{{one.name}}</el-tag>
      </div>

    </div>
  </div>
</template>
<script>
export default {
  name: "HelloWorld",
  props:["Category"],
  data() {
    return {
      msg: "Welcome to Your Vue.js App",
    };
  },
  mounted(){
    console.log(this.getCategory)
  },
  methods: {
    
  }
};
</script>

<style scoped>
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

