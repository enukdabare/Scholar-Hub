@extends('layouts.app')

@section('title', 'Signup')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Hub - Sign Up</title>
    
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
            --success-color: #10B981;
            --warning-color: #F59E0B;
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
            padding: 40px 0;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Animated Background with particles */
        .bg-animation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            background: linear-gradient(125deg, #0f0f23 0%, #1a1a3e 50%, #0f0f23 100%);
        }
        
        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            pointer-events: none;
            animation: float-particle linear infinite;
        }
        
        @keyframes float-particle {
            0% {
                transform: translateY(100vh) scale(0);
            }
            10% {
                transform: translateY(90vh) scale(1);
            }
            100% {
                transform: translateY(-10vh) scale(0);
            }
        }
        
        /* Generate random particles */
        .particle:nth-child(1) { left: 10%; width: 2px; height: 2px; animation-duration: 15s; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; width: 3px; height: 3px; animation-duration: 20s; animation-delay: 2s; }
        .particle:nth-child(3) { left: 30%; width: 2px; height: 2px; animation-duration: 18s; animation-delay: 4s; }
        .particle:nth-child(4) { left: 40%; width: 4px; height: 4px; animation-duration: 22s; animation-delay: 1s; }
        .particle:nth-child(5) { left: 50%; width: 2px; height: 2px; animation-duration: 16s; animation-delay: 3s; }
        .particle:nth-child(6) { left: 60%; width: 3px; height: 3px; animation-duration: 25s; animation-delay: 5s; }
        .particle:nth-child(7) { left: 70%; width: 2px; height: 2px; animation-duration: 19s; animation-delay: 2s; }
        .particle:nth-child(8) { left: 80%; width: 3px; height: 3px; animation-duration: 21s; animation-delay: 0s; }
        .particle:nth-child(9) { left: 90%; width: 2px; height: 2px; animation-duration: 17s; animation-delay: 4s; }
        .particle:nth-child(10) { left: 95%; width: 4px; height: 4px; animation-duration: 23s; animation-delay: 6s; }
        
        .signup-container {
            max-width: 650px;
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
        
        .signup-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 48px;
            position: relative;
            overflow: hidden;
        }
        
        .signup-card::before {
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
        
        /* Role Selection Cards */
        .role-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease-out 0.3s both;
        }
        
        .role-card {
            padding: 24px;
            border: 3px solid #e1e8ed;
            border-radius: 16px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background: white;
        }
        
        .role-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-bg);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .role-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .role-card.active {
            border-color: transparent;
            color: white;
            transform: scale(1.05);
            box-shadow: 0 10px 40px rgba(93, 95, 239, 0.3);
        }
        
        .role-card.active::before {
            opacity: 1;
        }
        
        .role-card i {
            font-size: 40px;
            margin-bottom: 12px;
            transition: transform 0.3s ease;
        }
        
        .role-card:hover i {
            transform: scale(1.2);
        }
        
        .role-card.active i {
            color: white;
            animation: bounce 0.6s ease;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .role-card h5 {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }
        
        /* Form Styles */
        .form-floating {
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease-out both;
        }
        
        .form-floating:nth-child(1) { animation-delay: 0.4s; }
        .form-floating:nth-child(2) { animation-delay: 0.5s; }
        .form-floating:nth-child(3) { animation-delay: 0.6s; }
        .form-floating:nth-child(4) { animation-delay: 0.7s; }
        
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
        
        /* Password Strength Indicator */
        .password-strength-container {
            margin-top: 8px;
            animation: fadeIn 0.3s ease;
        }
        
        .password-strength-bar {
            height: 6px;
            background: #e1e8ed;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 8px;
        }
        
        .password-strength-fill {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 3px;
        }
        
        .password-strength-text {
            font-size: 12px;
            font-weight: 500;
            text-align: right;
            margin-bottom: 8px;
        }
        
        .password-requirements {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            font-size: 12px;
            color: var(--text-light);
        }
        
        .requirement {
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.3s ease;
        }
        
        .requirement i {
            font-size: 14px;
            transition: transform 0.3s ease;
        }
        
        .requirement.valid {
            color: var(--success-color);
        }
        
        .requirement.valid i {
            transform: scale(1.2);
        }
        
        /* School Fields Section */
        .school-fields {
            background: linear-gradient(135deg, #f7f8fc 0%, #e7f3ff 100%);
            padding: 24px;
            border-radius: 16px;
            margin-bottom: 20px;
            border: 1px solid rgba(93, 95, 239, 0.2);
            position: relative;
            overflow: hidden;
            display: none;
        }
        
        .school-fields.show {
            display: block;
            animation: expandIn 0.4s ease-out;
        }
        
        @keyframes expandIn {
            from {
                opacity: 0;
                transform: scaleY(0.8);
                transform-origin: top;
            }
            to {
                opacity: 1;
                transform: scaleY(1);
            }
        }
        
        .school-fields h5 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .school-fields h5 i {
            font-size: 24px;
        }
        
        /* Terms Checkbox */
        .form-check {
            margin-bottom: 24px;
            animation: fadeInUp 0.8s ease-out 0.8s both;
        }
        
        .form-check-input {
            width: 22px;
            height: 22px;
            border: 2px solid #e1e8ed;
            cursor: pointer;
            margin-top: 0;
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .form-check-label {
            margin-left: 8px;
            color: var(--text-dark);
        }
        
        .form-check-label a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .form-check-label a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Submit Button */
        .signup-btn {
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
            animation: fadeInUp 0.8s ease-out 0.9s both;
        }
        
        .signup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(93, 95, 239, 0.3);
        }
        
        .signup-btn:active {
            transform: translateY(0);
        }
        
        .signup-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        .signup-btn .ripple {
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
        
        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 24px;
            color: var(--text-light);
            animation: fadeInUp 0.8s ease-out 1s both;
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .login-link a:hover {
            color: var(--primary-dark);
        }
        
        /* Alert Styles */
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
            background: rgba(16, 185, 129, 0.1);
            color: #065f46;
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
            animation: fadeIn 1s ease-out 1.2s both;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .signup-card {
                padding: 32px 24px;
            }
            
            .role-selector {
                grid-template-columns: 1fr;
            }
            
            .password-requirements {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
    </div>
    
    <div class="signup-container">
        <div class="signup-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h2>Create Account</h2>
                <p>Join Scholar Hub today</p>
            </div>
            
            <!-- Alert Messages -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert" style="display: none;">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                <span id="errorMessage">Please fix the errors below.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" style="display: none;">
                <i class="bi bi-check-circle-fill me-2"></i>
                <span id="successMessage">Account created successfully!</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            
            <!-- Signup Form -->
            <form id="signupForm" action="/register" method="POST">
                <!-- Role Selection -->
                <div class="role-selector">
                    <div class="role-card active" data-role="parent">
                        <i class="bi bi-people-fill"></i>
                        <h5>Parent/Guardian</h5>
                    </div>
                    <div class="role-card" data-role="school">
                        <i class="bi bi-building"></i>
                        <h5>School Admin</h5>
                    </div>
                </div>
                <input type="hidden" id="userRole" name="role" value="parent">
                
                <!-- Name Fields -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" required>
                            <label for="firstName"><i class="bi bi-person me-2"></i>First Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" required>
                            <label for="lastName"><i class="bi bi-person me-2"></i>Last Name</label>
                        </div>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email"><i class="bi bi-envelope me-2"></i>Email address</label>
                </div>
                
                <!-- Phone -->
                <div class="form-floating">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+94 77 123 4567" required>
                    <label for="phone"><i class="bi bi-telephone me-2"></i>Phone Number</label>
                </div>
                
                <!-- School Fields -->
                <div class="school-fields" id="schoolFields">
                    <h5><i class="bi bi-building"></i>School Information</h5>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="schoolName" name="school_name" placeholder="School Name">
                        <label for="schoolName">School Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="schoolAddress" name="school_address" placeholder="School Address" style="height: 80px"></textarea>
                        <label for="schoolAddress">School Address</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="schoolRegNumber" name="school_reg_number" placeholder="Registration Number">
                        <label for="schoolRegNumber">Registration Number</label>
                    </div>
                </div>
                
                <!-- Password -->
                <div class="form-floating password-field">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="bi bi-lock me-2"></i>Password</label>
                    <span class="password-toggle" onclick="togglePassword('password', 'toggleIcon1')">
                        <i class="bi bi-eye" id="toggleIcon1"></i>
                    </span>
                </div>
                <div class="password-strength-container" id="passwordStrengthContainer" style="display: none;">
                    <div class="password-strength-bar">
                        <div class="password-strength-fill" id="passwordStrengthFill"></div>
                    </div>
                    <div class="password-strength-text" id="passwordStrengthText">Weak</div>
                    <div class="password-requirements">
                        <div class="requirement" id="reqLength">
                            <i class="bi bi-circle-fill"></i>
                            <span>8+ characters</span>
                        </div>
                        <div class="requirement" id="reqUpper">
                            <i class="bi bi-circle-fill"></i>
                            <span>Uppercase letter</span>
                        </div>
                        <div class="requirement" id="reqLower">
                            <i class="bi bi-circle-fill"></i>
                            <span>Lowercase letter</span>
                        </div>
                        <div class="requirement" id="reqNumber">
                            <i class="bi bi-circle-fill"></i>
                            <span>Number</span>
                        </div>
                    </div>
                </div>
                
                <!-- Confirm Password -->
                <div class="form-floating password-field">
                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
                    <label for="confirmPassword"><i class="bi bi-lock-fill me-2"></i>Confirm Password</label>
                    <span class="password-toggle" onclick="togglePassword('confirmPassword', 'toggleIcon2')">
                        <i class="bi bi-eye" id="toggleIcon2"></i>
                    </span>
                </div>
                
                <!-- Terms -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="/terms" target="_blank">Terms and Conditions</a> and 
                        <a href="/privacy" target="_blank">Privacy Policy</a>
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="signup-btn" id="signupBtn">
                    <span>Create Account</span>
                </button>
                
                <!-- Login Link -->
                <div class="login-link">
                    Already have an account? 
                    <a href="/login">Login</a>
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
        // Role Selection with Animation
        document.querySelectorAll('.role-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove active from all cards
                document.querySelectorAll('.role-card').forEach(c => {
                    c.classList.remove('active');
                });
                
                // Add active to clicked card
                this.classList.add('active');
                
                // Update hidden input
                const role = this.getAttribute('data-role');
                document.getElementById('userRole').value = role;
                
                // Show/hide school fields with animation
                const schoolFields = document.getElementById('schoolFields');
                if (role === 'school') {
                    schoolFields.classList.add('show');
                    schoolFields.querySelectorAll('input, textarea').forEach(field => {
                        field.setAttribute('required', 'required');
                    });
                } else {
                    schoolFields.classList.remove('show');
                    setTimeout(() => {
                        schoolFields.querySelectorAll('input, textarea').forEach(field => {
                            field.removeAttribute('required');
                        });
                    }, 400);
                }
            });
        });
        
        // Toggle Password Visibility
        function togglePassword(fieldId, iconId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = document.getElementById(iconId);
            
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
        
        // Password Strength Checker with Animation
        const passwordInput = document.getElementById('password');
        const strengthContainer = document.getElementById('passwordStrengthContainer');
        const strengthFill = document.getElementById('passwordStrengthFill');
        const strengthText = document.getElementById('passwordStrengthText');
        
        const requirements = {
            length: { element: document.getElementById('reqLength'), regex: /.{8,}/ },
            upper: { element: document.getElementById('reqUpper'), regex: /[A-Z]/ },
            lower: { element: document.getElementById('reqLower'), regex: /[a-z]/ },
            number: { element: document.getElementById('reqNumber'), regex: /[0-9]/ }
        };
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            
            if (password.length > 0) {
                strengthContainer.style.display = 'block';
            } else {
                strengthContainer.style.display = 'none';
                return;
            }
            
            let strength = 0;
            
            // Check requirements
            Object.values(requirements).forEach(req => {
                if (req.regex.test(password)) {
                    req.element.classList.add('valid');
                    req.element.querySelector('i').classList.remove('bi-circle-fill');
                    req.element.querySelector('i').classList.add('bi-check-circle-fill');
                    strength++;
                } else {
                    req.element.classList.remove('valid');
                    req.element.querySelector('i').classList.remove('bi-check-circle-fill');
                    req.element.querySelector('i').classList.add('bi-circle-fill');
                }
            });
            
            // Update strength bar
            const percentage = (strength / 4) * 100;
            strengthFill.style.width = percentage + '%';
            
            if (strength <= 1) {
                strengthFill.style.backgroundColor = '#dc3545';
                strengthText.textContent = 'Weak';
                strengthText.style.color = '#dc3545';
            } else if (strength <= 2) {
                strengthFill.style.backgroundColor = '#ffc107';
                strengthText.textContent = 'Fair';
                strengthText.style.color = '#ffc107';
            } else if (strength <= 3) {
                strengthFill.style.backgroundColor = '#17a2b8';
                strengthText.textContent = 'Good';
                strengthText.style.color = '#17a2b8';
            } else {
                strengthFill.style.backgroundColor = '#10B981';
                strengthText.textContent = 'Strong';
                strengthText.style.color = '#10B981';
            }
        });
        
        // Confirm Password Validation
        const confirmPasswordInput = document.getElementById('confirmPassword');
        confirmPasswordInput.addEventListener('input', function() {
            if (this.value && this.value !== passwordInput.value) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else if (this.value && this.value === passwordInput.value) {
                this.classList.add('is-valid');
                this.classList.remove('is-invalid');
            }
        });
        
        // Ripple effect for signup button
        document.getElementById('signupBtn').addEventListener('click', function(e) {
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
        
        // Form validation with animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
        
        // Form submission
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset alerts
            document.getElementById('errorAlert').style.display = 'none';
            document.getElementById('successAlert').style.display = 'none';
            
            // Validate passwords match
            if (passwordInput.value !== confirmPasswordInput.value) {
                document.getElementById('errorAlert').style.display = 'block';
                document.getElementById('errorMessage').textContent = 'Passwords do not match!';
                confirmPasswordInput.classList.add('is-invalid');
                this.style.animation = 'shake 0.5s';
                setTimeout(() => this.style.animation = '', 500);
                return;
            }
            
            // Check password strength
            const validReqs = Object.values(requirements).filter(req => 
                req.element.classList.contains('valid')
            ).length;
            
            if (validReqs < 4) {
                document.getElementById('errorAlert').style.display = 'block';
                document.getElementById('errorMessage').textContent = 'Password does not meet all requirements!';
                passwordInput.classList.add('is-invalid');
                return;
            }
            
            // Check form validity
            if (!this.checkValidity()) {
                e.stopPropagation();
                this.classList.add('was-validated');
                return;
            }
            
            // Show loading state
            const submitButton = document.getElementById('signupBtn');
            const originalText = submitButton.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Creating account...';
            
            // Simulate API call
            setTimeout(() => {
                document.getElementById('successAlert').style.display = 'block';
                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
                
                // Redirect after success (uncomment in production)
                // setTimeout(() => {
                //     window.location.href = '/login';
                // }, 1500);
            }, 2000);
        });
        
        // Shake animation
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-10px); }
                75% { transform: translateX(10px); }
            }
        `;
        document.head.appendChild(style);
        
        // Logo hover animation
        document.querySelector('.logo').addEventListener('mouseenter', function() {
            this.style.animation = 'pulse 1s ease-in-out infinite';
        });
        
        document.querySelector('.logo').addEventListener('mouseleave', function() {
            this.style.animation = '';
        });
        
        // Add pulse animation
        const pulseStyle = document.createElement('style');
        pulseStyle.innerHTML = `
            @keyframes pulse {
                0% { transform: rotate(45deg) scale(1); box-shadow: 0 10px 30px rgba(93, 95, 239, 0.3); }
                50% { transform: rotate(45deg) scale(1.1); box-shadow: 0 15px 40px rgba(93, 95, 239, 0.4); }
                100% { transform: rotate(45deg) scale(1); box-shadow: 0 10px 30px rgba(93, 95, 239, 0.3); }
            }
        `;
        document.head.appendChild(pulseStyle);
    </script>
</body>
</html>
@endsection
