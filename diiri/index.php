<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require 'phpmailer/PHPMailer.php';
  require 'phpmailer/SMTP.php';
  require 'phpmailer/Exception.php';

  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'diiriamunoni@gmail.com';
    $mail->Password = 'kafq lycp vxxv fwlr';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($email, $name);
    $mail->addAddress('diiriamunoni@gmail.com', 'Diiri Amunoni');

    $mail->isHTML(true);
    $mail->Subject = 'New Message from Portfolio Contact Form';
    $mail->Body    = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>" . nl2br($message);
    $mail->AltBody = "Name: $name\nEmail: $email\nMessage:\n$message";

    $mail->send();
    $feedback = "<div class='alert alert-success'>Message sent successfully!</div>";
  } catch (Exception $e) {
    $feedback = "<div class='alert alert-danger'>Error sending message. Mailer Error: {$mail->ErrorInfo}</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diiri James Amunoni | Tech Entrepreneur & Developer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #2a75ff; /* Tech blue */
      --secondary-color: #1a1a2e; /* Dark navy */
      --accent-color: #00d1b2; /* Tech teal */
      --text-color: #ffffff; /* White text */
      --dark-bg: #0f0f1a;
      --card-bg: #1a1a2e;
    }
    
    body {
      font-family: 'Fira Code', 'Consolas', monospace, sans-serif;
      scroll-behavior: smooth;
      color: var(--text-color);
      background-color: var(--dark-bg);
    }
    
    h1, h2, h3, h4, h5, h6,
    .card-title,
    .section-title,
    .navbar-brand {
      color: var(--text-color) !important;
    }
    
    .hero-section {
      background: linear-gradient(rgba(15, 15, 26, 0.85), rgba(15, 15, 26, 0.85)), url('diiri1.jpg') no-repeat center center;
      background-size: cover;
      position: relative;
      overflow: hidden;
    }
    
    .navbar {
      background-color: var(--secondary-color) !important;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .profile-img {
      width: 220px;
      height: 220px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid var(--primary-color);
      box-shadow: 0 0 20px rgba(42, 117, 255, 0.5);
    }
    
    .skill-badge {
      background-color: rgba(42, 117, 255, 0.2);
      color: var(--text-color);
      border: 1px solid var(--primary-color);
      margin: 5px;
    }
    
    .card {
      background-color: var(--card-bg);
      border: 1px solid rgba(255,255,255,0.1);
      transition: all 0.3s ease;
      color: var(--text-color);
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
      border-color: var(--primary-color);
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .btn-outline-primary {
      color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .btn-outline-primary:hover {
      background-color: var(--primary-color);
      color: white;
    }
    
    .section-title {
      color: var(--primary-color);
      position: relative;
      padding-bottom: 10px;
    }
    
    .section-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 3px;
      background: var(--accent-color);
    }
    
    .timeline {
      border-left: 3px solid var(--primary-color);
    }
    
    .timeline-item {
      position: relative;
      padding-left: 30px;
      margin-bottom: 30px;
      color: var(--text-color);
    }
    
    .timeline-item:before {
      content: '';
      position: absolute;
      left: -10px;
      top: 5px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: var(--accent-color);
      border: 3px solid var(--secondary-color);
    }
    
    .tech-icon {
      font-size: 2rem;
      margin: 0 10px;
      color: var(--primary-color);
      transition: all 0.3s;
    }
    
    .tech-icon:hover {
      color: var(--accent-color);
      transform: scale(1.2);
    }
    
    .code-block {
      background-color: rgba(0,0,0,0.3);
      border-left: 3px solid var(--accent-color);
      padding: 15px;
      font-family: 'Fira Code', monospace;
      border-radius: 0 5px 5px 0;
      color: var(--text-color);
    }
    
    .diiricoders-logo {
      font-weight: bold;
      color: var(--accent-color);
      text-shadow: 0 0 10px rgba(0,209,178,0.5);
    }
    
    /* Form styling */
    .form-control {
      background-color: rgba(0,0,0,0.3);
      border: 1px solid rgba(255,255,255,0.1);
      color: var(--text-color);
    }
    
    .form-control:focus {
      background-color: rgba(0,0,0,0.5);
      border-color: var(--primary-color);
      color: var(--text-color);
      box-shadow: 0 0 0 0.25rem rgba(42, 117, 255, 0.25);
    }
    
    /* Alert messages */
    .alert {
      color: white;
    }
    
    .alert-success {
      background-color: rgba(0,209,178,0.2);
      border-color: var(--accent-color);
    }
    
    .alert-danger {
      background-color: rgba(220,53,69,0.2);
      border-color: #dc3545;
    }
    
    /* Progress bars */
    .progress {
      background-color: rgba(255,255,255,0.1);
    }
    
    /* Text colors */
    .text-primary {
      color: var(--primary-color) !important;
    }
    
    .text-accent {
      color: var(--accent-color) !important;
    }
    
    .text-success {
      color: #00d1b2 !important;
    }
    
    .text-info {
      color: #17a2b8 !important;
    }
    
    .text-warning {
      color: #ffc107 !important;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#home">
        <span class="diiricoders-logo">DiiriCoders</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="hero-section text-white d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2 text-center">
          <img src="diiri.jpg" alt="Diiri James Amunoni" class="profile-img mb-4 animate__animated animate__fadeIn">
        </div>
        <div class="col-lg-6 order-lg-1 text-lg-start text-center">
          <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Diiri James Amunoni</h1>
          <p class="lead mb-4 animate__animated animate__fadeInDown animate__delay-1s">
            <span class="diiricoders-logo">Computer scientist </span> (tech and developer) <br>
            <span class="diiricoders-logo">DiiriCoders & Tech</span> Founder
          </p>
          <div class="code-block animate__animated animate__fadeIn animate__delay-2s">
            <span class="text-primary">// Problem solver & tech enthusiast</span><br>
            <span class="text-accent">while</span>(<span class="text-success">alive</span>) {<br>
            &nbsp;&nbsp;<span class="text-info">code</span>.<span class="text-warning">learn</span>();<br>
            &nbsp;&nbsp;<span class="text-info">tech</span>.<span class="text-warning">repair</span>();<br>
            }
          </div>
          <div class="mt-4 animate__animated animate__fadeInUp animate__delay-3s">
            <a href="#contact" class="btn btn-primary btn-lg me-3">Hire Me</a>
            <a href="#projects" class="btn btn-outline-primary btn-lg">View Projects</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container">
      <h2 class="section-title mb-5">About Me</h2>
      <div class="row">
        <div class="col-lg-6 mb-4">
          <h3 class="mb-4">Tech Entrepreneur</h3>
          <p class="mb-4">I'm the founder of <span class="diiricoders-logo">DiiriCoders & Tech</span>, a technology company specializing in system repairs, software development, and mobile applications. We provide innovative solutions to help businesses and individuals leverage technology effectively.</p>
          
          <h3 class="mb-4">Technical Skills</h3>
          <div class="mb-4">
            <span class="badge skill-badge">Computer Repairs</span>
            <span class="badge skill-badge">Web Development</span>
            <span class="badge skill-badge">Mobile App Development</span>
            <span class="badge skill-badge">System Administration</span>
            <span class="badge skill-badge">Graphics Design</span>
            <span class="badge skill-badge">Database Management</span>
            <span class="badge skill-badge">Network Solutions</span>
            <span class="badge skill-badge">IT Consulting</span>
          </div>
        </div>
        <div class="col-lg-6">
          <h3 class="mb-4">Technical Stack</h3>
          <div class="text-center mb-5">
            <i class="tech-icon fab fa-html5" title="HTML5"></i>
            <i class="tech-icon fab fa-css3-alt" title="CSS3"></i>
            <i class="tech-icon fab fa-js" title="JavaScript"></i>
            <i class="tech-icon fab fa-php" title="PHP"></i>
            <i class="tech-icon fab fa-java" title="Java"></i>
            <i class="tech-icon fab fa-python" title="Python"></i>
            <i class="tech-icon fab fa-android" title="Android"></i>
            <i class="tech-icon fas fa-database" title="Database"></i>
          </div>
          
          <h3 class="mb-4">Professional Approach</h3>
          <p>I believe in delivering high-quality, efficient solutions tailored to each client's specific needs. My approach combines technical expertise with clear communication to ensure projects are completed on time and to the highest standards.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-5 bg-dark">
    <div class="container">
      <h2 class="section-title mb-5">Our Services</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-laptop-code tech-icon mb-3"></i>
              <h4 class="card-title">System Development</h4>
              <p class="card-text">Custom software solutions tailored to your business requirements, from desktop applications to enterprise systems.</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt tech-icon mb-3"></i>
              <h4 class="card-title">Mobile Apps</h4>
              <p class="card-text">Cross-platform mobile application development for iOS and Android to expand your digital presence.</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <i class="fas fa-tools tech-icon mb-3"></i>
              <h4 class="card-title">Tech Repairs</h4>
              <p class="card-text">Comprehensive hardware and software repair services for computers, laptops, and mobile devices.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="py-5">
    <div class="container">
      <h2 class="section-title mb-5">Recent Projects</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title">Inventory Management System</h4>
              <p class="card-text">A comprehensive system for tracking stock levels, orders, and sales with real-time reporting.</p>
              <div class="mt-3">
                <span class="badge skill-badge">PHP</span>
                <span class="badge skill-badge">MySQL</span>
                <span class="badge skill-badge">Bootstrap</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title">Mobile E-Commerce App</h4>
              <p class="card-text">Android application for local retailers to manage and sell products online with payment integration.</p>
              <div class="mt-3">
                <span class="badge skill-badge">Java</span>
                <span class="badge skill-badge">Firebase</span>
                <span class="badge skill-badge">MPesa API</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title">Computer Diagnostic Tool</h4>
              <p class="card-text">Software utility for automated hardware diagnostics and troubleshooting recommendations.</p>
              <div class="mt-3">
                <span class="badge skill-badge">Python</span>
                <span class="badge skill-badge">PyQt</span>
                <span class="badge skill-badge">Windows API</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5 bg-dark">
    <div class="container">
      <h2 class="section-title mb-5">Get In Touch</h2>
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title mb-4">Contact Information</h4>
              
              <div class="d-flex align-items-center mb-4">
                <i class="fas fa-building tech-icon me-3"></i>
                <div>
                  <h5 class="mb-0">DiiriCoders & Tech</h5>
                  <p class="mb-0">Technology Solutions Provider</p>
                </div>
              </div>
              
              <div class="d-flex align-items-center mb-4">
                <i class="fas fa-phone tech-icon me-3"></i>
                <div>
                  <p class="mb-0">+256 708 757 822</p>
                  <p class="mb-0">+256 779 730 998</p>
                </div>
              </div>
              
              <div class="d-flex align-items-center mb-4">
                <i class="fas fa-envelope tech-icon me-3"></i>
                <div>
                  <p class="mb-0">diiriamunoni@gmail.com</p>
                </div>
              </div>
              
              <div class="d-flex align-items-center">
                <i class="fas fa-map-marker-alt tech-icon me-3"></i>
                <div>
                  <p class="mb-0">Kibuku District, Uganda</p>
                </div>
              </div>
              
              <div class="mt-4">
                <a href="#" class="tech-icon me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="tech-icon me-3"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="tech-icon me-3"><i class="fab fa-github"></i></a>
                <a href="#" class="tech-icon"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="card h-100">
            <div class="card-body">
              <h4 class="card-title mb-4">Send a Message</h4>
              <?php if (isset($feedback)) echo $feedback; ?>
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="name" class="form-label">Your Name</label>
                  <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">
                  <i class="fas fa-paper-plane me-2"></i> Send Message
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-4 bg-black">
    <div class="container text-center">
      <p class="mb-2">&copy; <?php echo date("Y"); ?> <span class="diiricoders-logo">DiiriCoders & Tech</span>. All rights reserved.</p>
      <p class="mb-0">Crafted with <i class="fas fa-heart text-danger"></i> by Diiri James Amunoni</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Smooth scrolling for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
    
    // Add animation class when elements are in view
    const animateOnScroll = () => {
      const elements = document.querySelectorAll('.card, .section-title, .profile-img');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        
        if (elementPosition < screenPosition) {
          element.classList.add('animate__animated', 'animate__fadeInUp');
        }
      });
    };
    
    window.addEventListener('scroll', animateOnScroll);
    window.addEventListener('load', animateOnScroll);
  </script>
</body>
</html>