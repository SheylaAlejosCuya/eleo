// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Indagaciones, averiguaciones",
					answer: "Investigaciones",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 9
				},
				{
					clue: "Vinculado a la electricidad obtenida de la hidráulica, la cual se genera por le movimeinto del agua.",
					answer: "Hidroelectrica",
					position: 2,
					orientation: "down",
					startx: 10,
					starty: 1
				},
				{
					clue: "Permanencia, duración",
					answer: "Estabilidad",
					position: 3,
					orientation: "down",
					startx: 7,
					starty: 4
				},
				{
					clue: "Accidente geográfico que supone una depresión de la superficie de la Tierra.",
					answer: "Cuenca",
					position: 4,
					orientation: "down",
					startx: 2,
					starty: 6
				},
				{
					clue: "Que tiene bosques.",
					answer: "Boscosa",
					position: 5,
					orientation: "across",
					startx: 9,
					starty: 5
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
