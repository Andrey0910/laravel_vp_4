<?php

namespace App\Http;

use \Intervention\Image\ImageManager;


class ImsgeResize
{
    public function moveFile()
    {
        $file = $_FILES['photo'];
        $nameFile = $file['name'];
        $pathFile = $file['tmp_name'];
        if (preg_match('/jpg/', $file['name']) //jpg
            or preg_match('/png/', $file['name'])
            or preg_match('/gif/', $file['name'])
        ) {
            if (!file_exists($pathFile)) {
                echo "Ошибка загрузки файла.", "<a href='/reg'>Назад</a>";
                die();
            }
            $data = file_get_contents($pathFile);
            $img = imagecreatefromstring($data);
            if (!$img) {
                echo "Ошибка загрузки файла.", "<a href='/reg'>Назад</a>";
                die();
            }
            $dir = __DIR__ . "/../../public/photo";
            if (!file_exists($dir)) {
                mkdir($dir, 0700, true);
            }
            $pathLocal = $dir . "/" . $nameFile;
            $this->reSize($pathFile, $pathLocal);
        } else {
            echo "Ошибка загрузки файла.", "<a href='/reg'>Назад</a>";
            die();
        }
        return $nameFile;
    }

    public function reSize($pathFile, $pathLocal)
    {
        // create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'gd')); // Вместо "imagick" должно быть прописано "gd"

        // to finally create image instances
        $img = $manager->make($pathFile);

        $img->resize(100, 100);

        $img->save($pathLocal);
    }
}