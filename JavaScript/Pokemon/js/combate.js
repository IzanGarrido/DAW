const API = "https://pokeapi.co/api/v2/pokemon/";

const app2 = Vue.createApp({
    data() {
        return {
            favoritos: JSON.parse(localStorage.getItem("favoritos")),

            idally: null,
            imgally: null,
            idenemigo: null,
            imgenemigo: null,

            ataquesally: [],
            ataquesenemigo: [],

            beep: null,
            isMusicPlaying: false,
            backgroundMusic: null,

            j1: {
                vida: null,
                defensa: null,
                velocidad: null,
            },
            j2: {
                vida: null,
                defensa: null,
                velocidad: null,
            },

            turno: null,
            primerTurnoDeterminado: false,
            totalesally: 5,
            totalesenemigo: 5,


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
        favoritos1() {
            return this.favoritos[0]

        },
        favoritos2() {
            return this.favoritos[1]
        },
        ataques1() {
            return this.ataquesally
        },
        ataques2() {
            return this.ataquesenemigo
        },

    },

    methods: {
        toggleMusic() {
            this.backgroundMusic.volume = .1
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

        async pokemonenemigo(imagen) {
            const id = imagen.target.id
            const img = imagen.target.src

            const pokemon = await fetch(API + id)
            const data = await pokemon.json()


            if (this.idenemigo == null) {
                imagen.target.parentElement.parentElement.parentElement.classList.add("seleccionado")

                let i = 0;
                move = []
                while (i < 2) {
                    let ataque = Math.floor(Math.random() * data.moves.length)
                    let datamove = await fetch(data.moves[ataque].move.url)
                    let movejson = await datamove.json()

                    if (movejson.power != null && movejson.names && movejson.names.length > 5) {
                        let moveName = movejson.names[5].name;

                        if (!move.includes(moveName)) {
                            move[i] = moveName;
                            this.ataquesenemigo[i] = movejson;
                            i++;
                        }
                    }


                }

                // Guardar stats del Pokémon enemigo
                this.j2.vida = data.stats[0].base_stat;
                this.j2.defensa = data.stats[4].base_stat;
                this.j2.velocidad = data.stats[5].base_stat;

            }
            this.idenemigo = id
            this.imgenemigo = img

            if (this.primerTurnoDeterminado == false) {
                if (this.j1.velocidad > this.j2.velocidad) {
                    this.turno = "aliado";
                } else {
                    this.turno = "enemigo";
                }
            }
            this.primerTurnoDeterminado = true; // Marcar como determinado
            if (this.idally != null && this.idenemigo != null) {

                this.imagenes()

            }

        },

        async pokemonaliado(imagen) {
            const id = imagen.target.id

            const pokemon = await fetch(API + id)
            const data = await pokemon.json()

            const img = data.sprites.back_default

            if (this.idally == null) {
                imagen.target.parentElement.parentElement.parentElement.classList.add("seleccionado")
                let i = 0;
                move = []
                while (i < 2) {
                    let ataque = Math.floor(Math.random() * data.moves.length)
                    let datamove = await fetch(data.moves[ataque].move.url)
                    let movejson = await datamove.json()

                    if (movejson.power != null && movejson.names[5].name) {
                        if (!(move.includes(movejson.names[5].name))) {
                            move[i] = movejson.names[5].name
                            this.ataquesally[i] = movejson
                            i++
                        }

                    }

                }

                // Guardar stats del Pokémon aliado
                this.j1.vida = data.stats[0].base_stat;
                this.j1.defensa = data.stats[4].base_stat;
                this.j1.velocidad = data.stats[5].base_stat;


            }
            this.idally = id
            this.imgally = img

            if (this.primerTurnoDeterminado == false) {
                if (this.j1.velocidad > this.j2.velocidad) {
                    this.turno = "aliado";
                } else {
                    this.turno = "enemigo";
                }
            }
            this.primerTurnoDeterminado = true; // Marcar como determinado

            if (this.idally != null && this.idenemigo != null) {
                this.imagenes()

            }

        },

        imagenes() {
            // Obtengo el div con id "background"
            let escenario = document.getElementById("background");

            // Elimino las imagenes anteriores
            escenario.innerHTML = "";

            if (this.imgally != null) {
                // Creo la imagen del aliado
                let aliado = document.createElement("img");

                aliado.src = this.imgally;
                aliado.style.position = "absolute";
                aliado.style.width = "400px";
                aliado.style.bottom = "-25%";
                aliado.style.left = "0%";
                aliado.style.zIndex = "1";

                escenario.appendChild(aliado);
            }

            if (this.imgenemigo != null) {
                // Creo la imagen del enemigo
                let enemigo = document.createElement("img");

                enemigo.src = this.imgenemigo;
                enemigo.style.position = "absolute";
                enemigo.style.width = "320px";
                enemigo.style.top = "22%";
                enemigo.style.right = "8%";

                escenario.appendChild(enemigo);
            }

        },

        usarAtaque(poder, atacante) {
            let vidaj1 = this.j1.vida
            let vidaj2 = this.j2.vida
            if (atacante == "aliado") {
                if ((vidaj2 -= (poder - this.j2.defensa)) >= this.j2.vida) {
                    this.j2.vida -= 10
                } else if ((vidaj2 -= (poder - this.j2.defensa)) <= 0) {
                    this.j2.vida = 0
                } else {
                    this.j2.vida -= (poder - this.j2.defensa)
                }

            } else {
                if ((vidaj1 -= (poder - this.j1.defensa)) >= this.j1.vida) {
                    this.j1.vida -= 10
                } else if ((vidaj1 -= (poder - this.j1.defensa)) <= 0) {
                    this.j1.vida = 0
                } else {
                    this.j1.vida -= (poder - this.j1.defensa)
                }

            }

            // Si la vida es negativa la pone a 0
            this.j1.vida >= 0 ? this.j1.vida : this.j1.vida = 0
            this.j2.vida >= 0 ? this.j2.vida : this.j2.vida = 0

            this.actualizarvida()

            if (this.j1.vida <= 0) {
                this.matarpokemon('aliado')
                this.cambiarpokemon('aliado')
            } else if (this.j2.vida <= 0) {
                this.matarpokemon('enemigo')
                this.cambiarpokemon('enemigo')
            }

            if (this.turno == "aliado") {
                this.turno = "enemigo"

            } else if (this.turno == "enemigo") {
                this.turno = "aliado"

            }

        },

        actualizarvida() {
            // Selecciona el Pokémon aliado dentro de .left
            let aliado = document.querySelector(`.left [id="${this.idally}"] .barra-container .numero`);
            let aliadobarra = document.querySelector(`.left [id="${this.idally}"] .barra-container .barra`);

            aliadobarra.style.width = parseInt((parseInt(this.j1.vida) * 100) / parseInt(aliado.innerHTML)) + "%";

            // Selecciona el Pokémon enemigo dentro de .right
            let enemigo = document.querySelector(`.right [id="${this.idenemigo}"] .barra-container .numero`);
            let enemigobarra = document.querySelector(`.right [id="${this.idenemigo}"] .barra-container .barra`);

            enemigobarra.style.width = parseInt((parseInt(this.j2.vida) * 100) / parseInt(enemigo.innerHTML)) + "%";
        },

        matarpokemon(jugador) {
            if (jugador == 'aliado') {
                document.querySelector(`.left [id="${this.idally}"] div`).classList.add("muerto")
                this.totalesally--

            } else if (jugador == 'enemigo') {
                document.querySelector(`.right [id="${this.idenemigo}"] div`).classList.add("muerto")
                this.totalesenemigo--
            }
            if (this.turno == "aliado") {
                this.turno = "enemigo"

            } else if (this.turno == "enemigo") {
                this.turno = "aliado"

            }

        },

        cambiarpokemon(jugador) {
            if (jugador == 'aliado') {
                document.querySelector(`.left [id="${this.idally}"]`).classList.remove("seleccionado")
                this.idally = null
                this.imgally = null
                this.j1.vida = null; // Reinicia la vida del Pokémon aliado
                this.j1.defensa = null; // Reinicia la defensa del Pokémon aliado
                this.j1.velocidad = null; // Reinicia la velocidad del Pokémon aliado

            } else if (jugador == 'enemigo') {
                document.querySelector(`.right [id="${this.idenemigo}"]`).classList.remove("seleccionado")
                this.idenemigo = null
                this.imgenemigo = null
                this.j2.vida = null; // Reinicia la vida del Pokémon enemigo
                this.j2.defensa = null; // Reinicia la defensa del Pokémon enemigo
                this.j2.velocidad = null; // Reinicia la velocidad del Pokémon enemigo

            }
            this.cambiarTurno()



            this.imagenes()

        },

        cambiarTurno() {
            if (this.turno === "aliado") {
                this.turno = "enemigo";
            } else if (this.turno === "enemigo") {
                this.turno = "aliado";
            }
        },

    }
})