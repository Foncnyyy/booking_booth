<?php include "header.php"; ?>

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- Material form login -->
                <div class="card">
                    <h5 class="card-header info-color white-text text-center py-4" style="background-color: #F26E23 !important;">
                        <strong>ยินดีต้อนรับเข้าสู่ระบบ</strong>
                    </h5>
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">
                        <br><p>กรุณากรอกชื่อผู้ใช้และรหัสผ่าน เพื่อลงชื่อเข้าใช้บัญชีของคุณ<p><hr><br>
                        <!-- Form -->
                        <form class="text-center" action="chk_member.php" method="post" > 
                            <!-- Email -->
                            <div class="md-form">
                                <input type="text" id="m_username" name="m_username" class="form-control">
                                <label for="materialLoginFormEmail">ชื่อผู้ใช้</label>
                            </div>
                            <!-- Password -->
                            <div class="md-form" style="margin-top:5%;">
                                <input type="password" id="m_password" name="m_password" class="form-control">
                                <label for="materialLoginFormPassword">รหัสผ่าน</label>
                            </div>

                            <div class="d-flex justify-content-around"></div>
                            <!-- Sign in button -->
                            <button class="btn btn-orange btn-block my-4" type="submit">เข้าสู่ระบบ</button>
                            
                            <!-- Register -->
                            <p>ยังไม่มีบัญชี ?
                                <a href="">สมัครสมาชิก</a>
                            </p>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
                <!-- Material form login -->
            </div>
        </div>
    </div>            
<?php include "footer.php"; ?>
   
