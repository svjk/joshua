<div class="side-bar">
    <div class="user-info">
        <img class="img-profile img-circle img-responsive center-block" src="tutor_upload_images/avatar1.png" alt="">
        <ul class="meta list list-unstyled">
            <li class="name">Name
                <label class="label label-info">Phone</label>
            </li>
            <li class="email"><a>Email</a></li>
            <li class="activity">Last Updated : <?php echo date('D, M d, h:i A') ?></li>
        </ul>
    </div>
    <nav class="side-menu">
        <ul class="nav">
            <li class="">
                <a href="#"><span class="fa fa-user"></span> My Profile</a>
            </li>
            <li class="">
                <a href="tutors.php"><span class="fa fa-list"></span> All Tutuors</a>
            </li>
            <li class="">
                <a href="tutors_search.php"><span class="fa fa-search"></span> Search Tutuors</a>
            </li>
            
        </ul>
    </nav>
</div>
<script type="text/javascript">
    function deleteTutor() {
      if (confirm("Do you really want to delete your account") == true) {
        window.location = "tutor_delete.php";
      } else {
        return false;
      }
    }
</script>