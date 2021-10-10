<main>
    <div class="myaccount">
        <legend>Client Area</legend>
        <h4><?= $_SESSION['name'] ?></h4>
        <p>Code: <?= $_SESSION['code'] ?></p>
        <p>Address: <?= $_SESSION['address'] ?></p>
        <p>District: <?= $_SESSION['district'] ?></p><br>
        <p>You will soon see your wish list here!</p>
    </div>
</main>