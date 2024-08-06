<?php
include 'config.php'; // เชื่อมต่อกับฐานข้อมูล


// รับค่า zone_id จาก URL
$zone_id = isset($_GET['zone_id']) ? $_GET['zone_id'] : '';

if (empty($zone_id)) {
    echo "ข้อมูลโซนไม่ถูกต้อง";
    exit();
}

// คำสั่ง SQL สำหรับดึงข้อมูลบูธ
$sql = "SELECT booth_id, booth_name, booth_size, booth_status, booth_price FROM booths WHERE zone_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $zone_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>รายละเอียดบูธ</title>
    <style type="text/css">
        .container-custom {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
        }
        .header {
            color: red;
            text-align: center;
        }
        .footer {
            color: white;
        }
    </style>
</head>
<body style="background-color: #330000;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 container-custom" style="margin-top: 50px;">
                <h4 class="header">รายละเอียดบูธ</h4>
                <a href="main.php" class="btn btn-secondary">กลับ</a>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>รหัสบูธ</th>
                            <th>ชื่อบูธ</th>
                            <th>ขนาดบูธ</th>
                            <th>สถานะปัจจุบัน</th>
                            <th>ราคา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['booth_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['booth_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['booth_size']); ?></td>
                                    <td>
                                        <?php
                                        $status = htmlspecialchars($row['booth_status']);
                                        if ($status == 0) {
                                            echo "ว่าง";
                                        } elseif ($status == 1) {
                                            echo "อยู่ระหว่างตรวจสอบ";
                                        } else {
                                            echo "จองแล้ว";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['booth_price']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">ไม่มีข้อมูล</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
</body>
</html>

<?php
$stmt->close();
$conn->close(); // ปิดการเชื่อมต่อกับฐานข้อมูล
?>
