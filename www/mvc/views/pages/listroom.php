<?php 
	$rooms = json_decode($data['rooms']);
	$countRoom = count($rooms);

	$datefilter = "";
	$guest="";

	if(isset( $_GET['datefilter'])){
		$datefilter = $_GET['datefilter'];
	}
	if(isset( $_GET['guest'])){
		$guest = $_GET['guest'];
	}
?>

<div class="container-list-room">
	<div class="grid">
		<!--  -->
		<div class="list-room__group">
			<?php
				for($index = 0; $index < $countRoom; $index=$index+2){
					$localImage="url('/mvc/data/images/room/";
					$localImageTop = $localImage . $rooms[$index]->fileName . "')";
					$localImageBot = $localImage . $rooms[$index+1]->fileName . "')";
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
													<span class="list-room__booking-price--text format-money">'.$rooms[$index]->price.'</span><span>/ Night</span>
												</div>
												<!--  -->
												<a href="/booking/default?room='.$rooms[$index] -> roomType.'&datefilter='.$datefilter.'&guest='.$guest.'" class="list-room__booking-btn">BOOK NOW</a>
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
													<span class="list-room__booking-price--text format-money">'.$rooms[$index+1] -> price.'</span><span>/ Night</span>
												</div>
												<!--  -->
												<a href="/booking/default?room='.$rooms[$index+1] -> roomType.'&datefilter='.$datefilter.'&guest='.$guest.'" class="list-room__booking-btn">BOOK NOW</a>
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
	<div class="container-pagination">
            <!-- Btn pre-page -->
            <span class="btn__controller-page">
                <i class="fa-solid fa-angle-left"></i>
            </span>
            <!-- controller page -->
            
            <?php 
                for($i=1;$i<=$data['totalPage'];$i++){
					if(isset($_GET['search'])){
						echo '
							<a href="/listroom/default?datefilter='.$_GET['datefilter'].'&guest='.$_GET['guest'].'&search=search&page='.$i.'" class="btn__controller-page">
								<span>'.$i.'</span>
							</a> 
						';
					} else{
						echo '
							<a href="/listroom/default?page='.$i.'" class="btn__controller-page">
								<span>'.$i.'</span>
							</a> 
						';
					}
                }
            ?>  
            <!-- Btn next-page -->
            <span href="" class="btn__controller-page">
                <i class="fa-solid fa-angle-right"></i>
            </span>
    </div>
</div>