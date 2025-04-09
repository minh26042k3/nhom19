<!-- resources/views/sinhvien/index.blade.php -->  
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Danh Sách Sinh Viên</title>  
</head>  
<body>  
    <form action="/themsv" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nhập tên">
        <button type="submit">Gửi</button>
    </form>
    
    
</body>  
</html>  