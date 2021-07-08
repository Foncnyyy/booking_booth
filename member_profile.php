
<?php include "header.php"; ?>
    <?php
        $m_id=$_SESSION["m_id"];
        $sql="SELECT * FROM tb_member where m_id='$m_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $m_name=$row["m_name"];
        $m_surname=$row["m_surname"];
        $m_username=$row["m_username"];
        $m_email=$row["m_email"];
        $m_tel=$row["m_tel"];
    ?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <form class="text-center " method="POST" action="db_editmember.php" enctype="multipart/form-data" name="FormEditMember">
                    <div class="card mx-xl">
                    <!-- Card body -->
                        <div class="card-body">
                        <!-- Default form subscription -->             
                            <p class="h4 text-center py-4">แก้ไข ข้อมูลส่วนตัว</p>                    
                            <!-- Default input name -->
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">ชื่อ </label>
                                <div class="col-sm-10">
                                <input type="text" name="m_name" class="form-control" id="m_name" placeholder="" value="<?php echo $m_name; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">นามสกุล </label>
                                <div class="col-sm-10">
                                <input type="text" name="m_surname" class="form-control" id="m_surname" placeholder="" value="<?php echo $m_surname; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-10">
                                <input type="number" name="m_tel" class="form-control" id="m_tel" placeholder="" value="<?php echo $m_tel; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">email </label>
                                <div class="col-sm-10">
                                <input type="text" name="m_email" class="form-control" id="m_email" placeholder="" value="<?php echo $m_email; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Username </label>
                                <div class="col-sm-10">
                                <input type="text" name="m_username" class="form-control" id="m_username" placeholder="" value="<?php echo $m_username; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-10">
                                <input type="text" name="m_password" class="form-control" id="m_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" value="" required>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-orange btn-block" type="button" onclick=" return Check_Data()" >บันทึก</button>                              
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script language="javascript"> 
        function Check_Data() {

            var m_name = document.getElementById("m_name").value;
            var m_surname = document.getElementById("m_surname").value;
            var m_email = document.getElementById("m_email").value;
            var m_tel = document.getElementById("m_tel").value;
            var m_username = document.getElementById("m_username").value;
            var m_password = document.getElementById("m_password").value;

            if (m_name==""){
                alert('กรุณากรอกชื่อ');
                return false;
            }
            if (m_surname==""){
                alert('กรุณากรอกนามสกุล');
                return false;
            }
            if (m_email==""){
                alert('กรุณากรอกอีเมล');
                return false;
            }
            if (m_tel==""){
                alert('กรุณากรอกเบอร์โทรศัพท์');
                return false;
            }
            if (m_username==""){
                alert('กรุณากรอกชื่อผู่ใช้งาน');
                return false;
            }
            if (m_password==""){
                alert('กรุณากรอกยืนยันรหัสผ่าน');
                return false;
            }

            FormEditMember.submit();   
        }
    </script>
<?php include "footer.php"; ?>