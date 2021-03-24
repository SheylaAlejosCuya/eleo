// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Transmutándose, convirtiéndose",
					answer: "Transformandose",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 11
				},
				{
					clue: "Enormes, gigantescos",
					answer: "Monumentales",
					position: 2,
					orientation: "down",
					startx: 15,
					starty: 1
				},
				{
					clue: "Reclamar algo a lo que se cree tener derecho",
					answer: "Reivindicar",
					position: 3,
					orientation: "down",
					startx: 2,
					starty: 1
				},
				{
					clue: "Demostración pública de admiración y respeto",
					answer: "Homenaje",
					position: 4,
					orientation: "down",
					startx: 10,
					starty: 6
				},
				{
					clue: "Ingenuidad, falta de malicia e hipocrecía",
					answer: "Candor",
					position: 5,
					orientation: "down",
					startx: 4,
					starty: 9
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
