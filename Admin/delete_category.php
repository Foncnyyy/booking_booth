<?php 

    include("../connect.php");

    $c_id=$_POST['c_id'];

    $sql="SELECT * from tb_jobtitle where c_id='$c_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count==0){
        $sql="delete from tb_category where c_id='$c_id'";
        if ($conn->query($sql) === TRUE) {
            $message='ลบข้อมูลหมวดหมู่เรียบร้อย'; 
        } else {
            $message='ไม่สามารถลบข้อมูลหมวดหมู่ได้'; 
        }
    }else{
        $message='มีการผูกหมวดหมู่กับบูธอยู่ ไม่สามารถทำการลบได้'; 
    }
    
    echo $message;
    
?>
