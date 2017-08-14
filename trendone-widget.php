<?php
?>

<div class="row trendone-maps">
    <div class="col-sm-5">
        <div class="trendone-maps-name">
            <h5>
				<?php echo $this->trendoneName; ?>
            </h5>
        </div>
        <div class="trendone-maps-address">
			<?php echo $this->streetAddr; ?><br>
			<?php echo "$this->postalCode $this->city" ?>
        </div>
        <div class="trendone-maps-direction">
			<?php echo $this->prepare_direction_tips() ?>
        </div>
        <div class="trendone-maps-phone">
            <h5>Telefon:</h5>
            <ul>
				<?php
				foreach ( explode( ',', $this->phones ) as $number ):
					$number = trim( $number );
					if ( empty( $number ) ) {
						continue;
					}
					?>
                    <li><?php echo $number  ?></li>
				<?php endforeach; ?>
            </ul>

        </div>
        <div class="trendone-maps-email">
            <h5>Email:</h5>
            <ul>
				<?php
				foreach ( explode( ',', $this->emails ) as $email ):
					$email = trim( $email );
					if ( empty( $email ) ) {
						continue;
					}
					?>
                    <li><?php echo $email ?></li>
				<?php endforeach; ?>
            </ul>

        </div>

    </div>
    <div class="col-sm-7">
        <iframe
                width="<?php echo $this->mapWidth ?>"
                height="<?php echo $this->mapHeight ?>"
                frameborder="0" style="border:0"
                src="<?php echo $this->prepare_maps_url(); ?>"
                allowfullscreen>
        </iframe>
    </div>
</div>
