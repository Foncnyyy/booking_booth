
<?php 
    $ClickFunction='index';
    include "header.php"; 

    $a_id=$_SESSION["a_id"];
    $sql="SELECT * FROM tb_admin where a_id='$a_id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $a_name=$row["a_name"];
    $a_surname=$row["a_surname"];
    $a_username=$row["a_username"];
    $a_password=$row["a_password"];
    $a_img=$row["a_img"];

?>

    <section class="content-header">
        <div class="container-fluid">
            <h1>ข้อมูลแอดมิน</h1><br>
        </div><!-- /.container-fluid -->
        <div class="col-md-8">
            <div class="card card-orange">
                <div class="card-header">
                    <h5 class="card-title text-white" >แก้ไขข้อมูลแอดมิน </h5> <div align="right">   
                </div>
            </div>
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ระดับการใช้งาน </label>
                        <div class="col-sm-10"></div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
                        <div class="col-sm-10">
                        <input type="text" name="a_name" class="form-control" id="a_name" placeholder="" value="<?php echo $a_name?>">
                        </div>
                    </div>
                    <span class="er"></span>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">นามสกุล </label>
                        <div class="col-sm-10">
                        <input type="text" name="a_surname" class="form-control" id="a_surname" placeholder="" value="<?php echo $a_surname?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">ชื่อผู้ใช้ </label>
                        <div class="col-sm-10">
                        <input type="text" name="a_username" class="form-control" id="a_username" placeholder="" value="<?php echo $a_username?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">รหัสผ่าน </label>
                        <div class="col-sm-10">
                        <input type="text" name="a_password" class="form-control" id="a_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">รูปภาพ</label>
                        <div class="col-sm-10"><br>
                            <input type="file" class="custom-file-input" accept="image/*" id="file" name="image" onchange="loadFile(event);" >
			                <label class="custom-file-label" for="file">เลือกรูปภาพ</label>
                            <p><center><img id="output" width="100"/></center></p>                                                
                            <br><br>
                        </div>
                    </div>                       
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-dark btn-block" onclick="return FunctionEditProfile()">บันทึก</button>
                </div>
            </form>                               
        </div>
    </section>

    <script>
        var loadFile = function(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
        function FunctionEditProfile() {
            var result = confirm("คุณต้องการแก้ไขงานออกบูธใช่หรือไม่?");
            if (result) {

                var a_name = document.getElementById('a_name').value;
                var a_surname = document.getElementById('a_surname').value;
                var a_username = document.getElementById('a_username').value;
                var a_password = document.getElementById('a_password').value;
               
                if(a_name==''){
                    alert('กรุณากรอกชื่อ');
                    return false;
                }
                if(a_surname==''){
                    alert('กรุณากรอกนามสกุล');
                    return false;
                }
                if(a_username==''){
                    alert('กรุณากรอกชื่อผู้ใช้');
                    return false;
                }
                if(a_password==''){
                    alert('กรุณากรอกรหัสผ่าน');
                    return false;
                }

                var form_data = new FormData();
                form_data.append("file", document.getElementById('file').files[0]);
                form_data.append('a_name', $('#a_name').val());
                form_data.append('a_surname', $('#a_surname').val());
                form_data.append('a_username', $('#a_username').val());
                form_data.append('a_password', $('#a_password').val());             

                $.ajax({
                    url:"edit_profile.php",
                    method:"POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,  
                    success:function(data)
                    {
                        console.log(data);
                        alert(data);
                        if(data=='แก้ไขข้อมูลแอดมินเรียบร้อย'){
                            location.replace("index.php");
                        }
                    }
                });
            }
        }
    </script>
    
<?php include "footer.php"; ?>