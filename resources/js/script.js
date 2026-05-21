import Swiper from 'swiper';
import { Autoplay, Scrollbar } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/scrollbar';

/* SWIPER */

console.log('SCRIPT JS CARICATO');

document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.articleSwiper', {
        modules: [Autoplay],
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        slidesPerView: 1,
        spaceBetween: 10,
        direction: 'vertical',


        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                spaceBetween: 30,
                direction: 'horizontal',
            },
        }
    });
});