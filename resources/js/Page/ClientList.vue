<template>
  {{ formData.message }}
  <ul>
    <li v-for="client in formData.clients" :key="client.id">
      {{ client.client_name }}
    </li>
  </ul>
</template>

<script>
export default {
  name: "ClientList",

  data() {
    return {
      formData: {
        clients: [],
        message: sessionStorage.getItem('message'),
      },
      submitted: false
    }
  },
  created() {
    this.fetchData()
  },
  mounted() {
    sessionStorage.removeItem('message')
  },
  methods: {
    fetchData() {
      axios.get('/api/clients/list')
        .then(response => {
          this.formData.clients = response.data.clients
          console.info(this.formData.clients)
        })
        .catch(error => {
          console.error('APIエラー:', error);
        });
    }
  }
}
</script>