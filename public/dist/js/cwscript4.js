// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "16 474 votos",
					answer: "Retablo",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 4
				},
				{
					clue: "11 404 votos",
					answer: "Cantuta",
					position: 2,
					orientation: "down",
					startx: 3,
					starty: 1
				},
				{
					clue: "22 889 votos",
					answer: "Bandera",
					position: 3,
					orientation: "across",
					startx: 2,
					starty: 7
				},
				{
					clue: "20 228 votos",
					answer: "Porres",
					position: 4,
					orientation: "down",
					startx: 1,
					starty: 1
				},
				{
					clue: "13 290 votos",
					answer: "Plata",
					position: 5,
					orientation: "down",
					startx: 8,
					starty: 5
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
