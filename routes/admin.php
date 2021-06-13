<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

//  Admin Auth

// You Can Change Auth::routes(['verify' => 'true']); for Must email Verify
Auth::routes(['verify' => 'true']);
Route::prefix('auth')->group(function () {
    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::get('/forgetpass', 'AdminController@forget')->name('forget');
});
Route::post('create-license', 'AdminController@createLicense')->name('create.license');
Route::middleware('administrator')->group(function () {

    // Dashboard Route
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('pemberitahuan', 'AdminController@notification')->name('admin.notif');
    Route::get('mark-read-notif', 'AdminController@tandaiTelahdibaca')->name('admin.notif.mark');
    Route::get('my-profile', 'UsersController@profile')->name('admin.profile');
    Route::get('update-profile', 'UsersController@update_profile')->name('admin.update.profile');
    Route::post('change-profile', 'UsersController@change_profile')->name('admin.change_profile');

    // Settings Route
    Route::prefix('setting')->group(function () {
        Route::get('/{any}', 'AdminController@settingsGeneral')->name('setting');
        Route::post('/post/{any}', 'AdminController@insertSett')->name('settings.post');
    });

    Route::prefix('master')->group(function () {

        // Department Route
        Route::get('/department', 'MasterController@department')->name('department.list');
        Route::post('/department/insert', 'MasterController@insertDepartment')->name('department.insert');
        Route::post('/department/update', 'MasterController@updateDepartment')->name('department.update');
        Route::get('/department/delete/{id}', 'MasterController@deleteDepartment')->name('department.delete');

        // Designation Route
        Route::get('/designation', 'MasterController@designation')->name('designation');
        Route::post('/designation/insert', 'MasterController@insertDesignation')->name('designation.insert');
        Route::post('/designation/update', 'MasterController@updateDesignation')->name('designation.update');
        Route::get('/designation/delete/{id}', 'MasterController@deleteDesignation')->name('designation.delete');

        // Employee Route
        Route::get('/employee', 'MasterController@employee')->name('employee');
        Route::get('/employeeBy/{id}', 'MasterController@employeeBy')->name('employee.designation');
        Route::get('/employee/editEmployee/{id}', 'MasterController@editEmployee')->name('employee.edit');
        Route::get('/employee/add', 'MasterController@addPegawai')->name('employee.add');
        Route::post('/employee/update', 'MasterController@updateEmployee')->name('employee.update');
        Route::post('/employee/insert', 'MasterController@insertEmployee')->name('employee.insert');
        Route::get('/employee/delete/{id}', 'MasterController@deleteEmployee')->name('employee.delete');
        Route::get('/employee/detail/{id}/{any}', 'MasterController@employeeDetail')->name('employee.detail');

        Route::post('/employee/detail/sosmed/{any}', 'MasterController@crudEmployeeDetail')->name('employee.insert.sosmed');
        Route::get('/employee/sosmed/{any}/{id}', 'MasterController@crudEmployeeDetail')->name('employee.crud');
        Route::get('/employee/choosedesignation/{id}', 'MasterController@choosedesignation')->name('choose.designation');

        // Users Route
        Route::get('/users/admin', 'UsersController@admin')->name('user.admin');
        Route::get('/users/deleteAdm/{id}', 'UsersController@deleteAdm')->name('user.admin.delete');
        Route::post('/users/insertAdm', 'UsersController@insertAdm')->name('user.admin.add');
        Route::post('/users/updateAdm', 'UsersController@updateAdm')->name('user.admin.update');
        Route::get('log-aktivitas/ppdb', 'UsersController@UsersController')->name('admin.users.log');

        Route::get('/users/ppdb/detail/{id}', 'UsersController@userPpdbDetail')->name('user.ppdb.detail');
        Route::post('/users/ppdb/update', 'UsersController@updateUserPpdb')->name('user.ppdb.update');
        Route::get('user/ppdb/list', 'UsersController@userPpdb')->name('user.ppdb.list');

        // CMS Route
        Route::get('/cms/{any}', 'AdminController@cms')->name('cms');
        Route::get('/cms/{any}/{id}', 'WebsiteController@postAdmin')->name('cms.page');
        Route::post('/cms/insert/{any}', 'WebsiteController@postAdmin')->name('cms.insert');
        Route::get('/cms/update/{any}/{id}', 'AdminController@cms')->name('cms.update.page');

        // Fasilitas Route
        Route::get('/fasilitas', 'MasterController@fasilitas')->name('admin.fasilitas');
        Route::get('/fasilitas-delete/{id}', 'MasterController@delete_fasilitas')->name('fasilitas.delete');
        Route::post('/fasilitas-insert', 'MasterController@add_fasilitas')->name('fasilitas.insert');
        Route::post('/fasilitas-update', 'MasterController@edit_fasilitas')->name('fasilitas.update');

        // Customer Service
        Route::get('customer-service', 'Academic\PpdbController@customer_service')->name('admin.cs');
        Route::post('customer-store', 'Academic\PpdbController@add_cs')->name('admin.add_cs');
        Route::post('customer-update', 'Academic\PpdbController@update_cs')->name('admin.update_cs');
        Route::get('customer-delete/{id}', 'Academic\PpdbController@delete_cs')->name('admin.delete_cs');
    });

    // Teacher Route
    Route::prefix('teacher')->group(function () {
        Route::get('/teacher-list', 'Teacher\TeacherController@admin_list')->name('admin.teacher');
        Route::get('/teacher-delete/{id}', 'Teacher\TeacherController@soft_delete')->name('teacher.delete');
        Route::get('/teacher-add', 'Teacher\TeacherController@add_teacher')->name('teacher.add');
        Route::get('/teacher-update/{id}', 'Teacher\TeacherController@update_teacher')->name('teacher.update');
        Route::post('/teacher-insert', 'Teacher\TeacherController@insert_teacher')->name('teacher.insert');
        Route::post('/teacher-edit', 'Teacher\TeacherController@edit_teacher')->name('teacher.edit');
    });

    // Academic Route
    Route::prefix('academic')->group(function () {
        // Mapel
        Route::get('mapel', 'Academic\MapelController@admin_mapel')->name('admin.mapel');
        Route::post('insert-mapel', 'Academic\MapelController@insert_mapel')->name('insert.mapel');
        Route::post('update-mapel', 'Academic\MapelController@update_mapel')->name('update.mapel');
        Route::get('delete-mapel/{id}', 'Academic\MapelController@soft_delete')->name('delete.mapel');

        // Extrakulikuler
        Route::get('extrakulikuler', 'Academic\MapelController@admin_extra')->name('admin.extra');
        Route::get('add-extrakulikuler', 'Academic\MapelController@addExtra')->name('add.extra');
        Route::get('update-extrakulikuler/{id}', 'Academic\MapelController@updateExtra')->name('update.extra');
        Route::post('insert-extra', 'Academic\MapelController@insert_extra')->name('insert.extra');
        Route::post('update-extra', 'Academic\MapelController@update_extra')->name('edit.extra');
        Route::get('delete-extra/{id}', 'Academic\MapelController@extra_delete')->name('delete.extra');

        // Announcement
        Route::get('announcement', 'AdminController@pengumuman')->name('admin.announcement');
        Route::get('announcement-add', 'AdminController@add_pengumuman')->name("admin.add_announcement");
        Route::get('announcement-edit/{id}/{any}', 'AdminController@update_pengumuman')->name('admin.edit_announcement');
        Route::get('announcement-delete/{id}/{any}', 'AdminController@del_announcement')->name('admin.delete_announcement');
        Route::post('announcement-store', 'AdminController@insert_pengumuman')->name('admin.announcement_store');
        Route::post('announcement-update', 'AdminController@ubah_pengumuman')->name('admin.announcement_update');
    });

    // Ppdb Master Data
    Route::prefix('ppdb')->group(function () {
        Route::get('tahun-ajaran', 'Academic\PpdbController@admin_tahun_ajaran')->name('admin.ppdb.tahun');
        Route::get('delete-tahunAjaran/{id}', 'Academic\PpdbController@deleteTahunAjaran')->name('admin.delete.tahun');
        Route::get('tahun-activation/{id}', 'Academic\PpdbController@TahunActivation')->name('admin.tahun_active');

        Route::get('gelombang-daftar', 'Academic\PpdbController@info_gelombang')->name('admin.ppdb.gelombang');
        Route::get('gelombang-by-tahun/{id}', 'Academic\PpdbController@gelombangBy')->name('admin.ppdb.gelombangby');
        Route::get('delete-gelombang/{id}', 'Academic\PpdbController@deleteGelombang')->name('admin.gelombang.delete');

        Route::post('insert-tahun', 'Academic\PpdbController@add_tahun_ajaran')->name('insert.ppdb.tahun');
        Route::post('insert-gelombang', 'Academic\PpdbController@add_gelombang')->name('insert.ppdb.gelombang');
        Route::post('update-tahun', 'Academic\PpdbController@update_tahun_ajaran')->name('update.ppdb.tahun');
        Route::post('update-gelombang', 'Academic\PpdbController@update_gelombang')->name('update.ppdb.gelombang');

        // Meeting Route
        Route::prefix('meet')->group(function () {
            Route::get('/', 'Pengguna\MeetingRoomController@list')->name('ppdb.meet.list');
            Route::get('/calendar', 'Pengguna\MeetingRoomController@calendar')->name('ppdb.meet.calendar');
            Route::get('/add', 'Pengguna\MeetingRoomController@add')->name('ppdb.meet.add');
            Route::get('/edit/{id}', 'Pengguna\MeetingRoomController@edit')->name('ppdb.meet.edit');
            Route::get('/detail/{id}', 'Pengguna\MeetingRoomController@detail')->name('ppdb.meet.detail');
            Route::get('/delete/{any}', 'Pengguna\MeetingRoomController@delete')->name('ppdb.meet.delete');
            Route::get('/start/{any}', 'Pengguna\MeetingRoomController@start')->name('ppdb.meet.start');
            Route::post('store/{any}', 'Pengguna\MeetingRoomController@storePpdb')->name('ppdb.meet.store');
            Route::get('/endmeet/{id}', 'Pengguna\MeetingRoomController@endMeet');
        });

        // Registration PPDB
        Route::prefix('registration')->group(function () {
            Route::get('by-gelombang/{id}', 'Academic\PpdbController@regByGelombang')->name('admin.ppdb.bygelombang');
            Route::get('online', 'Academic\PpdbController@regOnline')->name('admin.ppdb.online');
            Route::get('ppdb-offline', 'Academic\PpdbController@regOffline')->name('admin.ppdb.offline');
            Route::get('ppdb-diterima', 'Academic\PpdbController@regDiterima')->name('admin.ppdb.diterima');
            Route::get('ppdb-pending', 'Academic\PpdbController@regPending')->name('admin.ppdb.pending');
            Route::get('ppdb-tidak-lulus', 'Academic\PpdbController@tidakDiterima')->name('admin.ppdb.ditolak');

            Route::get('get-gelombang/{id}', 'Academic\PpdbController@gelombangChoose');
            Route::get('ppdb-detail/{id}', 'Academic\PpdbController@detailPpdb')->name('admin.detail.ppdb');
            Route::get('kartu-peserta/{id}', 'Academic\PpdbController@cardPpdb')->name('admin.card.ppdb');
            Route::get('formulir-peserta/{id}', 'Academic\PpdbController@pdfCard')->name('admin.pdf.ppdb');

            Route::get('add-ppdb', 'Academic\PpdbController@addPpdb')->name('admin.ppdb.add');
            Route::get('update-ppdb/admin/{id}', 'Academic\PpdbController@updatePpdb')->name('admin.ppdb.update');
            Route::post('create-ppdb/byadmin/{any}', 'Academic\PpdbController@insert_ppdb')->name('create.ppdb.admin');
            Route::get('admin/ppdb-delete/{id}', 'Academic\PpdbController@deletePpdb')->name('admin.ppdb.delete');
            Route::get('admin/ppdb-action/{any}/{id}', 'Academic\PpdbController@ppdbAction')->name('admin.ppdb.action');

            // PPDB Mading
            Route::get('admin/mading-ppdb', 'Academic\PpdbController@mading')->name('admin.ppdb.mading');
            Route::get('admin/mading-ppdb/delete/{id}', 'Academic\PpdbController@deleteMading')->name('admin.ppdb.madingdel');
            Route::post('admin/mading-create/{any}', 'Academic\PpdbController@createMading')->name('admin.mading.create');

            // PPDB Forum
            Route::get('admin/forum-ppdb', 'Academic\PpdbController@forum')->name('admin.ppdb.forum');
            Route::get('admin/forum-detail/{id}', 'Academic\PpdbController@forumDetail')->name('admin.ppdb.forum_detail');
            Route::get('admin/forum-delete/{id}', 'Academic\PpdbController@deleteForum')->name('admin.ppdb.forum_delete');

            Route::post('admin/forum-reply', 'Academic\PpdbController@replyForum')->name('admin.forum.reply');
            Route::get('admin/forum-reply-delete/{id}', 'Academic\PpdbController@deleteReply')->name('admin.forum.delete_reply');
        });

        // Information Of PPDB
        Route::prefix('information')->group(function () {
            Route::get('guide', 'Academic\PpdbController@guide')->name('admin.guide.list');
            Route::get('detail-guide/{id}/{any}', 'Academic\PpdbController@detail_guide')->name('admin.detail_guide');
            Route::get('beasiswa', 'Academic\PpdbController@beasiswa_list')->name('admin.beasiswa.list');
            Route::get('tambah-beasiswa', 'Academic\PpdbController@add_beasiswa')->name('admin.add_beasiswa');
            Route::get('update-beasiswa/{id}/{any}', 'Academic\PpdbController@update_beasiswa')->name('admin.update_beasiswa');
            Route::get('info-lainnya', 'Academic\PpdbController@other_info_list')->name('admin.other_info');
            Route::get('detail-info-lainnya/{id}/{any}', 'Academic\PpdbController@other_info_detail')->name('admin.info_detail');
            Route::get('tambah-info-lainnya', 'Academic\PpdbController@add_other_info')->name('admin.add_other_info');
            Route::get('update-info-lainnya/{id}/{any}', 'Academic\PpdbController@update_other_info')->name('admin.update_other_info');
        });

        // Document Route
        Route::prefix('document')->group(function () {
            Route::prefix('master')->group(function () {

                // View Route
                Route::get('tanda-tangan', 'Document\MasterDocument@tandaTangan')->name('document.tanda_tangan');
                Route::get('category', 'Document\MasterDocument@category')->name('document.category');
                Route::get('template', 'Document\MasterDocument@template')->name('document.template');
                Route::get('template-detail/{id}', 'Document\MasterDocument@templateDetail')->name('document.detail.template');

                // Delete Route
                Route::get('delete-tanda/{id}', 'Document\MasterDocument@deleteTanda')->name('document.delete.tanda');
                Route::get('delete-category/{id}', 'Document\MasterDocument@deleteCategory')->name('document.delete.category');
                Route::get('delete-template/{id}', 'Document\MasterDocument@deleteTemplate')->name('document.delete.template');

                // Create Or Update
                Route::post('create-tanda/{any}', 'Document\MasterDocument@createTanda')->name('document.tambah.tanda');
                Route::post('create-category/{any}', 'Document\MasterDocument@createCategory')->name('document.tambah.category');
                Route::post('create-template/{any}', 'Document\MasterDocument@createTemplate')->name('document.tambah.template');
            });

            // Document App
            Route::get('/', 'Document\DocumentController@index')->name('document.index');
            Route::get('/add', 'Document\DocumentController@add')->name('document.add');
            Route::get('/update/{id}', 'Document\DocumentController@update')->name('document.update');
            Route::get('detail/{id}', 'Document\DocumentController@detail')->name('document.detail');
            Route::get('delete/{id}', 'Document\DocumentController@delete')->name('document.delete');
            Route::post('create/{any}', 'Document\DocumentController@store')->name('document.create');
        });
    });

    Route::prefix('mailing')->group(function () {
        Route::get('/', 'Mailing\MailingController@index')->name('mailing.index');
        Route::get('/add', 'Mailing\MailingController@add')->name('mailing.add');
        Route::get('getmail/{any}', 'Mailing\MailingController@getEmail')->name('mailing.getmail');
        Route::get('detail/{id}', 'Mailing\MailingController@detail')->name('mailing.detail');
        Route::post('/store', 'Mailing\MailingController@store')->name('mailing.store');
    });
});
