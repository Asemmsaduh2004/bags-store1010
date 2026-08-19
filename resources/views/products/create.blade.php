<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة إداراة المنتجات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
</head>
<body class="p-4 bg-light">
    <div class="container">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">لوحة تحكم الأدمن 🔒</h2>
            <div>
                <a href="/" class="btn btn-outline-primary me-2" target="_blank">عرض المتجر 🌐</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">تسجيل الخروج 🚪</button>
                </form>
            </div>
        </div>

        <div class="row">
            <!-- نموذج إضافة حقيبة جديدة -->
            <div class="col-md-5 mb-4">
                <div class="card p-4 shadow-sm">
                    <h4 class="fw-bold mb-3">إضافة حقيبة جديدة</h4>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">اسم المنتج/الحقيبة:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">السعر (ر.س):</label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">صورة المنتج:</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-2">حفظ المنتج</button>
                    </form>
                </div>
            </div>

            <!-- جدول حذف وإدارة المنتجات -->
            <div class="col-md-7">
                <div class="card p-4 shadow-sm">
                    <h4 class="fw-bold mb-3">المنتجات الحالية (للإدارة والحذف)</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>الصورة</th>
                                    <th>الاسم</th>
                                    <th>السعر</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/50' }}" width="50" height="50" style="object-fit:cover;" class="rounded">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }} ر.س</td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('هل أنت تأكد من حذف هذا المنتج؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">حذف 🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-muted">لا توجد منتجات حالياً.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>