// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Parte de la física que estudia los fenómenos de la atmósfera, la climatología, el viento, la lluvia, los rayos, etc.",
					answer: "Meteorologia",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 1
				},
				{
					clue: "Un cambio en las condiciones de la temperatura ambiental.",
					answer: "Climatico",
					position: 3,
					orientation: "across",
					startx: 4,
					starty: 4
				},
				{
					clue: "Falta de lluvias durante un periodo prolongado de tiempo que produce sequedad en los campos y escasez de agua.",
					answer: "Sequia",
					position: 4,
					orientation: "across",
					startx: 1,
					starty: 11
				},
				{
					clue: "Capacidad para superar experiencias dolorosas o traumáticas.",
					answer: "Resiliencia",
					position: 2,
					orientation: "down",
					startx: 6,
					starty: 1
				},
				{
					clue: "Un lugar o clima muy seco y sin humedad.",
					answer: "Arido",
					position: 5,
					orientation: "down",
					startx: 8,
					starty: 4
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
