 <!-- container --> 
 <?php $this->load->view('templates/header');?>
 <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
      </div> 
      <form action="<?php print site_url();?>auth/actionRegister" class="remember-login-frm" id="remember-login-frm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 pb-5">
    <div class="row"><ul style="color: #CB0000"><?php echo validation_errors('<li>', '</li>'); ?></div>
        <!--Form with header-->
            <div class="card border-info rounded-0">
                <div class="card-header p-0">
                    <div class="bg-login-page text-center py-2">
                        <h3><i class="fas fa-user-plus"></i> Registration</h3>
                    </div>
                </div>
                <div class="card-body p-3">                
                    <!--Body-->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="first-name" name="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email *">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password *">
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm Password *">
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone-square"></i></div>
                            </div>
                            <input type="text" class="form-control" id="contact-no" name="contact_no" placeholder="Contact No">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                            </div>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                            <input type="text" class="form-control" id="dob" name="dob" placeholder="DOB">
                        </div>
                    </div>
                                                       
                    <div class="text-center">
                        <button type="submit" id="contact-send-a" class="btn btn-info btn-block rounded-0 py-2">Register</button>
                    </div>
                    
                </div>
            </div> 
          </div>
        </div>
    </form>
    </div>
  </section>
  <?php $this->load->view('templates/footer');?>