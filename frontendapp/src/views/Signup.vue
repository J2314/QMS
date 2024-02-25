<template>
  <div class="signup-page">
    <div class="signup-container">
      <div class="logo">
        <img src="@/assets/bma.png" alt="Logo" class="logo-image">
      </div>
      <h1 class="page-title">BMA E-QMS</h1>
      <p class="signup-label">Sign Up</p>
      <div class="alert alert-danger" v-if="error">{{ error }}</div>
      <form class="signup-form" @submit.prevent="onSignup">
        <div class="form-group">
          <label for="email" class="form-label">Email</label>
          <input v-model.trim="email" type="email" id="email" placeholder="Enter your email" class="input-field">
          <div class="error" v-if="errors.email">{{ errors.email }}</div>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <input v-model.trim="password" type="password" id="password" placeholder="Enter your password" class="input-field">
          <div class="error" v-if="errors.password">{{ errors.password }}</div>
        </div>
        <button type="submit" class="signup-button">Sign Up</button>
      </form>
      <div class="login-section">
        <p>Already have an account? <router-link to="/" class="login-link">Login</router-link></p>
      </div>
    </div>
  </div>
</template>

<script>
import SignupValidations from '@/services/SignupValidations';
import {mapActions, mapMutations} from 'vuex';
import {LOADING_SPINNER_SHOW_MUTATION, SIGNUP_ACTION} from '../store/storeconstants'
export default {
  name: 'SignupPage',
  data() {
    return {
      email: '',
      password: '',
      errors: [],
      error: '',
    };
  },
  methods: {
    ...mapActions('auth', {
      signup: SIGNUP_ACTION,
    }),

    ...mapMutations({
      showLoading: LOADING_SPINNER_SHOW_MUTATION
    }),
    async onSignup() {
      let validations = new SignupValidations(
          this.email, 
          this.password,
          );
          this.errors = validations.checkValidations();
          if ('email' in this.errors || 'password' in this.errors) {
            return false;
          }

          this.showLoading(true);

          await this.signup({email: this.email, password: this.password}).catch(error => {
           this.error = error;
           this.showLoading(false);
          });
          this.showLoading(false);
    }
  }
}
</script>

<style scoped>
.signup-page {
  display: flex;
  justify-content: center;
  align-items: center;
  height: calc(100vh - 30px);
  margin-top: 1.5%;
}

.signup-container {
  border-radius: 15px;
  box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
  padding: 30px;
  width: 400px;
  background-color: #fff;
}

.signup-label {
  font-size: 20px;
  color: #555;
  text-align: center;
  margin-bottom: 15px;
  font-weight: bold;
  text-transform: uppercase;
}

.logo {
  text-align: center;
  margin-bottom: 20px;
}

.logo-image {
  width: 120px;
}

.page-title {
  font-family: 'Merriweather', serif;
  font-size: 24px;
  margin-bottom: 20px;
  color: #087f23;
  text-align: center;
}

.signup-form {
  width: 100%;
}

.form-group {
  margin-bottom: 20px;
}

.form-label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
  font-size: 16px;
  color: #333;
}

.input-field {
  padding: 12px;
  width: 100%;
  border: 2px solid #4CAF50;
  border-radius: 8px;
  font-size: 16px;
}

.input-field:focus {
  outline: none;
  border-color: #087f23;
}

.signup-button {
  padding: 14px 24px;
  background-color: #087f23;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 18px;
  transition: background-color 0.3s ease;
}

.signup-button:hover {
  background-color: #005711;
}

.login-section {
  text-align: center;
  margin-top: 16px;
}

.login-link {
  color: #087f23;
  text-decoration: none;
  font-size: 16px;
}

.login-link:hover {
  text-decoration: underline;
}

p {
  font-size: 16px;
}
</style>
