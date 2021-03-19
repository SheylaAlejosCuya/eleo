// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Convivencia de diversas culturas",
					answer: "MULTICULTURALIDAD",
					position: 1,
					orientation: "across",
					startx: 1,
					starty: 7
				},
				{
					clue: "Sentimiento de estima y reconocimiento que una persona tiene hacie quien le ha hecho un favor o prestado un servicio, por el cual desea corresponderle.",
					answer: "Gratitud",
					position: 2,
					orientation: "down",
					startx: 12,
					starty: 5
				},
				{
					clue: "Augurio, presentimiento",
					answer: "Presagio",
					position: 3,
					orientation: "down",
					startx: 14,
					starty: 1
				},
				{
					clue: "Igualdad, justicia",
					answer: "Equidad",
					position: 4,
					orientation: "down",
					startx: 7,
					starty: 5
				},
				{
					clue: "Toda actitud, política o tendencia que busque integrar a las personas dentro de la sociedad, buscando que estas contribuyan con sus talentos.",
					answer: "Paz",
					position: 5,
					orientation: "across",
					startx: 14,
					starty: 1
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
