<template>
  <div class="hello">
    <Nav id='PersonalInfoSet'></Nav>
    <div
      id="editor"
      ref="editor"
      style="text-align:left"
    ></div>
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
