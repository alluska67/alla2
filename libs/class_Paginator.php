<?php


class Paginator
{
    static $page_count;
    static $num = 10;
    static $current_page = 1;
    static $nav = 5;
    static $category;

    public static function count($query_count) {
        $row = $query_count->fetch_assoc();
        self::$page_count = ceil($row['cnt'] / self::$num);
    }

    public static function q($query) {
        $limit_start = ((int)self::$current_page - 1) * self::$num;

        if ($limit_start < 0 ) {
            $limit_start = 1;
        }

        $limit_end = self::$num;

        $query_main = $query . 'LIMIT ' . (int)$limit_start . ' , ' . (int)$limit_end;
        return q($query_main);

    }

    public static function createLink ($uri,$show,$text) {
        $link = '';//обнуляем значение
        if (isset(self::$category)) {
            $link .= '<li class="page-item"><a tabindex="-1" class="page-link" href = "?'.$uri;
            $link .= '&show_page='.$show;
            $link .= '">'.$text;
            $link .= '</a></li>';

        } else {
            $link .= '<li class="page-item"><a tabindex="-1" class="page-link" href = "?show_page='.$show;
            $link .= '">'.$text;
            $link .= '</a></li>';
        }
        return $link;
    }

    public static function nav(string $uri) {
        $start = (int)self::$current_page - self::$nav;
        $end = (int)self::$current_page + self::$nav;
        $result = '<ul class="pagination justify-content-center">';

        if (self::$current_page > 1) {
            $show = (int)self::$current_page - 1;
            $text = 'Назад';
            $result .= self::createLink($uri,$show,$text);
        }

        if ($end > self::$page_count) {
            $end = self::$page_count;
        }

        for ($show = $start; $show <= $end; ++$show) {
            if ($show < 1) {
                continue;
            }
            if ($show > $end) {
                continue;
            }
            if($show == self::$current_page){
                $result .= '<li class="page-item active"><a class="page-link active" href = "?'.$uri .'&show_page=' . $show . '">' . $show . '</a></li>';
            } else {
                $result .= self::createLink($uri,$show,$show);
            }
        }

        if (self::$current_page  < $end) {
            $show1 = (int)self::$current_page + 1;
            $text1 = 'Вперёд';
            $result .= self::createLink($uri,$show1,$text1);
        }
        return $result .'</ul>';
    }
}




