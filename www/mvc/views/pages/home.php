<?php 
	$rooms = json_decode($data['favorateRoom']);
	$localImage="/mvc/data/images/room/";
?>

<div class="home__welcome-page">
	<div class="grid">
		<div class="grid__row welcome-page__container">
			<div class="grid__column-2 welcome-page__content" id="welcome-page__content">
				<h3 class="welcome-page__title">WELCOME TO ROMANCY</h3>
				<p class="welcome-page__text">
					Carlton Hotel offers 940 elegantly designed spacious rooms and is 
					strategically located in the heart of Business District. 
					<span id="welcome-page__text--dots" class="welcome-page__text--dots">...</span>
					<span id="welcome-page__text--more" class="welcome-page__text--more">Warm welcome 
					and cosmopolitan facilities such as Executive and Premier Club Lounge, 
					two restaurants, a patisserie, gym and pool as well as 13 outstanding 
					functions rooms at reach - creating seamless and enjoyable stay for our 
					guests. Every part of the hotel experience is crafted to celebrate modern 
					Singapore and dedicated to the comfort of our guests.</span>
				</p>
				<button onclick="readMoreWelcomePage()" id="welcome-page__readmore-btn" class="welcome-page__readmore-btn">Read more</button>
				<div class="welcome-page__sign">
					<img src="/mvc/data/images/welcomepage/CEO-image.jpg" alt="" class="welcome-page__sign--img-CEO">
					<div class="welcome-page__sign--explain">
						<p class="welcome-page__sign--name">Hosni Abdelhadi</p>
						<p class="welcome-page__sign--position">CEO Carlton</p>
					</div>
				</div>
			</div>

			<div class="grid__column-2 welcome-page__image" id="welcome-page__image">
				<div class="welcome-page__image--container">
					<img src="/mvc/data/images/welcomepage/swimming.jpg" alt="" class="welcome-page--item welcome-page--image1">
					<img src="/mvc/data/images/welcomepage/kitchen.jpg" alt="" class="welcome-page--item welcome-page--image2">
				</div>
			</div>
		</div>
	</div>
</div>

<div id="room" class="favorite-rooms">
	<div class="grid">
		<div class="grid__row">
			<div id="slide-show__container" class="favorite-rooms__container">
				<h1 class="favorite-rooms__title">
					Our Favorite Room
				</h1>

				<?php 
					foreach($rooms as $room){
						echo '
							<div class="slide-show transfer-slide">
								<div class="favorite-rooms__slide--container-img">
									<img src="'.$localImage. $room->fileName.'" alt="" class="favorite-rooms__slide--img">
									<a href="/booking/default?room='.$room->roomType.'" class="btn__booking-now favorite-rooms_slide--booking">Đặt phòng</a>
								</div>
								<div class="favorite-rooms__information">
									<div class="favorite-rooms__slide--describe">
										<p class="favorite-rooms__slide--number-bed favorite-rooms__slide--item">
											'.$room->numberOfBed.' <i class="fa-solid fa-bed"></i>
										</p>
										<i class="fa-sharp fa-solid fa-circle"></i>
										<p class="favorite-rooms__slide--number-person favorite-rooms__slide--item">
											'.$room ->guest.' <i class="fa-solid fa-user-group"></i>
										</p>
										<i class="fa-sharp fa-solid fa-circle"></i>
										<p class="favorite-rooms__slide--area favorite-rooms__slide--item">
											'.$room -> area.' sqm
										</p>
									</div>
									<p class="favorite-rooms__slide--style-room">
										'.$room -> roomType.'
									</p>
									<div class="favorite-rooms__slide--price-item">
										<div class="favorite-rooms__slide--price">$'.$room->price.' </div> 
										/ night
									</div>
								</div>
							</div>
						';
					};

				?>
				

				
				<a id="prev-pic" class="prev-pic">&#10094;</a>
				<a id="next-pic" class="next-pic">&#10095;</a>
				<div class="all-rooms">
					<a href="/listroom" class="all-rooms--link">
						View all our rooms
						<i class="arrow fa-solid fa-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
			</div>

			
		</div>
	</div>
