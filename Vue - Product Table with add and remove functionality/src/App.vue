<template>
  <PetHouses/>
</template>

<script>
import PetHouses from './components/PetHouses.vue'

export default {
  name: 'App',
  components: {
    PetHouses
  }
}
</script>

<style>
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
