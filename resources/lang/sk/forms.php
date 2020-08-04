<?php

return [

	'createBook' => [
		'title_required' => 'Názov je povinné pole.',
		'title_max' => 'Názov môže mať max 255 znakov.',
		'title_unique' => 'Kniha s rovnakým názvom už existuje.',
		'isbn_required' => 'ISBN je povinné pole.',
		'isbn_max' => 'ISBN môže mať max 30 znakov.',
		'email_required' => 'Email je povinné pole.',
		'email_email' => 'Zadaný email nieje validná emailová adresa.',
		'email_max' => 'Email môže mať max 30 znakov.',
		'author_name_required' => 'Meno autora je povinné pole.',
		'author_name_max' => 'Meno autora môže mať max 30 znakov.',
		'abstract_required' => 'Abstrakt je povinné pole.',
		'abstract_max' => 'Abstrakt môže mať max 255 znakov.',
		'genre_required' => 'Žáner je povinné pole.',
		'genre_max' => 'Žáner môže mať max 30 znakov.',
		'pages_required' => 'Počet strán je povinné pole.',
		'pages_integer' => 'Počet strán nieje číslo.',
		'pages_min' => 'Počet strán nesmie byť menší ako 10. To nieje kniha ale leporelo.',
		'image_image' => 'Vybrané súbory musia byť obrázky.',
		'image_valid' => 'Vložené súbory nie sú validné.',
	]
];