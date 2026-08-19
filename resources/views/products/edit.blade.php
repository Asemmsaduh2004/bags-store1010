<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل الحقيبة</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
</head>
<body class="p-5 bg-light">
    <div class="container col-md-6">
        <h2 class="mb-4">تعديل المنتج</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">اسم المنتج:</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">السعر:</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">تحديث البيانات</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-2">إلغاء</a>
        </form>
    </div>
</body>
</html>