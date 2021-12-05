function vytvorMatici(){

    var radku = document.getElementById("radku").value;
    var sloupcu = document.getElementById("sloupcu").value;
    var generuj = document.getElementById("generator").value * 1 + 1;
    if (radku < 1 || sloupcu < 1){
      alert ("Zadejte počet řádků a počet sloupců");
      return false;
    }

    var result = [];
    document.getElementById("matice").innerHTML = "<table><tbody id=\"tabulka\"></tbody></table>";
    for (var i = 0 ; i < radku; i++) {
        result[i] = [];
        for (var j = 0; j < sloupcu; j++) {
            result[i][j] = (Math.floor(Math.random() * generuj));
        }
    }

    var minRow = result.map(function(row){ return Math.min.apply(Math, row); });
    var min = Math.min.apply(null, minRow);
    var maxRow = result.map(function(row){ return Math.max.apply(Math, row); });
    var max = Math.max.apply(null, maxRow);

    for (var i = 0 ; i < radku; i++) {
        document.getElementById("tabulka").innerHTML += "<tr id=\"radek" + i + "\"></tr>";
        for (var j = 0; j < sloupcu; j++) {
            document.getElementById("radek" + i).innerHTML += "<td id=\"radek" + i + "_sloupec" + j + "\">" + result[i][j] + "</td>";
            if (result[i][j] == min) document.getElementById("radek" + i + "_sloupec" + j).className = "min";
            if (result[i][j] == max) document.getElementById("radek" + i + "_sloupec" + j).className = "max";
        }
    }

    document.getElementById("zapati").className = "pozadi";
    document.getElementById("zapati").innerHTML = "<div>Minimální hodnota: <strong>" + min + "</strong></div><div>Maximální hodnota: <strong>" + max + "</strong></div>";

}