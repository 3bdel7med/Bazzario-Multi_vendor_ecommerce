<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تأكيد التسجيل</title>
</head>
<body style="font-family: sans-serif; text-align: center; padding: 20px;">
    <!-- استدعاء المتغير العام $user الذي قمنا بتعريفه في كلاس الـ Mailable -->
    <h2>أهلاً بك يا {{ $user->name }}! 😍</h2>
    <p>تم إنشاء حسابك بنجاح باستخدام البريد الإلكتروني: <strong>{{ $user->email }}</strong></p>
    <p>نحن سعداء جداً بانضمامك إلينا.</p>
</body>
</html>
