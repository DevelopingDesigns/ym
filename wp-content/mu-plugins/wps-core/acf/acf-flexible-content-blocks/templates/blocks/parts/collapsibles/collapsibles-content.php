<?php
echo '<div class="collapse-content">';
cfb_template( 'blocks/parts/collapsibles/collapsibles-title', get_row_layout() );
cfb_template( 'blocks/parts/block-content', get_row_layout() );
echo '</div>';
cfb_template( 'blocks/parts/block-media', get_row_layout() );