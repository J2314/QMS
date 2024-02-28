<template>
  <div>
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
                <label for="departmentId" class="form-label">Department ID</label>
                <select id="departmentId" class="form-control" v-model="departmentId">
                  <option value="">Select Department</option>
                  <option value="1">Department 1</option>
                  <option value="2">Department 2</option>
                  <option value="3">Department 3</option>
                  <option value="4">Department 4</option>
                  <option value="5">Department 5</option>
                </select>
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
export default {
  name: 'AddDepartmentPage',
  data() {
    return {
      departmentName: '',
      departmentCode: '',
      departmentId: '',
      isSubmitting: false,
      submitSuccess: false,
      submitError: '',
      departments: [],
    };
  },
  methods: {
    submitForm() {
      if (!this.departmentName || !this.departmentCode || !this.departmentId) {
        this.submitError = 'Please fill out all fields.';
        return;
      }

      // Simulating form submission
      this.isSubmitting = true;
      setTimeout(() => {
        // Push new department to departments array
        this.departments.push({
          name: this.departmentName,
          code: this.departmentCode,
          id: this.departmentId
        });

        // Reset form fields after successful submission
        this.departmentName = '';
        this.departmentCode = '';
        this.departmentId = '';
        this.isSubmitting = false;
        this.submitSuccess = true;
        setTimeout(() => {
          this.submitSuccess = false;
        }, 3000);
      }, 1000);
    },
    deleteDepartment(index) {
      // Remove department from departments array
      this.departments.splice(index, 1);
    }
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
  max-height: 200px; /* Adjust the max height as needed */
  overflow-y: auto; /* Enable scrolling if needed */
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
</style>