<template>
    <swiper class="swiper" ref="swiper" :options="swiperOption">
        <swiper-slide>
            <img class="img-fluid" src="http://nuthink.jtk.polban.ac.id/img/logo1.jpg" alt="" />
        </swiper-slide>
        <swiper-slide>
            <img class="img-fluid" src="http://nuthink.jtk.polban.ac.id/img/logo2.jpg" alt="" />
        </swiper-slide>
        <swiper-slide>
            <img class="img-fluid" src="http://nuthink.jtk.polban.ac.id/img/logo3.jpg" alt="" />
        </swiper-slide>
        <swiper-slide>
            <img class="img-fluid" src="http://nuthink.jtk.polban.ac.id/img/logo4.jpg" alt="" />
        </swiper-slide>

    </swiper>
</template>

<script>
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
import 'swiper/swiper-bundle.css'

export default {
    name: 'LogoSwiper',
    title: 'Loop mode with multiple slides per group',
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            swiperOption: {
                slidesPerView: 3,
                spaceBetween: 40,
                direction: 'horizontal',
                on: {
                    resize: () => {
                        this.$refs.swiper.$swiper.changeDirection(
                            window.innerWidth <= 960
                                ? 'vertical'
                                : 'horizontal'
                        )
                    }
                }
            }
        }
    }
}
</script>

<style lang="scss" scoped>
// colors
$white: #FFFFFF;
$black: #000000;
$github-primary: #24292e;
$github-secondary: #30363c;
$github-text-primary: #0366d6;
$github-sponsor-primary: rgb(234, 74, 170);

$body-bg: #e0e0e0;
$module-bg: $white;
$module-bg-darken: #f7f7f7;

$text-color: #353535;
$text-secondary: lighten($text-color, 20%);
$link-color: $black;
$text-reverse: $module-bg-darken;

// sizes
$container-width: 960px;
$radius: 1px;

// gaps
$golden-ratio: 0.618;
$gap: 1rem; // ~14px
$sm-gap: $gap * $golden-ratio; // ~8.6px
$xs-gap: $sm-gap / 2; // ~4.4px
$lg-gap: $sm-gap * 2; // ~17px

// times
$transition-time-fast: .15s;
$transition-time-normal: .25s;
$transition-time-slow: .38s;

// fonts
$font-size-base: 14px;
$font-size-large: $font-size-base * 1.1; // ~15.4px
$font-size-huge: $font-size-base * 1.3; // ~19px
$font-size-small: $font-size-base * .888; // ~12.4px

$iconfont-size: $font-size-base * 1.35;
.swiper {
    height: 350px;
    width: 100%;

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-weight: bold;
        font-size: $font-size-huge * 2;
        background-color: $white;
    }
}
@media (max-width: $container-width) {
    .swiper-button-next {
        right: 20px;
        transform: rotate(90deg);
    }

    .swiper-button-prev {
        left: 20px;
        transform: rotate(90deg);
    }
}
</style>
