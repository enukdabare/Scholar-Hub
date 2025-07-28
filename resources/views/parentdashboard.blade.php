@extends('layouts.app')

@section('title', 'Parentdashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard - Scholar Hub</title>
    
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
            background-color: var(--light-bg);
            overflow-x: hidden;
        }
        
        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
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
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .nav-link.active {
            color: var(--primary-color);
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-color);
        }
        
        /* Dashboard Layout */
        .dashboard-wrapper {
            display: flex;
            min-height: calc(100vh - 76px);
        }
        
        /* Sidebar */
        .dashboard-sidebar {
            width: 280px;
            background: white;
            padding: 30px 20px;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: sticky;
            top: 76px;
            height: calc(100vh - 76px);
            overflow-y: auto;
        }
        
        .user-profile {
            text-align: center;
            padding: 20px;
            background: var(--gradient-bg);
            border-radius: 20px;
            margin-bottom: 30px;
            animation: fadeInLeft 0.8s ease-out;
        }
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .user-avatar {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 36px;
            color: var(--primary-color);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .user-name {
            color: white;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .user-email {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
        }
        
        .sidebar-item {
            margin-bottom: 5px;
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            color: var(--text-dark);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }
        
        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: var(--primary-color);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }
        
        .sidebar-link:hover {
            background: var(--light-bg);
            color: var(--primary-color);
            transform: translateX(5px);
        }
        
        .sidebar-link.active {
            background: rgba(93, 95, 239, 0.1);
            color: var(--primary-color);
        }
        
        .sidebar-link.active::before {
            transform: scaleY(1);
        }
        
        .sidebar-icon {
            font-size: 20px;
        }
        
        /* Main Content */
        .dashboard-content {
            flex: 1;
            padding: 30px;
            animation: fadeInUp 0.8s ease-out;
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
        
        .dashboard-header {
            margin-bottom: 30px;
        }
        
        .dashboard-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }
        
        .dashboard-subtitle {
            color: var(--text-light);
            font-size: 16px;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: -50%;
            width: 100%;
            height: 100%;
            background: var(--gradient-bg);
            opacity: 0.1;
            transform: skewX(-20deg);
            transition: right 0.5s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        
        .stat-card:hover::before {
            right: -20%;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .stat-card.primary .stat-icon {
            background: rgba(93, 95, 239, 0.15);
            color: var(--primary-color);
        }
        
        .stat-card.success .stat-icon {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success-color);
        }
        
        .stat-card.warning .stat-icon {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning-color);
        }
        
        .stat-card.danger .stat-icon {
            background: rgba(255, 107, 107, 0.15);
            color: var(--accent-color);
        }
        
        .stat-value {
            font-size: 36px;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }
        
        .stat-label {
            color: var(--text-light);
            font-size: 16px;
            position: relative;
            z-index: 1;
        }
        
        .stat-change {
            position: absolute;
            top: 30px;
            right: 30px;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .stat-change.positive {
            color: var(--success-color);
        }
        
        .stat-change.negative {
            color: var(--accent-color);
        }
        
        /* Children Cards */
        .children-section {
            margin-bottom: 40px;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .children-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .child-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .child-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-bg);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        
        .child-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        
        .child-card:hover::after {
            transform: scaleX(1);
        }
        
        .child-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .child-avatar {
            width: 50px;
            height: 50px;
            background: var(--gradient-bg);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            font-weight: 600;
        }
        
        .child-info h4 {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .child-school {
            color: var(--text-light);
            font-size: 14px;
        }
        
        .child-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-dark);
            font-size: 14px;
        }
        
        .detail-item i {
            color: var(--primary-color);
        }
        
        /* Recent Orders */
        .orders-table-container {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .orders-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        
        .orders-table thead th {
            background: var(--light-bg);
            padding: 15px 20px;
            font-weight: 600;
            color: var(--text-dark);
            text-align: left;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }
        
        .orders-table thead th:first-child {
            border-radius: 10px 0 0 10px;
        }
        
        .orders-table thead th:last-child {
            border-radius: 0 10px 10px 0;
        }
        
        .orders-table tbody tr {
            background: white;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .orders-table tbody tr:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }
        
        .orders-table tbody td {
            padding: 20px;
            border: none;
            vertical-align: middle;
        }
        
        .order-id {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .order-status {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        
        .status-pending {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning-color);
        }
        
        .status-processing {
            background: rgba(93, 95, 239, 0.15);
            color: var(--primary-color);
        }
        
        .status-shipped {
            background: rgba(0, 217, 255, 0.15);
            color: var(--secondary-color);
        }
        
        .status-delivered {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success-color);
        }
        
        .btn-view-order {
            padding: 8px 20px;
            background: var(--gradient-bg);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-view-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(93, 95, 239, 0.3);
        }
        
        /* Quick Actions */
        .quick-actions {
            margin-top: 40px;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .action-card {
            background: white;
            border: 2px solid transparent;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .action-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: var(--gradient-bg);
            opacity: 0;
            transform: rotate(45deg);
            transition: opacity 0.3s ease;
        }
        
        .action-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .action-card:hover::before {
            opacity: 0.1;
        }
        
        .action-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            background: var(--light-bg);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--primary-color);
            position: relative;
            z-index: 1;
        }
        
        .action-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-color);
            position: relative;
            z-index: 1;
        }
        
        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: var(--gradient-bg);
            border-radius: 50%;
            border: none;
            color: white;
            font-size: 24px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 1001;
            transition: all 0.3s ease;
        }
        
        .mobile-menu-toggle:hover {
            transform: scale(1.1);
        }
        
        /* Charts Container */
        .charts-section {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 25px;
        }
        
        .chart-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .chart-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .chart-period {
            display: flex;
            gap: 10px;
        }
        
        .period-btn {
            padding: 6px 12px;
            border: 1px solid #e0e0e0;
            background: white;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .period-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        /* Notification Badge */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 10px;
            height: 10px;
            background: var(--accent-color);
            border-radius: 50%;
            animation: pulse 2s infinite;
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
        
        /* Responsive */
        @media (max-width: 1024px) {
            .dashboard-sidebar {
                position: fixed;
                left: -280px;
                z-index: 1001;
                height: 100vh;
                top: 0;
            }
            
            .dashboard-sidebar.open {
                left: 0;
            }
            
            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .dashboard-content {
                padding: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .children-grid {
                grid-template-columns: 1fr;
            }
            
            .charts-section {
                grid-template-columns: 1fr;
            }
            
            .orders-table-container {
                overflow-x: auto;
            }
            
            .dashboard-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="bi bi-mortarboard-fill"></i>
                Scholar Hub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schools">Schools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/orders">Orders</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn position-relative">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="notification-badge"></span>
                    </button>
                    <button class="btn">
                        <i class="bi bi-cart3 fs-5"></i>
                    </button>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span class="d-none d-md-inline">Hi, Enuk</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile">Profile Settings</a></li>
                            <li><a class="dropdown-item" href="/payment-methods">Payment Methods</a></li>
                            <li><a class="dropdown-item" href="/addresses">Address Book</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Wrapper -->
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar" id="sidebar">
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <h3 class="user-name">Enuk Dabare</h3>
                <p class="user-email">enuk@example.com</p>
            </div>
            
            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <a href="#overview" class="sidebar-link active">
                        <i class="bi bi-grid sidebar-icon"></i>
                        <span>Dashboard Overview</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#orders" class="sidebar-link">
                        <i class="bi bi-bag sidebar-icon"></i>
                        <span>My Orders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#children" class="sidebar-link">
                        <i class="bi bi-people sidebar-icon"></i>
                        <span>My Children</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#schools" class="sidebar-link">
                        <i class="bi bi-building sidebar-icon"></i>
                        <span>Saved Schools</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#wishlist" class="sidebar-link">
                        <i class="bi bi-heart sidebar-icon"></i>
                        <span>Wishlist</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#profile" class="sidebar-link">
                        <i class="bi bi-person-gear sidebar-icon"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#payments" class="sidebar-link">
                        <i class="bi bi-credit-card sidebar-icon"></i>
                        <span>Payment Methods</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#addresses" class="sidebar-link">
                        <i class="bi bi-geo-alt sidebar-icon"></i>
                        <span>Address Book</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-content">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <h1 class="dashboard-title">Welcome back, Enuk! 👋</h1>
                <p class="dashboard-subtitle">Here's what's happening with your school supplies today.</p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card primary">
                    <div class="stat-icon">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <div class="stat-value" data-target="12">0</div>
                    <div class="stat-label">Total Orders</div>
                    <div class="stat-change positive">
                        <i class="bi bi-arrow-up"></i>
                        <span>+2 this month</span>
                    </div>
                </div>
                
                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="bi bi-currency-rupee"></i>
                    </div>
                    <div class="stat-value">
                        <span data-target="45600">0</span>
                    </div>
                    <div class="stat-label">Total Spent</div>
                    <div class="stat-change positive">
                        <i class="bi bi-arrow-up"></i>
                        <span>+15%</span>
                    </div>
                </div>
                
                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="stat-value" data-target="2">0</div>
                    <div class="stat-label">Active Children</div>
                    <div class="stat-change">
                        <span>In 2 schools</span>
                    </div>
                </div>
                
                <div class="stat-card danger">
                    <div class="stat-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="stat-value" data-target="8">0</div>
                    <div class="stat-label">Wishlist Items</div>
                    <div class="stat-change">
                        <span>Ready to order</span>
                    </div>
                </div>
            </div>

            <!-- Children Section -->
            <div class="children-section">
                <div class="section-header">
                    <h2 class="section-title">My Children</h2>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Add Child
                    </button>
                </div>
                
                <div class="children-grid">
                    <div class="child-card">
                        <div class="child-header">
                            <div class="child-avatar">KD</div>
                            <div class="child-info">
                                <h4>Kavindi Dabare</h4>
                                <p class="child-school">Colombo International School</p>
                            </div>
                        </div>
                        <div class="child-details">
                            <div class="detail-item">
                                <i class="bi bi-calendar3"></i>
                                <span>Grade 3</span>
                            </div>
                            <div class="detail-item">
                                <i class="bi bi-person-badge"></i>
                                <span>ID: CIS2024001</span>
                            </div>
                            <div class="detail-item">
                                <i class="bi bi-bag-check"></i>
                                <span>5 Orders</span>
                            </div>
                            <div class="detail-item">
                                <i class="bi bi-clock"></i>
                                <span>Next: Books</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="child-card">
                        <div class="child-header">
                            <div class="child-avatar">SD</div>
                            <div class="child-info">
                                <h4>Senuka Dabare</h4>
                                <p class="child-school">Royal College</p>
                            </div>
                        </div>
                        <div class="child-details">
                            <div class="detail-item">
                                <i class="bi bi-calendar3"></i>
                                <span>Grade 5</span>
                            </div>
                            <div class="detail-item">
                                <i class="bi bi-person-badge"></i>
                                <span>ID: RC2024045</span>
                            </div>
                            <div class="detail-item">
                                <i class="bi bi-bag-check"></i>
                                <span>7 Orders</span>
                            </div>
                            <div class="detail-item">
                                <i class="bi bi-clock"></i>
                                <span>Next: Uniform</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="orders-table-container">
                <div class="table-header">
                    <h2 class="section-title">Recent Orders</h2>
                    <a href="/orders" class="btn btn-outline-primary">View All Orders</a>
                </div>
                
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>School</th>
                            <th>Items</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="order-id">#ORD12345</td>
                            <td>Jan 5, 2025</td>
                            <td>Colombo International</td>
                            <td>3 items</td>
                            <td>Rs. 8,500</td>
                            <td><span class="order-status status-processing">Processing</span></td>
                            <td><button class="btn-view-order">View</button></td>
                        </tr>
                        <tr>
                            <td class="order-id">#ORD12344</td>
                            <td>Dec 20, 2024</td>
                            <td>Royal College</td>
                            <td>5 items</td>
                            <td>Rs. 5,200</td>
                            <td><span class="order-status status-delivered">Delivered</span></td>
                            <td><button class="btn-view-order">View</button></td>
                        </tr>
                        <tr>
                            <td class="order-id">#ORD12343</td>
                            <td>Dec 15, 2024</td>
                            <td>Colombo International</td>
                            <td>2 items</td>
                            <td>Rs. 3,800</td>
                            <td><span class="order-status status-shipped">Shipped</span></td>
                            <td><button class="btn-view-order">Track</button></td>
                        </tr>
                        <tr>
                            <td class="order-id">#ORD12342</td>
                            <td>Dec 10, 2024</td>
                            <td>Royal College</td>
                            <td>4 items</td>
                            <td>Rs. 6,200</td>
                            <td><span class="order-status status-delivered">Delivered</span></td>
                            <td><button class="btn-view-order">View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Charts Section -->
            <div class="charts-section">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">Spending Overview</h3>
                        <div class="chart-period">
                            <button class="period-btn">Week</button>
                            <button class="period-btn active">Month</button>
                            <button class="period-btn">Year</button>
                        </div>
                    </div>
                    <canvas id="spendingChart" height="200"></canvas>
                </div>
                
                <div class="chart-card">
                    <div class="chart-header">
                        <h3 class="chart-title">Category Distribution</h3>
                    </div>
                    <canvas id="categoryChart" height="200"></canvas>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <div class="section-header">
                    <h2 class="section-title">Quick Actions</h2>
                </div>
                
                <div class="actions-grid">
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="bi bi-cart-plus"></i>
                        </div>
                        <h4 class="action-title">Browse Schools</h4>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4 class="action-title">Reorder Items</h4>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h4 class="action-title">Track Orders</h4>
                    </div>
                    
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4 class="action-title">Get Support</h4>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats counter
            animateCounters();
            
            // Initialize charts
            initializeCharts();
            
            // Sidebar navigation
            initializeSidebar();
            
            // Mobile menu
            initializeMobileMenu();
            
            // Add hover effects
            initializeHoverEffects();
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('[data-target]');
            
            const options = {
                root: null,
                threshold: 0.5
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-target'));
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        let current = 0;
                        
                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                if (counter.parentElement.classList.contains('stat-value') && 
                                    counter.parentElement.textContent.includes('Rs.')) {
                                    counter.textContent = Math.floor(current).toLocaleString();
                                } else {
                                    counter.textContent = Math.floor(current);
                                }
                                requestAnimationFrame(updateCounter);
                            } else {
                                if (counter.parentElement.classList.contains('stat-value') && 
                                    counter.parentElement.textContent.includes('Rs.')) {
                                    counter.textContent = target.toLocaleString();
                                } else {
                                    counter.textContent = target;
                                }
                            }
                        };
                        
                        updateCounter();
                        observer.unobserve(counter);
                    }
                });
            }, options);
            
            counters.forEach(counter => {
                observer.observe(counter);
            });
        }

        // Initialize Charts
        function initializeCharts() {
            // Spending Chart
            const spendingCtx = document.getElementById('spendingChart').getContext('2d');
            const spendingChart = new Chart(spendingCtx, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Spending',
                        data: [12000, 8500, 15000, 9800],
                        borderColor: '#5D5FEF',
                        backgroundColor: 'rgba(93, 95, 239, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        pointBackgroundColor: '#5D5FEF',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return 'Rs. ' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rs. ' + value.toLocaleString();
                                }
                            },
                            grid: {
                                borderDash: [5, 5]
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Category Chart
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            const categoryChart = new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Uniforms', 'Books', 'Stationery', 'Sports', 'Others'],
                    datasets: [{
                        data: [35, 25, 20, 15, 5],
                        backgroundColor: [
                            '#5D5FEF',
                            '#00D9FF',
                            '#10B981',
                            '#F59E0B',
                            '#FF6B6B'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                usePointStyle: true,
                                font: {
                                    size: 13
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });
        }

        // Sidebar Navigation
        function initializeSidebar() {
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    sidebarLinks.forEach(l => l.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Smooth scroll to section (if exists)
                    const targetId = this.getAttribute('href');
                    if (targetId && targetId !== '#') {
                        const targetSection = document.querySelector(targetId);
                        if (targetSection) {
                            targetSection.scrollIntoView({ behavior: 'smooth' });
                        }
                    }
                });
            });
        }

        // Mobile Menu
        function initializeMobileMenu() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const sidebar = document.getElementById('sidebar');
            let isOpen = false;
            
            mobileMenuToggle.addEventListener('click', function() {
                isOpen = !isOpen;
                
                if (isOpen) {
                    sidebar.classList.add('open');
                    this.innerHTML = '<i class="bi bi-x-lg"></i>';
                    
                    // Create overlay
                    const overlay = document.createElement('div');
                    overlay.className = 'sidebar-overlay';
                    overlay.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0, 0, 0, 0.5);
                        z-index: 1000;
                        opacity: 0;
                        transition: opacity 0.3s ease;
                    `;
                    document.body.appendChild(overlay);
                    
                    setTimeout(() => {
                        overlay.style.opacity = '1';
                    }, 10);
                    
                    overlay.addEventListener('click', () => {
                        closeSidebar();
                    });
                } else {
                    closeSidebar();
                }
            });
            
            function closeSidebar() {
                sidebar.classList.remove('open');
                mobileMenuToggle.innerHTML = '<i class="bi bi-list"></i>';
                isOpen = false;
                
                const overlay = document.querySelector('.sidebar-overlay');
                if (overlay) {
                    overlay.style.opacity = '0';
                    setTimeout(() => {
                        overlay.remove();
                    }, 300);
                }
            }
        }

        // Hover Effects
        function initializeHoverEffects() {
            // Action cards
            const actionCards = document.querySelectorAll('.action-card');
            actionCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Add ripple effect
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.5);
                        transform: scale(0);
                        animation: ripple 0.6s ease-out;
                    `;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });
            
            // View order buttons
            const viewButtons = document.querySelectorAll('.btn-view-order');
            viewButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    
                    // Simulate navigation
                    const orderId = this.closest('tr').querySelector('.order-id').textContent;
                    console.log('Viewing order:', orderId);
                });
            });
            
            // Period buttons
            const periodButtons = document.querySelectorAll('.period-btn');
            periodButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    periodButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update chart data based on period
                    updateChartPeriod(this.textContent);
                });
            });
        }

        // Update chart period
        function updateChartPeriod(period) {
            // This would typically fetch new data from the server
            console.log('Updating chart for period:', period);
            
            // Simulate data update with animation
            const chart = Chart.getChart('spendingChart');
            if (chart) {
                chart.data.datasets[0].data = generateRandomData();
                chart.update('active');
            }
        }

        // Generate random data for demo
        function generateRandomData() {
            return Array.from({ length: 4 }, () => Math.floor(Math.random() * 20000) + 5000);
        }

        // Add ripple animation CSS
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

        // Add floating animation to stat cards
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.style.animation = 'floatIn 0.8s ease-out forwards';
        });

        // Add float in animation
        const floatStyle = document.createElement('style');
        floatStyle.innerHTML = `
            @keyframes floatIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
        document.head.appendChild(floatStyle);
    </script>
</body>
</html>
@endsection
