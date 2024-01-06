<template>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1>Tambah Pasien</h1>
      <form @submit.prevent="handleSubmitForm">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" v-model="pasien.name" required />
        </div>
        <div class="form-group">
          <label for="sex">Sex</label>
          <input type="text" class="form-control" v-model="pasien.sex" required />
        </div>
        <div class="form-group">
          <label for="religion">Religion</label>
          <input type="text" class="form-control" v-model="pasien.religion" required />
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" v-model="pasien.phone" required maxlength="10" />
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" v-model="pasien.address" required />
        </div>
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="number" class="form-control" v-model="pasien.nik" required />
        </div>
        <div class="form-group mt-3">
          <button class="btn btn-success btn-block w-100" type="submit">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      pasien: {
        name: '',
        sex: '',
        religion: '',
        phone: '',
        address: '',
        nik: ''
      }
    }
  },
  methods: {
    handleSubmitForm() {
      let apiURL = 'http://127.0.0.1:8000/api/addPasien'
      axios
        .post(apiURL, this.pasien)
        .then(() => {
          this.$router.push('/view')
          this.student = {
            name: '',
            sex: '',
            religion: '',
            phone: '',
            address: '',
            nik: ''
          }
        })
        .catch((error) => {
          console.log(error)
        })
    },
    isNumber: function (evt) {
      evt = evt ? evt : window.event
      var charCode = evt.which ? evt.which : evt.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        evt.preventDefault()
      } else {
        return true
      }
    }
  }
}
</script>
