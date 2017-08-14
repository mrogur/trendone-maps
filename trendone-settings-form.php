<?php
/**
 * Created by IntelliJ IDEA.
 * User: pwlazlo
 * Date: 14.08.2017
 * Time: 12:07
 */

?>
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'title' ) ?>">
		<?php _e( "Title", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'title' ); ?>"
            type="text"
            value="<?php echo $this->title; ?>"
    />
</p>
<!-- name -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'name' ) ?>">
		<?php _e( "Name", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'name' ); ?>"
            type="text"
            value="<?php echo $this->trendoneName; ?>"
    />
</p>
<!-- streetAddr -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'street_addr' ) ?>">
		<?php _e( "Street Addr", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'street_addr' ); ?>"
            type="text"
            value="<?php echo $this->streetAddr; ?>"
    />
</p>
<!-- postal -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'postal' ) ?>">
		<?php _e( "Postal Code", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'postal' ); ?>"
            type="text"
            value="<?php echo $this->postalCode; ?>"
    />
</p>

<!-- city -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'city' ) ?>">
		<?php _e( "City", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'city' ); ?>"
            type="text"
            value="<?php echo $this->city; ?>"
    />
</p>
<!-- directionTips -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'direction_tips' ) ?>">
		<?php _e( "Direction Tips", 'trendone-maps' ) ?>
    </label><br/>
    <textarea
            rows="10"
            cols="5"
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'direction_tips' ); ?>"><?php echo $this->directionTips; ?></textarea>
</p>


<!-- emails -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'emails' ) ?>">
		<?php _e( "Emails (comma sep.)", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'emails' ); ?>"
            type="text"
            value="<?php echo $this->emails; ?>"
    />
</p>
<!-- phones -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'phones' ) ?>">
		<?php _e( "Phones (comma sep.)", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'phones' ); ?>"
            type="text"
            value="<?php echo $this->phones; ?>"
    />
</p>

<!-- apiKey -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'google_maps_api_key' ) ?>">
		<?php _e( "Google Maps API Key", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'google_maps_api_key' ); ?>"
            type="text"
            value="<?php echo $this->apiKey; ?>"
    />
</p>
<!-- mapWidth -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'map_width' ) ?>">
		<?php _e( "Google Maps Map Width", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'map_width' ); ?>"
            type="text"
            value="<?php echo $this->mapWidth; ?>"
    />
</p>
<!-- mapHeight -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'map_height' ) ?>">
		<?php _e( "Google Maps Map Height", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'map_height' ); ?>"
            type="text"
            value="<?php echo $this->mapHeight; ?>"
    />
</p>

<!-- queryString -->
<p class="trendone-form-element">
    <label for="<?php echo $this->get_field_id( 'google_maps_query_string' ) ?>">
		<?php _e( "Google Maps Query String", 'trendone-maps' ) ?>
    </label><br/>
    <input
            class="<?php echo $this->cssFormInputClasses; ?>"
            name="<?php echo $this->get_field_name( 'google_maps_query_string' ); ?>"
            type="text"
            value="<?php echo $this->queryString; ?>"
    />
</p>
