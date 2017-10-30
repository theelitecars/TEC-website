<?php 

add_action('admin_menu', 'listing_categories_page');

function listing_categories_page(){
	add_submenu_page( 'edit.php?post_type=listings', __("Listing Categories", "listings"), __("Listing Categories", "listings"), 'manage_options', 'listing_categories', 'listing_categories');
}

function array_insert_after($key, &$array, $new_key, $new_value) {
  if (array_key_exists ($key, $array)) {
    $new = array();
    foreach ($array as $k => $value) {
      $new[$k] = $value;
      if ($k === $key) {
        $new[$new_key] = $new_value;
      }
    }
    return $new;
  }
  return FALSE;
}

// process form data
function add_listing_category(){
	global $Listing;

	// get current categories
	$current_categories = get_auto_listing_categories();
	if($current_categories == false){
		$current_categories = array();
	}

	$public_query_vars = array('m', 'p', 'posts', 'w', 'cat', 'withcomments', 'withoutcomments', 's', 'search', 'exact', 'sentence', 'debug', 'calendar', 'page', 'paged', 'more', 'tb', 'pb', 'author', 'order', 'orderby', 'monthnum', 'day', 'hour', 'minute', 'second', 'name', 'category_name', 'tag', 'feed', 'author_name', 'static', 'pagename', 'page_id', 'error', 'comments_popup', 'attachment', 'attachment_id', 'subpost', 'subpost_id', 'preview', 'robots', 'taxonomy', 'term', 'cpage', 'post_type');

	if(isset($_POST['submit_listing_cat']) && !empty($_POST['submit_listing_cat'])){
		if(in_array(strtolower($_POST['singular-form']), $public_query_vars) || in_array(strtolower($_POST['plural-form']), $public_query_vars)){
			$redirect = add_query_arg("err", "var");
			header("Location: " . $redirect);
			die;
		}

		if(isset($_GET['edit']) && !empty($_GET['edit'])){
			$current_edit = urldecode($_GET['edit']);

			$singular_form = sanitize_text_field($_POST['singular-form']);
			$plural_form   = sanitize_text_field($_POST['plural-form']);
			$slug 		   = sanitize_text_field( (isset($_POST['url-slug']) && !empty($_POST['url-slug']) ? $_POST['url-slug'] : $_POST['singular-form']) );

			$slug = $Listing->slugify($slug);


			// if it gets renamed, remove the previous entry and insert new one
			if($current_edit != $slug){

				$insert_after = array_insert_after($current_edit, $current_categories, $slug, array());

				//$current_edit = str_replace(" ", "_", strtolower($singular_form));
				if($insert_after != false){
					$current_categories = $insert_after;
				}

				// set up new category
				$current_categories[$slug] = array(
					"singular"       => $singular_form,
					"plural"         => $plural_form,
					"slug"           => $slug,
					"filterable"     => (isset($_POST['filterable']) && !empty($_POST['filterable']) ? $_POST['filterable'] : 0),
					"use_on_listing" => (isset($_POST['use_on_listing']) && !empty($_POST['use_on_listing']) ? $_POST['use_on_listing'] : 0),
					"hide_category"	 => (isset($_POST['hide_category']) && !empty($_POST['hide_category']) ? $_POST['hide_category'] : 0),
					"column"		 => (isset($_POST['column']) && !empty($_POST['column']) ? $_POST['column'] : 0),
					"location_email" => (isset($_POST['location_email']) && !empty($_POST['location_email']) ? $_POST['location_email'] : 0),
					"compare_value"  => (isset($_POST['compare_value']) && !empty($_POST['compare_value']) ? sanitize_text_field($_POST['compare_value']) : "="),
					"currency"		 => (isset($_POST['currency']) && !empty($_POST['currency']) ? $_POST['currency'] : 0),
					"link_value"	 => (isset($_POST['link_value']) && !empty($_POST['link_value']) ? $_POST['link_value'] : 0),
					"sort_terms"	 => (isset($_POST['sort_terms']) && !empty($_POST['sort_terms']) ? $_POST['sort_terms'] : 0),
					"dependancy"	 => (isset($_POST['dependancy']) && !empty($_POST['dependancy']) ? $_POST['dependancy'] : ''),
					"dependancies"	 => (isset($_POST['dependancies']) && !empty($_POST['dependancies']) ? $_POST['dependancies'] : ''),
					"terms"			 => (isset($current_categories[$current_edit]['terms']) && !empty($current_categories[$current_edit]['terms']) ? $current_categories[$current_edit]['terms'] : "")
				);

				unset($current_categories[$current_edit]);
			} else {
				
				// keeps same key
				$current_categories[$current_edit] = array(
					"singular"       => $singular_form,
					"plural"         => $plural_form,
					"slug"         	 => $slug,
					"filterable"     => (isset($_POST['filterable']) && !empty($_POST['filterable']) ? $_POST['filterable'] : 0),
					"use_on_listing" => (isset($_POST['use_on_listing']) && !empty($_POST['use_on_listing']) ? $_POST['use_on_listing'] : 0),
					"hide_category"	 => (isset($_POST['hide_category']) && !empty($_POST['hide_category']) ? $_POST['hide_category'] : 0),
					"column"		 => (isset($_POST['column']) && !empty($_POST['column']) ? $_POST['column'] : 0),
					"location_email" => (isset($_POST['location_email']) && !empty($_POST['location_email']) ? $_POST['location_email'] : 0),
					"compare_value"  => (isset($_POST['compare_value']) && !empty($_POST['compare_value']) ? sanitize_text_field($_POST['compare_value']) : "="),
					"currency"		 => (isset($_POST['currency']) && !empty($_POST['currency']) ? $_POST['currency'] : 0),
					"link_value"	 => (isset($_POST['link_value']) && !empty($_POST['link_value']) ? $_POST['link_value'] : 0),
					"sort_terms"	 => (isset($_POST['sort_terms']) && !empty($_POST['sort_terms']) ? $_POST['sort_terms'] : 0),
					"dependancy"	 => (isset($_POST['dependancy']) && !empty($_POST['dependancy']) ? $_POST['dependancy'] : ''),
					"dependancies"	 => (isset($_POST['dependancies']) && !empty($_POST['dependancies']) ? $_POST['dependancies'] : ''),
					"terms"			 => (isset($current_categories[$current_edit]['terms']) && !empty($current_categories[$current_edit]['terms']) ? $current_categories[$current_edit]['terms'] : "")
				);
			}

		} else {
			// get current categories
			$current_categories = get_auto_listing_categories();
			if($current_categories == false){
				$current_categories = array();
			}

			$singular_form = sanitize_text_field($_POST['singular-form']);
			$plural_form   = sanitize_text_field($_POST['plural-form']);
			$slug 		   = sanitize_text_field( (isset($_POST['url-slug']) && !empty($_POST['url-slug']) ? $_POST['url-slug'] : $_POST['singular-form']) );

			$slug = $Listing->slugify($slug);


			// add to array
			$current_categories[$slug] = array(
				"singular"       => $singular_form,
				"plural"         => $plural_form,
				"slug"         	 => $slug,
				"filterable"     => (isset($_POST['filterable']) && !empty($_POST['filterable']) ? $_POST['filterable'] : 0),
				"use_on_listing" => (isset($_POST['use_on_listing']) && !empty($_POST['use_on_listing']) ? $_POST['use_on_listing'] : 0),
				"hide_category"	 => (isset($_POST['hide_category']) && !empty($_POST['hide_category']) ? $_POST['hide_category'] : 0),
				"column"		 => (isset($_POST['column']) && !empty($_POST['column']) ? $_POST['column'] : 0),
				"location_email" => (isset($_POST['location_email']) && !empty($_POST['location_email']) ? $_POST['location_email'] : 0),
				"compare_value"  => sanitize_text_field($_POST['compare_value']),
				"currency"		 => (isset($_POST['currency']) && !empty($_POST['currency']) ? $_POST['currency'] : 0),
				"link_value"	 => (isset($_POST['link_value']) && !empty($_POST['link_value']) ? $_POST['link_value'] : 0),
				"sort_terms"	 => (isset($_POST['sort_terms']) && !empty($_POST['sort_terms']) ? $_POST['sort_terms'] : 0),
				"dependancy"	 => (isset($_POST['dependancy']) && !empty($_POST['dependancy']) ? $_POST['dependancy'] : ''),
				"dependancies"	 => (isset($_POST['dependancies']) && !empty($_POST['dependancies']) ? $_POST['dependancies'] : '')
			);
		}

		update_option( get_auto_listing_categories_option(), $current_categories );

		$redirect = remove_query_arg( array("delete", "edit", "err") );
		header("Location: " . $redirect);
	}

	if(isset($_GET['reset_orderby_fix']) && is_admin()){
		delete_option(get_auto_orderby_option());
	}

	if(isset($_GET['make_default']) && !empty($_GET['make_default'])){
		$make_default = $_GET['make_default'];

		$category = get_single_listing_category($make_default);
		$previous_orderby = get_auto_orderby();

		if(!empty($previous_orderby)){
			$new_orderby_value = $previous_orderby;
			$new_orderby_value[$make_default] = (isset($category['compare_value']) && $category['compare_value'] != "=" ? "meta_value_num" : "meta_value");
		} else {
			$new_orderby_value = array();
			$new_orderby_value[$make_default] = (isset($category['compare_value']) && $category['compare_value'] != "=" ? "meta_value_num" : "meta_value");
		}

		update_option(get_auto_orderby_option(), $new_orderby_value);

		$redirect = remove_query_arg( array("delete", "edit", "make_default", "remove_default") );
		header("Location: " . $redirect);
	}

	if(isset($_GET['remove_default']) && !empty($_GET['remove_default'])){
		$previous_orderby = get_auto_orderby();

		unset($previous_orderby[$_GET['remove_default']]);

		update_option(get_auto_orderby_option(), $previous_orderby);

		$redirect = remove_query_arg( array("delete", "edit", "make_default", "remove_default") );
		header("Location: " . $redirect);
	}

	// if delete category
	if(isset($_GET['delete']) && !empty($_GET['delete'])){
		$to_delete = str_replace(" ", "_", strtolower(urldecode($_GET['delete'])));

		unset($current_categories[$to_delete]);

		update_option( get_auto_listing_categories_option(), $current_categories);

		$redirect = remove_query_arg( array("delete", "edit") );
		header("Location: " . $redirect);
	}

	// if order needs to be changed
	if(isset($_POST['save_listing_order']) && !empty($_POST['save_listing_order'])){
		//D($_POST['categories']);
		$new_options 	= (isset($_POST['categories']) && !empty($_POST['categories']) ? $_POST['categories'] : array());
		$original_info 	= get_auto_listing_categories();
		$new_order 		= array();

		foreach($new_options as $key => $option){
			$new_order[$key] = $original_info[$key];
		}

		$options = get_single_listing_category("options");

		$new_order['options'] = $options;

		update_option(get_auto_listing_categories_option(), $new_order);
	}

	if(isset($_POST['seo_string_holder'])){
		update_option( "listing_seo_string", sanitize_text_field($_POST['seo_string_holder']));
	}
}
add_action( "init", "add_listing_category" );


