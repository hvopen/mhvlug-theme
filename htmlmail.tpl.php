<?php

/**
 * @file
 * Sample template for HTML Mail test messages.
 */
?>
<body style="padding: 0; margin: 0; -webkit-text-size-adjust:none;">
<div id="background" style="background-color: black; color: black; padding: 0; margin: 0">
<center>
<div id="page" style="max-width: 800px; text-align: left" >
  <div class="header" style="background-color: #ddd; padding: 10px 20px">
    <table width="100%">
      <tr>
        </td>
        <td style="text-align: center;" valign="center">
          <a href="http://mhvlug.org"><img align="left" valign="center" src="/sites/default/files/mhvlug2_logo.png"></a>
          <h2 style="display: inline"><a href="http://mhvlug.org" style="text-decoration: none; color: #8E2C2C;">
          Mid Hudson Valley Linux and Open Source Users Group</a></h2>
        </td>
        <td id="title-right">
          <b>Follow&nbsp;Us</b>
            <div class="content">
              <a href="http://www.meetup.com/mhvlug/"><img
              alt="Join us on Meetup"
              src="sites/all/themes/mhvlug3/images/meetup_35x24.png"/></a>

              <a href="http://www.google.com/calendar/render?cid=http%3A%2F%2Fmhvlug.org%2Fcalendar%2Fical%3F1322604582"><img
              alt="Add us to Google Calendar"
              src="sites/all/themes/mhvlug3/images/Google-Calendar-32.png"/></a>
            </div>
          </td>
        </tr>
      </table>
  </div>
<div class="htmlmail-body" style="background-color: white; padding: 20px">
<?php echo $body; ?>
</div>
<?php if ($debug): ?>
<hr />
<div class="htmlmail-debug">
  <dl><dt><p>
    To customize this test message:
  </p></dt><dd><ol><li><p><?php if (empty($theme)): ?>
    Visit <u>admin/config/system/htmlmail</u>
    and select a theme to hold your custom email template files.
  </p></dt><dd><ol><li><p><?php elseif (empty($theme_path)): ?>
    Visit <u>admin/appearance</u>
    to enable your selected <u><?php echo ucfirst($theme); ?></u> theme.
  </p></dt><dd><ol><li><p><?php endif; ?>
    Copy the
    <a href="http://drupalcode.org/project/htmlmail.git/blob_plain/refs/heads/7.x-2.x:/htmlmail--htmlmail.tpl.php"><code>htmlmail--htmlmail.tpl.php</code></a>
    file to your <u><?php echo ucfirst($theme); ?></u> theme directory
    <u><code><?php echo $theme_path; ?></code></u>.
  </p></li><li><p>
    Edit the copied file.
  </p></li></ol></dd></dl>
</div>
<?php endif; ?>
</div>
</center>
</div>
</body>