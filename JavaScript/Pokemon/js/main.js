const API = "https://pokeapi.co/api/v2/pokemon/";

const app = Vue.createApp({
    data() {
        return {
            pokemons: [],
            jugador: null,
            favoritos: [[], []],
            img: [new Map(), new Map()],
            beep: null,
            isMusicPlaying: false,
            backgroundMusic: null

        };
    },

    mounted() {
        this.backgroundMusic = document.getElementById('background-music');
    
        // Inicializa el beep después de la interacción del usuario
        document.addEventListener('click', () => {
            if (!this.beep) {
                this.beep = new Audio('media/audio/beep.mp3');
            }
        });
    },

    computed: {
        allPokemons() {
            return this.pokemons
        },
        allfavoritos() {
            return this.favoritos[this.jugador - 1]
        },

    },

    methods: {

        toggleMusic() {
            this.backgroundMusic.volume = .4
            if (this.isMusicPlaying) {
                this.backgroundMusic.pause();
            } else {
                this.backgroundMusic.play();
            }
            this.isMusicPlaying = !this.isMusicPlaying;
        },
        sonido() {
            if (this.isMusicPlaying && this.beep) {
                this.beep.currentTime = 0; // Reinicia el sonido si ya estaba reproduciéndose
                this.beep.volume = 0.1; // Ajusta el volumen
                this.beep.play(); // Reproduce el sonido
            }
        },

        // Funcion para mostar la ventana modal al clickar en un estado de los estados unidos
        modal(jugador) {

            let modal = document.getElementById("modal")
            modal.classList.remove("oculto");
            modal.style.display = "flex"
            let fondo = document.getElementById("fondo")
            fondo.classList.remove("oculto");

            // Agrego una funcion al elemento fondo, para cuando se clique, se vuelvan a ocultar modal y fondo
            fondo.addEventListener("click", function quitarInfo() {
                modal.className = "oculto"
                modal.style = "none"
                fondo.className = "oculto"
            })
            this.llamada()
            this.jugador = jugador

            // Esto sirve para cuando clicko el boton de un jugador me quita los estilos de los pokemons seleccionados del otro temporalmente
            if (this.jugador == 1) {
                this.img[1].forEach((value) => {
                    value.classList.remove("seleccionado")
                })
                this.img[0].forEach((value) => {
                    value.classList.add("seleccionado")
                })
            } else {
                this.img[0].forEach((value) => {
                    value.classList.remove("seleccionado")
                })
                this.img[1].forEach((value) => {
                    value.classList.add("seleccionado")
                })
            }



        },

        // Esta funcion hace la llamada a la api
        async llamada() {
            if (this.pokemons.length == 0) {

                for (let i = 1; i <= 151; i++) {
                    const response = await fetch(API + i)
                    const data = await response.json()
                    this.pokemons.push(data)

                }
            }

        },

        // Funcion para elegir los pokemons y gurdarlos en cada equipo
        elegirpokemons(imagen) {
            const id = imagen.target.id;

            if (this.favoritos[this.jugador - 1].length < 5 && !this.favoritos[this.jugador - 1].includes(this.pokemons[id - 1])) {
                this.favoritos[this.jugador - 1].push(this.pokemons[id - 1])

                this.img[this.jugador - 1].set(id, imagen.target.parentElement)
                this.img[this.jugador - 1].get(id).classList.add("seleccionado")
            }


        },

        quitarpokemon(imagen) {
            const id = imagen.target.id;
            if (this.favoritos[this.jugador - 1].includes(this.pokemons[id - 1])) {
                this.favoritos[this.jugador - 1].splice(this.favoritos[this.jugador - 1].indexOf(this.pokemons[id - 1]), 1)
                this.img[this.jugador - 1].get(id).classList.remove("seleccionado")
                this.img[this.jugador - 1].delete(id)

            }
        },

        guardarlocal() {
            localStorage.setItem("favoritos", JSON.stringify(this.favoritos))
        },



    }
})