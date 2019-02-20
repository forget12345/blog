<template>
  <div class="hello">
    <Nav id='index'></Nav>
    <div style="width:1100px;margin:2px auto">
      <el-table
        :data="tableData"
        :stripe='true'
        style="width: 100%"
      >
        <el-table-column
          fixed
          label="日期"
          width="200"
        > <template slot-scope="scope">
            <i class="el-icon-time"></i>
            <span style="margin-left: 10px">{{ scope.row.created }}</span>
          </template>
        </el-table-column>
        <el-table-column
          prop="title"
          label="标题"
          width="250"
        >
        </el-table-column>
        <el-table-column
          prop="introduction"
          label="简要介绍"
          width="400"
        >
        </el-table-column>
        <el-table-column
          prop="categoryId"
          label="类别"
          width="50"
        >
        </el-table-column>
        <el-table-column
          prop="visit"
          label="访客量"
          width="70"
        >
        </el-table-column>
        <el-table-column
          fixed="right"
          label="操作"
          width="300"
        >
          <template slot-scope="scope">
            <el-button
              size="mini"
              @click="handleEdit(scope.$index, scope.row)"
            >预览</el-button>
            <el-button
              size="mini"
              @click="handleEdit(scope.$index, scope.row)"
            >编辑</el-button>
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.$index, scope.row)"
            >删除</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
  </div>
</template>

<script>
import Nav from "./templete/nav";

export default {
  name: "HelloWorld",
  components: { Nav },
  data() {
    return {
      tableData: []
    };
  },
  methods: {
    handleClick(row) {
      console.log(row);
    },
    getArticle: function() {
      var _this = this;
      this.axios.get("manage/article").then(function(response) {
        if (response != false) {
          let data = response.data.data;
          let tmp = [];
          for (let index in data) {
            console.log(index, data[index]);
            tmp.push(data[index]);
          }
          // _this.options = tmp;
          _this.tableData = tmp;
          // console.log(tmp);
        }
      });
    }
  },
  mounted: function() {
    this.getArticle();
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
/* .w-e-text-container{
height: 600px !important;
} */
</style>
