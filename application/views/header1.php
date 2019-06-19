<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= site_url("client/page1") ?>">Page 1</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="<?= site_url("client/page2") ?>">Page 2</a>
                            </li>
                            
                            <li class="nav-item">
                                <?php if ($this->session->user): ?>
                                    <a class="nav-link" href="<?= site_url("site/logout") ?>" tabindex="-1" aria-disabled="true">Deconnexion</a>
                                    <?= $this->session->user->nom ?>
                                <?php else: ?>
                                    <a class="nav-link" href="<?= site_url("site/login") ?>" tabindex="-1" aria-disabled="true">Connexion</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                