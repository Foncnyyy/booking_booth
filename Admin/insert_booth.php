<?php 

    include("../connect.php");

    $txt_boothname_insert=$_POST['txt_boothname_insert'];
    $txtcategoryid_insert=$_POST['txtcategoryid_insert'];
    $txtdetail_insert=$_POST['txtdetail_insert'];
    $txt_boothplace_insert=$_POST['txt_boothplace_insert'];
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
    $txt_boothtotal_insert=$_POST['txt_boothtotal_insert'];
    $txt_boothprice_insert=$_POST['txt_boothprice_insert'];

    $sql="SELECT * from tb_jobtitle where j_name='$txt_boothname_insert' and c_id='$txtcategoryid_insert'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    $message='';
    if($count==0){

        $allow = array("jpg", "jpeg", "gif", "png");
        $todir = '../Image_Booth/';
            
        if ( !!$_FILES['file']['tmp_name'] ) // is the file uploaded yet?
        {
  
            $file=$_FILES['file']['name'];
            $extension = strrchr( $file , '.' );
            $FileName=$file;
  
            $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file
            
            if ( in_array( end($info), $allow) ) // is this file allowed
            {
                if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($FileName ) ) )
                {
            
                    $sql="INSERT INTO tb_jobtitle(j_name,j_detail, j_price, j_totalbooth,j_totalbook,
                            j_datestart,j_datestop,c_id,j_place,j_img) 
                    VALUES ('$txt_boothname_insert','$txtdetail_insert','$txt_boothprice_insert','$txt_boothtotal_insert','0',
                            '$date1','$date2','$txtcategoryid_insert','$txt_boothplace_insert','$FileName')";
                    if ($conn->query($sql) === TRUE) {
                        $message='เพิ่มข้อมูลงานเรียบร้อย'; 
                    } else {
                        $message='ไม่สามารถเพิ่มข้อมูลงานได้'; 
                    }
                                    
                }
            } 
        }
    }else{
      $message='ชื่องานซ้ำในระบบ';
    }
    echo $message;
    
?>
