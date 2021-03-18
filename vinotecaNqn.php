<?php

/******************************************
DIAZ AIMAR, FEDERICO; FAI-2859
******************************************/

/* REPOSITORIO: 

https://github.com/diazAimar/phpTrabajoRepasoIPOO.git


Realizar el diseño y la correspondiente implementación en PHP de un script vinotecaNqn.php del siguiente enunciado:

Dado una estructura de arreglos asociativos, donde cada posición del arreglo se corresponde con una variedad de vino (malbec, cabernet Sauvignon, Merlot) y se almacena la siguiente información: variedad, cantidad de botellas, año de producción, precio por unidad:

Implementar una función que reciba un arreglo con las características  mencionadas y retorne  un arreglo que por variedad de vino guarde la cantidad total de botellas y el precio promedio.

Implementar una función main() que cree un arreglo con las características mencionadas, invoque a la función implementada en 1 y visualice su resultado

Subir a su cuenta GitHub la resolución del Trabajo Practico de Repaso.
Fecha de entrega 19/03/2021 */

/**
*   genera un arreglo con los vinos y su informacion.
*   @return array
*/
function cargarVinos() {
    $vinos = [
        "Malbec" => [
            "variedad" => [
                "Dulce", "Semidulce", "Seco"
            ],
            "cantidadStock" => [
                9, 25, 42
            ],
            "añoDeProduccion" => [
                2014, 2016, 2020
            ],
            "precio" => [
                2499, 2099, 1799
            ]
        ],
        "Cabernet" => [
            "variedad" => [
                "Dulce", "Semidulce", "Seco"
            ],
            "cantidadStock" => [
                3, 15, 22
            ],
            "añoDeProduccion" => [
                2016, 2018, 2021
            ],
            "precio" => [
                1999, 1599, 1299
            ]
        ],
        "Merlot" => [
            "variedad" => [
                "Dulce", "Semidulce", "Seco"
            ],
            "cantidadStock" => [
                9, 5, 2
            ],
            "añoDeProduccion" => [
                2014, 2016, 2020
            ],
            "precio" => [
                2499, 2299, 1799
            ]
        ]
    ];
    return $vinos;
}


/**
*   recibe un arreglo de vinos y retornaun arreglo con la variedad de vino, su cantidad de botellas total, y el precio promedio.
*   @param array $catalogoVinos
*   @return array
*/
function cantidadYPromedioVinos($catalogoVinos){
    $nuevoArray = array();
    for($i = 0; $i < count($catalogoVinos); $i++){
        $j = key($catalogoVinos);
        $precioPromedio = 0;
        for ($k=0; $k<count($catalogoVinos[$j]["precio"]); $k++) {
            $precioPromedio += round($catalogoVinos[$j]["precio"][$k] * $catalogoVinos[$j]["cantidadStock"][$k]/array_sum($catalogoVinos[$j]["cantidadStock"]), 2);
        }
        $nuevoArray[$j] = ["precioPromedio" => $precioPromedio,
        "totalVinos" => array_sum($catalogoVinos[$j]["cantidadStock"]),
        ];
        next($catalogoVinos);
    }
    reset($catalogoVinos);
    return $nuevoArray;
}


/**
*   invoca a las funciones cargarVinos() y cantidadYPromedioVinos() e imprime por pantalla la informacion obtenida en la segunda funcion. 
*/
function main() {
    $vinos = cargarVinos();
    $cantYPromedioVinos = cantidadYPromedioVinos($vinos);
    echo "\n\033[01;31m Cantidad de vinos y promedio\033[0m\n\n";
    for ($i = 0; $i < count($cantYPromedioVinos); $i++) {
        $j = key($cantYPromedioVinos);
        echo " 🍷 " . $j . "\n";
        echo " 🍾 Cantidad total de botellas: " . $cantYPromedioVinos[$j]["totalVinos"] . "\n";
        echo " 💵 Precio promedio: " . $cantYPromedioVinos[$j]["precioPromedio"] . "\n\n";
        next($cantYPromedioVinos);
    }
}

main();