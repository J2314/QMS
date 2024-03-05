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
        <div v-for="date in calendarDates" :key="date" class="date">
          {{ date }}
          <div v-for="event in getEventsForDate(date)" :key="event.id" class="event">
            <span class="event-type">{{ event.type === 'timeline' ? 'Timeline' : 'Deadline' }}</span>
            {{ event.content }}
          </div>
        </div>
      </div>

      <!-- Add Timeline and Deadline Buttons -->
      <div class="add-event-buttons">
        <button @click="openModal('timeline')">Add Timeline</button>
        <button @click="openModal('deadline')">Add Deadline</button>
      </div>
    </div>

    <!-- Modal for Adding Events -->
    <div v-if="isModalOpen" class="modal">
      <div class="modal-content">
        <span class="close" @click="closeModal">&times;</span>
        <h2>{{ modalType === 'timeline' ? 'Add Timeline' : 'Add Deadline' }}</h2>
        <label for="eventDate">Date:</label>
        <input type="text" id="eventDate" v-model="eventDate" placeholder="YYYY-MM-DD" />
        <label for="eventContent">Content:</label>
        <textarea id="eventContent" v-model="eventContent" placeholder="Event details..."></textarea>
        <button @click="addEvent">Add Event</button>
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
      calendarDates: [],
      events: [],
      isModalOpen: false,
      modalType: '',
      eventDate: '',
      eventContent: '',
    };
  },
  computed: {
    filteredTimelines() {
      return this.events.filter(event => event.type === 'timeline');
    },
    filteredDeadlines() {
      return this.events.filter(event => event.type === 'deadline');
    },
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
      const daysInMonth = new Date(year, month + 1, 0).getDate();

      this.calendarDates = Array.from({ length: daysInMonth }, (_, i) => i + 1);
    },
    getEventsForDate(date) {
      return this.events.filter(event => event.date === date);
    },
    openModal(type) {
      this.isModalOpen = true;
      this.modalType = type;
      this.eventDate = ''; // Clear previous input
      this.eventContent = ''; // Clear previous input
    },
    closeModal() {
      this.isModalOpen = false;
    },
    addEvent() {
      if (this.eventDate && this.eventContent) {
        const newEvent = {
          id: this.events.length + 1,
          type: this.modalType,
          date: this.eventDate,
          content: this.eventContent,
        };
        this.events.push(newEvent);
        this.closeModal();
      } else {
        alert('Please fill in both date and content fields.');
      }
    },
  },
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  height: 100vh;
}

.calendar {
  margin-top: 2%;
  border-radius: 15px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  background: linear-gradient(135deg, #f3f3f3, #ffffff);
  text-align: center;
  margin-right: 20px; 
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
  position: relative;
  padding: 15px;
  border-radius: 15px;
  background-color: #ffffff;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 10px;
}

.event {
  margin-top: 5px;
  padding: 5px;
  background-color: #eaeaea;
  border-radius: 5px;
}

.add-event-buttons {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}

.add-event-buttons button {
  margin-right: 10px;
}

.events {
  max-height: 400px;
  overflow-y: auto;
}

.events h3 {
  font-size: 18px;
  color: #007bff;
  margin-bottom: 10px;
}

.timeline-item,
.deadline-item {
  margin-bottom: 10px;
}

.timeline-date,
.deadline-date {
  font-weight: bold;
  margin-bottom: 5px;
}

.modal {
  display: block;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

label {
  margin-top: 10px;
  display: block;
  font-weight: bold;
}

input,
textarea {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 10px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
</style>
