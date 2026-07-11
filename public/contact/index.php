<?php
$__dir = __DIR__;
for ($__i = 0; $__i < 8 && !is_file($__dir . '/bootstrap.php'); $__i++) {
    $__dir = dirname($__dir);
}
require $__dir . '/bootstrap.php';

$page = page_content('contact');
$site = site_content();
$meta = $page['meta'];

$errors = [];
$sent = false;
$values = ['first_name' => '', 'last_name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Honeypot: real visitors never fill this hidden field.
    $honeypot = trim($_POST['website'] ?? '');

    foreach ($values as $key => $default) {
        $values[$key] = trim($_POST[$key] ?? '');
    }

    if ($honeypot === '') {
        if ($values['first_name'] === '') {
            $errors[] = 'Please enter your first name.';
        }
        if ($values['email'] === '' || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }
        if ($values['message'] === '') {
            $errors[] = 'Please enter a message.';
        }

        if (!$errors) {
            $to = $site['contact']['email'];
            $subject = 'New contact form message from ' . $values['first_name'] . ' ' . $values['last_name'];
            $body = "You have a new message from the website contact form:\n\n"
                . "Name: {$values['first_name']} {$values['last_name']}\n"
                . "Email: {$values['email']}\n\n"
                . "Message:\n{$values['message']}\n";

            // Only ASCII-safe, single-line header values — untrusted input
            // never goes into headers, only into the body.
            $headers = "From: {$site['name']} Website <no-reply@" . parse_url($site['url'], PHP_URL_HOST) . ">\r\n";
            $headers .= 'Reply-To: ' . $values['email'] . "\r\n";

            $sent = @mail($to, $subject, $body, $headers);
            if ($sent) {
                $values = ['first_name' => '', 'last_name' => '', 'email' => '', 'message' => ''];
            } else {
                $errors[] = 'Sorry, something went wrong sending your message. Please try again or email us directly.';
            }
        }
    } else {
        // Honeypot tripped — pretend success, drop it silently.
        $sent = true;
        $values = ['first_name' => '', 'last_name' => '', 'email' => '', 'message' => ''];
    }
}

render('header.php', ['meta' => $meta]);
?>

<section class="page-header reveal">
    <div class="wrap">
        <h1><?= e($page['title']) ?></h1>
        <h2 style="font-size:1.25rem; color: var(--color-muted); font-family: var(--font-body); font-weight:400;"><?= e($page['heading']) ?></h2>
    </div>
</section>

<section class="reveal">
    <div class="wrap media-split">
        <div>
            <ul class="contact-details">
                <li><?= e($site['contact']['address']) ?></li>
                <?php foreach ($site['contact']['phones'] as $phone): ?>
                <li><a href="tel:<?= e(preg_replace('/\s+/', '', $phone)) ?>"><?= e($phone) ?></a></li>
                <?php endforeach; ?>
                <li><a href="mailto:<?= e($site['contact']['email']) ?>"><?= e($site['contact']['email']) ?></a></li>
            </ul>
        </div>

        <div>
            <h2><?= e($page['form_heading']) ?></h2>

            <?php if ($sent): ?>
            <p class="form-status form-status--success">Thanks for reaching out — we'll get back to you soon.</p>
            <?php elseif ($errors): ?>
            <div class="form-status form-status--error">
                <?php foreach ($errors as $error): ?>
                <p><?= e($error) ?></p>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <form method="post" action="/contact/" novalidate>
                <div class="form-grid">
                    <div class="field">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?= e($values['first_name']) ?>" required>
                    </div>
                    <div class="field">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?= e($values['last_name']) ?>">
                    </div>
                    <div class="field field--full">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= e($values['email']) ?>" required>
                    </div>
                    <div class="field field--full">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required><?= e($values['message']) ?></textarea>
                    </div>
                    <div class="field" style="position:absolute; left:-9999px;" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>
                    <div class="field field--full">
                        <button class="btn btn--primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php render('footer.php'); ?>
