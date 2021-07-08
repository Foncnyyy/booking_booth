<?php 
    session_start();
    include("connect.php");

        $m_id=$_SESSION["m_id"];
        $m_name=$_POST['m_name'];        
        $m_surname=$_POST['m_surname'];
        $m_email=$_POST['m_email'];
        $m_tel=$_POST['m_tel'];
        $m_username=$_POST['m_username'];
        $m_password=md5($_POST['m_password']);

        $sql="SELECT * from tb_member where (m_name='$m_name' and m_surname='$m_surname') and (m_id<>'$m_id')";
        $result = mysqli_query($conn,$sql);				
        if(mysqli_num_rows($result)==0){

            $sql1="SELECT * from tb_member where (m_username='$m_username') and (m_id<>'$m_id') ";
            $result1 = mysqli_query($conn,$sql1);				
            if(mysqli_num_rows($result1)==0){

                $sql = "update tb_member set m_name='$m_name', m_surname='$m_surname', 
                m_username='$m_username',m_password='$m_password',m_email='$m_email',m_tel='$m_tel'
                    where m_id='$m_id'";              
                if ($conn->query($sql) === TRUE) {
                    echo "<script>";
                    echo "alert(\" แก้ไขข้อมูลเรียบร้อย\");"; 
                    echo "window.location=\"member_profile.php\";";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert(\" ไม่สามารถแก้ไขข้อมูลได้\");"; 
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