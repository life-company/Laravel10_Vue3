<template>
<div class="card card-primary mt-4">
  <div class="card-header">
    <h3 class="card-title">新規顧客追加</h3>
  </div>
  <form @submit.prevent="handleSubmit">
    <div class="card-body">
      <div class="form-group">
        <label>クライアント名</label>
        <input v-model="formData.name" type="text" name="name">
      </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</template>

<script>
export default {
  name: "ClientNewForm",

  data() {
    return {
      formData: {
        name: ''
      }, 
      submitted: false
    }
  },

  methods: {
    handleSubmit() {
      axios.post('/api/client/create', this.formData)
        .then(response => {
          console.log(response.data)
          sessionStorage.setItem('message', '新規クライアントが登録されました。')
          window.location.href = '/client_list'
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
}
</script>