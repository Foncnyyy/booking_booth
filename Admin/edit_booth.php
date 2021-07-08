<?php 

    include("../connect.php");

    $txt_boothid_edit=$_POST['txt_boothid_edit'];
    $txt_boothname_edit=$_POST['txt_boothname_edit'];
    $txtcategoryid_edit=$_POST['txtcategoryid_edit'];
    $txtdetail_edit=$_POST['txtdetail_edit'];
    $txt_boothplace_edit=$_POST['txt_boothplace_edit'];
    $date1_edit=$_POST['date1_edit'];
    $date2_edit=$_POST['date2_edit'];
    $txt_boothtotal_edit=$_POST['txt_boothtotal_edit'];
    $txt_boothprice_edit=$_POST['txt_boothprice_edit'];

    $sql="SELECT * from tb_jobtitle where (j_name='$txt_boothname_edit' and c_id='$txtcategoryid_edit')
            and j_id<>'$txt_boothid_edit'";
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
            
                    $sql="update tb_jobtitle set j_name='$txt_boothname_edit',
                            j_detail='$txtdetail_edit', j_price='$txt_boothprice_edit',
                            j_totalbooth='$txt_boothtotal_edit',
                            j_datestart='$date1_edit',j_datestop='$date2_edit',
                            c_id='$txtcategoryid_edit',j_place='$txt_boothplace_edit',
                            j_img='$FileName'
                        where j_id='$txt_boothid_edit'";
                          
                    if ($conn->query($sql) === TRUE) {
                        $message='แก้ไขข้อมูลการจัดงานเรียบร้อย'; 
                    } else {
                        $message='ไม่สามารถแก้ไขข้อมูลการจัดงานงานได้'; 
                    }                                   
                }
            } 
        }
    }else{
      $message='ชื่องานซ้ำในระบบ';
    }
    echo $message;
    
?>
