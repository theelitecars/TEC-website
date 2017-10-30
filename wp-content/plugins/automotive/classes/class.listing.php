<?php

if(!class_exists("Listing")){

	/**
     * Class Listing
     */
    class Listing {

	    /**
         * Generates a URL safe version of any string
         *
         * @param $text
         * @return mixed|string
         */
        static public function slugify($text){
            $char_map = array(
                // Latin
                'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
                'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
                'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
                'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
                'ß' => 'ss',
                'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
                'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
                'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
                'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
                'ÿ' => 'y',

                // Greek
                'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
                'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
                'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
                'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
                'Ϋ' => 'Y',
                'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
                'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
                'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
                'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
                'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

                // Turkish
                'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
                'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

                // Russian
                'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
                'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
                'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
                'Я' => 'Ya',
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
                'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
                'я' => 'ya',

                // Ukrainian
                'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
                'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

                // Czech
                'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
                'Ž' => 'Z',
                'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
                'ž' => 'z',

                // Polish
                'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
                'Ż' => 'Z',
                'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
                'ż' => 'z',

                // Latvian
                'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
                'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
                'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
                'š' => 's', 'ū' => 'u', 'ž' => 'z',

                // Symbols
                '©' => 'c', '®' => 'r',
            );

            $text = str_replace(array_keys($char_map), $char_map, $text);

            // replace non letter or digits by -
            $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

            // trim
            $text = trim($text, '-');

            // transliterate
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

            // lowercase
            $text = strtolower($text);

            // remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);

            if(empty($text)){
                return 'n-a';
            }

            return $text;
        }

        /**
         * Used for changing the option name when the plugin is used with WPML
         *
         * @param $option
         * @return string
         */
        public function option_name_suffix($option){
            if(defined("ICL_LANGUAGE_CODE") && ICL_LANGUAGE_CODE != "en"){
                $option .= "_" . ICL_LANGUAGE_CODE;
            }

            return $option;
        }

	    /**
         * Add image sizes for plugin
         */
        public function automotive_image_sizes(){
            global $slider_thumbnails;

            add_image_size("related_portfolio", 270, 140, true);
            add_image_size("auto_thumb", $slider_thumbnails['width'], $slider_thumbnails['height'], true);
            add_image_size("auto_slider", $slider_thumbnails['slider']['width'], $slider_thumbnails['slider']['height'], true);
            add_image_size("auto_listing", $slider_thumbnails['listing']['width'], $slider_thumbnails['listing']['height'], true);
            add_image_size("auto_portfolio", 770, 450, true);
        }

        public function load_redux(){
            $listing_features = get_option("listing_features");

            if(isset($listing_features) && $listing_features != "disabled"){
                include(LISTING_HOME . "ReduxFramework/loader.php");

                // Redux Admin Panel
                if ( !class_exists( 'ReduxFramework' ) && file_exists( LISTING_HOME . 'ReduxFramework/ReduxCore/framework.php' ) ) {
                    require_once( LISTING_HOME . 'ReduxFramework/ReduxCore/framework.php' );
                }
                if ( !isset( $redux_demo ) && file_exists( LISTING_HOME . 'ReduxFramework/options/options.php' ) ) {
                    require_once( LISTING_HOME . 'ReduxFramework/options/options.php' );
                }
            }
        }

	    /**
         * Verify ThemeForest credentials
         *
         * @param string $tf_username
         * @param string $tf_api
         * @return bool
         */
        public function validate_themeforest_creds($tf_username = "", $tf_api = ""){
            global $awp_options;

            // use default themeforest username
            if(empty($tf_username)){
                $tf_username = $awp_options['themeforest_name'];
            }

            // use default themeforest api
            if(empty($tf_api)){
                $tf_api = $awp_options['themeforest_api'];
            }

            $options = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Accept-language: en\r\n" .
                              "Cookie: foo=bar\r\n" .
                              "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
                )
            );

            $context = stream_context_create($options);

            $themes  = @file_get_contents("http://marketplace.envato.com/api/edge/" . $tf_username . "/" . $tf_api . "/wp-list-themes.json", false, $context);
            $themes  = json_decode($themes);

            $purchased_auto = false;

            if(!empty($themes) && !empty($themes->{'wp-list-themes'})){
                foreach($themes->{'wp-list-themes'} as $theme){
                    if($theme->item_id == 9210971){
                        $purchased_auto = true;
                    }
                }
            }

            return $purchased_auto;
        }

	    /**
         * Converts listing data to new, more usable system
         */
        public function convert_listing_data(){
            $slug_generated = get_option("auto_slugs_generated");

            if(!$slug_generated){

                $listing_categories = get_listing_categories(true);

                if(!empty($listing_categories)){
                    $new_listing_categories = array();

                    foreach($listing_categories as $key => $category){
                        // not options
                        if($key != "options"){
                            $slug = $this->slugify($category['singular']);

                            $new_listing_categories[$slug] = $listing_categories[$key];
                            $new_listing_categories[$slug]['slug'] = $slug;
                        } else {
                            $new_listing_categories['options'] = $category;
                            $slug = "options";
                        }

                        // update terms with new slugs in the key
                        if(!empty($category['terms'])){
                            foreach($category['terms'] as $term_key => $term_value) {
                                $new_listing_categories[$slug]['terms'][$this->slugify($term_value)] = $term_value;
                                unset($new_listing_categories[$slug]['terms'][$term_key]);
                            }
                        }
                    }

                    // now convert listing terms
                    $all_listings = get_posts( array("post_type" => "listings", "posts_per_page" => -1) );

                    if(!empty($all_listings)){
                        // D($all_listings);
                        foreach($all_listings as $key => $listing){
                            // foreach listing categories
                            foreach ($new_listing_categories as $category_key => $category_value) {
                                $category_post_key  = strtolower(str_replace(array(" ", "."), "_", $category_value['singular']));
                                $category_post_meta = get_post_meta( $listing->ID, $category_post_key, true );

                                // now update with new meta
                                update_post_meta($listing->ID, $category_value['slug'], $category_post_meta );
                            }
                        }
                    }

                    // now convert the orderby
                    $listing_orderby = get_option("listing_orderby");

                    if(!empty($listing_orderby)){
                        $new_orderby = array();

                        foreach($listing_orderby as $order_category => $order_type){
                            $new_orderby[$this->slugify($order_category)] = $order_type;
                        }

                        update_option("listing_orderby", $new_orderby);
                    }

                    // store a backup of listing categories, just in case
                    update_option("auto_backup_listing_categories", $listing_categories);
                    update_option("listing_categories", $new_listing_categories);
                }

                update_option("auto_slugs_generated", true);
            }
        }

	    /**
         * Used to generated the dependancy option for existing listings since automatic
	     * dependancies were only introduced in version 6.0
	     *
         */
        public function generate_dependancy_option(){
	        $dependancies_generated = get_option( $this->option_name_suffix("dependancies_generated") );

	        if( ! $dependancies_generated ) {
		        $all_listings = get_posts( array( "post_type" => "listings", "posts_per_page" => - 1 ) );
		        $dependancies = array();

		        if ( ! empty( $all_listings ) ) {
			        foreach ( $all_listings as $key => $listing ) {
				        $listing_categories = get_listing_categories( false );

				        foreach ( $listing_categories as $category_key => $category ) {
					        $post_meta = get_post_meta( $listing->ID, $category['slug'], true );

					        $dependancies[ $listing->ID ][ $category['slug'] ] = array($this->slugify($post_meta) => $post_meta);
				        }
			        }
		        }

		        update_option( $this->option_name_suffix("dependancies_generated"), $dependancies );
	        }
        }

	    /**
         * Used to update the dependancy option in the database after a user updates a listing
         *
	     * @param $listing_id
	     * @param $listing_categories
	     *
	     */
	    public function update_dependancy_option($listing_id, $listing_categories){
		    $dependancies_generated = get_option( $this->option_name_suffix("dependancies_generated") );

            if(is_string($listing_categories) && $listing_categories == "delete"){
                unset($dependancies_generated[$listing_id]);
            } else {
                if ($dependancies_generated) {
                    $dependancies_generated[$listing_id] = $listing_categories;
                }
            }

		    update_option( $this->option_name_suffix("dependancies_generated"), $dependancies_generated );
	    }


	    /**
         * Used for updating the listing category dropdowns with terms that are used
         *
	     * @param array $current_categories
	     * @return array
	     */
	    public function process_dependancies($current_categories = array()){
		    $dependancies_generated = get_option( $this->option_name_suffix("dependancies_generated") );
		    $return                 = array();

		    if(!empty($current_categories)){
			    // year workaround
			    if(isset($current_categories['yr']) && !empty($current_categories['yr'])){
				    $current_categories['year'] = $current_categories['yr'];
				    unset($current_categories['yr']);
			    }

			    // remove unnecessary vars
                // Only sort through listing category vars
                $valid_current_categories = array();
                foreach(get_listing_categories() as $category_key => $category_value){
                    // min and max empty val check
                    if( isset($current_categories[$category_value['slug']]) && is_array($current_categories[$category_value['slug']]) &&
                        !empty($current_categories[$category_value['slug']][0]) && !empty($current_categories[$category_value['slug']][1])){
                        $valid_current_categories[$category_value['slug']] = $current_categories[$category_value['slug']];
                    } elseif(isset($current_categories[$category_value['slug']]) && !is_array($current_categories[$category_value['slug']]) &&  !empty($current_categories[$category_value['slug']])){
                        $valid_current_categories[$category_value['slug']] = $current_categories[$category_value['slug']];
                    }
                }

                $current_categories = $valid_current_categories;
		    }

		    if(!empty($dependancies_generated)){
                $listing_category_settings = get_filterable_listing_categories();

			    foreach($dependancies_generated as $listing_id => $categories){

				    if(!empty($current_categories)){
						$has_required_values = false;

					    foreach($current_categories as $current_key => $current_value){

                            if(!empty($categories) && is_array($categories) && isset($categories[$current_key])) {

                                // make sure min/max value is in between
                                if (is_array($current_value)) {
                                    reset($categories[$current_key]);
                                    $key = key($categories[$current_key]);

                                    $min = (isset($current_value[0]) && !empty($current_value[0]) ? $current_value[0] : "");
                                    $max = (isset($current_value[1]) && !empty($current_value[1]) ? $current_value[1] : "");

                                    if (!empty($min) && !empty($max) && (($min <= $key) && ($key <= $max))) {
                                        $has_required_values = true;
                                    }
                                } elseif (is_array($categories[$current_key])) {
                                    reset($categories[$current_key]);
                                    $key = key($categories[$current_key]);

                                    if ($key != $current_value) {
                                        $has_required_values = false;
                                        break;
                                    } else {
                                        $has_required_values = true;
                                    }
                                }
                            }
					    }

					    // current listing has all required dependancies
					    if($has_required_values){
						    foreach ( $categories as $category_key => $category_value ) {

							    // if not array, declare
							    if ( ! isset( $return[ $category_key ] ) || ! is_array( $return[ $category_key ] ) ) {
								    $return[ $category_key ] = array();
							    }

							    // make sure no empty values make it into available terms
							    reset( $category_value );
							    $key = key( $category_value );

                                $select_label = $category_value[ $key ];

                                // apply currency or compare values to value
                                if(isset($listing_category_settings[$category_key]['currency']) && $listing_category_settings[$category_key]['currency'] == 1){
                                    $select_label = format_currency($select_label);
                                }

                                if(isset($listing_category_settings[$category_key]['compare_value']) && $listing_category_settings[$category_key]['compare_value'] != "="){
                                    $select_label = html_entity_decode($listing_category_settings[$category_key]['compare_value']) . " " . $select_label;
                                }

							    if ( isset( $category_value[ $key ] ) && ! empty( $category_value[ $key ] ) && $category_value[ $key ] != "None" && ! in_array( $category_value[ $key ], $return[ $category_key ] ) ) {
								    $return[ $category_key ][ $key ] = $select_label;
							    }

						    }
					    }

				    } else {
					    foreach ( $categories as $category_key => $category_value ) {

						    // if not array, declare
						    if ( ! isset( $return[ $category_key ] ) || ! is_array( $return[ $category_key ] ) ) {
							    $return[ $category_key ] = array();
						    }

						    // make sure no empty values make it into available terms
						    reset( $category_value );
						    $key = key( $category_value );

                            $select_label = $category_value[ $key ];

                            // apply currency or compare values to value
                            if(isset($listing_category_settings[$category_key]['currency']) && $listing_category_settings[$category_key]['currency'] == 1){
                                $select_label = format_currency($select_label);
                            }

                            if(isset($listing_category_settings[$category_key]['compare_value']) && $listing_category_settings[$category_key]['compare_value'] != "="){
                                $select_label = html_entity_decode($listing_category_settings[$category_key]['compare_value']) . " " . $select_label;
                            }

						    if ( isset( $category_value[ $key ] ) && ! empty( $category_value[ $key ] ) && $category_value[ $key ] != "None" && ! in_array( $category_value[ $key ], $return[ $category_key ] ) ) {
							    $return[ $category_key ][ $key ] = $select_label;
						    }
					    }
				    }
			    }
		    }

		    return $return;
	    }

        /**
         * Used to generate the listing dropdowns for the search shortcode, inventory dropdowns and widget dropdowns
         *
         * @param $category
         * @param $prefix_text
         * @param $select_class
         * @param $options
         * @param array $other_options
         */
        public function listing_dropdown($category, $prefix_text, $select_class, $options, $other_options = array()){
            $get_select     = ($category['slug'] == "year" ? "yr" : $category['slug']);

            // variables altered by the $other_options
            $current_option = (isset($other_options['current_option']) && !empty($other_options['current_option']) ? $other_options['current_option'] : "");
            $select_name    = (isset($other_options['select_name']) && !empty($other_options['select_name']) ? $other_options['select_name'] : $get_select);
            $select_label   = (isset($other_options['select_label']) && !empty($other_options['select_label']) ? $other_options['select_label'] : $prefix_text . " " . $category['plural']);

            $no_options     = __("No options", "listings");

            echo "<select name='" . $select_name . "' class='" . $select_class . "' data-sort='" . $category['slug'] . "' data-prefix='" . $prefix_text . "' data-label-singular='" . $category['singular'] . "' data-label-plural='" . $category['plural'] . "' data-no-options='" . $no_options . "'" . ($category['compare_value'] != "=" ? "data-compare-value='" . htmlspecialchars($category['compare_value']) . "'" : "") . ">";
            echo "<option value=''>" . $select_label . "</option>";

            if(!empty($options)){

                if(isset($category['sort_terms']) && $category['sort_terms'] == "desc"){
                    arsort($options);
                } else {
                    asort($options);
                }

                foreach($options as $term_key => $term_value){
                    $on_select = $term_value;

                    if(isset($filter['currency']) && $filter['currency'] == 1){
                        $on_select = format_currency($on_select);
                    }

                    if(isset($filter['compare_value']) && $filter['compare_value'] != "="){
                        $on_select = $filter['compare_value'] . " " . $on_select;
                    }

                    echo "<option value='" . htmlentities($term_value, ENT_QUOTES) . "'" . (isset($current_option) && is_string($current_option) ? selected( $current_option, $term_key, false ) : "") . " data-key='" . $term_key . "'>" . htmlentities($on_select) . "</option>\n";
                }
            } else {
                echo "<option value=''>" . $no_options . "</option>";
            }

            echo "</select>";
        }
    }

}