@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholar Hub - One Stop Shop for School Supplies</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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
            background-color: #ffffff;
            overflow-x: hidden;
        }
        
        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
            transition: all 0.3s ease;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        
        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-brand i {
            font-size: 30px;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-dark);
            margin: 0 15px;
            transition: color 0.3s ease;
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .btn-nav {
            padding: 8px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-login {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-login:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-signup {
            background: var(--gradient-bg);
            border: none;
            color: white;
        }
        
        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(93, 95, 239, 0.3);
        }
        
        /* Hero Section */
        .hero-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-bg-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }
        
        .hero-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(93, 95, 239, 0.1);
            animation: float-hero 20s infinite ease-in-out;
        }
        
        .hero-shape:nth-child(1) {
            width: 400px;
            height: 400px;
            top: -200px;
            right: -100px;
            animation-delay: 0s;
        }
        
        .hero-shape:nth-child(2) {
            width: 300px;
            height: 300px;
            bottom: -150px;
            left: -100px;
            animation-delay: 5s;
            background: rgba(0, 217, 255, 0.1);
        }
        
        .hero-shape:nth-child(3) {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 50%;
            animation-delay: 10s;
            background: rgba(255, 107, 107, 0.1);
        }
        
        @keyframes float-hero {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -30px) scale(1.1);
            }
            66% {
                transform: translate(-30px, 30px) scale(0.9);
            }
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            animation: fadeInUp 1s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero-title {
            font-size: 56px;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .hero-title span {
            background: var(--gradient-bg);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-subtitle {
            font-size: 20px;
            color: var(--text-light);
            margin-bottom: 40px;
            line-height: 1.6;
        }
        
        .hero-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .btn-hero {
            padding: 16px 40px;
            font-size: 18px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-hero-primary {
            background: var(--gradient-bg);
            color: white;
            border: none;
        }
        
        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(93, 95, 239, 0.3);
        }
        
        .btn-hero-secondary {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }
        
        .btn-hero-secondary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        
        .hero-image {
            position: relative;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        .hero-image img {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.1));
        }
        
        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background: var(--light-bg);
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .stat-card {
            text-align: center;
            padding: 40px 30px;
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-bg);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }
        
        .stat-card:hover::before {
            transform: scaleX(1);
        }
        
        .stat-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, rgba(93, 95, 239, 0.1) 0%, rgba(0, 217, 255, 0.1) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: var(--primary-color);
        }
        
        .stat-number {
            font-size: 48px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 18px;
            color: var(--text-light);
        }
        
        /* Features Section */
        .features-section {
            padding: 100px 0;
            background: white;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title {
            font-size: 48px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 20px;
        }
        
        .section-subtitle {
            font-size: 18px;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }
        
        .feature-card {
            padding: 40px;
            background: var(--light-bg);
            border-radius: 20px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(93, 95, 239, 0.1) 0%, transparent 70%);
            transform: scale(0);
            transition: transform 0.5s ease;
        }
        
        .feature-card:hover::before {
            transform: scale(1);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--gradient-bg);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
            margin-bottom: 20px;
        }
        
        .feature-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        
        .feature-description {
            color: var(--text-light);
            line-height: 1.6;
        }
        
        /* Schools Section */
        .schools-section {
            padding: 100px 0;
            background: var(--light-bg);
        }
        
        .schools-slider {
            margin-top: 60px;
            position: relative;
        }
        
        .schools-container {
            display: flex;
            gap: 30px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 20px 0;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        .schools-container::-webkit-scrollbar {
            display: none;
        }
        
        .school-card {
            min-width: 300px;
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .school-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-bg);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }
        
        .school-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }
        
        .school-card:hover::before {
            opacity: 0.05;
        }
        
        .school-logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            position: relative;
            z-index: 1;
        }
        
        .school-name {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }
        
        .school-info {
            color: var(--text-light);
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .school-products {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
            position: relative;
            z-index: 1;
        }
        
        .btn-view-store {
            background: var(--gradient-bg);
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }
        
        .btn-view-store:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(93, 95, 239, 0.3);
        }
        
        .slider-controls {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .slider-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            border: none;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .slider-btn:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }
        
        /* How It Works Section */
        .how-it-works {
            padding: 100px 0;
            background: white;
        }
        
        .steps-container {
            margin-top: 60px;
            position: relative;
        }
        
        .steps-line {
            position: absolute;
            top: 60px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            z-index: 0;
        }
        
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            position: relative;
            z-index: 1;
        }
        
        .step-card {
            text-align: center;
            padding: 30px;
            background: white;
            position: relative;
        }
        
        .step-number {
            width: 60px;
            height: 60px;
            background: var(--gradient-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 24px;
            font-weight: 700;
            color: white;
            position: relative;
            z-index: 2;
            box-shadow: 0 5px 20px rgba(93, 95, 239, 0.3);
        }
        
        .step-icon {
            font-size: 48px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .step-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        
        .step-description {
            color: var(--text-light);
            line-height: 1.6;
        }
        
        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .cta-bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .cta-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }
        
        .cta-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .cta-subtitle {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        
        .btn-cta {
            background: white;
            color: var(--primary-color);
            padding: 18px 50px;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        /* Footer */
        .footer {
            background: var(--dark-color);
            color: white;
            padding: 80px 0 30px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }
        
        .footer-section h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .footer-section p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
        }
        
        /* Animations on scroll */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }
            
            .hero-subtitle {
                font-size: 18px;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .section-title {
                font-size: 36px;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .steps-line {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-bg-shapes">
            <div class="hero-shape"></div>
            <div class="hero-shape"></div>
            <div class="hero-shape"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            One Stop Shop for All <span>School Supplies</span>
                        </h1>
                        <p class="hero-subtitle">
                            Buy uniforms, books, and stationery for multiple schools in one place. 
                            Save time, money, and effort with Scholar Hub's unified marketplace.
                        </p>
                        <div class="hero-buttons">
                            <a href="/signup" class="btn btn-hero btn-hero-primary">Get Started Free</a>
                            <a href="#how-it-works" class="btn btn-hero btn-hero-secondary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <svg viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                            <!-- School Building -->
                            <rect x="150" y="150" width="200" height="150" fill="#5D5FEF" rx="10"/>
                            <rect x="170" y="170" width="60" height="40" fill="#ffffff" opacity="0.9"/>
                            <rect x="250" y="170" width="60" height="40" fill="#ffffff" opacity="0.9"/>
                            <rect x="170" y="230" width="60" height="40" fill="#ffffff" opacity="0.9"/>
                            <rect x="250" y="230" width="60" height="40" fill="#ffffff" opacity="0.9"/>
                            <polygon points="150,150 250,100 350,150" fill="#4547d8"/>
                            
                            <!-- Shopping Cart -->
                            <g transform="translate(50, 250)">
                                <path d="M0 0 L10 0 L15 30 L45 30 L50 10 L15 10" stroke="#00D9FF" stroke-width="3" fill="none"/>
                                <circle cx="20" cy="40" r="5" fill="#00D9FF"/>
                                <circle cx="40" cy="40" r="5" fill="#00D9FF"/>
                            </g>
                            
                            <!-- Books -->
                            <g transform="translate(380, 200)">
                                <rect x="0" y="0" width="40" height="50" fill="#FF6B6B" rx="3"/>
                                <rect x="10" y="10" width="40" height="50" fill="#F59E0B" rx="3"/>
                                <rect x="20" y="20" width="40" height="50" fill="#10B981" rx="3"/>
                            </g>
                            
                            <!-- Uniform -->
                            <g transform="translate(80, 100)">
                                <path d="M0 0 L30 0 L30 40 L20 40 L20 30 L10 30 L10 40 L0 40 Z" fill="#5D5FEF"/>
                                <circle cx="15" cy="20" r="3" fill="#ffffff"/>
                            </g>
                            
                            <!-- Floating elements -->
                            <circle cx="100" cy="50" r="20" fill="#00D9FF" opacity="0.2"/>
                            <circle cx="400" cy="100" r="15" fill="#FF6B6B" opacity="0.2"/>
                            <circle cx="420" cy="300" r="25" fill="#10B981" opacity="0.2"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-container">
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-number" data-target="50">0</div>
                    <div class="stat-label">Partner Schools</div>
                </div>
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-number" data-target="5000">0</div>
                    <div class="stat-label">Happy Parents</div>
                </div>
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="stat-number" data-target="10000">0</div>
                    <div class="stat-label">Products Available</div>
                </div>
                <div class="stat-card animate-on-scroll">
                    <div class="stat-icon">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="stat-number" data-target="98">0</div>
                    <div class="stat-label">% Satisfaction Rate</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2 class="section-title">Why Choose Scholar Hub?</h2>
                <p class="section-subtitle">
                    Experience the convenience of centralized school shopping with these amazing features
                </p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <h3 class="feature-title">Unified Shopping Cart</h3>
                    <p class="feature-description">
                        Shop from multiple schools in one transaction. No more juggling between different websites or stores.
                    </p>
                </div>
                
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3 class="feature-title">Verified Suppliers</h3>
                    <p class="feature-description">
                        All products are from school-approved suppliers, ensuring quality and compliance with uniform standards.
                    </p>
                </div>
                
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <h3 class="feature-title">Best Prices</h3>
                    <p class="feature-description">
                        Enjoy competitive pricing and bulk discounts. Save more when you buy complete sets or multiple items.
                    </p>
                </div>
                
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h3 class="feature-title">Fast Delivery</h3>
                    <p class="feature-description">
                        Get your orders delivered right to your doorstep. Track your shipments in real-time.
                    </p>
                </div>
                
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h3 class="feature-title">24/7 Support</h3>
                    <p class="feature-description">
                        Our dedicated support team is always ready to help you with any queries or concerns.
                    </p>
                </div>
                
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <h3 class="feature-title">Easy Returns</h3>
                    <p class="feature-description">
                        Hassle-free return policy for wrong sizes or defective items. Your satisfaction is our priority.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Schools Section -->
    <section class="schools-section" id="schools">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2 class="section-title">Featured Schools</h2>
                <p class="section-subtitle">
                    Shop from Sri Lanka's top schools all in one place
                </p>
            </div>
            
            <div class="schools-slider">
                <div class="schools-container" id="schoolsContainer">
                    <div class="school-card animate-on-scroll">
                        <div class="school-logo">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3 class="school-name">Colombo International</h3>
                        <p class="school-info">Colombo 03</p>
                        <div class="school-products">150+</div>
                        <p class="school-info">Products Available</p>
                        <button class="btn btn-view-store">View Store</button>
                    </div>
                    
                    <div class="school-card animate-on-scroll">
                        <div class="school-logo">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h3 class="school-name">Royal College</h3>
                        <p class="school-info">Colombo 07</p>
                        <div class="school-products">200+</div>
                        <p class="school-info">Products Available</p>
                        <button class="btn btn-view-store">View Store</button>
                    </div>
                    
                    <div class="school-card animate-on-scroll">
                        <div class="school-logo">
                            <i class="bi bi-book"></i>
                        </div>
                        <h3 class="school-name">Ladies' College</h3>
                        <p class="school-info">Colombo 07</p>
                        <div class="school-products">180+</div>
                        <p class="school-info">Products Available</p>
                        <button class="btn btn-view-store">View Store</button>
                    </div>
                    
                    <div class="school-card animate-on-scroll">
                        <div class="school-logo">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3 class="school-name">Trinity College</h3>
                        <p class="school-info">Kandy</p>
                        <div class="school-products">175+</div>
                        <p class="school-info">Products Available</p>
                        <button class="btn btn-view-store">View Store</button>
                    </div>
                    
                    <div class="school-card animate-on-scroll">
                        <div class="school-logo">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <h3 class="school-name">St. Thomas' College</h3>
                        <p class="school-info">Mount Lavinia</p>
                        <div class="school-products">160+</div>
                        <p class="school-info">Products Available</p>
                        <button class="btn btn-view-store">View Store</button>
                    </div>
                </div>
                
                <div class="slider-controls">
                    <button class="slider-btn" id="prevBtn">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="slider-btn" id="nextBtn">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2 class="section-title">How It Works</h2>
                <p class="section-subtitle">
                    Getting started with Scholar Hub is easy. Follow these simple steps.
                </p>
            </div>
            
            <div class="steps-container">
                <div class="steps-line"></div>
                <div class="steps-grid">
                    <div class="step-card animate-on-scroll">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="bi bi-person-plus-fill"></i>
                        </div>
                        <h3 class="step-title">Create Account</h3>
                        <p class="step-description">
                            Sign up as a parent and add your children's school information
                        </p>
                    </div>
                    
                    <div class="step-card animate-on-scroll">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="bi bi-search"></i>
                        </div>
                        <h3 class="step-title">Browse Schools</h3>
                        <p class="step-description">
                            Find your children's schools and explore their product catalogs
                        </p>
                    </div>
                    
                    <div class="step-card animate-on-scroll">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="bi bi-cart-plus-fill"></i>
                        </div>
                        <h3 class="step-title">Add to Cart</h3>
                        <p class="step-description">
                            Select items from multiple schools and add them to your unified cart
                        </p>
                    </div>
                    
                    <div class="step-card animate-on-scroll">
                        <div class="step-number">4</div>
                        <div class="step-icon">
                            <i class="bi bi-credit-card-fill"></i>
                        </div>
                        <h3 class="step-title">Checkout & Relax</h3>
                        <p class="step-description">
                            Complete your purchase and get everything delivered to your door
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-bg-pattern"></div>
        <div class="container">
            <div class="cta-content animate-on-scroll">
                <h2 class="cta-title">Ready to Simplify School Shopping?</h2>
                <p class="cta-subtitle">
                    Join thousands of parents who are saving time and money with Scholar Hub
                </p>
                <a href="/signup" class="btn btn-cta">Start Shopping Now</a>
            </div>
        </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Number counter animation
        function animateNumbers() {
            const numbers = document.querySelectorAll('.stat-number');
            
            numbers.forEach(number => {
                const target = parseInt(number.getAttribute('data-target'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;
                
                const updateNumber = () => {
                    current += increment;
                    if (current < target) {
                        number.textContent = Math.floor(current);
                        requestAnimationFrame(updateNumber);
                    } else {
                        number.textContent = target + (number.parentElement.querySelector('.stat-label').textContent.includes('%') ? '%' : '+');
                    }
                };
                
                updateNumber();
            });
        }

        // School slider functionality
        const schoolsContainer = document.getElementById('schoolsContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let scrollAmount = 0;

        nextBtn.addEventListener('click', () => {
            schoolsContainer.scrollBy({
                left: 330,
                behavior: 'smooth'
            });
        });

        prevBtn.addEventListener('click', () => {
            schoolsContainer.scrollBy({
                left: -330,
                behavior: 'smooth'
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    
                    // Trigger number animation for stats
                    if (entry.target.classList.contains('stat-card')) {
                        const statCards = document.querySelectorAll('.stat-card');
                        const allVisible = Array.from(statCards).every(card => 
                            card.classList.contains('animated')
                        );
                        if (allVisible && !window.numbersAnimated) {
                            animateNumbers();
                            window.numbersAnimated = true;
                        }
                    }
                }
            });
        }, observerOptions);

        // Observe all animatable elements
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Hero shapes parallax effect
        document.addEventListener('mousemove', (e) => {
            const shapes = document.querySelectorAll('.hero-shape');
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            
            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 20;
                const xPos = (x - 0.5) * speed;
                const yPos = (y - 0.5) * speed;
                
                shape.style.transform = `translate(${xPos}px, ${yPos}px)`;
            });
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255, 255, 255, 0.5)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s ease-out';
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
@endsection
