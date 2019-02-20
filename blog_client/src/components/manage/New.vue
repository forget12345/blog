<template>
  <div class="hello">
    <Nav id='new'></Nav>
    <div class="main">
      <div class="title">

        <el-input
          style="width:70%;margin:30px 2.5%;float:left"
          v-model="title"
          placeholder="请输入标题"
          minlength=1
          maxlength=50
        ></el-input>
        <div
          @click="addNewcCategory"
          style="width:2%;margin:40px 0.5% 40px 2%;float:left"
          class="el-icon-circle-plus-outline"
        ></div>
        <el-select
          style="width:calc( 20% - 2% );margin:30px 2.5% 30px 0;float:left"
          v-model="value"
          :id="test"
          clearable
          placeholder="请选择"
        >
          <el-option
            v-for="item in options"
            :key="item.Id"
            :label="item.name"
            :value="item.Id"
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
          v-model="introduction"
        ></el-input>
      </div>
      <div
        id="editor"
        ref="editor"
        style="text-align:left;min-height:500px;"
      ></div>
      <button v-on:click="add">保存文件</button>
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
      options: "",
      value: "",
      input: "",
      title: window.localStorage["title"],
      introduction: window.localStorage["introduction"],
      test: ""
    };
  },
  methods: {
    getContent: function() {
      alert();
    },
    getCategory: function() {
      var _this = this;
      this.axios.get("manage/category").then(function(response) {
        if (response != false) {
          let data = response.data.data;
          let tmp = [];
          for (let index in data) {
            console.log(index, data[index]);
            tmp.push(data[index]);
          }
          // _this.options = tmp;
          _this.options = tmp;
          console.log(_this.options);
        }
      });
    },
    add() {
      var _this = this;
      this.axios
        .post("/manage/article", {
          title: this.title,
          introduction: this.introduction,
          id: this.value,
          text: this.editorContent
        })
        .then(function(response) {
          console.log(response);
          if (response != false) {
            _this.$message({
              message: "发布成功",
              type: "success"
            });
            _this.title = "";
            _this.introduction = "";
            _this.value = "";
            _this.editorContent = "";
            window.localStorage.clear();
        
          }
        });
    },
    addNewcCategory() {
      this.$prompt("请输入类别名称", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        inputPattern: /[a-zA-Z0-9]{1,15}?/,
        inputErrorMessage: "格式不正确"
      })
        .then(({ value }) => {
          var _this = this;
          this.axios
            .post("manage/category", {
              name: value
            })
            .then(function(response) {
              if (response != false) {
                _this.$message({
                  message: "增加类别成功，增加类别为: " + value,
                  type: "success"
                });
              }
            });
          this.getCategory();
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "取消输入"
          });
        });
    }
  },
  mounted() {
    var editor = new E(this.$refs.editor);
    editor.customConfig.uploadImgServer =
      "/api/api/public/index.php/manage/upload";
    editor.customConfig.uploadFileName = "images";
    editor.customConfig.onchange = html => {
      this.editorContent = html;
    };
    editor.create();
    editor.txt.html(window.localStorage["blog"]);
    this.getCategory();
  },
  watch: {
    editorContent(val, oldVal) {
      console.log(val);
      if (val != "") {
        window.localStorage["blog"] = val;
      }
    },
    title(val, oldVal) {
      console.log(val);
      if (val != "") {
        window.localStorage["title"] = val;
      }
    },
    introduction(val, oldVal) {
      console.log(val);
      if (val != "") {
        window.localStorage["introduction"] = val;
      }
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.w-e-text-container {
  height: none !important;
  min-height: 520px !important;
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
