<?php 
    $ClickFunction='setting_booth';
    include "header.php"; 

    $date1=date("Y-m-d");
    $date2=date("Y-m-d");
?>

    <div class="form-group row">
        <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <section class="content-header">
                    <div class="container-fluid">
                        <br>
                    </div>
                    <div class="card card-orange">
                        <div class="card-header">
                            <h1 class="card-title text-white">จัดการงานออกบูธ</h1>
                            <div align="right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มงานออกบูธ</button>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">                      
                            <table id="datatable" class="table table-bordered table-sm table-striped ">
                                <thead>
                                    <tr>
                                        <th class="text-center">รายการ</th>                
                                        <th class="text-center">ชื่องาน</th>
                                        <th class="text-center">หมวดหมู่</th> 
                                        <th class="text-center">รูปภาพ</th>
                                        <th class="text-center">ราคา</th>
                                        <th class="text-center">จำนวนบูธทั้งหมด</th>
                                        <th class="text-center">จำนวนบูธคงเหลือ</th>
                                        <th class="text-center">จัดการ</th>             
                                    </tr>
                                </thead>
                                <body>
                                    <?php 
                                    $sql ="SELECT * FROM tb_jobtitle
                                        left outer join tb_category on tb_jobtitle.c_id=tb_category.c_id";
                                    $query = mysqli_query($conn,$sql);
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>  
                                        <tr>
                                            <td class="text-center"><?php echo $result['j_id'] ?></td>
                                            <td><?php echo $result['j_name'] ?></td>
                                            <td><?php echo $result['c_name'] ?></td>
                                            <?php
                                            if($result['j_img']==''){
                                            ?>
                                                <td><img class="img-rounded elevation-2" src="../Image_Booth/2222222.jpg" width="100px"></td>
                                            <?php
                                            }else{
                                            ?>
                                                <td><img class="img-rounded elevation-2" src="../Image_Booth/<?php echo $result['j_img'] ?>" width="100px"></td>
                                            <?php   
                                            }
                                            ?>  
                                            <td class="text-right"><?php echo number_format($result['j_price']) ?></td>
                                            <td class="text-right"><?php echo $result['j_totalbooth'] ?></td>
                                            <td class="text-right"><?php echo $result['j_totalbook'] ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">                  
                                                    <button type="button" class="btn btn-warning btn-sm" 
                                                        onclick="return ClickEditBooth('<?php echo $result['j_id']?>','<?php echo $result['j_name']?>',
                                                            '<?php echo $result['c_id']?>','<?php echo $result['j_detail']?>',
                                                            '<?php echo $result['j_place']?>','<?php echo $result['j_datestart']?>',
                                                            '<?php echo $result['j_datestop']?>','<?php echo $result['j_totalbooth']?>',
                                                            '<?php echo $result['j_price']?>')">
                                                        &nbsp;&nbsp;&nbsp;<i class=" fas fa-pen-square"></i> แก้ไข&nbsp;&nbsp;&nbsp;</button>                           
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="return ClickDeleteBooth('<?php echo $result['j_id'] ?>')">&nbsp;&nbsp;&nbsp;&nbsp;<i class=" fas fa-trash-alt"></i> ลบ&nbsp;&nbsp;&nbsp;&nbsp;</button>                 
                                                </div>  
                                            </td>
                                        </tr>             
                                    <?php 
                                    }
                                    ?>
                                </body>               
                            </table>                                      
                        <div class="card-footer"></div>                               
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Insert Booth -->   
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <h5 class="modal-title text-white" id="exampleModalLabel">เพิ่มงานออกบูธ</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่องาน</label>
                        <div class="col-sm-10">
                            <input type="text" name="txt_boothname_insert" id="txt_boothname_insert" class="form-control" placeholder="ชื่องาน">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">หมวดหมู่</label>
                        <div class="col-sm-10">
                            <select name="txtcategoryid_insert" id="txtcategoryid_insert" class="form-control">
                                <option value="" selected disabled>เลือกหมวดหมู่</option> 
                                <?php 
                                $sql ="SELECT * FROM tb_category";
                                $query = mysqli_query($conn,$sql);
                                while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>                                                                                                    
                                    <option value="<?php echo $result['c_id'] ?>"><?php echo $result['c_name'] ?></option>                                                                        
                                <?php 
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">รายละอียด</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="txtdetail_insert"
                                rows="3" placeholder="รายละอียด"></textarea>                                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">สถานที่</label>
                        <div class="col-sm-10">
                            <input type="text" name="txt_boothplace_insert" id="txt_boothplace_insert" class="form-control" placeholder="สถานที่">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">วันที่การจัดงาน</label>
                        <div class="col-sm-4">
                            <input type="date" name="date1"  id="date1" class="form-control " value="<?php echo $date1 ?>" placeholder="password" onchange="handler1(event)">
                        </div>
                        <label for="" class="col-sm-1 col-form-label">&nbsp;&nbsp;ถึง</label>
                        <div class="col-sm-5">
                        <input type="date" name="date2"  id="date2" class="form-control " value="<?php echo $date2 ?>" placeholder="password" onchange="handler2(event)"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">จำนวนบูธทั้งหมด</label>
                        <div class="col-sm-4">
                            <input type="text" name="txt_boothtotal_insert" id="txt_boothtotal_insert" class="form-control" placeholder="จำนวนบูธทั้งหมด">
                        </div>
                        <label for="" class="col-sm-1 col-form-label">&nbsp;&nbsp;ราคา</label>
                        <div class="col-sm-5">
                            <input type="text" name="txt_boothprice_insert" id="txt_boothprice_insert" class="form-control" placeholder="ราคา">
                        </div>
                    </div>
                    <div class="form-group row"> 
                        
                        <label for="" class="col-sm-4 col-form-label">รูปภาพงาน</label>
                        <div class="custom-file">
			                <input type="file" class="custom-file-input" accept="image/*" id="file" name="image" onchange="loadFile(event);" >
			                <label class="custom-file-label" for="file">รูปภาพงาน</label>
                            <p><center><img id="output" width="100"/></center></p>                    
			            </div>  
                    </div>
                    <br><br><br>                                           
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="return FunctionInsertBooth()"><i class="fa fa-save"></i> ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Booth -->   
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <h5 class="modal-title text-white">แก้ไขงานออกบูธ</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่องาน</label>
                        <div class="col-sm-10">
                            <input type="text" name="txt_boothname_edit" id="txt_boothname_edit" class="form-control" placeholder="ชื่องาน">
                            <input type="hidden" name="txt_boothid_edit" id="txt_boothid_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">หมวดหมู่</label>
                        <div class="col-sm-10">
                            <select name="txtcategoryid_edit" id="txtcategoryid_edit" class="form-control">
                                <option value="" selected disabled>เลือกหมวดหมู่</option> 
                                <?php 
                                $sql ="SELECT * FROM tb_category";
                                $query = mysqli_query($conn,$sql);
                                while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>                                                                                                    
                                    <option value="<?php echo $result['c_id'] ?>"><?php echo $result['c_name'] ?></option>                                                                        
                                <?php 
                                }
                                ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">รายละอียด</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="txtdetail_edit"
                                rows="3" placeholder="รายละอียด"></textarea>                                             
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">สถานที่</label>
                        <div class="col-sm-10">
                            <input type="text" name="txt_boothplace_edit" id="txt_boothplace_edit" class="form-control" placeholder="สถานที่">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">วันที่การจัดงาน</label>
                        <div class="col-sm-4">
                            <input type="date" name="date1_edit"  id="date1_edit" class="form-control " value="<?php echo $date1 ?>" placeholder="password" onchange="handler1(event)">
                        </div>
                        <label for="" class="col-sm-1 col-form-label">&nbsp;&nbsp;ถึง</label>
                        <div class="col-sm-5">
                        <input type="date" name="date2_edit"  id="date2_edit" class="form-control " value="<?php echo $date2 ?>" placeholder="password" onchange="handler2(event)"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">จำนวนบูธทั้งหมด</label>
                        <div class="col-sm-4">
                            <input type="text" name="txt_boothtotal_edit" id="txt_boothtotal_edit" class="form-control" placeholder="จำนวนบูธทั้งหมด">
                        </div>
                        <label for="" class="col-sm-1 col-form-label">&nbsp;&nbsp;ราคา</label>
                        <div class="col-sm-5">
                            <input type="text" name="txt_boothprice_edit" id="txt_boothprice_edit" class="form-control" placeholder="ราคา">
                        </div>
                    </div>
                    <div class="form-group row"> 
                        
                        <label for="" class="col-sm-4 col-form-label">รูปภาพงาน</label>
                        <div class="custom-file">
			                <input type="file" class="custom-file-input" accept="image/*" id="file_edit" name="image" onchange="loadFileEdit(event);" >
			                <label class="custom-file-label" for="file">รูปภาพงาน</label>
                            <p><center><img id="output_edit" width="100"/></center></p>                    
			            </div>  
                    </div>
                    <br><br><br>                                           
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="return FunctionEditBooth()"><i class="fa fa-save"></i> ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
               
        var loadFile = function(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
        var loadFileEdit = function(event) {
			var image = document.getElementById('output_edit');
			image.src = URL.createObjectURL(event.target.files[0]);
		};

        function handler1(e){
            document.getElementById('date2').value=e.target.value;		  
        }

        function handler2(e){
            var date1 = document.getElementById('date1').value;
            var date2 = document.getElementById('date2').value;
            if (date1>date2){
                alert('ไม่สามารถใส่วันที่ย้อนหลังได้');
                document.getElementById('date2').value=date1;
            }
        }

        // Insert Booth
        function FunctionInsertBooth(){

            var txt_boothname_insert=document.getElementById('txt_boothname_insert').value;
            var txtcategoryid_insert=document.getElementById('txtcategoryid_insert').value;
            var txtdetail_insert=document.getElementById('txtdetail_insert').value;
            var txt_boothplace_insert=document.getElementById('txt_boothplace_insert').value;
            var date1=document.getElementById('date1').value;
            var date2=document.getElementById('date2').value;
            var txt_boothtotal_insert=document.getElementById('txt_boothtotal_insert').value;
            var txt_boothprice_insert=document.getElementById('txt_boothprice_insert').value;
            var file = document.getElementById('file').value;

            var form_data = new FormData();
            form_data.append("file", document.getElementById('file').files[0]);
            form_data.append('txt_boothname_insert', $('#txt_boothname_insert').val());
            form_data.append('txtcategoryid_insert', $('#txtcategoryid_insert').val());
            form_data.append('txtdetail_insert', $('#txtdetail_insert').val());
            form_data.append('txt_boothplace_insert', $('#txt_boothplace_insert').val());
            form_data.append('date1', $('#date1').val());
            form_data.append('date2', $('#date2').val());
            form_data.append('txt_boothtotal_insert', $('#txt_boothtotal_insert').val());
            form_data.append('txt_boothprice_insert', $('#txt_boothprice_insert').val());        

            $.ajax({
                url:"insert_booth.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,  
                success:function(data)
                {
                    alert(data);
                    if(data=='เพิ่มข้อมูลงานเรียบร้อย'){
                        location.replace("setting_booth.php");
                    }
                }
            });		
        }

        // Edit Booth
        function ClickEditBooth(j_id,j_name,c_id,j_detail,j_place,j_datestart,j_datestop,j_totalbooth,j_price){     
            document.getElementById('txt_boothid_edit').value=j_id;
            document.getElementById('txt_boothname_edit').value=j_name;
            document.getElementById('txtcategoryid_edit').value=c_id;
            document.getElementById('txtdetail_edit').value=j_detail;
            document.getElementById('txt_boothplace_edit').value=j_place;
            document.getElementById('date1_edit').value=j_datestart;
            document.getElementById('date2_edit').value=j_datestop;
            document.getElementById('txt_boothtotal_edit').value=j_totalbooth;
            document.getElementById('txt_boothprice_edit').value=j_price;
            $('#myModalEdit').modal('show');            
        }
        function FunctionEditBooth() {
            var result = confirm("คุณต้องการแก้ไขงานออกบูธใช่หรือไม่?");
            if (result) {

                var txt_boothid_edit = document.getElementById('txt_boothid_edit').value;
                var txt_boothname_edit = document.getElementById('txt_boothname_edit').value;
                var txtcategoryid_edit = document.getElementById('txtcategoryid_edit').value;
                var txtdetail_edit = document.getElementById('txtdetail_edit').value;
                var txt_boothplace_edit = document.getElementById('txt_boothplace_edit').value;
                var date1_edit = document.getElementById('date1_edit').value;
                var date2_edit = document.getElementById('date2_edit').value;
                var txt_boothtotal_edit = document.getElementById('txt_boothtotal_edit').value;
                var txt_boothprice_edit = document.getElementById('txt_boothprice_edit').value;

                var form_data = new FormData();
                form_data.append("file", document.getElementById('file_edit').files[0]);
                form_data.append('txt_boothid_edit', $('#txt_boothid_edit').val());
                form_data.append('txt_boothname_edit', $('#txt_boothname_edit').val());
                form_data.append('txtcategoryid_edit', $('#txtcategoryid_edit').val());
                form_data.append('txtdetail_edit', $('#txtdetail_edit').val());
                form_data.append('txt_boothplace_edit', $('#txt_boothplace_edit').val());
                form_data.append('date1_edit', $('#date1_edit').val());
                form_data.append('date2_edit', $('#date2_edit').val());
                form_data.append('txt_boothtotal_edit', $('#txt_boothtotal_edit').val());
                form_data.append('txt_boothprice_edit', $('#txt_boothprice_edit').val());

                $.ajax({
                    url:"edit_booth.php",
                    method:"POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,  
                    success:function(data)
                    {
                        console.log(data);
                        alert(data);
                        if(data=='แก้ไขข้อมูลการจัดงานเรียบร้อย'){
                            location.replace("setting_booth.php");
                        }
                    }
                });
            }
        }

        function ClickDeleteBooth(j_id) {
            var result = confirm("คุณต้องการลบการจัดงานใช่หรือไม่?");
            if (result) {
                $.ajax({
                    url:"delete_booth.php",
                    method:'POST',
                    data: {j_id:j_id}, 
                    success:function(data)
                    {
                        alert(data);
                        if(data=='ลบข้อมูลการจัดงานเรียบร้อย'){
                            location.replace("setting_booth.php");
                        }
                    }
                })
            }
        }

               
    </script>



<?php include "footer.php"; ?>