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
          <a href="http://mhvlug.org"><img src="/sites/default/files/mhvlug2_logo.png" alt="Mid Hudson Valley Linux and Open Source Users Group" title="Mid Hudson Valley Linux and Open Source Users Group" width="48" height="48" /></a>                                      <h2 id="site-name" class=""><a href="http://mhvlug.org">Mid Hudson Valley Linux and Open Source Users Group</a></h2>
      </td>
        <td id="title-right" width="20%">
            <h2>Follow Us</h2>

            <div class="content">
              <a href="http://www.facebook.com/mhvlug"><img alt="Like us on Facebook" src="/sites/all/themes/mhvlug/images/facebook_button.png" style="width: 24px; height: 24px; " /></a>&nbsp;<a href="https://twitter.com/#!/mhvlug"><img alt="Follow us on Twitter" src="/sites/all/themes/mhvlug/images/Twitter_256x256.png" style="width: 24px; height: 24px; " /></a>&nbsp;<a href="http://www.google.com/calendar/render?cid=http%3A%2F%2Fmhvlug.org%2Fcalendar%2Fical%3F1322604582"><img alt="Add us to Google Calendar" src="/sites/all/themes/mhvlug2/images/Google-Calendar-32.png" style="height: 24px;" /></a>&nbsp;</div>
          </td>
        </tr>
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
