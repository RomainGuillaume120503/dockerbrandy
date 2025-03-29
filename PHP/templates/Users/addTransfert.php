<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfert $transfert
 */
use Cake\View\Helper\FlashHelper;
use Authorization\Exception\ForbiddenException;
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable = TableRegistry::getTableLocator()->get('Users');

$userDonneur = $usersTable->findById($userIdentity->id)->first();
$allUsers = $usersTable->find('list', [
    'keyField' => 'id',
    'valueField' => 'username'
])->where(['id !=' => $userIdentity->id]);
?>
<div class="row">
    <div class="col-md-6">
        <div class="Card-Group">
            <div class="Card">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Transfert', 'action' => 'add']]) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('Numbre_d_ecu_a_transferer', ['type' => 'number','placeholder'=>'0','class'=>'form-control mb-3 Number']);
                        echo $this->Form->select('userReceveur', $allUsers, ['empty' => 'Sélectionner un utilisateur','class'=>'form-select form-select-sm mb-3 Name']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['type' => 'submit','class'=>'btn']) ?>
                <?= $this->Form->end() ?>
                <Div Class="Logo"><svg fill="#000000" width="64px" height="64px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M16.539 9.186a4.155 4.155 0 0 0-1.451-.251c-1.6 0-2.73.806-2.738 1.963-.01.85.803 1.329 1.418 1.613.631.292.842.476.84.737-.004.397-.504.577-.969.577-.639 0-.988-.089-1.525-.312l-.199-.093-.227 1.332c.389.162 1.09.301 1.814.313 1.701 0 2.813-.801 2.826-2.032.014-.679-.426-1.192-1.352-1.616-.563-.275-.912-.459-.912-.738 0-.247.299-.511.924-.511a2.95 2.95 0 0 1 1.213.229l.15.067.227-1.287-.039.009zm4.152-.143h-1.25c-.389 0-.682.107-.852.493l-2.404 5.446h1.701l.34-.893 2.076.002c.049.209.199.891.199.891h1.5l-1.31-5.939zm-10.642-.05h1.621l-1.014 5.942H9.037l1.012-5.944v.002zm-4.115 3.275.168.825 1.584-4.05h1.717l-2.551 5.931H5.139l-1.4-5.022a.339.339 0 0 0-.149-.199 6.948 6.948 0 0 0-1.592-.589l.022-.125h2.609c.354.014.639.125.734.503l.57 2.729v-.003zm12.757.606.646-1.662c-.008.018.133-.343.215-.566l.111.513.375 1.714H18.69v.001h.001z"></path></g></svg></Div>
                <Div Class="Chip"><svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" width="64px" height="64px"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="chip--credit_1_" d="M29,28.36H3c-1.301,0-2.36-1.059-2.36-2.36V6c0-1.301,1.059-2.36,2.36-2.36h26 c1.302,0,2.36,1.059,2.36,2.36v20C31.36,27.302,30.302,28.36,29,28.36z M22.36,27.64H29c0.904,0,1.64-0.735,1.64-1.64v-3.64h-8.28 V27.64z M10.36,27.64h11.28V10c0-0.199,0.161-0.36,0.36-0.36h8.64V6c0-0.904-0.735-1.64-1.64-1.64H10.36V27.64z M1.36,22.36V26 c0,0.904,0.736,1.64,1.64,1.64h6.64v-5.28H1.36z M22.36,21.64h8.279v-5.28H22.36V21.64z M1.36,21.64h8.28v-5.28H1.36V21.64z M22.36,15.64h8.279v-5.28H22.36V15.64z M1.36,15.64h8.28v-5.28H1.36V15.64z M1.36,9.64h8.28V4.36H3C2.096,4.36,1.36,5.096,1.36,6 V9.64z"></path> <rect id="_Transparent_Rectangle" style="fill:none;" width="32" height="32"></rect> </g></svg></Div>
                <Div Class="From">10/19</Div>
                <Div Class="To">06/21</Div>
                <Div Class="Ring"></Div>
            </div>
            
                
        </div>
    </div>
