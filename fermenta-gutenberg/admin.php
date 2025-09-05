<?php

/*
 * Remove admin bar (front page)
 */
add_filter ( 'show_admin_bar', '__return_false');

/*
 * wpcf7 remove defaults <br/>
 */
add_filter('wpcf7_autop_or_not', '__return_false');
