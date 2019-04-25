<?php
require_once '../bootloader.php';

$connection = new \Core\Database\Connection(DB_CREDENTIALS);

$pdo = $connection->getPDO();
$schema = new \Core\Database\Schema($connection, DB_NAME);
$schema->init();

$repository = new \Core\User\Repository($connection);
$user = new \Core\User\User(['email' => 'valdau@' . rand(0, 100) . 'nx.com',
    'password' => 'bbd',
    'full_name' => 'Zanas Vandamas',
    'account_type' => \Core\User\User::ACCOUNT_TYPE_USER,
    'is_active' => true,
    'age' => 26,
    'gender' => 'm'
        ], [
    'email'
]);

$repository->insert($user);
$users = $repository->load();

?>
<html>
    <head>
        <title>Tyler`s Framework</title>
    </head>
    <body>
        <?php foreach ($users as $user): ?>
            <ul>
                <?php foreach ($user as $col => $value): ?>
                    <li>
                        <b><?php print $col; ?></b>
                        <i><?php print $value; ?></i>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </body>
</html>
