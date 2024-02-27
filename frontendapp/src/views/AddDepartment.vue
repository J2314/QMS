<template>
    <div>
        <Navbar/>
        <Sidebar/>
        <div class="content-wrapper">
            <form @submit.prevent="submitForm" class="add-form">
                <h1 class="form-title">Add Department</h1> 
                <div class="form-group">
                    <label for="departmentName" class="form-label">Department Name</label>
                    <input type="text" id="departmentName" class="form-control" v-model="departmentName" placeholder="Enter department name">
                </div>
                <div class="form-group">
                    <label for="departmentCode" class="form-label">Department Code</label>
                    <input type="text" id="departmentCode" class="form-control" v-model="departmentCode" placeholder="Enter department code">
                </div>
                <button type="submit" class="btn btn-primary" :disabled="isSubmitting">Submit</button>
                <span v-if="submitSuccess" class="success-message">Form submitted successfully!</span>        
                <span v-if="submitError" class="error-message">{{ submitError }}</span>
            </form>
        </div>
    </div>
</template>

<script>
import Navbar from '../components/TheNavbar.vue'
import Sidebar from '../components/TheSidebar.vue'

export default {
    name: 'AddFormPage',
    components: {
        Navbar,
        Sidebar,
    },
    data() {
        return {
            departmentName: '',
            departmentCode: '',
            isSubmitting: false,
            submitSuccess: false,
            submitError: '',
        };
    },
    methods: {
        submitForm() {
            if (!this.departmentName || !this.departmentCode) {
                this.submitError = 'Please fill out all fields.';
                return;
            }

            this.isSubmitting = true;
            setTimeout(() => {
                this.departmentName = '';
                this.departmentCode = '';
                this.isSubmitting = false;
                this.submitSuccess = true;
                setTimeout(() => {
                    this.submitSuccess = false;
                }, 3000);
            }, 1000);
        },
    }
}
</script>

<style scoped>
.content-wrapper {
    padding: 20px;
}

.add-form {
    max-width: 400px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    font-size: 18px; /* Increased font size */
    color: #333;
    margin-bottom: 10px; /* Increased margin bottom */
}

.form-control {
    width: 100%;
    padding: 12px; /* Increased padding */
    border: 1px solid #ccc;
    border-radius: 6px; /* Increased border radius */
    font-size: 16px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 6px; /* Increased border radius */
    padding: 12px 20px; /* Increased padding */
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
    margin-top: 12px; /* Increased margin top */
    font-size: 16px; /* Increased font size */
    color: #28a745;
}

.error-message {
    color: #dc3545;
}

.form-title {
    font-size: 32px; /* Increased font size */
    font-weight: bold;
    color: #333;
    margin-bottom: 30px; /* Increased margin bottom */
}
</style>
