<head>
    <meta charset="UTF-8">
    <title>Befree</title>
    <link rel="stylesheet" href="./CSS/mod.css">
</head>


<div id="cookiePopup">
    <div class="cookie-body">
        <img src="https://cdn-icons-png.flaticon.com/512/2910/2910761.png" alt="Cookie">
        <div class="cookie-text">
            Мы используем файлы cookie для улучшения работы сайта.
            Продолжая использовать сайт, вы соглашаетесь с нашей
            <a href="#" class="pdf-link" data-pdf="image/privacy-policy.pdf">Политика конфиденциальности</a>
        </div>
    </div>
    <button id="acceptCookiePopup">Принять</button>
</div>

<div id="footerPdfModal">
    <div class="footer-modal-content">
        <span class="footer-modal-close">&times;</span>
        <iframe class="footer-modal-iframe" src="" frameborder="0"></iframe>
        <a class="footer-download-btn" href="" download>Скачать PDF</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('cookiePopup');
        const acceptBtn = document.getElementById('acceptCookiePopup');

        // Показываем popup, если cookie еще не принят
        if (!localStorage.getItem('cookieAccepted')) {
            popup.style.display = 'block';
            setTimeout(() => {
                popup.style.opacity = '1';
                popup.style.transform = 'translateY(0)';
            }, 100); // плавное появление
        }

        // Принять куки
        acceptBtn.addEventListener('click', () => {
            localStorage.setItem('cookieAccepted', 'true');
            popup.style.opacity = '0';
            popup.style.transform = 'translateY(20px)';
            setTimeout(() => popup.style.display = 'none', 300);
        });
    });

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