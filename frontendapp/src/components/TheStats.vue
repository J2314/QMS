<template>
  <div class="container">
    <div>
      <h2>View Count</h2>
      <canvas ref="viewCountChart" width="300" height="150"></canvas>
    </div>
    <div>
      <h2>Download Count</h2>
      <canvas ref="downloadCountChart" width="300" height="150"></canvas>
    </div>
  </div>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
  name: 'StatsPage',
  data() {
    return {
      viewCounts: [100, 200, 300, 400, 500],
      downloadCounts: [50, 150, 250, 350, 450],
      labels: ['January', 'February', 'March', 'April', 'May'] 
    };
  },
  mounted() {
    this.renderViewCountChart();
    this.renderDownloadCountChart();
  },
  methods: {
    renderViewCountChart() {
      const ctx = this.$refs.viewCountChart.getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: this.labels,
          datasets: [{
            label: 'View Count',
            data: this.viewCounts,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
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
    renderDownloadCountChart() {
      const ctx = this.$refs.downloadCountChart.getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: this.labels,
          datasets: [{
            label: 'Download Count',
            data: this.downloadCounts,
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
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
}
</script>

<style scoped>
.container {
  display: flex;
  justify-content: space-between;
  max-width: 700px;
  margin: 20px auto;
}

.container div {
  flex: 0 1 45%; /* Adjust the width as needed */
  margin-bottom: 20px;
}
</style>
