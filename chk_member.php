<?php 

    session_start();
    include("connect.php");

    if(isset($_POST['m_username'])){
                  
        $m_username = $_POST['m_username'];
        $m_password = md5($_POST['m_password']);
 
        $sql="SELECT * FROM tb_member WHERE  m_username='".$m_username."' AND  m_password='".$m_password."' ";
        $result = mysqli_query($conn,$sql);
				
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);

            $_SESSION["m_id"] = $row["m_id"];
            $_SESSION["m_name"] = $row["m_name"]; 
            $_SESSION["StatusLogin1"]=1;       
            Header("Location:web_booking.php");         
        }else{
            echo "<script>";
            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
            echo "</script>";
        }
    }else{
        Header("Location:login.php"); //user & password incorrect back to login again
    }
?>