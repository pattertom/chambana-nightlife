<?php echo $this->load->view('header');
      echo form_open('login/process_login') . "\n";
      echo form_fieldset('Login') . "\n";
      
      echo $this->session->flashdata('message'); ?>
      
      <p><label for="username">Username: </label><?php echo form_input($username); ?></p>
      <p><label for="password">Password: </label><?php echo form_password($password); ?></p>
      <p><?php echo form_submit('login', 'Login'); ?></p>
      
<?php echo form_fieldset_close();
      echo form_close();?>
      <a href="<?php echo site_url('user/insert'); ?>" class="black"> Signup </a>
<?php echo $this->load->view('footer'); ?>