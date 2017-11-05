<?php

/*
Template Name: home
*/

?>
<?php get_header(); ?>

<div class="slider">
	<div>
		<!--  <img src="<?php //echo get_template_directory_uri(); ?>/img/slide.jpg" alt="" style="z-index: 2; opacity: 1;" class="img-fluid">	 -->	
		<?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
	</div>
	<div class="frame"></div>
	<div class="search_stock">
		<div class="container-fluid">
			<div class="header">
				<span>Search Our Stock</span>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div>
						<select name="make" id="parent_selection">
							<option value="">Select A Make</option>
							<option value="">Any</option>
							<option value="aston-martin">Aston Martin</option>
							<option value="audi">Audi</option>
							<option value="bentley">Bentley</option>
							<option value="bmw">BMW</option>
							<option value="cadillac">Cadillac</option>
							<option value="ferrari">Ferrari</option>
							<option value="ford">Ford</option>
							<option value="gmc">GMC</option>
							<option value="infiniti">Infiniti</option>
							<option value="jaguar">Jaguar</option>
							<option value="jeep">Jeep</option>
							<option value="lamborghini">Lamborghini</option>
							<option value="land-rover">Land Rover</option>
							<option value="lexus">Lexus</option>
							<option value="maserati">Maserati</option>
							<option value="mercedes-benz">Mercedes-Benz</option>
							<option value="mini">Mini</option>
							<option value="nissan">Nissan</option>
							<option value="peugeout">PEUGEOUT</option>
							<option value="porsche">Porsche</option>
							<option value="rolls-royce">Rolls Royce</option>
							<option value="toyota">Toyota</option>
							<option value="volkswagen">Volkswagen</option>
							<option value="wrangler-2">Wrangler</option>
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<select>
						<option value="">Select A Model</option>
						<option value="">Any</option>
					</select>
				</div>
				<div class="col-lg-2 col-md-6">
					<select name="yr">
						<option value="">Select A Year</option>
						<option value="">Any</option>
						<option value="1965">1965</option>
						<option value="1972">1972</option>
						<option value="1985">1985</option>
						<option value="2000">2000</option>
						<option value="2001">2001</option>
						<option value="2002">2002</option>
						<option value="2003">2003</option>
						<option value="2004">2004</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
						<option value="2008">2008</option>
						<option value="2009">2009</option>
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-6">
					<select name="price">
						<option value="">Select Price Range (AED)</option>
						<option value="">Any</option>
						<option value="50,000">Less than 50,000</option>
						<option value="100,000">Less than 100,000</option>
						<option value="150,000">Less than 150,000</option>
						<option value="200,000">Less than 200,000</option>
						<option value="250,000">Less than 250,000</option>
						<option value="300,000">Less than 300,000</option>
						<option value="350,000">Less than 350,000</option>
						<option value="400,000">Less than 400,000</option>
						<option value="450,000">Less than 450,000</option>
						<option value="500,000">Less than 500,000</option>
						<option value="1000,000">Less than 1,000,000</option>
					</select>
				</div>
				<div class="col-lg-2 col-md-6">
					<button class="btn e_button">Search</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section bg_section">

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="header">
					<span>New Stocks</span>
					<span>Choose from our widest selection of luxury vehicles on offer and drive the car of your dreams today!</span>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row car_tiles_row">
			<div class="col-md-4 col-sm-6">
				<div class="car_tile">
					<div class="title">
						<div>ROLLS ROYCE</div>
						<div>Phantom</div>
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="car">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80.png" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80_on.png" class="img-fluid">
					</div>		
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="car_tile">
					<div class="title">
						<div>ROLLS ROYCE</div>
						<div>Phantom</div>
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="car">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80.png" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80_on.png" class="img-fluid">
					</div>		
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="car_tile">
					<div class="title">
						<div>ROLLS ROYCE</div>
						<div>Phantom</div>
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="car">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80.png" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80_on.png" class="img-fluid">
					</div>		
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="car_tile">
					<div class="title">
						<div>ROLLS ROYCE</div>
						<div>Phantom</div>
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="car">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80.png" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80_on.png" class="img-fluid">
					</div>		
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="car_tile">
					<div class="title">
						<div>ROLLS ROYCE</div>
						<div>Phantom</div>
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="car">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80.png" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80_on.png" class="img-fluid">
					</div>		
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="car_tile">
					<div class="title">
						<div>ROLLS ROYCE</div>
						<div>Phantom</div>
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="car">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80.png" class="img-fluid">
						<img src="<?php echo get_template_directory_uri(); ?>/img/main_g80_on.png" class="img-fluid">
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section welcome">
	<div class="transparent_bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-12"><span>welcome to the elite cars</span></div>
			<div class="col-12">
				<p>
					There are a number of new and used car dealers in Dubai, but there are two things that set us apart from the competition: luxury vehicles at the most competitive prices and uncompromising customer service. Offering over 200 British, German and Italian luxury car brands such as Land Rover, BMW, Mercedes, Jaguar, Porsche, Ferrari, and Maserati at our showrooms in two locations, we offer a wide selection to choose from. Hence, you will find the one that perfectly suit your needs, lifestyle and budget.
				</p>
			</div>
		</div>
	</div>
