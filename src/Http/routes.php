<?php
/**
 * Created by RAPIDE Internet.
 * User: heppi_000
 * Date: 24-4-2015
 * Time: 14:48
 */

Route::get('/', [
    'as' => 'base',
    function () {
        Session::flash('', ''); // work around laravel bug if there is no session yet
        Session::reflash();

        return Redirect::to(Config::get('website.home', '/home'));
    }
]);

Route::get('/locale/{language}/update', [
    'as'   => 'admin.pages.update_lang',
    'uses' => 'PagesController@updateActiveLanguage'
]);

Route::get('ajax/gettemplate/{name}', function ($name) {
    return Exposia\Navigation\Facades\TemplateParser::parseForInput($name);
});

Route::get('{slug}', [
    'as'   => 'page.show',
    'uses' => 'PagesController@show'
]);

Route::group(['prefix' => 'admin'], function () {
    Route::post('navigations/{id}/format',
        ['as' => 'admin.navigations.save-sequence', 'uses' => 'NavigationsController@saveSequence']);

    Route::get('pages/{id}/{language}/edit', [
        'as'   => 'admin.translations.edit',
        'uses' => 'PageTranslationsController@edit'
    ]);

    Route::put('pages/{id}/{language}', [
        'as'   => 'admin.translations.update',
        'uses' => 'PageTranslationsController@update'
    ]);

    Route::resource('pages', 'PagesController', ['except' => 'show']);
    Route::resource('navigations', 'NavigationsController');
});