<style>
    <?php include './assets/css/styles.css' ?>
</style>

<?php
$json = file_get_contents('./dataset/users.json');
$users = json_decode($json);
?>
<table class='table_users'>
    <tbody>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $key => $user): ?>
        <tr>
            <td><?= $user->name ?></td>
            <td><?= $user->username ?></td>
            <td><a href='mailto:<?= $user->email ?>'><?= $user->email ?></a></td>
            <td><?= $user->address->street ?>, <?= $user->address->zipcode ?> <?= $user->address->city ?></td>
            <td><?= $user->phone ?></td>
            <td><?= $user->company->name ?></td>
            <td><button class='delete-button' data-id='<?= $key ?>'>REMOVE</button></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <form action='./partials/add_user.php' method='post'>
                <td class='add-users'>
                    <label class='label'>
                        Name<br>
                        <input type='text' name='name' autocomplete="name" required>
                    </label>
                </td>
                <td class='add-users'>
                    <label class='label'>
                        Username<br>
                        <input type='text' name='username' autocomplete="username" required>
                    </label>
                </td>
                <td class='add-users'>
                    <label class='label'>
                        Email<br>
                        <input type='text' name='email' autocomplete="email" required>
                    </label>
                </td>
                <td class='add-users'>
                    <label class='label'>
                        Street<br>
                        <input type='text' name='street' autocomplete="address-line1" required>
                    </label>
                    <label class='label'>
                        Zipcode<br>
                        <input type='text' name='zipcode' autocomplete="postal-code" required>
                    </label>
                    <label class='label'>
                        City<br>
                        <input type='text' name='city' autocomplete="address-level2" required>
                    </label>
                </td>
                <td class='add-users'>
                    <label class='label'>
                        Phone<br>
                        <input type='text' name='phone' autocomplete="tel" required>
                    </label>
                </td>
                <td class='add-users'>
                    <label class='label'>
                        Company<br>
                        <input type='text' name='company' autocomplete="organization" required>
                    </label>
                </td>
                <td>
                    <button class='add-button' type='submit'>ADD</button>
                </td>
            </form>
        </tr>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    <?php include './assets/js/script.js' ?>
</script>