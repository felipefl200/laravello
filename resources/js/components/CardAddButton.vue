<template>
  <div
    @click="$emit('click')"
    class="flex items-center rounded-sm p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-400 cursor-pointer text-sm"
  >
   <span class="pr-1">Adicionar novo</span>
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
  </div>
</template>
