<div class="container">
        <div class="grid">
		<div class="grid__row">
			<div class="grid__column-4 ">
					<div class="profile-left profile__area-content">
						<ul class="profile__control">
							<li class="profile__control--item">
								<span id="to-page-info" class="profile__control--item-text">
									User information
								</span>
							</li>
							<li class="profile__control--item">
								<span id="to-page-change-pass" class="profile__control--item-text">
									Change password
								</span>
							</li>
						</ul>
					</div>			
				</div>	
				
				<div class="grid__column-3-4">
					<div class="profile-right profile__area-content">
						<form action="/admin/changeInfo.php" method="POST" id="profile__container-info" class="profile__container-info">
							<div class="profile__container-info--header">
								<h2 class="profile__title">
									Information
								</h2>
								<i id="btn-change-info" class="fa-solid fa-pen btn-change-info"></i>
							</div>

							<div class="profile__main">
								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="" class="profile__main--title">User ID:</label>
									</div>

									<div class="profile__main--container-info">
										<?php 
											echo '<p class="profile__main--info-text profile__main--info-text-cannot-change">'.$row['userID'].'</p>'
										?>

									</div>
								</div>

								<hr>

								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="profile__main--info-fullName" class="profile__main--title">Full Name:</label>
									</div>

									<div class="profile__main--container-info">
										<?php 
											echo '<p class="profile__main--info-text">'.$row['fullName'].'</p>'
										?>

										<input id="profile__main--info-fullName" class="profile__change-input-change-info" type="text" name="fullName" value=<?php echo '"'.$row['fullName'].'"'?>>
									</div>
								</div>

								<hr>

							
								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="profile__main--info-phoneNumber" class="profile__main--title">Phone number:</label>
									</div>

									<div class="profile__main--container-info">
											<?php 
												echo '<p class="profile__main--info-text">'.$row['phoneNumber'].'</p>'
											?>
											<input id="profile__main--info-phoneNumber" class="profile__change-input-change-info" type="tel" name="phoneNumber" value=<?php echo '"'.$row['phoneNumber'].'"'?>>
									</div>
								</div>

								<hr>

								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="profile__main--info-email" class="profile__main--title">Email:</label>
									</div>

									<div class="profile__main--container-info">
											<?php 
												echo '<p class="profile__main--info-text">'.$row['email'].'</p>'
											?>
											<input id="profile__main--info-email" class="profile__change-input-change-info" type="text" name="email" value=<?php echo '"'.$row['email'].'"'?>>
									</div>
								</div>

								<hr>

								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
										<label for="" class="profile__main--title">Gender:</label>
									</div>

									<div class="profile__main--container-info">
											<?php 
												echo '<p class="profile__main--info-text">'.$row['gender'].'</p>'
											
											?>

											<select class="profile__change-input-change-info" name="gender" id="gender" value="AAA">
												<option value="null">--Choose gender--</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Other">Other</option>
											</select>
									</div>
								</div>


								<div class="grid__row profile__main--item">
									<div class="profile__main--container-title">
									</div>
									<button id="cancel-change-info" class="btn-cancel cancel-change-info">Cancel</button>
									<input id="btn-submit-change-info" type="submit" class="btn-submit btn-submit-change-info" value="Change">
								</div>

							</div>
						</form>


						<!-- Change password -->
						<div id="profile__container-change-pass" class="profile__container-change-pass">
							<h2 class="profile__title">
								Change password:
							</h2>
							<form action="/admin/changePassword.php" method="POST" class="profile__form-change-pass">
								<!-- Current password -->
								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										<label for="currentpass" class="profile__change-pass--title">Current password:</label>
									</div>
									<input id="currentpass" name="currentpass" type="password" class="change-pass--input">
								</div>

								<!-- New password -->
								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										<label for="newpass" class="profile__change-pass--title">New password:</label>
									</div>
										<input id="newpass" name="newpass" type="password" class="change-pass--input">
								</div>

								<!-- Repeat New password -->
								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										<label for="re-newpass" class="profile__change-pass--title">Repeat new password:</label>
									</div>
										<input id="re-newpass" name="re-newpass" type="password" class="change-pass--input">
								</div>
								

								<div class="grid__row profile__change-pass--item">
									<div class="profile__change-pass--container-title">
										
									</div>
									<input id="btn-submit-change-password" type="submit" class="btn-submit btn-submit-change-password" value="Change">
								</div>
								
							</form>
						</div>

					</div>	
				</div>
			</div>
		</div>
    </div>