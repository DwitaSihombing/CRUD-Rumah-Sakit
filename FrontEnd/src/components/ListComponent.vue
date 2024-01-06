<template>
  <div class="justify-content-center">
    <h1>List Pasien</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="table-dark">
              <tr>
                <th>Name</th>
                <th>Sex</th>
                <th>Religion</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="pasien in Pasiens" :key="pasien.id">
                <td>{{ pasien.name }}</td>
                <td>{{ pasien.sex }}</td>
                <td>{{ pasien.religion }}</td>
                <td>{{ pasien.phone }}</td>
                <td>{{ pasien.address }}</td>
                <td>
                  <router-link class="btn btn-success me-2" :to="`/ubah/${pasien.id}`">
                    Edit
                  </router-link>
                  <button @click="deletePasient(pasien.id)" class="btn btn-danger">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      Pasiens: []
    }
  },
  created() {
    let apiURL = 'http://127.0.0.1:8000/api/readallPasien'
    axios
      .get(apiURL)
      .then((res) => {
        this.Pasiens = res.data
      })
      .catch((error) => {
        console.log(error)
      })
  },

  methods: {
    deletePasient(id) {
      let apiURL = `http://127.0.0.1:8000/api/delete/${id}`
      let indexOfArrayItem = this.Pasiens.findIndex((i) => i.id === id)

      if (window.confirm('Do you really want to delete?')) {
        axios
          .delete(apiURL)
          .then(() => {
            this.Pasiens.splice(indexOfArrayItem, 1)
          })
          .catch((error) => {
            console.log(error)
          })
      }
    }
  }
}
</script>
