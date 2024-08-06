<?php
include 'config.php'; // เชื่อมต่อกับฐานข้อมูล


// คำสั่ง SQL สำหรับดึงข้อมูลโซนตั้งบูธ
$sql = "SELECT zone_id, zone_name, zone_info, booth_count FROM zones";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>ข้อมูลโซนตั้งบูธ</title>
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
                <h4 class="header">ข้อมูลโซนตั้งบูธ</h4>
                <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>รหัสโซน</th>
                            <th>ชื่อโซน</th>
                            <th>ข้อมูลโซน</th>
                            <th>จำนวนบูธในโซน</th>
                            <th>ดูรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['zone_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['zone_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['zone_info']); ?></td>
                                    <td><?php echo htmlspecialchars($row['booth_count']); ?></td>
                                    <td>
                                        <a href="booth_details.php?zone_id=<?php echo urlencode($row['zone_id']); ?>" class="btn btn-info">ดูรายละเอียด</a>
                                    </td>
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
$conn->close(); // ปิดการเชื่อมต่อกับฐานข้อมูล
?>
