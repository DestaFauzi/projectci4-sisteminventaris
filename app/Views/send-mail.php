<!-- app/Views/send_email.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>

<body>
    <h1>Send Email</h1>
    <form action="<?= base_url('email/send'); ?>" method="post">
        <label for="recipient">Recipient Email:</label><br>
        <input type="email" id="recipient" name="recipient"><br><br>
        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject"><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br><br>
        <button type="submit">Send Email</button>
    </form>
</body>

</html>