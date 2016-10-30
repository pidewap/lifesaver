<?php
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])){ exit(0); } ?>

<HTML>
<title>softwarefreak.in
</title>
<body onload="document.getElementById('address_box').focus()">
<link rel="stylesheet" type="text/css" media="handheld,screen" href="style.css">
<center><div><a href="http://softwarefreak.in/">
<img src="http://softwarefreak.in/sf.png"></a></div><br>

<?php switch ($data['category']) {
case 'auth': ?>

<p><b>Enter your Username and Password for "<?php echo htmlspecialchars($data['realm']) ?>" on <?php echo $GLOBALS['_url_parts']['host'] ?></b>
<form method="post" action="">
<input type="hidden" name="<?php echo $GLOBALS['_config']['basic_auth_var_name'] ?>" value="<?php echo base64_encode($data['realm']) ?>">
<label>Username <input type="text" name="username" value=""></label> <label>Password <input type="password" name="password" value="">
</label> <input type="submit" value="LoGiN"></form></p>

<?php
break;
case 'error':
echo '<div id="error"><p>';
switch ($data['group'])
{ case 'url':
echo '<b>URL Error (' . $data['error'] . ')</b>: ';
switch ($data['type'])
{ case 'internal': $message = 'An error has occured! Please try again.'
                                 . ''
                                 . '';
break;
case 'external':
switch($data['error']) {
case 1:
$message = 'The URL you\'re attempting to access is blacklisted by this server. Please select another URL.';
break;
case 2:
$message = 'The URL you entered is malformed. Please check whether you entered the correct URL or not.';
break;}break;}break;
case 'resource':
echo '<b>Resource Error:</b> ';
switch ($data['type']){
case 'file_size':
$message = 'The file your are attempting to download is too large.<br>'
                                 . 'Maxiumum permissible file size is <b>' . number_format($GLOBALS['_config']['max_file_size']/1048576, 2) . ' MB</b><br />'                                 . 'Requested file size is <b>' . number_format($GLOBALS['_content_length']/1048576, 2) . ' MB</b>';
break;
case 'hotlinking':
$message = 'It appears that you are trying to access a resource through this proxy from a remote Website.<br>'
                                 . 'For security reasons, please use the form below to do so.';
break;}break;}
echo 'An error has occured! Please try again. <br>' . $message . '</p>';
break; } ?>
</BODY></HTML>