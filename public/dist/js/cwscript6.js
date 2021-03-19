// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Mejor resultado o puntuación más alta conseguida por una persona en atletismo.",
					answer: "Record",
					position: 1,
					orientation: "down",
					startx: 16,
					starty: 1
				},
				{
					clue: "Pena establecida para el que infringe una ley o una norma legal.",
					answer: "Sancion",
					position: 2,
					orientation: "down",
					startx: 13,
					starty: 2
				},
				{
					clue: "Dejado atrás por avanzar a un ritmo más lento que los demás.",
					answer: "Rezagada",
					position: 5,
					orientation: "down",
					startx: 8,
					starty: 7
				},
				{
					clue: "Reunir a un grupo de gente para una actividad o un fin determinados.",
					answer: "Reclutar",
					position: 3,
					orientation: "across",
					startx: 7,
					starty: 3
				},
				{
					clue: "Causar una intensa impresión emocional o un gran desconcierto.",
					answer: "Impactar",
					position: 4,
					orientation: "across",
					startx: 9,
					starty: 5
				},
				{
					clue: "Unidad militar de infantería que forma parte de una sección y está mandada por un sargento, un cabo.",
					answer: "Peloton",
					position: 6,
					orientation: "across",
					startx: 7,
					starty: 8
				},
				{
					clue: "Costumbre o hábito adquirido de hacer algo de un modo determinado.",
					answer: "Rutina",
					position: 7,
					orientation: "across",
					startx: 3,
					starty: 10
				},
				{
					clue: "Que sirve para descubrir o impedir el uso de sustancias excitantes o estimulantes prohibidas en deportes.",
					answer: "Antidopaje",
					position: 8,
					orientation: "across",
					startx: 1,
					starty: 14
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
