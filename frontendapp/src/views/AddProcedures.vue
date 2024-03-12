<template>
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6">
          <form @submit.prevent="uploadFile" class="add-form">
            <h1 class="form-title">Procedures</h1>
            <div class="form-group">
              <label for="formType" class="form-label">Document Type:</label>
              <select id="formType" class="form-control" v-model="formType">
                <option value="" disabled selected>Select Procedure Type</option>
                <option value="Documental Control Procedure">Documental Control Procedure</option>
                <option value="Corrective and Preventive Action (CAPA) Procedure">Corrective and Preventive Action (CAPA) Procedure</option>
                <option value="Internal Audit Procedure">Internal Audit Procedure</option>
                <option value="Management Review Procedure">Management Review Procedure</option>
                <option value="Risk Management Procedure">Risk Management Procedure</option>
              </select>
            </div>
            <div class="form-group">
              <label for="department" class="form-label">Departmental Process:</label>
              <input type="text" id="department" class="form-control" v-model="departmentName" placeholder="Enter department">
            </div>
            <div class="form-group">
              <label for="documentType" class="form-label">Document Type:</label>
              <input type="text" id="documentType" class="form-control" v-model="documentType" placeholder="Enter document type">
            </div>
            <div class="form-group">
              <label for="file" class="form-label">Choose File:</label>
              <input class="form-control form-control-lg me-3" id="formFileLg" type="file" @change="fileSelected" ref="file">
            </div>
            <div class="d-flex align-items-center">
              <button type="submit" class="btn btn-primary btn-lg">Upload</button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <iframe id="pdfViewer" class="pdf-viewer" ref="pdfViewer" height="100%"></iframe>
        </div>
      </div>
  
      <div class="row mt-4">
        <div class="col-md-6">
          <div id="cusTable" class="table-wrapper">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th id="filePath" scope="col">File Path</th>
                  <th scope="col">Date Uploaded</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(upload, index) in formFiles" :key="index">
                  <td>{{ index + 1 }}</td>
                  <td>{{ upload.file_path }}</td>
                  <td>{{ formatDate(upload.created_at) }}</td>
                  <td><button id="btnView" type="button" class="btn btn-secondary" @click="openPdf(upload.id)">View</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
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
  margin-left: 250px;
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

.btn-secondary {
  background-color: #007bff;
  border-style: none;
  width: 100%;
  height: 40px;
}

.btn-secondary:hover {
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
  margin-top: -15.5%;
  max-width: 700px;
  margin-left: 250px;
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
  margin-right: 50px;
}

.pdf-viewer {
  position: relative;
  border: 1px solid #ccc;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  display: block;
  width: 800px;
  height: 700px;
  margin-left: 5%;
  margin-top: 3%;
}

.table-wrapper {
  margin-top: 0; 
  max-height: 325px;
  overflow-y: auto;
}



</style>