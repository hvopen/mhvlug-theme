<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php
/**
 * This series of machinations is so that I can add classes to the
 * front page upcoming events which show what's in the past, as well
 * as drop days of the month from the view when they would duplicate.
 */

global $upcoming_date;
$last_date = $upcoming_date;

$node = node_load($fields['field_meeting_date_1']->raw);
$upcoming_date = strtotime($node->field_meeting_date['und'][0]['value']);

/** if ($upcoming_date == $last_date) {
    $fields[field_meeting_date_value_3]->content = "";
    } */

$timeclass = "upcoming-future";
if ($upcoming_date < time()) {
    $timeclass = "upcoming-past";
}

$classes = implode(" ", array($timeclass, $node->type));
?>


<div class="<?php print $classes; ?>">
<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>
</div>
