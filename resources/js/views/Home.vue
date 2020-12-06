<template>
    <div style="counter-reset: section;">
        <section class="jumbotron" style="padding-top: 50px">
            <div class="container">
                <div class="text-center" style="margin-top:15vh;">
                    <h1 class="text-white" style="font-family: 'Dosis', sans-serif;font-size: 100px">
                        <!--                        <div v-html="info.title"></div>-->
                        BEM KEMA POLBAN 2019/2020
                    </h1>
                    <!--                    <h5 class="text-white" style="margin-top: 20px;line-height: 35px">{{info.description}}</h5>-->
                    <h5 class="text-white" style="margin-top: 20px;line-height: 35px;font-size: 20px">Poros Juang</h5>
                </div>
            </div>
        </section>
        <header-wave></header-wave>

        <div class="container-fluid" style="background-color: #ffffff;margin-top: -40px">
            <div class="row" style="padding-top: 40px;padding-bottom: 40px">
                <div class="col-md-8 offset-md-2">
                    <div>
                        <h3 class="font-weight-bold text-center judul">TENTANG BEM KEMA POLBAN</h3>
                        <div class="divider-custom mx-auto mb-2"
                             style="width: 12rem;background-color: #192E77;border-radius: 9999px;border: 0 solid #e2e8f0;height: .20rem;"></div>
                        <p style="font-size: 20px;text-align: justify">
                            <strong>Badan Eksekutif Mahasiswa Politeknik Negeri Bandung</strong> adalah badan eksekutor
                            tertinggi di Politeknik Negeri Bandung. Sebagai badan eksekutor yang legal dan tertinggi,
                            BEM memiliki hak dan kewajiban untuk menjadi trigger dalam kegiatan-kegiatan kampus, baik
                            yang masuk kedalam program kerja BEM maupun pergerakan-pergerakan Mahasiswa Politeknik
                            Negeri Bandung lainnya. Pada kepengurusan BEM KEMA POLBAN tahun 2019/2020 ini merupakan
                            kabinet <strong>Poros Juang</strong>.
                        </p>
                    </div>
                    <!--                </div>-->
                    <!--                <div class="col-md-4 offset-md-6">-->
                    <!--                <div>-->
                    <div class="row" style="padding-top: 100px">
                        <div class="col col-md-5" style="padding-top: 100px">
                            <img src="/img/kabinetlogo.png" class="img-fluid">
                        </div>
                        <div class="col col-md-7" style="padding-left: 120px">
                            <div>
                                <h3 class="font-weight-bold judul">VISI</h3>
                                <div class="divider-custom mb-2"
                                     style="width: 3rem;background-color: #192E77;border-radius: 9999px;border: 0 solid #e2e8f0;height: .20rem;"></div>
                                <p style="font-size: 20px">
                                    BEM KEMA POLBAN sebagai <strong>poros pergerakan</strong> yang profesional untuk
                                    Almamater, Bangsa, dan Negara.
                                </p>
                            </div>
                            <div>
                                <h3 class="font-weight-bold judul">MISI</h3>
                                <div class="divider-custom mb-2"
                                     style="width: 3rem;background-color: #192E77;border-radius: 9999px;border: 0 solid #e2e8f0;height: .20rem;"></div>
                                <span style="font-size: 20px">
                            <span class="text-misi">Poros Stabilitas Kabinet</span>
                            <p>Membentuk internal kabinet yang profesional dengan asas kekeluargaan.</p>

                            <span class="text-misi">Poros Pelayanan dan Pengabdian</span>
                            <p>Mengoptimalkan pelayanan advokasi <strong>Mahasiswa Polban</strong> serta pengabdian masyarakat yang partisipatif dan kolaboratif dengan orientasi kemanfaatan.</p>

                            <span class="text-misi">Poros Eskalasi</span>
                            <p>Mengawal serta menyikapi isu luar dan dalam kampus serta mengupayakan pembentukan opini <strong>Mahasiswa Polban</strong> dan Masyarakat.</p>

                            <span class="text-misi">Poros Kolaborasi</span>
                            <p>Menjalin komunikasi serta kerjasama yang berkelanjutan dengan pihak luar dan dalam kampus.</p>

                            <span class="text-misi">Poros Pengembangan</span>
                            <p>Memberikan fasilitas dalam kegiatan keilmuan serta minat dan bakat mahasiswa Polban.</p>
                        </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row" style="padding-top: 40px;padding-bottom: 40px">
                <div class="col-md-12">
                    <div class="text-center">
                        <h3 class="font-weight-bold text-center judul">FILOSOFI LOGO</h3>
                        <div class="divider-custom mx-auto mb-2"
                             style="width: 12rem;background-color: #192E77;border-radius: 9999px;border: 0 solid #e2e8f0;height: .20rem;"></div>
                        <!--                        <logo-swiper></logo-swiper>-->
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top: 40px;padding-bottom: 40px">
                <div class="col-md-8 offset-md-2">
                    <div>
                        <splide :options="primaryOption" class="text-center">
                            <splide-slide>
                                <img class="mb-5 img-fluid" width="400px" src="/img/gerigi.png">
                                <h3>GERIGI</h3>
                                <p>MELAMBANGKAN BEM SEBAGAI RODA PENGGERAK</p>
                            </splide-slide>
                            <splide-slide>
                                <img class="mb-lg-5 img-fluid" width="400px" src="/img/empat_titik.png">
                                <h3>EMPAT TITIK</h3>
                                <p>MELAMBANGKAN EMPAT ELEMEN KEMA POLBAN</p>
                            </splide-slide>
                            <splide-slide>
                                <img class="mb-lg-5 img-fluid" width="400px" src="/img/benang_sari.png">
                                <h3>BENANG SARI</h3>
                                <p>MELAMBANGKAN TRIDHARMA PERGURUAN TINGGI</p>
                            </splide-slide>
                            <splide-slide>
                                <img class="mb-lg-5 img-fluid" width="400px" src="/img/5_kelopak.png">
                                <h3>LIMA KELOPAK</h3>
                                <p>MELAMBANGKAN LIMA PERAN DAN FUNGSI MAHASISWA</p>
                            </splide-slide>
                        </splide>
                    </div>
                    <div class="row" style="padding-top: 100px">
                        <splide splide :options="secondaryOption">
                            <splide-slide>
                                <div class="row">
                                    <div class="col">
                                        <h3 class="font-weight-bold judul" style="padding-top: 130px">KETUA BEM</h3>
                                        <h4>KOMARUDDIN</h4>
                                        <h5>TEKNIK AERONAUTIKA 2018</h5>
                                    </div>
                                    <div class="col">
                                        <img src="/img/komar.png" class="rounded img-fluid">
                                    </div>
                                </div>
                            </splide-slide>
                            <splide-slide>
                                <div class="row">
                                    <div class="col">
                                        <h2 class="font-weight-bold judul" style="padding-top: 130px">WAKIL KETUA BEM</h2>
                                        <h3>ABDILLAH</h3>
                                        <h4>AKUTANSI 2018</h4>
                                    </div>
                                    <div class="col">
                                        <img src="/img/abdil.png" class="rounded img-fluid">
                                    </div>
                                </div>
                            </splide-slide>
                        </splide>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HeaderWave from '../components/Wave'
