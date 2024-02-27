<template>
    <div>
      <Navbar />
      <Sidebar />
      <div class="content-wrapper">
        <form @submit.prevent="submitForm" class="add-form">
          <h1 class="form-title">Forms</h1>
          <div class="form-table-container">
            <table class="form-table">
              <tr>
                <td>
                  <label for="departmentName" class="form-label">Add Name</label>
                  <input type="text" id="departmentName" class="form-control" v-model="departmentName" placeholder="Enter name">
                </td>
                <td>
                  <label for="departmentCode" class="form-label">Code</label>
                  <input type="text" id="departmentCode" class="form-control" v-model="departmentCode" placeholder="Enter code">
                </td>
                <td>
                  <label for="departmentResponse" class="form-label">Response</label>
                  <input type="text" id="departmentResponse" class="form-control" v-model="departmentResponse" placeholder="Enter response">
                </td>
                <td class="button-cell">
                  <button type="submit" class="btn btn-primary" :disabled="isSubmitting">Add</button>
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
            </tbody>
          </table>
          <span v-if="submitSuccess" class="success-message">Form submitted successfully!</span>
          <span v-if="submitError" class="error-message">{{ submitError }}</span>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from '../components/TheNavbar.vue'
  import Sidebar from '../components/TheSidebar.vue'
  
  export default {
    name: 'AddFormPage',
    components: {
      Navbar,
      Sidebar,
    },
    data() {
      return {
        departmentName: '',
        departmentCode: '',
        departmentResponse: '',
        isSubmitting: false,
        submitSuccess: false,
        submitError: '',
      };
    },
    methods: {
      submitForm() {
        if (!this.departmentName || !this.departmentCode || !this.departmentResponse) {
          this.submitError = 'Please fill out all fields.';
          return;
        }
  
        this.isSubmitting = true;
        setTimeout(() => {
          this.departmentName = '';
          this.departmentCode = '';
          this.departmentResponse = '';
          this.isSubmitting = false;
          this.submitSuccess = true;
          setTimeout(() => {
            this.submitSuccess = false;
          }, 3000);
        }, 1000);
      },
    }
  }
  </script>
  
  <style scoped>
  .content-wrapper {
    padding: 20px;
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
  }
  
  .form-summary-table th {
    background-color: #f0f0f0;
    text-align: left;
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
  </style>
  