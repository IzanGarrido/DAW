/**
 * 
 * @author Izan Garrido Quintana
 * 
 */

// Array asociativo de todos los estados para sacar las coords
let estados = [];
estados['AL'] = "43.09645,-78.39086";
estados['AK'] = "61.21806, -149.90028";
estados['AZ'] = "33.44838,-112.07404";
estados['AR'] = "37.54394,-94.70024";
estados['CA'] = "36.74773,-119.77237";
estados['CO'] = "39.73915,-104.9847";
estados['CT'] = "41.17923,-73.18945";
estados['DE'] = "39.74595,-75.54659";
estados['FL'] = "30.33218,-81.65565";
estados['GA'] = "33.749,-84.38798";
estados['HI'] = "21.39734,-157.97516";
estados['ID'] = "43.46658,-112.03414";
estados['IL'] = "41.76058,-88.32007";
estados['IN'] = "39.76838,-86.15804";
estados['IA'] = "41.60054,-93.60911";
estados['KS'] = "39.11417,-94.62746";
estados['KY'] = "38.25424,-85.75941";
estados['LA'] = "30.22409,-92.01984";
estados['ME'] = "43.65737,-70.2589";
estados['MD'] = "39.29038,-76.61219";
estados['MA'] = "42.35843,-71.05977";
estados['MI'] = "42.8289,-88.19759";
estados['MN'] = "44.97997,-93.26384";
estados['MS'] = "32.29876,-90.18481";
estados['MO'] = "39.09973,-94.57857";
estados['MT'] = "45.78329,-108.50069";
estados['NE'] = "41.25626,-95.94043";
estados['NV'] = "36.17497,-115.13722";
estados['NH'] = "42.76537,-71.46757";
estados['NJ'] = "40.73566,-74.17237";
estados['NM'] = "35.68698,-105.9378";
estados['NY'] = "40.71427,-74.00597";
estados['NC'] = "35.22709,-80.84313";
estados['ND'] = "46.80833,-100.78374";
estados['OH'] = "39.96118,-82.99879";
estados['OK'] = "35.46756,-97.51643";
estados['OR'] = "45.52345,-122.67621";
estados['PA'] = "39.95238,-75.16362";
estados['RI'] = "41.82399,-71.41283";
estados['SC'] = "34.00071,-81.03481";
estados['SD'] = "44.08054,-103.23101";
estados['TN'] = "36.16589,-86.78444";
estados['TX'] = "29.76328,-95.36327";
estados['UT'] = "41.223,-111.97383";
estados['VT'] = "44.47588,-73.21207";
estados['VA'] = "37.55376,-77.46026";
estados['WA'] = "38.89511,-77.03637";
estados['WV'] = "38.34982,-81.63262";
estados['WI'] = "43.07305,-89.40123";
estados['WY'] = "41.13998,-104.82025";

var dataCod;
var title;

// Carga la pagina
document.addEventListener("DOMContentLoaded", function () {
    // Funcion para cuando clickes un estado, se recupere el datacod
    document.addEventListener("click", function (e) {

        const tagName = e.target.tagName;
        // Solo coge el datacod si el tagname es AREA
        if (tagName === 'AREA') {
            dataCod = e.target.dataset.cod;
            title = e.target.title;
            console.log('Data-cod:', dataCod);
            modal();
        }

    });

});

// Funcion para mostar la ventana modal al clickar en un estado de los estados unidos
function modal() {

    // Asigno los id para mostrar el modal y el fondo y les quito la clase oculto
    info();

    let modal = document.getElementById("modal")
    modal.classList.remove("oculto");
    let fondo = document.getElementById("fondo")
    fondo.classList.remove("oculto");



    // Agrego una funcion al elemento fondo, para cuando se clique, se vuelvan a ocultar modal y fondo
    fondo.addEventListener("click", function quitarInfo() {
        modal.className = "oculto"
        fondo.className = "oculto"
    })

}


// Función que te muestra la información especifica del estado
function info() {
    fetch("https://api.weatherusa.net/v1/forecast?q=" + estados[dataCod] + "&daily=0&units=m&maxtime=7h")
        .then(response => response.text())
        .then(data => {

            const json = JSON.parse(data);

            document.getElementById("titulo").innerHTML = title;
            var tabla1 = document.getElementById("tabla1");

            // Buscar y eliminar cualquier tabla previa generada dinámicamente
            let existingTable = tabla1.querySelector("table");
            if (existingTable) {
                tabla1.removeChild(existingTable);
            }
            let table = document.createElement("table");
            tabla1.appendChild(table);
            tiempo = new Date(json[0]["validt"] * 1000).toLocaleDateString('eu', { year: "numeric", month: "long", day: "2-digit" })
            document.getElementById("marca").innerHTML = tiempo;
            for (let i = 1; i < json.length; i++) {
                let tr = document.createElement("tr");
                let td1 = document.createElement("td");
                let td2 = document.createElement("td");
                let td3 = document.createElement("td");
                let td4 = document.createElement("td");
                td1.innerHTML = json[i]["localtime"]
                td2.innerHTML = json[i]["temp"]
                td3.innerHTML = json[i]["wdir_compass"]
                td4.innerHTML = json[i]["wspd"]
                tr.appendChild(td1)
                tr.appendChild(td2)
                tr.appendChild(td3)
                tr.appendChild(td4)
                table.appendChild(tr);

            }

            console.log("hora actual: " + json[0]["localtime"]);
            console.log("Temp: " + json[0]["temp"]);
            console.log("direccion tiempo: " + json[0]["wdir_compass"]);
            console.log("velocidad tiempo: " + json[0]["wspd"]);

        });

        fetch("https://api.weatherusa.net/v1/skycams?q=" + estados[dataCod])
        .then(response => response.text())
        .then(data => {
            const json = JSON.parse(data);
            let divImg = document.getElementById("imagen")
            divImg.innerHTML = ""
            let img = document.createElement("img");
            img.src = json[0]["image"]
            divImg.appendChild(img);



        });

}