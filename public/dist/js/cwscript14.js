// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Se usa para obtener datos precisos y comparables.",
					answer: "Instrumentos",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 10
				},
				{
					clue: "Construir modelos",
					answer: "Experimentar",
					position: 2,
					orientation: "down",
					startx: 10,
					starty: 1
				},
				{
					clue: "Hacer plan o proyecto de una acción",
					answer: "Planificar",
					position: 3,
					orientation: "across",
					startx: 1,
					starty: 5
				},
				{
					clue: "Permiten conocer un objetivo, organismo, sistema o evento.",
					answer: "Preguntas",
					position: 4,
					orientation: "down",
					startx: 12,
					starty: 2
				},
				{
					clue: "Modelo que sirve de muestra para sacar otra cosa igual.",
					answer: "Patron",
					position: 5,
					orientation: "across",
					startx: 7,
					starty: 12
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
