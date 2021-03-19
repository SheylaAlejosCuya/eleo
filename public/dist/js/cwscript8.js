// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Que se presume o se piensa que puede suceder o llegar a ser real.",
					answer: "Hipotetica",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 10
				},
				{
					clue: "Cosa arcana o muy recóndita, que no se puede comprender o explicar.",
					answer: "MISTERIOSO",
					position: 2,
					orientation: "down",
					startx: 4,
					starty: 1
				},
				{
					clue: "Tormenta grande, especialmente marina, con vientos de extraordinaria fuerza.",
					answer: "Tempestad",
					position: 3,
					orientation: "across",
					startx: 2,
					starty: 1
				},
				{
					clue: "Tempestad, lluvia intensa.",
					answer: "Diluvio",
					position: 4,
					orientation: "down",
					startx: 10,
					starty: 1
				},
				{
					clue: "Vive, habita.",
					answer: "Mora",
					position: 5,
					orientation: "across",
					startx: 2,
					starty: 6
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
