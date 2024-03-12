<template>
  <div class="content-wrapper">
    <form @submit.prevent="submitForm" class="add-form">
      <h1 class="form-title">Policy Documents</h1>
      <div class="form-table-container">
        <table class="form-table">
          <tr>
            <td>
              <label for="quality-policy" class="form-label">Quality Policy:</label>
              <input type="text" id="quality-policy" class="form-control" v-model="qualityPolicy" placeholder="Enter name">
            </td>
            <td>
              <label for="environment-policy" class="form-label">Environment Policy:</label>
              <input type="text" id="environment-policy" class="form-control" v-model="environmentPolicy" placeholder="Enter code">
            </td>
            <td>
              <label for="health-safety-policy" class="form-label">Health and Safety Policy:</label>
              <input type="text" id="health-safety-policy" class="form-control" v-model="healthSafetyPolicy" placeholder="Enter code">
            </td>
            <td class="button-cell">
              <button type="submit" class="btn btn-primary">Add</button>
            </td>
          </tr>
        </table>
      </div>
      <span v-if="submitError" class="error-message">{{ submitError }}</span>
    </form>
    <table class="form-summary-table">
      <thead>
        <tr>
          <th>Document Type</th>
          <th>Document Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(policy, index) in policies" :key="index">
          <td>{{ policy.type }}</td>
          <td>{{ policy.name }}</td>
          <td>
            <button @click="deletePolicy(index)" class="btn btn-danger">Delete</button>
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
      qualityPolicy: '',
      environmentPolicy: '',
      healthSafetyPolicy: '',
      submitError: '',
      policies: [] 
    };
  },
  methods: {
    submitForm() {
      if (!this.qualityPolicy || !this.environmentPolicy || !this.healthSafetyPolicy) {
        this.submitError = 'Please fill out all fields.';
        return;
      }

      this.policies.push({ type: 'Quality Policy', name: this.qualityPolicy });
      this.policies.push({ type: 'Environment Policy', name: this.environmentPolicy });
      this.policies.push({ type: 'Health and Safety Policy', name: this.healthSafetyPolicy });

      this.qualityPolicy = '';
      this.environmentPolicy = '';
      this.healthSafetyPolicy = '';
      this.submitError = '';
    },
    deletePolicy(index) {
      this.policies.splice(index, 1);
    }
  }
};
</script>

<style scoped>
.content-wrapper {
  padding: 20px;
  margin-top: 60px;
}

.add-form {
  max-width: 1200px;
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

.btn-danger {
  background-color: gray;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 8px 16px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-size: 14px;
}

.btn-danger:hover {
  background-color: lightgray;
  color: black;
}

.error-message {
  display: block;
  margin-top: 12px;
  font-size: 16px;
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
