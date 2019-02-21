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
          width="550"
        >
        </el-table-column>

        <el-table-column
          prop="categoryId"
          label="类别"
          width="50"
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
              @click="handleShow(scope.$index, scope.row)"
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
    <el-dialog
      :visible.sync="centerDialogVisible"
      width="1100px"
      center
      top="20px"
    >
      <h2 style="font-size: 22px;line-height: 1.4;margin-bottom: 14px;">{{show_title}}</h2>
      <div class="show_level_2_title">
        <a
          class="username"
          href="javascript:void(0);"
        >TimeYuLi</a>
        <em class="time">{{show_time}}</em>
      </div>

      <div v-html="show_conten"></div>
      <span
        slot="footer"
        class="dialog-footer"
      >
        <el-button @click="centerDialogVisible = false">关闭</el-button>
        <el-button
          type="primary"
          @click="centerDialogVisible = false"
        >修改</el-button>
        <el-button
          type="danger"
          @click="centerDialogVisible = false"
        >删除</el-button>

      </span>
    </el-dialog>
  </div>

</template>

<script>
import Nav from "./templete/nav";

export default {
  name: "HelloWorld",
  components: { Nav },
  data() {
    return {
      tableData: [],
      centerDialogVisible: false,
      show_title: "",
      show_conten: "",
      show_time: ""
    };
  },
  methods: {
    handleEdit(row, data) {
      this.$router.push({
        path: "/manage/new",
        query: {
          id: data.Id
        }
      });
    },
    handleShow(row, data) {
      console.log(data);
      this.show_title = data.title;
      this.show_conten = data.text;
      this.show_time = data.created;
      this.centerDialogVisible = true;
    },
    handleDelete(row, data) {
      this.$confirm("此操作将删除该文件博客, 是否继续?", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning"
      })
        .then(() => {
          this.deleteArticle(data.Id);
          this.$message({
            type: "success",
            message: "删除成功!"
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "已取消删除"
          });
        });
    },
    deleteArticle(id) {
      var _this = this;
      console.log(id);
      this.axios
        .delete("/manage/article", { data: { id: id } })
        .then(function(response) {
          console.log(response);
          if (response != false) {
          }
        });
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
.time {
  color: rgba(0, 0, 0, 0.3);
  display: inline-block;
  vertical-align: middle;
  margin: 0 10px;
  font-size: 15px;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  line-height: 20px;
  word-wrap: break-word;
  word-break: break-all;
  letter-spacing: 0.034em;
}
.username {
  color: #576b95;
  text-decoration: none;
  letter-spacing: 0.034em;
}
.show_level_2_title {
  margin-bottom: 22px;
}
</style>
