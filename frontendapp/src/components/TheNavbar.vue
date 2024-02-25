<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../assets/bma.png" alt="BMA Logo" class="navbar-logo mr-2">
          Baliuag Maritime Academy
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            <a class="nav-link" href="#">Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {}
  </script>
  
  <style scoped>
  .navbar-brand {
    font-weight: bold;
    font-size: 24px;
    display: flex;
    align-items: center;
  }
  
  .navbar-logo {
    width: 40px; 
    height: auto; 
    margin-right: 10px; 
  }
  
  .navbar-nav .nav-link {
    color: #fff;
    font-size: 18px;
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
  </style>
  