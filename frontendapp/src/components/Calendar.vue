<template>
    <div class="container">
      <div class="calendar">
        <div class="header">
          <button @click="previousMonth" class="nav-button">&lt;</button>
          <h2>{{ currentMonth }}</h2>
          <button @click="nextMonth" class="nav-button">&gt;</button>
        </div>
        <div class="days">
          <div v-for="day in days" :key="day" class="day">{{ day }}</div>
        </div>
        <div class="dates">
          <div v-for="date in calendarDates" :key="date" class="date">{{ date }}</div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'CalendarPage',
    data() {
      return {
        currentDate: new Date(),
        currentMonth: '',
        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        calendarDates: []
      };
    },
    mounted() {
      this.updateCalendar();
    },
    methods: {
      updateCalendar() {
        const options = { month: 'long', year: 'numeric' };
        this.currentMonth = this.currentDate.toLocaleDateString('en-US', options);
        this.generateCalendarDates();
      },
      previousMonth() {
        this.currentDate.setMonth(this.currentDate.getMonth() - 1);
        this.updateCalendar();
      },
      nextMonth() {
        this.currentDate.setMonth(this.currentDate.getMonth() + 1);
        this.updateCalendar();
      },
      generateCalendarDates() {
        const year = this.currentDate.getFullYear();
        const month = this.currentDate.getMonth();
        const daysInMonth = new Date(year, month + 1, 0).getDate(); // Get the number of days in the current month
  
        this.calendarDates = Array.from({ length: daysInMonth }, (_, i) => i + 1); // Generate an array of numbers representing the days of the month
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 400px;
    margin: 0 auto;
  }
  
  .calendar {
    margin-top: 9%;
    border-radius: 15px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    background: linear-gradient(135deg, #f3f3f3, #ffffff);
  }
  
  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
  }
  
  .nav-button {
    background-color: #ffffff;
    color: #555555;
    border: none;
    font-size: 16px;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }
  
  .nav-button:hover {
    background-color: #f0f0f0;
    color: #333333;
  }
  
  .days {
    display: flex;
    justify-content: space-between;
  }
  
  .day {
    width: calc(100% / 7);
    padding: 10px;
    text-align: center;
    font-weight: bold;
  }
  
  .dates {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    text-align: center;
    max-height: 400px; 
    overflow-y: auto; 
  }
  
  .date {
    padding: 15px;
    border-radius: 15px;
    background-color: #ffffff;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  }
  </style>
  