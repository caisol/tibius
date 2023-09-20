<!-- Display login button / Facebook profile information -->
<?php $fb = new Facebook\Facebook([
  'app_id' => '149584178483186',
  'app_secret' => '82db71f69f6874a747a4f25eb2963b7d',
  'default_graph_version' => 'v2.10',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://vectortechsol.com/user_authentication/fb_callback', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>