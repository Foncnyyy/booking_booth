<?php include "header.php"; ?>

    <br>
    <div class="container">
        <?php
            $j_id=$_GET['j_id'];
            $sql = "SELECT * FROM tb_jobtitle 
                left outer join tb_category on tb_jobtitle.c_id=tb_category.c_id
            where j_id='$j_id'";
            $query = mysqli_query($conn,$sql); 
            $result = mysqli_fetch_assoc($query); 
            $j_name = $result['j_name'];
            $j_detail = $result['j_detail'];
            $j_place = $result['j_place'];
            $j_price = $result['j_price'];
            $j_price = $result['j_price'];
            $j_img = $result['j_img'];

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
        ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
                if($result['j_img']==''){
                ?>
                    <img src="Image_Booth/2222222.jpg" width="450px";>
                <?php
                }else{
                ?>
                    <img src="Image_Booth/<?php echo $j_img ?>" width="450px";>
                <?php   
                }
                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">			
                <div class="card">
                    <div class="card-body white-color black-text rounded-bottom">						    
                        <!-- Title -->
                        <h4 class="card-title"><?php echo $j_name ?> 
                        <hr class="hr-black">
                        <p class="card-text black-text"><b>หมวดหมู่</b>&nbsp;&nbsp;<?php echo  $result['c_name'];?></p>
                        <p class="card-text black-text"><b>สถานที่</b> <br><br><?php echo  $result['j_place'];?></p>
                        <p class="card-text black-text"><b>ระยะเวลา</b><br><br> <?php echo $Datee;?></p>
                        <p class="card-text black-text"><b>ราคา</b> <br><br><?php echo number_format($j_price)?> บาทต่อบูธ</p>
                        <p class="card-text black-text"><b>จำนวนบูธคงเหลือ</b><br><br> <?php echo $Total; ?> บูธ</p>
                        <p class="card-text black-text"><b>คำอธิบายงาน</b><br><br> <?php echo  $result['j_detail'];?></p>		
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body white-color black-text rounded-bottom">						    
                        <!-- Title -->
                        <center><h4 class="card-title">แจ้งขอจองบูธ</h4></center>
                        <br>                       
                        <div class="form-group row">
		                    <label for="" class="col-sm-3 col-form-label">จำนวนบูธคงเหลือ</label>
		                    <div class="col-sm-5">
		                      <input type="text" name="txtqtybooth" class="form-control" id="txtqtybooth" placeholder="" value="<?php echo $Total; ?>" disabled>
                              <input type="hidden" name="txtqtybooth1" id="txtqty1" value="<?php echo $Total; ?>">
		                    </div>
                            <label for="" class="col-sm-2 col-form-label">บูธ</label>
		                </div>
                        <div class="form-group row">
		                    <label for="" class="col-sm-3 col-form-label">ราคา</label>
		                    <div class="col-sm-5">
		                      <input type="text" name="j_price" class="form-control" id="j_price" placeholder="" value="<?php echo number_format($j_price)?>" disabled>
		                    </div>
                            <label for="" class="col-sm-2 col-form-label">บาท</label>
		                </div>
                        <hr class="hr-black">
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-form-label">จำนวนบูธที่ต้องการจอง</label>
                            <!-- <h5 class="card-title">จำนวนบูธที่ต้องการจอง</h5> -->
		                </div>
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-primary" onclick="return button_UpdateProduct(<?php echo $j_price?>,'reduce')">-</button>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="txtqty" id="txtqty" value="1" disabled>
                                <input type="hidden" name="txtqty1" id="txtqty1" value="1">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-primary" onclick="return  button_UpdateProduct(<?php echo $j_price?>,'add')">+</button>	 
                            </div>                   
		                </div>
                        <hr class="hr-black">    
                        <div class="form-group row">
		                    <label for="" class="col-sm-3 col-form-label">ยอดรวมทั้งหมด</label>
		                    <div class="col-sm-5">
		                      <input type="text" name="txttoal" class="form-control" id="txttoal" placeholder="" value="<?php echo number_format($j_price)?>" disabled>
                              <input type="hidden" name="txttoal1" id="txttoal1" value="1">
                            </div>
                            <label for="" class="col-sm-2 col-form-label">บาท</label>
		                </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
		                    <div class="col-sm-5">		                        
                                <button type="button" class="btn btn-orange"  onClick="JavaScript:ClickBooking('<?php echo $j_id ?>')" >
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    จอง
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </button>
                            </div>
                            <div class="col-sm-2"></div>
		                </div>
                        
                            
                    </div>
                </div>		
            </div>
        </div>
        <hr>

        <h3>ดูสถานที่ บนแผนที่ </h3> 
        <div class="container">
            <div class="row">						
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248057.623880202!2d100.49302350587305!3d13.724481138153076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e28374759ade4b%3A0x98e04841a8c7a8b0!2z4Lit4Li04Lih4LmB4Lie4LmH4LiEIOC4reC4suC4o-C4teC4meC5iOC4sg!5e0!3m2!1sth!2sth!4v1615042947234!5m2!1sth!2sth" width="1100" height="350" style="border:0;" allowfullscreen="" loading="lazy"> </iframe>							
            </div>
        </div>
    </div>
    <script>
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        function button_UpdateProduct(price,Type){
            var numbernew=0;
            var number=document.getElementById("txtqty").value;
            if(Type=='reduce'){
                numbernew=Number(number)-1;
                if(numbernew>0){
                    document.getElementById("txtqty").value=numbernew;
                    document.getElementById("txtqty1").value=numbernew;
                    var txttoal=Number(numbernew)*price;
                    document.getElementById("txttoal").value=numberWithCommas(txttoal);
                    document.getElementById("txttoal1").value=txttoal;
                }               
            }else{
                numbernew=Number(number)+1;               
                document.getElementById("txtqty").value=numbernew;
                document.getElementById("txtqty1").value=numbernew;
                var txttoal=Number(numbernew)*price;
                document.getElementById("txttoal").value=numberWithCommas(txttoal);
                document.getElementById("txttoal1").value=txttoal;
            }           
        }
        function ClickBooking(j_id){
            var qty=document.getElementById("txtqty").value;
            var url = 'insert_booth.php?id=' + j_id + '&qty=' + qty; 
			location.replace(url);
        }
        function ClickDetail(j_id){
            var url = 'web_boothdetail.php?j_id='+j_id;
            location.replace(url);
        }
    </script>

<?php include "footer.php"; ?>