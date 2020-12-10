<template>
  <div>
    <div
      v-if="!editing"
      class="group flex justify-between bg-white rounded-sm cursor-pointer text-sm shadow-sm hover:bg-gray-100 mb-2 p-1 px-2"
    >
      <div>{{ card.title }}</div>
      <div class="flex opacity-0 group-hover:opacity-100 transition-opacity ease-out duration-200">
        <div @click="editing = true" class="text-gray-500 hover:text-blue-600">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
            ></path>
          </svg>
        </div>

        <div class="ml-1 text-gray-500 hover:text-red-600" @click="cardDelete">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
      </div>
    </div>
    <CardEditor v-else v-model="title" class="mb-2" label="Atualizar" @close="editing = false" @saved="cardUpdate" />
  </div>
</template>

<script>
import {EVENT_CARD_DELETED, EVENT_CARD_UPDATED} from '../constants.js'
import CardDelete from '../graphql/CardDelete.gql'
import CardEditor from './CardEditor.vue'
import CardUpdate from '../graphql/CardUpdate.gql'
export default {
  components: {CardEditor},
  props: {
    card: Object,
  },
  data() {
    return {
      editing: false,
      title: this.card.title,
    }
  },
  methods: {
    cardDelete() {
      const self = this
      this.$apollo.mutate({
        mutation: CardDelete,
        variables: {
          id: this.card.id,
        },
        update(store, {data: {CardDelete}}) {
          self.$emit('deleted', {
            store,
            data: CardDelete,
            type: EVENT_CARD_DELETED,
          })
        },
      })
    },
    cardUpdate() {
      const self = this
      this.$apollo.mutate({
        mutation: CardUpdate,
        variables: {
          id: this.card.id,
          title: this.title,
        },
        update(store, {data: CardUpdate}) {
          self.$emit('updated', {
            data: CardUpdate,
            type: EVENT_CARD_UPDATED,
          })
          self.editing = false
        },
      })
    },
  },
}
</script>
