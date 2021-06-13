<?php

namespace App\Http\Controllers;

use App\Academik\Extrakulikuler;
use App\Admin\SettGeneral;
use App\Admin\SettMail;
use App\Archivement;
use App\CatNews;
use App\Contact;
use App\Event;
use App\EventCat;
use App\Fasilitas;
use App\Feature;
use App\Gallery;
use App\History;
use App\Mail\SubcribeMail;
use App\Mapel;
use App\News;
use App\NewsComment;
use App\NewsVisit;
use App\PageBuilder;
use App\SettWebsite;
use App\Slider;
use App\Subcriber;
use App\Teacher;
use App\WebAbout;
use Illuminate\Foundation\Auth\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sabberworm\CSS\Settings;

class WebsiteController extends Controller
{

    use Website;

    //  Home Functin
    public function index()
    {
        $page       = "Etnicode School";
        $sett       = SettWebsite::first();
        if ($sett->theme == 'theme') {
            $slide  = Slider::where('type', '1')->first();
        } else {
            $slide  = Slider::where('type', '0')->get();
        }
        $feat       = Feature::limit(3)->get();
        $even       = Event::orderBy('id', 'DESC')->limit(10)->get();
        $visi       = WebAbout::first();
        $mapel      = Mapel::where('featured', '1')->get();
        $guru       = Teacher::all();
        $gallery    = Gallery::limit(8)->get();
        return view('website.' . $this->websiteTheme() . '.page.index', compact(
            'page',
            'sett',
            'slide',
            'feat',
            'even',
            'visi',
            'mapel',
            'guru',
            'gallery'
        ));
    }



    //  About Function
    public function about()
    {
        $page       = "Visi Misi";
        $sett       = SettWebsite::first();
        $feat       = Feature::limit(3)->get();
        $even       = Event::orderBy('id', 'DESC')->limit(10)->get();
        $visi       = WebAbout::first();
        $mapel      = Mapel::all();
        $guru       = Teacher::all();
        return view('/website.' . $this->websiteTheme() . '.page.about', compact(
            'page',
            'sett',
            'even',
            'visi',
            'mapel',
            'guru'
        ));
    }

