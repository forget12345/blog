<template>
  <div class="hello">
    <Nav id=1></Nav>
    <div
      id="editor"
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
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
/* .w-e-text-container{
height: 600px !important;
} */
</style>
