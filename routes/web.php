<?php
// Route::redirect('/home', '/admin');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
// Route::get('test', 'TestController@index')->name('test.index');

Route::group(['as' => 'kb.', 'prefix' => 'kb', 'middleware' => ['auth']], function () {
    Route::get('/knowledgebase', 'KnowledgeBaseController@index')->name('knowledge.home');
    Route::get('category/check_slug', 'CategoryController@check_slug')->name('categories.check_slug');
    Route::get('category/{slug}/{category}', 'CategoryController@show')->name('categories.show');
    Route::get('tags/check_slug', 'TagController@check_slug')->name('tags.check_slug');
    Route::get('tags/{slug}/{tag}', 'TagController@show')->name('tags.show');
    Route::get('tag-categories/{slug}/{tag}', 'TagController@show_categories_by_tag')->name('tags.show_categories_by_tag');
    Route::get('articles/check_slug', 'ArticleController@check_slug')->name('articles.check_slug');
    Route::get('articles/{slug}/{article}', 'ArticleController@show')->name('articles.show');
    Route::get('articles', 'ArticleController@index')->name('articles.index');
    Route::get('faq', 'FaqController@index')->name('faq.index');
    Route::get('search', 'SearchController@search')->name('search.search');
    Route::get('select-search', 'SearchController@select_search')->name('search.select_search');
});

Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Route::get('/', 'HomeController@index')->name('home');
    Route::get('/admin', 'AdminController@index')->name('admin.home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Tags
    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagsController');

    // Articles
    Route::delete('articles/destroy', 'ArticlesController@massDestroy')->name('articles.massDestroy');
    Route::resource('articles', 'ArticlesController');

    // Faq Categories
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Questions
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // File Import/Export
    Route::get('file-import-export', 'ImportExportController@fileImportExport')->name('import-export.fileImportExport');
    Route::post('file-import', 'ImportExportController@fileImport')->name('import-export.fileImport');
    Route::get('file-export', 'ImportExportController@fileExport')->name('import-export.fileExport');
    Route::resource('import-export', 'ImportExportController');

    // Media
    Route::get('/media-upload-view', 'MediaController@media_upload_view')->name('media-upload-view');
    Route::get('/media-upload-drag-drop-view', 'MediaController@media_upload_drag_drop_view')->name('media-upload-drag-drop-view');

    Route::get('/media-upload-listing', 'MediaController@media_upload_listing')->name('media-upload-listing');
    Route::get('/media-upload-listing-v2', 'MediaController@media_upload_listing_v2')->name('media-upload-listing-v2');

    //delete media route
    Route::get('/media-upload-delete', 'MediaController@media_upload_delete')->name('media-upload-delete');
    Route::post('/media-upload-submit', 'MediaController@media_upload_submit')->name('media-upload-submit');


    // Disciplinary
    Route::delete('disciplinary/destroy', 'DisciplinaryController@massDestroy')->name('disciplinary.massDestroy');
    Route::resource('disciplinary', 'DisciplinaryController');

    // Appraisal
    Route::delete('appraisal/destroy', 'AppraisalController@massDestroy')->name('appraisal.massDestroy');
    Route::resource('appraisal', 'AppraisalController');

    //Tickets
    Route::get('/tickets', 'TicketController@index')->name("tickets");
    Route::get('/tickets/new-ticket', 'TicketController@create')->name('tickets.create-ticket');
    Route::post('/tickets/new-ticket', 'TicketController@store')->name('tickets.store-ticket');
    Route::get('/tickets/my-tickets', 'TicketController@userTickets')->name('tickets.my-tickets');
    Route::get('/tickets/{ticket_id}', 'TicketController@show')->name('tickets.show-ticket');
    Route::post('/tickets/close/{ticket_id}', 'TicketController@close')->name('tickets.close-ticket');
    Route::post('/comment', 'CommentsController@postComment')->name('tickets.comment');

    // Assignee
    Route::resource('assignee', 'AssigneeController');

    // Custom Survey
    Route::resource('customsurvey', 'CustomSurveyController');
    Route::get('customsurvey/entries', 'CustomSurveyController@show_custom_survey_entries')->name("customsurvey.entries");
    // AgentSurvey
    Route::resource('agetsurvey', 'M2MCurtainSurveyController');
    Route::get('agentsurvey/entries', 'M2MCurtainSurveyController@show_custom_survey_entries')->name("customsurvey.entries");

   //Agent Survey
    Route::resource('agentsurvey', 'AgentSurveyController');
    Route::get('agenturvey/entries', 'AgentSurveyController@show_custom_survey_entries')->name("customsurvey.entries");

    // Call Tracker
    Route::resource('calltracker', 'CallTrackerController');
    //Reports
    Route::get('/report/escalations', 'ReportController@allEscalations')->name("report.escalations");
    Route::get('/report/enquiries', 'ReportController@allEnquiries')->name("report.enquiries");
    Route::get('/report/complaints', 'ReportController@allComplaints')->name("report.complaints");
    Route::get('/report/listall', 'ReportController@allCallEntries')->name("report.listall");
    Route::get('/report/qacallentries', 'ReportController@allQACallEntries')->name("report.qacallentries");
    Route::get('/report/allcovidentries', 'ReportController@allCovidEntries')->name("report.allcovidentries");
    Route::get('/report/listalloodie', 'ReportController@allOodieEntries')->name("report.listalloodie");
    // QA Call Tracker
    Route::resource('qacalltracker', 'QACallTrackerController');

    // Helpdesk Tracker
    Route::resource('helpdesktracker', 'HelpdeskTrackerController');

    // COVID Tracker
    Route::resource('covidtracker', 'MOHCovidHelpdeskTrackerController');
    Route::post('covidtracker/getdata', 'MOHCovidHelpdeskTrackerController@getdata')->name('covidtracker.getdata');

    // Oodie Tracker
    Route::resource('rextracker', 'RexTrackerController');
    Route::post('rextracker/getdata', 'RexTrackerController@getdata')->name('rextracker.getdata');

    // Email Tracker
    Route::resource('emailtracker', 'EmailTrackerController');
    Route::post('emailtracker/getdata', 'EmailTrackerController@getdata')->name('emailtracker.getdata');

    // Spotlight Call Tracker
    Route::resource('spotlightcalltracker', 'SpotlightCallTrackerController');
    Route::post('spotlightcalltracker/getdata', 'SpotlightCallTrackerController@getdata')->name('spotlightcalltracker.getdata');


     // AMS Error Log
    Route::resource('amserrorlog', 'AMSErrorLogController');
    Route::post('amserrorlog/getdata', 'AMSErrorLogController@getdata')->name('amserrorlog.getdata');

        // Admin Tracker
    Route::resource('admintracker', 'AdminTrackerController');
    Route::post('admintracker/getdata', 'AdminTrackerController@getdata')->name('admintracker.getdata');

        //  Escalation Tracker
    Route::resource('escalationtracker', 'EscalationTrackerController');
    Route::post('escalationtracker/getdata', 'EscalationTrackerController@getdata')->name('escalationtracker.getdata');

    //  Market Tracker
    Route::resource('marketingtracker', 'MarketingTrackerController');
    Route::post('marketingtracker/getdata', 'MarketingTrackerController@getdata')->name('marketingtracker.getdata');

    Route::resource('taserrorlog', 'TASErrorLogController');
    Route::post('taserrorlog/getdata', 'TASErrorLogController@getdata')->name('taserrorlog.getdata');

    //show typing test records
    Route::get('/show-typing-test', 'TypingTestRecordsController@show_typing_test')->name('show-typing-test');
    Route::get('/show-typing-test-submit', 'TypingTestRecordsController@show_typing_test_submit')->name('show-typing-test-submit');
    Route::get('/load-menus', 'TypingTestRecordsController@load_menus')->name('load-menus');

    // Quiz
    Route::get('/quizz-loader', 'QuizzController@quizz_loader_view')->name('quizz.loader');
    Route::post('/quizz-loader-submit', 'QuizzController@quizz_loader_submit')->name('quizz.loader-submit');
    Route::get('/quizz-attempt', 'QuizzController@quizz_attempt')->name('quizz.attempt');
    Route::get('/quizz-attempt-answers', 'QuizzController@quizz_attempt_answers')->name('quizz.attempt_answers');

    Route::post('/fj-quizz-attempt-submit', 'QuizzController@quizz_attempt_submit')->name('fj-quizz-attempt-submit');

    Route::get('/user-fj-quizz-summary', 'QuizzController@user_quizz_summary_view')->name('user-fj-quizz-summary-view');

    Route::get('/admin-fj-quizz-summary', 'QuizzController@admin_quizz_summary_view')->name('admin-fj-quizz-summary-view');

    Route::get('/show-leader-board', 'QuizzController@show_leader_board')->name('show-leader-board');
    Route::get('/show-leader-answers', 'QuizzController@show_leader_answers')->name('show_leader_answers');
    Route::get('/show-leader-questions', 'QuizzController@show_leader_questions')->name('show_leader_questions');

    Route::get('/fj-quizz-attempt-selector', 'QuizzController@quizz_attempt_weeks')->name('fj-quizz-attempt-selector');
    Route::get('/fj-quizz-release-answers', 'QuizzController@quizz_release_answers')->name('fj-quizz-release-answers');

});
