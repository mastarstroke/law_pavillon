
<template>

  <html class="h-full bg-indigo-100">
  <body class="h-full">

  <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h1 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Pavillon Law Bussiness School</h1>
      <p class="mt-4 text-center text-2xl">SignUp with us</p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <Alert v-if="Object.keys(errors).length" class="flex-col items-stretch text-sm">
        <div v-for="(field, i) of Object.keys(errors)" :keys="i">
          <div v-for="(error, ind) of errors[field] || []" :keys="ind">
           * {{ error }}
          </div>
        </div>

      </Alert>
      <form class="space-y-6" action="#" @submit.prevent="register">
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
          <div class="mt-2">
            <input id="email" name="first_name" type="text" v-model="user.first_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
          <div class="mt-2">
            <input id="email" name="last_name" type="text" v-model="user.last_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          </div>
          <div class="mt-2">
            <input id="password" type="email" v-model="user.email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label class="block text-sm font-medium leading-6 text-gray-900">Date of Birth</label>
          </div>
          <div class="mt-2">
            <input id="dob" name="dob" type="date" v-model="user.dob" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        
        <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Primary Legal Counsel</label>
          <div class="mt-2">
            <textarea id="about" name="primary_case" rows="3" v-model="user.primary_case" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        <div class="col-span-full">
            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Case Details</label>
          <div class="mt-2">
            <textarea id="about" name="case_details" rows="3" v-model="user.case_details" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
          </div>
        </div>

        <div class="col-span-full">
            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo (optional)</label>
            <div class="mt-2 flex items-center gap-x-3">
              <UserCircleIcon class="h-12 w-12 text-gray-300" aria-hidden="true" />
              <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
            </div>
          </div>

        <div>
          <button
            :disabled="loading" 
            type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            :class="{'cursor-not-allowed': loading, 'hover:bg-indigo-500': loading}">
            <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            Sign up
          </button>
        </div>
      </form>

    </div>
  </div>
  </body>
  </html>
</template>

<script setup>
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'
import Alert from '../components/Alert.vue';
import axiosClient from "@/axios";
import {useRouter} from "vue-router";
import { ref } from "vue";

const router = useRouter();

const loading = ref(false);
const errors = ref({});

const user = {
  first_name: '',
  last_name: '',
  email: '',
  dob: '',
  case_details: '',
  primary_case: ''
};

function register(ev) {
  ev.preventDefault();

  loading.value = true;
  axiosClient.post('/storeUsers', user)
    .then((res) => {
      loading.value = false;
        router.push({
          name: 'ViewUsers'
        })
    })
    .catch(err => {
      loading.value = false;
      if (err.response.status === 422) {
        errors.value = err.response.data.errors
      }
    })
}

</script>