</div>
<!--<Div Class="Card-Group">
        <Div Class="Card">
            <Div Class="Logo"><svg fill="#000000" width="64px" height="64px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M16.539 9.186a4.155 4.155 0 0 0-1.451-.251c-1.6 0-2.73.806-2.738 1.963-.01.85.803 1.329 1.418 1.613.631.292.842.476.84.737-.004.397-.504.577-.969.577-.639 0-.988-.089-1.525-.312l-.199-.093-.227 1.332c.389.162 1.09.301 1.814.313 1.701 0 2.813-.801 2.826-2.032.014-.679-.426-1.192-1.352-1.616-.563-.275-.912-.459-.912-.738 0-.247.299-.511.924-.511a2.95 2.95 0 0 1 1.213.229l.15.067.227-1.287-.039.009zm4.152-.143h-1.25c-.389 0-.682.107-.852.493l-2.404 5.446h1.701l.34-.893 2.076.002c.049.209.199.891.199.891h1.5l-1.31-5.939zm-10.642-.05h1.621l-1.014 5.942H9.037l1.012-5.944v.002zm-4.115 3.275.168.825 1.584-4.05h1.717l-2.551 5.931H5.139l-1.4-5.022a.339.339 0 0 0-.149-.199 6.948 6.948 0 0 0-1.592-.589l.022-.125h2.609c.354.014.639.125.734.503l.57 2.729v-.003zm12.757.606.646-1.662c-.008.018.133-.343.215-.566l.111.513.375 1.714H18.69v.001h.001z"></path></g></svg></Div>
            <Div Class="Chip"><svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" width="64px" height="64px"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="chip--credit_1_" d="M29,28.36H3c-1.301,0-2.36-1.059-2.36-2.36V6c0-1.301,1.059-2.36,2.36-2.36h26 c1.302,0,2.36,1.059,2.36,2.36v20C31.36,27.302,30.302,28.36,29,28.36z M22.36,27.64H29c0.904,0,1.64-0.735,1.64-1.64v-3.64h-8.28 V27.64z M10.36,27.64h11.28V10c0-0.199,0.161-0.36,0.36-0.36h8.64V6c0-0.904-0.735-1.64-1.64-1.64H10.36V27.64z M1.36,22.36V26 c0,0.904,0.736,1.64,1.64,1.64h6.64v-5.28H1.36z M22.36,21.64h8.279v-5.28H22.36V21.64z M1.36,21.64h8.28v-5.28H1.36V21.64z M22.36,15.64h8.279v-5.28H22.36V15.64z M1.36,15.64h8.28v-5.28H1.36V15.64z M1.36,9.64h8.28V4.36H3C2.096,4.36,1.36,5.096,1.36,6 V9.64z"></path> <rect id="_Transparent_Rectangle" style="fill:none;" width="32" height="32"></rect> </g></svg></Div>
            <Div Class="Number">1234 5678 9012 3456</Div>
            <Div Class="Name">SHOUNAK DAS</Div>
            <Div Class="From">10/19</Div>
            <Div Class="To">06/21</Div>
            <Div Class="Ring"></Div>
        </Div>
</Div>-->

<style>
.Card-Group {
  position: sticky;
  bottom: 0;


.Card {
  Position: Relative;
  Height: 16rem;
  Width: 29rem;
  Border-Radius: 25px;
  Background: Rgba(255, 255, 255, 0.2);
  Backdrop-Filter: Blur(30px);
  Border: 2px Solid Rgba(255, 255, 255, 0.1);
  Box-Shadow: 0 0 80px Rgba(0, 0, 0, 0.2);
  Overflow: Hidden;
}

.Logo Img,
.Chip Img,
.Number,
.Name,
.From,
.To,
.Ring {
  Position: Absolute; /* All Items Inside Card Should Have Absolute Position */
}

.Logo svg {
  Top: 35px;
  margin-left: 20em;
  Width: 80px;
  Height: Auto;
  Opacity: 0.8;
}

.Chip svg {
  Top: 120px;
  margin-Left: 40px;
  Width: 50px;
  Height: Auto;
  Opacity: 0.8;
}

.Number,
.Name,
.From,
.To {
  Color: rgba(82, 190, 128,0.5);
  Font-size: 20px;
  Letter-Spacing: 2px;
  Text-Shadow: 0 0 2px Rgba(0, 0, 0, 0.6);
}

.Number {
  Left: 40px;
  Bottom: 65px;
  Font-Family: "Nunito", Sans-Serif;
}

.Name {
  Font-Size: 0.9rem;
  Left: 40px;
  Bottom: 35px;
}

.From {
  Font-Size: 0.5rem;
  Bottom: 35px;
  Right: 110px;
}

.To {
  Font-Size: 0.5rem;
  Bottom: 35px;
  Right: 40px;
}
fieldset{
	  color: black;
    background: black;
}
.btn{
    top: 9rem;
    left: 19rem;
    position: absolute;
    display:  inline-block;
    padding:8px 20px;
    margin-top: 15px;
    color: #000;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 500;
    box-shadow: 0 5px 15px rgba(0,0,0,0.5);
    z-index: 2;
}
	

</style>


