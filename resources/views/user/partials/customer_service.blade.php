<div id='whatsapp-chat' class='hide'>
    <div class='header-chat'>
        <div class='head-home'>
            <h3>&nbsp;&nbsp;&nbsp;Hallo !</h3>
            <p>Jika Anda Mengalami kesulitan, Anda dapat menghubungi Customer Service dibawah ini.</p>
        </div>
        <div class='get-new hide'>
            <div id='get-label'></div>
            <div id='get-nama'></div>
        </div>
    </div>
    <div class='home-chat'>
        <?php

        use App\Ppdb\CustomerService;

        $cs_supports        = CustomerService::where('status', '1')->get();
        ?>
        @foreach($cs_supports as $supports)
        <a class='informasi' href='javascript:void' title='Chat Whatsapp'>
            <div class='info-avatar'><img src='{{my_asset($supports->pengguna->Employee->photo)}}' /></div>
            <div class='info-chat'>
                <span class='chat-label'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$supports->pengguna->Employee->first_name}} {{$supports->pengguna->Employee->middle_name}} {{$supports->pengguna->Employee->last_name}} </span>
                <span class='chat-nama'>{{$supports->pengguna->Employee->designation->designation_name}}</span>
            </div><span class='my-number'>{{$supports->phone}}</span>
        </a>
        @endforeach

    </div>
    <div class='start-chat hide'>
        <div class='first-msg'>
            <span></span>
        </div>
        <div class='blanter-msg'>
            <textarea id='chat-input' placeholder='Tulis Pesan Anda Disini ' maxlength='120' row='1'></textarea>
            <a href='javascript:void;' id='send-it'>Kirim</a>
        </div>
    </div>
    <div id='get-number'></div><a class='close-chat' href='javascript:void'>×</a>
</div>
<a class='blantershow-chat' href='javascript:void' title='Show Chat'><i class='fab fa-whatsapp'></i>Butuh bantuan ?</a>
