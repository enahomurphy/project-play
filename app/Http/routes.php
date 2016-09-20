<?php





Route::get('/', function () {
    return view('welcome');
});

Route::resource('/courses', 'CoursesController');
Route::resource('/topics', 'TopicsController');
Route::resource('/topics.subject', 'QuestionsController');