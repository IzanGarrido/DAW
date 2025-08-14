import Header from "./components/Header"
import Guitarra from "./components/Guitarra"
import { useState, useEffect, useMemo } from "react";
import { db } from "./data/db"

function App() {

  const carritoInicial = () => {
    const localStorageCarrito = localStorage.getItem("carrito");
    return (localStorageCarrito !== null) ? JSON.parse(localStorageCarrito) : [];
  }

  // State
  const [data] = useState(db);
  const [carrito, setCarrito] = useState(carritoInicial ? carritoInicial() : []);

  function anyadirAlCarrito(articulo) {

    const articuloExiste = carrito.findIndex(element => articulo.id === element.id);
    if (articuloExiste >= 0) {
      const copiaCarrito = [...carrito]
      copiaCarrito[articuloExiste].cantidad++
      setCarrito(copiaCarrito)
    } else {
      articulo.cantidad = 1;
      setCarrito(carrito => [...carrito, articulo])

    }

  }

  function quitarDelCarrito(articulo) {

    const articuloExiste = carrito.findIndex(element => articulo.id === element.id);
    if (articuloExiste >= 0) {
      const copiaCarrito = [...carrito]
      copiaCarrito[articuloExiste].cantidad--
      if (copiaCarrito[articuloExiste].cantidad === 0) {
        copiaCarrito.splice(articuloExiste, 1)
      }
      setCarrito(copiaCarrito)
    }

  }
  
  function vaciarCarrito() {
    setCarrito([])
  }

  function eliminarDelCarrito(id) {
    const nuevoCarrito = () => carrito.filter(element => element.id !== id);
    setCarrito(nuevoCarrito)
  }

  useEffect(() => {
    localStorage.setItem("carrito", JSON.stringify(carrito));
  }, [carrito])

  return (
    <>
      <Header
        carrito={carrito}
        eliminarDelCarrito={eliminarDelCarrito}
        anyadirAlCarrito={anyadirAlCarrito}
        quitarDelCarrito={quitarDelCarrito}
        vaciarCarrito={vaciarCarrito}

      />

      <main className="container-xl mt-5">
        <h2 className="text-center">Nuestra Colección</h2>
        <div className="row mt-5">
          {data.map((element) => (
            <Guitarra
              key={element.id}
              guitarraObj={element}
              anyadirAlCarrito={anyadirAlCarrito}
            />
          )
          )}

        </div>
      </main>


      <footer className="bg-dark mt-5 py-5">
        <div className="container-xl">
          <p className="text-white text-center fs-4 mt-4 m-md-0">GuitarLA - Todos los derechos Reservados</p>
        </div>
      </footer>

    </>
  )
}
export default App