function listing_categories(){
	$public_query_vars = array('m', 'p', 'posts', 'w', 'cat', 'withcomments', 'withoutcomments', 's', 'search', 'exact', 'sentence', 'debug', 'calendar', 'page', 'paged', 'more', 'tb', 'pb', 'author', 'order', 'orderby', 'monthnum', 'day', 'hour', 'minute', 'second', 'name', 'category_name', 'tag', 'feed', 'author_name', 'static', 'pagename', 'page_id', 'error', 'comments_popup', 'attachment', 'attachment_id', 'subpost', 'subpost_id', 'preview', 'robots', 'taxonomy', 'term', 'cpage', 'post_type', 'order', 'action', 'layout', 'paged');

	$action = (isset($_GET['edit']) && !empty($_GET['edit']) ? __("Save", "listings") : __("Add New", "listings"));
	$listing_categories = get_listing_categories();

	$safe_edit = (isset($_GET['edit']) && !empty($_GET['edit']) ? $_GET['edit'] : "");
	
	if(isset($safe_edit) && !empty($safe_edit) && isset($listing_categories[$safe_edit]) && !empty($listing_categories[$safe_edit])){
		$_GET['edit']   = stripslashes(str_replace(" ", "_", strtolower($_GET['edit'])));

		$current_key    = $_GET['edit'];

		$singular_form  = htmlentities(stripslashes($listing_categories[$_GET['edit']]['singular']), ENT_QUOTES);
		$plural_form    = htmlentities(stripslashes($listing_categories[$_GET['edit']]['plural']), ENT_QUOTES);
		$slug_current   = htmlentities(stripslashes($listing_categories[$_GET['edit']]['slug']), ENT_QUOTES);
		$filterable     = $listing_categories[$_GET['edit']]['filterable'];
		$use_on_listing = $listing_categories[$_GET['edit']]['use_on_listing'];
		$hide_category  = (isset($listing_categories[$_GET['edit']]['hide_category']) && !empty($listing_categories[$_GET['edit']]['hide_category']) ? $listing_categories[$_GET['edit']]['hide_category'] : "");
		$column 		= (isset($listing_categories[$_GET['edit']]['column']) ? $listing_categories[$_GET['edit']]['column'] : "");
		$location_email = (isset($listing_categories[$_GET['edit']]['location_email']) ? $listing_categories[$_GET['edit']]['location_email'] : "");
		$compare_value  = (isset($listing_categories[$_GET['edit']]['compare_value']) && !empty($listing_categories[$_GET['edit']]['compare_value']) ? $listing_categories[$_GET['edit']]['compare_value'] : "");
		$currency       = (isset($listing_categories[$_GET['edit']]['currency']) && !empty($listing_categories[$_GET['edit']]['currency']) ? $listing_categories[$_GET['edit']]['currency'] : "");
		$link_value     = (isset($listing_categories[$_GET['edit']]['link_value']) && !empty($listing_categories[$_GET['edit']]['link_value']) ? $listing_categories[$_GET['edit']]['link_value'] : "");
		$sort_terms     = (isset($listing_categories[$_GET['edit']]['sort_terms']) && !empty($listing_categories[$_GET['edit']]['sort_terms']) ? $listing_categories[$_GET['edit']]['sort_terms'] : "");
		$dependancy     = (isset($listing_categories[$_GET['edit']]['dependancy']) && !empty($listing_categories[$_GET['edit']]['dependancy']) ? $listing_categories[$_GET['edit']]['dependancy'] : "");
		$dependancies 	= (isset($listing_categories[$_GET['edit']]['dependancies']) && !empty($listing_categories[$_GET['edit']]['dependancies']) ? $listing_categories[$_GET['edit']]['dependancies'] : "");

		$is_editing = true;
	} else {
		$is_editing = false;
	}

/*	
<div id="screen-meta" class="metabox-prefs" style="display: none;">
			
	<div id="screen-options-wrap" class="hidden" tabindex="-1" aria-label="Screen Options Tab" style="display: none;">
		
		

	</div>

</div>

<div id="screen-meta-links">
	<div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle" style="">
		<a href="#screen-options-wrap" id="show-settings-link" class="show-settings" aria-controls="screen-options-wrap" aria-expanded="false"><i class='fa fa-info'></i> &nbsp; <?php _e("Information", "listings"); ?></a>
	</div>
</div>
		
*/

?>
<div class="wrap nosubsub">
<h2><?php _e("Listing Categories", "listings"); ?></h2>

<?php

if(isset($_GET['err']) && $_GET['err'] == "var"){
	echo '<div class="error"><span class="error_text">';
	echo __("You cannot create listing categories that use these strings, it can conflict with WordPress: ", "listings");
	$list = "";
	foreach($public_query_vars as $var){
		$list .= $var . ", ";
	}

	echo substr($list, 0, -2);

	echo '</span></div>';
}

?>

<div id="ajax-response"></div>

<div id="col-container">

<div id="col-right">
<div class="col-wrap">
<form id="posts-filter" action="" method="post">

<div class="tablenav top">

<div class="tablenav-pages one-page">
<span class="pagination-links">
</span></div>
		<br class="clear">
	</div>

<form method="post" name="change_order">
<table class="wp-list-table widefat listing_categories">
	<thead>
		<tr>
			<th scope="col" id="singular" class="manage-column column-singular" style=""><span><?php _e("Singular", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" id="plural" class="manage-column column-plural" style=""><span><?php _e("Plural", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" id="slug" class="manage-column column-plural" style=""><span><?php _e("Slug", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" id="filterable" class="manage-column column-filterable" style=""><span><?php _e("Filterable", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" id="use-on-listing" class="manage-column column-use-on-listing" style=""><span><?php _e("Use on listing", "listings"); ?></span><span class="sorting-indicator"></span></th>	
			<th scope="col" class="manage-column" style=""><span><?php _e("Inventory sort by", "listings"); ?></span></th>	
			<th scope="col"></th>
			<th scope="col"></th>
			<th scope="col"></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<th scope="col" class="manage-column column-singular" style=""><span><?php _e("Singular", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" class="manage-column column-plural" style=""><span><?php _e("Plural", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" class="manage-column column-slug" style=""><span><?php _e("Slug", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" class="manage-column column-filterable" style=""><span><?php _e("Filterable", "listings"); ?></span><span class="sorting-indicator"></span></th>
			<th scope="col" class="manage-column column-use-on-listing" style=""><span><?php _e("Use on listing", "listings"); ?></span><span class="sorting-indicator"></span></th>	
			<th scope="col" class="manage-column" style=""><span><?php _e("Inventory sort by", "listings"); ?></span></th>	
			<th scope="col"></th>
			<th scope="col"></th>
			<th scope="col"></th>
		</tr>
	</tfoot>

	<tbody>		
		<?php
		$use_on_listing_i = 0;
		
		if(!empty($listing_categories)){ 
			$i = 0;

			$yes_text = __("Yes", "listings");
			$no_text  = __("No", "listings");

			$default_orderby = get_auto_orderby();
			
			foreach($listing_categories as $key => $category){ 

				if(!empty($category['singular']) && !empty($category['plural'])){

					$category['filterable'] 	= (isset($category['filterable']) && !empty($category['filterable']) ? $category['filterable'] : 0);
					$category['use_on_listing'] = (isset($category['use_on_listing']) && !empty($category['use_on_listing']) ? $category['use_on_listing'] : 0);

					$slug = (isset($category['slug']) && !empty($category['slug']) ? $category['slug'] : "");

					$i++;
					if($category['use_on_listing'] == 1){
						$use_on_listing_i++;
					}

					if(isset($category['location_email']) && $category['location_email'] == 1){
						$location_email_inuse = true;
					}
					?>
					<tr id="tag-<?php echo $i; ?>" class="<?php echo ($i & 1 ? " " : ""); ?>">
						<td class="singular column-singular"><strong><?php echo stripslashes($category['singular']); ?></strong></td>
						<td class="plural column-plural"><strong><?php echo stripslashes($category['plural']); ?></strong></td>
						<td class="slug column-slug"><strong><?php echo $slug; ?></strong></td>
						<td class="filterable column-filterable"><?php echo ($category['filterable'] == 1 ? $yes_text : $no_text); ?></td>
						<td class="use-on-listing column-use-on-listing"><?php echo ($category['use_on_listing'] == 1 ? $yes_text : $no_text); ?></td>
						<td class="">
							<?php if(isset($default_orderby[$slug]) && !empty($default_orderby[$slug])){ ?>
								<?php echo '&#x2713;';//check mark to save room _e("Selected ", "listings"); ?>
								<a href="<?php echo esc_url( add_query_arg("remove_default", stripslashes($slug), full_url($_SERVER))); ?>"><?php _e("Remove sort by", "listings"); ?></a>
							<?php } else { ?>
								<a href="<?php echo esc_url( add_query_arg("make_default", stripslashes($slug), full_url($_SERVER))); ?>"><?php _e("Make sort by", "listings"); ?></a>
							<?php } ?>
						</td>
						<td class=""><a href="<?php echo esc_url( add_query_arg("edit", $slug, full_url($_SERVER))); ?>"><?php _e("Edit", "listings"); ?></a></td>
						<td class=""><a href="<?php echo esc_url( add_query_arg("delete", $slug, full_url($_SERVER))); ?>"><?php _e("Delete", "listings"); ?></a></td>
						<td class=""><i class="fa fa-arrows handle" data-name="<?php echo $slug; ?>"></i> 
							<input type="hidden" name="categories[<?php echo $slug; ?>]" value="">
						</td>
					</tr>
			<?php 
			}
			}
		} else {
			echo "<tr><td colspan='2'>" . __("No Categories Yet", "listings") . "</td></tr>";
		}

		?>
	</table>

	<br>

	<input type="submit" class="button-primary" value="<?php _e("Save Order", "listings"); ?>" name="save_listing_order">
</form>

<br><br>

<button class="toggle_seo_options button-primary"><?php _e("Listing meta description (SEO)", "listings"); ?></button>
<form method="post" name="seo_listing" style="display: none;"><br>
	<?php $current_seo_string = get_option("listing_seo_string"); ?>

	<input type='text' style='width: 300px;' placeholder='SEO string' class='seo_string_holder' name='seo_string_holder' <?php echo (!empty($current_seo_string) ? "value='" . $current_seo_string . "'" : ""); ?>>

	<input type="submit" value="<?php _e("Save meta description", "listings"); ?>" class='button-primary'><br>
	<?php _e("To customize the meta descripton click the plus icon (<i class='fa fa-plus-square'></i>) on the right of the category to insert it at the end of the text area. The variables will be converted to their values on the listing page. You can add normal text as well, just be sure not to wrap it in the % symbols!", "listings"); ?>
</form>



	<div class="tablenav bottom">

<div class="tablenav-pages one-page"></div>
		<br class="clear">
	</div>

<br class="clear">
</form>

</div>
</div><!-- /col-right -->

<div id="col-left">
<div class="col-wrap">


<div class="form-wrap">
<h3><?php echo $action; ?> <?php _e("Listing Category", "listings"); ?></h3>
<form id="add_category" method="post" action="" class="validate">

<div class="form-field form-required">
	<label for="singular-form"><?php _e("Singular Form", "listings"); ?></label>
	<input name="singular-form" id="singular-form" type="text" size="40" aria-required="true"<?php echo ($is_editing ? " value='" . $singular_form . "'" : ""); ?>>
	<p><?php _e("The singular form of the category name", "listings"); ?>.</p>
</div>

<div class="form-field form-required">
	<label for="plural-form"><?php _e("Plural Form", "listings"); ?></label>
	<input name="plural-form" id="plural-form" type="text" size="40" aria-required="true"<?php echo ($is_editing ? " value='" . $plural_form . "'" : ""); ?>>
	<p><?php _e("The plural form of the category name", "listings"); ?>.</p>
</div>

<div class="form-field form-required">
	<label for="url-slug"><?php _e("URL Slug", "listings"); ?></label>
	<input name="url-slug" id="url-slug" type="text" size="40" aria-required="true"<?php echo ($is_editing ? " value='" . $slug_current . "'" : ""); ?>>
	<p><?php _e("The URL safe slug of your listing category, can only contain alphanumeric characters or a dash", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="compare_value" style="display: inline-block;"><?php _e("Compare Value", "listings"); ?></label>
	<select name="compare_value" id="compare_value">
		<?php $options = array("=", "<", "<=", ">", ">=");

		foreach($options as $option){
			echo "<option value='" . $option . "'" . ($is_editing ? selected( html_entity_decode($compare_value), $option, false ) : "") . ">" . $option . "</option>";
		} ?>
	</select>
	<p><?php _e("Change the way the value is compared, useful for numbers (mileage, fuel economy)", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="filterable" style="display: inline-block;"><?php _e("Filterable", "listings"); ?></label>
	<input name="filterable" id="filterable" type="checkbox" value="1" style="width: auto;"<?php echo ($is_editing && $filterable == 1 ? " checked='checked'" : ""); ?>>
	<p><?php _e("Make this category display in filterable spots", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="currency" style="display: inline-block;"><?php _e("Currency", "listings"); ?></label>
	<input name="currency" id="currency" type="checkbox" value="1" style="width: auto;"<?php echo ($is_editing && $currency == 1 ? " checked='checked'" : ""); ?>>
	<p><?php _e("Check this box if the current category is a currency or price", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="use_on_listing" style="display: inline-block;"><?php _e("Use on listing", "listings"); ?></label>
	<input name="use_on_listing" id="use_on_listing" type="checkbox" value="1" style="width: auto;"<?php echo ($is_editing && isset($use_on_listing) && $use_on_listing == 1 ? " checked='checked'" : "") . ((!$is_editing && isset($use_on_listing_i) && $use_on_listing_i == 10) || ($is_editing && $use_on_listing == 0 && $use_on_listing_i == 10) ? " disabled='disabled'" : ""); ?>>
    <i class='fa-info-circle auto_info_tooltip fa' data-title="<img src='<?php echo THUMBNAIL_URL; ?>widget_slider/example-use_on_listing.png' style='opactiy: 1'>" data-placement="right"></i>
	<p><?php _e("Make this category show on the listing information", "listings"); ?> (<?php echo (isset($use_on_listing_i) && $use_on_listing_i == 0 ? "10 max" : $use_on_listing_i . "/10"); ?>).</p>
</div>

<div class="form-field">
	<label for="hide_category" style="display: inline-block;"><?php _e("Hide Listing Category", "listings"); ?></label>
	<input name="hide_category" id="hide_category" type="checkbox" value="1" style="width: auto;"<?php echo ($is_editing && $hide_category == 1 ? " checked='checked'" : ""); ?>>
	<p><?php _e("Check this box if you want to hide the listing category on the single listing page sidebar", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="column" style="display: inline-block;"><?php _e("Show Column", "listings"); ?></label>
	<input name="column" id="column" type="checkbox" value="1" style="width: auto;"<?php echo ($is_editing && isset($column) && $column == 1 ? " checked='checked'" : ""); ?>>
	<p><?php _e("Show this listing category as a column under the listings post type", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="location_email" style="display: inline-block;"><?php _e("Multiple location emails", "listings"); ?></label>
	<input name="location_email" id="location_email" type="checkbox" value="1" style="width: auto;"<?php echo ($is_editing && isset($location_email) && $location_email == 1 ? " checked='checked'" : "") . (isset($location_email_inuse) && $location_email_inuse && !isset($location_email) ? " disabled='disabled'" : ""); ?>>
	<p><?php _e("Adds the ability to specify different email addresses on a per location basis for contact forms", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="link_value" style="display: inline-block;"><?php _e("Link Value", "listings"); ?></label>
	<?php $options = array("none" => "None", "price" => "Price", "mpg" => "MPG"); 

	$link_value = (isset($link_value) && !empty($link_value) ? $link_value : "");

	echo "<select name='link_value'>";
	foreach($options as $option => $label){
		echo "<option" . selected( $option, $link_value ) . " value='" . $option . "'>" . $label . "</option>";
	}
	echo "</select>";

	?>
	<p><?php _e("Choose a value that you want to link values with", "listings"); ?>.</p>
</div>

<div class="form-field">
	<label for="sort_terms" style="display: inline-block;"><?php _e("Sort Terms", "listings"); ?></label>
	<?php $options = array("asc" => __("Ascending", "listings"), "desc" => __("Descending", "listings")); 

	$sort_terms = (isset($sort_terms) && !empty($sort_terms) ? $sort_terms : "");

	echo "<select name='sort_terms'>";
	foreach($options as $option => $label){
		echo "<option" . selected( $option, $sort_terms ) . " value='" . $option . "'>" . $label . "</option>";
	}
	echo "</select>";

	?>
	<p><?php _e("Choose what order the terms will be ordered in.", "listings"); ?>.</p>
</div>

	<p><?php _e("Guess what? Dependancies are now completely automatic and don't require any user input anymore! Dropdowns on the frontend only contain values that listings use and automatically update as a user selects a new option.", "listings"); ?></p>

	<?php /*
<div class="form-field">
	<label for="dependancy" style="display: inline-block;"><?php _e("Dependancy", "listings"); ?></label>
	<?php $options = get_listing_categories(); 

	$dependancy = (isset($dependancy) && !empty($dependancy) ? $dependancy : "none");

	$options['none'] = array("singular" => "None");

	echo "<select name='dependancy'>";
	foreach($options as $val => $option){
		echo "<option" . selected( $val, $dependancy ) . " value='" . $val . "'>" . $option['singular'] . "</option>";
	}
	echo "</select>";

	?>
	<p><?php _e("Choose a value that this category will be dependant on (Perfect for makes and model filters)", "listings"); ?>.</p>
	<?php

	if($dependancy != "none" && isset($_GET['edit']) && !empty($_GET['edit'])){

		echo "<br>"; _e("The order you set the terms will be the order they appear.", "listings"); echo "<br>";

		// var_dump($dependancy);

		// D(get_listing_categories());
		// die;

		$parent_items = get_single_listing_category($dependancy);
		$parent_terms = $parent_items['terms'];

		if(!empty($parent_terms)){
			foreach($parent_terms as $key => $item){
				echo "<b>" . $item . "</b><br>";			

				// child items
				$child_selected = (isset($dependancies[$key]) && !empty($dependancies[$key]) ? $dependancies[$key] : "");
				if(!empty($child_selected)){
					$child_selected = array_flip($child_selected);
				}

				$child_items = get_single_listing_category($_GET['edit']);
				$child_terms = $child_items['terms'];

				echo "<select multiple name='dependancies[" . $key . "][]' class='multi' style='width: 350px;'>";
				
				foreach($child_terms as $child_key => $term){
					echo "<option value='" . $child_key . "' " . (isset($child_selected[$child_key]) ? " selected='selected'" : "") . ">" . $term . "</option>";
				}

				echo "</select><br><br>";
			}
		}
	}

	?>
</div>

 */ ?>

<p class="submit"><input type="submit" name="submit_listing_cat" id="submit" class="button button-primary" value="<?php echo $action; ?> <?php _e("Listing Category", "listings"); ?>"></p>

</form>

</div>

</div>
</div><!-- /col-left -->

</div><!-- /col-container -->
</div><!-- /wrap -->	

<div class="clear"></div>

<?php
}


?>