</div>
<div class="section monthly_stock">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="header">
					<span>Monthly Deals</span>
					<span>Browse through our latest luxurious cars in Stock!</span>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid filter">
		<div class="row">
			<div class="col-12">
				<ul class="inline">
					<li><a href="" class="btn e_button_two selected">All</a></li>
					<li><a href="" class="btn e_button_two">Cadillac</a></li>
					<li><a href="" class="btn e_button_two">Range Rover</a></li>
					<li><a href="" class="btn e_button_two">Porsche</a></li>
					<li><a href="" class="btn e_button_two">BMW</a></li>
					<li><a href="" class="btn e_button_two">Nissan</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid deal_cars">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car1.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car2.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car3.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car4.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car5.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car6.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car7.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car8.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price_e">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section bg_section quick_links">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="quick_link">
					<div>
						<div class="icon">
							<i class="fa fa-car" aria-hidden="true"></i>
						</div>
					</div>
					<div>VIEW OUR STOCK</div>
					<div>We have one of the largest showrooms in Dubai.</div>
					<div><a href="" class="btn e_button_two">View All Our stock</a></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="quick_link">
					<div>
						<div class="icon">
							<i class="fa fa-users" aria-hidden="true"></i>
						</div>
					</div>
					<div>Meet our team</div>
					<div>We have a friendly, knowledgeable and multilingual team of sales executives who make car shopping an exciting and stress-free experience.</div>
					<div><a href="" class="btn e_button_two">Contact us</a></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="quick_link">
					<div>
						<div class="icon">
							<i class="fa fa-wrench" aria-hidden="true"></i>
						</div>
					</div>
					<div>elite motors services</div>
					<div>We dont just sell cars, we also offer repairs, maintenance and valet services.</div>
					<div><a href="" class="btn e_button_two">view services</a></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="quick_link">
					<div>
						<div class="icon">
							<i class="fa fa-bullhorn" aria-hidden="true"></i>
						</div>
					</div>
					<div>promotions</div>
					<div>We have one of the largest showrooms in Dubai.</div>
					<div><a href="" class="btn e_button_two">current promotions</a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="blogs section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="header">
					<span>Recent Blogs</span>
					<span>Browse through our latest luxurious cars in Stock!</span>
				</div>
			</div>
		</div>
	</div>
	<div class="row no-gutters">
		<div class="col-sm-4">
			<div class="blog">
				<div class="img-box">
					<div class="img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/blog1.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
					</div>
				</div>
				<div class="title clampThis">
					De Finibus Bonorum et Malorum
				</div>
				<div class="intro_content clampThis2">
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="blog">
				<div class="img-box">
					<div class="img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/blog2.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
					</div>
				</div>
				<div class="title clampThis">
					De Finibus Bonorum et Malorum
				</div>
				<div class="intro_content clampThis2">
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="blog">
				<div class="img-box">
					<div class="img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/blog3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
					</div>
				</div>
				<div class="title clampThis">
					De Finibus Bonorum et Malorum
				</div>
				<div class="intro_content clampThis2">
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
				</div>
			</div>
		</div>
		<div class="col-12 text-center btn-container">
			<a href="" class="btn e_button_two">
				<span>View All our blog posts</span>
			</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>
