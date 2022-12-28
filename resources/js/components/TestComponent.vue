<template>
  <div>
 <input type="text" v-model="message" @keyup.enter="add()">
  <ul>
    <li v-for="list in lists" :key="list">
      {{ list }}
    </li>
  </ul>
  </div>
</template>

<script>
  export default {
data() {
  return {
    message: '',
    lists:[],
  }
},
methods: {
  add() {
 this.lists.push(this.message);
 this.message='';
  }
},
  }
</script>

<style lang="scss" scoped>

</style>
