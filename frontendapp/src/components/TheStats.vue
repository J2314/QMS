<template>
  <div class="container">
    <div class="chart-container">
      <div class="chart">
        <h3>Form Viewing Count</h3>
        <canvas ref="formViewCountChart" width="300" height="150"></canvas>
      </div>
      <div class="chart">
        <h3>Downloading Count</h3>
        <canvas ref="downloadingCountChart" width="300" height="150"></canvas>
      </div>
    </div>
  </div>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
  name: 'MonitoringPage',
  data() {
    return {
      formViewCounts: [100, 200, 300, 400, 500],
      downloadingCounts: [50, 150, 250, 350, 450]
    };
  },
  mounted() {
    this.renderFormViewCountChart();
    this.renderDownloadingCountChart();
  },
  methods: {
    renderFormViewCountChart() {
      const ctx = this.$refs.formViewCountChart.getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May'],
          datasets: [{
            label: 'Form View Count',
            data: this.formViewCounts,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    },
    renderDownloadingCountChart() {
      const ctx = this.$refs.downloadingCountChart.getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May'],
          datasets: [{
            label: 'Downloading Count',
            data: this.downloadingCounts,
            fill: false,
            borderColor: 'rgb(255, 99, 132)',
            tension: 0.1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }
  }
};
</script>

<style scoped>
.container {
  max-width: 800px;
  margin: 60px auto 20px; 
}

.chart-container {
  margin-top: -5%;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

.chart {
  padding: 20px;
  border-radius: 8px;
}

.chart h3 {
  font-size: 20px;
  color: #007bff;
  font-weight: bold;
  margin-top: 0;
  margin-bottom: 10px;
}

.table {
  margin-bottom: 5%;
  width: 100%;
  border-collapse: collapse;
}

.table th, .table td {
  padding: 8px;
  border-bottom: 1px solid #ddd;
  text-align: left;
}

.table th {
  background-color: #f5f5f5;
}

.table tr:hover {
  background-color: #f2f2f2;
}
</style>
