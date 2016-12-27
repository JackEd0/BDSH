<?php

Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::get('/', ['as' => 'home', 'uses' => 'Controller@index']);
    Route::get('/home', ['as' => 'toShs', 'uses' => 'Controller@shsHome']);

    Route::get('users/activation/{id}', ['as' => 'user.activate', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'Auth\AuthController@activateUser']);
    Route::get('profile/{id}', ['as' => 'users.profile', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'UserController@userProfile']);
    Route::get('usersEditAccess/{id}', ['as' => 'users.editAccess', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@editUserAccess']);
    Route::get('users/{inactiveButton}', ['as' => 'users.list', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@userList']);

    Route::post('editProfile/{id}', ['as' => 'updateProfile', 'uses' => 'UserController@updateProfile']);
    Route::post('editPassword/{id}', ['as' => 'updatePassword', 'uses' => 'UserController@updatePassword']);
    Route::post('editUserType/{id}', ['as' => 'editUserType', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@editUserType']);
    Route::get('deactivateUser/{id}', ['as' => 'user.deactivate', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'UserController@deactivateUser']);

    Route::get('searchHome', ['as' => 'search.searchHome', 'uses' => 'SearchController@search']);
    Route::post('searchHome', ['as' => 'search', 'uses' => 'SearchController@search']);

    Route::get('searchHistory', ['as' => 'search.searchHistory', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'SearchController@searchHistory']);
    Route::get('searchHistory/delete', ['as' => 'search.deleteAllHistory', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'SearchController@deleteAllHistory']);
    Route::get('searchDeleteHistory/{startDate}/{endDate}', ['as' => 'search.deleteHistory', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'SearchController@deleteHistory']);
    Route::get('searchViewHistory/{startDate}/{endDate}', ['as' => 'search.viewHistory', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'SearchController@viewHistory']);

    Route::get('transactionList', ['as' => 'transactionAdmin.transactionList', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'TransactionAdminController@transactionList']);
    Route::get('transactionView/{id}', ['as' => 'transactionAdmin.transactionView', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'TransactionAdminController@transactionView']);

    Route::post('orderAdminAccept/{id}', ['as' => 'transactionAdmin.accept', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'TransactionAdminController@acceptTransaction']);
    Route::post('orderAdminRefuse/{id}', ['as' => 'transactionAdmin.refuse', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'TransactionAdminController@refuseTransaction']);
    Route::post('orderAdminPay/{id}', ['as' => 'transactionAdmin.pay', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'TransactionAdminController@payTransaction']);

    Route::get('addCollection', ['as' => 'collection.add', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CollectionController@addCollection']);
    Route::get('Collection', ['as' => 'collection.List', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CollectionController@collectionList']);
    Route::post('addCollection', ['as' => 'collection.create', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CollectionController@create']);
    Route::post('editCollection/{id}', ['as' => 'collection.edit', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CollectionController@edit']);
    Route::get('disableCollection/{id}', ['as' => 'collection.disable', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CollectionController@disable']);
    Route::get('activateCollection/{id}', ['as' => 'collection.activate', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CollectionController@activate']);
    Route::get('collectionEdition/{id}', ['as' => 'collection.Edition', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CollectionController@collectionEdition']);

    Route::get('licence', ['as' => 'licence.List', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'LicenceController@licencesList']);
    Route::get('licenceEdition/{id}', ['as' => 'licence.Edit', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'LicenceController@editLicence']);
    Route::post('addLicence', ['as' => 'licence.Add', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'LicenceController@addLicence']);

    Route::get('fees', ['as' => 'fees.editionFees', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'LicenceFeeController@editionFees']);
    Route::post('fees', ['as' => 'fees.insertFees', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'LicenceFeeController@insertFees']);

    Route::get('parameter', ['as' => 'externalParameter.editionParameter', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ExternalParameterController@editionParameter']);
    Route::post('parameter', ['as' => 'externalParameter.insertParameter', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ExternalParameterController@insertParameter']);

    Route::get('addCard', ['as' => 'cards.add', 'middleware' => ['auth', 'verify.access.permission:2'], 'uses' => 'CardController@addCard']);
    Route::post('createCard', ['as' => 'cards.create', 'middleware' => ['auth', 'verify.access.permission:2'], 'uses' => 'CardController@create']);
    Route::get('getCardTypeAttribute/{cardTypeId}', ['as' => 'cards.getCardTypeAttribute', 'middleware' => ['auth', 'verify.access.permission:2'], 'uses' => 'CardController@getCardTypeAttribute']);
    Route::get('cards/edit/{id}', ['as' => 'cards.edit', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@goToCardEditView']);
    Route::post('cards/update/{id}', ['as' => 'updateCard', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@updateCard']);
    Route::get('cards/delete/{id}', ['as' => 'deleteCard', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@deleteCard']);
    Route::post('addDoc', ['as' => 'cards.addDoc', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardController@addDoc']);
    Route::get('cards/view/{id}', ['as' => 'cards.view', 'uses' => 'CardController@goToCardView']);
    Route::get('addCardAttribute', ['as' => 'cards.addAttribute', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardAttributeController@addCardAttribute']);
    Route::post('addCardAttribute', ['as' => 'createCardAttribute', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardAttributeController@createCardAttribute']);
    Route::get('editCardAttribute/{id}/{nameFr}/{nameEn}/{hideIfEmpty}/{userPermitLevel}', ['as' => 'editCardAttribute', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardAttributeController@editCardAttribute']);
    Route::get('deleteCardAttribute/{attributeId}/{cardTypeId}', ['as' => 'deleteCardAttribute', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardAttributeController@deleteCardAttribute']);
    Route::get('orderCardAttribute/{attributeId}/{requestType}/{cardTypeId}', ['as' => 'orderCardAttribute', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'CardAttributeController@orderCardAttribute']);

    Route::get('importDocument', ['as' => 'document.import', 'uses' => 'DocumentController@importDocuments']);
    Route::get('images/{collection}/{filename}', 'DocumentController@getImage');
    Route::get('downloadImage/{collection}/{filename}', 'DocumentController@downloadImage');
    Route::get('recordDownload/{comment}/{collection}/{filename}', ['as' => 'document.reportDownload', 'uses' => 'DocumentController@recordDownload']);

    Route::get('basket', ['as' => 'basket.visualise', 'uses' => 'BasketController@visualise']);

    Route::get('report/transactions', ['as' => 'report.transaction', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@reportTransactionView']);
    Route::get('report/generateFastReport/transactions/{periodType}', ['as' => 'report.generateFastReportTransactions', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateFastReportTransactions']);
    Route::get('report/generateSpecificReport/transactions/{startDate}/{endDate}', ['as' => 'report.generateSpecificReportTransactions', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateSpecificReportTransactions']);
    Route::get('report/downloads', ['as' => 'report.download', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@reportDownloadView']);
    Route::get('report/generateFastReport/downloads/{periodType}', ['as' => 'report.generateFastReportDownloads', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateFastReportDownloads']);
    Route::get('report/generateSpecificReport/downloads/{startDate}/{endDate}', ['as' => 'report.generateSpecificReportDownloads', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateSpecificReportDownloads']);

    Route::get('cookie/set/{id}', 'CookieController@setCookie');
    Route::post('transaction', ['as' => 'basket.transaction', 'uses' => 'BasketController@transaction']);

    Route::get('myorders', ['as' => 'transactionClient.transactionList', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'TransactionClientController@transactionList']);
    Route::get('clientvieworder/{id}', ['as' => 'transactionClient.transactionView', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'TransactionClientController@transactionView']);
    Route::get('facture/{id}', ['as' => 'transactionClient.generateFacture', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'TransactionClientController@generateFacturePDF']);
    Route::get('facture/{id}', ['as' => 'transactionClient.generateFacture', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'TransactionClientController@generateFacturePDF']);
    Route::get('licence/{id}', ['as' => 'transactionClient.generateLicence', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'TransactionClientController@generateLicencePDF']);
    Route::get('licence/{id}', ['as' => 'transactionClient.generateLicence', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'TransactionClientController@generateLicencePDF']);
    Route::post('transactioncheck', ['as' => 'transactionClient.transactionCheck', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'TransactionClientController@transactionCheck']);
    Route::get('transactioncancel', ['as' => 'transactionClient.cancelTransaction', 'middleware' => ['auth', 'verify.access.permission:4'], 'uses' => 'TransactionClientController@CancelTransaction']);

    Route::get('reportCardCreation', ['as' => 'report.reportCardCreation', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@reportCardCreationView']);
    Route::get('report/generateFastReport/cardCreation/{periodType}', ['as' => 'report.generateFastReportCardCreation', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateFastReportCardCreation']);
    Route::get('report/generateSpecificReport/cardCreation/{includeCardWithImages}/{startDate}/{endDate}', ['as' => 'report.generateSpecificReportCardCreation', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateSpecificReportCardCreation']);
    Route::get('reportPicture', ['as' => 'report.reportPicture', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@reportPictureView']);
    Route::get('report/generateFastReport/picture/{periodType}', ['as' => 'report.generateFastReportPicture', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateFastReportPicture']);
    Route::get('report/generateSpecificReport/picture/{startDate}/{endDate}', ['as' => 'report.generateSpecificReportPicture', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'ReportController@generateSpecificReportPicture']);

    Route::get('searchJSON', ['as' => 'search.JSON', 'uses' => 'SearchController@searchJSON']);
    Route::get('searchHistory/view/{searchedTerm}', ['as' => 'search.historyResult', 'middleware' => ['auth', 'verify.access.permission:1'], 'uses' => 'SearchController@historyResult']);

});
