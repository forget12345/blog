<template>
  <div>
    <div
    v-for="a in data"
      style="margin-bottom:25px"
      class="infolist"
    >
      <h2 style="margin: 3px 0 5px 0;">ThinkPHP初次使用记录</h2>
      <div style="color: #b9b8b7;font-size: 13px;">2019-02-24 17:56 <span
          style="line-height:25px;height:25px"
          class="el-tag"
        >镖旗</span>
      </div>
      <div style="color: #92908c;text-indent: 2rem;font-family: -webkit-body;margin: 7px 0;">
        经常会有人被strtotime结合-1 month, +1 month, next month的时候搞得很困惑, 然后就会觉得这个函数有点不那么靠谱, 动不动就出问题. 用的时候就会很慌…这不, 刚刚就有人在微博上又问我:
        鸟哥，今天是2018-07-31 执行代码:
        date("Y-m-d",strtotime("-1 month"))
        怎么输出是2018-07-01?
        好的吧, 虽然这个问题看起来很迷惑, 但从内部逻辑上来说呢, 其实是”对”的, 你先别着急哈, 让我慢慢讲</div>
      <i class="el-icon-view"></i><span style="margin-left:5px;color:#b9b8b7">99</span>
      <i class="el-icon-service"></i><span style="margin-left:5px;color:#b9b8b7">99</span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["data"],
  data() {
    return {
     
    };
  },
  mounted: function() {
    console.log(this.data)
  },
  methods: {
    handleSelect(key, keyPath) {
      // console.log(key, keyPath);
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

