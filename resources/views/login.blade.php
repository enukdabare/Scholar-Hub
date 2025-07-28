@extends('layouts.app')

@section('title', 'Login')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Hub - Login</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary-color: #5D5FEF;
            --primary-dark: #4547d8;
            --secondary-color: #00D9FF;
            --accent-color: #FF6B6B;
            --dark-color: #1a1d29;
            --light-bg: #f7f8fc;
            --white: #ffffff;
            --text-dark: #2d3436;
            --text-light: #636e72;
            --shadow-sm: 0 2px 20px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.1);
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-bg: linear-gradient(135deg, #5D5FEF 0%, #00D9FF 100%);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #0f0f23;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Animated Background */
        .bg-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background: linear-gradient(125deg, #0f0f23 0%, #1a1a3e 50%, #0f0f23 100%);
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .shape {
            position: absolute;
            background: linear-gradient(135deg, rgba(93, 95, 239, 0.1) 0%, rgba(0, 217, 255, 0.1) 100%);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }
        
        .shape:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -150px;
            right: -150px;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 200px;
            height: 200px;
            bottom: -100px;
            left: -100px;
            animation-delay: 5s;
            animation-duration: 25s;
        }
        
        .shape:nth-child(3) {
            width: 150px;
            height: 150px;
            top: 50%;
            left: -75px;
            animation-delay: 10s;
            animation-duration: 30s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(100px, -100px) rotate(120deg);
            }
            66% {
                transform: translate(-100px, 100px) rotate(240deg);
            }
        }
        
        .login-container {
            max-width: 480px;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            animation: slideIn 0.6s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 48px;
            position: relative;
            overflow: hidden;
        }
        
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-bg);
            border-radius: 24px 24px 0 0;
        }
        
        .logo-section {
            text-align: center;
            margin-bottom: 40px;
            animation: fadeInDown 0.8s ease-out 0.2s both;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .logo {
            width: 90px;
            height: 90px;
            background: var(--gradient-bg);
            border-radius: 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            position: relative;
            transform: rotate(45deg);
            box-shadow: 0 10px 30px rgba(93, 95, 239, 0.3);
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: rotate(45deg) scale(1.1);
        }
        
        .logo i {
            font-size: 45px;
            color: white;
            transform: rotate(-45deg);
        }
        
        .logo-section h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .logo-section p {
            color: var(--text-light);
            font-size: 16px;
        }
        
        .form-floating {
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease-out both;
        }
        
        .form-floating:nth-child(1) {
            animation-delay: 0.3s;
        }
        
        .form-floating:nth-child(2) {
            animation-delay: 0.4s;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-control {
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }
        
        .form-control:focus {
            background-color: white;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(93, 95, 239, 0.1);
        }
        
        .form-floating label {
            color: var(--text-light);
            padding: 12px 16px;
        }
        
        .password-field {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-light);
            z-index: 10;
            transition: color 0.3s ease;
            padding: 5px;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease-out 0.5s both;
        }
        
        .form-check-input {
            width: 20px;
            height: 20px;
            border: 2px solid #e1e8ed;
            cursor: pointer;
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .forgot-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .forgot-link:hover {
            color: var(--primary-dark);
            transform: translateX(2px);
        }
        
        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            background: var(--gradient-bg);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(93, 95, 239, 0.3);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .login-btn .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
        }
        
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
            animation: fadeInUp 0.8s ease-out 0.7s both;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: calc(50% - 30px);
            height: 1px;
            background: #e1e8ed;
        }
        
        .divider::before {
            left: 0;
        }
        
        .divider::after {
            right: 0;
        }
        
        .divider span {
            background: white;
            padding: 0 15px;
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
        }
        
        .social-btn {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            background: white;
            color: var(--text-dark);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            animation: fadeInUp 0.8s ease-out 0.8s both;
        }
        
        .social-btn:hover {
            border-color: var(--primary-color);
            background: var(--light-bg);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .social-btn i {
            font-size: 20px;
        }
        
        .social-btn.google i {
            color: #4285F4;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 30px;
            color: var(--text-light);
            animation: fadeInUp 0.8s ease-out 0.9s both;
        }
        
        .signup-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .signup-link a:hover {
            color: var(--primary-dark);
        }
        
        .alert {
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 20px;
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            color: #155724;
        }
        
        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #721c24;
        }
        
        /* Loading animation */
        .spinner-border-sm {
            width: 18px;
            height: 18px;
            border-width: 2px;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            animation: fadeIn 1s ease-out 1s both;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                padding: 32px 24px;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
            
            .logo i {
                font-size: 35px;
            }
            
            .logo-section h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>
    
    <div class="login-container">
        <div class="login-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h2>Welcome Back!</h2>
                <p>Login to access Scholar Hub</p>
            </div>
            
            <!-- Alert Messages -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert" style="display: none;">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                <span id="errorMessage">Invalid email or password!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" style="display: none;">
                <i class="bi bi-check-circle-fill me-2"></i>
                <span id="successMessage">Login successful!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            
            <!-- Login Form -->
            <form id="loginForm" action="/login" method="POST">
                <!-- Email Input -->
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email"><i class="bi bi-envelope me-2"></i>Email address</label>
                </div>
                
                <!-- Password Input -->
                <div class="form-floating password-field">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                    <span class="password-toggle" onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </span>
                </div>
                
                <!-- Remember Me & Forgot Password -->
                <div class="remember-forgot">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a href="/forgot-password" class="forgot-link">Forgot Password?</a>
                </div>
                
                <!-- Login Button -->
                <button type="submit" class="login-btn" id="loginBtn">
                    <span>Login to Account</span>
                </button>
                
                <!-- Divider -->
                <div class="divider">
                    <span>OR</span>
                </div>
                
                <!-- Social Login -->
                <button type="button" class="social-btn google">
                    <i class="bi bi-google"></i>
                    <span>Continue with Google</span>
                </button>
                
                <!-- Sign Up Link -->
                <div class="signup-link">
                    Don't have an account? 
                    <a href="/signup">Sign Up</a>
                </div>
            </form>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            &copy; 2025 Scholar Hub. All rights reserved.
        </div>
    </div>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Toggle Password Visibility with animation
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
                toggleIcon.style.transform = 'scale(0.8)';
                setTimeout(() => toggleIcon.style.transform = 'scale(1)', 100);
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
                toggleIcon.style.transform = 'scale(0.8)';
                setTimeout(() => toggleIcon.style.transform = 'scale(1)', 100);
            }
        }
        
        // Ripple effect for login button
        document.getElementById('loginBtn').addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
        
        // Enhanced form validation with animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
                
                if (this.checkValidity() && this.value) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                } else if (this.value) {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                }
            });
        });
        
        // Form submission with animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset validation states
            this.classList.remove('was-validated');
            document.getElementById('errorAlert').style.display = 'none';
            document.getElementById('successAlert').style.display = 'none';
            
            // Check form validity
            if (!this.checkValidity()) {
                e.stopPropagation();
                this.classList.add('was-validated');
                
                // Shake animation for invalid form
                this.style.animation = 'shake 0.5s';
                setTimeout(() => this.style.animation = '', 500);
                return;
            }
            
            // Get form data
            const formData = new FormData(this);
            const data = {
                email: formData.get('email'),
                password: formData.get('password'),
                remember: formData.get('remember') ? true : false
            };
            
            // Show loading state
            const submitButton = document.getElementById('loginBtn');
            const originalText = submitButton.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Logging in...';
            
            // Simulate API call
            setTimeout(() => {
                // Success scenario
                document.getElementById('successAlert').style.display = 'block';
                document.getElementById('successMessage').textContent = 'Login successful! Redirecting...';
                
                // Reset button
                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
                
                // Add success animation
                this.style.animation = 'pulse 0.5s';
                setTimeout(() => this.style.animation = '', 500);
                
                // Redirect after success (uncomment in production)
                // setTimeout(() => {
                //     window.location.href = '/dashboard';
                // }, 1500);
            }, 1500);
        });
        
        // Shake animation keyframes
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-10px); }
                75% { transform: translateX(10px); }
            }
            
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
        
        // Add floating animation to logo on hover
        document.querySelector('.logo').addEventListener('mouseenter', function() {
            this.style.animation = 'float 2s ease-in-out infinite';
        });
        
        document.querySelector('.logo').addEventListener('mouseleave', function() {
            this.style.animation = '';
        });
    </script>
</body>
</html>
@endsection
