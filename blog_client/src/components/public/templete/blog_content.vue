<template>
  <div>
    <div
      v-for="a in data"
      :key="String(a.Id)"
      style="margin-bottom:25px"
      class="infolist"
      @click="article(String(a.Id))"
    >
      <h2 style="margin: 3px 0 5px 0;">{{a.title}}</h2>
      <div style="color: #b9b8b7;font-size: 13px">{{a.created}}<span
          style="line-height:25px;height:25px;margin-left: 5px;"
          class="el-tag"
        >{{a.name}}</span>
      </div>
      <div style="color: #92908c;text-indent: 2rem;font-family: -webkit-body;margin: 7px 0;">
       {{a.introduction}}</div>
      <i class="el-icon-view"></i><span style="margin-left:5px;color:#b9b8b7">{{a.visit}}</span>
      <!-- <i class="el-icon-service"></i><span style="margin-left:5px;color:#b9b8b7">99</span> -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["data"],
  data() {
    return {};
  },
  mounted: function() {
    console.log(this.data);
  },
  methods: {
    handleSelect(key, keyPath) {
      // console.log(key, keyPath);
    },article(id){
      this.$router.push({
        path: "/article",
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

