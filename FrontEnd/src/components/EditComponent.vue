<template>
  <div class="row justify-content-center">
    <div class="col-md-6" v-if="loaded && pasien">
      <h1>Ubah Pasien</h1>
      <form @submit.prevent="handleUpdateForm">
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
          <input type="text" class="form-control" v-model="pasien.nik" required />
        </div>
        <div class="form-group mt-3">
          <button class="btn btn-primary btn-block w-100" type="submit" :disabled="!isValidForm">
            Update
          </button>
        </div>
      </form>
    </div>
    <div v-else>Loading...</div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      pasien: {},
      loaded: false
    }
  },
  created() {
    let apiURL = `http://127.0.0.1:8000/api/updatePasien/${this.$route.params.id}`
    axios
      .get(apiURL)
      .then((res) => {
        this.pasien = res.data
        this.loaded = true
      })
      .catch((error) => {
        console.error(error)
      })
  },
  computed: {
    isValidForm() {
      return (
        this.pasien.name &&
        this.pasien.sex &&
        this.pasien.religion &&
        this.pasien.phone &&
        this.pasien.address &&
        this.pasien.nik
      )
    }
  },
  methods: {
    handleUpdateForm() {
      let apiURL = `http://127.0.0.1:8000/api/updatePasien/${this.$route.params.id}`
      axios
        .patch(apiURL, this.pasien)
        .then((res) => {
          console.log(res)
          this.$router.push('/view')
        })
        .catch((error) => {
          console.error(error)
        })
    }
  }
}
</script>
