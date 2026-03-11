<?php

if (!defined('ABSPATH')) {
    exit;
}
function allow_page_query_var($vars)
{
    $vars[] = 'page';
    return $vars;
}
add_filter('query_vars', 'allow_page_query_var');
add_shortcode('ajax_property_listing', 'apl_property_listing_shortcode');
function apl_property_listing_shortcode()
{
    ob_start();
        global $wpdb;
        $sql = "SELECT * FROM {$wpdb->prefix}property_search_filter WHERE property_price > 0 AND enabled = 1 ";
        $units = $wpdb->get_results($sql);
        $all_units = json_decode(json_encode($units), true);
    ?>
    <!-- Filter Sidebar -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .property-dates .flatpickr-mobile:before {
            content: attr(placeholder);
            color: #222121;
            position: absolute;
            left: 10px;
        }

        .property-dates .flatpickr-mobile:focus:before, .flatpickr-mobile:not([value=""]):before {
            display: none;
        }
    </style>
    <div class="property-listing-wrapper">
        <!-- Filter By -->
        <div class="filter-by">
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                <select id="sort-properties" class="filter-by-properties">
                    <option value="">Filter By</option>
                </select>
                <button style="padding: 10px 15px; background-color: #C5A46D; color: white; border: none;">Show Map</button>
            </div>
        </div>
        <div class="property-listing-filter">
            <!-- Sidebar Filter -->
            <div class="property-sidebar">
                <div class="property-search-bar">
                    <input type="text" id="search-properties" placeholder="Search properties...">
                </div>
                <div class="property-dates">
                    <div class="checkin-date">
                        <input type="text" id="check-in" name="check-in" placeholder="Check-In" value="" autocomplete="off"/>
                    </div>
                    <div class="checkout-date">
                        <input type="text" id="check-out" name="check-out" placeholder="Check-Out" value="" autocomplete="off"/>
                    </div>
                </div>
               
                <div class="property-guests">
                    <select id="filter-guests">
                        <option value="">Guests</option>
                        <?php
                        for ($i = 1; $i <= 20; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="property-beds">
                    <select id="filter-bedrooms">
                        <option value="">Bedrooms</option>
                        <?php
                        for ($i = 1; $i <= 20; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button id="clear-filters"
                    style="padding: 10px 20px; background-color: #C5A46D; border: none; color: white;">
                    Clear
                    Filters
                </button>
            </div>

            <!-- Listing Area -->
            <div class="property-results">
                <div id="property-loader" class="property-loader" style="display:none; text-align:center;">
                    <span class="loader-spinner">🔄</span><br>
                    <!-- <span class="loader-spinner-text">Fetching Properties</span> -->
                </div>
                <div id="property-grid" class="property-grid">
                    <?php
                        foreach ($all_units as $unit) {
                            if ($unit['property_name'] != ''  ) {
                                ?>
                                <!-- Property Card -->
                                <div class="property-card">
                                    <?php if (!empty($unit['property_image'])) { ?>
                                        <img src="<?php echo esc_url($unit['property_image']); ?>"
                                            alt="<?php echo esc_html($unit['property_name']); ?>" class="property-card-image">
                                    <?php } else { ?>
                                        <img src="<?php home_url(); ?>/wp-content/plugins/ciirus-api/assets/images/png/dummy_property.png" alt="Property-Image">
                                    <?php } ?>
                                    <div class="property-card-detail">
                                        <h2 class="property-card-title"><?php echo esc_html($unit['property_name']); ?></h2>
                                        <p class="property-card-subtitle<?php echo $unit['community'] === '' ? ' hide-community' : ''; ?>">
                                            <span><strong>Community / Resort: </strong><?php echo esc_html($unit['community']); ?></span>
                                        </p>
                                        <p class="property-card-bbs">
                                            <span class="imageBBS">
                                                <img src="<?php echo home_url(); ?>/wp-content/plugins/ciirus-api/assets/icons/bed.svg" alt="">
                                            </span> 
                                            <span class="bbs">
                                                <?php echo esc_html($unit['bedrooms']); ?>
                                            </span>
                                            <span class="imageBBS">
                                                <img src="<?php echo home_url(); ?>/wp-content/plugins/ciirus-api/assets/icons/bathtub.svg" alt="">
                                            </span>  
                                            <span class="bbs">
                                                <?php echo esc_html($unit['bathrooms']); ?>
                                            </span>
                                            <span class="imageBBS">
                                                <img src="<?php echo home_url(); ?>/wp-content/plugins/ciirus-api/assets/icons/user.svg" alt="">
                                            </span> 
                                            <span class="bbs">
                                                <?php echo $unit['guests']; ?>
                                            </span>
                                        </p>
                                        <?php
                                        if (isset($unit['property_price']) && !empty($unit['property_price'])) {
                                            ?>
                                            <p class='property-card-price'><strong> USD <?php echo $unit['property_price']; ?>/ NIGHT</strong> <small class='text-muted'>Starting at</small></p>
                                            <?php
                                        } else {
                                            echo "<p class='property-card-price'><strong>Rate unavailable</strong></p>";
                                        }
                                        ?>
                                        <a href=" <?php echo esc_url(site_url('/property-detail/?unit_id=' . $unit['unit_id'] . '&mc_id=' . $unit['management_company_user_id'])); ?>"
                                            class="property-card-button" target="_blank">
                                            View 
                                        </a>
                                        
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                    
                <?php
                ?>
                <div class="property-pagination">
                    
                </div>
                <?php
              
                ?>
            </div>
        </div>
    </div>

            <?php
echo do_shortcode('[elementor-template id="2580"]');
?>

    <?php
    return ob_get_clean();
}

add_action('wp_ajax_apl_fetch_filtered_properties', 'apl_fetch_filtered_properties');
add_action('wp_ajax_nopriv_apl_fetch_filtered_properties', 'apl_fetch_filtered_properties');
function apl_fetch_filtered_properties()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'property_search_filter';
    $where = '1=1';
    $params = [];

    if (!empty($_POST['property_name'])) {
        $where .= " AND property_name LIKE %s";
        $params[] = '%' . $wpdb->esc_like($_POST['property_name']) . '%';
    }
    if (!empty($_POST['guests'])) {
        $where .= " AND guests >= %d";
        $params[] = intval($_POST['guests']);
    }
    if (!empty($_POST['bedrooms'])) {
        $where .= " AND bedrooms = %d";
        $params[] = intval($_POST['bedrooms']);
    }
    if (!empty($_POST['bathrooms'])) {
        $where .= " AND bathrooms = %d";
        $params[] = intval($_POST['bathrooms']);
    }
    if (!empty($_POST['property_image'])) {
        $where .= " AND property_image = %s";
        $params[] = sanitize_text_field($_POST['property_image']);
    }

    /* Price (Always apply) */
    $where .= " AND property_price > %f";
    $params[] = 0.00;
    $where .= " AND enabled = 1";

    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE $where", ...$params);
    $properties = $wpdb->get_results($query);
    

    $accounts = [
        [
            'username' => get_option('first_api_username'),
            'password' => get_option('first_api_password'),
        ],
        [
            'username' => get_option('second_api_username'),
            'password' => get_option('second_api_password'),
        ]
    ];
    // Handle check-in/check-out date filtering (availability)
    $start = isset($_POST['check_in_time']) ? $_POST['check_in_time'] : null;
    $end = isset($_POST['check_out_time']) ? $_POST['check_out_time'] : null;
    $start_date = DateTime::createFromFormat('m-d-Y', $start);
    $end_date   = DateTime::createFromFormat('m-d-Y', $end);
    $arrivalDate = '';
    $departureDate = '';
    if (!empty($start)) {
        $arrivalDate = $start_date ? $start_date->format('Y-m-d') : '';
    }
    if (!empty($end)) {
        $departureDate = $end_date ? $end_date->format('Y-m-d') : '';
    }
    // echo '<pre>';
    //                 print_r($arrivalDate);
    //                 print_r($departureDate);
    //                 die();
    $filtered_properties = [];
    $unitIds = [];
    foreach ($accounts as $account) {
        $auth_string = base64_encode($account['username'] . ':' . $account['password']);
        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic ' . $auth_string
        ];

        if ($start_date && $end_date) {
            // Only filter by availability if both dates are selected

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.ciiruspartners.com/v2024.07.31/unit_calendars?page=1&page_size=160&start={$arrivalDate}&end={$departureDate}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => $headers,
            ));
            $response = curl_exec($curl);
            $datas = json_decode($response, true);
            curl_close($curl);

            
            $available_unit_ids = [];
            $alldates = [];
            $status = [];
            foreach ($datas['unit_calendars'] as $calendar) {
            
                $all_available = true;
            
                foreach ($calendar['days'] as $day) {
                    // If ANY day is unavailable → reject this unit
                    if ($day['availability'] !== 'available') {
                        $all_available = false;
                        break;
                    }
                }
                // Only add if all days returned by API are available
                if ($all_available) {
                    $available_unit_ids[] = $calendar['unit_id'];
                }
            }
            
            // $unitIds = $alldates;
            // echo '<pre>';
            // print_r($available_unit_ids);
            // Now filter previously matched $properties by availability
            foreach ($properties as $property) {
                if (in_array($property->unit_id, $available_unit_ids)) {
                    $filtered_properties[] = $property;
                }
            }
        } else {
            // No date filter, so return whatever matched earlier filters
            $filtered_properties = $properties;
        }
    

    
        // Fetch Unit Rental
        $start_r = date('Y-m-d');
        $end_r = date('Y-m-d', strtotime('+1 day'));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ciiruspartners.com/v2024.07.31/unit_rental?page=1&page_size=6&start=$start_r&end=$end_r",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));
        $rentalResponse = curl_exec($curl);
        $rentalData = json_decode($rentalResponse, true);
        curl_close($curl);

        $rentalRatesByUnit = [];
        if (!empty($rentalData['unit_rental'])) {
            foreach ($rentalData['unit_rental'] as $rentalEntry) {
                $unitId = $rentalEntry['unit_id'];
                $rate = $rentalEntry['rental']['rates'][0] ?? 0;
                $currency = $rentalEntry['rental']['iso_currency'] ?? '$';
                // Convert from smallest currency unit (assuming cents) to dollars
                $formattedRate = number_format($rate / 100000000, 2);
                $rentalRatesByUnit[$unitId] = [
                    'rate' => $formattedRate,
                    'currency' => $currency
                ];
            }
        }

    }
    // print_r($unitIds);
    // print_r($_POST);
    // Render HTML
    if (count($filtered_properties) > 0) {
        foreach ($filtered_properties as $property) {
            if ($property->property_name != '' && $property->enabled == 1  ) {
                ?>
                    <div class="property-card">
                        <img src="<?php echo esc_url($property->property_image ?: '/wp-content/plugins/ciirus-api/assets/images/png/dummy_property.png'); ?>"
                            alt="<?php echo esc_html($property->property_name); ?>" class="property-card-image">
                        <div class="property-card-detail">
                            <h2 class="property-card-title"><?php echo esc_html($property->property_name); ?></h2>
                            <p class="property-card-subtitle">
                                <span><strong>Community / Resort:</strong> <?php echo esc_html($property->community); ?></span><br>
                            </p>
                            <p class="property-card-bbs">
                                <span class="imageBBS">
                                    <img src="<?php echo home_url(); ?>/wp-content/plugins/ciirus-api/assets/icons/bed.svg" alt="">
                                </span>  
                                <span class="bbs">
                                    <?php echo esc_html($property->bedrooms); ?>
                                </span>
                                <span class="imageBBS">
                                    <img src="<?php echo home_url(); ?>/wp-content/plugins/ciirus-api/assets/icons/bathtub.svg" alt="">
                                </span> 
                                <span class="bbs">
                                    <?php echo esc_html($property->bathrooms); ?>
                                </span>
                                <span class="imageBBS">
                                    <img src="<?php echo home_url(); ?>/wp-content/plugins/ciirus-api/assets/icons/user.svg" alt="">
                                </span>  
                                <span class="bbs">
                                    <?php echo esc_html($property->guests); ?>
                                </span>
                            </p>
                            <?php
                                if ($property->property_price) {
                                    echo "<p class='property-card-price'><strong>USD  $property->property_price / NIGHT</strong><small class='text-muted'>Starting at</small></p>";
                                } else {
                                    echo "<p class='property-card-price'><strong>Rate unavailable</strong></p>";
                                }
                            ?>

                            <a href="<?php echo esc_url(site_url('/property-detail/?unit_id=' . $property->unit_id . '&mc_id=' . $property->management_company_user_id . '&arrival=' . $start . '&departure=' . $end)); ?>"
                            class="property-card-button" target="_blank">
                                View
                            </a>
                        </div>
                    </div>
                <?php
            }
        }

    } else {
        ?>
        <p style="color:black;">No properties found for selected filters.</p>
        <?php
    }
    wp_die();
}

    
?>




