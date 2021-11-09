<template>
    <div>
        <h2 class="text-center">Students List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Birth Date</th>
                <th>ID_Number</th>
                   <th>Mobile</th>
                   <th>Address</th>
                   <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.Name }}</td>
                <td>{{ student.Birth_Date }}</td>
                <td>{{ student.ID_Number }}</td>
                <td>{{ student.Mobile }}</td>
                <td>{{ student.Address }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: student.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteStudent(student.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                students: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/students/')
                .then(response => {
                    this.students = response.data;
                });
        },
        methods: {
            deleteStudent(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/students/${id}`)
                    .then(response => {
                        let i = this.students.map(data => data.id).indexOf(id);
                        this.students.splice(i, 1)
                    });
            }
        }
    }
</script>