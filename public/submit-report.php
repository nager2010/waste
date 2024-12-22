<?php
require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// إعداد اتصال قاعدة البيانات
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'waste_report',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// التحقق من البيانات المرسلة
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reporter_name = $_POST['reporter_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $latitude = $_POST['latitude'] ?? '';
    $longitude = $_POST['longitude'] ?? '';
    
    // التحقق من وجود البيانات المطلوبة
    if (empty($reporter_name) || empty($description) || empty($latitude) || empty($longitude)) {
        die('جميع الحقول مطلوبة');
    }

    try {
        // معالجة الصور
        $images = [];
        if (!empty($_FILES['images'])) {
            $upload_dir = 'uploads/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    $file_name = uniqid() . '_' . $_FILES['images']['name'][$key];
                    $file_path = $upload_dir . $file_name;
                    
                    if (move_uploaded_file($tmp_name, $file_path)) {
                        $images[] = $file_path;
                    }
                }
            }
        }

        // حفظ البيانات في قاعدة البيانات
        Capsule::table('waste_reports')->insert([
            'reporter_name' => $reporter_name,
            'description' => $description,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'images' => json_encode($images),
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // إعادة التوجيه إلى صفحة الشكر
        header('Location: thank-you.html');
        exit;
    } catch (Exception $e) {
        die('حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
    }
}
?>
