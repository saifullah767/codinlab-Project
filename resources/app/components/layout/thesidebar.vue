<template>
  <div>
    <!-- Mobile Sidebar -->
    <a-drawer
      v-model:visible="sidebarOpen"
      placement="left"
      closable
      :title="drawerTitle"
      class="lg:hidden"
      :width="280"
      :headerStyle="{ backgroundColor: '#001529', color: '#fff' }"
    >
      <a-space direction="vertical" class="w-full h-full">
        <a-space class="w-full">
          <img class="w-auto h-8 rounded-[100px]" :src="base_url+'images/logo-icon.svg'" alt="Mafire" />
        </a-space>
        <a-menu
          mode="vertical"
          theme="dark"
          :defaultSelectedKeys="[currentMenuItem]"
          class="flex-1"
        >
          <a-menu-item
            v-for="item in navigation"
            :key="item.name"
            :icon="item.icon"
            :class="{ 'ant-menu-item-selected': item.current }"
          >
            <a :href="item.href">{{ item.name }}</a>
          </a-menu-item>
          <a-menu-item>
            <a :href="#" class="flex items-center">
              <a-icon type="setting" class="mr-2" />
              Settings
            </a>
          </a-menu-item>
        </a-menu>
      </a-space>
    </a-drawer>

    <!-- Desktop Sidebar -->
    <a-layout-sider
      class="hidden lg:flex lg:w-72 lg:flex-col"
      :style="{ backgroundColor: '#001529' }"
    >
      <div class="flex flex-col px-6 pb-4 overflow-y-auto">
        <div class="flex items-center h-16 shrink-0">
          <img class="w-auto h-8 rounded-[100px]" :src="base_url+'images/logo-icon.svg'" alt="Mafire" />
        </div>
        <a-menu
          mode="vertical"
          theme="dark"
          :defaultSelectedKeys="[currentMenuItem]"
          class="flex-1 mt-4"
        >
          <a-menu-item
            v-for="item in navigation"
            :key="item.name"
            :icon="item.icon"
            :class="{ 'ant-menu-item-selected': item.current }"
          >
            <a :href="item.href">{{ item.name }}</a>
          </a-menu-item>
        </a-menu>
      </div>
    </a-layout-sider>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Layout, Drawer, Menu, Space, Icon } from 'ant-design-vue';

const base_url = 'BASE_URL';

const navigation = [
  { name: 'Dashboard', href: '/', icon: 'home', current: true },
  { name: 'Projects', href: '/subscriber', icon: 'user', current: false },
  { name: 'Users', href: '/testimonial', icon: 'folder', current: false },
];

const sidebarOpen = ref(false);
const drawerTitle = 'Menu';
const currentMenuItem = computed(() => {
  return navigation.find(item => item.current)?.name || '';
});
</script>

<style scoped>
  /* Custom styles for Ant Design components */
  .ant-menu-item-selected {
    background-color: #1890ff;
    color: #fff;
  }
</style>
