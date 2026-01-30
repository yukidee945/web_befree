<?php
if (isset($_COOKIE['login'])) {
    header('Location: /Web1/user.php');
    exit;
} ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Befree</title>
    <link rel="stylesheet" href="./CSS/main.css">
</head>

<body>

    <div class="container">
        <?php if (isset($_COOKIE['login']))
            require_once "./src/menu_login.php";
        else
            require_once "./src/menu.php"; ?>
        <?php require_once "./src/mod.php"; ?>

        <main class="content">
            <h1>Регистрация</h1>
            <BR>
            <form method="post" action="./lib/rega.php">
                <div class="inline">
                    <div>
                        <label>Фамилия</label>
                        <input type="text" name="surname">
                    </div>
                    <div>
                        <label>Имя</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Отчество</label>
                        <input type="text" name="lastname">
                    </div>
                </div>
                <div class="inline">
                    <div>
                        <label>Почта</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label>Телефон</label>
                        <input type="text" name="phone" placeholder="+79...">
                    </div>
                </div>
                <div class="form-bottom">
                    <label>Логин</label>
                    <input type="text" name="login" class="one-line">

                    <label>Пароль</label>
                    <input type="password" name="password" class="one-line">

                    <div class="faq">
                        <input type="checkbox" name="subscribe"> Я согласен(а) с:

                        <a href="#" class="pdf-link" data-pdf="image/terms-of-service.pdf">Условия
                            обслуживания</a>
                        <a href="#" class="pdf-link" data-pdf="image/user-agreement.pdf">Пользовательское
                            соглашение</a>
                        <a href="#" class="pdf-link" data-pdf="image/privacy-policy.pdf">Политика
                            конфиденциальности</a>

                    </div>
                    <BR>
                    <a href="./auth.php" class="login-link">Уже есть аккаунт? Войдите здесь!</a>
                    <BR>
                    <button type="submit">Зарегистрироваться</button>
                </div>

            </form>

        </main>


    </div>

    <?php require_once "./src/footer.php"; ?>

</body>

</html>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('footerPdfModal');
        const iframe = modal.querySelector('.footer-modal-iframe');
        const downloadBtn = modal.querySelector('.footer-download-btn');
        const closeBtn = modal.querySelector('.footer-modal-close');

        document.querySelectorAll('.pdf-link').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const pdfUrl = link.dataset.pdf;
                iframe.src = pdfUrl;
                downloadBtn.href = pdfUrl;
                modal.style.display = 'flex';
            });
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            iframe.src = '';
        });

        window.addEventListener('click', e => {
            if (e.target === modal) {
                modal.style.display = 'none';
                iframe.src = '';
            }
        });
    });

</script>