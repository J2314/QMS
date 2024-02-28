<template>
    <div class="container">
      <div>
        <h2>Add Announcement</h2>
        <div class="form-group">
          <label for="announcementTitle">Title</label>
          <input v-model="newAnnouncement.title" type="text" class="form-control" id="announcementTitle" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="announcementDepartment">Department</label>
          <select v-model="newAnnouncement.department" class="form-control" id="announcementDepartment">
            <option value="" disabled>Select department</option>
            <option value="Department 1">Department 1</option>
            <option value="Department 2">Department 2</option>
            <option value="Department 3">Department 3</option>
            <!-- Add more department options as needed -->
          </select>
        </div>
        <div class="form-group">
          <label for="announcementDescription">Description</label>
          <input v-model="newAnnouncement.description" type="text" class="form-control" id="announcementDescription" placeholder="Enter description">
        </div>
        <div class="form-group">
          <label for="announcementContent">Content</label>
          <textarea v-model="newAnnouncement.content" class="form-control" id="announcementContent" rows="4" placeholder="Enter content"></textarea>
        </div>
        <button @click="postAnnouncement" class="btn btn-success">{{ editingIndex === -1 ? 'Post' : 'Update' }}</button>
      </div>
      <div>
        <h2>Announcements</h2>
        <div v-for="(announcement, index) in announcements" :key="index" class="announcement-item">
          <div class="announcement-info">
            <div><strong>Title:</strong> {{ announcement.title }}</div>
            <div><strong>Department:</strong> {{ announcement.department }}</div>
            <div><strong>Description:</strong> {{ announcement.description }}</div>
            <div><strong>Content:</strong> {{ announcement.content }}</div>
          </div>
          <div class="announcement-actions">
            <button @click="editAnnouncement(index)" class="btn btn-primary">Edit</button>
            <button @click="deleteAnnouncement(index)" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'AnnouncementsPage',
    data() {
      return {
        announcements: [],
        newAnnouncement: {
          title: '',
          department: '',
          description: '',
          content: ''
        },
        editingIndex: -1
      };
    },
    methods: {
      postAnnouncement() {
        if (this.editingIndex === -1) {
          this.announcements.push({ ...this.newAnnouncement });
        } else {
          this.announcements[this.editingIndex] = { ...this.newAnnouncement };
          this.editingIndex = -1;
        }
        this.resetForm();
      },
      editAnnouncement(index) {
        this.newAnnouncement = { ...this.announcements[index] };
        this.editingIndex = index;
      },
      deleteAnnouncement(index) {
        this.announcements.splice(index, 1);
      },
      resetForm() {
        this.newAnnouncement = {
          title: '',
          department: '',
          description: '',
          content: ''
        };
      }
    }
  }
  </script>
  
  <style scoped>
  .container {
    display: flex;
    justify-content: space-between;
    max-width: 800px;
    margin: 20px auto;
  }
  
  .container div {
    flex: 0 1 48%;
  }
  
  .form-control {
    width: 100%;
    margin-bottom: 10px;
  }
  
  .announcement-item {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
  }
  
  .announcement-info {
    margin-bottom: 10px;
  }
  
  .announcement-actions button {
    margin-right: 5px;
  }
  </style>
  