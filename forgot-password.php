<?php include "./parts/head.php"; ?>
<h1 id="index-title">Management.</h1>
        <form id="form" action="/auth.php" method="post">
            <input type="email" name="account" id="" placeholder="email..." required>
            <input type="hidden" name="type" value="forgot-password">
            <section>
                <button type="submit">send</button>
            </section>
        </form>
<?php include './parts/foot.php';?>