function mostraInfo(strUF) {
  console.log(strUF);
  if (strUF.length > 0) {
      let xmlHttp = new XMLHttpRequest();
      xmlHttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
              //document.getElementById("resposta").value = this.responseText;
              console.log(this.responseText);
              let cidades = JSON.parse(this.responseText);
              let cities = document.getElementById("cidades");
              //let city = new Option(this.responseText, this.responseText);
              //cities.options.add(city);

              cities.length = 0;
              for (cidade of cidades) {
                  let city = new Option(cidade.nome);

                  cities.options.add(city);
              }
          }
      }
      xmlHttp.open("GET", "http://localhost/ex20_GetCidades.php?estado=" + strUF, true);
      xmlHttp.send();
      console.log("requisição enviada");
  }
}