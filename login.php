<!DOCTYPE html>
<html lang="th">
<head>
    <!-- ส่วนนี้ใช้สำหรับกำหนดข้อมูลพื้นฐานของหน้าเว็บ เช่น ชุดอักขระ (charset), การรองรับขนาดหน้าจอ (viewport), และชื่อของหน้า (title) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- เชื่อมต่อไฟล์ CSS สำหรับการตกแต่งหน้าเว็บ -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- ส่วนหัวของหน้าเว็บ (หัวเรื่อง) -->
    <h2>Login</h2>

    <!-- ฟอร์มสำหรับกรอกข้อมูลเพื่อเข้าสู่ระบบ -->
    <form action="main.php" method="post">
        <!-- ป้ายกำกับและช่องกรอกข้อมูลสำหรับ E-mail -->
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <!-- ป้ายกำกับและช่องกรอกข้อมูลสำหรับรหัสผ่าน -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <!-- ปุ่มสำหรับยืนยันการเข้าสู่ระบบ -->
        <button type="submit">Login</button>
    </form>

    <!-- ลิงก์ไปยังหน้าลงทะเบียนในกรณีที่ผู้ใช้ยังไม่มีบัญชี -->
    <p>ยังไม่ได้เป็นสมาชิก? <a href="register.php">ลงทะเบียนที่นี่</a></p>
</body>
</html>
