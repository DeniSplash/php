<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Задачи</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
        crossorigin="anonymous">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
        font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>
</head>


<body>

    <div class="container">

    <?php include "menu.php" ?>

    <h1><?= $pageHeader ?></h1>

    <br>

    <h4 class="mb-3">Новая задача</h4>
        <form action="/?controller=tasks&action=add" method="post" class="needs-validation" novalidate>
        <div class="row g-3">
            <div class="col-sm-6">
            <label for="task" class="form-label">Название задачи</label>
            <input type="text" class="form-control" id="task" name="task" placeholder="" value="" required>
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить</button>
            </div>
        </div>
        </form>

        <br>

    <div class="row g-5">

    <div class="row g-5">
            <form method="post" action="/?controller=tasks&action=showDone" class="col-lg-2 ">
                <button class="w-5 btn btn-success" type="submit">Выполненные</button>
            </form>

            <form method="post" action="/?controller=tasks&action=showUnDone" class="col-lg-2 ">
                <button class="w-5 btn btn-danger" type="submit">Невыполненные</button>
            </form>

            <form method="post" action="/?controller=tasks&action=showAll" class="col-lg-2 ">
                <button class="w-5 btn btn-primary" type="submit">Все</button>
            </form>
    </div>

    <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Список задач</span>
        </h4>

        

        <ul class="list-group mb-3">
            <?php if (count($tasks) > 0):?>
                <?php foreach ($tasks as $task): ?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div id="<?=$task->getId()?>">
                        <h6 class="my-0"><?=$task->getDescription()?></h6>
                        <small class="text-muted"><?=$task->getDateCreated()?></small>
                    </div>
                    <div class="form-check" >
                        <a class="w-5 btn btn-danger" href="/?controller=tasks&action=dell&id=<?=$task->getId()?>">Удалить</a>
                        <?php if (!$task->isDone()):?>
                        <a class="w-5 btn btn-success" href="/?controller=tasks&action=done&id=<?=$task->getId()?>">Выполнить</a>
                        <?php endif ?>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </ul>
    </div>

    </div>
</body>
</html>