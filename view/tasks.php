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
        <form method="post" class="needs-validation" novalidate>
        <div class="row g-3">
            <div class="col-sm-6">
            <label for="description" class="form-label">Название задачи</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="" value="" required>
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
            <form method="post" class="col-lg-2 ">
                <button id="showDone" name="showDone" class="w-5 btn btn-success" type="submit">Выполненные</button>
            </form>

            <form method="post" class="col-lg-2 ">
                <button id="showUnDone" name="showUnDone" class="w-5 btn btn-danger" type="submit">Невыполненные</button>
            </form>

            <form method="post" class="col-lg-2 ">
                <button id="showUnDone" name="showAll" class="w-5 btn btn-primary" type="submit">Все</button>
            </form>
    </div>

    <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Список задач</span>
        </h4>
        <ul class="list-group mb-3">
            <?php if (count($tasks) > 0):?>
            <?php foreach ($tasks as $key => $taskMy):?>
            <div>
                
                <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0"><?=$taskMy->getDescription()?></h6>
                    <small class="text-muted"><?=$taskMy->getDateCreated()?></small>
                </div>
                <div class="form-check" >
                    <?php if ($taskMy->getIsDone()):?>
                        <form method="post" class="col-lg-2 ">
                            <input type="text" id="isDoneId" name="isDoneId" class="form-control d-none" value="<?=$taskMy->getId()?>" required="">
                            <input type="submit" name="formSubmit" class="w-5 btn btn-danger" value="Отменить" />
                        </form>
                    <?php endif ?>
                    
                    <?php if (!$taskMy->getIsDone()):?>
                        <form method="post" class="col-lg-2 ">
                            <input type="text" id="isDoneId" name="isDoneId" class="form-control d-none" value="<?=$taskMy->getId()?>" required="">
                            <input type="submit" name="formSubmit" class="w-5 btn btn-success" value="Выполнить" />
                        </form>
                    <?php endif ?>
                </div>
                </li>
            </div>
            <?php endforeach?>
            <?php endif ?>
        </ul>
    </div>

    </div>
</body>
</html>