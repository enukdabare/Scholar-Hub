@extends('layouts.app')

@section('title', 'Storefront')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colombo International School - Scholar Hub</title>
    
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
        }
        
        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 107, 107, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 107, 107, 0);
            }
        }
        
        /* School Header */
        .school-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }
        
        .school-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.1;
        }
        
        .school-info {
            position: relative;
            z-index: 1;
            color: white;
            animation: fadeInUp 0.8s ease-out;
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
        
        .school-logo-large {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .school-name {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .school-details {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 30px;
        }
        
        .school-stats {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }
        
        .school-stat {
            text-align: center;
        }
        
        .school-stat-number {
            font-size: 32px;
            font-weight: 700;
            display: block;
        }
        
        .school-stat-label {
            font-size: 14px;
            opacity: 0.9;
        }
        
        /* Category Pills */
        .category-pills {
            padding: 30px 0;
            background: var(--light-bg);
            position: sticky;
            top: 80px;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .category-pill {
            display: inline-block;
            padding: 10px 24px;
            margin: 5px;
            background: white;
            border: 2px solid transparent;
            border-radius: 25px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .category-pill::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-bg);
            transition: left 0.3s ease;
            z-index: -1;
        }
        
        .category-pill:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(93, 95, 239, 0.2);
        }
        
        .category-pill.active {
            background: var(--gradient-bg);
            color: white;
            border-color: transparent;
        }
        
        .category-pill.active::before {
            left: 0;
        }
        
        .category-icon {
            margin-right: 8px;
        }
        
        /* Main Content Area */
        .main-content {
            padding: 40px 0;
            background: white;
        }
        
        /* Filters Sidebar */
        .filters-sidebar {
            background: var(--light-bg);
            border-radius: 20px;
            padding: 30px;
            position: sticky;
            top: 200px;
            max-height: calc(100vh - 220px);
            overflow-y: auto;
            animation: slideInLeft 0.8s ease-out;
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .filter-section {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .filter-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .filter-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }
        
        .filter-title i {
            transition: transform 0.3s ease;
        }
        
        .filter-title.collapsed i {
            transform: rotate(-90deg);
        }
        
        .filter-option {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 5px;
            border-radius: 8px;
        }
        
        .filter-option:hover {
            background: rgba(93, 95, 239, 0.1);
            padding-left: 10px;
        }
        
        .filter-checkbox {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            cursor: pointer;
            accent-color: var(--primary-color);
        }
        
        .filter-label {
            color: var(--text-dark);
            font-size: 15px;
            cursor: pointer;
            flex: 1;
        }
        
        .filter-count {
            color: var(--text-light);
            font-size: 14px;
        }
        
        /* Price Range Slider */
        .price-range-slider {
            margin-top: 20px;
        }
        
        .price-slider {
            width: 100%;
            height: 6px;
            -webkit-appearance: none;
            appearance: none;
            background: #e0e0e0;
            border-radius: 3px;
            outline: none;
        }
        
        .price-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: var(--primary-color);
            cursor: pointer;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(93, 95, 239, 0.3);
        }
        
        .price-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: var(--primary-color);
            cursor: pointer;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(93, 95, 239, 0.3);
        }
        
        .price-range-values {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Size Selector */
        .size-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 15px;
        }
        
        .size-option {
            padding: 8px;
            text-align: center;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            color: var(--text-dark);
        }
        
        .size-option:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .size-option.selected {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        /* Product Grid */
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .products-count {
            font-size: 18px;
            color: var(--text-dark);
            font-weight: 500;
        }
        
        .sort-dropdown {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .sort-select {
            padding: 10px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            color: var(--text-dark);
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .sort-select:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        .view-toggle {
            display: flex;
            gap: 5px;
        }
        
        .view-btn {
            padding: 8px;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-light);
        }
        
        .view-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .view-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        /* Product Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            z-index: 10;
        }
        
        .product-badge.new {
            background: var(--success-color);
        }
        
        .product-wishlist {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .product-wishlist:hover {
            background: var(--accent-color);
            color: white;
            transform: scale(1.1);
        }
        
        .product-wishlist.active {
            background: var(--accent-color);
            color: white;
        }
        
        .product-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-category {
            font-size: 12px;
            color: var(--primary-color);
            font-weight: 500;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        
        .product-name {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            line-height: 1.4;
        }
        
        .product-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }
        
        .stars {
            color: #ffc107;
            font-size: 14px;
        }
        
        .rating-count {
            font-size: 13px;
            color: var(--text-light);
        }
        
        .product-price {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .price-current {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .price-original {
            font-size: 16px;
            color: var(--text-light);
            text-decoration: line-through;
        }
        
        .product-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-add-cart {
            flex: 1;
            padding: 12px;
            background: var(--gradient-bg);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-add-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(93, 95, 239, 0.3);
        }
        
        .btn-add-cart:active {
            transform: translateY(0);
        }
        
        .btn-quick-view {
            padding: 12px;
            background: var(--light-bg);
            color: var(--primary-color);
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-quick-view:hover {
            background: var(--primary-color);
            color: white;
        }
        
        /* Quick View Modal */
        .modal-content {
            border-radius: 20px;
            overflow: hidden;
        }
        
        .modal-header {
            border-bottom: none;
            padding: 20px 30px;
        }
        
        .modal-body {
            padding: 0 30px 30px;
        }
        
        .quick-view-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        .quick-view-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 16px;
        }
        
        .quick-view-info h3 {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        
        .quick-view-price {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .quick-view-description {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 25px;
        }
        
        .size-selector {
            margin-bottom: 25px;
        }
        
        .size-selector h5 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .quantity-btn {
            width: 36px;
            height: 36px;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .quantity-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .quantity-input {
            width: 60px;
            text-align: center;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 8px;
            font-weight: 600;
        }
        
        /* Shopping Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
            z-index: 1100;
            transition: right 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        
        .cart-sidebar.open {
            right: 0;
        }
        
        .cart-header {
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .cart-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .cart-close {
            width: 36px;
            height: 36px;
            border: none;
            background: var(--light-bg);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .cart-close:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .cart-body {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
        }
        
        .cart-item {
            display: flex;
            gap: 15px;
            padding: 15px;
            background: var(--light-bg);
            border-radius: 12px;
            margin-bottom: 15px;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .cart-item-info {
            flex: 1;
        }
        
        .cart-item-name {
            font-size: 15px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .cart-item-details {
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 10px;
        }
        
        .cart-item-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .cart-item-quantity {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .cart-item-price {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .cart-footer {
            padding: 20px;
            border-top: 1px solid #e0e0e0;
        }
        
        .cart-summary {
            margin-bottom: 20px;
        }
        
        .cart-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: var(--text-dark);
        }
        
        .cart-summary-row.total {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark-color);
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
        }
        
        .btn-checkout {
            width: 100%;
            padding: 15px;
            background: var(--gradient-bg);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(93, 95, 239, 0.3);
        }
        
        /* Cart Overlay */
        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1050;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .cart-overlay.open {
            opacity: 1;
            visibility: visible;
        }
        
        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        
        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
        
        .skeleton-product {
            border-radius: 16px;
            overflow: hidden;
        }
        
        .skeleton-image {
            height: 280px;
            background: #e0e0e0;
        }
        
        .skeleton-text {
            height: 20px;
            background: #e0e0e0;
            border-radius: 4px;
            margin: 10px 20px;
        }
        
        .skeleton-text.short {
            width: 60%;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .filters-sidebar {
                position: static;
                margin-bottom: 30px;
            }
        }
        
        @media (max-width: 768px) {
            .school-name {
                font-size: 32px;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
            
            .quick-view-content {
                grid-template-columns: 1fr;
            }
            
            .quick-view-image {
                height: 300px;
            }
        }
        
        @media (max-width: 576px) {
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 15px;
            }
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 15px;
            }
            
            .product-info {
                padding: 15px;
            }
            
            .product-name {
                font-size: 14px;
            }
            
            .price-current {
                font-size: 18px;
            }
        
    </style>
</head>
<body>

    <!-- School Header -->
    <section class="school-header">
        <div class="container">
            <div class="school-info">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center gap-4">
                            <div class="school-logo-large">
                                <i class="bi bi-building"></i>
                            </div>
                            <div>
                                <h1 class="school-name">Colombo International School</h1>
                                <p class="school-details mb-3">
                                    <i class="bi bi-geo-alt me-2"></i>Colombo 03, Sri Lanka
                                </p>
                                <div class="school-stats">
                                    <div class="school-stat">
                                        <span class="school-stat-number">175</span>
                                        <span class="school-stat-label">Products</span>
                                    </div>
                                    <div class="school-stat">
                                        <span class="school-stat-number">4.8</span>
                                        <span class="school-stat-label">Rating</span>
                                    </div>
                                    <div class="school-stat">
                                        <span class="school-stat-number">2.5K</span>
                                        <span class="school-stat-label">Orders</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                        <button class="btn btn-light btn-lg">
                            <i class="bi bi-heart me-2"></i>Save School
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Pills -->
    <section class="category-pills">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center">
                <a href="#" class="category-pill active">
                    <i class="bi bi-grid category-icon"></i>All Products
                </a>
                <a href="#" class="category-pill">
                    <i class="bi bi-person-standing category-icon"></i>Uniforms
                </a>
                <a href="#" class="category-pill">
                    <i class="bi bi-book category-icon"></i>Books
                </a>
                <a href="#" class="category-pill">
                    <i class="bi bi-pencil category-icon"></i>Stationery
                </a>
                <a href="#" class="category-pill">
                    <i class="bi bi-bag category-icon"></i>Bags
                </a>
                <a href="#" class="category-pill">
                    <i class="bi bi-trophy category-icon"></i>Sports
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="row">
                <!-- Filters Sidebar -->
                <div class="col-lg-3">
                    <div class="filters-sidebar">
                        <!-- Price Filter -->
                        <div class="filter-section">
                            <h4 class="filter-title">
                                Price Range
                                <i class="bi bi-chevron-down"></i>
                            </h4>
                            <div class="price-range-slider">
                                <input type="range" class="price-slider" min="0" max="10000" value="5000" id="priceSlider">
                                <div class="price-range-values">
                                    <span>Rs. 0</span>
                                    <span id="priceValue">Rs. 5,000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="filter-section">
                            <h4 class="filter-title">
                                Categories
                                <i class="bi bi-chevron-down"></i>
                            </h4>
                            <div class="filter-options">
                                <div class="filter-option">
                                    <input type="checkbox" class="filter-checkbox" id="uniformsFilter" checked>
                                    <label class="filter-label" for="uniformsFilter">Uniforms</label>
                                    <span class="filter-count">(45)</span>
                                </div>
                                <div class="filter-option">
                                    <input type="checkbox" class="filter-checkbox" id="booksFilter">
                                    <label class="filter-label" for="booksFilter">Books</label>
                                    <span class="filter-count">(78)</span>
                                </div>
                                <div class="filter-option">
                                    <input type="checkbox" class="filter-checkbox" id="stationeryFilter">
                                    <label class="filter-label" for="stationeryFilter">Stationery</label>
                                    <span class="filter-count">(52)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Size Filter -->
                        <div class="filter-section">
                            <h4 class="filter-title">
                                Size
                                <i class="bi bi-chevron-down"></i>
                            </h4>
                            <div class="size-grid">
                                <div class="size-option">XS</div>
                                <div class="size-option">S</div>
                                <div class="size-option selected">M</div>
                                <div class="size-option">L</div>
                                <div class="size-option">XL</div>
                                <div class="size-option">XXL</div>
                            </div>
                        </div>

                        <!-- Color Filter -->
                        <div class="filter-section">
                            <h4 class="filter-title">
                                Color
                                <i class="bi bi-chevron-down"></i>
                            </h4>
                            <div class="filter-options">
                                <div class="filter-option">
                                    <input type="checkbox" class="filter-checkbox" id="whiteFilter" checked>
                                    <label class="filter-label" for="whiteFilter">White</label>
                                    <span class="filter-count">(32)</span>
                                </div>
                                <div class="filter-option">
                                    <input type="checkbox" class="filter-checkbox" id="blueFilter" checked>
                                    <label class="filter-label" for="blueFilter">Blue</label>
                                    <span class="filter-count">(28)</span>
                                </div>
                                <div class="filter-option">
                                    <input type="checkbox" class="filter-checkbox" id="greyFilter">
                                    <label class="filter-label" for="greyFilter">Grey</label>
                                    <span class="filter-count">(15)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <!-- Products Header -->
                    <div class="products-header">
                        <div class="products-count">
                            Showing <strong>175 Products</strong>
                        </div>
                        <div class="sort-dropdown">
                            <select class="sort-select">
                                <option>Sort by: Featured</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Newest First</option>
                                <option>Best Selling</option>
                            </select>
                            <div class="view-toggle">
                                <button class="view-btn active" data-view="grid">
                                    <i class="bi bi-grid-3x3-gap"></i>
                                </button>
                                <button class="view-btn" data-view="list">
                                    <i class="bi bi-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="products-grid" id="productsGrid">
                        <!-- Product Card 1 -->
                        <div class="product-card">
                            <span class="product-badge">-20%</span>
                            <button class="product-wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='280' height='280'%3E%3Crect width='280' height='280' fill='%23f0f0f0'/%3E%3Ctext x='50%25' y='50%25' text-anchor='middle' dy='.3em' font-family='Arial' font-size='16' fill='%23999'%3ESchool Shirt%3C/text%3E%3C/svg%3E" alt="School Shirt" class="product-image">
                            <div class="product-info">
                                <div class="product-category">Uniforms</div>
                                <h3 class="product-name">White School Shirt (Boys)</h3>
                                <div class="product-rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-count">(125)</span>
                                </div>
                                <div class="product-price">
                                    <span class="price-current">Rs. 1,200</span>
                                    <span class="price-original">Rs. 1,500</span>
                                </div>
                                <div class="product-actions">
                                    <button class="btn-add-cart">
                                        <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                    </button>
                                    <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div class="product-card">
                            <span class="product-badge new">New</span>
                            <button class="product-wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='280' height='280'%3E%3Crect width='280' height='280' fill='%23e8f4ff'/%3E%3Ctext x='50%25' y='50%25' text-anchor='middle' dy='.3em' font-family='Arial' font-size='16' fill='%23999'%3ESchool Trouser%3C/text%3E%3C/svg%3E" alt="School Trouser" class="product-image">
                            <div class="product-info">
                                <div class="product-category">Uniforms</div>
                                <h3 class="product-name">Blue School Trouser</h3>
                                <div class="product-rating">
                                    <span class="stars">★★★★☆</span>
                                    <span class="rating-count">(89)</span>
                                </div>
                                <div class="product-price">
                                    <span class="price-current">Rs. 2,000</span>
                                </div>
                                <div class="product-actions">
                                    <button class="btn-add-cart">
                                        <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                    </button>
                                    <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Card 3 -->
                        <div class="product-card">
                            <button class="product-wishlist active">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='280' height='280'%3E%3Crect width='280' height='280' fill='%23fff0f0'/%3E%3Ctext x='50%25' y='50%25' text-anchor='middle' dy='.3em' font-family='Arial' font-size='16' fill='%23999'%3EMathematics Book%3C/text%3E%3C/svg%3E" alt="Mathematics Book" class="product-image">
                            <div class="product-info">
                                <div class="product-category">Books</div>
                                <h3 class="product-name">Mathematics Textbook Grade 3</h3>
                                <div class="product-rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-count">(204)</span>
                                </div>
                                <div class="product-price">
                                    <span class="price-current">Rs. 850</span>
                                </div>
                                <div class="product-actions">
                                    <button class="btn-add-cart">
                                        <i class="bi bi-cart-plus me-2"></i>Add to Cart
                                    </button>
                                    <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- More product cards... -->
                        <!-- Loading Skeleton -->
                        <div class="skeleton-product">
                            <div class="skeleton skeleton-image"></div>
                            <div class="skeleton skeleton-text"></div>
                            <div class="skeleton skeleton-text short"></div>
                            <div class="skeleton skeleton-text"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick View Modal -->
    <div class="modal fade" id="quickViewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quick View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="quick-view-content">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400'%3E%3Crect width='400' height='400' fill='%23f0f0f0'/%3E%3Ctext x='50%25' y='50%25' text-anchor='middle' dy='.3em' font-family='Arial' font-size='20' fill='%23999'%3EProduct Image%3C/text%3E%3C/svg%3E" alt="Product" class="quick-view-image">
                        <div class="quick-view-info">
                            <h3>White School Shirt (Boys)</h3>
                            <div class="quick-view-price">Rs. 1,200</div>
                            <div class="product-rating mb-3">
                                <span class="stars">★★★★★</span>
                                <span class="rating-count">(125 reviews)</span>
                            </div>
                            <p class="quick-view-description">
                                Premium quality white school shirt made from breathable cotton fabric. 
                                Perfect for daily school wear with excellent durability and comfort.
                            </p>
                            <div class="size-selector">
                                <h5>Select Size:</h5>
                                <div class="size-grid">
                                    <div class="size-option">XS</div>
                                    <div class="size-option">S</div>
                                    <div class="size-option selected">M</div>
                                    <div class="size-option">L</div>
                                    <div class="size-option">XL</div>
                                </div>
                            </div>
                            <div class="quantity-selector">
                                <span>Quantity:</span>
                                <button class="quantity-btn">-</button>
                                <input type="number" class="quantity-input" value="1" min="1">
                                <button class="quantity-btn">+</button>
                            </div>
                            <button class="btn-add-cart w-100">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shopping Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3 class="cart-title">Shopping Cart</h3>
            <button class="cart-close" id="cartClose">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="cart-body">
            <!-- Cart Item 1 -->
            <div class="cart-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80'%3E%3Crect width='80' height='80' fill='%23f0f0f0'/%3E%3C/svg%3E" alt="Product" class="cart-item-image">
                <div class="cart-item-info">
                    <h4 class="cart-item-name">White School Shirt</h4>
                    <p class="cart-item-details">Size: M | Color: White</p>
                    <div class="cart-item-actions">
                        <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <span>2</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <span class="cart-item-price">Rs. 2,400</span>
                    </div>
                </div>
            </div>
            <!-- Cart Item 2 -->
            <div class="cart-item">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80'%3E%3Crect width='80' height='80' fill='%23e8f4ff'/%3E%3C/svg%3E" alt="Product" class="cart-item-image">
                <div class="cart-item-info">
                    <h4 class="cart-item-name">Blue School Trouser</h4>
                    <p class="cart-item-details">Size: 32 | Color: Blue</p>
                    <div class="cart-item-actions">
                        <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <span>1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                        <span class="cart-item-price">Rs. 2,000</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-footer">
            <div class="cart-summary">
                <div class="cart-summary-row">
                    <span>Subtotal</span>
                    <span>Rs. 4,400</span>
                </div>
                <div class="cart-summary-row">
                    <span>Delivery</span>
                    <span>Rs. 200</span>
                </div>
                <div class="cart-summary-row total">
                    <span>Total</span>
                    <span>Rs. 4,600</span>
                </div>
            </div>
            <button class="btn-checkout">
                Proceed to Checkout
            </button>
        </div>
    </div>

    <!-- Cart Overlay -->
    <div class="cart-overlay" id="cartOverlay"></div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Initialize AOS-like animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate products on load
            const products = document.querySelectorAll('.product-card');
            products.forEach((product, index) => {
                product.style.opacity = '0';
                product.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    product.style.transition = 'all 0.5s ease';
                    product.style.opacity = '1';
                    product.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Cart functionality
        const cartBtn = document.getElementById('cartBtn');
        const cartSidebar = document.getElementById('cartSidebar');
        const cartClose = document.getElementById('cartClose');
        const cartOverlay = document.getElementById('cartOverlay');

        cartBtn.addEventListener('click', () => {
            cartSidebar.classList.add('open');
            cartOverlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        });

        cartClose.addEventListener('click', () => {
            cartSidebar.classList.remove('open');
            cartOverlay.classList.remove('open');
            document.body.style.overflow = 'auto';
        });

        cartOverlay.addEventListener('click', () => {
            cartSidebar.classList.remove('open');
            cartOverlay.classList.remove('open');
            document.body.style.overflow = 'auto';
        });

        // Price slider
        const priceSlider = document.getElementById('priceSlider');
        const priceValue = document.getElementById('priceValue');

        priceSlider.addEventListener('input', function() {
            priceValue.textContent = `Rs. ${parseInt(this.value).toLocaleString()}`;
        });

        // Category pills
        document.querySelectorAll('.category-pill').forEach(pill => {
            pill.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.category-pill').forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Size selection
        document.querySelectorAll('.size-option').forEach(size => {
            size.addEventListener('click', function() {
                document.querySelectorAll('.size-option').forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Add to cart animation
        document.querySelectorAll('.btn-add-cart').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Create flying product animation
                const productCard = this.closest('.product-card');
                const productImage = productCard.querySelector('.product-image');
                const rect = productImage.getBoundingClientRect();
                const cartRect = cartBtn.getBoundingClientRect();
                
                // Clone image
                const flyingImage = productImage.cloneNode();
                flyingImage.style.position = 'fixed';
                flyingImage.style.left = rect.left + 'px';
                flyingImage.style.top = rect.top + 'px';
                flyingImage.style.width = rect.width + 'px';
                flyingImage.style.height = rect.height + 'px';
                flyingImage.style.zIndex = '9999';
                flyingImage.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                flyingImage.style.borderRadius = '50%';
                document.body.appendChild(flyingImage);
                
                // Animate to cart
                setTimeout(() => {
                    flyingImage.style.left = cartRect.left + 'px';
                    flyingImage.style.top = cartRect.top + 'px';
                    flyingImage.style.width = '30px';
                    flyingImage.style.height = '30px';
                    flyingImage.style.opacity = '0';
                }, 10);
                
                // Update cart count
                setTimeout(() => {
                    const cartCount = document.getElementById('cartCount');
                    const currentCount = parseInt(cartCount.textContent);
                    cartCount.textContent = currentCount + 1;
                    cartCount.style.transform = 'scale(1.5)';
                    setTimeout(() => {
                        cartCount.style.transform = 'scale(1)';
                    }, 200);
                    flyingImage.remove();
                }, 800);
                
                // Button feedback
                this.innerHTML = '<i class="bi bi-check-circle me-2"></i>Added!';
                this.style.background = 'var(--success-color)';
                setTimeout(() => {
                    this.innerHTML = '<i class="bi bi-cart-plus me-2"></i>Add to Cart';
                    this.style.background = '';
                }, 2000);
            });
        });

        // Wishlist toggle
        document.querySelectorAll('.product-wishlist').forEach(btn => {
            btn.addEventListener('click', function() {
                this.classList.toggle('active');
                const icon = this.querySelector('i');
                if (this.classList.contains('active')) {
                    icon.classList.remove('bi-heart');
                    icon.classList.add('bi-heart-fill');
                    
                    // Heart animation
                    this.style.transform = 'scale(1.3)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);
                } else {
                    icon.classList.remove('bi-heart-fill');
                    icon.classList.add('bi-heart');
                }
            });
        });

        // Quantity controls
        document.querySelectorAll('.quantity-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input, span');
                let value = parseInt(input.value || input.textContent);
                
                if (this.textContent === '+') {
                    value++;
                } else if (value > 1) {
                    value--;
                }
                
                if (input.tagName === 'INPUT') {
                    input.value = value;
                } else {
                    input.textContent = value;
                }
            });
        });

        // Filter animations
        document.querySelectorAll('.filter-title').forEach(title => {
            title.addEventListener('click', function() {
                this.classList.toggle('collapsed');
                const content = this.nextElementSibling;
                if (content) {
                    content.style.display = this.classList.contains('collapsed') ? 'none' : 'block';
                }
            });
        });

        // View toggle
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const view = this.getAttribute('data-view');
                const grid = document.getElementById('productsGrid');
                
                if (view === 'list') {
                    grid.style.gridTemplateColumns = '1fr';
                    // Add list view specific styles
                } else {
                    grid.style.gridTemplateColumns = '';
                }
            });
        });

        // Simulate loading more products on scroll
        let loading = false;
        window.addEventListener('scroll', () => {
            if (loading) return;
            
            const scrollPosition = window.scrollY + window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;
            
            if (scrollPosition >= documentHeight - 500) {
                loading = true;
                
                // Add skeleton loaders
                const grid = document.getElementById('productsGrid');
                for (let i = 0; i < 3; i++) {
                    const skeleton = document.createElement('div');
                    skeleton.className = 'skeleton-product';
                    skeleton.innerHTML = `
                        <div class="skeleton skeleton-image"></div>
                        <div class="skeleton skeleton-text"></div>
                        <div class="skeleton skeleton-text short"></div>
                        <div class="skeleton skeleton-text"></div>
                    `;
                    grid.appendChild(skeleton);
                }
                
                // Simulate loading delay
                setTimeout(() => {
                    // Remove skeletons
                    document.querySelectorAll('.skeleton-product').forEach(s => s.remove());
                    
                    // Add new products (in real app, this would be from API)
                    for (let i = 0; i < 3; i++) {
                        const newProduct = createProductCard({
                            name: `Product ${Math.floor(Math.random() * 100)}`,
                            price: Math.floor(Math.random() * 5000) + 500,
                            category: ['Uniforms', 'Books', 'Stationery'][Math.floor(Math.random() * 3)]
                        });
                        grid.appendChild(newProduct);
                    }
                    
                    loading = false;
                }, 1500);
            }
        });
        
        // Helper function to create product cards
        function createProductCard(product) {
            const card = document.createElement('div');
            card.className = 'product-card';
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            card.innerHTML = `
                <button class="product-wishlist">
                    <i class="bi bi-heart"></i>
                </button>
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='280' height='280'%3E%3Crect width='280' height='280' fill='%23${Math.floor(Math.random()*16777215).toString(16).padStart(6, '0')}20'/%3E%3Ctext x='50%25' y='50%25' text-anchor='middle' dy='.3em' font-family='Arial' font-size='16' fill='%23999'%3E${product.name}%3C/text%3E%3C/svg%3E" alt="${product.name}" class="product-image">
                <div class="product-info">
                    <div class="product-category">${product.category}</div>
                    <h3 class="product-name">${product.name}</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★☆</span>
                        <span class="rating-count">(${Math.floor(Math.random() * 200)})</span>
                    </div>
                    <div class="product-price">
                        <span class="price-current">Rs. ${product.price.toLocaleString()}</span>
                    </div>
                    <div class="product-actions">
                        <button class="btn-add-cart">
                            <i class="bi bi-cart-plus me-2"></i>Add to Cart
                        </button>
                        <button class="btn-quick-view" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
            `;
            
            // Animate in
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
            
            // Re-attach event listeners
            card.querySelector('.btn-add-cart').addEventListener('click', handleAddToCart);
            card.querySelector('.product-wishlist').addEventListener('click', handleWishlist);
            
            return card;
        }
        
        // Extract add to cart logic for reuse
        function handleAddToCart(e) {
            e.preventDefault();
            const btn = e.currentTarget;
            const productCard = btn.closest('.product-card');
            const productImage = productCard.querySelector('.product-image');
            const rect = productImage.getBoundingClientRect();
            const cartRect = cartBtn.getBoundingClientRect();
            
            // Flying animation
            const flyingImage = productImage.cloneNode();
            flyingImage.style.position = 'fixed';
            flyingImage.style.left = rect.left + 'px';
            flyingImage.style.top = rect.top + 'px';
            flyingImage.style.width = rect.width + 'px';
            flyingImage.style.height = rect.height + 'px';
            flyingImage.style.zIndex = '9999';
            flyingImage.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            flyingImage.style.borderRadius = '50%';
            document.body.appendChild(flyingImage);
            
            setTimeout(() => {
                flyingImage.style.left = cartRect.left + 'px';
                flyingImage.style.top = cartRect.top + 'px';
                flyingImage.style.width = '30px';
                flyingImage.style.height = '30px';
                flyingImage.style.opacity = '0';
            }, 10);
            
            setTimeout(() => {
                const cartCount = document.getElementById('cartCount');
                const currentCount = parseInt(cartCount.textContent);
                cartCount.textContent = currentCount + 1;
                cartCount.style.transform = 'scale(1.5)';
                setTimeout(() => {
                    cartCount.style.transform = 'scale(1)';
                }, 200);
                flyingImage.remove();
            }, 800);
            
            btn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Added!';
            btn.style.background = 'var(--success-color)';
            setTimeout(() => {
                btn.innerHTML = '<i class="bi bi-cart-plus me-2"></i>Add to Cart';
                btn.style.background = '';
            }, 2000);
        }
        
        // Extract wishlist logic for reuse
        function handleWishlist(e) {
            const btn = e.currentTarget;
            btn.classList.toggle('active');
            const icon = btn.querySelector('i');
            if (btn.classList.contains('active')) {
                icon.classList.remove('bi-heart');
                icon.classList.add('bi-heart-fill');
                btn.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    btn.style.transform = 'scale(1)';
                }, 200);
            } else {
                icon.classList.remove('bi-heart-fill');
                icon.classList.add('bi-heart');
            }
        }
    </script>
</body>
</html>
@endsection
