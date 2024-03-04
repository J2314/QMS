<template>
  <div class="content-wrapper">
    <form @submit.prevent="uploadFile" class="add-form">
      <h1 class="form-title">Upload Form</h1>
      <div class="form-group">
        <label for="formName" class="form-label">Form Name:</label>
        <input type="text" id="formName" class="form-control" v-model="fileName" placeholder="Enter form name" readonly>
      </div>
      <div class="form-group">
        <label for="department" class="form-label">Department:</label>
        <input type="text" id="department" class="form-control" v-model="departmentName" placeholder="Enter department" readonly>
      </div>
      <div class="form-group">
        <label for="file" class="form-label">Choose File:</label>
        <input class="form-control form-control-lg me-3" id="formFileLg" type="file" @change="fileSelected" ref="file">
      </div>
      <div class="d-flex align-items-center">
        <button type="submit" class="btn btn-primary btn-lg">Upload</button>
      </div>
    </form>

    <table id="cusTable" class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Form ID</th>
          <th id="filePath" scope="col">File Path</th>
          <th scope="col">Date Uploaded</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(upload, index) in uploads" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ upload.form_id }}</td>
          <td>{{ upload.file_path }}</td>
          <td>{{ upload.created_at }}</td>
          <td><button type="button" class="btn btn-secondary" @click="viewFile(upload.file_path)">View</button></td>
        </tr>
      </tbody>
    </table>

    <!-- Modal for displaying file content -->
    <div class="modal" :class="{ 'is-active': showModal }">
      <div class="modal-background" @click="showModal = false"></div>
      <div class="modal-content">
        <iframe :src="fileContentUrl" frameborder="0" width="100%" height="500"></iframe>
      </div>
      <button class="modal-close is-large" aria-label="close" @click="showModal = false"></button>
    </div>

    <p v-if="error" class="text-danger">{{ error }}</p>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'UploadForm',
  data() {
    return {
      fileName: '',
      departmentName: '',
      formId: '',
      uploads: [],
      error: '',
      showModal: false,
      fileContentUrl: ''
    };
  },
  methods: {
    async uploadFile() {
      try {
        if (!this.form.file) {
          throw new Error('Please select a file.');
        }

        const formData = new FormData();
        formData.append('file', this.form.file);
        formData.append('form_id', this.formId);

        const response = await axios.post('http://127.0.0.1:8000/api/upload', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          }
        });

        this.uploads.push({
          form_id: response.data.form_id,
          file_path: response.data.file_path,
          created_at: response.data.created_at,
        });

        this.$refs.file.value = '';

        this.error = '';
        alert('File uploaded successfully!');
      } catch (error) {
        if (error.response && error.response.status === 422) {
          this.error = error.response.data.error || 'Validation error.';
        } else {
          this.error = 'Error uploading file.';
          console.error('Error uploading file:', error.message);
        }
      }
    },
    fileSelected(event) {
      const files = event.target.files;
      if (files.length > 0) {
        this.form.file = files[0];
      }
    },
    async viewFile(filePath) {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/fetch-file-content/${filePath}`);
        
        this.fileContentUrl = response.data;

        this.showModal = true;
      } catch (error) {
        console.error('Error fetching file content:', error);
      }
    },
    fetchData() {
      const formId = this.$route.params.formId;
      axios.get(`http://127.0.0.1:8000/api/retrieve-forms/${formId}`)
        .then(response => {
          console.log(response);
          this.fileName = response.data.form.file_name;
          this.departmentName = response.data.form.department.name;
          
          this.formId = formId;
          axios.get(`http://127.0.0.1:8000/api/retrieve-upload/${formId}`)
            .then(uploadResponse => {
              this.uploads = uploadResponse.data.map(upload => ({
                form_id: upload.form_id,
                file_path: upload.file_path,
                created_at: upload.created_at,
              }));
            })
            .catch(error => {
              console.error('Error fetching uploads:', error);
            });
        })
        .catch(error => {
          console.error('Error fetching department data:', error);
        });
    },
    retrieveUploads() {
      this.fetchData();
    },
  },
  mounted() {
    this.retrieveUploads();
  },
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

.btn-secondary{
  background-color: #007bff;
  border-style: none;
  width: 80%;
}

.btn-secondary:hover{
  background-color: #0056b3;
}


.btn-primary:hover {
  background-color: #0056b3;
}

.form-title {
  font-size: 32px;
  font-weight: bold;
  color: #333;
  margin-bottom: 30px;
}

#cusTable {
  margin-top: 40px;
  margin-left: 18%;
  width: 64%;
}

.table-hover {
  width: 65%;
  margin-top: 30px;
  margin-left: 18%;
  border-collapse: collapse;
}

.table-hover th,
.table-hover td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
}

.table-hover th {
  background-color: #f0f0f0;
}

.form-control-lg {
  width: 100%;
  flex: 1;
}

.align-items-center {
  width: 100%;
  margin-right: 50px;
}
</style>
