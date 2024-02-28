<template>
    <div class="container">
      <div>
        <h2>Add Announcement</h2>
        <button @click="addAnnouncement" class="btn btn-primary">Add Announcement</button>
        <div v-if="showAddForm">
          <textarea v-model="newAnnouncement" class="form-control" rows="4" placeholder="Enter announcement"></textarea>
          <button @click="postAnnouncement" class="btn btn-success">Post</button>
        </div>
      </div>
      <div>
        <h2>Announcements</h2>
        <div v-for="(announcement, index) in announcements" :key="index">
          <div>{{ announcement }}</div>
          <button @click="editAnnouncement(index)" class="btn btn-primary">Edit</button>
          <button @click="deleteAnnouncement(index)" class="btn btn-danger">Delete</button>
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
        newAnnouncement: '',
        showAddForm: false,
        editingIndex: -1
      };
    },
    methods: {
      addAnnouncement() {
        this.showAddForm = true;
      },
      postAnnouncement() {
        if (this.editingIndex === -1) {
          this.announcements.push(this.newAnnouncement);
        } else {
          this.announcements[this.editingIndex] = this.newAnnouncement;
          this.editingIndex = -1;
        }
        this.newAnnouncement = '';
        this.showAddForm = false;
      },
      editAnnouncement(index) {
        this.newAnnouncement = this.announcements[index];
        this.editingIndex = index;
        this.showAddForm = true;
      },
      deleteAnnouncement(index) {
        this.announcements.splice(index, 1);
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
  </style>
  