<template>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- <div v-if="loading" class="flex justify-center">Loading...</div> -->
          <tr v-for="(user) in this.users">
              <td>{{ user.first_name }}</td>
              <td>{{ user.last_name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.dob }}</td>
              <td> 
                <router-link
                  :to="{name: 'AUserView', params: {id: user.id}}"
                  class="flex py-2 px-4 border-transparent text-sm rounded-md
                    text-indigo-500 hover:bg-indigo-700 hover:text-white transition-colors
                    focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    View
                </router-link>
            </td>

          </tr>

        </tbody>
</template>

<script>
// import  http  from '@/header/http'
import axiosClient from "@/axios";
import { ref } from 'vue';
 
 const loading = ref(true)

export default {
  name: 'users',
  data(){

    return {
      users: [],
    }
  },

  mounted(){

    this.getUsers();
    // console.log('i am here')
  },
  methods: {
    getUsers(){
      axiosClient.get('/users')
      .then(res => {
        this.users = res.data.data
        // console.log(this.users)

        loading.value = false
      });
    },

  }
}



// const emit = defineEmits(['delete'])

</script>

<style>
@import 'datatables.net-dt';
</style>