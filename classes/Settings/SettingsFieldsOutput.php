<?php

namespace RealTimeComments\Settings;

trait SettingsFieldsOutput {





	public function rtc_settings_color_picker( $args ) {

		$options = get_option( 'rtc_general_settings' );
		?>
        <input type="<?php echo esc_attr( $args['type'] ) ?>"
               id="<?php echo esc_attr( $args['name'] ) ?>"
               name="rtc_general_settings[<?php echo esc_attr( $args['name'] ) ?>]"
               value="<?php echo $options[ esc_attr( $args['name'] ) ] ?? '' ?>"
               class="regular-text color-picker"
			<?php echo isset( $args['placeholder'] ) ? 'placeholder="' . esc_attr( $args['placeholder'] ) . '" ' : '' ?>
        />
		<?php
		if ( isset( $args['label'] ) ) {
			echo wp_kses( $args['label'] );
		}

	}





	public function rtc_settings_radio_field( $args ) {

		// First, we read the options collection
		$options = get_option( 'rtc_general_settings' );

		foreach ( $args['options'] as $option ) {
			?>
            <div>
                <label>
                    <input type="radio" name="rtc_general_settings[<?php echo esc_attr( $args['name'] ) ?>]" value="<?php echo esc_attr( $option['value'] ) ?>"
						<?php checked( $options[ $args['name'] ] ?? 'ajax', $option['value'], true ) ?>
                    >
					<?php echo $option['label'] ?>
                </label>
            </div>

			<?php
		}
	}





	public function rtc_settings_input_field( $args ) {

		// First, we read the options collection
		$options = get_option( 'rtc_general_settings' );
		?>
        <input type="<?php echo esc_attr( $args['type'] ) ?>"
               id="<?php echo esc_attr( $args['name'] ) ?>"
               name="rtc_general_settings[<?php echo esc_attr( $args['name'] ) ?>]"
               value="<?php echo $options[ esc_attr( $args['name'] ) ] ?? '' ?>"
               class="regular-text"
			<?php echo isset( $args['placeholder'] ) ? 'placeholder="' . esc_attr( $args['placeholder'] ) . '" ' : '' ?>
        />
		<?php
		if ( isset( $args['label'] ) ) {
			echo esc_attr( $args['label'] );
		}
	}

}