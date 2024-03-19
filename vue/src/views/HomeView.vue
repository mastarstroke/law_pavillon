<template>
  <PageComponent>
  <div class="bg-white py-10 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:text-center">
        <h2 class="text-base font-semibold leading-7 text-indigo-600">Code Test</h2>
        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Law Pavillon Bussiness</p>
        <p class="mt-6 text-lg leading-8 text-gray-600">Everything you need about law bussiness schools can be found here</p>
      </div>
      <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
        <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
          <div v-for="feature in features" :key="feature.name" class="relative pl-16">
            <dt class="text-base font-semibold leading-7 text-gray-900">
              <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                <component :is="feature.icon" class="h-6 w-6 text-white" aria-hidden="true" />
              </div>
              {{ feature.name }}
            </dt>
            <dd class="mt-2 text-base leading-7 text-gray-600">{{ feature.description }}</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</PageComponent>

</template>

<script setup>
  import PageComponent from '../components/PageComponent.vue'
  import { ref, onMounted } from 'vue';
  import { ArrowPathIcon, CloudArrowUpIcon, FingerPrintIcon, LockClosedIcon } from '@heroicons/vue/24/outline'
 
  const features = [
  {
    name: 'Sign up New Client',
    description:
      'Using the v-model from the frontend to add new users to the User table to the backend',
    icon: CloudArrowUpIcon,
  },
  {
    name: 'View Users',
    description:
      'View that display all added clients using the axios libray to fetch users from Users Table from the Backend.',
    icon: LockClosedIcon,
  },
  {
    name: 'Send Welcome Messages to new Users',
    description:
      'Feature that automatically send welcome Emails to user on completion of registration, using smtp to for email configuration and as third party.',
    icon: ArrowPathIcon,
  },
  {
    name: 'Send emails every week to users',
    description:
      'Also features that sends email to users to complete their registration by uplaoding their photo every week on mondays by 12pm, using the scheduler inbuilt laravel feature.',
    icon: FingerPrintIcon,
  },
]

  const checkAuthentication = ref(false)

  onMounted(() => {
      if (sessionStorage.getItem('TOKEN')) {
        checkAuthentication.value = true
      }

    })


</script>
