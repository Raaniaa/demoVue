<template>
    <div>
        <h3 class="text-center">Create Student</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addStudent">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="student.Name">
                    </div>
                    <div class="form-group">
                        <label>Birth Date</label>
                        <input type="date" class="form-control" v-model="student.Birth_Date">
                    </div>
                     <div class="form-group">
                        <label>ID_Number</label>
                        <input type="number" class="form-control" v-model="student.ID_Number">
                    </div>
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="number" class="form-control" v-model="student.Mobile">
                    </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" v-model="student.Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                student: {}
            }
        },
        methods: {
            addStudent() {
                this.axios
                    .post('http://localhost:8000/api/students', this.student)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>