import LogoSwiper from '../components/LogoSwiper'
import {mapState} from 'vuex';
import {Splide, SplideSlide} from '@splidejs/vue-splide';
import '@splidejs/splide/dist/css/themes/splide-sea-green.min.css';

export default {
    name: "Home",
    data() {
        return {
            primaryOption: {
                type: 'loop',
                rewind: true,
                trimSpace: false,
                focus: 'center',
                width: 1500,
                autoHeight: true,
                perPage: 1,
                padding: {
                    right: '15rem',
                    left: '15rem',
                },
                gap: '1rem',
            },
            secondaryOption: {
                type: 'fade',
                pauseOnHover: true,
                interval: 3000,
                autoplay: true,
                rewind: true,
                width: 1280,
                padding: {
                    right: '7rem',
                    left: '7rem',
                },
                perPage: 1,
                gap: '1rem',
            },
        };
    },
    components: {
        HeaderWave, LogoSwiper, Splide, SplideSlide
    },
    mounted() {
        this.$store.dispatch('loadInfo')
    },
    computed: mapState([
        'info'
    ])
}
</script>
<style scoped>
.text-misi {
    background-color: #775CA9;
    color: #FFFFFF;
    padding: 4px 20px 4px 20px;
    border-radius: .5rem;
}

.text-misi:nth-of-type(odd) {
    background-color: #192E77;
}

.judul {
    font-family: 'Dosis', sans-serif;
    color: #2D4EC2;
}

.jumbotron {
    border-radius: 0rem;
    height: 70vh;
    position: relative;
    background: linear-gradient(rgba(0, 0, 250, 0.25), rgba(125, 250, 250, 0.45)), url('/img/polban2.jpg');
    background-size: cover;
    background-position: center bottom;
    background-repeat: no-repeat;
    background-attachment: fixed;
    z-index: 0;
}
</style>
