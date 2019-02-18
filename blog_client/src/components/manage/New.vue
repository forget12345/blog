<template>
  <div class="hello">
    <Nav id='new'></Nav>
    <div id="editor"
      ref="editor"
      style="text-align:left"
      
    ></div>
    <button v-on:click="getContent">保存文件</button>
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
      editorContent: ""
    };
  },
  methods: {
    getContent: function() {
      alert(this.editorContent);
    }
  },
  mounted() {
    var editor = new E(this.$refs.editor);
    editor.customConfig.uploadImgServer = '/upload'
    editor.customConfig.onchange = html => {
      this.editorContent = html;
    };
    editor.create();
    console.log(window.innerHeight);
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
/* .w-e-text-container{
height: 600px !important;
} */
</style>
