<?php 
    include "header.php";   
    if(isset($_SESSION["StatusLogin1"])){
        if ($_SESSION["StatusLogin1"]!=1){
          $message = "กรุณา Login ก่อนเข้าใช้งาน";
                echo "<script type='text/javascript'>
                  alert('$message');
                  location.replace('member_login.php');
                </script>";
        }
    }else{
        $message = "กรุณา Login ก่อนเข้าใช้งาน";
            echo "<script type='text/javascript'>
                alert('$message');
                location.replace('member_login.php');
            </script>";
    }
	
	$GrandTotal=0;
	$ItemBooth=0;
	$ItemProduct=0;
	if(isset($_SESSION["strProductID"])){
		for($k=0;$k<count($_SESSION["strProductID"]);$k++){
			if($_SESSION["strProductID"][$k] == '' or $_SESSION["strProductID"][$k] == ' '){}
			else{

				$id=$_SESSION['strProductID'][$k];	//j_id 						
				$sql = "select * from tb_jobtitle where j_id=$id";
				$result = mysqli_query($conn,$sql);	
				$row = mysqli_fetch_array($result);

                $datestart=$row['j_datestart'];
                $datestop=$row['j_datestop'];
                $Datee=date("d/m/Y", strtotime($datestart)).' <b>ถึง</b> '.date("d/m/Y", strtotime($datestop));
				$j_price=$row["j_price"];
				$totalprice=$_SESSION['strQty'][$k]*$j_price;
				$GrandTotal=$GrandTotal+$totalprice;                     
				$ItemProduct=$ItemProduct+$_SESSION['strQty'][$k];
                $ItemBooth=$ItemBooth+$_SESSION['strQty'][$k];
                        
            }
		}
	}

    $sql = "SELECT * FROM tb_bank";
    $query = mysqli_query($conn,$sql); 
    $result = mysqli_fetch_assoc($query); 
    $bank_type = $result['bank_type'];
    $bank_name = $result['bank_name'];
    $bank_number = $result['bank_number'];
?>

    <br>             
    <div class="container ">
        <h3 class=""><b>ยืนยันการจองของท่าน</b></h3>
        <br>
        <div class="row">
            <div class="col-md-12">			
                <div class="card">
                    <div class="card-body white-color black-text rounded-bottom">						    
                        <h4 class="card-title">สรุปรายการจองทั้งหมด</h4>
                        <hr class="hr-black">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">จำนวนงานที่จองทั้งหมด</label>
                            <div class="col-sm-6">
                                <input type="text" name="txtevent" class="form-control text-right" id="txtevent" placeholder="" value="<?php echo number_format($count_item)?>" disabled>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">บาท</label>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">บูธที่จองทั้งหมด</label>
                            <div class="col-sm-6">
                                <input type="text" name="txtbooth" class="form-control text-right" id="txtbooth" placeholder="" value="<?php echo number_format($ItemBooth)?>" disabled>
                            </div>
                            <label for="" class="col-sm-2 col-form-label">บาท</label>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">จำนวนยอดรวมทั้งหมด</label>
                            <div class="col-sm-6">
                            <input type="text" name="txtgrandtotal" class="form-control text-right" id="txtgrandtotal" placeholder="" value="<?php echo number_format($GrandTotal)?>" disabled>
                            <input type="hidden" name="txtgrandtotal1" id="txtgrandtotal1" value="<?php echo $GrandTotal ?>">
                            </div>
                            <label for="" class="col-sm-2 col-form-label">บาท</label>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">			
                <div class="card">
                    <div class="card-body white-color black-text rounded-bottom">						    
                        <h4 class="card-title">กรุณาชำระเงิน เพื่อการจองที่สมบูรณ์</h4>
                        <hr class="hr-black">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">ธนาคาร</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $bank_type ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">ชื่อบัญชี</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $bank_name?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">เลขที่บัญชี</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo $bank_number?>" disabled>
                            </div>
                        </div>
                        <hr class="hr-black">
                        <h4 class="card-title">อัพโหลดหลักฐานการชำระเงิน</h4>
                        <div class="custom-file">
			                <input type="file" class="custom-file-input" accept="image/*" id="file" name="image" onchange="loadFile(event);" >
			                <label class="custom-file-label" for="file">ส่งหลักฐานการชำระเงิน</label>
                            <p><center><img id="output" width="200"/></center></p>                    
			            </div>
                    </div>
                    <br><br><br><br><br><br>
                </div>
            </div>
        </div>
        <br><br>
        <div class="form-group row">
            <div class="col-sm-4"></div>
		    <div class="col-sm-5">
                <button type="button" class="btn btn-orange" onclick="return Insert_Reservenumber()">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ยืนยันการจองของท่าน
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </button>
            </div>
            <div class="col-sm-2"></div>
		</div> 
        <br><br>           
    </div>
    <script type="text/javascript">
       var loadFile = function(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
        function Insert_Reservenumber(){

            var txtgrandtotal1=document.getElementById('txtgrandtotal1').value;
            var file = document.getElementById('file').value;

            if(file==''){
                alert('กรุณาอัพโหลดหลักฐานการชำระเงิน');
                return false;
            }

            var form_data = new FormData();
            form_data.append("file", document.getElementById('file').files[0]);
            form_data.append('txtgrandtotal1', $('#txtgrandtotal1').val());         

            $.ajax({
                url:"insert_booking.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,  
                success:function(data)
                {
                    alert(data);
                    if(data=='จองบูธสำเร็จ กรุณารอเจ้าหน้าที่ยื่นยันการชำระเงิน'){
                        location.replace("web_booking.php");
                    }
                }
            });		
        }
    </script>



<?php include "footer.php"; ?>