<script setup lang="ts">
import {ElForm} from "element-plus";
import {ref} from "vue";

interface TestObj {
  id: number;
  name: string;
}

const props = defineProps<{
  test_value: string;
  test_obj: TestObj;
  test_array?: TestObj[];
  test_count: number;
}>();

const form = ref<ElForm>(null);
const count = ref<Number>(props.test_count);

const formData = ref<{
  test_value: string;
  name: string | null;
}>({
  test_value: props.test_value,
  name: null
});

const formRules = {
  name: [
    {required: true, message: '请输入名称', trigger: 'blur'},
    {min: 3, max: 10, message: '长度在 3 到 10 个字符之间', trigger: 'blur'}
  ],
  test_value: [
    {required: true, message: '请输入测试值', trigger: 'blur'}
  ]
};

const validateForm = () => {
  form.value?.validate((valid) => {
    if (valid) {
      console.log('验证通过');
    } else {
      console.error('验证失败');
      return false;
    }
  });
};


</script>

<template>
  <div class="p-[20px]">
    <el-card class="py-5">
      <el-form ref="form" :model="formData" :rules="formRules" label-width="100px">
        <el-form-item label="测试对象" prop="name">
          <el-input v-model="formData.name" placeholder="请输入名称"/>
        </el-form-item>
        <el-form-item label="计数器xx">
          <div class="flex items-center gap-5">
            <el-input-number v-model="count" :min="0" :max="100"/>
            <el-button @click="count++">增加</el-button>
          </div>
        </el-form-item>
        <el-form-item label="测试值">
          <el-input v-model="props.test_value" placeholder="请输入测试值"/>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="validateForm">验证</el-button>
          <el-button @click="form.resetFields()">重置</el-button>
        </el-form-item>
      </el-form>

      <el-table :data="test_array" class="mt-5">
        <el-table-column prop="id" label="ID" width="180"/>
        <el-table-column prop="name" label="名称" width="180"/>
        <el-table-column label="操作">
          <template #default="scope">
            <el-button @click="() => console.log(scope.row)">查看</el-button>
          </template>
        </el-table-column>
      </el-table>
    </el-card>
  </div>
</template>

<style scoped>

</style>