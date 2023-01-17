<?php
namespace App\Http\Settings;

class SiteOptions
{

    /**
     * Meta section information, used in head section
     */
    const META = 'meta';

    /**
     * Meta => Site's title
     */
    const META_TITLE = "Бронировать отель Россия | Добавь свой отель бесплатно";

    /**
     * Meta => Environmental site title prefix
     */
    const META_TITLE_PREFIX = "MoreOtdih.ru | ";

    /**
     * Meta => Site title postfix
     */
    const META_TITLE_POSTFIX = " | MoreOtdih.Ru  Добавь свой отель бесплатно";

    /**
     * Meta => Site's meta description
     */
    const META_DESCRIPTION = "Система бронирования отелей, добавь свой отель бесплатно. Все  отели России и ближнего зарубежья. Забронируй онлайн";

    /**
     * Meta => Site's meta keyword
     */
    const META_KEYWORDS = "Забронируй онлайн, Система бронирования отелей, Забронировать. Добавить отель, управляй онлайн";


    static function GroupServices($id = 0, $tape="hotel")
    {
        $array = array (
            0 => '---',
            1 => 'В отеле',
            2 => 'В номерах',
            3 => 'Курение',
            4 => 'Ванная комната',
            5 => 'Питание',
            6 => 'Безопасность',
            7 => 'Спальня',
            8 => 'Интернет',
            9 => 'Парковка',
            10 => 'Транспорт',
            11 => 'Стойка регистрации',
            12 => 'Спорт и отдых',
            13 => 'Развлечения и семейные услуги ',
            14 => 'Доступность',
            15 => 'Медиа и технологии',
            16 => 'Услуги уборки',
            17 => 'Персонал говорит на этих языках ',
            18 => 'Услуги бизнес-центра',
            19 => 'Животные',
            20 => 'Бассейн и пляж'

        );


        if($id==0)
        {

            return $array;

        }
        else
        {
            return $array[$id];
        }

    }


}
