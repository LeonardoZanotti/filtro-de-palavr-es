# filtro-de-palavroes
Filtro de palavrões feito em php/laravel

Esse filtro de palavrão foi baseado no filtro: https://github.com/Zeindelf/badwords

Esse filtro analisa um banco de dados de palavras e compara com a mensagem passada, se uma palavra isolada da palavra for igual ao do banco de dados a palavra é substituída por asterísticos de modo que o comprimento da palavra se mantém. Por exemplo: roliço -> "\*\*\*\*\*\*".

## O filtro funciona com:
* Letras maiúsculas e minúsculas: ROLIÇO, roliço, RoLiÇO -> "\*\*\*\*\*\*".

* Letras repetidas: rrrrooliçooo -> "\*\*\*\*\*\*\*\*\*\*\*\*".

* Números como letras: r0l1ç0 -> "\*\*\*\*\*\*"; 4n41 -> "\*\*\*\*".
    * Os números
        "0123456789"
    ao passar pelo filtro tornam-se respectivamente
        "oizeasbtbg"

* Símbolos: ßÔ$t@ -> "\*\*\*\*\*";
    * Os símbolos 
        "ÀÁÂÃÄÅÆÇÈÉÊË!ÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞß@àáâãäåæç&èéêëìíîïðñòóôõöøùúûýýþÿ$°ºª"
    ao passar pelo filtro tornam-se respectivamente
        "aaaaaaaceeeeiiiiidnoooooouuuuuybbaaaaaaaaceeeeeiiiidnoooooouuuyybysooa"

* Palavras isoladas apenas: anal -> "\*\*\*\*"; análise, analgésico -> análise, analgésico;

### Leonardo Zanotti