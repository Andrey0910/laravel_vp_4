<?php

namespace App\Http\Controllers;

use App\Books;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;

class OrderController extends Controller
{
    public function store($book_id)
    {
        $book = Books::find($book_id);
        $user = Auth::user();
        //записывпеи закащ в базу
        $order = new Order();
        $order->book_id = $book_id;
        $order->user_id = $user->id;
        $order->book_name = $book->book_name;
        $order->price = $book->price;
        $order->user_name = $user->name;
        $order->email = $user->email;
        $order->save();

        $this->sentMail($user->id);
    }

    public function sentMail($user_id)
    {
        $order = Order::where('user_id', $user_id)->orderBy('id', 'desc')->first();

        $host = "smtp.yandex.ru"; //адрес прчты откуда отправляем
        $username = "asdfrfk@yandex.ru"; //имя отправителя
        $password = "lkjejml12348"; //пароль

        $htmlBody = '
            <head>
            <title>Ваш заказ</title>
            </head>
            <body>
                <p>Номер заказа ' . $order->id . '</p><br>
                <p>Заказ: ' . $order->book_name. ' за ' . $order->price . ' рублей, 1 шт.</p><br>
                <p>ps: Спасибо - это ваш первый заказ!</p><br>
                <p>Время заказа: ' . date("Y-m-d H:i:s") . '</p><br>
            </body>>';
        try {
            $maile = new PHPMailer();
            $maile->isSMTP();
            $maile->SMTPAuth = true;
            $maile->Host = $host;
            $maile->Username = $username;
            $maile->Password = $password;
            $maile->SMTPSecure = "ssl";
            $maile->Port = 465;
            $maile->setFrom($username, "магазин");
            $maile->addAddress("petrovaa71@mail.ru", $order->user_name);
            $maile->addAttachment("");
            $maile->addReplyTo($username, "магазин");
            $maile->CharSet = "UTF-8";
            $maile->isHTML(true);
            $maile->Subject = "Письмо с сайта " . date("d.m.Y H:i:s");
            $maile->Body = $htmlBody;
            $maile->AltBody = "Это HTML сообщение.";
            if (!$maile->send()) {
                echo "Сообщение не может быть отправлено.";
                echo "Mailer Errer:" . $maile->ErrorInfo;
            } else {
                echo "Сообщение отправлено.", "<br><a href=\"/books\">на Главную</a>";
            }
        } catch (\Exception $e) {
            $e->getMessage();
        }

    }
}
