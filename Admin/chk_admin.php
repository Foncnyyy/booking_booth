<?php 

    include("../connect.php");

    if(isset($_POST['a_username'])){
                  
        $a_username = $_POST['a_username'];
        $a_password = md5($_POST['a_password']);
 
        $sql="SELECT * FROM tb_admin WHERE a_username='".$a_username."' AND  a_password='".$a_password."' ";
        $result = mysqli_query($conn,$sql);
				
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);

            $_SESSION["a_id"] = $row["a_id"];
            $_SESSION["a_name"] = $row["a_name"];
            $_SESSION["a_img"]= $row["a_img"];
            $_SESSION["StatusLoginAdmin1"]=1;      

            Header("Location:index.php");         
        }else{
            echo "<script>";
            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
            echo "</script>";
        }
    }else{
        Header("Location:Admin_login.php"); //user & password incorrect back to login again
    }
?>