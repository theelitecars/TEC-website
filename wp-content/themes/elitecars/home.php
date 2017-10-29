<?php get_header(); ?>

<div class="slider">
	<div>
		 <img src="<?php echo get_template_directory_uri(); ?>/img/slide.jpg" alt="" style="z-index: 2; opacity: 1;" class="img-fluid">		
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
					<li class="active">All</li>
					<li>Cadillac</li>
					<li>Range Rover</li>
					<li>Porsche</li>
					<li>BMW</li>
					<li>Nissan</li>
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
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car2.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car3.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car4.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car5.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car6.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car7.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="deal_car">
					<img src="<?php echo get_template_directory_uri(); ?>/img/car8.png" class="img-fluid">
					<div class="title clampThis">
						RANGE ROVER VOUGE HSE 2016RANGE ROVER VOUGE HSE 2016
					</div>
					<div class="price">
						<span>AED 1,000,000</span>
					</div>
					<div class="selection"><span>VIEW</span></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section welcome">
</div>
<div class="blogs">
	<div class="row no-gutters">
		<div class="col-sm-4">
			<div class="blog">
				<div class="img-box" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/blog1.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
				</div>
				<div class="title clampThis2">
					Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
				</div>
				<div class="intro_content clampThis3">
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="blog">
				<div class="img-box" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/blog2.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="blog">
				<div class="img-box" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/blog3.jpg'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
