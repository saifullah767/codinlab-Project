<template>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Projects</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
      </div>
      <div>
        <button @click="is_Modal = true" type="button" class="rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Create Project
        </button>
      </div>

    </div>
    <div class="flow-root mt-8">
      <div v-if="projects.length" class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                 
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="(project, index) in projects" :key="index" class="cursor-pointer ">
                  <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                    <a :href="'/project/'+project.id" target="_blank" rel="noopener noreferrer">
                      {{ project.name }}
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <EmptyState v-else />
    </div>
  </div>
  <create
    v-if="is_Modal"
    :meta_data = "meta_data"
    @close="is_Modal = false"
  />

</template>

<script setup>

  import {ref} from 'vue';
  import EmptyState from "../utils/EmptyState.vue";
  import create from './create.vue';

  let projects = ref(PROJECTS);
  const is_Modal = ref(false);
  const meta_data = ref({});

  function openModal (data) {
    meta_data.value = data
  }

</script>