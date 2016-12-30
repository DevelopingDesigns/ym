<?php
echo '<div class="collapse-content">';
fcb_template( 'blocks/parts/collapsibles/collapsibles-title', get_row_layout(), 1 );
fcb_template( 'blocks/parts/block-content', get_row_layout(), 1 );
echo '</div>';
fcb_template( 'blocks/parts/block-media', get_row_layout(), 1 );