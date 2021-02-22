<?php
require_once('lib/database.php');
$database = new Database();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauracja</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Restauracji</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Lista restauracji</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dodajRest.php">
                                Dodaj restaurację
                            </a>
                        </li>
                    </ul>
                    <form name="search" method="post" action="./search.php?go" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" name="query" aria-label="Search">
                        <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>