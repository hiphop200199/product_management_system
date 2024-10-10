<?php include "./parts/head.php"; ?>

<body>
    <div id="box">
        <h1 id="index-title">Management.</h1>
        <form id="login-form" action="/auth/login.php" method="post">
            <input type="text" name="account" id="" placeholder="account...">
            <input type="password" name="password" id="" placeholder="password...">
            <section>
                <button type="submit">login</button>
                <a href="/register.php">register</a>
            </section>
        </form>
        <div id="circle"></div>
    </div>
</body>

</html>