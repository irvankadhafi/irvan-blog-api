<template>
    <div>
        <section class="jumbotron" style="padding-top: 50px">
            <div class="container-fluid">
                <div class="row" style="margin-bottom: 60px">
                    <div class="col-md-7">
                        <div class="text-homepage" style="margin-top: 60px">
                            <h3 class="display-4 text-white judul">
                                <span style="font-weight: bold;">Nuthink <span style="background-color: white;color: #243665;padding: 0px 13px 0px 13px;border-radius: .5rem">News</span></span>
                            </h3>
                            <h5 class="text-white" style="margin-top: 20px;line-height: 35px">Informasi dari Politeknik Negeri Bandung yang di kelola oleh Badan Eksekutif Mahasiswa, Keluarga Mahasiswa Politeknik Negeri Bandung</h5>
                        </div>
                    </div>
                    <div class="col-md-3 ml-auto">
                       <img src="/img/nuthink.png" style="height: 300px">
                    </div>
                </div>
            </div>
        </section>
        <header-wave></header-wave>
        <div class="container-fluid" style="background-color: #ffffff;margin-top: -40px">
            <div class="row" style="padding-top: 40px;padding-bottom: 40px">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center">
                        <h3 class="font-weight-bold">Filosofi Logo</h3>
                        <logo-swiper></logo-swiper>
                        <p style="font-size: 20px">
                            Daftar ebook dengan pembahasan studi kasus yang akan menuntunmu menjadi seorang Full-Stack Developer Expert.
                        </p>
                        <div class="divider-custom mx-auto" style="width: 12rem;background-color: #cbd5e0;border-radius: 9999px;border: 0 solid #e2e8f0;height: .25rem;"></div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top: 40px;padding-bottom: 40px">
                <div class="col-md-8 offset-md-2">
                    <div>
                        <h3 class="font-weight-bold text-center">Visi & Misi</h3>
                        <h4>Visi</h4>
                        <p style="font-size: 20px">
                            Meningkatkan hardskill dan softskill serta menumbuhkan jiwa kewirausahaan anggota.
                        </p>
                        <h4>Misi</h4>
                        <p style="font-size: 20px">
                            1. Menyediakan informasi yang dapat dipercaya karena diambil dari sumber yang valid.<br>
                            2. Membangun website yang bebas bugs, dan user friendly.
                        </p>
                        <div class="divider-custom mx-auto" style="width: 12rem;background-color: #cbd5e0;border-radius: 9999px;border: 0 solid #e2e8f0;height: .25rem;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HeaderWave from '../components/Wave'
import LogoSwiper from '../components/LogoSwiper'
export default {
    components :{
        HeaderWave, LogoSwiper
    }
}
</script>
<style scoped>
.jumbotron {
    border-radius: 0rem;
    position: relative;
    background-color: #0575E6;
    background-image: url('https://santrikoding.com/assets/images/bg-jumbotron.svg'),linear-gradient(45deg,#021B79,#0575E6);
    background-size: cover;
    z-index: 0;
}
</style>
