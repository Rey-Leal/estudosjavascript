<html>

<head>
    <title>03 Exercício Lista de Filmes</title>
</head>

<body>
    <div class="container">
        <!-- Sera preenchido com informacoes da API -->
    </div>

    <script>
        // API de filmes mais assistidos
        fetch('https://api.themoviedb.org/3/movie/popular?api_key=506fadb0256c13349acc05dabebf9604&language=en-US&page=1', {
                method: 'GET'
            })
            .then(response => response.json())
            .then(function(json) {
                var container = document.querySelector('.container');

                // Mapeamento e acesso dos resultados 
                json.results.map(function(val) {
                    container.innerHTML += `
                    <div style="cursor:pointer;" class="tituloFilme">
                        ` + val.title + `
                        <div style="display:none;" class="descricaoFilme">
                        Nota:` + val.vote_average + `<br>
                        Sinopse: ` + val.overview + `
                        </div>
                        <hr>
                    </div>`;
                })

                // Iteracao em tela
                var titulos = document.querySelectorAll('.tituloFilme');
                for (var i = 0; i < titulos.length; i++) {
                    titulos[i].addEventListener('click', function(t) {
                        if (t.target.querySelector('.descricaoFilme').style.display == "none") {
                            t.target.querySelector('.descricaoFilme').style.display = "block";
                        } else {
                            t.target.querySelector('.descricaoFilme').style.display = "none";
                        }
                    })
                }
            });
    </script>
</body>

</html>