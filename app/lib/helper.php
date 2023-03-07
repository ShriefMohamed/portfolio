<?php


namespace Framework\lib;


trait Helper
{
    public static function Hash($string)
    {
        if ($string) {
            $cipher = new Cipher();
            return $cipher->Hash($string);
        }
    }

    public static function TimeElapsed($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public static function DateDiff($date, $date1)
    {
        $date = new \DateTime($date);
        $date1 = new \DateTime($date1);
        $diff = $date->diff($date1);
        return $diff;
    }

    public static function ConvertDateFormat($date, $date_time = false)
    {
        if ($date) {
            $date = new \DateTime($date);
            return ($date_time != false) ? $date->format(DATE_TIME_FORMAT) : $date->format(DATE_FORMAT);
        } else {
            return false;
        }
    }

    public function ReArrayFiles(&$file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    public static function CompressImage($source, $destination, $quality = '75')
    {
        if ($source && $destination) {
            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg')
                $image = imagecreatefromjpeg($source);
            elseif ($info['mime'] == 'image/gif')
                $image = imagecreatefromgif($source);
            elseif ($info['mime'] == 'image/png')
                $image = imagecreatefrompng($source);

            return (imagejpeg($image, $destination, $quality)) ? true : false;
        }
    }
}