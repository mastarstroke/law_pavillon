import { reactive } from 'vue'
import { defineStore } from 'pinia'


export const useUsersStore = defineStore('users', () => {

  const getUsers = reactive({ 
    first_name: '',
    last_name: '',
    email: '',
    dob: '',
    case_details: '',
    primary_counsel: '',
    image: ''
  })

  return { getUsers }
})