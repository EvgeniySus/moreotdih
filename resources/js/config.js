//let url = window.location.origin+"";
// TODO В бою заменить на имя хоста.
const serv_url = "https://moreotdih-ru/api/site/"; // Сервер Api

const img_url = "https://moreotdih-ru/storage/hotel/hotel_"; // Сервер Api

class config {


    // вернуть url сервера.
    static getServUrl()
    {

        return serv_url;
    }

    static getImgUrl()
    {
        return img_url;
    }


// Определение число дней в интервале
    static getNumberOfDays(datastart, dataend)
    {
        const date1 = new Date(datastart);
        const date2 = new Date(dataend);

        // One day in milliseconds
        const oneDay = 1000 * 60 * 60 * 24;

        // Calculating the time difference between two dates
        const diffInTime = date2.getTime() - date1.getTime();

        // Calculating the no. of days between two dates
        const diffInDays = Math.round(diffInTime / oneDay);

        return diffInDays;
    }

    // Склонение слов в зависимости от числа
    static declOfNum(number, words) {
        return words[(number % 100 > 4 && number % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(number % 10 < 5) ? Math.abs(number) % 10 : 5]];
    }

    static toggle(id) {
        let  el=document.getElementById(id);
        el.style.display = (el.style.display == 'none') ? 'block' : 'none'
    }


}
export default config;
