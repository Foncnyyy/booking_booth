    
<?php include "header.php"; ?>  
    <?php
		$count_item=0;
		if(isset($_SESSION["strProductID"])){
			for($k=0;$k<count($_SESSION["strProductID"]);$k++){
				if($_SESSION["strProductID"][$k] == '' or $_SESSION["strProductID"][$k] == ' '){}
				else{
					$count_item=$count_item+1;
				}
			}
		}
	?>
    <br>
    <div class="container ">
        <h3 class=""><b>ข้อมูลการจองของท่าน</b></h3>
        <br>
        <div class="row">
            <div class="col-md-12">			
                <div class="card">
                    <div class="card-body white-color black-text rounded-bottom">						    
                        <h4 class="card-title">เลือกงานทั้งหมด ( <?php echo $count_item ?> งาน) 		
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php	
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
                        
                        

		?>

                        <div class="row">
                            <div class="col-md-4">
                                <img src="Image_Booth/2222222.jpg" width="350px";>
                            </div>
                            <div class="col-md-6">			
                                <div class="card">
                                    <div class="card-body white-color black-text rounded-bottom">

                                        <div class="form-group row">
                                            <div class="col-sm-10"></div>
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-danger btn-number" data-type="plus" data-field="quant[1]" onClick="JavaScript:deleted_product(<?php echo $_SESSION["strProductID"][$k]; ?>)">ลบ</button>										
                                            </div>                                                   
                                        </div>	

                                        <h6><b>ชื่องาน</b> <?php echo  $row['j_name'];?> </h6>
                                        <h6><b>สถานที่</b> <?php echo  $row['j_place'];?></h6>
                                        <h6><b>วันที่ออกบูธ</b> <?php echo $Datee?></h6>
                                        <h6><b>ราคา</b> <?php echo number_format($j_price)?> บาท</h6>
                                        <hr class="hr-black">	
                                        
                                        <div class="form-group row">
                                            <h6><b>&nbsp;&nbsp;&nbsp;&nbsp;จำนวนบูธที่ต้องการจอง</b></h6>
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-primary" onclick="return button_UpdateProduct(<?php echo $j_price?>,'reduce','<?php echo $k?>')">-</button>
                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="col-sm-4">
                                                <input type="text" name="txtqty<?php echo $k?>" id="txtqty<?php echo $k?>" value="<?php echo $_SESSION['strQty'][$k]?>" class="form-control text-right" disabled>
                                                <input type="hidden" name="txtqty1<?php echo $k?>" id="txtqty1<?php echo $k?>" value="<?php echo $_SESSION['strQty'][$k]?>">
                                            </div>
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-primary" onclick="return  button_UpdateProduct(<?php echo $j_price?>,'add','<?php echo $k?>')">+</button>	 
                                            </div>                   
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-form-label">ยอดรวมทั้งหมด</label>
                                            <div class="col-sm-6">
                                            <input type="text" name="txttoal<?php echo $k?>" id="txttoal<?php echo $k?>" class="form-control text-right"  placeholder="" value="<?php echo number_format($totalprice)?>" disabled>
                                            <input type="hidden" name="txttoal1<?php echo $k?>" id="txttoal1<?php echo $k?>" value="<?php echo number_format($totalprice)?>">
                                            </div>
                                            <label for="" class="col-sm-2 col-form-label">บาท</label>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        						
		<?php
					}
				}
			}	
		?>
        <?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////// ?>
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
        <div class="form-group row">
            <div class="col-sm-4"></div>
		    <div class="col-sm-5">
                <button type="button" class="btn btn-orange"  onClick="JavaScript:ClickCheckout()" >
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
    </div>
    <br><br>

    
    <script>
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function button_UpdateProduct(price,Type,txtnum){
            
            var txtqty='txtqty' + txtnum;
            var txtqty1='txtqty1' + txtnum;
            var txttoal='txttoal' + txtnum;
            var txttoal1='txttoal1' + txtnum;

            var numbernew=0;
            var number=document.getElementById(txtqty).value;
            var txtgrandtotal=document.getElementById("txtgrandtotal1").value;
            var txtbooth=document.getElementById("txtbooth").value;

            if(Type=='reduce'){
                numbernew=Number(number)-1;
                if(numbernew>0){
                    document.getElementById(txtqty).value=numbernew;
                    document.getElementById(txtqty1).value=numbernew;
                    var cal_txttoal=Number(numbernew)*price;
                    document.getElementById(txttoal).value=numberWithCommas(cal_txttoal);
                    document.getElementById(txttoal1).value=cal_txttoal;
                          
                    var cal_grandtotall=Number(txtgrandtotal)-Number(price);
                    document.getElementById("txtgrandtotal").value=numberWithCommas(cal_grandtotall);
                    document.getElementById("txtgrandtotal1").value=cal_grandtotall;

                    var cal_boothtotall=Number(txtbooth)-1;
                    document.getElementById("txtbooth").value=cal_boothtotall;
                }               
            }else{
                numbernew=Number(number)+1;               
                document.getElementById(txtqty).value=numbernew;
                document.getElementById(txtqty1).value=numbernew;
                var cal_txttoal=Number(numbernew)*price;
                document.getElementById(txttoal).value=numberWithCommas(cal_txttoal);
                document.getElementById(txttoal1).value=cal_txttoal;

                var cal_grandtotall=Number(txtgrandtotal)+Number(price);
                document.getElementById("txtgrandtotal").value=numberWithCommas(cal_grandtotall);
                document.getElementById("txtgrandtotal1").value=cal_grandtotall;

                var cal_boothtotall=Number(txtbooth)+1;
                document.getElementById("txtbooth").value=cal_boothtotall;
            }
            
        }
        function uzXmlHttp(){
			var xmlhttp = false;
			try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}catch(e){
				try{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}catch(e){
					xmlhttp = false;
				}
			}
	
			if(!xmlhttp && document.createElement){
				xmlhttp = new XMLHttpRequest();
			}
			return xmlhttp;
		}
        function deleted_product(txtkey){
			var url = 'Deleted.php?goodid='+txtkey; 
			xmlhttp = uzXmlHttp();
			xmlhttp.open("GET", url, false);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=tis-620"); // set Header
			xmlhttp.send(null);
			location.reload();
		
		}
        function ClickCheckout(){
            var url = "checkout.php"; 
			location.replace(url);
        }
    </script>

<?php include "footer.php"; ?>