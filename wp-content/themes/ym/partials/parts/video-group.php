<?php
/**
 * Default code for Video field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$button = get_sub_field( 'buttons' );

if ( $button ) : ?>

<div class="button-group">
	<a href="<?php echo $button['url']; ?>"
	   class="<?php echo $button['style'] . ' ' . $button['size']; ?> button double-button"><?php echo $button['text']; ?></a>

	<?php endif; ?>

	<?php if ( $button['add_another_button'] ) : ?>

	<a href="<?php echo $button['second_button']['url']; ?>"
	   class="<?php echo $button['second_button']['style'] . ' '
	                     . $button['second_button']['size']; ?> button double-button"><?php echo $button['second_button']['text']; ?></a>

</div>

<?php endif; ?>
