<template>
  <div>
    <textarea
      :value="value"
      @keyup.esc="close"
      @keyup.enter="saved"
      @input="$emit('input', $event.target.value)"
      class="rounded-sm py-1 px-2 outline-none w-full text-gray-900 text-sm bg-white resize-none shadow"
      placeholder="Insira o título"
      ref="card"
    ></textarea>
    <div class="flex">
      <button
        @click="saved"
        class="rounded ml-1 py-1 px-3 bg-indigo-700 text-white cursor-pointer hover:bg-indigo-600 outline-none focus:outline-none"
      >
        {{ label }}
      </button>
      <button
        @click="close"
        class="rounded ml-1 py-1 px-3 font-bold text-gray-500 bg-gray-400 hover:bg-red-500 hover:text-gray-300 focus:outline-none"
      >
        X
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['value', 'label'],
  mounted() {
    this.$refs.card.focus()
  },
  methods: {
    close() {
      this.$emit('close')
    },
    saved() {
      this.$emit('saved')
    },
  },
}
</script>
