<?php 

    include("../connect.php");

    $j_id=$_POST['j_id'];

    $sql="SELECT * from tb_bookdetail where j_id='$j_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count==0){
        $sql="delete from tb_jobtitle where j_id='$j_id'";
        if ($conn->query($sql) === TRUE) {
            $message='ลบข้อมูลการจัดงานเรียบร้อย'; 
        } else {
            $message='ไม่สามารถลบข้อมูลการจัดงานได้'; 
        }
    }else{
        $message='มีการจิงบูธในระบบแล้ว ไม่สามารถลบได้'; 
    }
    
    echo $message;
    
?>
