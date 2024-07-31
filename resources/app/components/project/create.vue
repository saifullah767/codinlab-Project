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
                          <DialogTitle class="text-base font-semibold leading-6 text-white">New Project</DialogTitle>
                          <div class="flex items-center ml-3 h-7">
                            <button type="button" class="relative text-indigo-200 bg-indigo-700 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" @click="emit('close')">
                              <span class="absolute -inset-2.5" />
                              <span class="sr-only">Close panel</span>
                              <XMarkIcon class="w-6 h-6" aria-hidden="true" />
                            </button>
                          </div>
                        </div>
                        <div class="mt-1">
                          <p class="text-sm text-indigo-300">Get started by filling in the information below to create your new project.</p>
                        </div>
                      </div>
                      <div class="flex flex-col justify-between flex-1">
                        <div class="px-4 divide-y divide-gray-200 sm:px-6">
                          <div class="pt-6 pb-5 space-y-6">
                            <div>
                              <label for="project-name" class="block text-sm font-medium leading-6 text-gray-900">Project name</label>
                              <div class="mt-2">
                                <input v-model="data.name" type="text" name="name" id="project-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                              </div>
                            </div>
                            <div>
                              <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                              <div class="mt-2">
                                <textarea v-model="data.description" id="description" name="description" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                              </div>
                            </div>
                            
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
  import { ref, reactive } from 'vue'
  import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
  import { XMarkIcon } from '@heroicons/vue/24/outline'
  import { LinkIcon, PlusIcon, QuestionMarkCircleIcon } from '@heroicons/vue/20/solid';
  import { createProject } from './api';

  const props = defineProps({
    data: Object,
  });

  const emit = defineEmits(['close']);

  const data = reactive({
    name: props.data ? props.data.name : '',
    description: props.data ? props.data.description : ''
  })

  function handleSubmit () {

    if (props.data?.id){
        const data = {
            name: data.name,
            description: data.description,
            id: props.data.id
        }
    }
    
    createProject(data)
    .then((res)=>{
        console.log(res);
        window.location.href = window.location.href
    })
    .catch((err)=>{
        console.log(err);
    })
    
  }  
  
  const open = ref(true)
</script>