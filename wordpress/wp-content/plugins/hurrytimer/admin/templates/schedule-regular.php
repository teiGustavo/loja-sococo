<?php namespace Hurrytimer; ?>

 <table class="hurrytimer-standard form-table hidden mode-settings" data-for="hurrytModeRegular">
<tr class="form-field hurrytimer-enddate-field" >
            <td><label><?php _e("End date/time", "hurrytimer") ?></label></label></td>
            <td>
                <label for="hurrytimer-end-datetime" class="date">
                    <input type="text" name="end_datetime" autocomplete="off"
                           id="hurrytimer-end-datetime"
                           class="hurrytimer-datepicker hurryt-w-full"
                           value="<?php echo $campaign->endDatetime ?>"
                    >
                </label>
            </td>
        </tr>
        <tr class="form-field hurrytimer-timezone-field">
            <td><label for="hurrytimer-timezone"><?php _e('Timezone', 'hurrytimer') ?> <span title="<?php esc_attr_e('By default, the site\'s timezone is used.', 'hurrytimer') ?>" class="hurryt-icon" data-icon="help"></span></label></td>
            <td>
                <div class="hurryt-flex hurryt-items-center">
                    <label class="hurryt-mr-4">
                        <input type="radio" name="timezone_type" value="site" <?php echo $campaign->timezoneType === 'site' ? 'checked' : ''; ?> class="hurryt-timezone-choice">
                        <?php esc_html_e('Use site\'s timezone', 'hurrytimer'); ?>
                    </label>
                    <label class="hurryt-mr-4">
                        <input type="radio" name="timezone_type"
                        <?php echo hurrytimer_is_pro() ? '' : 'disabled'; ?>
                        value="custom" <?php echo $campaign->timezoneType === 'custom' ? 'checked' : ''; ?> class="hurryt-timezone-choice">
                        <?php esc_html_e('Select custom timezone ', 'hurrytimer'); ?>
                        <?php if(!  hurrytimer_is_pro() ):  ?>
                        <span 
                       title="Available in Pro version. Upgrade to unlock."
                        class="hurryt-badge hurryt-badge-pro" ><?php esc_html_e('Pro', 'hurrytimer'); ?></span>
                        <?php endif; ?>
                    </label>
                    <div class="hurryt-custom-timezone hurryt-flex-grow" style="display: <?php echo $campaign->timezoneType === 'custom' ? 'block' : 'none'; ?>">
                        <select name="timezone" class="hurryt-w-full">
                            <?php echo wp_timezone_choice($saved_timezone, get_user_locale()); ?>
                        </select>
                    </div>
                </div>
                <p class="description">
                    <?php esc_html_e('Choose whether to use the site\'s timezone or select a custom one.', 'hurrytimer') ?>
                </p>
            </td>
        </tr>
        
 </table>
