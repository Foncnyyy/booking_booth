<?php 

    include("connect.php");
   
    $txtgrandtotal1=$_POST['txtgrandtotal1'];

    $message='';

    $sql="SELECT * FROM tb_booking";
    $result = mysqli_query($conn,$sql);           
    if(mysqli_num_rows($result)==0){
        $book_id=1;  
    }
    else{
        $sql1="SELECT max(book_id) as book_id FROM tb_booking";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_array($result1);
        $book_id=$row1["book_id"]+1;
    }

    $docu_first = 'PO';

    $sql_runno = "select  max(substring(book_no,3,5)) as book_no from tb_booking";
    $query = mysqli_query($conn, $sql_runno);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if (count($result) == 0) {
        $runno = $docu_first . "00001";
    } else {
        $docuno = $result["book_no"] + 1;
        if ($docuno < 10) {
            $docuno = "0000" . $docuno;
        } else if ($docuno < 100) {
            $docuno = "000" . $docuno;
        } else if ($docuno < 1000) {
            $docuno = "00" . $docuno;
        } else if ($docuno < 10000) {
            $docuno = "0" . $docuno;
        } else if ($docuno < 100000) {
            $docuno = "" . $docuno;
        }
        $runno = $docu_first . $docuno;
    }
    

    if(isset($_SESSION["strProductID"])){

        $allow = array("jpg", "jpeg", "gif", "png");
        $todir = 'ImageSlip/';
          
        if ( !!$_FILES['file']['tmp_name'] ) // is the file uploaded yet?
        {

            $file=$_FILES['file']['name'];
            $extension = strrchr( $file , '.' );
            $FileName=$todir.$book_id.$extension;
            $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file
          
            if ( in_array( end($info), $allow) ) // is this file allowed
            {
                if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($FileName ) ) )
                {

                    $m_id=$_SESSION["m_id"];

                    $sql = "INSERT INTO tb_booking(book_id,book_no,book_date,book_status,book_grandtotal,book_img,m_id)
                            VALUES ('$book_id', '$runno',now(),'T','$txtgrandtotal1','$FileName',$m_id)";
                    if ($conn->query($sql) === TRUE) {
                        "<br>New record created successfully";
                    } else {
                        "<br>Error: " . $sql . "<br>" . $conn->error;
                    }
            
                    for($k=0;$k<count($_SESSION["strProductID"]);$k++){
                        if($_SESSION["strProductID"][$k] == '' or $_SESSION["strProductID"][$k] == ' '){}
                        else{
            
                            $listno_order=$k+1;
                            $Qty=$_SESSION['strQty'][$k];
                            $j_id =$_SESSION['strProductID'][$k];
            
                            $sql = "select * from tb_jobtitle where j_id =$j_id ";
                            $result = mysqli_query($conn,$sql);	
                            $row = mysqli_fetch_array($result);
            
                            $j_totalbook=$row["j_totalbook"];
                            $j_totalbook_new=$j_totalbook+$_SESSION['strQty'][$k];
                            $j_price=$row["j_price"];
                            $d_amount=$_SESSION['strQty'][$k]*$j_price;
                            
                            $sql = "INSERT INTO tb_bookdetail(d_list,d_qty,d_price,d_amount,j_id,book_id)
                            VALUES ('$listno_order','$Qty','$j_price','$d_amount','$j_id','$book_id')";
                            $conn->query($sql); 
                            
                            $sql = "update tb_jobtitle set j_totalbook='$j_totalbook_new' where j_id =$j_id";
                            $conn->query($sql); 


                        }
                    } 
                    
                    $message='จองบูธสำเร็จ กรุณารอเจ้าหน้าที่ยื่นยันการชำระเงิน'; 

                    for($i=0;$i<count($_SESSION["strProductID"]);$i++){                     
                        $_SESSION["strProductID"][$i] = "";
                         $_SESSION["strQty"][$i] = "";		                                     
                    }

                }
            }
            else
            {
              $message='ไม่สามารถทำการจองบูธได้'; 
            }
        }
    }

    echo $message;
    
?>
