@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Scholar Hub</title>
    
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
            --danger-color: #EF4444;
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
            background-color: var(--light-bg);
            min-height: 100vh;
        }
        
        /* Checkout Header */
        .checkout-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .checkout-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--primary-color);
            font-size: 24px;
            font-weight: 700;
        }
        
        .secure-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--success-color);
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Progress Steps */
        .checkout-progress {
            background: white;
            padding: 30px 0;
            margin-bottom: 30px;
        }
        
        .progress-steps {
            display: flex;
            justify-content: space-between;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        
        .progress-steps::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e0e0e0;
            z-index: -1;
        }
        
        .progress-line {
            position: absolute;
            top: 25px;
            left: 0;
            height: 2px;
            background: var(--gradient-bg);
            transition: width 0.5s ease;
            z-index: -1;
        }
        
        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e0e0e0;
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }
        
        .step.active .step-number {
            background: var(--gradient-bg);
            color: white;
            transform: scale(1.1);
        }
        
        .step.completed .step-number {
            background: var(--success-color);
            color: white;
        }
        
        .step.completed .step-number::after {
            content: '✓';
            position: absolute;
            font-size: 20px;
        }
        
        .step-title {
            font-size: 14px;
            color: var(--text-light);
            font-weight: 500;
        }
        
        .step.active .step-title {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .step.completed .step-title {
            color: var(--success-color);
        }
        
        /* Main Layout */
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 40px;
        }
        
        .checkout-content {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
            animation: fadeInUp 0.6s ease-out;
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
        
        /* Form Sections */
        .checkout-form-section {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .checkout-form-section:hover {
            box-shadow: var(--shadow-lg);
        }
        
        .section-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .section-number {
            width: 36px;
            height: 36px;
            background: var(--gradient-bg);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 16px;
        }
        
        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 14px;
        }
        
        .form-label .required {
            color: var(--danger-color);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(93, 95, 239, 0.1);
        }
        
        .form-control.is-invalid {
            border-color: var(--danger-color);
        }
        
        .invalid-feedback {
            color: var(--danger-color);
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }
        
        .form-control.is-invalid ~ .invalid-feedback {
            display: block;
        }
        
        /* Delivery Options */
        .delivery-options {
            display: grid;
            gap: 15px;
        }
        
        .delivery-option {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .delivery-option:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .delivery-option.selected {
            border-color: var(--primary-color);
            background: rgba(93, 95, 239, 0.05);
        }
        
        .delivery-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }
        
        .delivery-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .delivery-title {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .delivery-price {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .delivery-description {
            color: var(--text-light);
            font-size: 14px;
        }
        
        /* Payment Methods */
        .payment-methods {
            display: grid;
            gap: 15px;
        }
        
        .payment-method {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .payment-method:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .payment-method.selected {
            border-color: var(--primary-color);
            background: rgba(93, 95, 239, 0.05);
        }
        
        .payment-method input[type="radio"] {
            position: absolute;
            opacity: 0;
        }
        
        .payment-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .payment-icon {
            width: 40px;
            height: 40px;
            background: var(--light-bg);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .payment-details {
            flex: 1;
        }
        
        .payment-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .payment-cards {
            display: flex;
            gap: 8px;
        }
        
        .card-icon {
            width: 40px;
            height: 25px;
            background: var(--light-bg);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 600;
            color: var(--text-light);
        }
        
        .payment-form {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            display: none;
        }
        
        .payment-method.selected .payment-form {
            display: block;
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
        
        /* Order Summary */
        .order-summary {
            position: sticky;
            top: 100px;
        }
        
        .summary-card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        
        .summary-header {
            background: var(--gradient-bg);
            color: white;
            padding: 20px;
            font-size: 18px;
            font-weight: 600;
        }
        
        .summary-body {
            padding: 20px;
        }
        
        .order-items {
            margin-bottom: 20px;
        }
        
        .order-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .order-item:last-child {
            border-bottom: none;
        }
        
        .item-image {
            width: 60px;
            height: 60px;
            background: var(--light-bg);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--text-light);
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-name {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .item-meta {
            font-size: 13px;
            color: var(--text-light);
        }
        
        .item-price {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .summary-totals {
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            color: var(--text-dark);
        }
        
        .total-row.discount {
            color: var(--success-color);
        }
        
        .total-row.grand-total {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark-color);
            padding-top: 12px;
            border-top: 1px solid #e0e0e0;
        }
        
        .promo-code {
            margin: 20px 0;
        }
        
        .promo-input-group {
            display: flex;
            gap: 10px;
        }
        
        .promo-input {
            flex: 1;
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
        }
        
        .btn-apply {
            padding: 10px 20px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-apply:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        /* Action Buttons */
        .checkout-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e0e0e0;
        }
        
        .btn-back {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-back:hover {
            color: var(--primary-color);
            transform: translateX(-5px);
        }
        
        .btn-continue {
            padding: 14px 40px;
            background: var(--gradient-bg);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-continue:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(93, 95, 239, 0.3);
        }
        
        .btn-continue:active {
            transform: translateY(0);
        }
        
        .btn-continue:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        /* Security Icons */
        .security-badges {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e0e0e0;
        }
        
        .security-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            font-size: 14px;
        }
        
        .security-badge i {
            font-size: 20px;
            color: var(--success-color);
        }
        
        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        
        .loading-overlay.active {
            display: flex;
        }
        
        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .loading-text {
            margin-top: 20px;
            font-size: 16px;
            color: var(--text-dark);
        }
        
        /* Success Animation */
        .success-animation {
            display: none;
            text-align: center;
            padding: 60px;
        }
        
        .success-icon {
            width: 100px;
            height: 100px;
            background: var(--success-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: successPop 0.6s ease-out;
        }
        
        @keyframes successPop {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .success-icon i {
            font-size: 50px;
            color: white;
        }
        
        .success-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }
        
        .success-message {
            font-size: 16px;
            color: var(--text-light);
            margin-bottom: 30px;
        }
        
        .order-number {
            background: var(--light-bg);
            padding: 15px 30px;
            border-radius: 10px;
            display: inline-block;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 30px;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .checkout-content {
                grid-template-columns: 1fr;
            }
            
            .order-summary {
                position: static;
                order: -1;
            }
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-group {
                grid-column: 1;
            }
            
            .checkout-actions {
                flex-direction: column-reverse;
                gap: 15px;
            }
            
            .btn-continue {
                width: 100%;
            }
            
            .progress-steps {
                font-size: 12px;
            }
            
            .step-number {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Checkout Header -->
    <header class="checkout-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="checkout-logo">
                    <i class="bi bi-mortarboard-fill"></i>
                    Scholar Hub
                </a>
                <div class="secure-badge">
                    <i class="bi bi-shield-lock-fill"></i>
                    <span>Secure Checkout</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Progress Steps -->
    <div class="checkout-progress">
        <div class="container">
            <div class="progress-steps">
                <div class="progress-line" style="width: 33%;"></div>
                <div class="step completed">
                    <div class="step-number">1</div>
                    <div class="step-title">Cart</div>
                </div>
                <div class="step active">
                    <div class="step-number">2</div>
                    <div class="step-title">Information</div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-title">Payment</div>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-title">Confirmation</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="checkout-container">
        <div class="checkout-content">
            <!-- Left Column - Forms -->
            <div class="checkout-forms">
                <!-- Contact Information -->
                <div class="checkout-form-section">
                    <div class="section-header">
                        <div class="section-number">1</div>
                        <h2 class="section-title">Contact Information</h2>
                    </div>
                    
                    <form id="contactForm">
                        <div class="form-group full-width">
                            <label class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="your@email.com" required>
                            <div class="invalid-feedback">Please enter a valid email address</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" checked>
                                <span class="form-check-label">Email me with news and offers</span>
                            </label>
                        </div>
                    </form>
                </div>

                <!-- Delivery Information -->
                <div class="checkout-form-section">
                    <div class="section-header">
                        <div class="section-number">2</div>
                        <h2 class="section-title">Delivery Information</h2>
                    </div>
                    
                    <form id="deliveryForm">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">First Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enuk" required>
                                <div class="invalid-feedback">First name is required</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Last Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="lastName" placeholder="Dabare" required>
                                <div class="invalid-feedback">Last name is required</div>
                            </div>
                            
                            <div class="form-group full-width">
                                <label class="form-label">Phone Number <span class="required">*</span></label>
                                <input type="tel" class="form-control" id="phone" placeholder="+94 77 123 4567" required>
                                <div class="invalid-feedback">Phone number is required</div>
                            </div>
                            
                            <div class="form-group full-width">
                                <label class="form-label">Address <span class="required">*</span></label>
                                <input type="text" class="form-control" id="address1" placeholder="House number and street name" required>
                                <div class="invalid-feedback">Address is required</div>
                            </div>
                            
                            <div class="form-group full-width">
                                <label class="form-label">Apartment, suite, etc. (optional)</label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment, suite, unit, etc.">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">City <span class="required">*</span></label>
                                <input type="text" class="form-control" id="city" placeholder="Colombo" required>
                                <div class="invalid-feedback">City is required</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Province <span class="required">*</span></label>
                                <select class="form-control" id="province" required>
                                    <option value="">Select Province</option>
                                    <option value="western">Western</option>
                                    <option value="central">Central</option>
                                    <option value="southern">Southern</option>
                                    <option value="northern">Northern</option>
                                    <option value="eastern">Eastern</option>
                                    <option value="north-western">North Western</option>
                                    <option value="north-central">North Central</option>
                                    <option value="uva">Uva</option>
                                    <option value="sabaragamuwa">Sabaragamuwa</option>
                                </select>
                                <div class="invalid-feedback">Please select a province</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Postal Code <span class="required">*</span></label>
                                <input type="text" class="form-control" id="postalCode" placeholder="00100" required>
                                <div class="invalid-feedback">Postal code is required</div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Delivery Method -->
                <div class="checkout-form-section">
                    <div class="section-header">
                        <div class="section-number">3</div>
                        <h2 class="section-title">Delivery Method</h2>
                    </div>
                    
                    <div class="delivery-options">
                        <label class="delivery-option selected">
                            <input type="radio" name="delivery" value="standard" checked>
                            <div class="delivery-header">
                                <div>
                                    <div class="delivery-title">Standard Delivery</div>
                                    <div class="delivery-description">Delivered in 5-7 business days</div>
                                </div>
                                <div class="delivery-price">Rs. 300</div>
                            </div>
                        </label>
                        
                        <label class="delivery-option">
                            <input type="radio" name="delivery" value="express">
                            <div class="delivery-header">
                                <div>
                                    <div class="delivery-title">Express Delivery</div>
                                    <div class="delivery-description">Delivered in 2-3 business days</div>
                                </div>
                                <div class="delivery-price">Rs. 500</div>
                            </div>
                        </label>
                        
                        <label class="delivery-option">
                            <input type="radio" name="delivery" value="pickup">
                            <div class="delivery-header">
                                <div>
                                    <div class="delivery-title">Store Pickup</div>
                                    <div class="delivery-description">Pickup from school within 24 hours</div>
                                </div>
                                <div class="delivery-price">Free</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="checkout-form-section" id="paymentSection" style="display: none;">
                    <div class="section-header">
                        <div class="section-number">4</div>
                        <h2 class="section-title">Payment Method</h2>
                    </div>
                    
                    <div class="payment-methods">
                        <label class="payment-method selected">
                            <input type="radio" name="payment" value="card" checked>
                            <div class="payment-header">
                                <div class="payment-icon">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                                <div class="payment-details">
                                    <div class="payment-title">Credit/Debit Card</div>
                                    <div class="payment-cards">
                                        <div class="card-icon">VISA</div>
                                        <div class="card-icon">MC</div>
                                        <div class="card-icon">AMEX</div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-form">
                                <div class="form-group">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19">
                                </div>
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY" maxlength="5">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cardCVV" placeholder="123" maxlength="4">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name on Card</label>
                                    <input type="text" class="form-control" id="cardName" placeholder="ENUK DABARE">
                                </div>
                            </div>
                        </label>
                        
                        <label class="payment-method">
                            <input type="radio" name="payment" value="paypal">
                            <div class="payment-header">
                                <div class="payment-icon" style="background: #ffc107;">
                                    <i class="bi bi-paypal" style="color: #003087;"></i>
                                </div>
                                <div class="payment-details">
                                    <div class="payment-title">PayPal</div>
                                    <div class="text-muted small">Pay securely with your PayPal account</div>
                                </div>
                            </div>
                        </label>
                        
                        <label class="payment-method">
                            <input type="radio" name="payment" value="bank">
                            <div class="payment-header">
                                <div class="payment-icon">
                                    <i class="bi bi-bank"></i>
                                </div>
                                <div class="payment-details">
                                    <div class="payment-title">Bank Transfer</div>
                                    <div class="text-muted small">Direct bank transfer</div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="checkout-actions">
                    <a href="/cart" class="btn-back">
                        <i class="bi bi-arrow-left"></i>
                        <span>Return to Cart</span>
                    </a>
                    <button class="btn-continue" id="continueBtn">
                        Continue to Payment
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="order-summary">
                <div class="summary-card">
                    <div class="summary-header">
                        Order Summary (3 items)
                    </div>
                    <div class="summary-body">
                        <!-- Order Items -->
                        <div class="order-items">
                            <div class="order-item">
                                <div class="item-image">
                                    <i class="bi bi-image"></i>
                                </div>
                                <div class="item-details">
                                    <div class="item-name">White School Shirt</div>
                                    <div class="item-meta">Size: M | Qty: 2</div>
                                </div>
                                <div class="item-price">Rs. 3,000</div>
                            </div>
                            
                            <div class="order-item">
                                <div class="item-image">
                                    <i class="bi bi-image"></i>
                                </div>
                                <div class="item-details">
                                    <div class="item-name">School Trouser (Blue)</div>
                                    <div class="item-meta">Size: 32 | Qty: 2</div>
                                </div>
                                <div class="item-price">Rs. 4,000</div>
                            </div>
                            
                            <div class="order-item">
                                <div class="item-image">
                                    <i class="bi bi-image"></i>
                                </div>
                                <div class="item-details">
                                    <div class="item-name">Mathematics Textbook</div>
                                    <div class="item-meta">Grade 3 | Qty: 1</div>
                                </div>
                                <div class="item-price">Rs. 850</div>
                            </div>
                        </div>

                        <!-- Promo Code -->
                        <div class="promo-code">
                            <div class="promo-input-group">
                                <input type="text" class="promo-input" placeholder="Enter promo code">
                                <button class="btn-apply">Apply</button>
                            </div>
                        </div>

                        <!-- Totals -->
                        <div class="summary-totals">
                            <div class="total-row">
                                <span>Subtotal</span>
                                <span>Rs. 7,850</span>
                            </div>
                            <div class="total-row">
                                <span>Delivery</span>
                                <span id="deliveryFee">Rs. 300</span>
                            </div>
                            <div class="total-row discount" style="display: none;">
                                <span>Discount</span>
                                <span>-Rs. 500</span>
                            </div>
                            <div class="total-row">
                                <span>Tax (GST 15%)</span>
                                <span>Rs. 1,222</span>
                            </div>
                            <div class="total-row grand-total">
                                <span>Total</span>
                                <span id="grandTotal">Rs. 9,372</span>
                            </div>
                        </div>

                        <!-- Security Badges -->
                        <div class="security-badges">
                            <div class="security-badge">
                                <i class="bi bi-shield-check"></i>
                                <span>SSL Secure</span>
                            </div>
                            <div class="security-badge">
                                <i class="bi bi-lock"></i>
                                <span>Encrypted</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Animation (Initially Hidden) -->
        <div class="success-animation" id="successAnimation">
            <div class="success-icon">
                <i class="bi bi-check"></i>
            </div>
            <h2 class="success-title">Order Placed Successfully!</h2>
            <p class="success-message">Thank you for your order. We've sent a confirmation email to your inbox.</p>
            <div class="order-number">Order #ORD12347</div>
            <div>
                <a href="/dashboard" class="btn btn-primary me-3">Go to Dashboard</a>
                <a href="/schools" class="btn btn-outline-primary">Continue Shopping</a>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
        <div class="loading-text">Processing your order...</div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Initialize checkout
        document.addEventListener('DOMContentLoaded', function() {
            initializeDeliveryOptions();
            initializePaymentMethods();
            initializeFormValidation();
            initializeContinueButton();
            initializePromoCode();
            formatCardInputs();
        });

        // Current step tracking
        let currentStep = 2;

        // Delivery options
        function initializeDeliveryOptions() {
            const deliveryOptions = document.querySelectorAll('.delivery-option');
            
            deliveryOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove selected from all
                    deliveryOptions.forEach(opt => opt.classList.remove('selected'));
                    
                    // Add selected to clicked
                    this.classList.add('selected');
                    
                    // Update delivery fee
                    updateDeliveryFee();
                });
            });
        }

        // Payment methods
        function initializePaymentMethods() {
            const paymentMethods = document.querySelectorAll('.payment-method');
            
            paymentMethods.forEach(method => {
                method.addEventListener('click', function() {
                    // Remove selected from all
                    paymentMethods.forEach(m => m.classList.remove('selected'));
                    
                    // Add selected to clicked
                    this.classList.add('selected');
                });
            });
        }

        // Update delivery fee
        function updateDeliveryFee() {
            const selectedDelivery = document.querySelector('input[name="delivery"]:checked').value;
            const deliveryFeeElement = document.getElementById('deliveryFee');
            let deliveryFee = 0;
            
            switch(selectedDelivery) {
                case 'standard':
                    deliveryFee = 300;
                    break;
                case 'express':
                    deliveryFee = 500;
                    break;
                case 'pickup':
                    deliveryFee = 0;
                    break;
            }
            
            deliveryFeeElement.textContent = deliveryFee === 0 ? 'Free' : `Rs. ${deliveryFee}`;
            updateGrandTotal();
        }

        // Update grand total
        function updateGrandTotal() {
            const subtotal = 7850;
            const deliveryFee = document.getElementById('deliveryFee').textContent === 'Free' ? 0 : 
                parseInt(document.getElementById('deliveryFee').textContent.replace('Rs. ', ''));
            const tax = Math.round((subtotal + deliveryFee) * 0.15);
            const grandTotal = subtotal + deliveryFee + tax;
            
            document.getElementById('grandTotal').textContent = `Rs. ${grandTotal.toLocaleString()}`;
        }

        // Form validation
        function initializeFormValidation() {
            const forms = document.querySelectorAll('form');
            
            forms.forEach(form => {
                const inputs = form.querySelectorAll('.form-control');
                
                inputs.forEach(input => {
                    input.addEventListener('blur', function() {
                        validateInput(this);
                    });
                    
                    input.addEventListener('input', function() {
                        if (this.classList.contains('is-invalid')) {
                            validateInput(this);
                        }
                    });
                });
            });
        }

        // Validate individual input
        function validateInput(input) {
            if (input.hasAttribute('required') && !input.value.trim()) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                return false;
            } else if (input.type === 'email' && !isValidEmail(input.value)) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                return false;
            } else if (input.value.trim()) {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                return true;
            }
            
            return true;
        }

        // Email validation
        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        // Continue button functionality
        function initializeContinueButton() {
            const continueBtn = document.getElementById('continueBtn');
            
            continueBtn.addEventListener('click', function() {
                if (currentStep === 2) {
                    // Validate information forms
                    if (validateAllForms()) {
                        moveToPayment();
                    }
                } else if (currentStep === 3) {
                    // Process payment
                    processPayment();
                }
            });
        }

        // Validate all forms
        function validateAllForms() {
            const requiredInputs = document.querySelectorAll('.form-control[required]:not(#paymentSection .form-control)');
            let isValid = true;
            
            requiredInputs.forEach(input => {
                if (!validateInput(input)) {
                    isValid = false;
                }
            });
            
            if (!isValid) {
                // Scroll to first invalid input
                const firstInvalid = document.querySelector('.form-control.is-invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus();
                }
            }
            
            return isValid;
        }

        // Move to payment step
        function moveToPayment() {
            // Update progress
            currentStep = 3;
            updateProgress();
            
            // Show payment section
            document.getElementById('paymentSection').style.display = 'block';
            document.getElementById('paymentSection').scrollIntoView({ behavior: 'smooth', block: 'start' });
            
            // Update button text
            document.getElementById('continueBtn').innerHTML = 'Complete Order <i class="bi bi-check-circle ms-2"></i>';
        }

        // Update progress bar
        function updateProgress() {
            const steps = document.querySelectorAll('.step');
            const progressLine = document.querySelector('.progress-line');
            
            steps.forEach((step, index) => {
                if (index < currentStep - 1) {
                    step.classList.add('completed');
                    step.classList.remove('active');
                } else if (index === currentStep - 1) {
                    step.classList.add('active');
                    step.classList.remove('completed');
                } else {
                    step.classList.remove('active', 'completed');
                }
            });
            
            // Update progress line width
            const progressPercentage = ((currentStep - 1) / 3) * 100;
            progressLine.style.width = progressPercentage + '%';
        }

        // Process payment
        function processPayment() {
            // Show loading overlay
            document.getElementById('loadingOverlay').classList.add('active');
            
            // Simulate payment processing
            setTimeout(() => {
                // Hide loading
                document.getElementById('loadingOverlay').classList.remove('active');
                
                // Update progress to completed
                currentStep = 4;
                updateProgress();
                
                // Hide checkout forms
                document.querySelector('.checkout-content').style.display = 'none';
                
                // Show success animation
                document.getElementById('successAnimation').style.display = 'block';
                
                // Confetti animation (optional)
                createConfetti();
            }, 3000);
        }

        // Promo code functionality
        function initializePromoCode() {
            const applyBtn = document.querySelector('.btn-apply');
            const promoInput = document.querySelector('.promo-input');
            
            applyBtn.addEventListener('click', function() {
                const code = promoInput.value.trim().toUpperCase();
                
                if (code === 'SAVE10') {
                    // Show discount
                    document.querySelector('.total-row.discount').style.display = 'flex';
                    
                    // Update button
                    this.textContent = 'Applied!';
                    this.style.background = 'var(--success-color)';
                    
                    // Update total
                    updateGrandTotal();
                    
                    // Show success message
                    showNotification('Promo code applied successfully!', 'success');
                } else if (code) {
                    showNotification('Invalid promo code', 'error');
                    promoInput.classList.add('is-invalid');
                }
            });
            
            promoInput.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });
        }

        // Show notification
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed top-0 start-50 translate-middle-x mt-3`;
            notification.style.zIndex = '9999';
            notification.innerHTML = `
                <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
                ${message}
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translate(-50%, 0)';
            }, 10);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Format card inputs
        function formatCardInputs() {
            // Card number formatting
            const cardNumber = document.getElementById('cardNumber');
            if (cardNumber) {
                cardNumber.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\s/g, '');
                    let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
                    e.target.value = formattedValue;
                });
            }
            
            // Expiry date formatting
            const cardExpiry = document.getElementById('cardExpiry');
            if (cardExpiry) {
                cardExpiry.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length >= 2) {
                        value = value.slice(0, 2) + '/' + value.slice(2, 4);
                    }
                    e.target.value = value;
                });
            }
            
            // CVV only numbers
            const cardCVV = document.getElementById('cardCVV');
            if (cardCVV) {
                cardCVV.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/\D/g, '');
                });
            }
        }

        // Create confetti effect
        function createConfetti() {
            const colors = ['#5D5FEF', '#00D9FF', '#10B981', '#F59E0B', '#FF6B6B'];
            const confettiCount = 100;
            
            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.style.cssText = `
                    position: fixed;
                    width: 10px;
                    height: 10px;
                    background: ${colors[Math.floor(Math.random() * colors.length)]};
                    left: ${Math.random() * 100}%;
                    top: -10px;
                    opacity: ${Math.random()};
                    transform: rotate(${Math.random() * 360}deg);
                    animation: confettiFall ${2 + Math.random() * 3}s linear;
                    z-index: 9999;
                `;
                
                document.body.appendChild(confetti);
                
                // Remove after animation
                setTimeout(() => confetti.remove(), 5000);
            }
        }

        // Add confetti animation
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes confettiFall {
                to {
                    transform: translateY(100vh) rotate(720deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
@endsection