</div>

<div id="about" class="about">
	<div class="grid">
		<div class="grid__row overview-about__container">
			<div class="grid__column-3 overview-about">
				<h1 class="overview-about__title">Overview About Us</h1>
				<p class="overwiew-about__detail-text">
					In publishing and graphic design, Lorem ipsum is a placoder text commonly
					used to demonstrate the visual form of a document. When an unknown printer
					took a galley of type and scrambled.
				</p>
			</div>

			<div class="grid__column-3--2 overview-about__container-item">
			
					<div class="overview-about__item">
						<div class="overview-about__item--icon">
							<i class="fa-solid fa-location-dot"></i>
						</div>
						<div class="overview-about__item--text">
							10+ Branches
						</div>
					</div>
					
					<div class="overview-about__item">
						<div class="overview-about__item--icon">
							<i class="fa-sharp fa-solid fa-key"></i>
						</div>
						<div class="overview-about__item--text">
							100+ Rooms
						</div>
					</div>
					
					<div class="overview-about__item">
						<div class="overview-about__item--icon">
							<i class="fa-solid fa-bell-concierge"></i>
						</div>
						<div class="overview-about__item--text">
							20+ Services
						</div>
					</div>
					
					<div class="overview-about__item">
						<div class="overview-about__item--icon">
							<i class="fa-solid fa-calendar-days"></i>
						</div>
						<div class="overview-about__item--text">
							10+ years
						</div>
					</div>

				
					<div class="overview-about__item">
						<div class="overview-about__item--icon">
							<i class="fa-solid fa-users"></i>
						</div>
						<div class="overview-about__item--text">
							100k+ Customers
						</div>
					</div>
					
					<div class="overview-about__item">
						<div class="overview-about__item--icon">
							<i class="fa-solid fa-star"></i>
						</div>
						<div class="overview-about__item--text">
							5 Stars
						</div>
					</div>
				
			</div>
		</div>
		
	</div>
</div>

<div id="services" class="services">
	<div class="services__container">
		<div class="grid__row">
			<div class="services__item1 services__item">
				<div class="services__container-image services__container-image1">
				</div>
				<div class="services__container-text">
					<h3 class="service__title" >Our Services</h3>
					<h1 class="services__text--title">Fitness Center</h1>
					<p class="services__text--detail">
						In publishing and graphic design, Lorem ipsum is a placoder text commonly
						used to demonstrate the visual form of a document. When an unknown printer
						took a galley of type and scrambled.
					</p>
				</div>
			</div>
			
			<div class="services__item2 services__item">
				<div class="services__container-image services__container-image2">
				</div>
				
				<div class="services__container-text">
					<h3 class="service__title" >Our Services</h3>
					<h1 class="services__text--title">Restaurants</h1>
					<p class="services__text--detail">
						In publishing and graphic design, Lorem ipsum is a placoder text commonly
						used to demonstrate the visual form of a document. When an unknown printer
						took a galley of type and scrambled.
					</p>
				</div>
			</div>
			
			<div class="services__item3 services__item">
				<div class="services__container-text">
					<h3 class="service__title" >Our Services</h3>
					<h1 class="services__text--title">Spa Center</h1>
					<p class="services__text--detail">
						In publishing and graphic design, Lorem ipsum is a placoder text commonly
						used to demonstrate the visual form of a document. When an unknown printer
						took a galley of type and scrambled.
					</p>
				</div>

				<div class="services__container-image services__container-image3">
				</div>
			</div>

			
			<div class="services__item4 services__item">
				<div class="services__container-text">
					<h3 class="service__title" >Our Services</h3>
					<h1 class="services__text--title">Swimming</h1>
					<p class="services__text--detail">
						In publishing and graphic design, Lorem ipsum is a placoder text commonly
						used to demonstrate the visual form of a document. When an unknown printer
						took a galley of type and scrambled.
					</p>
				</div>

				<div class="services__container-image services__container-image4">
				</div>
			</div>
		</div>	
		
	</div>
</div>
