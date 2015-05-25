<?php

function mhvlug3_preprocess_html (&$variables) {
    drupal_add_css('https://fonts.googleapis.com/css?family=Cabin:400,700|Libre+Baskerville:400,700,400italic',
                   array('type' => 'external'));
}