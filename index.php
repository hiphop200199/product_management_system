<?php include "./parts/head.php"; ?>

        <h1 id="index-title">Management.</h1>
        <form id="form" action="/auth.php" method="post">
            <input type="email" name="account" id="" placeholder="email..." required>
            <input type="password" name="password" id="" placeholder="password..." required>
            <input type="hidden" name="type" value="login">
            <section>
                <button type="submit">login</button>
                <a href="/register.php">register</a>
                <a href="/forgot-password.php">forgot password?</a>
            </section>
        </form>
  <?php include './parts/foot.php'; ?>