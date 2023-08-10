<div class="profile_nav">
          <ul>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>            
            <?php
            $istenant=$result->istenant;  
            if($istenant == '')
            {
              ?>
              <li><a href="applytenant.php">Apply tennant</a></li>

              <?php
            }
            elseif(!empty($istenant) && $istenant!=1)
            {
              ?>
              <li><a href="applytenant.php">Tenant pplication status</a></li>

              <?php
            }
            elseif($istenant == 1)
            {
              ?>
              <li><a href="postcar.php">Post Cars</a></li>

              <?php
            }
            ?>
            <li><a href="post-testimonial.php">Post a Testimonial</a></li>
               <li><a href="my-testimonials.php">My Testimonials</a></li>
            <li><a href="logout.php">Sign Out</a></li>
          </ul>
        </div>
      </div>