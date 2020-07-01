<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>phonebook</title>

    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .phonebook-form {
            margin-bottom: 1rem;
        }

        .phonebook-table {

        }

        .phonebook-table__header {

        }

        .phonebook-table__cell {
            padding: 0 .5rem .5rem;
        }

        .input-error {
            border: 1px solid red;
        }
    </style>
</head>
<body>

<header></header>
<main>
    <div class="container">
        <h1>Phonebook</h1>

        <div class="phonebook">

            <div class="phonebook-form">
                <h3>Поиск</h3>
                <form class="form">
                    <label><input type="text" name="search" placeholder="Name/Phone" class="phonebookSearchJs"></label>
                    <button type="button" class="phonebookSearchSubmitJs">Найти</button>
                </form>
            </div>

            <div class="phonebook-form">
                <h3>Добавить контакт</h3>
                <form class="form phonebookFormJs">
                    <label><input type="text" name="name" placeholder="Name" class="requireJs"></label>
                    <label><input type="text" name="phone" placeholder="Phone" class="requireJs phoneJs"></label>
                    <button type="button" class="phonebookFormSubmitJs">Добавить</button>
                </form>
            </div>
            <table class="phonebook-table">
                <thead>
                <tr>
                    <th class="phonebook-table__header">name</th>
                    <th class="phonebook-table__header">phone</th>
                </tr>
                </thead>

                <tbody class="phonebookListJs">
                <? foreach ($phonebook as $phone) { ?>

                    <tr data-id="<?= $phone['id']; ?>">
                        <td class="phonebook-table__cell"><?= $phone['name']; ?></td>
                        <td class="phonebook-table__cell"><?= $phone['phone']; ?></td>
                    </tr>

                <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<footer></footer>

<script src="/js/jquery.maskedinput.min.js"></script>
<script src="/js/functions.js"></script>
<script src="/js/index.js"></script>
</body>
</html>