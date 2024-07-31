<template>

  <!-- <TheSidebar/>

  <TheHeader/> -->

  <div>
  <TransitionRoot as="template" :show="sidebarOpen">
    <Dialog as="div" class="relative z-50 lg:hidden" @close="sidebarOpen = false">
      <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-900/80" />
      </TransitionChild>

      <div class="fixed inset-0 flex">
        <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
          <DialogPanel class="relative flex flex-1 w-full max-w-xs mr-16">
            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
              <div class="absolute top-0 flex justify-center w-16 pt-5 left-full">
                <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                  <span class="sr-only">Close sidebar</span>
                  <XMarkIcon class="w-6 h-6 text-white" aria-hidden="true" />
                </button>
              </div>
            </TransitionChild>
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-gray-900 grow gap-y-5 ring-1 ring-white/10">
              <div class="flex items-center h-16 shrink-0">
              </div>
              <nav class="flex flex-col flex-1">
                <ul role="list" class="flex flex-col flex-1 gap-y-7">
                  <li>
                    <ul role="list" class="-mx-2 space-y-1">
                      <li v-for="item in navigation" :key="item.name">
                        <a :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                          <component :is="item.icon" class="w-6 h-6 shrink-0" aria-hidden="true" />
                          {{ item.name }}
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </DialogPanel>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>

  <!-- Static sidebar for desktop -->
  <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-gray-900 grow gap-y-5">
      <div class="flex items-center h-16 shrink-0">
      </div>
      <nav class="flex flex-col flex-1">
        <ul role="list" class="flex flex-col flex-1 gap-y-7">
          <li>
            <ul role="list" class="-mx-2 space-y-1">
              <li v-for="item in navigation" :key="item.name">
                <a :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                  <component :is="item.icon" class="w-6 h-6 shrink-0" aria-hidden="true" />
                  {{ item.name }}
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="lg:pl-72">
    <div class="sticky top-0 z-40 flex items-center h-16 px-4 bg-white border-b border-gray-200 shadow-sm shrink-0 gap-x-4 sm:gap-x-6 sm:px-6 lg:px-8">
      <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
        <span class="sr-only">Open sidebar</span>
        <Bars3Icon class="w-6 h-6" aria-hidden="true" />
      </button>

      <!-- Separator -->
      <div class="w-px h-6 bg-gray-900/10 lg:hidden" aria-hidden="true" />

      <div class="flex self-stretch flex-1 gap-x-4 lg:gap-x-6">
        <form class="relative flex flex-1" action="#" method="GET">
        </form>
        <div class="flex items-center gap-x-4 lg:gap-x-6">


          <!-- Separator -->
          <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-900/10" aria-hidden="true" />

          <!-- Profile dropdown -->
          <Menu as="div" class="relative">
            <MenuButton class="-m-1.5 flex items-center p-1.5">
              <span class="sr-only">Open user menu</span>
              <span class="flex items-center">
                <span class="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">{{ user.name }}</span>
                <ChevronDownIcon class="w-5 h-5 ml-2 text-gray-400" aria-hidden="true" />
              </span>
            </MenuButton>
            <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
              <MenuItems class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                  <a :href="item.href" :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">{{ item.name }}</a>
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </div>
      </div>
    </div>

    <main class="py-10">
      <div class="px-4 sm:px-6 lg:px-8">
        <slot> </slot>
      </div>
    </main>
  </div>
</div>

</template>

<script setup>
  import { ref } from 'vue'
  import {Dialog,DialogPanel,Menu,MenuButton,MenuItem,MenuItems,TransitionChild,TransitionRoot } from '@headlessui/vue'
  import {Bars3Icon,BellIcon,CalendarIcon,ChartPieIcon,Cog6ToothIcon,DocumentDuplicateIcon,FolderIcon,HomeIcon,UsersIcon,XMarkIcon} from '@heroicons/vue/24/outline'
  import { ChevronDownIcon, MagnifyingGlassIcon } from '@heroicons/vue/20/solid'

  const base_url = BASE_URL;
  const user = ref(USER_);

  console.log( 'user::' , user.value );

  const navigation = [
      { name: 'Projects', href: '/projects', icon: UsersIcon, current: false },
      ...(!user.value.is_admin ? [] : [{ name: 'Users', href: '/users', icon: FolderIcon, current: false }]),
  ];
  const userNavigation = [ { name: 'Sign out', href: '/logout' } ]; 

  const sidebarOpen = ref(false)
</script>