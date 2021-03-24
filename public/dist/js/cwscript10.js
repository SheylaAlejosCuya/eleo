// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Son aquellas actividades que se realzan fuera del horario académico.",
					answer: "Extracurriculares",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 9
				},
				{
					clue: "Adquisición por la práctica de una conducta duradera.",
					answer: "Aprendizaje",
					position: 2,
					orientation: "down",
					startx: 5,
					starty: 1
				},
				{
					clue: "Necesario o esencial para el mantenimiento de la vida, para sostener una cosa.",
					answer: "Motivacion",
					position: 3,
					orientation: "down",
					startx: 10,
					starty: 6
				},
				{
					clue: "Esbozar, extraer",
					answer: "Planear",
					position: 4,
					orientation: "across",
					startx: 5,
					starty: 2
				},
				{
					clue: "Triunfo, victoria",
					answer: "Exito",
					position: 5,
					orientation: "across",
					startx: 6,
					starty: 14
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
