<?php include "./parts/head.php"; ?>
<h1 id="index-title">Management.</h1>
        <form id="form" action="/auth.php" method="post">
            <input type="email" name="account" id="" placeholder="email..." required>
            <input type="password" name="password" id="" placeholder="password..." required>
            <input type="password" name="password_confirmation" id="" placeholder="password confirm..." required>
            <input type="hidden" name="type" value="register">
            <section>
                <button type="submit">register</button>
            </section>
        </form>
<?php include './parts/foot.php';?>