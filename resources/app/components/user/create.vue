<template>
    <TransitionRoot as="template" :show="open">
      <Dialog class="relative z-50">
        <div class="fixed inset-0" />
  
        <div class="fixed inset-0 overflow-hidden">
          <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none sm:pl-16">
              <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                <DialogPanel class="w-screen max-w-md pointer-events-auto">
                  <form class="flex flex-col h-full bg-white divide-y divide-gray-200 shadow-xl">
                    <div class="flex-1 h-0 overflow-y-auto">
                      <div class="px-4 py-6 bg-indigo-700 sm:px-6">
                        <div class="flex items-center justify-between">
                          <DialogTitle class="text-base font-semibold leading-6 text-white">New User</DialogTitle>
                          <div class="flex items-center ml-3 h-7">
                            <button type="button" class="relative text-indigo-200 bg-indigo-700 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" @click="emit('close')">
                              <span class="absolute -inset-2.5" />
                              <span class="sr-only">Close panel</span>
                              <XMarkIcon class="w-6 h-6" aria-hidden="true" />
                            </button>
                          </div>
                        </div>
                        <div class="mt-1">
                          <p class="text-sm text-indigo-300">Get started by filling in the information below to create your new user.</p>
                        </div>
                      </div>
                      <div class="flex flex-col justify-between flex-1">
                        <div class="px-4 divide-y divide-gray-200 sm:px-6">
                          <div class="pt-6 pb-5 space-y-6">
                                <div>
                                    <label for="project-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <div class="mt-2">
                                    <input v-model="data.name" type="text" name="name" id="project-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                </div>
                                <span v-if="!props.data?.id" class="space-y-6">
                                    <div>
                                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                        <div class="mt-2">
                                            <input v-model="data.email" type="email" name="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        <div class="mt-2">
                                            <input v-model="data.password" type="text" name="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                                        <div class="mt-2">
                                            <input v-model="data.password_confirmation" type="text" name="password_confirmation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                        </div>
                                    </div>

                                    <Combobox as="div" v-model="data.assigned_projects" multiple @update:modelValue="query = ''">
                                        <ComboboxLabel class="block text-sm font-medium leading-6 text-gray-900">Assigned to</ComboboxLabel>
                                        <div class="relative mt-2">
                                        <ComboboxInput
                                            class="w-full rounded-md border-0 bg-white py-1.5 pl-3 pr-10 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            @change="query = $event.target.value"
                                            @blur="query = ''"
                                            :display-value="(projects) => projects.map(prjct => prjct.name).join(', ')"
                                        />
                                        <ComboboxButton class="absolute inset-y-0 right-0 flex items-center px-2 rounded-r-md focus:outline-none">
                                            <ChevronUpDownIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                                        </ComboboxButton>

                                        <ComboboxOptions v-if="filteredPeople.length > 0" class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                                            <ComboboxOption v-for="prjct in filteredPeople" :key="prjct.id" :value="prjct" as="template" v-slot="{ active, selected }">
                                            <li :class="['relative cursor-default select-none py-2 pl-3 pr-9', active ? 'bg-indigo-600 text-white' : 'text-gray-900']">
                                                <span :class="['block truncate', selected && 'font-semibold']">
                                                {{ prjct.name }}
                                                </span>

                                                <span v-if="selected" :class="['absolute inset-y-0 right-0 flex items-center pr-4', active ? 'text-white' : 'text-indigo-600']">
                                                <CheckIcon class="w-5 h-5" aria-hidden="true" />
                                                </span>
                                            </li>
                                            </ComboboxOption>
                                        </ComboboxOptions>
                                        </div>
                                    </Combobox>
                                </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex justify-end flex-shrink-0 px-4 py-4">
                      <button type="button" class="px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" @click="emit('close')">Cancel</button>
                      <button @click="handleSubmit" type="button" class="inline-flex justify-center px-3 py-2 ml-4 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                  </form>
                </DialogPanel>
              </TransitionChild>
            </div>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </template>
  
<script setup>
  import { ref, reactive, computed } from 'vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import {  Combobox, ComboboxButton, ComboboxInput, ComboboxLabel, ComboboxOption, ComboboxOptions } from '@headlessui/vue'
  import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
  import { XMarkIcon } from '@heroicons/vue/24/outline'
  import { LinkIcon, PlusIcon, QuestionMarkCircleIcon } from '@heroicons/vue/20/solid';
  import { createUser } from './api';

  const props = defineProps({
    data: Object,
  });

  const emit = defineEmits(['close']);

  const projects = PROJECTS;
  const open = ref(true);

  const data = reactive({
    name: props.data ? props.data.name : '',
    email: props.data ? props.data.email : '',
    password: props.data ? props.data.password : '',
    password_confirmation: props.data ? props.data.password_confirmation : '',
    assigned_projects : props.data ? props.data.assigned_projects : []
  });


const query = ref('')
const filteredPeople = computed(() =>
  query.value === ''
    ? projects
    : projects.filter((person) => {
        return person.name.toLowerCase().includes(query.value.toLowerCase())
      }),
)

  function handleSubmit () {

    if (props.data?.id){
        data.id = props.data.id
    }
    
    createUser(data)
    .then((res)=>{
        console.log(res);
        window.location.href = window.location.href
    })
    .catch((err)=>{
        console.log(err);
    })
    
  }  
  
</script>