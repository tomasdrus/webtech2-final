<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


table: question -> id(int), text(string), type(enum), options_id(int) 0..m, pairs_id(int) 0..m
table: student_answers -> id(int), student_id(int), tests_id(int), rightness(bool)
table: tests -> id(int), qustions_id(int), code(string), time_limit(int)

table: teachers -> id(int), forename(string), surname(string), email(string), password(string)
table: students -> id(int -> ais), forename(string), surname(string)

1. otázky s otvorenou krátkou odpoveďou (body za ich správnosť automaticky priraďuje aplikácia; v prípade zlého vyhodnotenia, učiteľ môže túto odpoveď prebodovať),

2. otázky s výberom správnej odpovede (body za ich správnosť automaticky priraďuje aplikácia) 
table: options -> id(int), option(string), rightness(bool)

3. párovanie správnych odpovedí (body za ich správnosť automaticky priraďuje aplikácia),
table: pairs -> id(int), part_1(string), part_2(string)

4. odpoveď vyžaduje nakreslenie obrázku (body za ich správnosť priraďuje učiteľ),

5. odpoveď vyžaduje napísanie matematického výrazu (body za ich správnosť priraďuje učiteľ).


//listing
Route::get('/teams', 'TeamController@index');

//Create
Route::get('/teams/create', 'TeamController@create');

//Store
Route::post('/teams/store', 'TeamController@store');

//Show
Route::get('/teams/{id}', 'TeamController@show');

//Edit
Route::get('/teams/{id}/edit', 'TeamController@edit');

//Update
Route::put('/teams/{id}/update', 'TeamController@update');

//Delete
Route::delete('/teams/{id}/delete', 'TeamController@delete');