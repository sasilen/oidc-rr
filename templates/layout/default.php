<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/@cscfi/csc-ui@2.2.11/dist/styles/css/theme.css') ?>
    <?= $this->Html->script('https://unpkg.com/vue@3.1.1/dist/vue.global.prod.js', array('block' => 'scriptBottom')); ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/@cscfi/csc-ui@2.2.11/dist/csc-ui/csc-ui.esm.js', array('type'=>'module','block' => 'scriptBottom')); ?>
    <?= $this->Html->script('https://unpkg.com/vue@3.1.1/dist/vue.global.prod.js', array('block' => 'scriptBottom')); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
  <c-main>
  <c-toolbar>
    <c-csc-logo />
    Test RP
  </c-toolbar>
  <c-side-navigation>
    <c-side-navigation-title>OIDC RR</c-side-navigation-title>
    <c-side-navigation-item>
      Actions
      <c-sub-navigation-item><a href="/rps">List Relying parties</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/rps/add">New Relying Party</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/resoureservers">List Resource Servers</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/resoureservers/add">Add Resource Server</a></c-sub-navigation-item>
    </c-side-navigation-item><c-side-navigation-item>
      AdminAction (Wide effect)
      <c-sub-navigation-item><a href="/grant-types">Grant Types</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/response-types">Response Type</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/scopes">Scopes</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/token-endpoint-authentication-methods">TokenEndpointAuthenticationMethods</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/allowed-authentication-methods">AllowedAuthenticationMethods</a></c-sub-navigation-item>
    </c-side-navigation-item><c-side-navigation-item>
      Federations
      <c-sub-navigation-item><a href="/api/rps.json?fdid=1">CSC AAI</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/api/rps.json?fdid=2">CSC AAI Test</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/api/rps.json?fdid=3">Haka OIDC Test</a></c-sub-navigation-item>
      <c-sub-navigation-item><a href="/api/rps.json?fdid=4">CSC IdP Internal</a></c-sub-navigation-item>
    </c-side-navigation-item>
  </c-side-navigation>
  <?= $this->Flash->render() ?>
  <c-page>
    <?= $this->fetch('content') ?>
  </c-page>
  </c-main>
 <?= $this->fetch('scriptBottom');?>
 </div>
</body>
</html>
