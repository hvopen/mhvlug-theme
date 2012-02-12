<?php

/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[mailkey].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $mailkey: The message identifier
 *
 * @see template_preprocess_mimemail_message()
 */
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php if ($css): ?>
    <style type="text/css">
      <!--
      <?php print $css ?>
      .container-12 {
        width: 92%;
        margin: 20px 10px;
      }
      -->

    </style>
    <?php endif; ?>

    <style type="text/css">
      .container-12 {
    width: 92%;
    margin: 20px 10px;
      }
      </style>
  </head>
  <body id="mimemail-body" <?php if ($mailkey): print 'class="'. $mailkey .'"'; endif; ?>>
    <div id="page" class="clearfix">
      <div id="site-header" class="container-12 clearfix" style="padding: 20px">
        <table width="100%">
          <tr>
            <td id="branding" width="80%">
              <h2 id="site-name" class=""><a href="http://hvstem.org">Hudson Valley STEM Calendar</a></h2>
            </td>
          </table>
        </div>


    <div id="main-content-container" class="container-12 clearfix" style="padding: 20px">
      <div id="main-wrapper" class="column">
        <div id="main-content" class="region clearfix">
          <?php print $body ?>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
