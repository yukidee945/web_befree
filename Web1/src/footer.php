<footer>
    <p>© 2025 Магазин. Все права защищены. Телефон: 8 (800) 250‑01‑02 АО «Мэлон Фэшн Груп». Юр. Адрес: 190020, 10-я
        Красноармейская, 22, литер А, пом. 1-Н, 6-й этаж</p>
    <ul class="footer-links">
        <li><a href="#" class="pdf-link" data-pdf="image/terms-of-service.pdf">Условия обслуживания</a></li>
        <li><a href="#" class="pdf-link" data-pdf="image/user-agreement.pdf">Пользовательское соглашение</a></li>
        <li><a href="#" class="pdf-link" data-pdf="image/privacy-policy.pdf">Политика конфиденциальности</a></li>
    </ul>
</footer>

<!-- Модальное окно -->
<div id="footerPdfModal">
    <div class="footer-modal-content">
        <span class="footer-modal-close">&times;</span>
        <iframe class="footer-modal-iframe" src="" frameborder="0"></iframe>
        <a class="footer-download-btn" href="" download>Скачать PDF</a>
    </div>
</div>


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