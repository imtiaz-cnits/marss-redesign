<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Pos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/icons/nexus-pos-logo.svg') }}" type="image/x-icon" />

    <!-- Google Fonts: Valley Sans & Baloo Da 2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Valley+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Vite Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- CSS Link-->
    <link href="{{ asset('backend/assets/css/pos.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/all-modal.css.css') }}" rel="stylesheet" />


    <link href="{{ asset('backend/assets/css/toastify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/progress.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/animate.min.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/toastify-js.js') }}"></script>
    <script src="{{ asset('backend/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/config.js') }}"></script>


    {{-- Customer Css Start  --}}


    <style>
        .financemodal .modal-content {
            /* margin: 100px 0px 100px 0px; */
            border-radius: 10px;
            width: 60%;
        }

        @media screen and (max-width: 992px) {
            .financemodal .modal-content {
                width: 90%;
                /* margin: 400px 0px 100px 0px; */


            }
        }

        .financemodal .modal-content .col-lg-6,
        .financemodal .modal-content .col-lg-4 {
            padding: 0 6px !important;
        }

        .newbrand .upload-profile .item,
        .newcategory .upload-profile .item {
            width: 100%;
            display: flex !important;
            gap: 10px;
            margin-bottom: 15px;
        }

        .newbrand .upload-profile .item .img-box,
        .newcategory .upload-profile .item .img-box {
            width: 84px;
            height: 70px;
            border-radius: 6px;
            background: #f2f2f2;
            display: flex !important;
            justify-content: center;
            align-items: center;
        }

        .newbrand .profile-wrapper,
        .newcategory .profile-wrapper {
            width: 100%;
        }

        .newbrand .parent,
        .newcategory .parent {
            width: 100%;
            height: 100%;
            display: inline-flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .newbrand .profile-wrapper p,
        .newcategory .profile-wrapper p {
            margin: 8px 0px 0px 0px;
            font-size: 14px;
            color: #aaaaaa;
        }

        .newbrand .custom-file-input-wrapper,
        .newcategory .custom-file-input-wrapper {
            font-family: var(--primary-font);
            position: relative;
            width: 100%;
            height: 46px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            color: #666;
            background: #ededed;
            cursor: pointer;
        }

        .newbrand .custom-file-input,
        .newcategory .custom-file-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            z-index: 2;
            cursor: pointer;
        }

        .newbrand .custom-file-input-wrapper input[type="file"],
        .newcategory .custom-file-input-wrapper input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            z-index: -2;
            cursor: pointer;
        }

        .newbrand .custom-file-input-wrapper::before,
        .newcategory .custom-file-input-wrapper::before {
            content: "";
            position: absolute;
            margin: 0px 118px 0px auto;
            width: 20px;
            height: 20px;
            background-image: url("../icons/upload-photo-icon.svg");
            background-size: cover;
            background-position: center;
        }

        .newbrand .custom-file-input-wrapper::after,
        .newcategory .custom-file-input-wrapper::after {
            content: "Upload Photo";
            margin-right: -20px !important;
        }

        .newbrand .upload p,
        .newcategory .upload p {
            font-size: 12px;
            color: #777;
        }
    </style>

    {{-- Customer Css end  --}}

    {{-- Pos Css start --}}
    <style>
        /* CSS for low stock and out of stock products */
        .low-stock {
            background-color: #ffcccc;
            /* Light red background for low stock */
        }

        .out-of-stock {
            background-color: #f8d7da;
            /* Light red background for out-of-stock */
            color: #721c24;
            /* Dark red text for out-of-stock */
        }

        .out-of-stock span {
            color: #721c24;
            font-weight: bold;
        }

        .form-label {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .form-control {
            height: 40px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            border-color: #007bff;
        }

        /* Custom styles for flatpickr (datepicker) */
        .flatpickr-calendar {
            border-radius: 10px;
            border: 1px solid #008aee;
        }

        .flatpickr-calendar .flatpickr-day {
            background-color: #fff;
            border-radius: 50%;
            color: #333;
        }

        .flatpickr-calendar .flatpickr-day:hover {
            background-color: #008aee;
            color: #fff;
        }

        .flatpickr-calendar .flatpickr-day.selected {
            background-color: #008aee;
            color: #fff;
        }

        .flatpickr-calendar .flatpickr-month {
            background-color: #008aee;
            color: white;
        }

        .flatpickr-calendar .flatpickr-weekday {
            color: #008aee;
        }

        .flatpickr-calendar .flatpickr-arrow {
            color: #008aee;
        }

        .search-wraper {
            width: 100%;
            display: flex;
            align-items: end;
            gap: 10px;
            margin-top: 10px;
        }

        .search-wraper .wrap {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .search-wraper #openModalBtns {
            display: block;
            height: 33px;
            white-space: nowrap;
            padding: 0px 16px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            margin: 0;
            background: var(--text-color2);
            color: var(--white);
            border: 1px solid var(--text-color2);
            transition: 0.4s;
        }


        .search-wraper input {
            /* width: 100% !important; */
            padding: 6px;
            font-size: 12px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            outline: none;
            color: var(--gray);
        }

        .search-wraper label {
            width: 100%;
            color: var(--text-color);
        }

        .search-wraper input:focus {
            border-color: var(--stroke);
            color: var(--text-color);
        }


        /* select - 2 start css  */


        .select-box-dropdown {
            position: relative;
            width: 100%;
        }

        .select-box-dropdown select {
            display: none;
        }

        .select-dropdown-selected {
            padding: 6px;
            font-size: 12px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            outline: none;
            color: var(--gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .select-dropdown-selected .icon {
            transition: transform 0.3s;
        }

        .select-dropdown-items {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            width: 100%;
            padding: 10px;
            z-index: 1000;
            display: none;
            max-height: 200px;
            overflow-y: auto;
            top: 100%;
        }

        .select-dropdown-items::-webkit-scrollbar {
            width: 8px;
            background-color: #e6e3e3e5;
            cursor: pointer;
        }

        .select-dropdown-items::-webkit-scrollbar-thumb {
            background: #008aee;
            ;
            width: 8px;
            border-radius: 5px;
            border-color: none !important;
        }

        .select-dropdown-items #CustomerSelectData .dropdown-item {
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .select-dropdown-items #CustomerSelectData .dropdown-item:hover {
            background: #008aee;
            color: white;
        }

        .select-search-box {
            padding: 8px 12px;
            width: 100%;
            box-sizing: border-box;
            border-bottom: 1px solid #ccc;
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 1;
            display: none;
            /* Initially hide the search input */
        }

        .show {
            display: block;
        }

        /* Rotate the icon when the dropdown is open */
        .select-dropdown-items.show+.select-dropdown-selected .icon {
            transform: rotate(180deg);
        }

        .select-dropdown-selected .icon {
            top: 0px !important;
        }

        /* select - 2 end  */
        .card-wrapper .product-price h1 {
            opacity: 0;
            visibility: hidden;
            transition: 0.4s;
            margin-left: -20px;
        }

        #product-card .card-wrapper {
            overflow: hidden;
        }

        #product-card .card-wrapper:hover .product-price h1 {
            opacity: 1;
            visibility: visible;
            margin-left: 0px;
        }

        /* ১. প্রোডাক্ট লিস্টে Cost Price লুকানো, হোভারে দেখা */
        .product-price h1:nth-of-type(2) {
            opacity: 0;
            transition: opacity 0.3s;
            color: red;
            font-size: 14px;
        }

        .card-wrapper:hover .product-price h1:nth-of-type(2) {
            opacity: 1;
        }

        /* ২. কার্টে Cost Price ইনপুট হোভারে লাল দেখা */
        td input[oninput*="updateCostPrice"] {
            color: transparent !important;
            background: none;
            border: none;
            width: 80px;
            text-align: center;
        }

        /* Scoped High-Priority CSS for Hold Invoices Modal */
        #holdInvoicesModal .modal-dialog {
            max-width: 820px !important;
            width: 95% !important;
            margin: 1.75rem auto !important;
        }

        #holdInvoicesModal .modal-content {
            border-radius: 18px !important;
            border: none !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25) !important;
            background: #ffffff !important;
            overflow: hidden !important;
            width: 100% !important;
        }

        #holdInvoicesModal .hold-invoices-table {
            width: 100% !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 !important;
        }

        #holdInvoicesModal .hold-invoices-table th,
        #holdInvoicesModal .hold-invoices-table td {
            padding: 12px 14px !important;
            vertical-align: middle !important;
            border-bottom: 1px solid #e2e8f0 !important;
            font-family: var(--primary-font) !important;
            box-sizing: border-box !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }

        #holdInvoicesModal .hold-invoices-table th {
            background-color: #f8fafc !important;
            color: #475569 !important;
            font-weight: 700 !important;
            font-size: 13px !important;
            text-transform: uppercase !important;
        }

        #holdInvoicesModal .hold-invoices-table tr:hover td {
            background-color: #f8fafc !important;
        }

        body[light-mode="dark"] .store-brand-header {
            background-color: #1e293b !important;
            border-color: #334155 !important;
        }

        @media (max-width: 576px) {
            #navbar .nav-wrapper {
                padding-left: 4px !important;
                padding-right: 4px !important;
            }

            .store-brand-header {
                padding: 2px 6px !important;
                max-width: 55% !important;
            }

            .store-brand-header h5 {
                font-size: 11px !important;
            }

            .store-brand-header img {
                height: 20px !important;
            }
        }

        /* ========================================================
           POS 100vh Full Screen App Layout
           ======================================================== */
        html,
        body {
            height: 100vh !important;
            max-height: 100vh !important;
            overflow: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
            background-color: #f8fafc !important;
        }

        #pos-main {
            height: 100vh !important;
            max-height: 100vh !important;
            display: flex !important;
            flex-direction: column !important;
            overflow: hidden !important;
            padding: 4px 10px !important;
            box-sizing: border-box !important;
        }

        #navbar {
            flex-shrink: 0 !important;
            margin-bottom: 4px !important;
        }

        #navbar .nav-wrapper {
            min-height: 38px !important;
            padding: 2px 10px !important;
        }

        #posMainRow {
            flex: 1 1 auto !important;
            min-height: 0 !important;
            height: calc(100vh - 50px) !important;
            max-height: calc(100vh - 50px) !important;
            margin: 0 !important;
            overflow: hidden !important;
            display: flex !important;
        }

        /* Left Column: Products */
        #posProductsCol {
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
            min-height: 0 !important;
            max-height: 100% !important;
            overflow: hidden !important;
            padding-right: 6px !important;
            padding-left: 0 !important;
        }

        #posProductsCol .pos-products-topbar {
            flex-shrink: 0 !important;
        }

        #posProductsCol .catagories-search-wrapper,
        #posProductsCol #product-slider {
            flex-shrink: 0 !important;
        }

        #posProductsCol #product-card {
            flex: 1 1 auto !important;
            min-height: 0 !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            padding-right: 4px !important;
            margin-top: 4px !important;
        }

        /* Right Column: Cart, Customer & Checkout */
        #posCartCol {
            display: flex !important;
            flex-direction: column !important;
            height: 100% !important;
            min-height: 0 !important;
            max-height: 100% !important;
            overflow: hidden !important;
            padding-left: 6px !important;
            padding-right: 0 !important;
        }

        #posCartCol .pos-cart-topbar {
            flex-shrink: 0 !important;
        }

        #posCartCol .pos-cart-customer-box {
            flex-shrink: 0 !important;
        }

        /* Scrollable Cart Product Table */
        .pos-cart-table-wrapper {
            flex: 1 1 auto !important;
            min-height: 80px !important;
            overflow-y: auto !important;
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            background: #ffffff !important;
            margin-bottom: 4px !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03) !important;
        }

        .pos-cart-table-wrapper table {
            width: 100% !important;
            min-width: 540px !important;
            border-collapse: separate !important;
            border-spacing: 0 !important;
        }

        .pos-cart-table-wrapper table thead {
            position: sticky !important;
            top: 0 !important;
            z-index: 10 !important;
            background: #f8fafc !important;
        }

        .pos-cart-table-wrapper table thead th {
            position: sticky !important;
            top: 0 !important;
            background: #f8fafc !important;
            color: #475569 !important;
            font-size: 11px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            border-bottom: 2px solid #e2e8f0 !important;
            padding: 5px 6px !important;
            z-index: 10 !important;
        }

        .pos-cart-table-wrapper table tbody tr:hover {
            background: #f0fdf4 !important;
        }

        /* Sticky Bottom Payment & Confirmation Area */
        #payment {
            flex-shrink: 0 !important;
            margin-top: auto !important;
            z-index: 20 !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 5px 8px !important;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.04) !important;
        }

        #payment .payments {
            padding: 4px 6px !important;
            border-radius: 10px !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
        }

        #payment .payments .heading h2 {
            font-size: 11px !important;
            font-weight: 800 !important;
            margin-bottom: 3px !important;
        }

        #payment .payments .category-wrapper .category {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 3px !important;
        }

        #payment .payments .category label {
            padding: 2px 4px !important;
            border-radius: 6px !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
        }

        #payment .payments .category label .imgName {
            display: flex !important;
            align-items: center !important;
            gap: 3px !important;
        }

        #payment .payments .category label .imgContainer {
            width: 18px !important;
            height: 18px !important;
            min-width: 18px !important;
        }

        #payment .payments .category label .imgContainer img {
            max-width: 14px !important;
            max-height: 14px !important;
        }

        #payment .payments .category label h1 {
            font-size: 10px !important;
            margin: 0 !important;
            font-weight: 700 !important;
        }

        #payment .payments .category label .check {
            font-size: 10px !important;
        }

        #payment .transaction input {
            height: 24px !important;
            font-size: 11px !important;
            padding: 1px 6px !important;
            border-radius: 6px !important;
        }

        #payment .totals {
            padding: 3px 6px !important;
            border-radius: 10px !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
        }

        #payment .totals .subtotal,
        #payment .totals .total {
            padding: 1px 0 !important;
            margin-bottom: 0 !important;
        }

        #payment .totals .subtotal span:first-child,
        #payment .totals .total span:first-child {
            font-size: 11px !important;
            font-weight: 700 !important;
        }

        #payment .totals input {
            height: 22px !important;
            font-size: 11px !important;
            padding: 1px 4px !important;
            width: 75px !important;
            border-radius: 6px !important;
        }

        .pos-bottom-trending-bar {
            padding: 4px 6px !important;
            border-radius: 10px !important;
            margin-top: 4px !important;
            border: 1px solid #e2e8f0 !important;
        }

        .pos-bottom-trending-bar .btn {
            font-size: 12px !important;
            padding: 5px 8px !important;
            border-radius: 8px !important;
        }

        body[light-mode="dark"] #payment,
        body[light-mode="dark"] .pos-cart-table-wrapper {
            background: #1e293b !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] .pos-cart-table-wrapper table thead th {
            background: #0f172a !important;
            color: #cbd5e1 !important;
            border-color: #334155 !important;
        }

        /* ========================================================
           POS Brand Slider & Single-Border Cards (No Ellipsis, Full Name)
           ======================================================== */
        #product-slider {
            position: relative !important;
            padding: 4px 36px !important;
            overflow: hidden !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            margin-bottom: 6px !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03) !important;
        }

        #product-slider .swiper-container {
            width: 100% !important;
            overflow: hidden !important;
            padding: 2px 0 !important;
        }

        /* The Slide ITSELF is the single border card - No double box */
        #product-slider .swiper-slide.brand-card,
        #product-slider .swiper-slide {
            height: 42px !important;
            min-height: 42px !important;
            border-radius: 10px !important;
            border: 1.5px solid #e2e8f0 !important;
            background: #f8fafc !important;
            padding: 4px 8px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
            cursor: pointer !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
            user-select: none !important;
            box-sizing: border-box !important;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03) !important;
        }

        #product-slider .swiper-slide:hover {
            border-color: #16a34a !important;
            background-color: #f0fdf4 !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 3px 8px rgba(22, 163, 74, 0.15) !important;
        }

        #product-slider .swiper-slide.active,
        #product-slider .swiper-slide.active-brand {
            background: linear-gradient(135deg, #15803d 0%, #16a34a 100%) !important;
            border-color: #15803d !important;
            box-shadow: 0 4px 10px rgba(21, 128, 61, 0.3) !important;
            transform: translateY(-1px) !important;
        }

        /* Full Category / Brand Name without ellipsis */
        #product-slider .swiper-slide .brand-name {
            font-size: 12px !important;
            font-weight: 700 !important;
            color: #1e293b !important;
            font-family: var(--primary-font) !important;
            line-height: 1.25 !important;
            white-space: normal !important; /* NO ELLIPSIS - FULL NAME */
            overflow: visible !important;
            text-overflow: clip !important;
            text-align: center !important;
            pointer-events: none !important;
            transition: color 0.2s ease !important;
            display: block !important;
            word-break: break-word !important;
        }

        #product-slider .swiper-slide:hover .brand-name {
            color: #15803d !important;
        }

        #product-slider .swiper-slide.active .brand-name,
        #product-slider .swiper-slide.active-brand .brand-name {
            color: #ffffff !important;
            font-weight: 800 !important;
        }

        /* Clean Custom Navigation Buttons with Primary Green Background */
        .brand-slider-btn {
            position: absolute !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            width: 28px !important;
            height: 28px !important;
            min-width: 28px !important;
            min-height: 28px !important;
            border-radius: 50% !important;
            background: #15803d !important;
            color: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2) !important;
            border: none !important;
            outline: none !important;
            margin: 0 !important;
            cursor: pointer !important;
            z-index: 20 !important;
            transition: all 0.2s ease !important;
            padding: 0 !important;
        }

        .brand-slider-prev {
            left: 4px !important;
        }

        .brand-slider-next {
            right: 4px !important;
        }

        .brand-slider-btn:hover:not(:disabled):not(.swiper-button-disabled) {
            background: #166534 !important;
            transform: translateY(-50%) scale(1.1) !important;
        }

        .brand-slider-btn:disabled,
        .brand-slider-btn.swiper-button-disabled {
            opacity: 0.25 !important;
            cursor: not-allowed !important;
            pointer-events: none !important;
        }

        .brand-slider-btn i {
            font-size: 12px !important;
            color: #ffffff !important;
            display: inline-block !important;
            line-height: 1 !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Permanently suppress any Swiper default icons or pseudo elements */
        #product-slider .swiper-button-prev,
        #product-slider .swiper-button-next,
        .swiper-button-prev::after,
        .swiper-button-next::after {
            display: none !important;
            content: "" !important;
            width: 0 !important;
            height: 0 !important;
            opacity: 0 !important;
            visibility: hidden !important;
        }

        /* Dark Mode Compatibility */
        body[light-mode="dark"] #product-slider {
            background: #1e293b !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] #product-slider .swiper-slide {
            background: #0f172a !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] #product-slider .swiper-slide .brand-name {
            color: #f1f5f9 !important;
        }

        body[light-mode="dark"] #product-slider .swiper-slide:hover {
            background: #064e3b !important;
            border-color: #059669 !important;
        }

        body[light-mode="dark"] #product-slider .swiper-slide.active,
        body[light-mode="dark"] #product-slider .swiper-slide.active-brand {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important;
            border-color: #059669 !important;
        }

        /* ========================================================
           Compact Product Cards (No Image, Name in Center)
           ======================================================== */
        #product-card .card-wrapper {
            background: #ffffff !important;
            border-radius: 12px !important;
            border: 1.5px solid #e2e8f0 !important;
            padding: 8px 10px !important;
            min-height: 98px !important;
            max-height: 125px !important;
            margin: 4px 0 !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: space-between !important;
            text-decoration: none !important;
            position: relative !important;
            width: 100% !important;
            cursor: pointer !important;
        }

        #product-card .card-wrapper:hover {
            border-color: #16a34a !important;
            box-shadow: 0 8px 20px -4px rgba(22, 163, 74, 0.18), 0 2px 6px rgba(0, 0, 0, 0.04) !important;
            transform: translateY(-2px) !important;
        }

        #product-card .card-wrapper:active {
            transform: scale(0.98) !important;
        }

        #product-card .card-wrapper .product-name-area {
            min-height: 34px !important;
            display: flex !important;
            align-items: center !important;
            margin: 4px 0 !important;
        }

        #product-card .card-wrapper .name.product-main-title {
            font-size: 12.5px !important;
            font-weight: 700 !important;
            color: #0f172a !important;
            line-height: 1.3 !important;
            font-family: var(--primary-font) !important;
            display: -webkit-box !important;
            -webkit-line-clamp: 2 !important;
            -webkit-box-orient: vertical !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            margin: 0 !important;
            transition: color 0.15s ease !important;
        }

        #product-card .card-wrapper:hover .name.product-main-title {
            color: #15803d !important;
        }

        #product-card .card-wrapper .product-id {
            font-size: 10.5px !important;
            font-family: var(--bs-font-monospace, monospace) !important;
            color: #0d9488 !important;
            font-weight: 700 !important;
            letter-spacing: 0.2px !important;
        }

        /* Dark mode for compact product card */
        body[light-mode="dark"] #product-card .card-wrapper {
            background: #1e293b !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] #product-card .card-wrapper .name.product-main-title {
            color: #f1f5f9 !important;
        }

        body[light-mode="dark"] #product-card .card-wrapper:hover .name.product-main-title {
            color: #4ade80 !important;
        }

        body[light-mode="dark"] #product-card .card-wrapper:hover {
            border-color: #10b981 !important;
        }

        /* ========================================================
           POS Cart Table & Redesigned Delete Button
           ======================================================== */
        .pos-cart-table-wrapper table {
            width: 100% !important;
            min-width: 480px !important;
            table-layout: fixed !important;
            border-collapse: collapse !important;
        }

        .pos-cart-table-wrapper table thead {
            display: table-header-group !important;
            position: sticky !important;
            top: 0 !important;
            z-index: 10 !important;
            background: #f8fafc !important;
        }

        .pos-cart-table-wrapper table thead th {
            background: #f8fafc !important;
            color: #475569 !important;
            font-size: 11px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.4px !important;
            border-bottom: 2px solid #e2e8f0 !important;
            white-space: nowrap !important;
        }

        .pos-cart-table-wrapper table tbody {
            display: table-row-group !important;
            width: 100% !important;
        }

        .pos-cart-table-wrapper table tbody tr {
            display: table-row !important;
            width: 100% !important;
            table-layout: auto !important;
            border-bottom: 1px solid #f1f5f9 !important;
            transition: background 0.15s ease !important;
        }

        .pos-cart-table-wrapper table tbody tr:hover {
            background: #f0fdf4 !important;
        }

        .pos-cart-table-wrapper table tbody tr td {
            font-size: 11.5px !important;
            vertical-align: middle !important;
        }

        /* Redesigned Modern Trash Action Button */
        .btn-cart-delete {
            width: 28px !important;
            height: 28px !important;
            min-width: 28px !important;
            min-height: 28px !important;
            border-radius: 7px !important;
            background: #fee2e2 !important;
            border: 1px solid #fca5a5 !important;
            color: #dc2626 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
            padding: 0 !important;
            box-shadow: 0 1px 2px rgba(220, 38, 38, 0.08) !important;
        }

        .btn-cart-delete:hover {
            background: #dc2626 !important;
            color: #ffffff !important;
            border-color: #dc2626 !important;
            transform: scale(1.08) !important;
            box-shadow: 0 3px 8px rgba(220, 38, 38, 0.28) !important;
        }

        .btn-cart-delete:active {
            transform: scale(0.95) !important;
        }

        .btn-cart-delete i {
            font-size: 12px !important;
            line-height: 1 !important;
        }

        /* ========================================================
           Payment Method Cards (Grid 3x2, Non-breaking)
           ======================================================== */
        .payments .category-wrapper {
            width: 100% !important;
            display: block !important;
        }

        .payments .category {
            display: grid !important;
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 6px !important;
            width: 100% !important;
            padding: 2px 0 !important;
        }

        .payments .category label {
            width: 100% !important;
            height: 38px !important;
            padding: 4px 6px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
            background: #ffffff !important;
            border: 1.5px solid #e2e8f0 !important;
            border-radius: 9px !important;
            cursor: pointer !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03) !important;
            margin: 0 !important;
            box-sizing: border-box !important;
            position: relative !important;
            overflow: hidden !important;
        }

        .payments .category label:hover {
            border-color: #16a34a !important;
            background: #f0fdf4 !important;
        }

        .payments .category label.active,
        .payments .category label:has(input:checked) {
            border-color: #15803d !important;
            background: #f0fdf4 !important;
            box-shadow: 0 2px 8px rgba(21, 128, 61, 0.18) !important;
        }

        .payments .category label .imgName {
            display: flex !important;
            align-items: center !important;
            gap: 6px !important;
            width: 100% !important;
            justify-content: flex-start !important;
        }

        .payments .category label .imgContainer {
            width: 22px !important;
            height: 22px !important;
            min-width: 22px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .payments .category label .imgContainer img {
            max-width: 100% !important;
            max-height: 100% !important;
            object-fit: contain !important;
        }

        .payments .category label h1 {
            font-size: 11px !important;
            font-weight: 700 !important;
            color: #1e293b !important;
            margin: 0 !important;
            line-height: 1 !important;
            white-space: nowrap !important;
        }

        .payments .category label.active h1,
        .payments .category label:has(input:checked) h1 {
            color: #15803d !important;
            font-weight: 800 !important;
        }

        .payments .category label .check {
            position: absolute !important;
            top: 2px !important;
            right: 4px !important;
            font-size: 9px !important;
            color: #15803d !important;
            display: none !important;
        }

        .payments .category label.active .check,
        .payments .category label:has(input:checked) .check {
            display: block !important;
        }

        /* ========================================================
           Discount Toggle Pill & Summary Alignment
           ======================================================== */
        .discount-type-pill {
            background: #f1f5f9 !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 6px !important;
            display: inline-flex !important;
            align-items: center !important;
            overflow: hidden !important;
        }

        .discount-type-pill input[type="radio"] {
            display: none !important;
        }

        .discount-type-pill label {
            padding: 2px 7px !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            color: #64748b !important;
            cursor: pointer !important;
            margin: 0 !important;
            line-height: 18px !important;
            transition: all 0.15s ease !important;
            user-select: none !important;
        }

        .discount-type-pill input[type="radio"]:checked + label {
            background: #15803d !important;
            color: #ffffff !important;
        }

        #orderForm .totals .subtotal,
        #orderForm .totals .total {
            min-height: 32px !important;
        }

        #orderForm .totals input[type="number"] {
            transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
        }

        #orderForm .totals input[type="number"]:focus {
            border-color: #15803d !important;
            box-shadow: 0 0 0 2px rgba(21, 128, 61, 0.15) !important;
        }

        /* Dark mode compatibility */
        body[light-mode="dark"] .pos-cart-table-wrapper table thead th {
            background: #1e293b !important;
            color: #cbd5e1 !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] .pos-cart-table-wrapper table tbody tr:hover {
            background: #0f172a !important;
        }

        body[light-mode="dark"] .payments .category label {
            background: #1e293b !important;
            border-color: #334155 !important;
        }

        body[light-mode="dark"] .payments .category label h1 {
            color: #f1f5f9 !important;
        }

        body[light-mode="dark"] .payments .category label.active,
        body[light-mode="dark"] .payments .category label:has(input:checked) {
            background: #064e3b !important;
            border-color: #059669 !important;
        }

        /* ========================================================
           Modal & Overlay Z-Index Hierarchy (Overlay Under Modal)
           ======================================================== */
        .modal-backdrop {
            z-index: 1050 !important;
            opacity: 0.5 !important;
            background-color: #000000 !important;
        }

        .modal {
            z-index: 1060 !important;
            background-color: transparent !important;
            backdrop-filter: none !important;
        }

        .modal-dialog {
            z-index: 1065 !important;
            position: relative !important;
            pointer-events: auto !important;
        }

        .modal-content {
            position: relative !important;
            z-index: 1070 !important;
            pointer-events: auto !important;
        }

        .modal .btn-close,
        .modal button,
        .modal input,
        .modal select,
        .modal a {
            position: relative !important;
            z-index: 1075 !important;
            pointer-events: auto !important;
            cursor: pointer !important;
        }
    </style>

    <!-- Google Fonts: Valley Sans & Baloo Da 2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Valley+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- HTML5 QR & Barcode Scanner Library -->
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
</head>

