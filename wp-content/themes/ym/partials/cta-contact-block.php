<?php
/**
 * Default code for a CTA Contact Info Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$css_class   = get_sub_field( 'css_class' );
$bg_color    = get_sub_field( 'background_color' );
$content     = get_sub_field( 'content' );

$email_icon = get_sub_field( 'email_icon' );
$email_address = get_sub_field( 'email_address' );

$mailing_list_icon = get_sub_field( 'mailing_list_icon' );
$mailing_list_url = get_sub_field( 'mailing_list_url' );
$mailing_list_text = get_sub_field( 'mailing_list_text' );

$phone_number_icon = get_sub_field( 'phone_number_icon' );
$phone_number = get_sub_field( 'phone_number' );

$cta_button_url = get_sub_field( 'cta_button_url' );
$cta_button_text = get_sub_field( 'cta_button_text' );


?>

<section class = "row cta-contact-info-row <?php echo $css_class; ?>"
         style = "background-color: <?php echo $bg_color; ?>">
	<div class = "wrap">

		<div class = "content-container">
			<?php echo $content; ?>
		</div>

		<div class = "cta-link email-container">
			<img src = "<?php echo $email_icon['url']; ?>" alt = "<?php echo $email_icon['alt']; ?>">
			<a target="blank"
			   href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>
		</div>

		<div class = "cta-link mailing-list-container">
			<img src = "<?php echo $mailing_list_icon['url']; ?>" alt = "<?php echo $mailing_list_icon['alt']; ?>">
			<a target = "blank"
			   href = "<?php echo $mailing_list_url; ?>"><?php echo $mailing_list_text; ?></a>
		</div>

		<div class = "cta-link phone-number-container">
			<img src = "<?php echo $phone_number_icon['url']; ?>" alt = "<?php echo $phone_number_icon['alt']; ?>">
			<a target = "blank"
			   href = "tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
		</div>

		<div class = "cta-link cta-container">
			<a target = "blank"
			   href = "<?php echo $cta_button_url; ?>"
			   class = "button"><?php echo $cta_button_text; ?></a>
		</div>

	</div>
</section>
