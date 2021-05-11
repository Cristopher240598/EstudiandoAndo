<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function ()
{
    return view('welcome');
});

Illuminate\Support\Facades\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//-------------------------------Administrador
//Tutores
Route::get('/home/activate-tutor', 'TutorController@indexTutorAdministrador')->name('admin.tutores');
//Pendientes
Route::get('/home/activate-tutor/pending/{buscar?}', 'TutorController@tutorPendiente')->name('admin.tutor-pendiente');
Route::get('/home/activate-tutor/add-quit/{idUsuario}/{estatus}', 'TutorController@agregarQuitarTutor')->name('admin.agregar-tutor');
//Activo
Route::get('/home/activate-tutor/active/{buscar?}', 'TutorController@tutorActivo')->name('admin.tutor-activo');
Route::get('/home/activate-tutor/desactivate/{idUsuario}', 'TutorController@desactivarTutor')->name('admin.desactivar-tutor');
//Eliminado
Route::get('/home/activate-tutor/removed/{buscar?}', 'TutorController@tutorEliminado')->name('admin.tutor-eliminado');
Route::get('/home/activate-tutor/activate/{idUsuario}', 'TutorController@activarTutor')->name('admin.activar-tutor');
Route::get('/home/activate-tutor/delete/{id}', 'TutorController@destroy')->name('admin.eliminar-tutor');

//Actividades
Route::get('/home/activities', 'TutorController@indexAdministrador')->name('admin.actividades');
//Actividades tutor
Route::get('/home/activities-tutor/{schoolGrade}', 'ActividadTutorController@indexAdministrador')->name('admin.actividades-tutor');
Route::get('/home/activity-tutor/image/{filename}', 'ActividadTutorController@getImage')->name('admin.actividad-tutor-imagen');
Route::get('/home/activity-tutor/file/{filename}', 'ActividadTutorController@getFile')->name('admin.actividad-tutor-archivo');
Route::get('/home/activity-tutor/create', 'ActividadTutorController@create')->name('admin.crear-actividad-tutor');
Route::get('/home/activity-tutor/edit/{id}', 'ActividadTutorController@edit')->name('admin.editar-actividad-tutor');
Route::post('/home/activity-tutor/update/save/{idActividad}/{idPregunta}', 'ActividadTutorController@update')->name('admin.actualizar-actividad-tutor');
Route::post('/home/activity-tutor/create/save', 'ActividadTutorController@store')->name('admin.guardar-actividad-tutor');
Route::get('/home/activity-tutor/delete/{id}', 'ActividadTutorController@destroy')->name('admin.eliminar-actividad-tutor');
Route::get('/home/activity-tutor/activity/{id}', 'ActividadTutorController@showAdministrador')->name('admin.ver-actividad-tutor');
//Actividades tutorado
Route::get('/home/activities-student/{schoolGrade}', 'ActividadTutoradoController@indexAdministrador')->name('admin.actividades-tutorado');
Route::get('/home/activity-student/image/{filename}', 'ActividadTutoradoController@getImage')->name('admin.actividad-tutorado-imagen');
Route::get('/home/activity-student/file/{filename}', 'ActividadTutoradoController@getFile')->name('admin.actividad-tutorado-archivo');
Route::get('/home/activity-student', 'ActividadTutoradoController@create')->name('admin.crear-actividad-tutorado');
Route::get('/home/activity-student', 'ActividadTutoradoController@create')->name('admin.crear-actividad-tutorado');
Route::post('/home/activity-student/create/save', 'ActividadTutoradoController@store')->name('admin.guardar-actividad-tutorado');
Route::get('/home/activity-student/activity/{id}', 'ActividadTutoradoController@showAdministrador')->name('admin.ver-actividad-tutorado');
Route::get('/home/activity-student/activity/edit/{id}', 'ActividadTutoradoController@edit')->name('admin.editar-actividad-tutorado');
Route::get('/home/activity-student/delete/{id}', 'ActividadTutoradoController@destroy')->name('admin.eliminar-actividad-tutorado');
Route::post('/home/activity-student/update/save/{idActividad}/{idPregunta}', 'ActividadTutoradoController@update')->name('admin.actualizar-actividad-tutorado');

//Sugerencias/comentarios
Route::get('/home/suggestions-comments', 'SugerenciaComentarioController@indexAdministrador')->name('admin.sug-com');
Route::get('/home/suggestion-comment/delete/{id}', 'SugerenciaComentarioController@destroy')->name('admin.eliminar-sug-com');

