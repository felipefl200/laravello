<template>
  <div class="bg-white rounded-sm cursor-pointer text-sm shadow-sm hover:bg-gray-100 mb-2 p-1">
    {{ card.title }}
  </div>
</template>

<script>
export default {
  props: {
    card: Object,
  },
}
</script>
