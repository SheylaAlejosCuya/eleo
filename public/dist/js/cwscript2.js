// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Que produce emoción",
					answer: "aaaaaaaaa",
					position: 2,
					orientation: "across",
					startx: 4,
					starty: 2
				},
				{
					clue: "No se interesa por aprender nada",
					answer: "aaaaaaaaa",
					position: 5,
					orientation: "across",
					startx: 11,
					starty: 4
				},
				{
					clue: "Cosa que anima a una persona a actuar",
					answer: "aaaaaaaaaa",
					position: 6,
					orientation: "across",
					startx: 1,
					starty: 5
				},
				{
					clue: "Conjunto de cualidades que tiene una persona",
					answer: "aaaaaaa",
					position: 8,
					orientation: "across",
					startx: 11,
					starty: 7
				},
				{
					clue: "Existencia de los seres",
					answer: "aaaa",
					position: 11,
					orientation: "across",
					startx: 4,
					starty: 8
				},
				{
					clue: "Etapa media en la vida de una persona",
					answer: "aaaaaaaaaaaa",
					position: 13,
					orientation: "across",
					startx: 2,
					starty: 11
				},
				{
					clue: "Rasgos, cualidades propias de una persona",
					answer: "aaaaaaaa",
					position: 15,
					orientation: "across",
					startx: 2,
					starty: 14
				},
				{
					clue: "Que produce bienestar material y descanso",
					answer: "aaaaaaaaaaa",
					position: 1,
					orientation: "down",
					startx: 9,
					starty: 1
				},
				{
					clue: "Falta de cultura",
					answer: "aaaaaaaaa",
					position: 3,
					orientation: "down",
					startx: 13,
					starty: 3
				},
				{
					clue: "Enfermedad que se caracteriza por una profunda tristeza",
					answer: "aaaaaaaaa",
					position: 4,
					orientation: "down",
					startx: 19,
					starty: 3
				},
				{
					clue: "Dicho o hecho poco inteligente",
					answer: "aaaaaaaa",
					position: 7,
					orientation: "down",
					startx: 5,
					starty: 7
				},
				{
					clue: "Que se rebela contra el poder o la autoridad",
					answer: "aaaaaaa",
					position: 9,
					orientation: "down",
					startx: 15,
					starty: 7
				},
				{
					clue: "Aspiración o meta",
					answer: "aaaaa",
					position: 10,
					orientation: "down",
					startx: 2,
					starty: 8
				},
				{
					clue: "En que no hace nada",
					answer: "aaaaaa",
					position: 12,
					orientation: "down",
					startx: 11,
					starty: 10
				},
				{
					clue: "Cualidad de leal",
					answer: "aaaaaaa",
					position: 14,
					orientation: "down",
					startx: 8,
					starty: 13
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
