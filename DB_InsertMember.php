<?php 
    session_start();
    include("connect.php");

        $m_name=$_POST['m_name'];        
        $m_surname=$_POST['m_surname'];
        $m_email=$_POST['m_email'];
        $m_tel=$_POST['m_tel'];
        $m_username=$_POST['m_username'];
        $m_password=md5($_POST['m_password']);

        $sql="SELECT * from tb_member where m_name='$m_name' and m_surname='$m_surname'";
        $result = mysqli_query($conn,$sql);				
        if(mysqli_num_rows($result)==0){

            $sql1="SELECT * from tb_member where m_username='$m_username'";
            $result1 = mysqli_query($conn,$sql1);				
            if(mysqli_num_rows($result1)==0){

                $sql = "INSERT INTO tb_member(m_name, m_surname, m_username,m_password,m_email,m_tel)
                VALUES ('$m_name', '$m_surname', '$m_username', '$m_password', '$m_email','$m_tel')";              
                if ($conn->query($sql) === TRUE) {
                    echo "<script>";
                    echo "alert(\" สมัครสมาชิกเรียบร้อย\");"; 
                    echo "window.location=\"member_login.php\";";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert(\" ไม่สามารถสมัครสมาชิกได้\");"; 
                    echo "window.history.back()";
                    echo "</script>";
                }

            }else{
                echo "<script>";
                echo "alert(\" มีชื่อผู้ใช้งานนี้ในระบบแล้ว\");"; 
                echo "window.history.back()";
                echo "</script>";
            }

        }else{
            echo "<script>";
            echo "alert(\" มีชื่อ-นามสกุลนี้ในระบบแล้ว\");"; 
            echo "window.history.back()";
            echo "</script>";
        }
?>