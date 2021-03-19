// A javascript-enhanced crossword puzzle [c] Jesse Weisbeck, MIT/GPL 
(function($) {
	$(function() {
		// provide crossword entries in an array of objects like the following example
		// Position refers to the numerical order of an entry. Each position can have 
		// two entries: an across entry and a down entry
		var puzzleData = [
			 	{
					clue: "Actividad que realizan las personas durante la infancia",
					answer: "Jugar",
					position: 3,
					orientation: "across",
					startx: 17,
					starty: 2
				},
				{
					clue: "Hacer una pausa en el juego o en el trabajo",
					answer: "Descansar",
					position: 4,
					orientation: "across",
					startx: 10,
					starty: 6
				},
				{
					clue: "Participante de un juego",
					answer: "Jugador",
					position: 7,
					orientation: "across",
					startx: 10,
					starty: 8
				},
				{
					clue: "Actividad que hace pasar el tiempo",
					answer: "Diversion",
					position: 9,
					orientation: "across",
					startx: 10,
					starty: 11
				},
				{
					clue: "Placer que causa risa",
					answer: "Alegria",
					position: 10,
					orientation: "across",
					startx: 7,
					starty: 13
				},
				{
					clue: "Órgano visual que detecta la luz",
					answer: "Ojo",
					position: 12,
					orientation: "across",
					startx: 16,
					starty: 14
				},
				{
					clue: "Imagen del pasado que viene a la memoria",
					answer: "Recuerdo",
					position: 13,
					orientation: "across",
					startx: 4,
					starty: 15
				},
				{
					clue: "Planeta del Sistema Solar donde vivimos",
					answer: "Tierra",
					position: 15,
					orientation: "across",
					startx: 1,
					starty: 18
				},
				{
					clue: "Materia mineral dura y compacta",
					answer: "Piedra",
					position: 1,
					orientation: "down",
					startx: 14,
					starty: 1
				},
				{
					clue: "Destreza de quien apunta acertadamente",
					answer: "Punteria",
					position: 2,
					orientation: "down",
					startx: 18,
					starty: 1
				},
				{
					clue: "Estado de inmovilidad de un cuerpo",
					answer: "Equilibrio",
					position: 5,
					orientation: "down",
					startx: 11,
					starty: 6
				},
				{
					clue: "Iniciador de hacerse sin palabras",
					answer: "Inicia",
					position: 6,
					orientation: "down",
					startx: 7,
					starty: 8
				},
				{
					clue: "Espacio en que se mueven los astros",
					answer: "Cielo",
					position: 8,
					orientation: "down",
					startx: 16,
					starty: 10
				},
				{
					clue: "Capacidad de recordar",
					answer: "Memoria",
					position: 11,
					orientation: "down",
					startx: 5,
					starty: 14
				},
				{
					clue: "Linea larga y delgada que se hace sobre una superficie",
					answer: "Raya",
					position: 14,
					orientation: "down",
					startx: 9,
					starty: 15
				}
			] 
	
		$('#puzzle-wrapper').crossword(puzzleData);
		
	})
	
})(jQuery)