<body>
    <section id="pos-main">
        <!-- Top Navigation Bar (Ultra-Compact Header) -->
        <nav id="navbar" class="mb-2">
            <div class="nav-wrapper py-1 px-2 px-md-3 d-flex align-items-center justify-content-between gap-1 gap-md-2" style="min-height: 42px; border-radius: 12px; flex-wrap: nowrap;">
                <div class="nav_back_btn p-0 d-flex align-items-center flex-shrink-0">
                    <a href="{{ url('admin-dashboard') }}" class="btn btn-sm btn-outline-success fw-bold d-inline-flex align-items-center gap-1 py-1 px-2 shadow-sm" style="border-radius: 20px; font-size: 11px; background: #f0fdf4; border-color: #bbf7d0; height: 30px;">
                        <i class="fa-solid fa-arrow-left text-success" style="font-size: 11px;"></i>
                        <span class="nav_back_text text-success m-0 p-0 fw-bold d-none d-sm-inline" style="font-size: 11px;">Back to Dashboard</span>
                        <span class="nav_back_text text-success m-0 p-0 fw-bold d-inline d-sm-none" style="font-size: 11px;">Back</span>
                    </a>
                </div>

                <div class="store-brand-header d-flex align-items-center gap-1 gap-md-2 px-2 px-md-3 py-1 bg-white border border-success-subtle rounded-pill shadow-sm overflow-hidden">
                    <img src="{{ asset('backend/assets/img/marss-corporation-logo.svg') }}" alt="AS Logo" style="height: 24px; width: auto; object-fit: contain; flex-shrink: 0;" />
                    <h5 class="fw-extrabold text-success m-0 p-0 d-flex align-items-center gap-1 text-truncate" style="font-size: 13px; font-family: 'Baloo Da 2', sans-serif; font-weight: 800;">
                        <span class="text-truncate">মার্স কর্পোরেশন (MARSS CORPORATION)</span>
                        <span class="badge bg-success text-white fw-bold px-1.5 py-0.5 d-none d-md-inline" style="font-size: 9px; border-radius: 8px; font-family: 'Valley Sans', sans-serif;">POS</span>
                    </h5>
                </div>

                <div class="profile d-flex align-items-center gap-1 gap-md-2 flex-shrink-0">
                    <button class="light-mode-button" aria-label="Toggle Light Mode"
                        onclick="toggle_light_mode()" style="height: 24px; width: 38px;">
                        <span style="height: 18px; width: 36px; top: 3px;"></span>
                        <span style="height: 14px; width: 14px; top: 5px;"></span>
                    </button>

                    <div class="fullscreen">
                        <button class="js-toggle-fullscreen-btn toggle-fullscreen-btn"
                            aria-label="Enter fullscreen mode" hidden>
                            <svg width="22" height="22" class="toggle-fullscreen-svg" viewBox="0 0 30 30"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g class="icon-fullscreen-enter">
                                    <path
                                        d="M2 7.5H0V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H7.5V2H2V7.5Z"
                                        fill="#192045" />
                                    <path
                                        d="M30 7.5H28V2H22.5V0H27C27.7956 0 28.5587 0.31607 29.1213 0.87868C29.6839 1.44129 30 2.20435 30 3V7.5Z"
                                        fill="#192045" />
                                    <path
                                        d="M7.5 30H3C2.20435 30 1.44129 29.6839 0.87868 29.1213C0.31607 28.5587 0 27.7956 0 27V22.5H2V28H7.5V30Z"
                                        fill="#192045" />
                                    <path
                                        d="M27 30H22.5V28H28V22.5H30V27C30 27.7956 29.6839 28.5587 29.1213 29.1213C28.5587 29.6839 27.7956 30 27 30Z"
                                        fill="#192045" />
                                </g>
                            </svg>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user p-0 border-0 d-flex align-items-center justify-content-center"
                            id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user shadow-sm"
                                id="UserProfileImg" src="{{ asset('backend/assets/img/profile-img.png') }}" onerror="this.src='{{ asset('backend/assets/img/profile-img.png') }}'"
                                alt="Header Avatar" style="width: 34px; height: 34px; object-fit: cover; border: 2px solid #16a34a;" />
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0 profile-dropdown shadow-lg border-0" style="border-radius: 12px; overflow: hidden; min-width: 210px;">
                            <div class="p-3 border-bottom bg-light">
                                <h6 class="mb-0 fw-bold text-dark" id="AuthorizePersonProfileName">Loading...</h6>
                                <a href="#" class="mb-0 font-size-11 text-muted text-break" id="EmailShow">loading...</a>
                            </div>
                            <a class="dropdown-item py-2 fw-semibold" href="{{url('admin-dashboard-user-profile')}}">
                                <i class="fa-regular fa-user text-muted me-2"></i> Profile
                            </a>
                            <div class="dropdown-divider my-0"></div>
                            <a class="dropdown-item py-2 fw-bold text-danger" href="#" onclick="userlogout(event)">
                                <i class="fa-solid fa-right-from-bracket me-2 text-danger"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <div class="row flex-grow-1 overflow-hidden" id="posMainRow">
            <div class="col-lg-6 pos-products-col d-none d-lg-block overflow-hidden d-flex flex-column" id="posProductsCol">
                <!-- Barcode Search & Camera Scan for Product List View -->
                <div class="pos-products-topbar mb-1 p-1.5 px-2 bg-white border shadow-sm" style="border-radius: 10px; border-color: #e2e8f0 !important;">
                    <div class="searchbar d-flex align-items-center gap-2 w-100">
                        <div class="flex-grow-1 position-relative" style="min-width: 160px;">
                            <input type="text" id="productCodeSearch"
                                placeholder="🔍 বারকোড স্ক্যান অথবা কোড/নাম লিখুন..."
                                oninput="searchByProductCode(this.value, 'productCodeSearch')"
                                onkeydown="handleBarcodeEnterKey(event, this.value)"
                                class="form-control posSearchInput py-0" autofocus autocomplete="off"
                                style="border-radius: 8px; height: 38px; font-size: 12.5px; padding-left: 12px; padding-right: 40px; border-color: #cbd5e1;" />
                            <a href="#" class="search-icon position-absolute d-flex align-items-center justify-content-center text-white"
                                onclick="triggerBarcodeSearchManual(event, 'productCodeSearch')"
                                style="right: 5px; top: 50%; transform: translateY(-50%); width: 28px; height: 28px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border-radius: 6px; z-index: 5;">
                                <i class="fa-solid fa-magnifying-glass" style="font-size: 11px;"></i>
                            </a>
                            <div id="productCodeSearchSuggestions" class="pos-search-suggestions position-absolute start-0 end-0 bg-white border shadow-lg rounded-3 d-none" style="top: 100%; margin-top: 4px; z-index: 1050; max-height: 280px; overflow-y: auto;"></div>
                        </div>
                        <button type="button" class="btn btn-primary fw-bold text-nowrap d-inline-flex align-items-center justify-content-center gap-1.5 shadow-sm px-3 flex-shrink-0"
                            onclick="openCameraScanner()"
                            style="border-radius: 8px; height: 38px; min-width: 125px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; font-size: 12.5px;">
                            <i class="fa-solid fa-camera fs-6"></i>
                            <span>ক্যামেরা স্ক্যান</span>
                        </button>
                        <button type="button" class="btn btn-warning fw-bold text-dark text-nowrap d-inline-flex align-items-center justify-content-center gap-1.5 shadow-sm px-3 flex-shrink-0"
                            onclick="openQuickAddProductModal()"
                            style="border-radius: 8px; height: 38px; min-width: 120px; font-size: 12.5px;">
                            <i class="fa-solid fa-circle-plus fs-6 text-dark"></i>
                            <span>নতুন প্রোডাক্ট</span>
                        </button>
                    </div>
                </div>

                <!-- Pos Product Slider Start -->
                <section id="product-slider" class="mb-1" style="flex-shrink: 0;">
                    <div class="swiper-container">
                        <div class="swiper-wrapper" id="ProductCategoryData">
                            <!-- Add more slides as needed -->
                        </div>
                    </div>

                    <button type="button" class="brand-slider-btn brand-slider-prev" id="brandSlidePrev" aria-label="Previous">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button type="button" class="brand-slider-btn brand-slider-next" id="brandSlideNext" aria-label="Next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </section>
                <!-- Pos Product Slider End -->

                <!-- Pos Product Card Start (Scrollable Area) -->
                <section id="product-card" class="flex-grow-1 overflow-auto">
                    <div class="row g-2" id="ProductCategoryWishDataItem">
                    </div>
                </section>
                <!-- Pos Product Card End -->
            </div>
            <!-- Pos Categories End -->

            <!-- Pos Order List Start -->
            <div class="col-lg-6 pos-cart-col overflow-hidden d-flex flex-column" id="posCartCol">

                <div id="customerReturnCreditNotice" class="alert alert-info border-info d-none mb-1 py-1.5 px-2.5 align-items-center justify-content-between shadow-sm" style="border-radius: 8px; background: #e0f2fe; color: #0369a1; flex-shrink: 0;">
                    <div>
                        <i class="fa-solid fa-gift me-1.5 text-info fs-6"></i>
                        <span class="fw-bold" style="font-size: 12px;">ফেরত ক্রেডিট: ৳ <span id="posReturnCreditVal">0.00</span></span>
                    </div>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" id="chkUseReturnCredit" onchange="togglePosReturnCreditAdjustment()">
                        <label class="form-check-input-label fw-bold text-dark small" for="chkUseReturnCredit" style="font-size: 11px;">সমন্বয় করুন</label>
                    </div>
                </div>

                <!-- Ultra-Compact Customer & Invoice Info Header -->
                <div class="pos-cart-customer-box p-1.5 px-2 border bg-white shadow-sm mb-1" style="border-radius: 10px; border-color: #e2e8f0 !important; flex-shrink: 0;">
                    <div class="row g-1.5 align-items-center">
                        <!-- Col 1: Customer Search Dropdown & Create Customer -->
                        <div class="col-md-7 col-12">
                            <div class="d-flex align-items-center gap-1.5">
                                <div class="select-box-dropdown flex-grow-1">
                                    <div class="select-dropdown-selected py-0.5 px-2 border rounded-2 d-flex align-items-center justify-content-between" style="font-size: 11.5px; height: 28px; background: #f8fafc; cursor: pointer;">
                                        <span class="text-truncate">Select Customer</span>
                                        <span class="icon ms-1"><i class="fas fa-angle-down" style="font-size: 10px;"></i></span>
                                    </div>
                                    <div class="select-dropdown-items">
                                        <input type="text" class="select-search-box" placeholder="Search customer..." style="display: none;">
                                        <div id="CustomerSelectData"></div>
                                    </div>
                                </div>
                                <button id="openModalBtns" onclick="openCustomerModal()" type="button" class="btn btn-sm btn-success text-nowrap fw-bold px-2.5" style="height: 28px; font-size: 11.5px; border-radius: 6px;">
                                    + New
                                </button>
                            </div>
                        </div>

                        <!-- Col 2: Invoice Date -->
                        <div class="col-md-5 col-12">
                            <div class="d-flex align-items-center gap-1">
                                <span class="text-muted small text-nowrap fw-bold" style="font-size: 10.5px;">তারিখ:</span>
                                <input type="date" id="CustomerDate" class="form-control form-control-sm py-0 px-1.5 fw-bold" style="height: 28px; font-size: 11.5px; border-radius: 6px; background: #f8fafc;" />
                            </div>
                        </div>
                    </div>

                    <!-- Inline Compact Row: Customer Info Fields -->
                    <div class="row g-1 mt-1 pt-1 border-top align-items-center">
                        <div class="col-md-4 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light py-0 px-1.5 text-muted fw-bold" style="font-size: 9.5px;">নাম</span>
                                <input type="text" id="CustomerName" readonly class="form-control py-0 px-1.5 fw-bold text-dark" placeholder="কাস্টমার নাম" style="font-size: 10.5px; height: 22px; background: #f8fafc;" />
                                <input type="hidden" id="CustomerID" value="" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light py-0 px-1.5 text-muted fw-bold" style="font-size: 9.5px;">মোবাইল</span>
                                <input type="text" id="CustomerMobileNumber" readonly class="form-control py-0 px-1.5 fw-bold text-dark" placeholder="মোবাইল" style="font-size: 10.5px; height: 22px; background: #f8fafc;" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light py-0 px-1.5 text-muted fw-bold" style="font-size: 9.5px;">ঠিকানা</span>
                                <input type="text" id="CustomerAddress" readonly class="form-control py-0 px-1.5 text-dark" placeholder="ঠিকানা" style="font-size: 10.5px; height: 22px; background: #f8fafc;" />
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-danger-subtle text-danger py-0 px-1 fw-bold" style="font-size: 9.5px;">বকেয়া</span>
                                <input type="text" id="totalPreviousDueAmount" readonly value="0" class="form-control py-0 px-1 fw-bold text-danger text-center" style="font-size: 10.5px; height: 22px; background: #fff5f5;" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Camera Scan & Barcode Search Bar (Only shown on Mobile/Tablet view < 992px) -->
                <div class="d-block d-lg-none mb-1 p-1.5 bg-white border shadow-sm" style="border-radius: 10px; border-color: #e2e8f0 !important; flex-shrink: 0;">
                    <div class="searchbar d-flex align-items-center gap-2 w-100">
                        <label for="productCodeSearchCart" class="flex-grow-1 mb-0 position-relative">
                            <input type="text" id="productCodeSearchCart"
                                placeholder="🔍 বারকোড স্ক্যান করুন অথবা কোড/নাম লিখুন..."
                                oninput="searchByProductCode(this.value, 'productCodeSearchCart')"
                                onkeydown="handleBarcodeEnterKey(event, this.value)"
                                class="form-control posSearchInput" autocomplete="off" style="border-radius: 8px; height: 36px; font-size: 12px;" />
                            <a href="#" class="search-icon" onclick="triggerBarcodeSearchManual(event, 'productCodeSearchCart')">
                                <svg width="20" height="20" viewBox="0 0 27 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2967 16.9811H18.0695L17.6449 16.5566C19.1578 14.8045 20.0686 12.5274 20.0686 10.0343C20.0686 4.49228 15.5763 0 10.0343 0C4.49228 0 0 4.49228 0 10.0343C0 15.5763 4.49228 20.0686 10.0343 20.0686C12.5274 20.0686 14.8045 19.1578 16.5566 17.6527L16.9811 18.0772V19.2967L24.6998 27L27 24.6998L19.2967 16.9811ZM10.0343 16.9811C6.19811 16.9811 3.08748 13.8705 3.08748 10.0343C3.08748 6.19811 6.19811 3.08748 10.0343 3.08748C13.8705 3.08748 16.9811 6.19811 16.9811 10.0343C16.9811 13.8705 13.8705 16.9811 10.0343 16.9811Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <div id="productCodeSearchCartSuggestions" class="pos-search-suggestions position-absolute start-0 end-0 bg-white border shadow-lg rounded-3 d-none" style="top: 100%; margin-top: 4px; z-index: 1050; max-height: 280px; overflow-y: auto;"></div>
                        </label>
                        <button type="button" class="btn btn-primary fw-bold text-nowrap d-flex align-items-center gap-1.5 shadow-sm px-2.5" onclick="openCameraScanner()" style="border-radius: 8px; height: 36px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; font-size: 12px;">
                            <i class="fa-solid fa-camera fs-6"></i>
                            <span class="d-none d-sm-inline">ক্যামেরা</span>
                        </button>
                    </div>
                </div>

                <!-- Order list table Start (Scrollable Area) -->
                <div class="pos-cart-table-wrapper flex-grow-1 overflow-auto">
                    <table class="table align-middle m-0" style="width: 100%; min-width: 480px;">
                        <thead>
                            <tr>
                                <th style="width: 32%; text-align: left; padding: 6px 8px;">Product</th>
                                <th style="width: 20%; text-align: center; padding: 6px 4px;">Quantity</th>
                                <th style="width: 15%; text-align: center; padding: 6px 4px;">Cost Price</th>
                                <th style="width: 15%; text-align: center; padding: 6px 4px;">Sell Price</th>
                                <th style="width: 12%; text-align: center; padding: 6px 4px;">Sub Total</th>
                                <th style="width: 6%; text-align: center; padding: 6px 4px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- Order list table End -->

                <!-- Sticky Bottom Payment & Confirmation Area -->
                <div id="payment" class="mt-1 pt-1 border-top" style="flex-shrink: 0;">
                    <div class="row g-2 align-items-stretch">
                        <div class="col-lg-6 col-12">
                            <div class="payments">
                                <div class="heading mb-1.5">
                                    <h2 style="font-size: 12px; font-weight: 700; color: #334155; margin: 0;">Payment Method</h2>
                                </div>
                                <form action="#" id="paymentMethodForm">
                                    <div class="category-wrapper">
                                        <div class="category">
                                            <label for="cash" class="cashMethod active">
                                                <input type="radio" name="payment" id="cash" checked style="display: none;" />
                                                <div class="imgName">
                                                    <div class="imgContainer cash">
                                                        <img src="{{ asset('backend/assets/img/payment-cash.png') }}" alt="Cash" />
                                                    </div>
                                                    <h1>Cash</h1>
                                                </div>
                                                <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                            </label>

                                            <label for="bkash" class="bkashMethod">
                                                <input type="radio" name="payment" id="bkash" style="display: none;" />
                                                <div class="imgName">
                                                    <div class="imgContainer bkash">
                                                        <img src="{{ asset('backend/assets/img/payment-bkash.png') }}" alt="bKash" />
                                                    </div>
                                                    <h1>bKash</h1>
                                                </div>
                                                <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                            </label>

                                            <label for="nagad" class="nagadMethod">
                                                <input type="radio" name="payment" id="nagad" style="display: none;" />
                                                <div class="imgName">
                                                    <div class="imgContainer nagad">
                                                        <img src="{{ asset('backend/assets/img/payment-nagad.png') }}" alt="Nagad" />
                                                    </div>
                                                    <h1>Nagad</h1>
                                                </div>
                                                <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                            </label>

                                            <label for="rocket" class="rocketMethod">
                                                <input type="radio" name="payment" id="rocket" style="display: none;" />
                                                <div class="imgName">
                                                    <div class="imgContainer rocket">
                                                        <img src="{{ asset('backend/assets/img/payment-rocket.png') }}" alt="Rocket" />
                                                    </div>
                                                    <h1>Rocket</h1>
                                                </div>
                                                <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                            </label>

                                            <label for="bank" class="bankMethod">
                                                <input type="radio" name="payment" id="bank" style="display: none;" />
                                                <div class="imgName">
                                                    <div class="imgContainer bank">
                                                        <img src="{{ asset('backend/assets/img/payment-bank.png') }}" alt="Bank" />
                                                    </div>
                                                    <h1>Bank</h1>
                                                </div>
                                                <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                            </label>

                                            <label for="mastercard" class="mastercardMethod">
                                                <input type="radio" name="payment" id="mastercard" style="display: none;" />
                                                <div class="imgName">
                                                    <div class="imgContainer mastercard">
                                                        <img src="{{ asset('backend/assets/img/payment-card.png') }}" alt="Card" />
                                                    </div>
                                                    <h1>Card</h1>
                                                </div>
                                                <span class="check"><i class="fa-solid fa-circle-check"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex align-items-center gap-1.5 mt-1">
                                <div class="transaction flex-grow-1">
                                    <input type="text" id="transactionInput" placeholder="Enter Transaction ID" class="w-100" />
                                </div>
                                <div class="transaction flex-grow-1">
                                    <input type="text" id="orderNote" placeholder="Enter Note" class="w-100" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <form id="orderForm">
                                <div class="totals">
                                    <div class="subtotal" style="display: none;">
                                        <span>Total Cost</span>
                                        <span id="totalCost">৳</span>
                                    </div>

                                    <!-- Sub-Total -->
                                    <div class="subtotal d-flex align-items-center justify-content-between py-1 border-bottom border-light">
                                        <span class="fw-bold text-secondary" style="font-size: 12px;">Sub-Total</span>
                                        <span style="color: #0284c7; font-size: 14px; font-weight: 800;" id="subTotal">৳ 0.00</span>
                                    </div>

                                    <!-- Discount Amount -->
                                    <div class="subtotal d-flex align-items-center justify-content-between py-1 border-bottom border-light">
                                        <div class="d-flex align-items-center gap-1.5">
                                            <span class="fw-bold text-secondary" style="font-size: 12px; white-space: nowrap;">Discount</span>
                                            <div class="discount-type-pill d-inline-flex border rounded overflow-hidden" style="border-color: #cbd5e1 !important; height: 22px;">
                                                <input type="radio" name="discountType" id="discountTypeFlat" value="flat" checked onchange="calculateDuePayment()" style="display: none;">
                                                <label for="discountTypeFlat" title="Solid Amount (৳)" style="padding: 1px 7px; font-size: 11px; cursor: pointer; font-weight: 700; margin: 0; line-height: 18px;">৳</label>

                                                <input type="radio" name="discountType" id="discountTypePercent" value="percent" onchange="calculateDuePayment()" style="display: none;">
                                                <label for="discountTypePercent" title="Percentage (%)" style="padding: 1px 7px; font-size: 11px; cursor: pointer; font-weight: 700; margin: 0; line-height: 18px;">%</label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-1">
                                            <span id="discountCalculatedBadge" class="badge bg-success-subtle text-success border border-success-subtle fw-bold" style="font-size: 10px; display: none; padding: 2px 6px;">= ৳ 0</span>
                                            <input type="number" id="discountAmountInput" oninput="calculateDuePayment()" placeholder="0" min="0" step="any" style="width: 78px; height: 26px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 12px; font-weight: 700; text-align: right; padding: 2px 6px; outline: none;">
                                        </div>
                                    </div>

                                    <!-- Return Credit Adjustment (Optional row) -->
                                    <div class="subtotal d-flex align-items-center justify-content-between py-1 border-bottom border-light" id="posReturnAdjRow" style="display: none;">
                                        <span class="d-flex align-items-center gap-1">
                                            <input type="checkbox" id="chkPosReturnAdjRow" onchange="togglePosReturnCreditAdjustment()" class="form-check-input m-0" style="cursor: pointer;">
                                            <span style="color: #0d9488; font-weight: bold; font-size: 11.5px;">Return Adj</span>
                                        </span>
                                        <input type="number" id="posReturnAdjustmentInput" value="0" disabled oninput="calculateDuePayment()" style="width: 78px; height: 26px; border: 1.5px solid #0d9488; border-radius: 6px; color: #0d9488; font-weight: 700; font-size: 12px; text-align: right; padding: 2px 6px;">
                                    </div>

                                    <!-- Paid Amount -->
                                    <div class="subtotal d-flex align-items-center justify-content-between py-1 border-bottom border-light">
                                        <span class="fw-bold text-secondary" style="font-size: 12px;">Paid Amount</span>
                                        <input type="number" id="paidAmountInput" oninput="calculateDuePayment()" placeholder="0" style="width: 78px; height: 26px; border: 1.5px solid #cbd5e1; border-radius: 6px; font-size: 12px; font-weight: 700; text-align: right; padding: 2px 6px; outline: none;">
                                    </div>

                                    <!-- Due Amount -->
                                    <div class="total d-flex align-items-center justify-content-between py-1 border-bottom border-light">
                                        <span class="fw-bold text-danger" style="font-size: 12px;">Due Amount</span>
                                        <span style="color: #dc2626; font-size: 15px; font-weight: 800;" id="totalDuePayable">৳ 0.00</span>
                                    </div>

                                    <!-- Status -->
                                    <div class="total d-flex align-items-center justify-content-between py-1">
                                        <span class="fw-bold text-secondary" style="font-size: 12px;">Status</span>
                                        <span id="paymentStatusDisplay" class="partial-payment-status" style="font-size: 11px; padding: 2px 8px; border-radius: 6px; font-weight: 700;">Partial Paid</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Trending POS Bottom Action Bar -->
                    <div class="pos-bottom-trending-bar">
                        <div class="row g-1.5 align-items-center">
                            <!-- Box 1: Hold Invoice Button & Held Counter -->
                            <div class="col-4">
                                <div class="d-flex gap-1">
                                    <button type="button" onclick="holdCurrentInvoice()" class="btn btn-warning flex-grow-1 py-1.5 d-flex align-items-center justify-content-center gap-1 fw-bold text-dark shadow-sm" style="border-radius: 8px; background: #f59e0b; border: none; font-size: 11.5px;">
                                        <i class="fa-solid fa-pause-circle fs-6"></i>
                                        <span class="d-none d-sm-inline">হোল্ড</span>
                                    </button>
                                    <button type="button" onclick="openHoldInvoicesModal()" class="btn btn-outline-warning py-1.5 px-2 d-flex align-items-center justify-content-center gap-1 fw-bold text-dark" style="border-radius: 8px; font-size: 11px;" title="হোল্ড তালিকা">
                                        <i class="fa-solid fa-folder-open"></i>
                                        <span id="heldInvoicesBadge" class="badge bg-danger rounded-pill">0</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Box 2: Big Sub-Total / Net Payable Card -->
                            <div class="col-4">
                                <div class="py-1 px-1.5 text-center border border-success-subtle bg-success-subtle rounded-2 shadow-xs" style="border-radius: 8px; background-color: #f0fdf4 !important; border-color: #bbf7d0 !important;">
                                    <span class="text-muted d-block small fw-bold text-uppercase" style="font-size: 9px; letter-spacing: 0.3px; line-height: 1;">মোট বিল (SUB-TOTAL)</span>
                                    <span id="bigSubTotalDisplay" class="fw-bolder text-success" style="font-size: 15px; line-height: 1.2;">৳ 0.00</span>
                                </div>
                            </div>

                            <!-- Box 3: Pay / Submit Order Button -->
                            <div class="col-4">
                                <button type="submit" onclick="SavePaymentInfo(event)" class="btn btn-success w-100 py-2 fw-bold text-white shadow" style="border-radius: 8px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none; font-size: 12.5px; letter-spacing: 0.3px;">
                                    <i class="fa-solid fa-paper-plane me-1"></i> সাবমিট অর্ডার
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile/Tablet Floating App Dock Bar (Shown on screens < 992px) -->
                <div class="d-block d-lg-none position-fixed bottom-0 start-50 translate-middle-x w-100 p-2" style="z-index: 1060; max-width: 540px;">
                    <div class="p-2 bg-dark text-white rounded-4 shadow-lg border border-secondary d-flex align-items-center justify-content-between" style="backdrop-filter: blur(14px); background: rgba(15, 23, 42, 0.95) !important;">
                        <div class="d-flex align-items-center gap-2 ps-2">
                            <div class="position-relative">
                                <i class="fa-solid fa-cart-shopping fs-4 text-success"></i>
                                <span id="mobileCartBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">0</span>
                            </div>
                            <div>
                                <span class="d-block text-muted" style="font-size: 10px; line-height: 1;">মোট আইটেম</span>
                                <span id="mobileCartTotal" class="fw-bold text-success" style="font-size: 15px;">৳ 0.00</span>
                            </div>
                        </div>
                        <button type="button" onclick="switchMobilePosTab('cart')" class="btn btn-success fw-bold px-3 py-2 text-nowrap d-flex align-items-center gap-1" style="border-radius: 12px; font-size: 13px; background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">
                            <span>কার্ট দেখুন</span>
                            <i class="fa-solid fa-chevron-right small"></i>
                        </button>
                    </div>
                </div>
            </div> <!-- closes posCartCol -->
        </div> <!-- closes posMainRow -->
    </section>

    <!-- Held Invoices Modal -->
    <div class="modal fade" id="holdInvoicesModal" tabindex="-1" aria-labelledby="holdInvoicesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden; background: #f8fafc;">
                <div class="modal-header py-3 px-4" style="background: linear-gradient(135deg, #fef3c7 0%, #fffbe6 100%); border-bottom: 2px solid #fde047;">
                    <h5 class="modal-title fw-bold text-dark m-0 d-flex align-items-center gap-2" id="holdInvoicesModalLabel">
                        <i class="fa-solid fa-pause-circle text-warning fs-3"></i>
                        <span>হোল্ডকৃত ইনভয়েস তালিকা (Hold Invoices)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3" style="max-height: 480px; overflow-y: auto;">
                    <div id="heldInvoicesCardList">
                        <!-- Dynamically loaded modern cards -->
                    </div>
                </div>
                <div class="modal-footer bg-white py-2 px-3 justify-content-between border-top">
                    <span class="text-muted small"><i class="fa-solid fa-circle-info me-1 text-info"></i> যেকোনো সময় 'লোড করুন' চেপে ড্রাফট ইনভয়েসটি স্ক্রিনে লোড করতে পারবেন।</span>
                    <button type="button" class="btn btn-secondary px-4 fw-bold shadow-sm" data-bs-dismiss="modal" style="border-radius: 10px;">বন্ধ করুন</button>
                </div>
            </div>
        </div>
    </div>



    {{-- Customer Create Modal Start --}}
    @include('backend.customer.customer-create')
    {{-- Customer Create Modal End --}}

    <script>
        function openCustomerModal() {
            const modal = document.getElementById("createProduct");
            if (modal) {
                modal.style.display = "block";
                document.documentElement.style.overflowY = "hidden";
            }
        }

        // Save brand function
        async function LocationSave(event) {
            event.preventDefault();

            try {
                const LocationName = document.getElementById('LocationName').value;
                const SelectStatus = document.getElementById('SelectStatus').value;

                // Validation
                if (!LocationName) {
                    errorToast("Location Name is required!");
                    return;
                }
                if (!SelectStatus) {
                    errorToast("Select Status is required!");
                    return;
                }

                // Prepare form data
                const formData = new FormData();
                formData.append('name', LocationName);
                formData.append('status', SelectStatus);

                const config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken().headers,
                    },
                };

                // API call to save brand
                const res = await axios.post("/api/create-location", formData, config);

                if (res.data.status === "success") {
                    successToast(res.data.message);

                    // Clear the form and close the modal
                    document.getElementById('LocationName').value = '';
                    closeBrandModal();

                    // Refresh the dropdown and select the newly created brand
                    await refreshCustomerList(res.data.newLocationId);
                } else {
                    errorToast(res.data.message);
                }
            } catch (e) {
                unauthorized(e.response?.status || 500);
            }
        }

        // Refresh location list and optionally select the newly added location
        async function refreshCustomerList(selectedLocationId = null) {
            try {
                const res = await axios.get("/api/location-list", HeaderToken());
                const Location = res.data.LocationData;

                const optionsHtmlLocation = Location.map(location =>
                    `<option value="${location.id}" ${selectedLocationId == location.id ? 'selected' : ''}>${location.name}</option>`
                ).join('');

                document.getElementById("CustomerLocation").innerHTML =
                    `<option value="none" selected>Select Location</option>` + optionsHtmlLocation;
            } catch (error) {
                console.error("Error occurred while fetching location:", error);
            }
        }

        // Modal handling (open/close)
        function closeBrandModal() {
            document.getElementById('addBrandModal').style.display = 'none';
        }

        function openBrandModal() {
            document.getElementById('addBrandModal').style.display = 'block';
        }

        // Trigger modal open/close
        // Trigger modal open/close
        document.querySelector('.newbrand-open').addEventListener('click', openBrandModal);
        document.querySelectorAll('.newbrand-close').forEach(btn =>
            btn.addEventListener('click', closeBrandModal)
        );


        // Initial brand list fetch
        refreshCustomerList();
    </script>


    <script>
        DistrictTypeData();
        async function DistrictTypeData() {
            try {
                let res = await axios.get("/api/district-list", HeaderToken());
                let optionsHtml = res.data.DistrictData.map(District =>
                    `<option value="${District.id}">${District.district_name}</option>`).join('');
                $("#DistrictSelectData").html(`<option value="none" selected>Select District</option>` + optionsHtml);
            } catch (error) {
                console.error("Error fetching districts:", error);
            }
        }
    </script>

    <script>
        async function CustomerTypeData() {
            try {
                const res = await axios.get("/api/customer-list", HeaderToken());
                const customerOptions = res.data.CustomerData.map((customer) => {
                    const activeDue = customer.total_due !== undefined ? customer.total_due : customer.previous_due_amount;
                    return `
                    <div class="dropdown-item"
                        data-id="${customer.id}"
                        data-name="${customer.customer_name}"
                        data-mobile="${customer.mobile}"
                        data-address_details="${customer.address_details}"
                        data-previous_due_amount="${activeDue}"
                        data-return_credit_balance="${customer.return_credit_balance || 0}">
                        ${customer.customer_id} - ${customer.customer_name} (${customer.mobile}) ${activeDue > 0 ? `<span class="badge bg-danger ms-1">বকেয়া: ৳${activeDue}</span>` : ''} ${customer.return_credit_balance > 0 ? `<span class="badge bg-teal ms-1" style="background:#0d9488;">🎁 ৳${customer.return_credit_balance} Credit</span>` : ''}
                    </div>`;
                }).join('');
                document.getElementById("CustomerSelectData").innerHTML = customerOptions;
            } catch (error) {
                console.error("Error fetching Customer:", error);
            }
        }

        CustomerTypeData();
    </script>




    <!-- Link Swiper's JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script>
        async function userlogout(event) {
            event.preventDefault(); // Prevent the default link behavior

            try {
                // Make sure HeaderToken() returns a valid authorization header
                let res = await axios.get("/naxus-pos-logout", HeaderToken());

                // Clear localStorage and sessionStorage
                localStorage.clear();
                sessionStorage.clear();

                // Redirect the user to the login page after successful logout
                window.location.href = "/admin-login-page";
            } catch (e) {
                // Handle error and show error message using errorToast
                console.error("Logout error:", e);
                errorToast(e.response ? e.response.data.message : "Something went wrong");
            }
        }
    </script>

    <script>
        // Function to set today's date as the default and keep it unchanged
        // Get today's date in the format YYYY-MM-DD
        const today = new Date().toISOString().split('T')[0];

        // Set the value of the date input to today's date
        document.getElementById('CustomerDate').value = today;
    </script>

    {{-- <script>
    // Disable right-click
    document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
    });

    // Disable F12 and Ctrl+Shift+I (Developer Tools)
    document.addEventListener('keydown', function (e) {
      if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
        e.preventDefault();
      }
    });
  </script> --}}



    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/js/fontawesome.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pos-product-slider.js') }}"></script>
    <script src="{{ asset('backend/assets/js/orderlist-table-qty.js') }}"></script>
    <script src="{{ asset('backend/assets/js/full-screen-toggle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pos-payment-methode-click.js') }}"></script>
    <script src="{{ asset('backend/assets/js/all-modals.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous"></script>
    <script src="{{ asset('backend/assets/js/style.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Include jQuery from a CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .partial-payment-status {
            color: orange;
        }

        .fully-paid-status {
            color: green;
        }

        .unpaid-status {
            color: red;
        }
    </style>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdown = document.querySelector(".select-box-dropdown");
            const dropdownSelected = dropdown.querySelector(".select-dropdown-selected");
            const dropdownItems = dropdown.querySelector(".select-dropdown-items");
            const searchBox = dropdown.querySelector(".select-search-box");
            const customerSelectData = document.getElementById("CustomerSelectData");
            const icon = dropdown.querySelector(".icon i");

            const customerNameField = document.getElementById("CustomerName");
            const customerIDField = document.getElementById("CustomerID"); // Hidden field
            const customerMobileField = document.getElementById("CustomerMobileNumber");
            const customerAddressField = document.getElementById("CustomerAddress");
            const customerPreviousDueField = document.getElementById("totalPreviousDueAmount"); // New field for previous due amount

            // Toggle dropdown visibility
            dropdownSelected.addEventListener("click", function(e) {
                e.stopPropagation();
                dropdownItems.classList.toggle("show");
                searchBox.style.display = dropdownItems.classList.contains("show") ? "block" : "none";

                // Rotate icon
                icon.classList.toggle("fa-angle-up");
                icon.classList.toggle("fa-angle-down");
            });

            // Close dropdown if clicked outside
            document.addEventListener("click", function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdownItems.classList.remove("show");
                    searchBox.style.display = "none";
                    icon.classList.remove("fa-angle-up");
                    icon.classList.add("fa-angle-down");
                }
            });

            // Filter dropdown items based on search input
            searchBox.addEventListener("input", function() {
                const filter = searchBox.value.toLowerCase();
                const items = customerSelectData.querySelectorAll(".dropdown-item");

                items.forEach(function(item) {
                    const text = item.textContent.toLowerCase();
                    item.style.display = text.includes(filter) ? "block" : "none";
                });
            });

            // Handle dropdown item selection
            customerSelectData.addEventListener("click", function(e) {
                const selectedItem = e.target.closest(".dropdown-item");
                if (selectedItem) {
                    const customerId = selectedItem.getAttribute("data-id");
                    const customerName = selectedItem.getAttribute("data-name");
                    const customerMobile = selectedItem.getAttribute("data-mobile");
                    const customerAddress = selectedItem.getAttribute("data-address_details");
                    const customerPreviousDue = selectedItem.getAttribute("data-previous_due_amount");
                    const returnCreditBalance = parseFloat(selectedItem.getAttribute("data-return_credit_balance") || 0);

                    // Update selected display
                    dropdownSelected.querySelector("span").textContent = `${customerId} - ${customerName} (${customerMobile})`;

                    // Populate fields with selected customer data
                    customerNameField.value = customerName;
                    customerIDField.value = customerId;
                    customerMobileField.value = customerMobile;
                    customerAddressField.value = customerAddress;
                    customerPreviousDueField.value = customerPreviousDue || 0;

                    // Handle Return Credit Notice & Controls
                    const noticeBanner = document.getElementById("customerReturnCreditNotice");
                    const returnCreditValEl = document.getElementById("posReturnCreditVal");
                    const chkTop = document.getElementById("chkUseReturnCredit");
                    const chkRow = document.getElementById("chkPosReturnAdjRow");
                    const rowContainer = document.getElementById("posReturnAdjRow");
                    const adjInput = document.getElementById("posReturnAdjustmentInput");

                    if (returnCreditBalance > 0) {
                        returnCreditValEl.textContent = returnCreditBalance.toFixed(2);
                        noticeBanner.classList.remove("d-none");
                        noticeBanner.classList.add("d-flex");
                        rowContainer.style.display = "flex";

                        // Default to unchecked so users are not forced to adjust
                        chkTop.checked = false;
                        if (chkRow) chkRow.checked = false;
                        adjInput.disabled = true;
                        adjInput.value = returnCreditBalance.toFixed(2);
                    } else {
                        noticeBanner.classList.remove("d-flex");
                        noticeBanner.classList.add("d-none");
                        rowContainer.style.display = "none";
                        chkTop.checked = false;
                        if (chkRow) chkRow.checked = false;
                        adjInput.disabled = true;
                        adjInput.value = "0.00";
                    }

                    calculateDuePayment();

                    // Close dropdown
                    dropdownItems.classList.remove("show");
                    searchBox.style.display = "none";
                    icon.classList.remove("fa-angle-up");
                    icon.classList.add("fa-angle-down");
                }
            });
        });
    </script>



    <script>
        let allProducts = [];
        let cartItems = [];
        async function ProductBrandData() {
            try {
                const res = await axios.get("/api/product-brand-data-show", HeaderToken());
                $("#ProductCategoryData").empty();

                // Add "All Brands" Option
                const allBrand = `
                    <div class="swiper-slide brand-card active" data-id="0" onclick="loadProductsByBrand(0)">
                        <span class="brand-name">All Brands</span>
                    </div>
                `;

                $("#ProductCategoryData").append(allBrand);

                const brands = res.data['GetBrandData'] || [];
                brands.forEach((brand) => {
                    const brandCard = `
                        <div class="swiper-slide brand-card" data-id="${brand.id}" onclick="loadProductsByBrand(${brand.id})">
                            <span class="brand-name">${brand.name}</span>
                        </div>
                    `;
                    $("#ProductCategoryData").append(brandCard);
                });

                // Re-initialize or update Swiper slider
                if (typeof initPosSwiper === 'function') {
                    initPosSwiper();
                } else if (window.posSwiper && typeof window.posSwiper.update === 'function') {
                    window.posSwiper.update();
                }

                loadProductsByBrand(0); // Load All Products Initially
            } catch (error) {
                console.error("Error loading product brands:", error);
            }
        }


        window.onload = function() {
            document.getElementById("productCodeSearch").focus();
        };



        // Load Products By Brand
        async function loadProductsByBrand(brandId) {
            try {
                // Toggle active brand styling
                $('#ProductCategoryData .swiper-slide').removeClass('active active-brand');
                $(`#ProductCategoryData .swiper-slide[data-id="${brandId}"]`).addClass('active active-brand');

                const res = await axios.get("/api/brand-wish-product-data-show", {
                    ...HeaderToken(),
                    params: {
                        brand_id: brandId
                    },
                });

                allProducts = res.data['ProductFrontData'] || [];
                renderProducts(allProducts);
            } catch (error) {
                console.error("Error loading products:", error);
            }
        }

        function renderProducts(products, limit = 25) {
            $("#ProductCategoryWishDataItem").empty();
            if (!products || !products.length) {
                $("#ProductCategoryWishDataItem").html('<div class="col-12 text-center text-muted p-4 fw-bold">❌ কোনো পণ্য পাওয়া যায়নি।</div>');
                return;
            }

            const displayedProducts = products.slice(0, limit);
            displayedProducts.forEach((product) => {
                // Check if product image exists, else use default image
                const productImage = product.img_url ? product.img_url :
                    "{{ asset('backend/assets/img/product-img.svg') }}";

                const isOutOfStock = (product.quantity <= 0);
                const stockBadgeClass = isOutOfStock ? 'out-of-stock' : '';
                const doorBadge = product.door_side ? `<span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 10px; border-radius: 6px; padding: 2px 6px;"><i class="fa-solid fa-door-open me-1"></i>${product.door_side}</span>` : '';

                const productCard = `
            <div class="col-xl-3 col-md-4 col-6 d-flex align-items-stretch">
                <a href="javascript:void(0)" class="card-wrapper" onclick="addProductToCart(${product.id})">
                    <div class="product-price ${stockBadgeClass} d-flex align-items-center justify-content-between">
                       <div class="d-flex flex-column">
                         <h1 class="fw-bold text-success m-0" style="font-size:13px;">৳ ${product.sell_price}</h1>
                         <h1 class="cost-price-hidden small text-danger m-0" style="font-size:10px;">Cost: ৳ ${product.cost_price}</h1>
                       </div>
                       <span class="badge ${isOutOfStock ? 'bg-danger-subtle text-danger border-danger' : 'bg-success-subtle text-success border-success'} fw-bold" style="font-size: 11px; border-radius: 12px; padding: 2px 8px;">
                           ${product.quantity} Pcs
                       </span>
                    </div>
                    <div class="product-name-area flex-grow-1 d-flex align-items-center my-1">
                        <h2 class="name product-main-title m-0">${product.product_name}</h2>
                    </div>
                    <div class="drescription d-flex align-items-center justify-content-between flex-wrap gap-1 mt-auto pt-1">
                        <span class="product-id m-0">${formatProductCode(product.product_code)}</span>
                        ${doorBadge}
                    </div>
                </a>
            </div>
        `;
                $("#ProductCategoryWishDataItem").append(productCard);
            });

            if (products.length > limit) {
                const remaining = products.length - limit;
                const loadMoreBtn = `
                    <div class="col-12 text-center my-3" id="loadMoreProductsContainer">
                        <button type="button" class="btn btn-outline-success fw-bold px-4 py-2 shadow-sm" onclick="renderProducts(allProducts, ${limit + 25})" style="border-radius: 20px; font-size: 13px;">
                            <i class="fa-solid fa-plus-circle me-1"></i> আরও ২৫টি পণ্য দেখুন (বাকি ${remaining}টি)
                        </button>
                    </div>
                `;
                $("#ProductCategoryWishDataItem").append(loadMoreBtn);
            }
        }
        // Web Audio API Beep Sound Generator
        function playScanBeepSound() {
            try {
                const AudioCtx = window.AudioContext || window.webkitAudioContext;
                if (!AudioCtx) return;
                const ctx = new AudioCtx();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.type = "sine";
                osc.frequency.setValueAtTime(1200, ctx.currentTime); // High pitch beep
                gain.gain.setValueAtTime(0.18, ctx.currentTime);
                gain.gain.exponentialRampToValueAtTime(0.00001, ctx.currentTime + 0.1);
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.start();
                osc.stop(ctx.currentTime + 0.1);
            } catch (e) {}
        }

        // Barcode Matcher Helper (Handles JSON array strings or plain code)
        function isExactBarcodeMatch(product, searchVal) {
            if (!product || !product.product_code || !searchVal) return false;
            const cleanSearch = String(searchVal).trim().toLowerCase();
            let codes = [];
            try {
                const parsed = JSON.parse(product.product_code);
                codes = Array.isArray(parsed) ? parsed : [product.product_code];
            } catch (e) {
                codes = [product.product_code];
            }
            return codes.some(c => String(c).trim().toLowerCase() === cleanSearch);
        }



        // Reset Search Input & Refocus
        function resetAndFocusSearchBox() {
            const input1 = document.getElementById("productCodeSearch");
            const input2 = document.getElementById("productCodeSearchCart");
            if (input1) input1.value = "";
            if (input2) input2.value = "";
            const active = input1 && document.activeElement === input1 ? input1 : (input2 || input1);
            if (active) active.focus();
            renderProducts(allProducts);
        }

        // Add Product to Cart with Auto-Increment & Barcode Scan Support
        function addProductToCart(productId, isFromBarcodeScan = false) {
            const product = allProducts.find((p) => p.id === productId);

            if (!product) {
                Swal.fire({
                    icon: 'error',
                    title: 'পণ্য পাওয়া যায়নি',
                    text: 'প্রোডাক্টটি সিস্টেমে খুঁজে পাওয়া যায়নি।',
                    confirmButtonColor: '#15803d'
                });
                if (isFromBarcodeScan) resetAndFocusSearchBox();
                return;
            }

            const existingIndex = cartItems.findIndex((item) => item.id === productId);

            if (existingIndex !== -1) {
                // Product already in cart -> Auto increment quantity!
                const cartItem = cartItems[existingIndex];
                cartItem.quantity++;
                const quantityInput = document.getElementById(`quantity-${existingIndex}`);
                if (quantityInput) quantityInput.value = cartItem.quantity;
                updateTotal();
                playScanBeepSound();
                if (typeof successToast === 'function') {
                    successToast(`✅ "${product.product_name}" এর পরিমাণ বাড়িয়ে ${cartItem.quantity} Pcs করা হয়েছে।`);
                }
            } else {
                // Add new product to cart
                cartItems.push({
                    id: product.id,
                    product_name: product.product_name,
                    door_side: product.door_side || '',
                    cost_price: product.cost_price,
                    sell_price: product.sell_price,
                    price: product.price || 0,
                    quantity: 1,
                    sellingPrice: product.sell_price,
                });

                renderCart();
                playScanBeepSound();
                if (typeof successToast === 'function') {
                    successToast(`🛒 "${product.product_name}" কার্টে যুক্ত করা হয়েছে।`);
                }
            }

            if (isFromBarcodeScan) {
                resetAndFocusSearchBox();
            }
        }

        // Search by Product Code or Product Name & Instant Barcode Scan Auto-Add
        function searchByProductCode(searchValue, activeInputId = 'productCodeSearch') {
            const cleanValue = searchValue.trim().toLowerCase();

            if (!cleanValue) {
                $(".pos-search-suggestions").addClass("d-none").empty();
                renderProducts(allProducts);
                return;
            }

            // Check 1: Instant Exact Barcode Match for Scanners
            const exactMatch = allProducts.find((p) => isExactBarcodeMatch(p, cleanValue));
            if (exactMatch) {
                $(".pos-search-suggestions").addClass("d-none").empty();
                addProductToCart(exactMatch.id, true);
                return;
            }

            // Check 2: Filter matching products by code substring, product name, category name, or door side
            const matchingProducts = allProducts.filter((product) => {
                let codesStr = "";
                try {
                    const parsed = JSON.parse(product.product_code);
                    codesStr = Array.isArray(parsed) ? parsed.join(" ") : String(product.product_code);
                } catch (e) {
                    codesStr = String(product.product_code);
                }

                const categoryName = product.category ? (product.category.category_name || product.category.name || "") : "";
                const doorSideStr = product.door_side || "";

                return (
                    codesStr.toLowerCase().includes(cleanValue) ||
                    product.product_name.toLowerCase().includes(cleanValue) ||
                    categoryName.toLowerCase().includes(cleanValue) ||
                    doorSideStr.toLowerCase().includes(cleanValue)
                );
            });

            renderProducts(matchingProducts);
            renderSearchSuggestions(matchingProducts, activeInputId);
        }

        // Render Live Autocomplete Search Suggestions Dropdown
        function renderSearchSuggestions(matchingProducts, activeInputId) {
            $(".pos-search-suggestions").addClass("d-none").empty();

            if (!activeInputId || !matchingProducts || matchingProducts.length === 0) {
                return;
            }

            const suggestionsBoxId = activeInputId + "Suggestions";
            const suggestionsBox = $("#" + suggestionsBoxId);

            if (!suggestionsBox.length) return;

            let itemsHtml = `<div class="list-group list-group-flush border-0">`;
            const topMatches = matchingProducts.slice(0, 8);

            topMatches.forEach((product) => {
                const productImage = product.img_url ? product.img_url : "{{ asset('backend/assets/img/product-img.svg') }}";
                const isOutOfStock = (product.quantity <= 0);
                const codeText = formatProductCode(product.product_code);
                const categoryName = product.category ? (product.category.category_name || product.category.name || "") : "";
                const categoryBadge = categoryName ? `<span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold" style="font-size: 10px; border-radius: 6px; padding: 2px 5px;"><i class="fa-solid fa-folder me-1"></i>${categoryName}</span>` : "";
                const doorSideBadge = product.door_side ? `<span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold" style="font-size: 10px; border-radius: 6px; padding: 2px 5px;"><i class="fa-solid fa-door-open me-1"></i>${product.door_side}</span>` : "";

                itemsHtml += `
            <a href="javascript:void(0)" 
               class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-2 border-bottom hover-bg-light"
               onclick="selectProductFromSuggestion(${product.id})">
                <div class="d-flex align-items-center gap-2 overflow-hidden me-2">
                    <img src="${productImage}" alt="${product.product_name}" style="width: 38px; height: 38px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0; flex-shrink: 0;" />
                    <div class="text-truncate">
                        <div class="d-flex align-items-center gap-1 flex-wrap">
                            <span class="fw-bold text-dark text-truncate" style="font-size: 13px;">${product.product_name}</span>
                            ${doorSideBadge}
                            ${categoryBadge}
                        </div>
                        <div class="text-muted small text-truncate" style="font-size: 11px;">কোড: <span class="fw-semibold text-secondary">${codeText}</span></div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-shrink-0 text-end">
                    <span class="badge ${isOutOfStock ? 'bg-danger-subtle text-danger border-danger' : 'bg-success-subtle text-success border-success'} border fw-bold" style="font-size: 10px; border-radius: 12px; padding: 3px 6px;">
                        ${product.quantity} Pcs
                    </span>
                    <span class="fw-bold text-success" style="font-size: 13px; min-width: 55px;">৳ ${product.sell_price}</span>
                    <button type="button" class="btn btn-sm btn-success fw-bold py-1 px-2 shadow-sm" style="font-size: 11px; border-radius: 6px;" onclick="event.stopPropagation(); selectProductFromSuggestion(${product.id});">
                        + যোগ
                    </button>
                </div>
            </a>
        `;
            });

            if (matchingProducts.length > 8) {
                itemsHtml += `
            <div class="p-2 text-center text-muted small bg-light fw-bold" style="font-size: 11px;">
                💡 মোট ${matchingProducts.length} টি পণ্য পাওয়া গেছে
            </div>
        `;
            }

            itemsHtml += `</div>`;
            suggestionsBox.html(itemsHtml).removeClass("d-none");
        }

        function selectProductFromSuggestion(productId) {
            addProductToCart(productId);
            $(".pos-search-suggestions").addClass("d-none").empty();
            resetAndFocusSearchBox();
        }

        // Close suggestion dropdown when clicking outside
        $(document).on("click", function(e) {
            if (!$(e.target).closest(".searchbar").length) {
                $(".pos-search-suggestions").addClass("d-none");
            }
        });

        $(document).on("focus", ".posSearchInput", function() {
            if (this.value.trim()) {
                searchByProductCode(this.value, this.id);
            }
        });

        // Handle Barcode Scanner Gun Enter Key Event
        function handleBarcodeEnterKey(event, searchValue) {
            if (event.key === "Enter" || event.keyCode === 13) {
                event.preventDefault();
                const cleanValue = searchValue.trim();
                if (!cleanValue) return;

                // Check exact match
                const exactMatch = allProducts.find((p) => isExactBarcodeMatch(p, cleanValue));
                if (exactMatch) {
                    addProductToCart(exactMatch.id, true);
                    return;
                }

                // Check single filter match
                const matchingProducts = allProducts.filter((p) => {
                    let codesStr = "";
                    try {
                        const parsed = JSON.parse(p.product_code);
                        codesStr = Array.isArray(parsed) ? parsed.join(" ") : String(p.product_code);
                    } catch (e) {
                        codesStr = String(p.product_code);
                    }
                    return (
                        codesStr.toLowerCase().includes(cleanValue.toLowerCase()) ||
                        p.product_name.toLowerCase().includes(cleanValue.toLowerCase())
                    );
                });

                if (matchingProducts.length === 1) {
                    addProductToCart(matchingProducts[0].id, true);
                } else if (matchingProducts.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'পণ্য পাওয়া যায়নি',
                        text: `"${cleanValue}" কোডের কোনো প্রোডাক্ট খুঁজে পাওয়া যায়নি।`,
                        confirmButtonColor: '#15803d'
                    });
                    resetAndFocusSearchBox();
                }
            }
        }

        function triggerBarcodeSearchManual(event, inputId = 'productCodeSearch') {
            if (event) event.preventDefault();
            const input = document.getElementById(inputId) || document.getElementById("productCodeSearch") || document.getElementById("productCodeSearchCart");
            const val = input?.value || "";
            handleBarcodeEnterKey({
                key: "Enter",
                preventDefault: () => {}
            }, val);
        }



        // Helper function to format Product Code (if it's a JSON array)
        function formatProductCode(productCode) {
            try {
                // If it's a valid JSON array string
                if (Array.isArray(JSON.parse(productCode))) {
                    return JSON.parse(productCode).join(', ');
                }
            } catch (e) {
                // If not an array, just return the code as it is
                return productCode;
            }
            return productCode;
        }


        function formatProductCode(productCode) {
            try {
                // If it's a valid JSON array string
                if (Array.isArray(JSON.parse(productCode))) {
                    return JSON.parse(productCode).join(', ');
                }
            } catch (e) {
                // If not an array, just return the code as it is
                return productCode;
            }
            return productCode;
        }




        let subTotal = 0; // This will be calculated based on the cart items
        let paidAmount = 0; // This will be the amount paid by the user

        // Function to render the cart and update subTotal
        function renderCart() {
            const tableBody = document.querySelector("table tbody");
            tableBody.innerHTML = ""; // Clear Table Before Re-Rendering
            let totalCost = 0;
            subTotal = 0; // Reset Sub Total
            // <span class="quantity">${item.quantity}</span>
            cartItems.forEach((item, index) => {
                const doorTag = item.door_side ? `<span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold d-inline-flex align-items-center gap-1 mt-1" style="font-size: 9px; padding: 1px 5px; border-radius: 4px;"><i class="fa-solid fa-door-open" style="font-size: 8px;"></i> ${item.door_side}</span>` : '';
                const row = `
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 6px 8px; vertical-align: middle; text-align: left;">
                      <div class="d-flex flex-column align-items-start">
                        <span class="fw-bold text-dark cart-item-title" style="font-size: 11.5px; line-height: 1.25; word-break: break-word;" title="${item.product_name}">${item.product_name}</span>
                        ${doorTag}
                      </div>
                    </td>
                    <td style="padding: 6px 4px; vertical-align: middle; text-align: center;">
                        <div class="quantity-controls" style="display: inline-flex; align-items: center; justify-content: space-between; border: 1.5px solid #cbd5e1; border-radius: 6px; background: #f8fafc; padding: 2px; width: 84px; height: 26px; position: relative; z-index: 10;">
                            <button type="button" onclick="decreaseQuantity(${index})" style="width: 22px; height: 22px; min-width: 22px; border-radius: 4px; border: none; background: #ffffff; color: #0f172a; font-weight: 800; font-size: 13px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.1); margin: 0; padding: 0;">-</button>
                            <input
                                type="number"
                                step="any" 
                                style="width: 30px; background: transparent; border: none; text-align: center; font-weight: 700; font-size: 11px; color: #0f172a; padding: 0; outline: none; margin: 0;"
                                value="${item.quantity}"
                                class="quantity"
                                id="quantity-${index}"
                                oninput="updateQuantity(${index}, this)"
                            />
                            <button type="button" onclick="increaseQuantity(${index})" style="width: 22px; height: 22px; min-width: 22px; border-radius: 4px; border: none; background: #ffffff; color: #0f172a; font-weight: 800; font-size: 13px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 1px 2px rgba(0,0,0,0.1); margin: 0; padding: 0;">+</button>
                        </div>
                    </td>
                    <td style="padding: 6px 4px; vertical-align: middle; text-align: center;">
                        <div class="cost-price-wrapper" style="position: relative; z-index: 1; display: inline-block;">
                            <span class="cost-price-placeholder badge bg-light text-muted border px-1.5 py-1" style="font-size: 9.5px; cursor: pointer;">🔒 ***</span>
                            <input
                                class="price cost-price-input"
                                type="number"
                                step="any"
                                value="${item.cost_price}"
                                id="cost_price-${item.id}"
                                oninput="updateCostPrice(${item.id}, this)"
                                style="color: #dc2626 !important; font-weight: 800 !important; width: 58px; height: 26px; font-size: 11px; border-radius: 6px;"
                            />
                        </div>
                    </td>
                    <td style="padding: 6px 4px; vertical-align: middle; text-align: center;">
                        <input
                            class="price"
                            type="number"
                            step="any"
                            value="${item.sellingPrice}"
                            id="sellingPrice-${item.id}"
                            oninput="updateSellingPrice(${item.id}, this)"
                            style="width: 60px; height: 26px; font-size: 11px; border-radius: 6px; border: 1.5px solid #cbd5e1; text-align: center; font-weight: 700; color: #15803d; outline: none; padding: 1px 2px;"
                        />
                    </td>
                    <td id="total-${item.id}" style="padding: 6px 4px; vertical-align: middle; text-align: center; font-weight: 800; font-size: 11.5px; color: #0f172a;">
                        ${(item.sellingPrice * item.quantity).toFixed(2)}
                    </td>
                    <td style="padding: 6px 4px; vertical-align: middle; text-align: center;">
                        <button type="button" onclick="removeProduct(${item.id})" class="btn-cart-delete" title="রিমুভ করুন">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
                `;
                tableBody.insertAdjacentHTML("beforeend", row);
                // totalCost += item.price * item.quantity;
                // subTotal += item.sellingPrice; // Add sellingPrice to subTotal



                // Calculate total cost using quantity and price
                totalCost += item.price * item.quantity;

                // Calculate subTotal using sellingPrice and quantity
                subTotal += item.sellingPrice * item.quantity; // Adjusted this part to account for quantity



            });

            document.getElementById("totalCost").innerText = `৳ ${totalCost.toFixed(2)}`;
            document.getElementById("subTotal").innerText = `৳ ${subTotal.toFixed(2)}`;

            // Sync Mobile & Tablet Badges
            if (document.getElementById("mobileTabBadge")) document.getElementById("mobileTabBadge").innerText = cartItems.length;
            if (document.getElementById("mobileCartBadge")) document.getElementById("mobileCartBadge").innerText = cartItems.length;
            if (document.getElementById("mobileCartTotal")) document.getElementById("mobileCartTotal").innerText = `৳ ${subTotal.toFixed(2)}`;

            calculateDuePayment(); // Update Due Amount and Status after rendering cart
        }

        // Mobile/Tablet POS Tab Switcher Function
        function switchMobilePosTab(tabName) {
            const productsCol = document.querySelector("#pos-main > div.row > div:first-child");
            const cartCol = document.querySelector("#pos-main > div.row > div:last-child");
            const tabProdBtn = document.getElementById("tab-products-btn");
            const tabCartBtn = document.getElementById("tab-cart-btn");

            if (tabName === 'products') {
                if (productsCol) productsCol.style.display = "block";
                if (cartCol && window.innerWidth < 992) cartCol.style.display = "none";
                if (tabProdBtn) tabProdBtn.classList.add("active");
                if (tabCartBtn) tabCartBtn.classList.remove("active");
            } else {
                if (productsCol && window.innerWidth < 992) productsCol.style.display = "none";
                if (cartCol) {
                    cartCol.style.display = "block";
                    cartCol.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
                if (tabCartBtn) tabCartBtn.classList.add("active");
                if (tabProdBtn) tabProdBtn.classList.remove("active");
            }
        }

        //         // Function to increase quantity
        //         function increaseQuantity(index) {
        //             const item = cartItems[index];
        //             const product = allProducts.find(p => p.id === item.id); // Find the original product data

        //             // Check if the product exists and the quantity does not exceed available stock
        //             if (product.quantity > item.quantity) {
        //                 cartItems[index].quantity++;
        //                 renderCart(); // Re-render cart to reflect updated quantity
        //             } else {
        //                 alert(`You cannot add more than ${product.quantity} items of "${product.product_name}".`);
        //                 sendErrorSms(`Attempted to add more than ${product.quantity} items of "${product.product_name}".`);
        //             }
        //         }

        //         // Function to decrease quantity
        // function decreaseQuantity(index) {
        //     let quantityElement = document.querySelectorAll('.quantity')[index];

        //     if (cartItems[index].quantity > 1) {
        //         cartItems[index].quantity--;
        //         quantityElement.textContent = cartItems[index].quantity; // Update UI directly
        //     } else {
        //         alert("Quantity cannot be less than 1");
        //     }
        // }

        function decreaseQuantity(index) {
            if (cartItems[index].quantity > 1) {
                cartItems[index].quantity--;

                const quantityInput = document.getElementById(`quantity-${index}`);
                if (quantityInput) {
                    quantityInput.value = cartItems[index].quantity;
                }

                updateTotal();
            } else {
                Swal.fire({
                    icon: 'info',
                    title: 'সর্বনিম্ন পরিমাণ',
                    text: 'কুয়ান্টিটি ১ এর কম হওয়া সম্ভব নয়। পণ্য বাদ দিতে ডিলিট বাটনে চাপুন।',
                    confirmButtonColor: '#15803d'
                });
            }
        }

        function increaseQuantity(index) {
            cartItems[index].quantity++;
            const quantityInput = document.getElementById(`quantity-${index}`);
            if (quantityInput) {
                quantityInput.value = cartItems[index].quantity;
            }
            updateTotal();
        }

        function updateQuantity(index, input) {
            let newQuantity = parseFloat(input.value);
            if (isNaN(newQuantity) || newQuantity <= 0) {
                return;
            }
            cartItems[index].quantity = newQuantity;
            updateTotal();
        }

        // Function to update total and subtotal
        function updateTotal() {
            let currentSubTotal = 0;

            cartItems.forEach(item => {
                let rowTotal = item.sellingPrice * item.quantity;
                currentSubTotal += rowTotal;

                const rowTotalCell = document.getElementById(`total-${item.id}`);
                if (rowTotalCell) {
                    // সাবটোটাল দশমিক ২ ঘর পর্যন্ত দেখাবে
                    rowTotalCell.textContent = rowTotal.toFixed(2);
                }
            });

            document.getElementById("subTotal").textContent = `৳ ${currentSubTotal.toFixed(2)}`;
            calculateDuePayment();
        }

        // Update Selling Price
        // function updateSellingPrice(productId, inputField) {
        //     const item = cartItems.find((item) => item.id === productId);
        //     if (item) {
        //         item.sellingPrice = parseFloat(inputField.value) || 0;

        //         // Save the currently focused input's ID
        //         const focusedInputId = inputField.id;

        //         // Re-render the cart
        //         renderCart();

        //         // Restore focus and caret position
        //         const restoredInput = document.getElementById(focusedInputId);
        //         if (restoredInput) {
        //             restoredInput.focus();

        //             // Move caret to the end of the input value
        //             const value = restoredInput.value;
        //             restoredInput.value = ""; // Temporarily clear value
        //             restoredInput.value = value; // Reset to original value
        //         }
        //     }
        // }

        // Update Selling Price
        function updateSellingPrice(productId, inputField) {
            const item = cartItems.find((item) => item.id === productId);
            if (item) {
                // ১. শুধুমাত্র ডাটা অবজেক্টে মানটি আপডেট করুন
                item.sellingPrice = parseFloat(inputField.value) || 0;

                // ২. পুরো টেবিল রেন্ডার না করে শুধু ক্যালকুলেশন আপডেট করুন
                // এতে দশমিক লিখতে কোনো বাধা থাকবে না এবং কার্সারও সরবে না
                updateTotal();
            }
        }


        // Remove Product
        function removeProduct(productId) {
            cartItems = cartItems.filter((item) => item.id !== productId);
            renderCart();
        }

        function togglePosReturnCreditAdjustment() {
            const chkTop = document.getElementById("chkUseReturnCredit");
            const chkRow = document.getElementById("chkPosReturnAdjRow");
            const adjInput = document.getElementById("posReturnAdjustmentInput");

            const isChecked = (chkTop && chkTop.checked) || (chkRow && chkRow.checked);
            if (chkTop) chkTop.checked = isChecked;
            if (chkRow) chkRow.checked = isChecked;

            adjInput.disabled = !isChecked;
            calculateDuePayment();
        }

        function calculateDuePayment() {
            // Get values dynamically
            const subTotal = parseFloat(document.getElementById("subTotal").textContent.replace("৳", "").trim()) || 0;
            const discountInputVal = parseFloat(document.getElementById("discountAmountInput").value) || 0;
            const discountType = document.querySelector('input[name="discountType"]:checked')?.value || 'flat';
            const paidAmount = parseFloat(document.getElementById("paidAmountInput").value) || 0;

            let discountAmount = 0;
            const badge = document.getElementById("discountCalculatedBadge");

            if (discountType === 'percent') {
                if (discountInputVal > 100) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ছাড় সীমাবদ্ধতা',
                        text: 'ডিসকাউন্ট ১০০% এর বেশি হতে পারবে না!',
                        confirmButtonColor: '#15803d'
                    });
                    document.getElementById("discountAmountInput").value = 100;
                    discountAmount = subTotal;
                } else {
                    discountAmount = (subTotal * discountInputVal) / 100;
                }

                if (badge) {
                    badge.style.display = discountInputVal > 0 ? "inline-block" : "none";
                    badge.textContent = `= ৳ ${discountAmount.toFixed(2)}`;
                }
            } else {
                discountAmount = discountInputVal;
                if (discountAmount > subTotal && subTotal > 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ছাড় সীমাবদ্ধতা',
                        text: 'ডিসকাউন্ট সাবটোটালের চেয়ে বেশি হতে পারবে না!',
                        confirmButtonColor: '#15803d'
                    });
                    document.getElementById("discountAmountInput").value = subTotal;
                    discountAmount = subTotal;
                }

                if (badge) {
                    badge.style.display = "none";
                }
            }

            const chkTop = document.getElementById("chkUseReturnCredit");
            const chkRow = document.getElementById("chkPosReturnAdjRow");
            const adjInput = document.getElementById("posReturnAdjustmentInput");

            const isReturnAdjActive = (chkTop && chkTop.checked) || (chkRow && chkRow.checked);
            const returnAdjAmount = isReturnAdjActive ? (parseFloat(adjInput?.value) || 0) : 0;

            // Calculate total after applying discount and return adjustment
            const netPayable = Math.max(0, subTotal - discountAmount - returnAdjAmount);
            const dueAmount = Math.max(0, netPayable - paidAmount);

            // Update the Due Amount Display
            document.getElementById("totalDuePayable").textContent = `৳ ${dueAmount.toFixed(2)}`;

            // Update Big Sub-Total Display Card
            const bigSubTotalDisplay = document.getElementById("bigSubTotalDisplay");
            if (bigSubTotalDisplay) {
                bigSubTotalDisplay.textContent = `৳ ${netPayable.toFixed(2)}`;
            }

            // Update the Status Display
            const paymentStatusDisplay = document.getElementById("paymentStatusDisplay");
            const effectivePaid = paidAmount + returnAdjAmount;
            const totalTarget = subTotal - discountAmount;

            if (effectivePaid >= totalTarget && totalTarget > 0) {
                paymentStatusDisplay.textContent = "নগদ";
                paymentStatusDisplay.classList.remove("partial-payment-status");
                paymentStatusDisplay.classList.add("fully-paid-status");
            } else if (effectivePaid > 0) {
                paymentStatusDisplay.textContent = "বাকী";
                paymentStatusDisplay.classList.add("partial-payment-status");
                paymentStatusDisplay.classList.remove("fully-paid-status");
            } else {
                paymentStatusDisplay.textContent = "বাকী";
                paymentStatusDisplay.classList.remove("partial-payment-status", "fully-paid-status");
            }
        }

        // Hold Invoices Manager System
        function updateHeldInvoicesBadge() {
            try {
                const heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
                const badge = document.getElementById('heldInvoicesBadge');
                if (badge) badge.textContent = heldList.length;
            } catch (e) {}
        }

        function holdCurrentInvoice() {
            if (!cartItems || cartItems.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'কার্ট খালি',
                    text: 'হোল্ড করার মতো কোনো পণ্য কার্টে যুক্ত নেই।',
                    confirmButtonColor: '#15803d'
                });
                return;
            }

            const name = document.getElementById('CustomerName')?.value.trim() || 'সাধারণ কাস্টমার';
            const mobile = document.getElementById('CustomerMobileNumber')?.value.trim() || '';
            const address = document.getElementById('CustomerAddress')?.value.trim() || '';
            const prevDue = document.getElementById('totalPreviousDueAmount')?.value.trim() || '0';
            const invDate = document.getElementById('CustomerDate')?.value || '';
            const customerId = document.getElementById('CustomerID')?.value || '1';
            const discount = document.getElementById('discountAmountInput')?.value || '';
            const discountType = document.querySelector('input[name="discountType"]:checked')?.value || 'flat';
            const paid = document.getElementById('paidAmountInput')?.value || '';
            const note = document.getElementById('orderNote')?.value || '';
            const subTotalVal = parseFloat(document.getElementById('subTotal')?.textContent.replace('৳', '')) || 0;

            const holdId = 'HOLD-' + Math.floor(1000 + Math.random() * 9000);
            const now = new Date();
            const timeStr = now.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            }) + ', ' + now.toLocaleDateString();

            const holdData = {
                id: holdId,
                customer_id: customerId,
                customer_name: name,
                customer_mobile: mobile,
                customer_address: address,
                previous_due: prevDue,
                invoice_date: invDate,
                cartItems: JSON.parse(JSON.stringify(cartItems)),
                discount: discount,
                discount_type: discountType,
                paid: paid,
                order_note: note,
                subTotal: subTotalVal,
                total_items: cartItems.reduce((acc, i) => acc + (i.quantity || 1), 0),
                time: timeStr
            };

            let heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
            heldList.push(holdData);
            localStorage.setItem('pos_held_invoices', JSON.stringify(heldList));

            // Reset current POS cart
            cartItems = [];
            renderCart();
            if (document.getElementById('discountAmountInput')) document.getElementById('discountAmountInput').value = '';
            const radioFlat = document.getElementById('discountTypeFlat');
            if (radioFlat) radioFlat.checked = true;
            if (document.getElementById('paidAmountInput')) document.getElementById('paidAmountInput').value = '';
            if (document.getElementById('orderNote')) document.getElementById('orderNote').value = '';

            updateHeldInvoicesBadge();

            Swal.fire({
                icon: 'success',
                title: 'ইনভয়েস হোল্ড করা হয়েছে!',
                text: `রেফারেন্স: #${holdId} (${name})`,
                timer: 1500,
                showConfirmButton: false
            });
        }

        function openHoldInvoicesModal() {
            const heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
            const container = document.getElementById('heldInvoicesCardList');
            if (!container) return;

            container.innerHTML = '';

            if (heldList.length === 0) {
                container.innerHTML = `
            <div class="text-center text-muted py-5 fw-bold bg-white rounded-3 border">
                <i class="fa-solid fa-inbox fs-1 d-block mb-2 text-warning"></i>
                <span>কোনো হোল্ডকৃত ইনভয়েস পাওয়া যায়নি।</span>
            </div>`;
            } else {
                heldList.forEach((item) => {
                    const card = document.createElement('div');
                    card.className = "card mb-3 border-0 shadow-sm";
                    card.style.cssText = "border-radius: 14px; background: #ffffff; border: 1px solid #e2e8f0 !important;";
                    card.innerHTML = `
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <!-- Ref & Customer Info -->
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge px-2 py-2 fw-bold" style="background: #fef08a; color: #854d0e; border: 1px solid #fde047; font-size: 13px; font-family: monospace; border-radius: 8px;">
                                ${item.id}
                            </span>
                            <div>
                                <h6 class="m-0 fw-bold text-dark" style="font-size: 15px;">${item.customer_name}</h6>
                                <span class="text-muted small"><i class="fa-solid fa-phone me-1 text-success"></i>${item.customer_mobile || 'N/A'}</span>
                            </div>
                        </div>

                        <!-- Date & Items Badge -->
                        <div class="d-flex align-items-center gap-3">
                            <span class="text-muted small"><i class="fa-regular fa-clock me-1 text-warning"></i>${item.time}</span>
                            <span class="badge px-3 py-2 fw-bold" style="background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; font-size: 12px; border-radius: 20px;">
                                ${item.total_items} Pcs
                            </span>
                        </div>

                        <!-- Amount & Action Buttons -->
                        <div class="d-flex align-items-center gap-3 ms-auto ms-sm-0">
                            <span class="fw-bolder text-success ms-2" style="font-size: 18px;">৳ ${item.subTotal.toFixed(2)}</span>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="btn btn-success px-3 py-2 fw-bold d-flex align-items-center gap-1 shadow-sm" onclick="restoreHeldInvoice('${item.id}')" style="border-radius: 10px; font-size: 13px;">
                                    <i class="fa-solid fa-play"></i> লোড করুন
                                </button>
                                <button type="button" class="btn btn-outline-danger px-3 py-2 shadow-xs" onclick="deleteHeldInvoice('${item.id}')" style="border-radius: 10px;" title="মুছে ফেলুন">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                    container.appendChild(card);
                });
            }

            const modalEl = document.getElementById('holdInvoicesModal');
            if (modalEl) {
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modal.show();
                } else {
                    $(modalEl).modal('show');
                }
            }
        }

        function restoreHeldInvoice(holdId) {
            let heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
            const item = heldList.find(i => i.id === holdId);
            if (!item) return;

            if (cartItems.length > 0) {
                Swal.fire({
                    title: 'বর্তমান কার্ট প্রতিস্থাপন করবেন?',
                    text: 'কার্টে থাকা বর্তমান পণ্যগুলো মুছে হোল্ডকৃত ইনভয়েসটি লোড হবে।',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#15803d',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'হ্যাঁ, লোড করুন',
                    cancelButtonText: 'বাতিল'
                }).then((result) => {
                    if (result.isConfirmed) {
                        applyRestoreHeldInvoice(item, holdId);
                    }
                });
            } else {
                applyRestoreHeldInvoice(item, holdId);
            }
        }

        function applyRestoreHeldInvoice(item, holdId) {
            cartItems = JSON.parse(JSON.stringify(item.cartItems || []));
            renderCart();

            if (document.getElementById('CustomerName')) document.getElementById('CustomerName').value = item.customer_name || '';
            if (document.getElementById('CustomerMobileNumber')) document.getElementById('CustomerMobileNumber').value = item.customer_mobile || '';
            if (document.getElementById('CustomerAddress')) document.getElementById('CustomerAddress').value = item.customer_address || '';
            if (document.getElementById('totalPreviousDueAmount')) document.getElementById('totalPreviousDueAmount').value = item.previous_due || 0;
            if (document.getElementById('CustomerID')) document.getElementById('CustomerID').value = item.customer_id || '1';
            if (item.discount_type === 'percent') {
                const radioPercent = document.getElementById('discountTypePercent');
                if (radioPercent) radioPercent.checked = true;
            } else {
                const radioFlat = document.getElementById('discountTypeFlat');
                if (radioFlat) radioFlat.checked = true;
            }
            if (document.getElementById('discountAmountInput')) document.getElementById('discountAmountInput').value = item.discount || '';
            if (document.getElementById('paidAmountInput')) document.getElementById('paidAmountInput').value = item.paid || '';
            if (document.getElementById('orderNote')) document.getElementById('orderNote').value = item.order_note || '';

            deleteHeldInvoice(holdId, false);

            const modalEl = document.getElementById('holdInvoicesModal');
            if (modalEl) {
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                } else {
                    $(modalEl).modal('hide');
                }
            }

            calculateDuePayment();

            if (typeof successToast === 'function') {
                successToast(`▶️ ইনভয়েস #${holdId} লোড করা হয়েছে।`);
            }
        }

        function deleteHeldInvoice(holdId, showNotice = true) {
            let heldList = JSON.parse(localStorage.getItem('pos_held_invoices') || '[]');
            heldList = heldList.filter(i => i.id !== holdId);
            localStorage.setItem('pos_held_invoices', JSON.stringify(heldList));
            updateHeldInvoicesBadge();

            if (showNotice) {
                openHoldInvoicesModal();
                if (typeof successToast === 'function') {
                    successToast(`🗑️ ইনভয়েস #${holdId} মুছে ফেলা হয়েছে।`);
                }
            }
        }

        // Call function when discount or paid amount changes
        document.getElementById("discountAmountInput").addEventListener("input", calculateDuePayment);
        document.getElementById("paidAmountInput").addEventListener("input", calculateDuePayment);

        // Initialize the values on page load
        calculateDuePayment();
        updateHeldInvoicesBadge();

        ProductBrandData(); // Initialize on Page Load
    </script>


    <script>
        async function SavePaymentInfo(event) {
            if (event) event.preventDefault(); // Prevent form submission

            try {
                // Fetch customer input values
                const name = document.getElementById('CustomerName')?.value.trim() || 'সাধারণ কাস্টমার';
                const mobile = document.getElementById('CustomerMobileNumber')?.value.trim() || '01000000000';
                const address = document.getElementById('CustomerAddress')?.value.trim() || '';
                const totalPreviousDueAmount = document.getElementById('totalPreviousDueAmount')?.value.trim() || '0';
                const Invoicedate = document.getElementById('CustomerDate')?.value;
                let CustomerID = document.getElementById('CustomerID')?.value || '1';
                const paidAmount = parseFloat(document.getElementById('paidAmountInput')?.value) || 0;
                const subTotal = parseFloat(document.getElementById('subTotal')?.textContent.replace('৳', '')) || 0;
                const discountInputVal = parseFloat(document.getElementById('discountAmountInput')?.value) || 0;
                const discountType = document.querySelector('input[name="discountType"]:checked')?.value || 'flat';
                let discountAmount = 0;
                if (discountType === 'percent') {
                    discountAmount = (subTotal * Math.min(100, discountInputVal)) / 100;
                } else {
                    discountAmount = discountInputVal;
                }
                const dueAmount = parseFloat(document.getElementById('totalDuePayable')?.textContent.replace('৳', '')) || 0;

                const chkTop = document.getElementById("chkUseReturnCredit");
                const chkRow = document.getElementById("chkPosReturnAdjRow");
                const isReturnAdjActive = (chkTop && chkTop.checked) || (chkRow && chkRow.checked);
                const returnAdjustmentAmount = isReturnAdjActive ? (parseFloat(document.getElementById('posReturnAdjustmentInput')?.value) || 0) : 0;

                const totalCost = parseFloat(document.getElementById('totalCost')?.textContent.replace('৳', '')) || 0;
                const transactionId = document.getElementById('transactionInput')?.value.trim();
                const orderNote = document.getElementById('orderNote')?.value.trim();
                let paymentMethod = document.querySelector('input[name="payment"]:checked')?.id;
                const paymentStatusDisplay = document.getElementById('paymentStatusDisplay')?.textContent.trim();

                // Validate required fields
                if (cartItems.length === 0) {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'কার্ট খালি!',
                        text: 'অর্ডার তৈরি করতে অন্তত একটি পণ্য কার্টে যুক্ত করুন।',
                        confirmButtonColor: '#15803d'
                    });
                }

                // If paidAmount is 0 (100% Due / বাকী bill), payment method selection is NOT mandatory!
                if (paidAmount === 0 && !paymentMethod) {
                    paymentMethod = 'due';
                }

                if (!paymentMethod && paidAmount > 0) {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'পেমেন্ট মেথড নির্বাচন করুন',
                        text: 'যেহেতু জমার পরিমাণ ধরা হয়েছে, অনুগ্রহ করে একটি পেমেন্ট মেথড (যেমন: Cash, bKash) সিলেক্ট করুন।',
                        confirmButtonColor: '#15803d'
                    });
                }

                // Collect product details from the cart
                const products = cartItems.map((item) => {
                    const sellingPriceInput = document.getElementById(`sellingPrice-${item.id}`);
                    const sellingPrice = parseFloat(sellingPriceInput?.value) || 0;

                    return {
                        product_id: item.id,
                        quantity: item.quantity,
                        price: item.cost_price,
                        selling_price: sellingPrice,
                    };
                });

                // Prepare the FormData object
                const formData = new FormData();
                formData.append('customer_name', name);
                formData.append('mobile', mobile);
                formData.append('address_details', address);
                formData.append('customer_id', CustomerID);
                formData.append('sub_total', subTotal);
                formData.append('return_adjustment_amount', returnAdjustmentAmount);
                formData.append('invoice_date', Invoicedate);
                formData.append('paid_amount', paidAmount);
                formData.append('discount_amount', discountAmount);
                formData.append('due_amount', dueAmount);
                formData.append('previous_due_amount', totalPreviousDueAmount);
                formData.append('transaction_id', transactionId);
                formData.append('order_note', orderNote);
                formData.append('payment_method', paymentMethod);
                formData.append('payment_status', paymentStatusDisplay);
                formData.append('products', JSON.stringify(products));

                // Send data to the server
                const res = await axios.post('/api/create-order', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken()?.headers,
                    },
                });

                // Handle response
                if (res.data.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'অর্ডার সফলভাবে সম্পন্ন হয়েছে!',
                        text: 'ইনভয়েস প্রিন্ট পেজে নিয়ে যাওয়া হচ্ছে...',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = '/invoice-print';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'অর্ডার ব্যর্থ হয়েছে',
                        text: res.data.message || 'অর্ডার প্রসেস করার সময় সমস্যা দেখা দিয়েছে।',
                        confirmButtonColor: '#15803d'
                    });
                }
            } catch (error) {
                console.error("Error in creating order:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'ত্রুটি',
                    text: 'অর্ডার প্রসেস করার সময় সমস্যা দেখা দিয়েছে। আবার চেষ্টা করুন।',
                    confirmButtonColor: '#15803d'
                });
            }
        }
    </script>

    <!-- Mobile Camera Barcode Scanner Modal -->
    <div class="modal fade" id="cameraScanModal" tabindex="-1" aria-labelledby="cameraScanModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 18px; overflow: hidden;">
                <div class="modal-header text-white py-3" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);">
                    <h5 class="modal-title fw-bold" id="cameraScanModalLabel">
                        <i class="fa-solid fa-camera me-2"></i> মোবাইল ক্যামেরা বারকোড স্ক্যানার
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="stopCameraScanner()"></button>
                </div>
                <div class="modal-body p-3 text-center">
                    <div id="cameraScannerStatus" class="alert alert-info py-2 small mb-3" style="border-radius: 10px;">
                        <i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে রাখুন।
                    </div>

                    <!-- Reader Viewport -->
                    <div id="reader" style="width: 100%; min-height: 280px; background: #000; border-radius: 14px; overflow: hidden;" class="shadow-sm"></div>

                    <div class="d-flex align-items-center justify-content-between mt-3 px-1">
                        <span id="lastScannedText" class="badge bg-success fs-6 py-2 px-3" style="border-radius: 10px;">স্ক্যান কৃত কোড: -</span>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="switchCamera()">
                            <i class="fa-solid fa-rotate me-1"></i> ক্যামেরা পাল্টান
                        </button>
                    </div>
                </div>
                <div class="modal-footer bg-light py-2 justify-content-between">
                    <small class="text-muted"><i class="fa-solid fa-bolt text-warning me-1"></i> বারকোড স্ক্যান হলেই অটোমেটিক কার্টে যুক্ত হবে</small>
                    <button type="button" class="btn btn-secondary px-4 fw-bold rounded-pill" data-bs-dismiss="modal" onclick="stopCameraScanner()">বন্ধ করুন</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Add Product Modal for POS -->
    <div class="modal fade" id="quickAddProductModal" tabindex="-1" aria-labelledby="quickAddProductModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header text-white py-3" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);">
                    <h5 class="modal-title fw-bold" id="quickAddProductModalLabel">
                        <i class="fa-solid fa-cart-plus me-2"></i> পস থেকে নতুন প্রোডাক্ট তৈরি করুন
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <form id="quickProductForm" onsubmit="quickSaveProduct(event)">
                        <div class="row g-3">
                            <div class="col-md-7">
                                <label for="quickProductName" class="form-label fw-bold text-dark mb-1">প্রোডাক্ট এর নাম <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-semibold" id="quickProductName" required placeholder="উদাহরণ: HAMKO 12V 20AH Gel Battery" style="border-radius: 8px;">
                            </div>
                            <div class="col-md-5">
                                <label for="quickProductCode" class="form-label fw-bold text-dark mb-1">বারকোড / প্রোডাক্ট কোড</label>
                                <input type="text" class="form-control fw-semibold" id="quickProductCode" placeholder="যেমন: BAT-1002" style="border-radius: 8px;">
                            </div>

                            <div class="col-md-4">
                                <label for="quickCategorySelect" class="form-label fw-bold text-dark mb-1">ক্যাটাগরি</label>
                                <select class="form-select fw-semibold" id="quickCategorySelect" style="border-radius: 8px;">
                                    <option value="">সিলেক্ট করুন</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="quickBrandSelect" class="form-label fw-bold text-dark mb-1">ব্র্যান্ড</label>
                                <select class="form-select fw-semibold" id="quickBrandSelect" style="border-radius: 8px;">
                                    <option value="">সিলেক্ট করুন</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="quickUnitSelect" class="form-label fw-bold text-dark mb-1">ইউনিট</label>
                                <select class="form-select fw-semibold" id="quickUnitSelect" style="border-radius: 8px;">
                                    <option value="">Pcs</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="quickCostPrice" class="form-label fw-bold text-dark mb-1">ক্রয় মূল্য (৳)</label>
                                <input type="number" step="any" class="form-control fw-bold text-danger" id="quickCostPrice" value="0" style="border-radius: 8px;">
                            </div>
                            <div class="col-md-4">
                                <label for="quickSellPrice" class="form-label fw-bold text-dark mb-1">বিক্রয় মূল্য (৳) <span class="text-danger">*</span></label>
                                <input type="number" step="any" class="form-control fw-bold text-success" id="quickSellPrice" required value="0" style="border-radius: 8px;">
                            </div>
                            <div class="col-md-4">
                                <label for="quickQuantity" class="form-label fw-bold text-dark mb-1">প্রারম্ভিক স্টক (পরিমাণ)</label>
                                <input type="number" step="any" class="form-control fw-bold text-primary" id="quickQuantity" value="0" style="border-radius: 8px;">
                                <small class="text-muted" style="font-size: 11px;">(স্টক ০ রাখলেও সেল করা যাবে)</small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-2 border-top">
                            <button type="button" class="btn btn-secondary px-4 fw-bold rounded-3" data-bs-dismiss="modal">বাতিল</button>
                            <button type="submit" class="btn btn-success px-4 fw-bold rounded-3 shadow-sm" style="background: linear-gradient(135deg, #15803d 0%, #16a34a 100%); border: none;">
                                <i class="fa-solid fa-cart-plus me-1"></i> তৈরি করুন & কার্টে যোগ করুন
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Camera Barcode Scanner Logic -->
    <script>
        let html5QrCode = null;
        let currentFacingMode = "environment"; // Rear camera default
        let lastScannedCode = "";
        let scanCoolDownTimer = null;

        function openCameraScanner() {
            const modalEl = document.getElementById('cameraScanModal');
            if (!modalEl) return;
            let modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (!modalInstance) {
                modalInstance = new bootstrap.Modal(modalEl, {
                    backdrop: true,
                    keyboard: true
                });
            }
            modalInstance.show();
            setTimeout(() => {
                startCameraScanner();
            }, 350);
        }

        function startCameraScanner() {
            if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.stop().then(() => initHtml5QrCode()).catch(() => initHtml5QrCode());
            } else {
                initHtml5QrCode();
            }
        }

        function initHtml5QrCode() {
            const statusEl = document.getElementById("cameraScannerStatus");
            if (statusEl) {
                statusEl.className = "alert alert-info py-2 small mb-3";
                statusEl.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> ক্যামেরা শুরু হচ্ছে... বারকোড ক্যামেরার সামনে আনুন।';
            }

            if (!html5QrCode) {
                html5QrCode = new Html5Qrcode("reader");
            }

            const config = {
                fps: 15,
                qrbox: {
                    width: 260,
                    height: 160
                },
                aspectRatio: 1.333334
            };

            html5QrCode.start({
                    facingMode: currentFacingMode
                },
                config,
                onBarcodeDetectedSuccess,
                onBarcodeDetectedError
            ).then(() => {
                if (statusEl) {
                    statusEl.className = "alert alert-success py-2 small mb-3";
                    statusEl.innerHTML = '<i class="fa-solid fa-video me-1"></i> ক্যামেরা সক্রিয়! বারকোড স্ক্যান করলে সরাসরি কার্টে যোগ হবে।';
                }
            }).catch(err => {
                console.error("Camera start error:", err);
                if (statusEl) {
                    statusEl.className = "alert alert-danger py-2 small mb-3";
                    statusEl.innerHTML = '<i class="fa-solid fa-triangle-exclamation me-1"></i> ক্যামেরা চালু করা যায়নি! ব্রাউজারের ক্যামেরা পারমিশন এলাউ (Allow) করুন।';
                }
            });
        }

        function onBarcodeDetectedSuccess(decodedText, decodedResult) {
            if (!decodedText || decodedText === lastScannedCode) return;

            lastScannedCode = decodedText;
            const lastTextEl = document.getElementById("lastScannedText");
            if (lastTextEl) lastTextEl.innerText = `স্ক্যান কৃত: ${decodedText}`;

            // Play beep sound & vibration
            if (navigator.vibrate) navigator.vibrate(100);
            playScanBeep();

            // Set input & trigger barcode search
            const searchInput = document.getElementById("productCodeSearch");
            if (searchInput) {
                searchInput.value = decodedText;
                handleBarcodeEnterKey({
                    key: "Enter",
                    preventDefault: () => {}
                }, decodedText);
            }

            // Continuous scanning cooldown (1.2 seconds)
            clearTimeout(scanCoolDownTimer);
            scanCoolDownTimer = setTimeout(() => {
                lastScannedCode = "";
            }, 1200);
        }

        function onBarcodeDetectedError(errorMessage) {
            // Quiet detection attempts
        }

        function switchCamera() {
            currentFacingMode = (currentFacingMode === "environment") ? "user" : "environment";
            startCameraScanner();
        }

        function stopCameraScanner() {
            try {
                if (html5QrCode && html5QrCode.isScanning) {
                    html5QrCode.stop().then(() => {
                        try { html5QrCode.clear(); } catch (e) {}
                        hideCameraModal();
                    }).catch(() => {
                        hideCameraModal();
                    });
                } else {
                    hideCameraModal();
                }
            } catch (e) {
                hideCameraModal();
            }
        }

        function hideCameraModal() {
            const modalEl = document.getElementById('cameraScanModal');
            if (modalEl) {
                const instance = bootstrap.Modal.getInstance(modalEl);
                if (instance) instance.hide();
            }
            setTimeout(() => {
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                document.body.classList.remove('modal-open');
                document.body.style.overflow = '';
                document.body.style.paddingRight = '';
            }, 200);
        }

        function playScanBeep() {
            try {
                const ctx = new(window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.type = "sine";
                osc.frequency.value = 1200;
                gain.gain.value = 0.15;
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.start();
                osc.stop(ctx.currentTime + 0.1);
            } catch (e) {}
        }

        /* POS Quick Add Product JS Logic */
        let quickOptionsLoaded = false;

        async function openQuickAddProductModal() {
            const modalEl = document.getElementById('quickAddProductModal');
            const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);

            document.getElementById('quickProductName').value = '';
            document.getElementById('quickProductCode').value = 'MARSS-BAT-' + Math.floor(1000 + Math.random() * 9000);
            document.getElementById('quickCostPrice').value = '0';
            document.getElementById('quickSellPrice').value = '0';
            document.getElementById('quickQuantity').value = '0';

            if (!quickOptionsLoaded) {
                await loadQuickProductOptions();
                quickOptionsLoaded = true;
            }

            modal.show();
        }

        async function loadQuickProductOptions() {
            try {
                const [catRes, brandRes, unitRes] = await Promise.all([
                    axios.get('/api/category-list', HeaderToken()),
                    axios.get('/api/brand-list', HeaderToken()),
                    axios.get('/api/unit-list', HeaderToken())
                ]);

                const catSelect = document.getElementById('quickCategorySelect');
                if (catSelect && catRes.data?.CategoryData) {
                    catSelect.innerHTML = '<option value="">সিলেক্ট করুন</option>';
                    catRes.data.CategoryData.forEach(cat => {
                        catSelect.innerHTML += `<option value="${cat.id}">${cat.category_name}</option>`;
                    });
                }

                const brandSelect = document.getElementById('quickBrandSelect');
                if (brandSelect && brandRes.data?.BrandData) {
                    brandSelect.innerHTML = '<option value="">সিলেক্ট করুন</option>';
                    brandRes.data.BrandData.forEach(b => {
                        brandSelect.innerHTML += `<option value="${b.id}">${b.name}</option>`;
                    });
                }

                const unitSelect = document.getElementById('quickUnitSelect');
                if (unitSelect && unitRes.data?.UnitData) {
                    unitSelect.innerHTML = '<option value="">সিলেক্ট করুন</option>';
                    unitRes.data.UnitData.forEach(u => {
                        unitSelect.innerHTML += `<option value="${u.id}">${u.unit_name}</option>`;
                    });
                }
            } catch (e) {
                console.error("Error loading product options:", e);
            }
        }

        async function loadQuickSubCategories(categoryId) {
            const subSelect = document.getElementById('quickSubCategorySelect');
            if (!subSelect) return;
            subSelect.innerHTML = '<option value="">সিলেক্ট করুন</option>';

            if (!categoryId) return;
            try {
                const res = await axios.get(`/api/sub-category-list/${categoryId}`, HeaderToken());
                if (res.data?.data) {
                    res.data.data.forEach(sub => {
                        subSelect.innerHTML += `<option value="${sub.id}">${sub.sub_category_name}</option>`;
                    });
                }
            } catch (e) {
                console.error("Error loading subcategories:", e);
            }
        }

        async function quickSaveProduct(event) {
            if (event) event.preventDefault();

            const name = document.getElementById('quickProductName').value.trim();
            const code = document.getElementById('quickProductCode').value.trim();
            const categoryId = document.getElementById('quickCategorySelect').value;
            const subCategoryEl = document.getElementById('quickSubCategorySelect');
            const subCategoryId = subCategoryEl ? subCategoryEl.value : '';
            const brandId = document.getElementById('quickBrandSelect').value;
            const unitId = document.getElementById('quickUnitSelect').value;
            const costPrice = document.getElementById('quickCostPrice').value || '0';
            const sellPrice = document.getElementById('quickSellPrice').value || '0';
            const quantity = document.getElementById('quickQuantity').value || '0';

            if (!name) {
                return Swal.fire({
                    icon: 'warning',
                    title: 'নাম প্রয়োজন',
                    text: 'অনুগ্রহ করে প্রোডাক্ট এর নাম লিখুন।',
                    confirmButtonColor: '#15803d'
                });
            }

            try {
                const formData = new FormData();
                formData.append('product_name', name);
                formData.append('product_code', code ? JSON.stringify([code]) : JSON.stringify(['BAT-' + Date.now()]));
                if (categoryId) formData.append('category_id', categoryId);
                if (subCategoryId) formData.append('sub_category_id', subCategoryId);
                if (brandId) formData.append('brand_id', brandId);
                if (unitId) formData.append('unit_id', unitId);
                formData.append('cost_price', costPrice);
                formData.append('sell_price', sellPrice);
                formData.append('quantity', quantity);
                formData.append('status', 'Active');

                const res = await axios.post('/api/create-product', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        ...HeaderToken()?.headers,
                    }
                });

                if (res.data.status === 'success') {
                    const modalEl = document.getElementById('quickAddProductModal');
                    const instance = bootstrap.Modal.getInstance(modalEl);
                    if (instance) instance.hide();

                    Swal.fire({
                        icon: 'success',
                        title: 'প্রোডাক্ট তৈরি হয়েছে!',
                        text: `"${name}" সফলভাবে তৈরি হয়ে POS কার্টে যুক্ত করা হলো।`,
                        timer: 1500,
                        showConfirmButton: false
                    });

                    // Reload products list and auto add to cart
                    await ProductBrandData();
                    if (res.data.product && res.data.product.id) {
                        addProductToCart(res.data.product.id);
                    }
                }
            } catch (e) {
                console.error("Error creating product:", e);
                Swal.fire({
                    icon: 'error',
                    title: 'ত্রুটি',
                    text: 'প্রোডাক্ট তৈরিতে সমস্যা দেখা দিয়েছে।',
                    confirmButtonColor: '#15803d'
                });
            }
        }

        async function loadPosUserProfile() {
            try {
                const response = await axios.get("/user-profile", HeaderToken());
                const user = response.data;
                if (user) {
                    if (document.getElementById('UserProfileImg') && user.img_url) {
                        document.getElementById('UserProfileImg').src = user.img_url;
                    }
                    if (document.getElementById('AuthorizePersonProfileName')) {
                        document.getElementById('AuthorizePersonProfileName').innerText = user.name || "No Name";
                    }
                    if (document.getElementById('EmailShow')) {
                        document.getElementById('EmailShow').innerText = user.email || "No Email";
                    }
                }
            } catch (e) {
                console.error("Error loading POS user profile:", e);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadPosUserProfile();

            // Global listener to ensure all modal backdrops are fully cleared on close
            document.addEventListener('hidden.bs.modal', function() {
                setTimeout(() => {
                    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                }, 150);
            });
        });
    </script>
</body>

</html>