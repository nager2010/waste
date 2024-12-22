<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شكراً لك</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');
        
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .thank-you-card {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 90%;
        }
        
        .icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 1rem;
        }
        
        h1 {
            color: #28a745;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        
        p {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        .btn-home {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 25px;
            font-weight: 500;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .btn-home:hover {
            background-color: #218838;
            border-color: #218838;
            color: white;
        }
    </style>
</head>
<body>
    <div class="thank-you-card">
        <div class="icon">🌟</div>
        <h1>شكراً لك!</h1>
        <p>شكراً على مساهمتك في الحفاظ على نظافة مدينتنا. سيتم التعامل مع بلاغك في أقرب وقت ممكن.</p>
        <a href="{{ route('waste-reports.create') }}" class="btn-home">العودة للصفحة الرئيسية</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
