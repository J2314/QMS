<template>
    <div class="container">
      <h2 class="page-title">User Management</h2>
  
      <!-- Add Role Form -->
      <form @submit.prevent="addNewRole" class="add-role-form">
        <div class="form-group">
          <label for="newRole">New Role</label>
          <input v-model="newRole" type="text" id="newRole" class="form-control" placeholder="Enter new role">
        </div>
        <button type="submit" class="btn btn-primary">Add Role</button>
      </form>
  
      <!-- User Table -->
      <div class="user-table">
        <h3>Users</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in users" :key="index">
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>
                <span v-for="(role, i) in user.roles" :key="i" class="badge badge-info">{{ role }}</span>
              </td>
              <td>
                <button @click="addRole(index)" class="btn btn-success">Add Role</button>
                <button @click="deleteRole(index)" class="btn btn-danger">Delete Role</button>
                <button @click="disableUser(index)" class="btn btn-warning">Disable User</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- User Activity Log -->
      <div class="activity-log">
        <h3>User Activity Log</h3>
        <div v-for="(log, index) in activityLog" :key="index" class="activity-item">
          <div class="timestamp">{{ formatTimestamp(log.timestamp) }}</div>
          <div class="user">{{ log.user }}</div>
          <div class="activity">{{ log.activity }}</div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'UserManagement',
    data() {
      return {
        newRole: '', // New role input field
        users: [
          { name: 'John Doe', email: 'john@example.com', roles: ['Admin'] },
          { name: 'Jane Smith', email: 'jane@example.com', roles: ['User'] }
        ],
        activityLog: [
          { timestamp: new Date(), user: 'John Doe', activity: 'Logged in' },
          { timestamp: new Date(), user: 'Jane Smith', activity: 'Viewed dashboard' }
        ]
      };
    },
    methods: {
      addNewRole() {
        if (this.newRole.trim() !== '') {
          this.newRole = this.newRole.trim();
          // Check if the role already exists
          if (!this.roles.includes(this.newRole)) {
            // Add the new role to the roles array
            this.roles.push(this.newRole);
            // Clear the new role input field
            this.newRole = '';
          } else {
            alert('Role already exists!');
          }
        }
      },
      addRole() {
        // Implement role addition logic here
      },
      deleteRole() {
        // Implement role deletion logic here
      },
      disableUser() {
        // Implement user disabling logic here
      },
      formatTimestamp(timestamp) {
        return timestamp.toLocaleString();
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
    margin: 60px auto 20px; /* Adjusted margin to make space for the fixed navbar */
  }
  
  .page-title {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .add-role-form {
    margin-bottom: 20px;
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  .user-table h3 {
    margin-bottom: 10px;
  }
  
  .activity-log {
    margin-top: 40px;
  }
  
  .activity-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
  }
  
  .timestamp {
    flex: 0 0 150px;
    font-size: 14px;
    color: #888;
  }
  
  .user {
    flex: 1;
    font-weight: bold;
  }
  
  .activity {
    flex: 2;
  }
  
  .badge {
    margin-right: 5px;
    font-size: 12px;
  }
  
  .btn {
    font-size: 14px;
  }
  
  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }
  
  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }
  
  .btn-success {
    background-color: #28a745;
    border-color: #28a745;
  }
  
  .btn-success:hover {
    background-color: #218838;
    border-color: #218838;
  }
  
  .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
  }
  
  .btn-danger:hover {
    background-color: #c82333;
    border-color: #c82333;
  }
  
  .btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
  }
  
  .btn-warning:hover {
    background-color: #e0a800;
    border-color: #e0a800;
  }
  </style>
  