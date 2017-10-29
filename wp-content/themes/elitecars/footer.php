<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elitecars
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="container">
        <div class="row">
        <div class="col-md-4">
        <h2>Brands</h2>
        <ul>
        <li>Audi</li>
        <li>Aston Martin</li>
       
        <li>BMW</li>
        <li>Bentley</li>
        <li>Ferrari</li>
        <li>Jaguar</li>
         <li>Jeep</li>
         <li>Land Rover</li>
         <li>Mercedes-Benz</li>
        <li>Maserati</li>
        <li>Mini Cooper</li>
        <li>Porsche</li>
        <li>Rolls Royce</li>
        </ul>
        </div>
        <div class="col-md-4">
        <h2>About</h2>
        <ul>
        <li>About Us</li>
        <li>Our Team</li>
        <li>Partners</li>
        <li>Services</li>
        <li>News Room</li>
        <li>Stock</li>
        <li>Promotions</li>
        <li>Gallery</li>
        <li>Testimonials</li>
        <li>Contact Us</li>
        </ul>
        </div>
        <div class="col-md-4">
        <h2>Contact Us</h2>
        <ul>
        <li>Address: Street 4, Al Quoz Ind. Area 3, Dubai, UAE</li>
        <li>Phone: +971 4 321 2290</li>
        <li>Toll Free:800-ELITECARS (354832277)</li>
        <li>Email:Sales@TheEliteCars.com</li>
        </ul>
        <div class="cta--wrapper"><span class="cta-state-0">NEWSLETTER SIGN-UP  </span></div>
        <div><i class="fa fa-facebook" aria-hidden="true"></i> <i class="fa fa-instagram" aria-hidden="true"></i> <i class="fa fa-twitter" aria-hidden="true"></i>
<i class="fa fa-linkedin" aria-hidden="true"></i> <i class="fa fa-pinterest-p" aria-hidden="true"></i>
</div>



        </div>
        </div>
        <hr class="footer-divider" /> 
        </div>
        
		<div class="container">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/" target="_blank" title="Wordpress Technical Support" alt="Wordpress Technical Support">tttt <?php echo esc_html__('Wordpress Technical Support','wp-bootstrap-starter'); ?></a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
