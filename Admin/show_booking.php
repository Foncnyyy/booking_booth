<?php 
    $ClickFunction='show_booking';
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
                            <h1 class="card-title text-white">ข้อมูลการจอง</h1>
                        </div>
                        <br>
                        <div class="card-body">                      
                            <table id="datatable" class="table table-bordered table-sm table-striped ">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            รายการ
                                        </th>                
                                        <th class="text-center">
                                            ชื่อผู้จอง
                                        </th>
                                        <th class="text-center">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                               
                                            ชื่องานที่จอง
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                     
                                        </th> 
                                        <th class="text-center">จำนวนบูธที่จอง</th>
                                        <th class="text-center">จำนวนที่ชำระ</th>
                                        <th class="text-center">วันที่ทำการจอง</th>           
                                    </tr>
                                </thead>
                                <body>
                                    <?php 
                                    $sql ="SELECT * FROM tb_booking 
                                        left outer join tb_member on tb_booking.m_id=tb_member.m_id
                                    order by book_date desc";
                                    $query = mysqli_query($conn,$sql);
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>  
                                        <tr>
                                            <td class="text-right"><?php echo $result['book_no'] ?></td>
                                            <td class="text-center"><?php echo $result['m_name'] ?></td>                                            
                                            <td>
                                            <table id="datatable" class="table table-bordered table-sm">
                                                    <?php
                                                        $book_date=$result['book_date'];
                                                        $book_date1=date("d/m/Y", strtotime($book_date));
                                                        $SumBooth=0;
                                                        $book_id=$result['book_id'];
                                                        $sql1 = "select * from tb_bookdetail
                                                                left outer join tb_jobtitle on tb_bookdetail.j_id =tb_jobtitle.j_id    
                                                                where book_id  ='$book_id'";
                                                        $query1 = mysqli_query($conn, $sql1);
                                                        while ($result1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)){ 
                                                            $j_name=$result1['j_name'];
                                                            $d_qty=$result1['d_qty'];
                                                            $SumBooth+=$d_qty;
                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $j_name ?>
                                                                </td>
                                                                <td class="text-right">
                                                                    <?php echo $d_qty ?> บูธ
                                                                </td>
                                                            </tr>                                                      
                                                    <?php } ?>
                                                </table>                                                                                
                                            </td>
                                            <td class="text-center"><?php echo $SumBooth ?> บูธ</td> 
                                            <td class="text-center"><?php echo number_format($result['book_grandtotal']) ?></td> 
                                            <td class="text-center"><?php echo $book_date1 ?></td>                                                     
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


<?php include "footer.php"; ?>