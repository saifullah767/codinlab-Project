<template>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">User</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all users.</p>
      </div>
      <div>
        <button @click="is_Modal = true" type="button" class="rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Create User
        </button>
      </div>
    </div>
    <div class="flow-root mt-8">
      <div v-if="users.length">
        <a-table :dataSource="users" :columns="columns" rowKey="email" bordered :pagination="false">
          <template #bodyCell="{ column, record }">
            <template v-if="column.key === 'email'">
              <span>{{ record.email }}</span>
            </template>
          </template>
        </a-table>
      </div>
      <EmptyState v-else />
    </div>
  </div>
  <create
    v-if="is_Modal"
    :data = "meta_data"
    @close="is_Modal = false"
  />
</template>

<script setup>
    import { ref } from 'vue';
    import EmptyState from "../utils/EmptyState.vue";
    import create from './create.vue';

    const users = ref(USERS);
    const is_Modal = ref(false);
    const meta_data = ref({});

    function openModal (data) {
        meta_data.value = data
        is_Modal.value = true
    }

    const columns = [
    {
            title: 'name',
            dataIndex: 'name',
            key: 'name',
            class: 'text-sm font-medium text-gray-900 whitespace-nowrap',
        },
        {
            title: 'Email',
            dataIndex: 'email',
            key: 'email',
            class: 'text-sm font-medium text-gray-900 whitespace-nowrap',
        },

        {
            title: 'Action',
            key: 'action',
            class: 'text-sm font-medium text-gray-900 whitespace-nowrap',
        },
    ];



</script>

<style scoped>
/* Adjust the class names for Ant Design styles */
  .ant-table {
    .ant-table-thead > tr > th {
      background-color: #f9fafb;
      color: #374151;
      font-weight: 600;
    }
  }
</style>
