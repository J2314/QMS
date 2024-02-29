<template>
    <div>
      <Navbar />
      <Sidebar />
      <div class="content-wrapper">
        <form @submit.prevent="submitForm" class="add-form">
          <h1 class="form-title">Add Forms</h1>
          <div class="form-table-container">
            <table class="form-table">
              <tr>
                <td>
                  <label for="departmentName" class="form-label">Add Name</label>
                  <input type="text" id="departmentName" class="form-control" v-model="file_name" placeholder="Enter name">
                </td>
                <td>
                  <label for="departmentCode" class="form-label">Code</label>
                  <input type="text" id="departmentCode" class="form-control" v-model="file_code" placeholder="Enter code">
                </td>
                <td>
                  <label for="departmentId" class="form-label">Department</label>
                  <select id="departmentId" class="form-control" v-model="department_id">
                    <option value="">Select Department</option>
                    <option v-for="(department, index) in departments" :key="index" :value="department.id">{{ department.name }}</option>
                  </select>
                </td>
                <td class="button-cell">
                  <button type="submit" class="btn btn-primary">Add</button>
                </td>
              </tr>
            </table>
          </div>
          <table class="form-summary-table">
            <thead>
              <tr>
                <th>Form Name</th>
                <th>Department</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(form, index) in forms" :key="index">
                <td>{{ form.file_name }}</td>
                <td>{{ form.department_id }}</td>
                <td>
                  <button @click="deleteForm(form.id)" class="btn btn-danger">Archive</button>
                </td>
              </tr>
            </tbody>
          </table>
          <span v-if="submitSuccess" class="success-message">Form submitted successfully!</span>
          <span v-if="submitError" class="error-message">{{ submitError }}</span>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Navbar from '../components/TheNavbar.vue';
  import Sidebar from '../components/TheSidebar.vue';
  
  export default {
    name: 'AddFormPage',
    components: {
      Navbar,
      Sidebar,
    },
    data() {
      return {
        file_name: '',
        file_code: '',
        department_id: '',
        submitError: '',
        departments: [],
        forms: [],
      };
    },
    methods: {
        submitForm() {
        if (!this.file_name || !this.file_code || !this.department_id) {
            this.submitError = 'Please fill out all fields.';
            return;
        }

        axios.post('http://127.0.0.1:8000/api/form', {
            file_name: this.file_name,
            file_code: this.file_code,
            department_id: this.department_id,
            })
            .then(() => {
            this.file_name = '';
            this.file_code = '';
            this.department_id = '';
            this.submitError = '';
            this.fetchForms(); 
            })
            .catch(error => {
            if (error.response && error.response.data && error.response.data.message) {
                this.submitError = error.response.data.message;
            } else {
                this.submitError = 'An error occurred.';
            }
            }); 
        },
      fetchDepartments() {
        axios.get('http://127.0.0.1:8000/api/retrieve')
          .then(response => {
            this.departments = response.data;
          })
          .catch(error => {
            console.error('Error fetching departments:', error);
          });
      },
      fetchForms() {
        axios.get('http://127.0.0.1:8000/api/retrieve-forms')
          .then(response => {
            this.forms = response.data;
          })
          .catch(error => {
            console.error('Error fetching forms:', error);
          });
      },
      deleteForm(formId) {
        axios.delete(`http://127.0.0.1:8000/api/forms/${formId}`)
          .then(() => {
            this.fetchForms(); 
          })
          .catch(error => {
            console.error('Error deleting form:', error);
          });
      }
    },
    mounted() {
      this.fetchDepartments();
      this.fetchForms();
    }
  }
  </script>
  <style scoped>
  .content-wrapper {
    padding: 20px;
    margin-top: 60px;
  }
  
  .add-form {
    max-width: 600px;
    margin: 0 auto;
  }
  
  .form-label {
    font-size: 18px;
    color: #333;
  }
  
  .form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    margin-bottom: 10px;
    max-height: 200px;
    overflow-y: auto;
  }
  
  .btn-primary {
    margin-top: 22px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 12px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 16px;
  }
  
  .btn-primary:hover {
    background-color: #0056b3;
  }
  
  .success-message,
  .error-message {
    display: block;
    margin-top: 12px;
    font-size: 16px;
    color: #28a745;
  }
  
  .error-message {
    color: #dc3545;
  }
  
  .form-title {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    margin-bottom: 30px;
  }
  
  .form-table-container {
    overflow-x: auto;
  }
  
  .form-table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
  }
  
  .form-table tr {
    border-bottom: 1px solid #ccc;
  }
  
  .form-table td {
    padding: 15px;
  }
  
  .button-cell {
    text-align: right;
  }
  
  .form-summary-table {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
  }
  
  .form-summary-table th,
  .form-summary-table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
  }
  
  .form-summary-table th {
    background-color: #f0f0f0;
  }

  .btn-danger{
    background-color: gray;
    border-style: none;
  }

  .btn-danger:hover {
    background-color: lightgray;
    color: black;
  }


  </style>