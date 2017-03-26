<?php
namespace DS;

$redirect_url = $pages->get('template=page, name=signin')->url;
$session->logout(true);
$session->redirect($redirect_url);