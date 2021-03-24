// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Implementó una extensa red pública de Wi-Fi.",
					answer: "Buenos Aires",
					position: 1,
					orientation: "across",
					startx: 5,
					starty: 1
				},
				{
					clue: "Los precios del peaje están automatizados según el tráfico.",
					answer: "Santiago",
					position: 2,
					orientation: "down",
					startx: 10,
					starty: 1
				},
				{
					clue: "Reconocida por el metro como su sistema de transporte masivo.",
					answer: "Medellin",
					position: 3,
					orientation: "across",
					startx: 3,
					starty: 3
				},
				{
					clue: "Algunos de sus edificios usan tecnología que absorbe la contaminación.",
					answer: "Mexico",
					position: 4,
					orientation: "down",
					startx: 12,
					starty: 3
				},
				{
					clue: "Es considerada la ciudad más ecológica de Latinoamérica según el ranking de Siemens.",
					answer: "Curitiba",
					position: 5,
					orientation: "across",
					startx: 3,
					starty: 6
				},
				{
					clue: "Ciudad inteligente y autosostenible para ser sede olímpica y anfitriona de la Copa Mundial de Fútbol 2014.",
					answer: "Rio de Janeiro",
					position: 6,
					orientation: "down",
					startx: 5,
					starty: 6
				},
				{
					clue: "Tiene el mejor sistema para bicicletas con una amplia conexión al sistema de transporte masivo.",
					answer: "Bogota",
					position: 7,
					orientation: "across",
					startx: 9,
					starty: 8
				},
				{
					clue: "Es una ciudad de emprendimiento cultural y tecnológico",
					answer: "Montevideo",
					position: 8,
					orientation: "across",
					startx: 1,
					starty: 16
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
