<?php include "./parts/head.php"; ?>
<body>
<h1>Management.</h1>
    <form action="/auth/login.php" method="post">
        <input type="text" name="account" id="" placeholder="account...">
        <input type="password" name="password" id="" placeholder="password...">
        <button type="submit">login</button>
        <a href="/register.php">register</a>
    </form>
</body>
</html>