<template>
    <div class="content-wrapper">
      <h1 class="form-title">Policy Documents</h1>
      <div class="add-form">
        <form @submit.prevent="addPolicy('Quality')" class="policy-form">
          <label for="newQualityPolicyName" class="form-label">New Quality Policy Name:</label>
          <div class="input-group">
            <input type="text" id="newQualityPolicyName" class="form-control" v-model="newQualityPolicyName" required>
            <button type="submit" class="btn btn-primary">Add Quality Policy</button>
          </div>
        </form>
        <form @submit.prevent="addPolicy('Environmental')" class="policy-form">
          <label for="newEnvironmentalPolicyName" class="form-label">New Environmental Policy Name:</label>
          <div class="input-group">
            <input type="text" id="newEnvironmentalPolicyName" class="form-control" v-model="newEnvironmentalPolicyName" required>
            <button type="submit" class="btn btn-primary">Add Environmental Policy</button>
          </div>
        </form>
        <form @submit.prevent="addPolicy('Health & Safety')" class="policy-form">
          <label for="newSafetyPolicyName" class="form-label">New Health & Safety Policy Name:</label>
          <div class="input-group">
            <input type="text" id="newSafetyPolicyName" class="form-control" v-model="newSafetyPolicyName" required>
            <button type="submit" class="btn btn-primary">Add Health & Safety Policy</button>
          </div>
        </form>
      </div>
      <div class="policy-table-container">
        <ul class="policy-list">
          <li v-for="policy in policyDocuments" :key="policy.id" class="policy-item">
            <span class="policy-name">{{ policy.name }}</span>
            <button @click="deletePolicy(policy.id)" class="btn btn-danger">Delete</button>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'PolicyDocuments',
    data() {
      return {
        newQualityPolicyName: '',
        newEnvironmentalPolicyName: '',
        newSafetyPolicyName: '',
        policyDocuments: []
      };
    },
    methods: {
      async addPolicy(type) {
        let policyName = '';
        switch (type) {
          case 'Quality':
            policyName = this.newQualityPolicyName;
            break;
          case 'Environmental':
            policyName = this.newEnvironmentalPolicyName;
            break;
          case 'Health & Safety':
            policyName = this.newSafetyPolicyName;
            break;
        }
  
        try {
          const response = await axios.post('http://127.0.0.1:8000/api/policy', {
            name: policyName,
            type: type
          });
          this.policyDocuments.push(response.data);
          switch (type) {
            case 'Quality':
              this.newQualityPolicyName = '';
              break;
            case 'Environmental':
              this.newEnvironmentalPolicyName = '';
              break;
            case 'Health & Safety':
              this.newSafetyPolicyName = '';
              break;
          }
        } catch (error) {
          console.error(`Error adding ${type} policy:`, error);
        }
      },
      async deletePolicy(policyId) {
        try {
          await axios.delete(`http://127.0.0.1:8000/api/policy/${policyId}`);
          this.policyDocuments = this.policyDocuments.filter(policy => policy.id !== policyId);
        } catch (error) {
          console.error('Error deleting policy:', error);
        }
      },
      async fetchPolicyDocuments() {
        try {
          const response = await axios.get('http://127.0.0.1:8000/api/policies');
          this.policyDocuments = response.data;
        } catch (error) {
          console.error('Error fetching policy documents:', error);
        }
      }
    },
    mounted() {
      this.fetchPolicyDocuments();
    }
  }
  </script>
  
  <style scoped>
  .content-wrapper {
    padding: 20px;
    margin-top: 60px;
  }
  
  .form-title {
    margin-left: 15%;
    font-size: 32px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
  }
  
  .add-form {
    margin-left: 15%;
    margin-bottom: 20px;
  }
  
  .policy-form {
    margin-bottom: 20px;
  }
  
  .form-label {
    font-size: 18px;
    color: #333;
    margin-right: 10px;
  }
  
  .input-group {
    display: flex;
    align-items: center;
  }
  
  .form-control {
    flex: 1;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    margin-right: 10px;
  }
  
  .btn-primary {
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
  
  .policy-table-container {
    max-width: 500px;
  }
  
  .policy-list {
    list-style: none;
    padding: 0;
  }
  
  .policy-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-bottom: 10px;
  }
  
  .policy-name {
    flex: 1;
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
  </style>
  