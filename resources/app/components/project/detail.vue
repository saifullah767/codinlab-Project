<template>
    <div class="min-h-full">
      <Disclosure as="nav" class="bg-white shadow-sm" v-slot="{ open }">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
             
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
              <button type="button" class="relative p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="absolute -inset-1.5" />
              </button>
  
              <!-- Profile dropdown -->
              <Menu as="div" class="relative ml-3">
                <div>
                  <MenuButton class="relative flex text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="absolute -inset-1.5" />
                    <div class="text-base font-medium text-gray-800">{{ user.name }}</div>
                  </MenuButton>
                </div>
                <transition enter-active-class="transition duration-200 ease-out" enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                  <MenuItems class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                      <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
            <div class="flex items-center -mr-2 sm:hidden">
              <!-- Mobile menu button -->
              <DisclosureButton class="relative inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="absolute -inset-0.5" />
                <span class="sr-only">Open main menu</span>
                <Bars3Icon v-if="!open" class="block w-6 h-6" aria-hidden="true" />
                <XMarkIcon v-else class="block w-6 h-6" aria-hidden="true" />
              </DisclosureButton>
            </div>
          </div>
        </div>
  
        <DisclosurePanel class="sm:hidden">
         
          <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
              <div class="ml-3">
                <div class="text-base font-medium text-gray-800">{{ user.name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ user.email }}</div>
              </div>
              <button type="button" class="relative flex-shrink-0 p-1 ml-auto text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="absolute -inset-1.5" />
                <span class="sr-only">View notifications</span>
              </button>
            </div>
            <div class="mt-3 space-y-1">
              <DisclosureButton v-for="item in userNavigation" :key="item.name" as="a" :href="item.href" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">{{ item.name }}</DisclosureButton>
            </div>
          </div>
        </DisclosurePanel>
      </Disclosure>
  
      <div class="py-10">
        <header>
          <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900 uppercase">{{project.name}}</h1>
            <h1 class="font-semibold leading-tight tracking-tight text-gray-600 text-normal">{{project.description}}</h1>
          </div>
        </header>
        <main>
          <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <section aria-labelledby="notes-title">
            <div class="bg-white shadow-lg sm:overflow-hidden sm:rounded-lg">
              <div class="divide-y divide-gray-200">
                <div class="px-4 py-5 sm:px-6">
                  <h2 id="notes-title" class="text-lg font-medium text-gray-900">Comments</h2>
                </div>
                <div class="px-4 py-6 sm:px-6">
                  <ul role="list" class="space-y-8">
                    <li v-for="comment in comments" :key="comment.id">
                      <div class="flex space-x-3">
                        <div>
                          <div class="text-sm">
                            <a href="#" class="font-medium text-gray-900">{{ comment.user_name }}</a>
                          </div>
                          <div class="mt-1 text-sm text-gray-700">
                            <p>{{ comment.comment }}</p>
                          </div>
                          <div class="mt-2 space-x-2 text-sm">
                            <span class="font-medium text-gray-500">{{ comment.created_at }}</span>
                            {{ ' ' }}
                            <span class="font-medium text-gray-500">&middot;</span>
                            {{ ' ' }}
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="px-4 py-6 bg-gray-50 sm:px-6">
                <div class="flex space-x-3">
                  <div class="flex-1 min-w-0">
                    <form action="#">
                      <div>
                        <label for="comment" class="sr-only">Comment</label>
                        <textarea v-model="new_comment" rows="3" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Add a note" />
                      </div>
                      <div class="flex items-center justify-end mt-3">
                        <button type="button" @click="addComment" class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Comment</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>          
          </div>
        </main>
      </div>
    </div>
  </template>
  
<script setup>
    import { ref } from 'vue';
    import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
    import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';
    import { createComment } from './api.js';
  
    const project = PROJECT;
    const comments = COMMENTS;
    const new_comment = ref('');
    const user = USER

    const userNavigation = [
        { name: 'Sign out', href: '#' },
    ]

    const addComment = () => {
        const data  = {
            user_id: user.id,
            project_id: project.id,
            comment: new_comment.value
        }

        createComment(data)
        .then((res)=>{
            console.log('res::', res)
            window.location.href = window.location.href
        })
        .catch((err)=>{
            console.log('err::', err)
        })
    }

    // const comments = [
    //     {
    //         id: 1,
    //         name: 'Leslie Alexander',
    //         date: '4d ago',
    //         body: 'Ducimus quas delectus ad maxime totam doloribus reiciendis ex. Tempore dolorem maiores. Similique voluptatibus tempore non ut.',
    //     },
    //     {
    //         id: 2,
    //         name: 'Michael Foster',
    //         date: '4d ago',
    //         body: 'Et ut autem. Voluptatem eum dolores sint necessitatibus quos. Quis eum qui dolorem accusantium voluptas voluptatem ipsum. Quo facere iusto quia accusamus veniam id explicabo et aut.',
    //     },
    //     {
    //         id: 3,
    //         name: 'Dries Vincent',
    //         date: '4d ago',
    //         body: 'Expedita consequatur sit ea voluptas quo ipsam recusandae. Ab sint et voluptatem repudiandae voluptatem et eveniet. Nihil quas consequatur autem. Perferendis rerum et.',
    //     },
    // ]
</script>