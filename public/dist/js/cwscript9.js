// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Serie de variables constantes, identificables dentro de un conjunto mayor de datos.",
					answer: "Patron",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 7
				},
				{
					clue: "Aumento, ampliación.",
					answer: "Incremento",
					position: 2,
					orientation: "down",
					startx: 10,
					starty: 1
				},
				{
					clue: "Rareza, anormalidad.",
					answer: "Fenomeno",
					position: 3,
					orientation: "across",
					startx: 3,
					starty: 10
				},
				{
					clue: "Gas de efecto invernadero el cual es producido por procesos biológicos en océanos y suelos.",
					answer: "Metano",
					position: 4,
					orientation: "across",
					startx: 6,
					starty: 2
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
