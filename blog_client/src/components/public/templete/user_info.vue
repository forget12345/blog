<template>
  <div>
    <div class="infolist ">
      <img
        v-if="UserInfo.img"
        id="user_img"
        src="/static/logo.ico"
        alt=""
      >
      <img
        v-else
        id="user_img"
        src="/static/logo.ico"
        alt=""
      >
      <div id="user_brief_info">
        <div id="user_name">{{UserInfo.nickname}}</div>
        <div> {{UserInfo.say}}</div>
      </div>
      <div style="clear:both"></div>
      <div id="share">
        <a :href="UserInfo.github"> {{UserInfo.github}}</a>
      </div>
    </div>

    <el-card class="box-card infolist">
      <div
        class="el-icon-document"
        style="margin-bottom: 10px;font-weight: bold;"
      >独立作品</div>
      <div
        v-for="o in dataworks"
        :key="o.Id"
        class="text item"
        style="margin-bottom:3px;color: #39484ea1;"
      >
        <a
          style="cursor: default;color:cadetblue"
          :href="o.url"
        >{{o.name}}</a>:<span>{{o.Introduction}}</span>
      </div>
    </el-card>
    <div class="infolist">
      <div
        class="el-icon-document"
        style="margin-bottom: 10px;font-weight: bold;"
      >Tags</div>
      <div>
        <el-tag
          @click="findCategory(one.Id)"
          style="margin:2px;    cursor: default;"
          v-for="one in Category"
          :key="one.Id"
        >{{one.name}}</el-tag>
      </div>

    </div>
  </div>
</template>
<script>
export default {
  name: "HelloWorld",
  props: ["Category"],
  data() {
    return {
      dataworks: [],
      UserInfo: []
    };
  },
  mounted() {
    this.works();
    this.getUserInfo();
  },
  methods: {
    getUserInfo: function() {
      var _this = this;
      this.axios.get("public/userinfo").then(function(response) {
        if (response != false) {
          console.log(response.data.data);
          _this.UserInfo=response.data.data
        }
      });
    },
    findCategory: function(id) {
      // this.$emit('searchByCategory');
      this.$router.push({
        path: "/tmp",
        query: {
          id: id
        }
      });
      // this.$router.go(0);
    },
    works: function() {
      var _this = this;
      this.axios.get("public/works").then(function(response) {
        if (response != false) {
          console.log(response.data.data);
          _this.dataworks = response.data.data;
        }
      });
    }
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

