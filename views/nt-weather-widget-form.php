<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:', 'nt_weather'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>
<p>
    <label for="widget-nt-weather-widget-3-unit"><?php _e('Unit:', 'nt_weather'); ?></label>
    <select class="widefat" id="<?php echo $this->get_field_id('unit'); ?>" name="<?php echo $this->get_field_name('unit'); ?>">
        <option value="fahrenheit" <?php echo ($unit == 'fahrenheit') ? 'selected' : ''; ?>>Fahrenheit (F)</option>
        <option value="celsius" <?php echo ($unit == 'celsius') ? 'selected' : ''; ?>="">Celsius (C)</option>
    </select>
</p>	