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
        <label for="fileName" class="form-label">File Name:</label>
        <input type="text" id="fileName" class="form-control" v-model="fileDisplayName" placeholder="Enter file name">
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
          <th scope="col">File ID</th>
          <th id="filePath" scope="col">File Path</th>
          <th scope="col">Date Uploaded</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in items" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ item.form_id }}</td>
          <td>{{ item.file_path }}</td>
          <td>{{ item.uploaded_at }}</td>
        </tr>
      </tbody>
    </table>

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
      fileDisplayName: '',
      formId: '',
      form: {
        file: null,
      },
      items: [],
      error: ''
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

        this.items.push({
          file_id: response.data.file_id,
          file_path: response.data.file_path,
          uploaded_at: new Date().toISOString(),
        });

        this.$refs.file.value = '';
        this.fileDisplayName = '';

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
      this.form.file = event.target.files[0];
      this.fileDisplayName = event.target.files[0].name;
    },
    fetchData() {
      const formId = this.$route.params.formId;

      axios.get(`http://127.0.0.1:8000/api/retrieve-forms/${formId}`)
        .then(response => {
          console.log(response);
          this.fileName = response.data.form.file_name;
          this.departmentName = response.data.form.department.name;
          this.formId = formId;
        })
        .catch(error => {
          console.error('Error fetching department data:', error);
        });
    },
  },
  mounted() {
    this.fetchData();
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
