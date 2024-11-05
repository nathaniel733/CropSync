<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login1.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Irrigation System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="customerstyles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #4a58b9;
        }
        .navbar {
            background-color: #79d2a0;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            transition: color 0.3s ease-in-out, background-color 0.5s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            color: #cfd4da;
            background-color: rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            color: #ffffff;
            transition: color 0.3s ease-in-out;
            display: flex;
            align-items: center;
        }
        .navbar-brand:hover {
            color: #cfd4da;
        }
        .navbar-grid {
            background-color: #2cae6b;
            padding: 10px;
            border-radius: 0.375rem;
        }
        .navbar-brand img {
            height: 150px;
            width: 200px;
            margin-right: 60px;
        }
        .hero-section {
            background: url('p6.jpg') no-repeat center center;
            background-size: cover;
            color: #ffffff;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }
        .hero-section img {
            filter: blur(5px);
            -webkit-filter: blur(5px);
            z-index: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .hero-section h1 {
            font-size: 4rem;
            color: #ffffff;
            background-color: rgba(14, 82, 61, 0.5);
            padding: 20px;
            border-radius: 0.375rem;
            margin: 0;
            text-shadow: 3px 3px 6px rgba(15, 86, 35, 0.8);
            transition: transform 0.3s ease, color 0.3s ease;
            position: relative;
            z-index: 2;
        }
        .hero-section h1:hover {
            transform: scale(1.05);
            color: #d3d3d3;
        }
        .hero-section p {
            font-size: 1.5rem;
            color: #f1f1f1;
            margin-top: 20px;
            padding: 10px;
            background-color: rgba(14, 173, 93, 0.4);
            border-radius: 0.375rem;
            transition: color 0.3s ease;
            position: relative;
            z-index: 2;
        }
        .hero-section p:hover {
            color: #d3d3d3;
        }
        .content-section {
            padding: 40px 0;
        }
        .content-section h2 {
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            overflow: hidden;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .card img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease, filter 0.3s ease;
        }
        .card:hover img {
            transform: scale(1.1);
            filter: brightness(0.9);
        }
        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transform: translateY(-10px);
        }
        .feature-card {
            border: none;
            border-radius: 0.375rem;
            color: #ffffff;
        }
        .feature-card:nth-of-type(1) {
            background-color: #17a2b8;
        }
        .feature-card:nth-of-type(2) {
            background-color: #28a745;
        }
        .feature-card:nth-of-type(3) {
            background-color: #ffc107;
        }
        .feature-card .card-body {
            padding: 1.5rem;
        }
        .feature-card .card-title {
            color: #ffffff;
        }
        .sensor-card {
            border: none;
            border-radius: 0.375rem;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
        }
        .sensor-card:nth-of-type(1) {
            background-color: #39dea2;
            color: #ffffff;
        }
        .sensor-card:nth-of-type(2) {
            background-color: #ffc107;
            color: #ffffff;
        }
        .sensor-card:nth-of-type(3) {
            background-color: #28a745;
            color: #ffffff;
        }
        .sensor-card .icon {
            font-size: 3rem;
        }
        .footer {
            background-color: #14742e;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }
        .footer p {
            background-color: #0e8a16;
            padding: 10px;
            border-radius: 0.375rem;
            display: inline-block;
        }
        .sensor-readings {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 0.375rem;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .progress-bar {
            height: 1.5rem;
            transition: width 0.6s ease;
        }
        .progress {
            height: 1.5rem;
            margin-top: 10px;
        }
        .navbar-button {
            border-radius: 0.375rem;
            padding: 10px 20px;
            margin: 5px;
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-home {
            background-color: #007bff;
            color: #ffffff;
            border: none;
        }
        .btn-home:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
        .btn-features {
            background-color: #17a2b8;
            color: #ffffff;
            border: none;
        }
        .btn-features:hover {
            background-color: #117a8b;
            color: #ffffff;
        }
        .btn-works {
            background-color: #28a745;
            color: #ffffff;
            border: none;
        }
        .btn-works:hover {
            background-color: #1e7e34;
            color: #ffffff;
        }
        .btn-contact {
            background-color: #ffc107;
            color: #ffffff;
            border: none;
        }
        .btn-contact:hover {
            background-color: #e0a800;
            color: #ffffff;
        }
        .btn-logout {
            background-color: #dc3545;
            color: #ffffff;
            border: none;
        }
        .btn-logout:hover {
            background-color: #c82333;
            color: #ffffff;
        }
        #requestSensorInfoBtn {
    background-color:#28a745; /* Solid green color */
    color: #ffffff; /* White text */
    border: none;
    padding: 12px 25px; /* Padding for better size */
    font-size: 1.2rem; /* Larger font size */
    border-radius: 0.5rem; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth */
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
}

#requestSensorInfoBtn:hover {
    background-color: #dc3545; /* Red color on hover */
    transform: scale(1.05); /* Slightly larger on hover */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* More shadow on hover */
}
.motor-control-btn {
    border-radius: 0.375rem;
    padding: 12px 25px;
    font-size: 1.2rem;
    color: #ffffff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.form-check-input:checked {
    background-color: #28a745 !important;
    border-color: #28a745 !important;
}

.form-check-input {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
}

.motor-control-btn.irrigation-motor {
    background-color: #007bff; /* Blue color for irrigation motor */
}

.motor-control-btn.irrigation-motor:hover {
    background-color: #0056b3;
}

.motor-control-btn.water-pump {
    background-color: #28a745; /* Green color for water pump */
}

.motor-control-btn.water-pump:hover {
    background-color: #1e7e34;
}



    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container navbar-grid">
            <div class="row w-100">
                <div class="col-lg-6 d-flex align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="logo.jpg" alt="Logo">
                      <h2>  <font size="20" color="jade">Crop Sink</font></h2>
                    </a>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link navbar-button btn-home" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navbar-button btn-features" href="#features">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navbar-button btn-works" href="#how-it-works">How It Works</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navbar-button btn-contact" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navbar-button btn-logout" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section">
        <div class="container">
  <h1>      <font color="#acd8a7">KRISHI JAL MITRA</h1></font>
            <p>Efficiently manage and optimize your garden's water usage with advanced technology.</p>
        </div>
    </header>

    <section id="features" class="content-section">
        <div class="container">
            <h2 class="text-center">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="bi bi-droplet"></i>
                            </div>
                            <h5 class="card-title">Efficient Water Usage</h5>
                            <p class="card-text">Our system ensures water is used efficiently, reducing waste and saving you money.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <h5 class="card-title">Automated Scheduling</h5>
                            <p class="card-text">Set up automated watering schedules based on real-time moisture data.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <div class="feature-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h5 class="card-title">Data Insights</h5>
                            <p class="card-text">Access detailed insights and historical data to make informed decisions about your irrigation. Track trends in soil moisture, temperature, and humidity to optimize your watering strategy and improve plant health over time.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sensor-info" class="sensor-readings">
        <div class="container">
            <h2 class="text-center">Real-Time Sensor Information</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card sensor-card">
                        <div class="card-body">
                            <div class="icon">
                                <i class="bi bi-droplet-half"></i>
                            </div>
                            <h5 class="card-title">Soil Moisture</h5>
                            <p class="card-text">Current moisture level: 55%</p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
          
                <div class="col-md-4">
                    <div class="card sensor-card">
                        <div class="card-body">
                            <div class="icon">
                                <i class="bi bi-sun"></i>
                            </div>
                            <h5 class="card-title">Temperature</h5>
                            <p class="card-text">Current temperature: 24°C</p>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="col-md-4">
                    <div class="card sensor-card">
                        <div class="card-body">
                            <div class="icon">
                                <i class="bi bi-cloud-drizzle"></i>
                            </div>
                            <h5 class="card-title">Humidity</h5>
                            <p class="card-text">Current humidity: 80%</p>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>

   
   <section id="motor-controls" class="content-section">
        <div class="container">
            <h2 class="text-center">Motor Control</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card sensor-card">
                        <div class="card-body">
                            <h5 class="card-title">Irrigation Motor</h5>
                            <div class="form-check form-switch">
                                <input class="form-check-input motor-control-btn irrigation-motor" type="checkbox" id="irrigationMotorSwitch">
                                <label class="form-check-label" for="irrigationMotorSwitch">Irrigation Motor</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card sensor-card">
                        <div class="card-body">
                            <h5 class="card-title">Water Pump</h5>
                            <div class="form-check form-switch">
                                <input class="form-check-input motor-control-btn water-pump" type="checkbox" id="waterPumpSwitch">
                                <label class="form-check-label" for="waterPumpSwitch">Water Pump</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





<section>

        <div class="col-md-12 text-center">
        <button id="requestSensorInfoBtn">Request Sensor Information</button>
                </div>
            </div>
        </div>
    </section>
    <script>
document.getElementById('requestSensorInfoBtn').addEventListener('click', function() {
    // Redirect to the fetchsensor.php page
    window.location.href = 'fetchsensor.php';
});
</script>



    <section id="how-it-works" class="content-section">
    <script src="custom-scripts.js"></script>
        <div class="container">
            <h2 class="text-center">How It Works</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <img src="p3.jpg" width="500" height="400" class="card-img-top" alt="Understanding the System">
                        <div class="card-body">
                            <h5 class="card-title">Understanding the System</h5>
                            <p class="card-text">Our smart irrigation system uses a combination of soil moisture sensors, weather data, and advanced algorithms to ensure your plants receive the perfect amount of water. The system continuously monitors soil conditions and adjusts watering schedules accordingly to maintain optimal soil moisture levels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <img src="p8.jpg" class="card-img-top" alt="Setting Up Your System">
                        <div class="card-body">
                            <h5 class="card-title">Setting Up Your System</h5>
                            <p class="card-text">Setting up your smart irrigation system is simple and straightforward. Follow our step-by-step guide to install the sensors, connect them to the central hub, and configure the system settings. You'll be up and running in no time, with your irrigation system working seamlessly to keep your garden lush and healthy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </div>

    </section>


    





    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Smart Irrigation System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>