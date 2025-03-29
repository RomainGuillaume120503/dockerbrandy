<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Paris> $paris
 */
$user = $this->request->getAttribute('identity');
?>
<div class="paris index  ">
    <?= $this->Html->link(__('New Paris'), ['action' => 'add'], ['class' => 'btn']) ?>
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('prof_id') ?></th>
                    <th><?= $this->Paginator->sort('course_hour') ?></th>
                    <th><?= $this->Paginator->sort('arrival_hour') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paris as $paris): ?>
                <tr>
                    <td><?= $this->Number->format($paris->id) ?></td>
                    <td><?= $paris->has('profs') ? $this->Html->link($paris->profs->id, ['controller' => 'Profs', 'action' => 'view', $paris->profs->id]) : '' ?></td>
                    <td><?= h($paris->course_hour) ?></td>
                    <td><?= h($paris->arrival_hour) ?></td>
                    <td class="text">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $paris->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paris->id]) ?>
                        <?= $this->Form->postLink(__('Terminer'), ['action' => 'terminer', $paris->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paris->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paris->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>


<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box; 
}
        main {
            padding: 2em;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            margin: 0;
        }

        table {
            margin-top: 1em;
            border-collapse: collapse;
            min-width: 100%;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 2;
        }   
        tr:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        th, td {
            color: #fff;
        }
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    z-index: -1;
}

.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
.header,ul {
    background: rgba(255,255,255,0.13);
}
h1,h2,p,.text{
    color: #fff;
}
.btn{
    padding: 0.5rem;
    margin-bottom: 23rem;
    color: #080710;
    background-color: #fff;
    text-decoration: none;
    border-radius: 5px;
    z-index: 1;
}
    </style>