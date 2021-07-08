<?php 

    include("../connect.php");

    $a_id=$_SESSION["a_id"];
    $a_name=$_POST['a_name'];
    $a_surname=$_POST['a_surname'];
    $a_username=$_POST['a_username'];
    $a_password=md5($_POST['a_password']);

    $sql="SELECT * from tb_admin where (a_name='$a_name' and a_surname='$a_surname')
            and a_id<>'$a_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    $message='';
    if($count==0){

        $sql1="SELECT * from tb_admin where (a_username='$a_username')
            and a_id<>'$a_id'";
        $result1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($result1);

        $message='';
        if($count1==0){
            $allow = array("jpg", "jpeg", "gif", "png");
            $todir = 'a_img/';
                
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
                
                        $sql="update tb_admin set a_name='$a_name',
                            a_surname='$a_surname', a_username='$a_username',
                            a_password='$a_password',
                            a_img='$FileName'
                            where a_id='$a_id'";
                              
                        if ($conn->query($sql) === TRUE) {
                            $_SESSION["a_img"]=$FileName;
                            $message='แก้ไขข้อมูลแอดมินเรียบร้อย'; 
                        } else {
                            $message='ไม่สามารถแก้ไขข้อมูลแอดมินได้'; 
                        }                                   
                    }
                } 
            }

        }else{
            $message='ชื่อผู้ใช้ซ้ำในระบบ';
        }
       
    }else{
      $message='ชื่อ-นามสกุลซ้ำในระบบ';
    }
    echo $message;
    
?>
