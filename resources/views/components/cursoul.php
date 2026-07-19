  <div class="promo-bar">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <span class="fw-bold">قسّط على 6 شهور <span class="text-warning">بدون فوائد</span></span>
                <span class="vr bg-white opacity-25 d-none d-md-block" style="height: 20px;"></span>
                <span class="d-none d-md-inline">لما تستخدم بطاقة الائتمانية</span>
            </div>

            <div class="d-flex align-items-center gap-3 mx-auto mx-md-0">
                <span class="fw-light text-uppercase">البنك الأهلي المصري</span>
                <span class="text-white-50">|</span>
                <div class="bg-secondary rounded" style="width: 50px; height: 30px; display: inline-block;"></div>
            </div>

            <div class="terms-text text-start w-100 w-md-auto">
                *تطبق الشروط والأحكام
            </div>
        </div>
    </div>

    <!-- 2. Dynamic Carousel Wrapper -->
    <div id="promoCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">

        <!-- Bottom Pagination Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <!-- Carousel Slides Elements -->
        <div class="carousel-inner">

            <!-- Slide 1 (Original Product) -->
            <div class="carousel-item active slide-1">
                <div class="container">
                    <div class="row align-items-center g-4">
                        <div class="col-md-5 order-md-1 text-center text-md-start">
                            <h2 class="hero-title mb-0">صوت نقي<br>لتجربة أعمق</h2>
                        </div>
                        <div class="col-md-4 order-md-2 text-center">
                            <!-- Replace with real transparent PNG asset -->
                            <img src="https://placeholder.com" class="product-img" alt="سماعات وساعة هواوي">
                        </div>
                        <div class="col-md-3 order-md-3 text-center text-md-start">
                            <a href="#" class="btn btn-cta">اشتري دلوقتي</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 (Alternative Promotional Slide) -->
            <div class="carousel-item slide-2">
                <div class="container">
                    <div class="row align-items-center g-4">
                        <div class="col-md-5 order-md-1 text-center text-md-start">
                            <h2 class="hero-title mb-0">عروض حصرية<br>لفترة محدودة</h2>
                        </div>
                        <div class="col-md-4 order-md-2 text-center">
                            <!-- Replace with alternative product image asset -->
                            <img src="https://placeholder.com" class="product-img" alt="منتج اخر">
                        </div>
                        <div class="col-md-3 order-md-3 text-center text-md-start">
                            <a href="#" class="btn btn-cta">اكتشف المزيد</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Carousel Side Controls (Hidden visually, but useful for accessibility/touch) -->
        <button class="carousel-control-prev d-none d-md-flex" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">السابق</span>
        </button>
        <button class="carousel-control-next d-none d-md-flex" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">التالي</span>
        </button>
    </div>

    <!-- 2. Main Hero Banner Container -->
    <div class="hero-banner py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Right Side: Marketing Copy -->
                <div class="col-md-5 order-first">
                    <h1 class="hero-title mb-4">
                        صوت نقي <br>
                        لتجربة أعمق
                    </h1>
                </div>

                <!-- Center Side: Product Showcase Showcase -->
                <div class="col-md-4 text-center">
                    <!-- Replace placeholder with your transparent product render PNG -->
                    <img src="https://placeholder.com" class="product-img" alt="Huawei Watch and Earbuds">
                </div>

                <!-- Left Side: Call to Action -->
                <div class="col-md-3 text-md-start text-center">
                    <a href="#" class="btn btn-cta">اشتري دلوقتي</a>
                </div>

            </div>
        </div>
    <style>
        /* Top Promo Bar Styles */
        .promo-bar {
            background-color: #0c331e; /* Dark green NBE brand color */
            color: #ffffff;
            font-size: 13px;
            padding: 10px 0;
            border-bottom: 2px solid #14462a;
            position: relative;
            z-index: 10;
        }
        .terms-text {
            font-size: 11px;
            opacity: 0.8;
        }

        /* Carousel Base Customization */
        .hero-carousel .carousel-item {
            min-height: 400px;
            background-size: cover;
            background-position: center;
            align-items: center;
            padding: 48px 0;
        }

        /* Individual Slide Background Fallbacks (Replace with your actual images) */
        .slide-1 {
            background: linear-gradient(135deg, #1d3354 0%, #4a709c 50%, #a2c2e8 100%);
        }
        .slide-2 {
            background: linear-gradient(135deg, #2b1f3d 0%, #5c4175 50%, #a389bd 100%);
        }

        /* Typography & Components */
        .hero-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.4;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .btn-cta {
            background-color: #ffffff;
            color: #222222;
            font-weight: bold;
            padding: 12px 35px;
            border-radius: 50px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            transition: transform 0.2s ease, background-color 0.2s ease;
        }
        .btn-cta:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
        }
        .product-img {
            max-width: 100%;
            height: auto;
            max-height: 280px;
            object-fit: contain;
        }

        /* Customizing Carousel Indicators below the product */
        .carousel-indicators {
            bottom: 15px;
        }
        .carousel-indicators [data-bs-target] {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            margin: 0 6px;
        }
        .carousel-indicators .active {
            background-color: #ffffff;
            transform: scale(1.2);
        }
    </style>
