<?php





Route::get('/', function () {
    return view('welcome');
});

Route::resource('/courses', 'CoursesController', ['except' => ['create', 'edit']]);
Route::resource('/subjects', 'SubjectsController',['except' => ['create', 'edit']]);
Route::resource('/topics', 'TopicsController', ['except' => ['create', 'edit']]);
Route::resource('/topics.questions', 'TopicQuestionController', [
    'except' => ['create', 'edit'],
    'parameters' => [
        'questions' => 'questionId',
        'topics' => 'topicId'
    ]
]);