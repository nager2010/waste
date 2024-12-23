# نظام إدارة بلاغات النفايات

نظام متكامل لإدارة بلاغات النفايات والقمامة في المدن، مبني باستخدام Laravel و Filament.

## المميزات
- نظام تسجيل البلاغات للمواطنين
- تحديد موقع البلاغ على الخريطة
- رفع صور متعددة للبلاغ
- لوحة تحكم متكاملة للإداريين
- متابعة حالة البلاغات
- تقارير وإحصائيات

## المتطلبات
- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM

## خطوات التثبيت

1. نسخ المشروع
```bash
git clone https://github.com/nager2010/waste.git
cd waste
```

2. تثبيت المكتبات المطلوبة
```bash
composer install
npm install
```

3. إعداد ملف البيئة
```bash
cp .env.example .env
php artisan key:generate
```

4. إعداد قاعدة البيانات
- إنشاء قاعدة بيانات جديدة
- تعديل ملف .env بمعلومات قاعدة البيانات:
```
DB_DATABASE=waste_report
DB_USERNAME=root
DB_PASSWORD=
```

5. تشغيل الترحيلات وبناء الأصول
```bash
php artisan migrate
npm run build
```

6. تشغيل المشروع
```bash
php artisan serve
```

## المساهمة
نرحب بمساهماتكم في تطوير المشروع. يرجى اتباع الخطوات التالية:
1. عمل Fork للمشروع
2. إنشاء فرع جديد للميزة
3. تقديم Pull Request

## الرخصة
هذا المشروع مرخص تحت رخصة MIT
