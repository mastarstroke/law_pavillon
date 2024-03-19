<template>
  <div class="min-h-full">
    <Disclosure as="nav" class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <h1 class="text-3xl leading-none text-gray-200">Law Pavillon
              </h1>
              <span class="text-sm text-gray-200">Made Easy</span>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <div>
                <div class="hidden md:block">
                  <div class="flex items-baseline space-x-4">
                    <router-link
                    v-for="item in navigation"
                    :key="item.name"
                    :to="item.to"
                    active-class="bg-gray-900 text-white"
                    :class="[this.$route.name === item.to.name 
                    ? '' 
                    : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-sm font-medium']">
                    {{ item.name }}
                  </router-link>
                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>
      </div>

      <DisclosurePanel class="md:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <router-link
            v-for="item in navigation" 
            :key="item.name" 
            :to="item.to" 
            active-class="bg-gray-900 text-white"
            :class="[
              this.$route.name === item.to.name
              ? ''
              :'block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white', 
              'block px-3 py-2 rounded-md text-base font-medium',]">
            {{ item.name }}
          </router-link>
        </div>
      </DisclosurePanel>
    </Disclosure>

    <router-view></router-view>

    <Notification />
  </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'



const navigation = [
  { name: "Home", to: {name: "Home"}},
  { name: "SignUp", to: {name: "SignUp"}},
  { name: "View Users", to: {name: "ViewUsers"}},
]

export default {
components: {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  Bars3Icon,
  XMarkIcon,
},

setup() {


  return {
    navigation,
  };
},

};


</script>