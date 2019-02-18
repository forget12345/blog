<template>
  <div class="hello">
    <Nav id='new'></Nav>
    <div class="main">
      <div class="title">

        <el-input
          style="width:70%;margin:30px 2.5%;float:left"
          v-model="input"
          placeholder="请输入标题"
          minlength=1
          maxlength=50
        ></el-input>
        <el-select
          style="width:20%;margin:30px 2.5%;float:left"
          v-model="value"
          clearable
          placeholder="请选择"
        >
          <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.value"
          >
          </el-option>
        </el-select>
        <div style="clear:both"></div>
        <el-input
          style="width:95%;margin:0px 2.5% 5px 2.5%;float:left"
          type="textarea"
          :rows="3"
          minlength=1
          maxlength=150
          placeholder="请输入简要介绍，否则默认抓取前50位置，最多150个字符"
        ></el-input>
      </div>
      <div
        id="editor"
        ref="editor"
        style="text-align:left;min-height:500px;"
      ></div>
      <button v-on:click="getContent">保存文件</button>
    </div>
  </div>
</template>

<script>
import Nav from "./templete/nav";
import E from "wangeditor";

export default {
  name: "HelloWorld",
  components: { Nav },
  data() {
    return {
      editorContent: "",
      options: [
        {
          value: "选项1",
          label: "黄金糕"
        },
        {
          value: "选项2",
          label: "双皮奶"
        },
        {
          value: "选项3",
          label: "蚵仔煎"
        },
        {
          value: "选项4",
          label: "龙须面"
        },
        {
          value: "选项5",
          label: "北京烤鸭"
        }
      ],
      value: ""
    };
  },
  methods: {
    getContent: function() {
      alert(this.editorContent);
    },
    getCategory: function() {
      this.axios.get("manage/category").then(function(response) {
        console.log(response);
      });
    }
  },
  mounted() {
    var editor = new E(this.$refs.editor);
    editor.customConfig.uploadImgServer = "/upload";
    editor.customConfig.onchange = html => {
      this.editorContent = html;
    };
    editor.create();
    console.log(window.innerHeight);
    this.getCategory();
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.w-e-text-container {
  height: none !important;
  min-height: 520px !important;
}
.el-select-dropdown {
  z-index: 10002 !important;
}
.main {
  width: 1100px;
  margin: auto;
}
.title {
  height: 200px;
  border: 1px solid #ccc;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  margin-top: 3px;
  border-bottom: none;
}
</style>
