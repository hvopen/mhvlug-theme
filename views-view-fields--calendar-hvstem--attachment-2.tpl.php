<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
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
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<table>
<?php $color = $fields['field_color_value']->content; ?>
<tr><td style="background-color: <?php print $color; ?>" "width="15px">&nbsp;</td>
  <td valign="top" style="padding-left: 5px;">
      <h2><?php print $fields['title']->content; ?></h2>

      <?php if ($fields['field_contact_value']): ?>
      <div class="views-field-field-contact-value">
        <span class="field-content">Contact: <?php print $fields['field_contact_value']->content; ?></span>
      </div>
      <?php endif; ?>

      <?php if ($fields['field_url_value']->content): ?>
      <div class="views-field-field-url-value">
        <label class="views-label-field-url-value">
          Web Site:
        </label>
        <span class="field-content"><a href="<?php print $fields['field_url_value']->content; ?>"><?php print $fields['field_url_value']->content; ?></a></span>
      </div>
      <?php endif; ?>

      <div class="views-field-body">
        <?php print $fields['body']->content; ?>
      </div>
  </td>
  <td cellspacing="10" align="right" valign="top" width="150">
    <?php print $fields['field_logo_fid']->content; ?>
  </td>

</tr></table>

