<template>
<div class="card card-primary mt-4">
  <div class="card-header">
    <h3 class="card-title">新規顧客追加</h3>
  </div>
  <form @submit.prevent="validateBeforeSubmit">
    <div class="card-body">
      <div class="form-group">
          <label class="px-4">クライアント名</label>
          <input
            v-model="formData.client_name"
            type="text"
            class="form-control"
            @focus="handleFocus('client_name')"
            @blur="handleBlur('client_name')"
          >
          <p v-if="formErrors.client_name" class="text-danger">{{ formErrors.client_name }}</p>
        </div>
      <div class="form-group">
        <label class="px-4">郵便番号</label>
        <input
              v-model="formData.client_post"
              type="text"
              class="form-control"
              @focus="handleFocus('client_post')"
              @blur="handleBlur('client_post')"
            >
            <p v-if="formErrors.client_post" class="text-danger">{{ formErrors.client_post }}</p>
        </div>
      <div class="form-group">
        <label class="px-4">住所</label>
        <input
            v-model="formData.client_address"
            type="text"
            class="form-control"
            @focus="handleFocus('client_address')"
            @blur="handleBlur('client_address')"
          >
          <p v-if="formErrors.client_address" class="text-danger">{{ formErrors.client_address }}</p>
      </div>
      <div class="form-group">
        <label class="px-4">ホームページ</label>
        <input
            v-model="formData.client_url"
            type="text"
            class="form-control"
            @focus="handleFocus('client_url')"
            @blur="handleBlur('client_url')"
          >
          <p v-if="formErrors.client_url" class="text-danger">{{ formErrors.client_url }}</p>
      </div>
      <div class="form-group">
        <label class="px-4">担当者名</label>
        <input
            v-model="formData.client_person"
            type="text"
            class="form-control"
            @focus="handleFocus('client_person')"
            @blur="handleBlur('client_person')"
          >
          <p v-if="formErrors.client_person" class="text-danger">{{ formErrors.client_person }}</p>
      </div>
      <div class="form-group">
        <label class="px-4">担当者電話番号</label>
        <input
            v-model="formData.client_person_phone"
            type="text"
            class="form-control"
            @focus="handleFocus('client_person_phone')"
            @blur="handleBlur('client_person_phone')"
          >
          <p v-if="formErrors.client_person_phone" class="text-danger">{{ formErrors.client_person_phone }}</p>
      </div>
      <div class="form-group">
        <label class="px-4">メモ</label>
        <input
            v-model="formData.client_memo"
            type="text"
            class="form-control"
            @focus="handleFocus('client_memo')"
            @blur="handleBlur('client_memo')"
          >
          <p v-if="formErrors.client_memo" class="text-danger">{{ formErrors.client_memo }}</p>
      </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">クライアントを追加する</button>
    </div>
  </form>
</div>
</template>

<script>
import axios from 'axios';

export default {
  name: "ClientNewForm",

  data() {
    return {
      formData: {
        client_name: '',
        client_post: '',
        client_address: '',
        client_url: '',
        client_person: '',
        client_person_phone: '',
        client_memo: '',
      },
      error: false,
      errorMessage: '',
      formErrors: {}, // 各フィールドのエラーメッセージを格納する
    }
  },
  watch: {
    'formData.client_name': function (newVal, oldVal) {
      this.validateFormData();
    },
  },
  methods: {
    
    validateBeforeSubmit() {
      this.validateFormData().then(() => {
        if (!this.error) {
          this.handleSubmit();
        }
      });
    },
    handleFocus(fieldName) {
      // 必要に応じて特定のアクションを実行
      // 例: エラーメッセージをクリア
      this.formErrors[fieldName] = '';
    },
    handleBlur(fieldName) {
      // フォーカスが外れたときにバリデーションを実行
      console.info(fieldName)
      this.validateField(fieldName, this.formData[fieldName], `${fieldName}は必須です。`)
        .catch(error => {
          this.formErrors[error.field] = error.message;
        });
    },
    async handleSubmit() {
      if (!this.error) {
        axios.post('/api/clients/create', this.formData)
          .then(response => {
            console.log(response.data)
            sessionStorage.setItem('message', '新規クライアントが登録されました。')
            window.location.href = '/clients_list'
          })
          .catch(error => {
            console.error(error);
          });
      }
    },
    async validateFormData() {
      this.error = false;
      this.errorMessage = '';
      this.formErrors = {}; // formErrorsをクリア

      const validations = [
        this.validateField('client_name', this.formData.client_name, 'クライアント名は必須です。'),
        // 他のフィールドのバリデーションも同様に追加
      ];

      const results = await Promise.allSettled(validations);

      const errors = results.filter(result => result.status === 'rejected');
      if (errors.length > 0) {
        this.error = true;
        errors.forEach(error => {
          this.formErrors[error.reason.field] = error.reason.message;
        });
      }
    },
    async validateField(fieldName, fieldValue, errorMessage) {
      return new Promise((resolve, reject) => {
        setTimeout(() => {
          if (!fieldValue) {
            reject({ field: fieldName, message: errorMessage });
          } else {
            resolve();
          }
        }, 100);
      });
    },
  }
}
</script>
