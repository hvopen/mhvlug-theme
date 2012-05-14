<?php
// $Id: template.php,v 1.1.2.9 2010/07/09 14:53:42 himerus Exp $

/*
 * Add any conditional stylesheets you will need for this sub-theme.
 *
 * To add stylesheets that ALWAYS need to be included, you should add them to
 * your .info file instead. Only use this section if you are including
 * stylesheets based on certain conditions.
 */
/* -- Delete this line if you want to use and modify this code
// Example: optionally add a fixed width CSS file.
if (theme_get_setting('omega_starterkit_fixed')) {
  drupal_add_css(path_to_theme() . '/layout-fixed.css', 'theme', 'all');
}
// */


/**
 * Implementation of HOOK_theme().
 */
function mhvlug2_theme(&$existing, $type, $theme, $path) {
  $hooks = omega_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function omega_starterkit_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function omega_starterkit_preprocess_page(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function omega_starterkit_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function omega_starterkit_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function omega_starterkit_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */


/**
 * Create a string of attributes form a provided array.
 *
 * @param $attributes
 * @return string
 */
function mhvlug2_render_attributes($attributes) {
	return omega_render_attributes($attributes);
}

function mhvlug2_meetup_events_venueid($node) {
  if (! $node->field_location) {
    return;
  }

  $loc = node_load($node->field_location[0]["nid"]);

  if (! $loc->field_meetupvenue) {
    return;
  }

  $venue = $loc->field_meetupvenue[0]["value"];

  if ($loc->field_meetuplat && $loc->field_meetuplon) {
    $venue .= "," . $loc->field_meetuplat[0]["value"] . "," . $loc->field_meetuplon[0]["value"];
  }

  return $venue;
}

function mhvlug2_meetup_events_body($node) {
  $location = node_load($node->field_location[0]["nid"]);
  $result = $node->body . $location->body;
  return $result;
}

function mhvlug2_meetup_events_date($node) {
  return $node->field_meeting_date[0]["value"];
}

/***
 * Fix the calendar templates
 */
function mhvlug2_calendar_ical_icon($url) {
  if ($image = theme('image', drupal_get_path('module', 'date_api') .'/images/ical16x16.gif', t('Add to calendar'), t('Add to calendar'))) {
      $string = '<div style="text-align:right; padding-top: 4px">';
      $string .= '<a href="http://www.google.com/calendar/render?cid=' . urlencode("http://" . $_SERVER['HTTP_HOST'] . $url . "/" . time()) . '" target="_blank">';
      $string .= '<img src="http://www.google.com/calendar/images/calendar_plus_en.gif" alt="Add to Google Calendar" title="Add to Google Calendar" border=0></a> ';
      $string .= '<a href="'. check_url($url) .'" class="ical-icon" title="ical">'. $image .'</a>';
      $string .= '</div>';

      return $string;
  }
}

function mhvlug2_follow_us() {
  $string = "<div>";
  $string .= '<a href="http://www.facebook.com/mhvlug"><img alt="Like us on Facebook" src="/sites/all/themes/mhvlug2/images/facebook_24x24.png" /></a>&nbsp;';
  $string .= '<a href="https://twitter.com/#!/mhvlug"><img alt="Follow us on Twitter" src="/sites/all/themes/mhvlug2/images/twitter_24x24.png" /></a>&nbsp;';
  $string .= '<a href="http://www.linkedin.com/groups/MHVLUG-1163697"><img alt="Join us on Linked In" src="/sites/all/themes/mhvlug2/images/linkedin_24x24.png" /></a>&nbsp;';
  $string .= '<a href="http://www.meetup.com/mhvlug/"><img alt="Join us on Meetup" src="/sites/all/themes/mhvlug2/images/meetup_35x24.png" /></a>&nbsp;';
  $string .= '<a href="http://www.google.com/calendar/render?cid=' . urlencode("http://" . $_SERVER['HTTP_HOST'] . "/calendar/ical?" . time()) . '"><img alt="Add us to Google Calendar" src="/sites/all/themes/mhvlug2/images/google_calendar_24x24.png" /></a>&nbsp;';
  $string .= '</div>';
  return $string;

}

/***
 * Optimize Javascript
 */

function _phptemplate_variables($hook, $vars) {
  if ($hook == 'page') {
    if(module_exists('javascript_aggregator') && $vars['scripts']) {
      $vars['scripts'] = javascript_aggregator_cache($vars['scripts']);
    }
    return $vars;
  }
  return $vars;
}
