<template>
  <div class="lg:pl-72">
    <a-layout-header class="sticky top-0 z-40 flex items-center h-16 px-4 bg-white border-b border-gray-200 shadow-sm">
      <div class="w-px h-6 bg-gray-900/10 lg:hidden" aria-hidden="true"></div>

      <div class="flex flex-1 gap-x-4 lg:gap-x-6">
        <a-form class="relative flex flex-1" action="#" method="GET">
          <a-input placeholder="Search" class="w-full" />
        </a-form>

        <div class="flex items-center gap-x-4 lg:gap-x-6">
          <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-900/10" aria-hidden="true"></div>

          <a-dropdown trigger="click" class="relative">
            <a-button>
              <span class="text-sm font-semibold leading-6 text-gray-900">
                {{ user_name }}
              </span>
              <a-icon type="down" class="ml-2" />
            </a-button>
            <a-menu slot="overlay" class="mt-2.5 w-32 bg-white shadow-lg ring-1 ring-gray-900/5">
              <a-menu-item v-for="item in userNavigation" :key="item.name">
                <a :href="item.href" class="text-sm leading-6 text-gray-900">{{ item.name }}</a>
              </a-menu-item>
            </a-menu>
          </a-dropdown>
        </div>
      </div>
    </a-layout-header>
  </div>
</template>

<script setup>
  import { ref, onMounted } from 'vue';
  import { Layout, Menu, Dropdown, Button, Input, Icon } from 'ant-design-vue';

  const userNavigation = [
    { name: 'Sign out', href: '/logout' }
  ];

  const user_name = ref('');

  onMounted(() => {
    setTimeout(() => {
      user_name.value = 'USER_NAME'; // Replace 'USER_NAME' with the actual user name
    }, 3000);
  });
</script>