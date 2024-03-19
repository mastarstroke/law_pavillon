
<template>

  <html class="h-full bg-indigo-100">
  <body class="h-full">



  <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <div class="my-5">
        <label class="block text-sm font-medium leading-6 text-gray-900">Photo here</label>
        <div class="mt-2">
          <img :src="user.photo" alt="" class="w-60 h-28 object-cover" />
        </div>
      </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <div class="my-5">
        <label class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
        <div class="mt-2">
          <div v-html="user.first_name" class="block w-full bg-white rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></div>
        </div>
      </div>

      <div class="mt-2">
        <label class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
        <div class="mt-2">
          <div v-html="user.last_name" class="block w-full bg-white rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          >
        </div>
        </div>
      </div>

      <div class="mt-2">
        <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
        <div class="mt-2">
          <div v-html="user.email" class="block w-full bg-white rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></div>
        </div>
      </div>

      <div class="mt-2">
        <label class="block text-sm font-medium leading-6 text-gray-900">Date Of Birth</label>
        <div class="mt-2">
          <div v-html="user.dob" class="block w-full bg-white rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></div>
        </div>
      </div>

      <div class="mt-2">
        <label class="block text-sm font-medium leading-6 text-gray-900">Case Details</label>
        <div class="mt-2">
          <div v-html="user.case_details" class="block w-full bg-white rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></div>
        </div>
      </div>

      <div class="mt-2">
        <label class="block text-sm font-medium leading-6 text-gray-900">Case Details</label>
        <div class="mt-2">
          <div v-html="user.primary_case" class="block w-full bg-white rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </body>
  </html>
</template>

<script>
import axiosClient from "@/axios"
// import { ref, onMounted } from "vue";
import { useRoute } from 'vue-router'

export default {
  name: 'user',
  data(){
    
    return {
      user: [],
    }
  },

  mounted(){

    this.getUsers();
    // console.log('i am here')
  },
  methods: {
    getUsers(){
      const route = useRoute();
      axiosClient.get(`/view/users/${route.params.id}`)
      .then(res => {
        this.user = res.data.data
        
      });
    },

  }
}

</script>
