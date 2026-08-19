<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة التسوق - متجر حقائبك</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            background-color: #fcf9f6; 
            color: #4a3525; 
            font-family: system-ui, -apple-system, sans-serif; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .main-content { flex: 1; }
        /* تصميم الفوتر البني */
        footer {
            background-color: #6b4735;
            color: #f8f5f0;
            padding: 40px 0 20px;
            margin-top: 50px;
        }
        footer a {
            color: #e2d7cd;
            text-decoration: none;
            transition: 0.2s;
        }
        footer a:hover {
            color: #ffffff;
        }
        .footer-btn {
            background-color: #f3eae1;
            color: #6b4735;
            font-weight: bold;
            border-radius: 8px;
            padding: 8px 20px;
            border: none;
        }
        .footer-btn:hover {
            background-color: #ffffff;
            color: #4a3525;
        }
    </style>
</head>
<body>

    <!-- محتوى السلة -->
    <div class="container main-content my-5" style="max-width: 850px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color: #6b4735;"><i class="fa-solid fa-cart-shopping me-2"></i>سلة التسوق</h2>
            <a href="/" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-right me-1"></i> العودة للمتجر</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="card shadow-sm p-3 border-0 rounded-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr class="table-light">
                                <th>المنتج</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>الإجمالي</th>
                                <th>إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $details)
                                <tr>
                                    <td class="fw-bold">{{ $details['name'] }}</td>
                                    <td>{{ $details['price'] }} ش.ج</td>
                                    <td><span class="badge bg-secondary">{{ $details['quantity'] }}</span></td>
                                    <td class="fw-bold text-danger">{{ $details['price'] * $details['quantity'] }} ش.ج</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i> حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 pt-2">
                    <h4 class="fw-bold mb-0">المجموع الكلي: <span class="text-danger">{{ $total }} ش.ج</span></h4>
                    
                    @php
                        $msg = "طلب جديد من متجر حقائبك:%0A";
                        foreach($cart as $details) {
                            $msg .= "- " . $details['name'] . " (الكمية: " . $details['quantity'] . ")%0A";
                        }
                        $msg .= "المجموع الكلي: " . $total . " ش.ج";
                    @endphp
                    
                    <a href="https://wa.me/970595636609?text={{ $msg }}" target="_blank" class="btn btn-success btn-lg px-4 fw-bold">
                        <i class="fa-brands fa-whatsapp me-2"></i> تأكيد الطلب عبر الواتساب
                    </a>
                </div>
            </div>
        @else
            <div class="card shadow-sm p-5 text-center border-0 rounded-3">
                <i class="fa-solid fa-basket-shopping display-1 text-muted mb-3"></i>
                <h4 class="text-muted">السلة فارغة حالياً!</h4>
                <p class="text-secondary">تصفح المنتجات وأضف ما يعجبك إلى السلة.</p>
                <a href="/" class="btn text-white mt-2 mx-auto px-4" style="background-color: #6b4735;">تصفح المنتجات</a>
            </div>
        @endif
    </div>

    <!-- التذييل (Footer) البني -->
    <footer>
        <div class="container">
            <div class="row gy-4 text-center text-md-start align-items-center">
                
                <!-- عمود زر سلة الشراء -->
                <div class="col-md-3 text-center">
                    <a href="/cart" class="btn footer-btn shadow-sm">
                        <i class="fa-solid fa-bag-shopping me-1"></i> سلة الشراء
                    </a>
                </div>

                <!-- عمود القائمة -->
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">القائمة</h6>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li><a href="#">حقيبة الخصر</a></li>
                        <li><a href="#">حقيبة الظهر</a></li>
                        <li><a href="#">تواصل معنا</a></li>
                    </ul>
                </div>

                <!-- عمود التواصل -->
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">التواصل</h6>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li><i class="fa-solid fa-phone me-2"></i> +043 33535919</li>
                        <li><i class="fa-regular fa-envelope me-2"></i> haghaibak.com</li>
                        <li><i class="fa-solid fa-globe me-2"></i> haghabak.com</li>
                    </ul>
                </div>

                <!-- عمود متجر حقائبك -->
                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">متجر حقائبك</h6>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li><a href="#"><i class="fa-brands fa-facebook me-2"></i> متجر الحقائب</a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram me-2"></i> haghaibak</a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube me-2"></i> متجر_haghaibak</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>