    public function events($param1 = '', $param2 = '', $param3 = '', Request $request)
    {
        if ($param1 == 'list') {
            $page       = "List Kegiatan";
            $cate       = EventCat::all();
            $even       = Event::orderBy('id', 'DESC')->paginate(10);
            $sett       = SettWebsite::first();
            if ($request->search != null) {
                $even   = Event::where('event_title', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->paginate(10);
                $even->appends([
                    'search' => $request->search,
                ]);
            }
            return view('website.' . $this->websiteTheme() . '.events.list', compact('page', 'sett', 'cate', 'even'));
        }

        if ($param1 == 'detail') {
            $page       = 'Detail Kegiatan';
            $sett       = SettWebsite::first();
            $cate       = EventCat::all();
            $even       = Event::orderBy('id', 'desc')->limit(5)->get();
            $data       = Event::where('id', $param2)->first();
            $gall       = Gallery::orderBy('id', 'DESC')->limit(6)->get();
            return view('website.' . $this->websiteTheme() . '.events.detail', compact('page', 'sett', 'data', 'cate', 'even', 'gall'));
        }

        if ($param1 == 'category') {
            $page       = "Event Category";
            $sett       = SettWebsite::first();
            $cate       = EventCat::all();
            $even       = Event::where('event_cat_id', $param2)->paginate(20);

            if ($request->search != null) {
                $even   = Event::where('event_title', 'like', '%' . $request->search . '%')
                    ->where('event_cat_id', $param2)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
            }
            return view('website.' . $this->websiteTheme() . '.events.bycategory', compact('page', 'sett', 'even', 'cate'));
        }

        // Add Events Comments Functional Parameter
        if ($param1 == 'comment') {
        }

        // Del Events Comment Functional Parameter
        if ($param1 == 'delcomment') {
        }
    }

    public function news($param1 = '', $param2 = '', Request $request)
    {
        if ($param1 == 'list') {
            $page       = "List Berita";
            $cate       = CatNews::all();
            $news       = News::orderBy('id', 'DESC')->paginate(10);
            $sett       = SettWebsite::first();
            $recent     = News::orderBy('id', 'desc')->limit(6)->get();
            $gall       = Gallery::orderBy('id', 'DESC')->limit(6)->get();


            if ($request->search != null) {
                $news   = News::where('news_title', 'like', '%' . $request->search . '%')->orderBy('id', 'DESC')->paginate(1);
                $news->appends([
                    'search'        => $request->search
                ]);
            }

            return view('/website.' . $this->websiteTheme() . '.news.list', compact(
                'page',
                'sett',
                'cate',
                'news',
                'recent',
                'gall'
            ));
        }


        if ($param1 == 'by') {
            $page       = "Berita By Category";
            $cate       = CatNews::all();
            $news       = News::where('cat_news_id', $param2)->orderBy('id', 'DESC')->paginate(10);
            $recent     = News::orderBy('id', 'desc')->limit(6)->get();

            if ($request->search != null) {
                $news   = News::where('news_title', 'like', '%' . $request->search . '%')->where('cat_news_id', $param2)->orderBy('id', 'DESC')->paginate(10);
                $news->appends([
                    'search'    => $request->search,
                ]);
            }
            $sett       = SettWebsite::first();
            return view('/website.' . $this->websiteTheme() . '.news.bycategory', compact(
                'page',
                'sett',
                'cate',
                'news',
                'recent'
            ));
        }

        if ($param1 == 'detail') {
            $page       = "Detail Berita";
            $cate       = CatNews::all();
            $news       = News::where('id', $param2)->first();
            $sett       = SettWebsite::first();
            $recent     = News::orderBy('id', 'desc')->limit(6)->get();
            $gall       = Gallery::orderBy('id', 'DESC')->limit(6)->get();

            $this->createNewsViews($param2);
            return view('website.' . $this->websiteTheme() . '.news.detail', compact(
                'page',
                'news',
                'sett',
                'cate',
                'gall',
                'recent'
            ));
        }
    }

    public function gallery()
    {
        $page       = "Gallery Sekolah";
        $gallery    = Gallery::orderBy('id', 'DESC')->paginate(30);
        $sett       = SettWebsite::first();
        return view('/website.' . $this->websiteTheme() . '.gallery.list', compact(
            'page',
            'sett',
            'gallery'
        ));
    }

    public function contact()
    {
        $page       = "Kontak Sekolah";
        $sett       = SettWebsite::first();
        return view('/website.' . $this->websiteTheme() . '.page.contact', compact(
            'page',
            'sett'
        ));
    }


    public function postAdmin(Request $request, $param1 = '', $param2 = '')
    {

        if ($param1 == 'deleteComment') {
            if (NewsComment::destroy($param2)) {
                return back()->with(['flash' => 'Penghapusan data selesai']);
            } else {
                return back()->with(['gagal' => 'Terjadi kesalahan']);
            }
        }

        if ($param1 == 'slider' || $param1 == 'sliderUpdate') {
            $this->validate($request, [
                'title_slider'      => 'required',
                'subtitle_slider'   => 'required',
                'image_slider'      => 'mimes:jpg,jpeg,png'
            ]);

            if ($param1 == 'slider') {
                $slider                 = new Slider;
                $slider->image_slider   = $this->uploadImage($request, 'image_slider', 'website/slider/');
            }

            if ($param1 == 'sliderUpdate') {
                $slider                 = Slider::findOrFail($request->id);

                if ($request->hasFile('image_slider')) {
                    $slider->image_slider   = $this->uploadImage($request, 'image_slider', 'website/slider/');
                }
            }

            $slider->title_slider   = $request->title_slider;
            $slider->subtitle_slider = $request->subtitle_slider;

            if ($request->button_slider) {
                $slider->button_slider = $request->button_slider;
            }

            if ($request->button_link) {
                $slider->button_link    = $request->button_link;
            }

            if ($request->type) {
                $slider->type           = $request->type;
            }

            return $this->simpanData($slider);
        }


        if ($param1 == 'set_modern') {
            $active         = Slider::where('type', '1')->first();
            $active->type   = 0;
            $active->save();

            $nonactive      = Slider::findOrFail($param2);
            $nonactive->type = 1;
            $nonactive->save();

            return back()->with(['flash' => 'Slider Modern berhasil diubah']);
        }

        if ($param1 == 'delSlider') {
            $slider     = Slider::findOrFail($param2);
            if ($slider->type == 1) {
                return back()->with(['gagal' => 'Untuk Menghapus Slider ini, anda harus mengubah typenya terlebih dahulu']);
            } else {
                Slider::destroy($param2);
                return back()->with(['flash' => 'slider berhasil dihapus']);
            }
        }

        if ($param1 == 'feature' || $param1 == 'updatefeature') {

            $this->validate($request, [
                'feature_icon'          => 'mimes:jpg,jpeg,png',
                'feature_title'         => 'required',
                'feature_description'   => 'required',
            ]);

            if ($param1 == 'feature') {
                $feature                    = new Feature;
                $feature->feature_icon = $this->uploadImage($request, 'feature_icon', 'website/feature/');
            }

            if ($param1 == 'updatefeature') {
                $feature                    = Feature::findOrFail($request->id);
                if ($request->hasFile('feature_icon')) {
                    $feature->feature_icon = $this->uploadImage($request, 'feature_icon', 'website/feature/');
                }
            }

            $feature->feature_title         = $request->feature_title;
            $feature->feature_description   = $request->feature_description;

            return $this->simpanData($feature);
        }


        if ($param1 == 'deletefeature') {
            Feature::destroy($param2);
            return back()->with(['flash' => 'Keunggulan berhasil dihapus']);
        }

        if ($param1 == 'vission') {
            $this->validate($request, [
                'vission'           => 'required',
                'image_vission'     => 'mimes:jpg,jpeg,png',
            ]);

            $data       = WebAbout::first();
            if ($request->hasFile('image_vission')) {
                $image = $request->file('image_vission')->store('uploads/website/about/');
            } else {
                $image = $data->image_vission;
            }

            WebAbout::first()->update([
                'vission'           => $request->vission,
                'image_vission'     => $image,
            ]);

            return back()->with(['flash' => 'Perubahan berhasil dilakukan']);
        }

        if ($param1 == 'mission') {
            $this->validate($request, [
                'mission'           => 'required',
                'image_mission'     => 'mimes:jpg,jpeg,png',
            ]);

            $data       = WebAbout::first();
            if ($request->hasFile('image_mission')) {
                $image = $request->file('image_mission')->store('uploads/website/about/');
            } else {
                $image = $data->image_mission;
            }

            WebAbout::first()->update([
                'mission'           => $request->mission,
                'image_mission'     => $image,
            ]);

            return back()->with(['flash' => 'Perubahan berhasil dilakukan']);
        }

        if ($param1 == 'slogan') {
            $this->validate($request, [
                'slogan'           => 'required',
                'image_mission'     => 'mimes:jpg,jpeg,png',
            ]);

            $data       = WebAbout::first();
            if ($request->hasFile('image_slogan')) {
                $image = $request->file('image_slogan')->store('uploads/website/about/');
            } else {
                $image = $data->image_slogan;
            }

            WebAbout::first()->update([
                'slogan'           => $request->slogan,
                'image_slogan'     => $image,
            ]);

            return back()->with(['flash' => 'Perubahan berhasil dilakukan']);
        }

        if ($param1 == 'about') {
            $this->validate($request, [
                'about'           => 'required',
                'image_about'     => 'mimes:jpg,jpeg,png',
            ]);

            $data       = WebAbout::first();
            if ($request->hasFile('image_about')) {
                $image = $request->file('image_about')->store('uploads/website/about/');
            } else {
                $image = $data->image_about;
            }

            if ($request->link_video) {
                $link       = $request->link_video;
            } else {
                $link       = $data->link_video;
            }

            WebAbout::first()->update([
                'about'           => $request->about,
                'image_about'     => $image,
                'link_video'      => $link,
            ]);

            return back()->with(['flash' => 'Perubahan berhasil dilakukan']);
        }

        if ($param1 == 'acrhivement' || $param1 == 'prestasiUpdate') {
            $this->validate($request, [
                'archivement_name'      => 'required',
                'archivement_note'      => 'required',
                'archivement_date'      => 'required',
                'archivement_photo'     => 'mimes:jpg,jpeg,png'
            ]);

            if ($param1 == 'acrhivement') {
                $archivement                    = new Archivement;
                $archivement->archivement_photo = $this->uploadImage($request, 'archivement_photo', 'website/archivement/');
            }

            if ($param1 == 'prestasiUpdate') {
                $archivement                    = Archivement::findOrFail($request->id);
                if ($request->hasFile('archivement_photo')) {
                    $archivement->archivement_photo = $this->uploadImage($request, 'archivement_photo', 'website/archivement/');
                }
            }

            $archivement->archivement_name  = $request->archivement_name;
            $archivement->archivement_note  = $request->archivement_note;
            $archivement->archivement_date  = $request->archivement_date;

            return $this->simpanData($archivement);
        }

        if ($param1 == 'deletePrestasi') {
            Archivement::findOrFail($param2);
            Archivement::destroy($param2);
            return back()->with(['flash' => 'Prestasi berhasil dihapus']);
        }

        if ($param1 == 'detailArchivement') {
            $page       = "Detail Prestasi";
            $data       = Archivement::findOrFail($param2);
            return view('backend.cms.archivedetail', compact('page', 'data'));
        }

        if ($param1 == 'catnews') {
            $this->validate($request, [
                'cat_name'      => 'required',
                'cat_icon'      => 'mimes:jpg,jpeg,png'
            ]);

            $catnews            = new CatNews;
            $catnews->cat_name  = $request->cat_name;
            $catnews->cat_icon      = $this->uploadImage($request, 'cat_icon', 'website');
            if ($request->cat_status) {
                $catnews->cat_status = $request->cat_status;
            } else {
                $catnews->cat_status = 0;
            }
            return $this->simpanData($catnews);
        }

        if ($param1 == 'updateCatnews') {
            $this->validate($request, [
                'cat_name'      => 'required',
                'cat_icon'      => 'mimes:jpg,jpeg,png'
            ]);

            $catnews            = CatNews::findOrFail($request->id);
            $catnews->cat_name  = $request->cat_name;

            if ($request->hasFile('cat_icon')) {
                $catnews->cat_icon = $this->uploadImage($request, 'cat_icon', 'website');
            }

            if ($request->cat_status) {
                $catnews->cat_status = $request->cat_status;
            } else {
                $catnews->cat_status = $catnews->cat_status;
            }
            return $this->simpanData($catnews);
        }

        if ($param1 == 'catdel') {
            $data       = CatNews::findOrFail($param2);
            return $this->deleteData($data, $param2);
        }

        if ($param1 == 'history') {
            $this->validate($request, [
                'start_date'        => 'required',
                $this->content_title()             => 'required',
            ]);

            $history                = new History;
            $history->title         = $request->title;
            $history->start_date    = $request->start_date;
            if ($request->end_date) {
                $history->end_date  = $request->end_date;
            }
            if ($request->description) {
                $history->description = $request->description;
            }

            $history->save();
            return back()->with(['flash' => 'Sejarah Sekolah Berhasil Ditambahkan']);
        }

        if ($param1 == 'historyUpdate') {
            $this->validate($request, [
                'start_date'        => 'required',
                $this->content_title()             => 'required',
            ]);

            $history                = History::findOrFail($request->id);
            $history->title         = $request->title;
            $history->start_date    = $request->start_date;
            if ($request->end_date) {
                $history->end_date  = $request->end_date;
            }
            if ($request->description) {
                $history->description = $request->description;
            }

            $history->save();
            return back()->with(['flash' => 'Sejarah Sekolah Berhasil Diperbaharui']);
        }

        if ($param1 == 'historyDelete') {
            History::destroy($param2);
            return back()->with(['flash' => 'Data sekolah berhasil dihapus']);
        }

        if ($param1 == 'insertNews') {
            $this->validate($request, [
                'cat_news_id'       => 'required',
                'news_title'        => 'required',
                'news_description'  => 'required',
                'news_date'         => 'required',
                'news_author'       => 'required',
                'thumbnail'         => 'mimes:jpg,jpeg,png'
            ]);

            $news                   = new News;
            $news->cat_news_id      = $request->cat_news_id;
            $news->news_title       = $request->news_title;
            $news->news_description = $request->news_description;
            $news->news_date        = $request->news_date;
            $news->news_author      = $request->news_author;

            $news->thumbnail        = $this->uploadImage($request, 'thumbnail', 'website/news/');

            if ($request->tag_id) {
                $news->tag_id           = $request->tag_id;
            }

            $news->news_status      = $request->news_status;
            return $this->simpanData($news);
        }

        if ($param1 == 'updateNews') {
            $this->validate($request, [
                'cat_news_id'       => 'required',
                'news_title'        => 'required',
                'news_description'  => 'required',
                'news_author'       => 'required',
                'thumbnail'         => 'mimes:jpg,jpeg,png'
            ]);

            $news                   = News::findOrFail($request->id);
            $news->cat_news_id      = $request->cat_news_id;
            $news->news_title       = $request->news_title;
            $news->news_description = $request->news_description;
            $news->news_author      = $request->news_author;

            if ($request->hasFile('thumbnail')) {
                $news->thumbnail        = $this->uploadImage($request, 'thumbnail', 'website/news/');
            }

            if ($request->tag_id) {
                $news->tag_id           = $request->tag_id;
            }

            $news->news_status      = $request->news_status;
            return $this->simpanData($news);
        }

        if ($param1 == 'deleteNews') {
            $data = News::findOrFail($param2);
            return $this->deleteData($data, $param2);
        }

        if ($param1 == 'gallery') {
            $this->validate($request, [
                'caption_name'  => 'required',
                'image'         => 'mimes:jpg,jpeg,png'
            ]);

            $gallery        = new Gallery;
            if ($request->hasFile('image')) {
                $gallery->image = $request->file('image')->store('uploads/website/gallery/');
            }

            $gallery->caption_name  = $request->caption_name;
            $gallery->save();
            return back()->with(['flash' => 'Gallery Berhasil ditambahkan']);
        }

        if ($param1 == 'updateGallery') {
            $this->validate($request, [
                'caption_name'  => 'required',
                'id'            => 'required',
                'image'         => 'mimes:jpg,jpeg,png|required'
            ]);

            $gallery        = Gallery::findOrFail($request->id);
            $data           = Gallery::where('id', $request->id)->first();
            if ($request->hasFile('image')) {
                $gallery->image = $request->file('image')->store('uploads/website/gallery/');
            } else {
                $gallery->image = $gallery->image;
            }

            $gallery->caption_name  = $request->caption_name;

            $gallery->save();

            return back()->with(['flash' => 'Gallery Berhasil diperbaharui']);
        }

        if ($param1 == 'deleteGallery') {
            $this->validate($request, [
                'id'        => 'required'
            ]);

            Gallery::destroy($request->id);
            return back()->with(['flash' => 'Gallery Berhasil dihapus']);
        }

        if ($param1 == 'catEvenet' || $param1 == 'updateCatEvent') {

            $this->validate($request, [
                'cat_name'      => 'required',
                'cat_icon'      => 'mimes:jpg,jpeg,png'
            ]);

            if ($param1 == 'catEvenet') {
                $eventcat            = new EventCat;
                $eventcat->cat_icon = $this->uploadImage($request, 'cat_icon', 'website/catevent/');
            }

            if ($param1 == 'updateCatEvent') {
                $eventcat            = EventCat::findOrFail($request->id);
                if ($request->hasFile('cat_icon')) {
                    $eventcat->cat_icon =  $this->uploadImage($request, 'cat_icon', 'website/catevent/');
                }
            }

            $eventcat->cat_name  = $request->cat_name;
            if ($request->cat_status) {
                $eventcat->cat_status = $request->cat_status;
            } else {
                $eventcat->cat_status = 0;
            }
            return $this->simpanData($eventcat);
        }

        if ($param1 == 'deleteCatEvent') {
            $data   = EventCat::findOrFail($param2);
            return $this->deleteData($data, $param2);
        }

        if ($param1 == 'events' || $param1 == 'eventUpdate') {
            $this->validate($request, [
                'event_cat_id'          => 'required',
                'event_title'           => 'required',
                'event_image'           => 'mimes:jpg,jpeg,png',
                'start_date'            => 'required',
            ]);

            if ($param1 == 'events') {
                $events                     = new Event;
                $events->event_image = $this->uploadImage($request, 'event_image', 'website/events/');
            }

            if ($param1 == 'eventUpdate') {
                $events                     = Event::findOrFail($request->id);
                if ($request->hasFile('event_image')) {
                    $events->event_image = $this->uploadImage($request, 'event_image', 'website/events/');
                }
            }

            $events->event_cat_id       = $request->event_cat_id;
            $events->event_title        = $request->event_title;

            if ($request->hasFile('event_image')) {
                $events->event_image = $request->file('event_image')->store('uploads/website/events/');
            }

            if ($request->start_date) {
                $events->start_date         = $request->start_date;
            }

            if ($request->end_date) {
                $events->end_date           = $request->end_date;
            }

            if ($request->event_description) {
                $events->event_description  = $request->event_description;
            }

            if ($request->event_status) {
                $events->event_status       = $request->event_status;
            }

            return $this->simpanData($events);
        }

        if ($param1 == 'eventDelete') {
            $data = Event::findOrFail($param2);
            return $this->deleteData($data, $param2);
        }

        if ($param1 == 'delContact') {
            Contact::destroy($param2);
            return back()->with(['flash' => 'Data Kontak Masuk berhasil dihapus']);
        }

        if ($param1 == 'insert-page') {
            $this->validate($request, [
                'page_name'     => 'required',
                'page_status'   => 'required',
                'position'      => 'required',
                'image'         => 'mimes:jpg,jpeg,png'
            ]);

            $builder                = new PageBuilder;
            $builder->page_name     = $request->page_name;
            $builder->page_status   = $request->page_status;
            $builder->slug_name     = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $request->slug_name));
            $builder->position      = $request->position;

            if ($request->content) {
                $builder->content   = $request->content;
            }

            $builder->image         = $this->uploadImage($request, 'image', 'website/page/');

            return $this->simpanData($builder);
        }

