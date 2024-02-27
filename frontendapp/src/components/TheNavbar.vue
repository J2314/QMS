<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-green">
    <a class="navbar-brand" href="#">
      <img src="../assets/bma.png" alt="BMA Logo" class="navbar-logo mr-2">
      <span class="brand-text">Baliuag Maritime Academy</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Admin</a>
      </div>
    </div>
  </nav>
</template>

<script>
export default {

}
</script>

<style scoped>
.navbar-brand {
  font-family: 'Arial', sans-serif; 
  font-weight: bold;
  font-size: 24px;
  display: flex;
  align-items: center;
  padding-left: 20px; 
}

.navbar-nav {
  padding-right: 20px; 
}

.navbar-logo {
  width: 40px; 
  height: auto; 
  margin-right: 10px; 
}

.brand-text {
  font-family: 'Arial', sans-serif; 
  font-size: 18px;
  font-weight: bold; 
  color: #fff; 
  text-transform: uppercase; 
  letter-spacing: 1px;
}

.navbar-nav .nav-link {
  font-family: 'Arial', sans-serif; 
  color: #fff;
  font-weight: bold;
  font-size: 16px; 
  margin-left: 20px;
}

.navbar-nav .nav-link:hover {
  color: #fff;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.5)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.bg-green {
  background-color: #087f23;
}

.navbar-nav .nav-link:not(:last-child) {
  margin-right: 20px;
}
</style>
