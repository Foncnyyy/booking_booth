<?php include "header.php"; ?>
<?php include "slide_brand.php"; ?>
    
    <br>
    <div class="container ">
        <h3 class=""><b>เปิดให้จองตอนนี้</b></h3>
        <br>
        <div class="row">
            <?php
            $txtnum=1;
            $sql ="SELECT * FROM tb_jobtitle";
            if(isset($_GET['c_id'])) {
                $c_id=$_GET['c_id'];
                $sql.=" where c_id='$c_id'";
            }
            $query = mysqli_query($conn,$sql);
            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC))
            {             
            ?>
          
                <div class="col-md-4">
                    <!-- Card Dark -->
                    <div class="card">
                        <!-- Card image -->
                        <div class="view overlay" >
                            <?php
                            if($result['j_img']==''){
                            ?>
                                <img class="card-img-top" src="Image_Booth/2222222.jpg" alt="Card image cap"> 
                            <?php
                            }else{
                            ?>
                                <img class="card-img-top" src="Image_Booth/<?php echo $result['j_img'] ?>" alt="Card image cap"> 
                            <?php   
                            }
                            ?>
                                             
                        </div>
                        <!-- Card content -->
                        <div class="card-body indigo rounded-bottom" style="background-color: #fbfbfb !important;">             
                            <h4 class="card-title"><?php echo $result['j_name']; ?></h4>
                            <hr class="hr-black">
                            <?php
                                $j_id=$result['j_id'];
                                $datestart=$result['j_datestart'];
                                $datestop=$result['j_datestop'];
                                $Datee=date("d/m/Y", strtotime($datestart)).' <b>ถึง</b> '.date("d/m/Y", strtotime($datestop));
                                $j_totalbooth=$result['j_totalbooth'];
                                $j_totalbook=$result['j_totalbook'];
                                if($j_totalbooth>$j_totalbook){
                                    $Total= $j_totalbooth-$j_totalbook;
                                }else{
                                    $Total=0;
                                }    
                                $j_price=$result['j_price'];                       
                            ?>
                            <p class="card-text black-text"><b>สถานที่</b> <?php echo  $result['j_place'];?></p>
                            <p class="card-text black-text"><b>ระยะเวลา</b> <?php echo $Datee;?></p>
                            <p class="card-text black-text"><b>ราคา</b> <?php echo number_format($j_price)?> บาทต่อบูธ</p>
                            <p class="card-text black-text"><b>จำนวนบูธคงเหลือ</b> <?php echo $Total; ?> บูธ</p>                                          
                                               
                            <p>							
                                <button type="button" class="btn btn-primary"   onclick="return button_UpdateProduct(<?php echo $txtnum?>,'reduce')">-</button>
                                <input type="text" name="txtqty<?php echo $txtnum?>" id="txtqty<?php echo $txtnum?>" value="1" disabled>
                                <input type="hidden" name="txtqty1<?php echo $txtnum?>" id="txtqty1<?php echo $txtnum?>" value="1">
                                <button type="button" class="btn btn-primary"  onclick="return  button_UpdateProduct(<?php echo $txtnum?>,'add')">+</button>
                            </p>


                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-orange"  onClick="JavaScript:ClickBooking('<?php echo $result['j_id']; ?>','<?php echo $txtnum?>')" >
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                จอง
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </button><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-orange"  onClick="JavaScript:ClickDetail('<?php echo $result['j_id']; ?>')" >
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                ดูรายละเอียดเพิ่มเติม
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </button>

                        </div>
                    </div>
                    <br>
                    <!-- Card Dark -->
                </div>
            <?php 
                $txtnum++;
            }
            ?>
        </div> 
        <hr>
        <br><br>
        <h3 class=""><b>สถานที่ยอดนิยม</b></h3>
        <div class="card bg-dark text-white">
            <img class="card-img" src="Image_Brand/im.png" alt="Card image">
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card text-white">
                        <img class="card-img" src="Image_Brand/im2.png" alt="Card image"> 
                    </div>      
                </div>    
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card text-white">
                        <img class="card-img" src="Image_Brand/im3.png" alt="Card image"> 
                    </div>      
                </div>    
            </div>
            <hr>
        </div>
        <hr>
        <br><br>
        <h3 class="" style="text-align: center;"><b>ขั้นตอนการใช้งาน</b></h3>
        <img class="" src="Image_Brand/h0r.jpg" alt="" > 
    </div>
    <br><br>

    <script>
        function button_UpdateProduct(txtnum,Type){
            var txtqty='txtqty' + txtnum;
            var txtqty1='txtqty1' + txtnum;
            var numbernew=0;
            var number=document.getElementById(txtqty).value;
            if(Type=='reduce'){
                numbernew=Number(number)-1;
                if(numbernew>0){
                    document.getElementById(txtqty).value=numbernew;
                    document.getElementById(txtqty1).value=numbernew;
                }
                
            }else{
                numbernew=Number(number)+1;
                document.getElementById(txtqty).value=numbernew;
                document.getElementById(txtqty1).value=numbernew;
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
        function ClickBooking(j_id,Type){
            var txtqty='txtqty1' + Type;
            var qty=document.getElementById(txtqty).value;
            var url = 'insert_booth.php?id=' + j_id + '&qty=' + qty; 
			xmlhttp = uzXmlHttp();
			xmlhttp.open("GET", url, false);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=tis-620"); // set Header
			xmlhttp.send(null);
			location.reload();
        }
        function ClickDetail(j_id){
            var url = 'web_boothdetail.php?j_id='+j_id;
            location.replace(url);
        }
    </script>

<?php include "footer.php"; ?>
   
