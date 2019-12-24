<?php include "header.php" ?>
 <!--  <script>
  	$(function()
    {
      var availabelLocality=[
      "Kalyannagar",
      "Hennur"];
      
      $( "#locality" ).autocomplete(
      {
		source: availabelLocality
      });
            

    });
</script> -->


<div class="profile-complete-main-content">
	<div class="container">
		<form action="filter.php" id="ms-form" method="post">
			<div class="ms-main-div">
				<div class="profile-pic">
					<div class="profile-pic-box text-center" >
						<div class="">
							<img src="images/avatar-profile.png" class="profile-pic-image">
						</div>
						<div>
							<input type="file" name="choose-file" accept="image/*"
							id="file-upload">
							<label for="file-upload" id="choose-file">
								<span>
									<img src="images/upload-icon.png" height="20px" width="20px">
								</span>
								<span id="file">Choose a file</span>
							</label>
						</div>
						
						<div class="btn-for-previous-next">
							<a href="javascript:void(0)" id="skip">Skip</a>
							<a href="javascript:void(0)" id="next" class="next">Next</a>
						</div>
					</div>
					<div class="user-location">
						<div>
							
							<input type="text" name="location" placeholder="Address1" class="text-field">
							<input type="text" name="location" placeholder="Locality" class="text-field" id="locality">

							<input type="text" name="location" placeholder="Landmark" class="text-field" >
							<input type="text" name="location" placeholder="Pincode" class="text-field">
						</div>
						<div class="btn-for-previous-next">
							<a href="javascript:void(0)" class="previous" id="previous">Previous</a>
							<a href="javascript:void(0)" id="next" class="next">Next</a>
						</div>
					</div>

					<div class="education">
						<div>
							<input type="text" name="education" placeholder="Class" class="text-field">
							<input type="text" name="education" placeholder="School and Board" class="text-field">
							<input type="text" name="education" placeholder="Subject" class="text-field">
						</div>
						<div class="btn-for-previous-next">
							<a href="javascript:void(0)" class="previous" id="previous">Previous</a>
							<!-- <a href="dashboard.php" id="next" class="next">Submit</a> -->
							<input type="submit"  value="submit" class="profile-submit">
							
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php include "footer.php" ?>