//Grado escolar
Route::get('/home/school-grades/{buscar?}', 'GradoEscolarController@indexAdministrador')->name('admin.grado-escolar');
Route::get('/home/school-grade/create', 'GradoEscolarController@create')->name('admin.crear-grado');
Route::post('/home/school-grade/create/save', 'GradoEscolarController@store')->name('admin.guardar-grado');
Route::get('/home/school-grade/delete/{id}', 'GradoEscolarController@destroy')->name('admin.eliminar-grado');
Route::get('/home/school-grade/edit/{id}', 'GradoEscolarController@edit')->name('admin.editar-grado');
Route::post('/home/school-grade/update/save/{id}', 'GradoEscolarController@update')->name('admin.actualizar-grado');

//-------------------------------Tutor
//Perfil
Route::get('/profile', 'TutorController@edit')->name('tutor.modificar-perfil');
Route::post('/profile/save', 'TutorController@update')->name('tutor.actualizar-perfil');
Route::post('/profile/password/save', 'TutorController@updatePassword')->name('tutor.actualizar-contrasenia');

//Tutorado
Route::get('/students', 'TutoradoController@indexTutor')->name('tutor.tutorados');
Route::get('/student/create', 'TutoradoController@create')->name('tutor.crear-tutorado');
Route::post('/student/create/save', 'TutoradoController@store')->name('tutor.guardar-tutorado');
Route::get('/student/delete/{id}', 'TutoradoController@destroy')->name('tutor.eliminar-tutorado');
Route::get('/student/edit/{id}', 'TutoradoController@edit')->name('tutor.editar-tutorado');
Route::post('/student/update/save/{idUsuario}/{idTutorado}', 'TutoradoController@update')->name('tutor.actualizar-tutorado');
Route::post('/student/password/save/{idUsuario}', 'TutoradoController@updatePassword')->name('tutor.actualizar-constrasenia-tutorado');

//Actividades
//Tutor
Route::get('/tutor-activities', 'AsignacionTutorController@index')->name('tutor.actividades');
Route::get('/tutor-activities/activity/{id}', 'ActividadTutorController@show')->name('tutor.actividad');
Route::get('/tutor-activities/activity-finished/{id}', 'ActividadTutorController@showFinished')->name('tutor.actividad-terminada');
//Tutorado
Route::get('/students/activities-student/{idTutorado}', 'AsignacionTutoradoController@indexTutor')->name('tutor.actividades-tutorado');
Route::get('/students/activities-student/activity/{id}', 'ActividadTutoradoController@showTutor')->name('tutor.actividad-tutorado');
Route::get('/students/activities-student/activity-finished/{id}/{idTutorado}', 'ActividadTutoradoController@showFinishedTutor')->name('tutor.respuesta-actividad-tutorado');

//Respuestas
Route::post('/tutor-activities/answers/{idActividad}','RespuestaTutorController@store')->name('tutor.respuesta-actividad');

//Foros
Route::get('/forums', 'TemaController@index')->name('tutor.foros-principal');
Route::get('/forum/{id}', 'TemaController@show')->name('tutor.foro');
Route::get('/forum/delete/{id}', 'TemaController@destroy')->name('tutor.eliminar-foro');
//Comentarios
Route::post('/forum/commentary/save/{idTema}', 'ComentarioController@store')->name('tutor.guardar-comentario');

//Mis foros
Route::get('/forums/my/{buscar?}', 'TemaController@indexMyForums')->name('tutor.mis-foros');
Route::get('/forum/my/create', 'TemaController@create')->name('tutor.crear-foro');
Route::post('/forum/my/create/save', 'TemaController@store')->name('tutor.guardar-foro');
//Foros
Route::get('/forums/forums/{buscar?}', 'TemaController@indexForums')->name('tutor.foros');

//Sugerencias/comentarios
Route::get('/suggestions-comments', 'SugerenciaComentarioController@index')->name('tutor.sug-com');
Route::post('/suggestion-comment/create/save', 'SugerenciaComentarioController@store')->name('tutor.guardar-sug-com');

//-------------------------------Tutorado
Route::get('/student-activities', 'AsignacionTutoradoController@index')->name('tutorado.actividades');
Route::get('/student-activities/activity/{id}', 'ActividadTutoradoController@show')->name('tutorado.actividad');
Route::get('/student-activities/activity-finished/{id}', 'ActividadTutoradoController@showFinished')->name('tutorado.actividad-terminada');

//Respuestas
Route::post('/student-activities/answers/{idActividad}','RespuestaTutoradoController@store')->name('tutorado.respuesta-actividad');
