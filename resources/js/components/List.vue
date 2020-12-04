<template>
  <div class="bg-gray-300 rounded-sm p-2 mr-2 w-72 min-w-max">
    <div class="flex justify-between">
      <div class="text-gray-800 pl-2 pb-2 font-bold">{{ list.title }}</div>
    </div>
    <Card v-for="card in list.cards" :key="card.id" :card="card" />
    <CardAddButton />
  </div>
</template>

<script>
import Card from './Card.vue'
import CardAddButton from './CardAddButton.vue'
export default {
  components: {
    Card,
    CardAddButton,
  },
  props: {
    list: Object,
  },
}
</script>

<style></style>
