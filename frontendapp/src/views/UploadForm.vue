<template>
    <div>
      <div class="content-wrapper">
        <form @submit.prevent="uploadForm" class="add-form">
          <h1 class="form-title">Upload Form</h1>
          <div class="form-group">
            <label for="fileName" class="form-label">File Name:</label>
            <input type="text" id="fileName" class="form-control" v-model="form.file_name" placeholder="Enter file name">
          </div>
          <div class="form-group">
            <label for="file" class="form-label">Choose File:</label>
            <input type="file" id="file" ref="file" @change="onFileChange" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  
  export default {
    name: 'UploadForm',
    data() {
      return {
        form: {
          file_name: '',
          file: null
        }
      };
    },
    methods: {
      onFileChange(event) {
        this.form.file = event.target.files[0];
      },
      async uploadForm() {
        const formData = new FormData();
        formData.append('file', this.form.file);
        formData.append('file_name', this.form.file_name);
        
        try {
          // Send formData to the server using Axios or fetch API
          console.log(formData);
          // await axios.post('/upload', formData);
          
          // Reset form fields after successful upload
          this.form.file_name = '';
          this.$refs.file.value = '';
          
          // Optionally, display a success message to the user
          alert('File uploaded successfully!');
        } catch (error) {
          console.error('Error uploading file:', error);
          // Optionally, display an error message to the user
          alert('Error uploading file: ' + error.message);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .content-wrapper {
    padding: 20px;
    margin-top: 60px;
  }
  
  .add-form {
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .form-label {
    font-size: 18px;
    color: #333;
  }
  
  .form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
    margin-bottom: 10px;
    max-height: 200px;
    overflow-y: auto;
  }
  
  .btn-primary {
    margin-top: 22px;
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
  
  .success-message,
  .error-message {
    display: block;
    margin-top: 12px;
    font-size: 16px;
    color: #28a745;
  }
  
  .error-message {
    color: #dc3545;
  }
  
  .form-title {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    margin-bottom: 30px;
  }
  </style>
  