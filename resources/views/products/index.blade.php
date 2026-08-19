<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معرض زين - حقائبك</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #fcf9f6; color: #4a3525; font-family: system-ui, -apple-system, sans-serif; }
        .top-bar { background-color: #6b4735; color: #fff; font-size: 13px; }
        
        /* بنر الصورة العريض العلوي من مجلد public */
        .hero-banner-image {
            background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)), 
                        url('{{ asset("banner.jpg") }}') center/cover no-repeat;
            border-radius: 15px;
            padding: 60px 20px;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.6);
        }

        .product-card { border: none; border-radius: 12px; background-color: #ffffff; overflow: hidden; transition: 0.3s; }
        .product-card:hover { transform: translateY(-4px); box-shadow: 0 8px 15px rgba(0,0,0,0.1) !important; }
        .product-card img { height: 220px; object-fit: cover; width: 100%; }
        
        .sidebar-box { background-color: #f4eae1; border-radius: 12px; padding: 20px; text-align: center; }
        .btn-wa { background-color: #25d366; color: white; border-radius: 8px; font-weight: bold; width: 100%; text-decoration: none; display: block; padding: 10px; }
        
        /* زر انستغرام العائم */
        .insta-float {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
            color: white;
            border-radius: 50px;
            padding: 10px 18px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s;
        }
        .insta-float:hover { transform: scale(1.05); color: white; }

        /* تنسيقات الفوتر البني */
        .main-footer { background-color: #6b4735; color: #f8f5f0; }
        .main-footer a { color: #e2d7cd; text-decoration: none; transition: 0.2s; }
        .main-footer a:hover { color: #ffffff; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="top-bar text-center py-2">
        متجر التخصص من الحقائب والمطرزات! تسوقي الآن!
    </div>

    <!-- الهيدر -->
    <nav class="navbar bg-white shadow-sm py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold text-dark fs-4" href="/"><i class="fa-solid fa-bag-shopping me-2" style="color: #6b4735;"></i> معرض زين</a>
            
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('cart.index') }}" class="btn btn-outline-dark position-relative me-2">
                    <i class="fa-solid fa-cart-shopping"></i> السلة
                    @if(session('cart'))
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>
                <a href="/login" class="btn btn-outline-secondary btn-sm">لوحة الأدمن 🔒</a>
            </div>
        </div>
    </nav>

    <div class="container mb-5 flex-grow-1">
        
        <!-- شريط البحث -->
        <form action="{{ route('products.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="ابحث عن حقيبة..." value="{{ request('query') }}">
                <button class="btn text-white" style="background-color: #6b4735;" type="submit">
                    <i class="fa-solid fa-magnifying-glass me-1"></i> بحث
                </button>
            </div>
        </form>

        <!-- بنر الغلاف -->
        <div class="hero-banner-image text-center mb-5 shadow-sm">
            <h1 class="fw-bold mb-3">اكتشفي تشكيلتنا الجديدة من الحقائب الفاخرة! ✨</h1>
            <a href="https://wa.me/970595636609" class="btn btn-light fw-bold px-4 py-2" style="color: #6b4735;">تواصل معنا الآن</a>
        </div>

        <div class="row g-4">
            <div class="col-lg-9">
                <h4 class="fw-bold mb-4" style="color: #6b4735;">أحدث الحقائب المتاحة</h4>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @forelse($products as $product)
                        <div class="col">
                            <div class="card product-card text-center p-2 shadow-sm h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('banner.jpg') }}" class="card-img-top rounded" alt="{{ $product->name }}">
                                    <div class="card-body p-2">
                                        <h6 class="fw-bold mt-2 mb-1" style="color: #333;">{{ $product->name }}</h6>
                                        <p class="text-danger fw-bold fs-5 mb-0">{{ $product->price }} ش.ج</p>
                                    </div>
                                </div>
                                <div class="p-2 pt-1 d-flex flex-column gap-2">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm text-white w-100" style="background-color: #6b4735;">
                                            <i class="fa-solid fa-cart-plus me-1"></i> أضف إلى السلة
                                        </button>
                                    </form>
                                    <a href="https://wa.me/970595636609?text=أريد طلب من معرض زين: {{ $product->name }}" target="_blank" class="btn btn-sm btn-outline-success w-100">
                                        <i class="fa-brands fa-whatsapp me-1"></i> طلب مباشر
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12"><p class="text-muted">لا توجد منتجات مضافة بعد.</p></div>
                    @endforelse
                </div>
            </div>

            <!-- الشريط الجانبي -->
            <div class="col-lg-3">
                <div class="sidebar-box shadow-sm mb-3">
                    <i class="fa-brands fa-whatsapp text-success display-4 mb-2"></i>
                    <h5 class="fw-bold">معرض زين</h5>
                    <p class="small text-muted">للحجز والاستفسار، تواصل معنا عبر الواتس اب!</p>
                    <a href="https://wa.me/970595636609" target="_blank" class="btn-wa">
                        <i class="fa-brands fa-whatsapp me-1"></i> تواصل معنا
                    </a>
                </div>

                <div class="sidebar-box shadow-sm">
                    <i class="fa-brands fa-instagram text-danger display-4 mb-2"></i>
                    <h5 class="fw-bold">تابعنا على الانستغرام</h5>
                    <p class="small text-muted">@tatrezat_zain</p>
                    <a href="https://www.instagram.com/tatrezat_zain" target="_blank" class="btn btn-dark w-100" style="background-color: #6b4735;">
                        زيارة حسابنا
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- زر الانستغرام العائم -->
    <a href="https://www.instagram.com/tatrezat_zain" target="_blank" class="insta-float">
        <i class="fa-brands fa-instagram fs-4"></i>
        <span>تابعنا</span>
    </a>

    <!-- الفوتر البني الجديد -->
    <footer class="main-footer pt-5 pb-3 mt-auto">
        <div class="container">
            <div class="row g-4 text-center text-md-start align-items-center">
                
                <!-- زر السلة -->
                <div class="col-md-3 text-center">
                    <a href="{{ route('cart.index') }}" class="btn btn-light fw-bold px-4 py-2 text-dark shadow-sm">
                        <i class="fa-solid fa-bag-shopping me-1" style="color: #6b4735;"></i> سلة الشراء
                    </a>
                </div>

                <!-- روابط القائمة -->
                <div class="col-md-3">
                    <h6 class="fw-bold text-white mb-3">القائمة</h6>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><a href="#">حقيبة الخصر</a></li>
                        <li class="mb-2"><a href="#">حقيبة الظهر</a></li>
                        <li><a href="https://wa.me/970595636609" target="_blank">تواصل معنا</a></li>
                    </ul>
                </div>

                <!-- بيانات التواصل -->
                <div class="col-md-3">
                    <h6 class="fw-bold text-white mb-3">التواصل</h6>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><i class="fa-solid fa-phone me-2"></i> +970 595 636 609</li>
                        <li class="mb-2"><i class="fa-regular fa-envelope me-2"></i> haghaibak.com</li>
                        <li><i class="fa-solid fa-globe me-2"></i> haghabak.com</li>
                    </ul>
                </div>

                <!-- وسائل التواصل الاجتماعي -->
                <div class="col-md-3">
                    <h6 class="fw-bold text-white mb-3">متجر حقائبك</h6>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2">
                            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook me-2"></i> متجر الحقائب</a>
                        </li>
                        <li class="mb-2">
                            <a href="https://www.instagram.com/tatrezat_zain" target="_blank"><i class="fa-brands fa-instagram me-2"></i> haghaibak</a>
                        </li>
                        <li>
                            <a href="https://youtube.com" target="_blank"><i class="fa-brands fa-youtube me-2"></i> متجر_haghaibak</a>
                        </li>
                    </ul>
                </div>

            </div>

            <hr class="my-4" style="border-color: #825943;">

            <div class="text-center small opacity-75">
                جميع الحقوق محفوظة &copy; {{ date('Y') }} معرض زين.
            </div>
        </div>
    </footer>

</body>
</html>