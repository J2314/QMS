<template>
  <div class="content-wrapper">
    <div class="add-form" style="margin-left: 12%;">
      <form @submit.prevent="uploadFile">
        <h1 class="form-title">Policy Documents</h1>
        <div class="form-group">
          <label for="documentType" class="form-label">Document Type:</label>
          <select id="documentType" class="form-control" v-model="selectedType">
            <option value="Quality Policy">Quality Policy</option>
            <option value="Environmental Policy">Environmental Policy</option>
            <option value="Health and Safety Policy">Health and Safety Policy</option>
          </select>
        </div>
        <div class="form-group">
          <label for="documentName" class="form-label">Document Name:</label>
          <input type="text" id="documentName" class="form-control" v-model="documentName" placeholder="Enter document name">
        </div>
        <div class="form-group">
          <label for="file" class="form-label">Choose File:</label>
          <input class="form-control form-control-lg me-3" id="formFileLg" type="file" @change="fileSelected" ref="file">
        </div>
        <div class="d-flex">
          <button type="submit" class="btn btn-primary btn-lg">Upload</button>
        </div>
      </form>
    </div>

    <div id="cusTable" class="table-wrapper" style="margin-left: 12%;">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th id="documentType" scope="col">Document Type</th>
            <th id="documentName" scope="col">Document Name</th>
            <th id="filePath" scope="col">File Path</th>
            <th id="actions" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(upload, index) in formFiles" :key="index">
            <td>{{ index + 1 }}</td>
            <td>{{ upload.documentType }}</td>
            <td>{{ upload.documentName }}</td>
            <td>{{ upload.filePath }}</td>
            <td><button id="btnView" type="button" class="btn btn-secondary" @click="openPdf(upload.id)">View</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
.content-wrapper {
  padding: 20px;
  margin-top: 60px; 
  overflow-y: auto;
  flex: 1;
}

.add-form {
  max-width: 700px;
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
  margin-bottom: 20px;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.table-wrapper {
  margin-top: 20px;
  max-width: 700px;
}

.table-hover {
  width: 100%;
  margin-top: 0; 
  border-collapse: collapse;
}

.table-hover th,
.table-hover td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
  vertical-align: middle;
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
}
</style>
