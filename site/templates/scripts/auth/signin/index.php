<?php
namespace DS;

$email          = $input->post->email('email');
$final_url      = $input->post->path('final_url');
$referrer       = $input->post->path('referrer');
$redirect_url   = $input->post->path('redirect_url');

$session->CSRF->validate();

if (empty($email)) {
  $session->remove('email');
  $session->redirect($referrer);
}

$u = $users->get("email=$email");

if ($u instanceof \ProcessWire\NullPage) {
  // Create User
  $u = $users->add($email);
  $u->email = $email;
  $u->addRole('student');
}

// Create token/expiration
$u->setOutputFormatting(false);
$u->user_ip = $session->getIP();
$u->user_token = sha1($email.$config->userAuthSalt.time());
$u->user_token_expiration = time() + $settings->user_token_validity_duration;
$u->save();
$u->setOutputFormatting(true);

// Send email
$mail_template  = $pages->get('template=email_template, name=account-signin');
$from_address   = $pages->get('template=email_address, name=no-reply');
$body           = str_replace('DOMAIN', $config->httpHost, $mail_template->body);
$body           = str_replace('EMAIL', $email, $body);
$body           = str_replace('REDIRECT_URL', $final_url, $body);
$body           = str_replace('TOKEN', $u->user_token, $body);

send_email($email, $from_address->email, $from_address->title, $mail_template->subject, $body);

$session->logout(true);
$session->set('email', $email);
$session->redirect($redirect_url);