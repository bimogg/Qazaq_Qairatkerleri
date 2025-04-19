<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $rating = $_POST['rating'];  // Оценка
    $message = $_POST['message'];  // Сообщение

    // Настройка электронной почты
    $to = "anagashtay@gmail.com";  // Ваша почта для получения отзыва
    $subject = "Новый отзыв с сайта";  // Тема письма

    // Создаем текст письма
    $email_content = "Новый отзыв:\n\n";
    $email_content .= "Оценка: " . $rating . " звезда(ы)\n\n";
    $email_content .= "Пікір:\n" . $message . "\n\n";

    // Заголовки письма
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@yourwebsite.com" . "\r\n";  // Адрес отправителя

    // Отправка письма
    if (mail($to, $subject, $email_content, $headers)) {
        // Письмо успешно отправлено
        header("Location: thank_you.html");  // Перенаправление на страницу благодарности
        exit();
    } else {
        // Ошибка отправки письма
        echo "Ошибка при отправке сообщения.";
    }
}
?>
