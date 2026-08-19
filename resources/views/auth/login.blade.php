<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل دخول الأدمن</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container col-md-4">
        <div class="card p-4 shadow-sm">
            <h3 class="text-center mb-4 fw-bold">دخول لوحة التحكم 🔒</h3>
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني:</label>
                    <input type="email" name="email" class="form-control" required value="admin@gmail.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">كلمة السر:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark w-100" style="background-color: #73523f;">دخول</button>
            </form>
        </div>
    </div>
</body>
</html>