<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */

/* we add whole bunch of logic here to make it so we can have really
   short times and only add the minutes into short times if we really
   need them.
*/
?>
<?php 
/* dprint_r($output); */
if (preg_match('/"date-display-end">at /', $output)) {
    $output = preg_replace('/"date-display-end">at /', '"date-display-end">', $output);
}
if (preg_match('/:00/', $output)) {
    $output = preg_replace('/:00/','', $output);
}
print $output;
?>
