
<template v-slot:header>
    <PageComponent>
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="mb-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">List of Registered Users</h1>
    </div>

      <div class="card-body">
      <DataTable class="display">
        <UsersListItem/>

      </DataTable>
      </div>
    </PageComponent> 
    </template>
    
    <script setup>
    // import store from "../stores/user";
    import PageComponent from '@/components/PageComponent.vue';
    import UsersListItem from '@/components/UsersListItem.vue'
    // import { computed } from "vue";
    

    import DataTable from 'datatables.net-vue3';
    import DataTablesCore from 'datatables.net';
 
    DataTable.use(DataTablesCore);
  
  
    </script>

    <style>
    @import 'datatables.net-dt';
    </style>