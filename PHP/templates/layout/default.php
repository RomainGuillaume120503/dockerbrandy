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

$cakeDescription = 'Arrivé prof';
?>  
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css(['cake',]) ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

  <header class="header hidden-nav">
        <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'historique']) ?>">
            <img src="<?= $this->Url->image('edna.png', ['fullBase' => true]) ?>" width="55" height="55" class="d-inline-block  rounded-pill">
            </a>
        <i class='bx bx-menu' id="menu-icon"></i>
        <nav class="navbar">
            <a class="nav-link active " aria-current="page" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'interface']) ?>">Paris</a>
          <a class="nav-link" aria-current="page" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'ParisTextuelle']) ?>">ParisPersonnalisé</a>
          <a class="nav-link" aria-current="page" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'Combine']) ?>">ParisCombiné</a>
          <a class="nav-link" aria-current="page" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'classement']) ?>">Classement</a>
          <a class="nav-link" aria-current="page" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Déconnexion</a>
		  <?php
              $userIdentity = $this->request->getAttribute('identity');
              if($userIdentity!=null&&($userIdentity->id ==1 || $userIdentity->id ==4)){
                echo '
                <a class="nav-link" aria-current="page" href="'.$this->Url->build(['controller' => 'Paris', 'action' => 'index']).'">Paris</a></li>
                <a class="nav-link" aria-current="page" href="'.$this->Url->build(['controller' => 'Paristextuelle', 'action' => 'index']).'">Paris personnalisé</a></li>
                <a class="nav-link" aria-current="page"href="'.$this->Url->build(['controller' => 'Combine', 'action' => 'index']).'">Paris combiné</a></li>
                <a class="nav-link" aria-current="page" href="'.$this->Url->build(['controller' => 'Users', 'action' => 'index']).'">Utilisateur</a></li>
              ';
              }
            ?>
        </nav>
    </header>
    <div class="nav-bg"></div>
  	<style>

.header,ul {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  padding: 0.56rem 2rem;
  background:linear-gradient(50deg,#145A32,#04D939);
  display: flex;
  justify-content: space-between;
  align-items: center;
  backdrop-filter: blur(10px);
  border-bottom: 2px solid rgba(255, 255, 255, 0.2);
  z-index: 100;
}
.header::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.4),
    transparent
  );
  transition: 0.5s;
}
.header:hover::before {
  left: 100%;
}
.logo {
  color: #fff;
  font-size: 25px;
  text-decoration: none;
  font-weight: 600;
  cursor: default;
}
.navbar a {
  color: #fff;
  font-size: 18px;
  text-decoration: none;
  margin-left: 35px;
  transition: 0.3s;
}
.navbar a:hover {
  color: #1A5276;
}
#menu-icon {
  font-size: 36px;
  color: #fff;
  display: none;
}
/* BREAKPOINTS */
@media (max-width: 992px) {
  .header {
    padding: 1.25rem 4%;
  }
}
@media (max-width: 768px) {
  #menu-icon {
    display: block;
  }
  .navbar {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    padding: 0.5rem 4%;
    display: none;
  }
  .navbar.active {
    display: block;
  }
  .navbar a {
    display: block;
    margin: 1.5rem 0;
  }
  .nav-bg  {
    position: absolute;
    top: 79px;
    left: 0;
    width: 100%;
    height: 100%;
    background:linear-gradient(50deg,#145A32,#04D939);
    border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    z-index: 99;
    display: none;
  }
  .nav-bg.active {
    display: block;
  }
}
	</style>
  <script>
	const menuIcon = document.querySelector('#menu-icon');
const navbar = document.querySelector('.navbar');
const navbg = document.querySelector('.nav-bg');
menuIcon.addEventListener('click', () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
    navbg.classList.toggle('active');
});
  </script>
  
  <br> <br><br><br>
    <main class="main mx-auto p-2">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>