<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['verify' => 'true']);

// Ppdb Application
Route::prefix('app')->middleware('ppdb')->group(function () {

    // Authentic or Profile
    Route::get('update-profile', 'Pengguna\PpdbController@my_profile')->name('pengguna.profile');
    Route::post('change-profile', 'Pengguna\PpdbController@change_profile')->name('pengguna.change.profile');
    Route::post('change-detail', 'Pengguna\PpdbController@change_detail')->name('pengguna.change.detail');
    Route::get('user-setting-ppdb', 'Pengguna\PpdbController@UserSetting')->name('pengguna.ppdb.setting');
    Route::post('change-setting-ppdb-theme', 'Pengguna\PpdbController@changeSetting')->name('change.pengguna.setting.ppdb');
    Route::get('log-activity', 'Pengguna\PpdbController@logActivity')->name('ppdb.logActivity');
    Route::get('ppdb-dashboard', 'Pengguna\PpdbController@ppdb_kanal')->name('ppdb.dashboard');

    Route::get('pemberitahuan', 'Pengguna\PpdbController@pemberitahuan')->name('ppdb.notif');
    Route::get('mark-as-read', 'Pengguna\PpdbController@markAsRead')->name('ppdb.notif.mark');
    // Information Group PPdb
    Route::prefix('information')->group(function () {

        // Informasi Umum
        Route::get('info-gelombang', 'Pengguna\PpdbController@gelombang_view')->name('ppdb.info.gelombang');
        Route::get('info-lainnya', 'Pengguna\PpdbController@info_lainnya')->name('ppdb.info.lainnya');

        // Informasi Beasiswa
        Route::get('info-beasiswa', 'Pengguna\PpdbController@info_beasiswa')->name('ppdb.info.beasiswa');
        Route::get('detail-beasiswa/{id}/{any}', 'Pengguna\PpdbController@beasiswa_detail')->name('ppdb.beasiswa.detail');

        // Pengumuman Sekolah
        Route::get('pengumuman-ppdb', 'Pengguna\PpdbController@pengumuman_ppdb')->name('announcement.ppdb');

        // Mading Umum
        Route::get('mading-umum', 'Pengguna\PpdbController@ppdb_mading')->name('mading.umum');
        Route::get('mading-load', 'Pengguna\PpdbController@ppdb_loader')->name('mading.load');
        Route::get('delete-mading/{id}', 'Pengguna\PpdbController@ppdb_delete')->name('mading.delete');
        Route::post('insert-mading', 'Pengguna\PpdbController@store_mading')->name('mading.insert_umum');
        Route::post('update-mading', 'Pengguna\PpdbController@update_mading')->name('mading.update_umum');

        // Forum Umum
        Route::get('forum-ppdb', 'Pengguna\PpdbController@forum')->name('ppdb.forum');
        Route::get('detail-forum/{id}', 'Pengguna\PpdbController@detailForum')->name('ppdb.detail_forum');

        Route::post('add-forum', 'Pengguna\PpdbController@createForum')->name('ppdb.add_forum');
        Route::post('update-forum', 'Pengguna\PpdbController@updateForum')->name('ppdb.update_forum');
        Route::post('reply-forum', 'Pengguna\PpdbController@replyForum')->name('ppdb.reply_forum');
        Route::get('reply-delete/{id}/{any}', 'Pengguna\PpdbController@delete_reply')->name('ppdb.delete_reply');

        // Social Post 
        Route::get('beranda-social', 'Pengguna\PpdbController@beranda_social')->name('ppdb.beranda');
        Route::get('detail-post/{id}/{any}', 'Pengguna\PpdbController@detail_post')->name('ppdb.detail_post');
        Route::get('like-post/{id}/{any}', 'Pengguna\PpdbController@like_post')->name('ppdb.like_post');
        Route::get('delete-post/{id}/{any}', 'Pengguna\PpdbController@delete_post')->name('ppdb.delete_post');
        Route::get('delete-reply/{id}/{any}', 'Pengguna\PpdbController@delete_post_reply')->name('ppdb.delete_reply_post');

        Route::post('insert-post', 'Pengguna\PpdbController@insert_post')->name('ppdb.insert_post');
        Route::post('update-post', 'pengguna\PpdbController@update_post')->name('ppdb.update_post');
        Route::post('insert-reply-post', 'Pengguna\PpdbController@insert_reply_post')->name('ppdb.insert_reply.post');
        Route::post('update-reply-post', 'Pengguna\PpdbController@update_reply_post')->name('ppdb.update_reply.post');
    });

    // Meeting PPDB
    Route::prefix('meeting')->group(function () {
        Route::get('calendar', 'Pengguna\MeetingRoomController@userCalendar')->name('ppdb.meeting.calendar');
        Route::get('start/{id}', 'Pengguna\MeetingRoomController@penggunaStartJoin')->name('ppdb.meeting.start');
    });

    // Ppdb Registration
    Route::prefix('register-ppdb')->group(function () {
        // Ppdb Registration
        Route::get('ppdb', 'Pengguna\PpdbController@my_registration')->name('ppdb.registrasi');
        Route::get('reg/{id}', 'Pengguna\PpdbController@register_online')->name('ppdb.reg');
        Route::get('detail-formulir/{id}/{any}', 'Pengguna\PpdbController@detail_registration')->name('ppdb.detail_formulir');
        Route::get('kartu-peserta/{id}', 'Pengguna\PpdbController@kartuPendaftaran')->name('card.ppdb_peserta');

        // Output Registration
        Route::get('print-formulir/{id}/{any}', 'Pengguna\PpdbController@cetak_pdf')->name('ppdb.pdf_view');
        Route::get('list-pendaftar', 'Pengguna\PpdbController@list_pendaftar')->name('ppdb.list_pendaftar');
        Route::get('hasil-pendaftaran', 'Pengguna\PpdbController@hasil_ppdb')->name('ppdb.hasil');
    });
});
