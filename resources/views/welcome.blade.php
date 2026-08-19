<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'معرض زين') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fdfdfc] text-[#1b1b18] antialiased min-h-screen flex flex-col justify-between font-sans">

    <!-- Top Banner -->
    <div class="bg-[#6b4735] text-white text-xs py-1.5 text-center font-medium">
        متجر التخصص من الحقائب والمطرزات - تسوقي الآن!
    </div>

    <!-- Main Header -->
    <header class="bg-white border-b border-[#e3e3e0] py-4 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            
            <!-- Logo & Title -->
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-bag-shopping text-[#6b4735] text-2xl"></i>
                <h1 class="text-xl font-extrabold text-[#1b1b18]">معرض زين</h1>
            </div>

            <!-- Top Actions -->
            <div class="flex items-center gap-3">
                <a href="/cart" class="bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-semibold px-4 py-2 rounded-lg flex items-center gap-2 transition border border-gray-300">
                    <i class="fa-solid fa-cart-shopping"></i> السلة
                    <span class="bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">1</span>
                </a>
                <a href="#" class="bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-semibold px-4 py-2 rounded-lg flex items-center gap-2 transition border border-gray-300">
                    🔒 لوحة الأدمن
                </a>
            </div>

        </div>
    </header>

    <!-- Main Section -->
    <main class="max-w-7xl mx-auto px-4 py-8 flex-1 w-full">
        
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-8 flex gap-2">
            <input type="text" placeholder="ابحث عن حقيبة..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6b4735]">
            <button class="bg-[#6b4735] text-white px-6 py-2.5 rounded-lg font-bold hover:bg-[#523527] transition flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass"></i> بحث
            </button>
        </div>

        <!-- Hero Promo Banner -->
        <div class="bg-gradient-to-r from-gray-400 to-gray-600 rounded-2xl p-8 mb-10 text-center text-white relative overflow-hidden shadow-md">
            <div class="relative z-10">
                <span class="text-red-500 font-extrabold text-3xl md:text-5xl block mb-2">تطريزات</span>
                <h2 class="text-2xl md:text-3xl font-bold mb-4">اكتشفي تشكيلتنا الجديدة من الحقائب الفاخرة! ✨</h2>
                <a href="https://wa.me/970595636609" target="_blank" class="bg-white text-gray-900 hover:bg-gray-100 font-bold px-6 py-2 rounded-md shadow inline-block transition text-sm">
                    تواصل معنا الآن
                </a>
            </div>
            <div class="absolute inset-0 opacity-10 flex items-center justify-center text-9xl font-black select-none pointer-events-none">
                ZAIN
            </div>
        </div>

        <!-- Grid Layout: Sidebar + Products -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <!-- Sidebar Cards -->
            <aside class="md:col-span-1 flex flex-col gap-6">
                <!-- WhatsApp Card -->
                <div class="bg-[#f7f4f0] border border-[#e3e3e0] rounded-xl p-6 text-center shadow-sm flex flex-col items-center">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-green-500 text-3xl shadow-sm mb-3">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h3 class="font-bold text-base text-[#1b1b18]">معرض زين</h3>
                    <p class="text-xs text-gray-500 mt-1 mb-4">للحجز والاستفسار، تواصل معنا عبر الواتس اب!</p>
                    <a href="https://wa.me/970595636609" target="_blank" class="w-full bg-[#25D366] hover:bg-[#20ba5a] text-white text-sm font-medium py-2 rounded-lg flex items-center justify-center gap-2 transition">
                        <i class="fa-brands fa-whatsapp"></i> تواصل معنا
                    </a>
                </div>

                <!-- Instagram Card -->
                <div class="bg-[#f7f4f0] border border-[#e3e3e0] rounded-xl p-6 text-center shadow-sm flex flex-col items-center">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-pink-600 text-3xl shadow-sm mb-3">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <h3 class="font-bold text-base text-[#1b1b18]">تابعنا على الانستغرام</h3>
                    <p class="text-xs text-gray-500 mt-1 mb-4">tatrezat_zain@</p>
                    <a href="https://instagram.com/tatrezat_zain" target="_blank" class="w-full bg-[#6b4735] hover:bg-[#523527] text-white text-sm font-medium py-2 rounded-lg transition">
                        زيارة حسابنا
                    </a>
                </div>
            </aside>

            <!-- Product Display Area -->
            <section class="md:col-span-3">
                <h3 class="text-lg font-bold mb-4 text-[#6b4735]">أحدث الحقائب المتاحة</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <!-- Single Product Card -->
                    <div class="bg-white border border-[#e3e3e0] rounded-xl overflow-hidden shadow-sm flex flex-col">
                        <div class="aspect-square bg-gray-100 overflow-hidden relative">
                            <img src="https://via.placeholder.com/400x400" alt="شنتلة" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 flex flex-col flex-1 justify-between text-center">
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm">شنتلة</h4>
                                <p class="text-red-600 font-extrabold text-base mt-1">50 ش.ج</p>
                            </div>
                            <div class="mt-4 flex flex-col gap-2">
                                <button class="w-full bg-[#6b4735] hover:bg-[#523527] text-white text-xs py-2 rounded-lg font-medium transition flex items-center justify-center gap-1.5">
                                    <i class="fa-solid fa-cart-shopping"></i> أضف إلى السلة
                                </button>
                                <a href="https://wa.me/970595636609" target="_blank" class="w-full border border-green-500 text-green-600 hover:bg-green-50 text-xs py-1.5 rounded-lg font-medium transition flex items-center justify-center gap-1.5">
                                    <i class="fa-brands fa-whatsapp"></i> طلب مباشر
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- Brown Footer -->
    <footer class="bg-[#6b4735] text-[#f8f5f0] pt-10 pb-6 mt-12 w-full">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-right items-center">
                
                <!-- Cart Link Button -->
                <div class="flex justify-center">
                    <a href="/cart" class="bg-[#f3eae1] hover:bg-white text-[#6b4735] font-bold px-6 py-2.5 rounded-lg shadow transition flex items-center gap-2 text-sm">
                        <i class="fa-solid fa-bag-shopping"></i> سلة الشراء
                    </a>
                </div>

                <!-- Menu Links -->
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm">القائمة</h4>
                    <ul class="space-y-2 text-xs text-[#e2d7cd]">
                        <li><a href="#" class="hover:text-white transition">حقيبة الخصر</a></li>
                        <li><a href="#" class="hover:text-white transition">حقيبة الظهر</a></li>
                        <li><a href="https://wa.me/970595636609" class="hover:text-white transition">تواصل معنا</a></li>
                    </ul>
                </div>

                <!-- Contact Details -->
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm">التواصل</h4>
                    <ul class="space-y-2 text-xs text-[#e2d7cd]">
                        <li class="flex items-center justify-center md:justify-start gap-2">
                            <i class="fa-solid fa-phone"></i> +970 595 636 609
                        </li>
                        <li class="flex items-center justify-center md:justify-start gap-2">
                            <i class="fa-regular fa-envelope"></i> haghaibak.com
                        </li>
                        <li class="flex items-center justify-center md:justify-start gap-2">
                            <i class="fa-solid fa-globe"></i> haghabak.com
                        </li>
                    </ul>
                </div>

                <!-- Store / Social Info -->
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm">متجر حقائبك</h4>
                    <ul class="space-y-2 text-xs text-[#e2d7cd]">
                        <li>
                            <a href="https://facebook.com" target="_blank" class="hover:text-white transition flex items-center justify-center md:justify-start gap-2">
                                <i class="fa-brands fa-facebook"></i> متجر الحقائب
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/tatrezat_zain" target="_blank" class="hover:text-white transition flex items-center justify-center md:justify-start gap-2">
                                <i class="fa-brands fa-instagram"></i> haghaibak
                            </a>
                        </li>
                        <li>
                            <a href="https://youtube.com" target="_blank" class="hover:text-white transition flex items-center justify-center md:justify-start gap-2">
                                <i class="fa-brands fa-youtube"></i> متجر_haghaibak
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Copyright Line -->
            <div class="border-t border-[#825943] mt-8 pt-4 text-center text-xs text-[#d1c2b4]">
                جميع الحقوق محفوظة &copy; {{ date('Y') }} معرض زين.
            </div>
        </div>
    </footer>

</body>
</html>