<?php include "header.php"; ?>

  <br><br>
  <div class="container ">
    <div class="row " >
      <div class="col-md-12">
        <div class="card" >        
          <div class="card-body  black-text " style="background-color: #fbfbfb !important;">  
                  
            <form class="text-center " method="POST" action="DB_InsertMember.php" enctype="multipart/form-data" name="FormInsertMember">
              <p class="h4 mb-4" > สร้างบัญชีของคุณ </p>               
              <!-- Name -->
              <input type="text" id="m_name" name="m_name" class="form-control rounded-0 mb-4" placeholder="ชื่อ">

              <!-- surname -->
              <input type="text" id="m_surname" name="m_surname" class="form-control rounded-0 mb-4" placeholder="นามสกุล">

              <!-- Email -->
              <input type="email" name="m_email" id="m_email" class="form-control rounded-0 mb-4" placeholder="อีเมล">

              <!-- Tel -->
              <input type="text" name="m_tel" id="m_tel" class="form-control rounded-0 mb-4" placeholder="เบอร์โทรศัพท์">
 
               <!-- Username -->                                 
              <input type="text" name="m_username" class="form-control rounded-0 mb-4" id="m_username" placeholder="ชื่อผู่ใช้งาน">
 
              <!-- Password -->
              <input type="text" name="m_password" class="form-control rounded-0 mb-4" id="m_password" placeholder="รหัสผ่าน">

              <!-- Password -->
              <input type="text" name="m_confirmpassword" class="form-control rounded-0 mb-4" id="m_confirmpassword" placeholder="ยืนยันรหัสผ่าน">

              <button class="btn btn-orange btn-block" type="button" onclick=" return Check_Data()" >สมัครสมาชิก</button>
            </form>       
            <hr class="hr-light">

          </div>
        </div>  
        <!-- Card Dark -->
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
        var m_confirmpassword = document.getElementById("m_confirmpassword").value;

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
        if (m_confirmpassword==""){
            alert('กรุณากรอกยืนยันรหัสผ่าน');
            return false;
        }
        if (m_password!=m_confirmpassword){
            alert('รหัสผ่านไม่ตรงกัน');
            document.getElementById("m_password").value='';
            document.getElementById("m_confirmpassword").value='';
            return false;
        }

        FormInsertMember.submit();   
    }
  </script>
<?php include "footer.php"; ?>
