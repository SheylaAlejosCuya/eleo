// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Publicación de 1955",
					answer: "CIENAÑOSDESOLEDAD",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 12
				},
				{
					clue: "Están incluidas en su obra 'Vivir para contarla'",
					answer: "Memorias",
					position: 2,
					orientation: "down",
					startx: 11,
					starty: 5
				},
				{
					clue: "Aquí nació García Márquez",
					answer: "Colombia",
					position: 3,
					orientation: "down",
					startx: 7,
					starty: 9
				},
				{
					clue: "Lugar donde suceden los hechos principales de 'Cien años de Soledad'",
					answer: "MACONDO",
					position: 4,
					orientation: "across",
					startx: 11,
					starty: 7
				},
				{
					clue: "Hijo mayor de Gabriel",
					answer: "Rodrigo",
					position: 5,
					orientation: "down",
					startx: 17,
					starty: 1
				},
				{
					clue: "Enfermedad que provocó su muerte.",
					answer: "Cancer",
					position: 6,
					orientation: "down",
					startx: 1,
					starty: 9
				},
				{
					clue: "En esta ciudad falleció el 17 de abril de 2014.",
					answer: "Mexico",
					position: 7,
					orientation: "down",
					startx: 13,
					starty: 3
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
