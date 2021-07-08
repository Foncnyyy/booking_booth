<?php 

    include("../connect.php");

    $txt_category_id_edit=$_POST['txt_category_id_edit'];
    $txt_category_name_edit=$_POST['txt_category_name_edit'];

    $sql="SELECT * from tb_category where c_name='$txt_category_name_edit' and c_id<>'$txt_category_id_edit'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count==0){
        $sql="UPDATE tb_category SET c_name='$txt_category_name_edit' WHERE c_id='$txt_category_id_edit'";
        if ($conn->query($sql) === TRUE) {
            $message='แก้ไขข้อมูลหมวดหมู่เรียบร้อย'; 
        } else {
            $message='ไม่สามารถแก้ไขข้อมูลหมวดหมู่ได้'; 
        }
    }else{
        $message='ชื่อหมวดหมู่ซ้ำในระบบ'; 
    }
    
    echo $message;
    
?>
