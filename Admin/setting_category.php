<?php 
    $ClickFunction='setting_category';
    include "header.php"; 
?>

    <div class="form-group row">
        <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <section class="content-header">
                    <div class="container-fluid">
                        <br>
                    </div>
                    <div class="card card-orange">
                        <div class="card-header">
                            <h1 class="card-title text-white">จัดการหมวดหมู่</h1>
                            <div align="right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มหมวดหมู่</button>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">                      
                            <table id="datatable" class="table table-bordered table-sm table-striped ">
                                <thead>
                                    <tr>
                                        <th>รายการ</th>                
                                        <th class="text-center">หมวดหมู่</th>
                                        <th class="text-center">จัดการ</th>              
                                    </tr>
                                </thead>
                                <body>
                                    <?php 
                                    $sql ="SELECT * FROM tb_category";
                                    $query = mysqli_query($conn,$sql);
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>  
                                        <tr>
                                            <td class="text-center"><?php echo $result['c_id'] ?></td>
                                            <td><?php echo $result['c_name'] ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">                  
                                                    <button type="button" class="btn btn-warning btn-sm" onclick="return ClickEditCategory('<?php echo $result['c_id'] ?>','<?php echo $result['c_name'] ?>')">&nbsp;&nbsp;&nbsp;<i class=" fas fa-pen-square"></i> แก้ไข&nbsp;&nbsp;&nbsp;</button>                           
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="return ClickDeleteCategory('<?php echo $result['c_id'] ?>')">&nbsp;&nbsp;&nbsp;&nbsp;<i class=" fas fa-trash-alt"></i> ลบ&nbsp;&nbsp;&nbsp;&nbsp;</button>                 
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

    <!-- Insert Category -->   
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <h5 class="modal-title text-white" id="exampleModalLabel">เพิ่มหมวดหมู่</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่อหมวดหมู่</label>
                        <div class="col-sm-10">
                            <input type="text" name="txt_category_insert" id="txt_category_insert" class="form-control" placeholder="ชื่อหมวดหมู่">
                        </div>
                    </div>                                                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="return FunctionInsertCategory()"><i class="fa fa-save"></i> ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category -->
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <h5 class="modal-title text-white" id="exampleModalLabel">แก้ไขหมวดหมู่</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่อหมวดหมู่</label>
                        <div class="col-sm-10">
                            <input type="text" name="txt_category_name_edit" id="txt_category_name_edit" class="form-control" placeholder="ชื่อหมวดหมู่">
                            <input type="hidden" name="txt_category_id_edit" id="txt_category_id_edit">
                        </div>
                    </div>                                                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="return FunctionEditCategory()"><i class="fa fa-save"></i> ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function FunctionInsertCategory() {
            var txt_category_insert = document.getElementById('txt_category_insert').value;
            $.ajax({
                url:"insert_category.php",
                method:'POST',
                data: {txt_category_insert:txt_category_insert}, 
                success:function(data)
                {
                  alert(data);
                  if(data=='เพิ่มข้อมูลหมวดหมู่เรียบร้อย'){
                    location.replace("setting_category.php");
                  }
                }
            })
        }

        // Edit Category
        function ClickEditCategory(c_id,c_name){
            document.getElementById('txt_category_name_edit').value=c_name;
            document.getElementById('txt_category_id_edit').value=c_id;
            $('#myModalEdit').modal('show'); 
            
        }
        function FunctionEditCategory() {
            var result = confirm("คุณต้องการแก้ไขหมวดหมู่ใช่หรือไม่?");
            if (result) {
                var txt_category_id_edit = document.getElementById('txt_category_id_edit').value;
                var txt_category_name_edit = document.getElementById('txt_category_name_edit').value;

                if(txt_category_name_edit==''){
                    alert('กรุณาใส่ชื่อหมวดหมู่');
                    return false;
                }

                $.ajax({
                    url:"edit_category.php",
                    method:'POST',
                    data: {txt_category_id_edit:txt_category_id_edit,txt_category_name_edit:txt_category_name_edit}, 
                    success:function(data)
                    {
                        alert(data);
                        if(data=='แก้ไขข้อมูลหมวดหมู่เรียบร้อย'){
                            location.replace("setting_category.php");
                        }
                    }
                })
            }
        }
        function ClickDeleteCategory(c_id) {
            var result = confirm("คุณต้องการลบหมวดหมู่ใช่หรือไม่?");
            if (result) {
                $.ajax({
                    url:"delete_category.php",
                    method:'POST',
                    data: {c_id:c_id}, 
                    success:function(data)
                    {
                        alert(data);
                        if(data=='ลบข้อมูลหมวดหมู่เรียบร้อย'){
                            location.replace("setting_category.php");
                        }
                    }
                })
            }
        }
    </script>

<?php include "footer.php"; ?>