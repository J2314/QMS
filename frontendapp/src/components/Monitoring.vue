<template>
  <div class="container">
    <h2 class="page-title">User Management</h2>

    <!-- User Table -->
    <div class="user-table">
      <h3>Users</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="index">
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
              <span v-for="(role, i) in user.roles" :key="i" class="role">{{ role }}</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
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
  name: 'MonitoringPage',
  data() {
    return {
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
    formatTimestamp(timestamp) {
      return timestamp.toLocaleString();
    }
  }
};
</script>

<style scoped>
.container {
  max-width: 800px;
  margin: 60px auto 20px; 
}

.page-title {
  margin-top: -5%;
  font-size: 24px;
  margin-bottom: 20px;
  text-align: center;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
}

.user-table h3 {
  margin-bottom: 10px;
  font-size: 20px;
  color: #007bff;
  font-weight: bold;
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
  font-size: 16px;
}

.activity {
  flex: 2;
  font-size: 16px;
  color: #555;
}

.role {
  color: black;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  font-style: italic;
}
</style>
