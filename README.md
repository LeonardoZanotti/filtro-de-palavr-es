# filtro-de-palavroes
Filtro de palavrões feito em php/laravel

Esse filtro de palavrões foi baseado no filtro: https://github.com/Zeindelf/badwords

Esse filtro analisa um banco de dados de palavras e compara com a mensagem passada, se uma palavra isolada da palavra for igual ao do banco de dados a palavra é substituída por asteríscos de modo que o comprimento da palavra se mantém. Por exemplo: roliço -> "\*\*\*\*\*\*".

## O filtro funciona com:
* Letras maiúsculas e minúsculas: ROLIÇO, roliço, RoLiÇO -> "\*\*\*\*\*\*".

* Letras repetidas: rrrrooliçooo -> "\*\*\*\*\*\*\*\*\*\*\*\*".

* Números como letras: r0l1ç0 -> "\*\*\*\*\*\*"; 4n41 -> "\*\*\*\*".
    * Os números "0123456789" ao passar pelo filtro tornam-se respectivamente "oizeasbtbg"

* Símbolos: ßÔ$t@ -> "\*\*\*\*\*";
    * Os símbolos 
        "ÀÁÂÃÄÅÆÇÈÉÊË!ÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞß@àáâãäåæç&èéêëìíîïðñòóôõöøùúûýýþÿ$°ºª" ao passar pelo filtro tornam-se respectivamente "aaaaaaaceeeeiiiiidnoooooouuuuuybbaaaaaaaaceeeeeiiiidnoooooouuuyybysooa"

* Palavras isoladas apenas: anal -> "\*\*\*\*"; análise, analgésico -> análise, analgésico;

## Como usar no seu projeto
Se você estiver usando laravel, crie um controller. Nele coloque as funções que estão no BadwordsController deste repositório.
Feito isso, basta importar esse controller e chamar a função verify() nos demais controllers onde os textos devem ser filtrados, como mostra o ContatoController deste repositório.

### Leonardo Zanotti