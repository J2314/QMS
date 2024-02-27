<template>
    <div>
      <Navbar />
      <Sidebar />
      <div class="content-wrapper">
        <h1 class="section-title">Statistics</h1>
        <div class="statistics-container">
          <div class="statistic">
            <div class="statistic-icon">
              <i class="fas fa-eye"></i>
            </div>
            <div class="statistic-info">
              <div class="statistic-value">10,000</div>
              <div class="statistic-label">Viewing Count</div>
            </div>
          </div>
          <div class="statistic">
            <div class="statistic-icon">
              <i class="fas fa-download"></i>
            </div>
            <div class="statistic-info">
              <div class="statistic-value">5,000</div>
              <div class="statistic-label">Downloading Count</div>
            </div>
          </div>
          <div class="statistic">
            <div class="statistic-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="statistic-info">
              <div class="statistic-value">200</div>
              <div class="statistic-label">User Access</div>
            </div>
          </div>
        </div>
        <div class="user-table">
          <table class="table">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Admin</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>User</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from '../components/TheNavbar.vue'
  import Sidebar from '../components/TheSidebar.vue'
  export default {
    name: 'StatsPage',
    components: {
      Navbar,
      Sidebar,
    },
  }
  </script>
  
  <style scoped>
  .content-wrapper {
    padding: 20px;
  }
  
  .section-title {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    margin-bottom: 30px;
  }
  
  .statistics-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
  }
  
  .statistic {
    flex: 1;
    background-color: #f5f5f5;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
  }
  
  .statistic-icon {
    font-size: 40px;
    margin-bottom: 10px;
  }
  
  .statistic-value {
    font-size: 24px;
    font-weight: bold;
  }
  
  .statistic-label {
    font-size: 16px;
    color: #666;
  }
  
  .user-table {
    margin-top: 40px;
  }
  
  .table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .table th,
  .table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
  }
  
  .table th {
    background-color: #f5f5f5;
    font-weight: bold;
    color: #333;
  }
  </style>
  