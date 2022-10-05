<?php 
	$rooms = json_decode($data['rooms']);
	$countRoom = count($rooms);
	;
?>

<div class="container-list-room">
				<div class="grid">
					<!--  -->
					<div class="list-room__group">
						<?php
							for($index = 0; $index < $countRoom; $index=$index+2){
								$localImage="url('./mvc/data/images/";
								$localImageTop = $localImage . $rooms[$index]->localAvatar . "')";
								$localImageBot = $localImage . $rooms[$index+1]->localAvatar . "')";
								echo '
									<!-- ROOM TOP -->
									<div class="list-room__group--container-room">
										<div class="grid__row">
											<div class="grid__column-10-6 grid__column--L">
												<div class="list-room__container-img" style="background: '.$localImageTop.' top center / cover no-repeat;">
													
												</div>
												<div class="list-room__content list-room-top__content">
													<div class="list-room__container-content list-room-top__container-content">
														<h2 class="list-room__style-room">'.$rooms[$index]->roomType.'</h2>
														<!-- Describe -->
														<p class="list-room__describe">All our room have a big windows All our room have a big windows All our room have a big windows</p>
														<!--  -->
														<div class="list-room__info-room">
															<div class="grid__row list-room__info-room--container">
																<!--  -->
																<div class="grid__column-3">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-users"></i>
																	</div>
																	<span class="list-room__info-room--text">'.$rooms[$index]->guest.' Person</span>
																</div>
																<!--  -->
																<div class="grid__column-3 ">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-chart-area"></i>
																	</div>
																	<span class="list-room__info-room--text">'.$rooms[$index]->area.' Sqm</span>
																</div>
																<!--  -->
																<div class="grid__column-3 ">
																	<div class="list-room__info-room--icon">
																	<i class="fa-solid fa-bed"></i>
																	</div>
																	<span class="list-room__info-room--text">'.$rooms[$index]->numberOfBed.' Bed</span>
																</div>
																<!--  -->
																<div class="grid__column-3 ">
																	<div class="list-room__info-room--icon">
																	<i class="fa-solid fa-bath"></i>
																	</div>
																	<span class="list-room__info-room--text">1 Bath</span>
																</div>
																<!--  -->
																<div class="grid__column-3  ">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-mug-saucer"></i>
																	</div>
																	<span class="list-room__info-room--text">Breakfast</span>
																</div>
																<!--  -->
																<div class="grid__column-3  ">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-car"></i>
																	</div>
																	<span class="list-room__info-room--text">Parking car</span>
																</div>
															</div>
														</div>
														<!--  -->
														<hr>
														<div class="list-room__booking">
															<div class="list-room__booking-price">
																<span class="list-room__booking-price--text">$'.$rooms[$index]->price.'/ Night</span>
															</div>
															<!--  -->
															<a href="booking/default/'.$rooms[$index] -> roomNumber.'" class="list-room__booking-btn">BOOK NOW</a>
														</div>
													</div>
												</div>
			
											</div>
			
											<div class="grid__column-10-4 grid__column--S">
												<!--  -->
											</div>
										</div>
									</div>

									<!-- ROOM BOT -->
									<div class="list-room__group--container-room">
										<div class="grid__row">
											<div class="grid__column-10-4 grid__column--S">
												<!--  -->
											</div>
					
											<div class="grid__column-10-6 grid__column--L">
												<div class="list-room__container-img" style="background: '.$localImageBot.' top center / cover no-repeat;">
														
												</div>
							
												<div class="list-room__content list-room-bot__content">
													<div class="list-room__container-content list-room-bot__container-content">
														<h2 class="list-room__style-room">'.$rooms[$index+1] -> roomType.'</h2>
														<!--  -->
														<p class="list-room__describe">All our room have a big windows All our room have a big windows All our room have a big windows</p>
														<!--  -->
														<div class="list-room__info-room">
															<div class="grid__row list-room__info-room--container">
																<!--  -->
																<div class="grid__column-3">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-users"></i>
																	</div>
																	<span class="list-room__info-room--text">'.$rooms[$index+1] -> guest.' Person</span>
																</div>
																<!--  -->
																<div class="grid__column-3 ">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-chart-area"></i>
																	</div>
																	<span class="list-room__info-room--text">'.$rooms[$index+1] -> area.' Sqm</span>
																</div>
																<!--  -->
																<div class="grid__column-3 ">
																	<div class="list-room__info-room--icon">
																	<i class="fa-solid fa-bed"></i>
																	</div>
																	<span class="list-room__info-room--text">'.$rooms[$index+1] -> numberOfBed.' Bed</span>
																</div>
																<!--  -->
																<div class="grid__column-3 ">
																	<div class="list-room__info-room--icon">
																	<i class="fa-solid fa-bath"></i>
																	</div>
																	<span class="list-room__info-room--text">1 Bath</span>
																</div>
																<!--  -->
																<div class="grid__column-3  ">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-mug-saucer"></i>
																	</div>
																	<span class="list-room__info-room--text">Breakfast</span>
																</div>
																<!--  -->
																<div class="grid__column-3  ">
																	<div class="list-room__info-room--icon">
																		<i class="fa-solid fa-car"></i>
																	</div>
																	<span class="list-room__info-room--text">Parking car</span>
																</div>
															</div>
														</div>
														<!--  -->
														<hr>
														<div class="list-room__booking">
															<div class="list-room__booking-price">
																<span class="list-room__booking-price--text">$'.$rooms[$index+1] -> price.'/ Night</span>
															</div>
															<!--  -->
															<a href="booking/default/'.$rooms[$index+1] -> roomNumber.'" class="list-room__booking-btn">BOOK NOW</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								';
							}
						?>
						
						
						
					</div>
				</div>
			</div>