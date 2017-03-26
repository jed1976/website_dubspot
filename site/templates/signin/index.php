<?php
namespace DS;
use DS\Components as cmp;

$action_url     = $pages->get('template=script, name=signin')->url;
$final_url      = $pages->get('template=secure-page, name=dashboard')->url;
$redirect_url   = $pages->get('template=page, name=sent')->url;
$token_name     = $this->session->CSRF->getTokenName();
$token_value    = $this->session->CSRF->getTokenValue();

if ($user->isLoggedIn()) {
  $session->redirect($final_url);
}

print(
  div(['data-pw-id' => 'content'],
    div(['class' => 'dt min-vh-100 w-100'],
      form(['action'=>$action_url, 'class' => 'dtc v-mid','method' => 'POST'],
        input(['name'=>'final_url', 'type' => 'hidden', 'value'=>$final_url]).
        input(['name'=>'redirect_url', 'type' => 'hidden', 'value'=>$redirect_url]).
        input(['name'=>'referrer', 'type' => 'hidden', 'value'=>$page->url]).
        input(['name'=>$token_name, 'type' => 'hidden', 'value'=>$token_value]).

        fieldset(['class' => 'bn center mw6-ns nt2 ph0-ns ph3'],
          h2(['class' => 'f1-ns f2 fw7 ma0 mb5-ns mb4'], $page->subtitle).
          div(['class' => 'f4-ns f5 mb3 overflow-hidden'], $page->body).
          input(['class' => 'b--ds-yellow ba bg-black border-box br0 db f5 pa3 w-100 white', 'name' => 'email', 'placeholder' => 'Email Address', 'required'=>1]).
          input(['class' => 'b--ds-yellow ba bg-ds-yellow black br0 f5-ns f6 fw7 db dim input-reset ph4 pointer pv2 pv3 ttu w-100', 'name' => 'submit', 'type' => 'submit', 'value' => 'Send Email'])
        )
      )
    )
  )
);