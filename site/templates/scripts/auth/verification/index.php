<?php
namespace DS;

$email          = $input->get->email('email');
$final_url      = $input->get->path('redirect_url');
$ip             = $_SERVER['REMOTE_ADDR'];
$redirect_url   = $pages->get('name=signin')->url;
$time           = time();
$token          = $input->urlSegment1;

$u = $users->get("email=$email, user_token=$token, user_ip=$ip, user_token_expiration>=$time");

if ($u instanceof \ProcessWire\NullPage) {
  $session->redirect($redirect_url);
}

// Remove token/expiration
$u->setOutputFormatting(false);
$u->user_token = '';
$u->user_token_expiration = -1;
$u->save();
$u->setOutputFormatting(true);

$session->remove('email');
$session->forceLogin($u);
$session->redirect($final_url);