<?php
namespace DS;
use DS\Components as cmp;

// Variables
$email          = $input->post('email');
$token_name     = $this->session->CSRF->getTokenName();
$token_value    = $this->session->CSRF->getTokenValue();

// Validation
if (empty($email) === false && $session->CSRF->validate()) {
  $email = $sanitizer->email($email);
  $u = fetch_or_create_user($email);

  // Send email
  $mail_template  = $pages->get('template=email_template, name=account-signup');
  $from_address   = $pages->get('template=email_address, name=no-reply');
  $body           = str_replace('{{ DOMAIN }}', $config->httpHost, $mail_template->body);
  $body           = str_replace('{{ TOKEN }}', $u['token'], $body);

  send_email($email, $from_address->email, $from_address->title, $mail_template->subject, $body);

  $session->redirect('/signin/code/');
}

print(

  div(['data-pw-id' => 'content'],
    div(['class'=>'dt min-vh-100 w-100'],
      form(['action'=>$page->url, 'class'=>'dtc v-mid','method'=>'POST'],
        fieldset(['class'=>'bn center mw6-ns nt2 ph0-ns ph3'],
          h2(['class'=>'f1-ns f2 fw7 ma0 mb5'], $page->subtitle).
          $page->body.
          input(['name'=>$token_name, 'type'=>'hidden', 'value'=>$token_value]).
          input(['class'=>'b--ds-yellow ba bg-black border-box br0 db f5 pa3 w-100 white', 'name'=>'email', 'placeholder'=>'Email Address', 'required'=>1]).
          input(['class'=>'b--ds-yellow ba bg-ds-yellow black br0 f5-ns f6 fw7 db dim input-reset ph4 pointer pv2 pv3 ttu w-100', 'name'=>'submit', 'type'=>'submit', 'value'=>'Send Email'])
        )
      )
    )
  )

);