        if ($param1 == 'update-page') {

            $this->validate($request, [
                'page_name'     => 'required',
                'page_status'   => 'required',
                'position'      => 'required',
                'image'         => 'mimes:jpg,jpeg,png'
            ]);

            $builder                = PageBuilder::findOrFail($request->id);
            $builder->page_name     = $request->page_name;
            $builder->page_status   = $request->page_status;
            $builder->slug_name     = strtolower(preg_replace("/[^a-zA-Z0-9]/", "-", $request->slug_name));
            $builder->position      = $request->position;

            if ($request->content) {
                $builder->content   = $request->content;
            }

            if ($request->hasFile('image')) {
                $builder->image         = $this->uploadImage($request, 'image', 'website/page/');
            }

            return $this->simpanData($builder);
        }
    }

    public function teacherList()
    {
        $sett   = SettWebsite::first();
        $data   = Teacher::paginate(10);
        return view('website.' . $this->websiteTheme() . '.teacher.list', ['page' => 'Daftar Guru Sekolah'], compact('sett', 'data'));
    }

    public function teacherDetail($id, $any)
    {
        $sett   = SettWebsite::first();
        $data   = Teacher::findOrFail($id);
        return view('website.' . $this->websiteTheme() . '.teacher.detail', ['page' => 'Detail Guru'], compact('sett', 'data'));
    }

    public function facilityWeb()
    {
        $sett   = SettWebsite::first();
        $data   = Fasilitas::all();
        return view('website.' . $this->websiteTheme() . '.page.facility', ['page' => 'Fasilitas Sekolah'], compact('sett', 'data'));
    }

    public function extra_web()
    {
        $sett   = SettWebsite::first();
        $data   = Extrakulikuler::all();
        return view('website.' . $this->websiteTheme() . '.page.extrakulikuler', ['page' => 'Extrakulikuler'], compact('sett', 'data'));
    }

    public function extraDetail($id, $any)
    {
        $sett   = SettWebsite::first();
        $data   = Extrakulikuler::findOrFail($id);
        return view('website.' . $this->websiteTheme() . '.page.detailExtra', ['page' => 'Detail Extrakulikuler'], compact('sett', 'data'));
    }

    public function prestasiList()
    {
        $sett   = SettWebsite::first();
        $data   = Archivement::orderBy('id', 'DESC')->get();
        return view('website.' . $this->websiteTheme() . '.page.prestasi', ['page' => 'Prestasi Diraih'], compact('sett', 'data'));
    }

    public function prestasiDetail($id, $any)
    {
        $sett   = SettWebsite::first();
        $data   = Archivement::findOrFail($id);
        return view('website.' . $this->websiteTheme() . '.page.detailPrestasi', ['page' => 'Detail Prestasi'], compact('sett', 'data'));
    }

    public function pageLaman($id)
    {
        $sett   = SettWebsite::first();
        $data   = PageBuilder::findOrFail(decrypt($id));
        return view('website.' . $this->websiteTheme() . '.page.laman', ['page' => 'Detail Prestasi'], compact('sett', 'data'));
    }

    public function mapelPage()
    {
        $sett   = SettWebsite::first();
        $data   = Mapel::orderBy('mapel_name')->get();
        return view('website.' . $this->websiteTheme() . '.page.mapel', ['page' => 'Mata Pelajaran'], compact('sett', 'data'));
    }
}
