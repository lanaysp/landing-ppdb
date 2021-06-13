<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Kartu Pserta PPDB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css" media="print">
        * {
            -webkit-print-color-adjust: exact !important;
            /*Chrome, Safari */
            color-adjust: exact !important;
            /*Firefox*/
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");

        body {
            font-size: 16px;
            color: #404040;
            font-family: Montserrat, sans-serif;

            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 2rem 0;
            display: grid;
            place-items: center;
            box-sizing: border-box;
        }

        .card {
            background-color: #fff;
            max-width: 860px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border-radius: 2rem;
            box-shadow: 0px 1rem 1.5rem rgba(0, 0, 0, 0.5);
        }

        .hallo {
            background-image: url("{{my_asset($setts->background_image)}}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 11rem;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            box-sizing: border-box;
        }

        .card .hallo img {
            background-color: #fff;
            width: 8rem;
            height: 8rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            transform: translateY(50%);
            transition: transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
        }

        .card .hallo svg:hover {
            transform: translateY(50%) scale(1.3);
        }

        .card .menu {
            width: 100%;
            height: 5.5rem;
            padding: 1rem;
            display: flex;
            align-items: flex-start;
            justify-content: flex-end;
            position: relative;
            box-sizing: border-box;
        }

        .card .menu .opener {
            width: 2.5rem;
            height: 2.5rem;
            position: relative;
            border-radius: 50%;
            transition: background-color 100ms ease-in-out;
        }

        .card .menu .opener:hover {
            background-color: #f2f2f2;
        }

        .card .menu .opener span {
            background-color: #404040;
            width: 0.4rem;
            height: 0.4rem;
            position: absolute;
            top: 0;
            left: calc(50% - 0.2rem);
            border-radius: 50%;
        }

        .card .menu .opener span:nth-child(1) {
            top: 0.45rem;
        }

        .card .menu .opener span:nth-child(2) {
            top: 1.05rem;
        }

        .card .menu .opener span:nth-child(3) {
            top: 1.65rem;
        }

        .card h2.name {
            text-align: center;
            padding: 0 2rem 0.5rem;
            margin: 0;
        }

        .card .title {
            color: #a0a0a0;
            font-size: 0.85rem;
            text-align: center;
            padding: 0 2rem 1.2rem;
        }

        .card .actions {
            padding: 0 2rem 1.2rem;
            display: flex;
            flex-direction: column;
            order: 99;
        }

        .card .actions .follow-info {
            text-align: center;
        }

        .card .actions .follow-info img {
            width: 200px;
        }

        .card .actions .follow-btn button {
            color: inherit;
            font: inherit;
            font-weight: bold;
            background-color: #ffd01a;
            width: 100%;
            border: none;
            padding: 1rem;
            outline: none;
            box-sizing: border-box;
            border-radius: 1.5rem/50%;
            transition: background-color 100ms ease-in-out,
                transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
        }


        .card .desc {
            text-align: justify;
            padding: 0 2rem 2.5rem;
            order: 100;
        }
    </style>
</head>

<body onload="window.print()">
    <!-- partial:index.partial.html -->
    <div class="card">
        <div class="hallo">
            <img src="{{my_asset($data->photo)}}">
        </div>
        <div class="menu">
        </div>
        <h2 class="name">{{$data->nama_lengkap}}</h2>
        <div class="title">{{$data->gelombang_daftar->nama_gelombang}}</div>
        <div class="title" style="margin-top: -20px;">{{$data->gelombang_daftar->tahun->nama_tahunajaran}}</div>
        <div class="title"><b>{{$sett->school_name}}</b></div>
        <div class="actions">
            <div class="follow-info">
            <?= QrCode::size(200)->generate(env('APP_URL').'/ppdb/app/register-ppdb/kartu-peserta/'.encrypt($data->id)); ?>
            </div>
            <br>
            <div class="follow-btn">
                <button>Scan Untuk Melihat Detail</button>
            </div>
        </div>

    </div>
</body>

</html>