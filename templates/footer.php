<?php
/**
 * Closes <main>, renders site footer, closes </body></html>.
 */
$site = site_content();
?>
</main>

<footer class="site-footer">
    <div class="wrap site-footer__grid">
        <div class="site-footer__col">
            <a class="site-logo" href="/">
                <img src="/assets/images/logo.webp" width="56" height="56" alt="<?= e($site['name']) ?>">
            </a>
            <p><?= e($site['description']) ?></p>
            <ul class="social-list">
                <?php foreach ($site['social'] as $s): ?>
                <li>
                    <?php if ($s['href']): ?>
                    <a href="<?= e($s['href']) ?>" target="_blank" rel="noopener" aria-label="<?= e($s['label']) ?>"><?= icon($s['icon']) ?></a>
                    <?php else: ?>
                    <span aria-label="<?= e($s['label']) ?>"><?= icon($s['icon']) ?></span>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="site-footer__col">
            <h2>Our Programs</h2>
            <ul>
                <?php foreach ($site['footer_programs'] as $program): ?>
                <li><?= e($program) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="site-footer__col">
            <h2>Contact Us</h2>
            <ul class="contact-details">
                <li><span class="contact-details__icon"><?= icon('map-pin') ?></span><?= e($site['contact']['address']) ?></li>
                <?php foreach ($site['contact']['phones'] as $phone): ?>
                <li><span class="contact-details__icon"><?= icon('phone') ?></span><a href="tel:<?= e(preg_replace('/\s+/', '', $phone)) ?>"><?= e($phone) ?></a></li>
                <?php endforeach; ?>
                <li><span class="contact-details__icon"><?= icon('mail') ?></span><a href="mailto:<?= e($site['contact']['email']) ?>"><?= e($site['contact']['email']) ?></a></li>
            </ul>
        </div>
    </div>

    <div class="wrap site-footer__bottom">
        <p>Copyright &copy; <?= date('Y') ?> <?= e($site['copyright']) ?></p>
    </div>
</footer>

<script src="<?= asset('js/main.js') ?>" defer></script>
</body>
</html>
