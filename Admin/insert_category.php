<?php 

    include("../connect.php");

    $txt_category_insert=$_POST['txt_category_insert'];

    $sql="SELECT * from tb_category where c_name='$txt_category_insert'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    $message='';
    if($count==0){

      $sql="INSERT INTO tb_category(c_name) 
              VALUES ('$txt_category_insert')";
      if ($conn->query($sql) === TRUE) {
        $message='เพิ่มข้อมูลหมวดหมู่เรียบร้อย'; 
      } else {
        $message='ไม่สามารถเพิ่มข้อมูลหมวดหมู่ได้'; 
      }

    }else{
      $message='ชื่อหมวดหมู่ซ้ำในระบบ';
    }

    echo $message;
    
?>
