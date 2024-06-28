<?php
function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=super_1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);

    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}


// truy vấn nhiều dữ liệu
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);

    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

function check($input) {
    // Thực hiện logic kiểm tra hoặc làm sạch dữ liệu tại đây
    // Ví dụ, bạn có thể sử dụng htmlspecialchars để ngăn chặn các tấn công XSS
    return htmlspecialchars(trim($input));
}

function checkk($input) {
    // Thực hiện logic kiểm tra hoặc làm sạch dữ liệu tại đây
    // Sử dụng htmlspecialchars để ngăn chặn XSS
    // Sử dụng PDO::quote để ngăn chặn SQL injection
    $cleaned_input = htmlspecialchars(trim($input));

    // Nếu bạn đang sử dụng PDO, bạn có thể thêm bước sau:
    // $cleaned_input = $pdo->quote($cleaned_input);

    return $cleaned_input;
}

// truy vấn  1 dữ liệu
function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
pdo_get_connection();

use PHPMailer\PHPMailer\PHPMailer;
function sendPass($email, $username, $pass) {
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    $mail = new PHPMailer(true);
    try {                             
       
        //Recipients
        $mail->setFrom('caygame12345678910@gmail.com', 'Dang Tuan');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mau khau cua tai khoan ' .$username.' la: ' .$pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>