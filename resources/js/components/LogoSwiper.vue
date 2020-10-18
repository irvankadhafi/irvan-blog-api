<template>
    <div>
        <section class="carousel">
            <div class="carousel__container">
                <div class="carousel--item">
                    <img
                        class="carousel--item__img"
                        src="https://images.pexels.com/photos/1200450/pexels-photo-1200450.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt="item"
                    />

                    <div class="carousel--item__details">
                        <div>

                        </div>

                        <p class="carousel--item__details--title">Titulo provisional</p>
                        <p class="carousel--item__details--subtitle">
                            2020 16+ 114 Minutos
                        </p>
                    </div>
                </div>
                <div class="carousel--item">
                    <img
                        class="carousel--item__img"
                        src="https://images.pexels.com/photos/1200450/pexels-photo-1200450.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt="item"
                    />
                    <div class="carousel--item__details">
                        <div>

                        </div>
                        <p class="carousel--item__details--title">Titulo provisional</p>
                        <p class="carousel--item__details--subtitle">
                            2020 16+ 114 Minutos
                        </p>
                    </div>
                </div>
                <div class="carousel--item">
                    <img
                        class="carousel--item__img"
                        src="https://images.pexels.com/photos/1200450/pexels-photo-1200450.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt="item"
                    />
                    <div class="carousel--item__details">
                        <div>

                        </div>
                        <p class="carousel--item__details--title">Titulo provisional</p>
                        <p class="carousel--item__details--subtitle">
                            2020 16+ 114 Minutos
                        </p>
                    </div>
                </div>
                <div class="carousel--item">
                    <img
                        class="carousel--item__img"
                        src="https://images.pexels.com/photos/1200450/pexels-photo-1200450.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt="item"
                    />
                    <div class="carousel--item__details">
                        <div>

                        </div>
                        <p class="carousel--item__details--title">Titulo provisional</p>
                        <p class="carousel--item__details--subtitle">
                            2020 16+ 114 Minutos
                        </p>
                    </div>
                </div>
                <div class="carousel--item">
                    <img
                        class="carousel--item__img"
                        src="https://images.pexels.com/photos/1200450/pexels-photo-1200450.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt="item"
                    />
                    <div class="carousel--item__details">
                        <div>

                        </div>
                        <p class="carousel--item__details--title">Titulo provisional</p>
                        <p class="carousel--item__details--subtitle">
                            2020 16+ 114 Minutos
                        </p>
                    </div>
                </div>
                <div class="carousel--item">
                    <img
                        class="carousel--item__img"
                        src="https://images.pexels.com/photos/1200450/pexels-photo-1200450.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt="item"
                    />
                    <div class="carousel--item__details">
                        <div>

                        </div>
                        <p class="carousel--item__details--title">Titulo provisional</p>
                        <p class="carousel--item__details--subtitle">
                            2020 16+ 114 Minutos
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'LogoSwiper',
}
</script>
<style scoped>
/* Carrousel */
.carousel {
    position: relative;
    overflow-x: hidden;
}

.carousel__container {
    padding-bottom: 10px;
    width: 100%;
    margin: 70px auto;
    white-space: nowrap;
}

.carousel--item {
    display: inline-block;
    position: relative;
    margin: 10px 8px;
    width: 200px;
    height: 250px;
    border-radius: 20px;
    background-color: lightblue;
    overflow: hidden;
    cursor: pointer;
    transition: 350ms all;
    transform-origin: center left;
}

.carousel--item:hover ~ .carousel--item {
    transform: translate3d(100px, 0, 0);
}
.carousel__container:hover .carousel--item {
    opacity: 0.3;
}

.carousel__container:hover .carousel--item:hover {
    transform: scale(1.2, 1.2);
    opacity: 1;
}

.carousel--item:hover .carousel--item__details {
    opacity: 1;
}

.carousel--item__img {
    width: 200px;
    height: 250px;
    object-fit: cover;
}
.carousel--item__details {
    padding: 10px;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    font-size: 10px;
    background: linear-gradient(83deg, rgba(244, 67, 54, 0.8) 0%, rgba(255, 87, 34, 0.1) 100%);
    opacity: 0;
    transition: 350ms opacity;
}
.carousel--item__details img {
    margin: 0 5px;
    width: 20px;
}


@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
</style>
