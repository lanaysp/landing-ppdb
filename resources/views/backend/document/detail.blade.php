<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{$page}}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/app.min.css')}}">

    <link rel="stylesheet" href="{{my_asset('admin/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{my_asset('admin/theme/css/components.css')}}">
    <style type="text/css" media="print">
        * {
            -webkit-print-color-adjust: exact !important;
            /*Chrome, Safari */
            color-adjust: exact !important;
            /*Firefox*/
        }
    </style>
</head>

<body onload="window.print()">

    <div>
        <div class="main-wrapper ">

            <div style="margin: 30px;">
                <section class="section">
                    <div class="section-body">
                        <div class="row mt-sm-12">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card author-box" style="background-image: url(<?= my_asset($data->background); ?>);">
                                    <div class="card-body">
                                        <div class="author-box-center">
                                            <img alt="image" src="{{my_asset($data->school_logo)}}" style="max-width: 300px;">
                                            <div class="clearfix"></div>
                                            <div class="author-box-name">
                                                <h1 class="mb-0">{{$data->school_name}}</h1>
                                                <div class="dropdown-divider" style="margin-top: -2px;"></div>
                                                <p style="margin-top: -5px;">{{$data->school_address}}<br></p>
                                                <p style="margin-top: -20px;"> Sample Subject Title Terkait Kepentingan Surat ini dibuat </p>
                                                <div class="dropdown-divider mb-5" style="border-bottom: 5px solid black;"></div>
                                            </div>
                                        </div>

                                        <div class="author-box">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu</p>
                                        </div>

                                        <div class="py-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="float-left">
                                                        <?= QrCode::size(200)->generate(env('APP_URL') . '/document/' . encrypt('kmzway87aa')); ?>
                                                    </span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="float-right text-muted">
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Chris_Hemsworth_Signature.png" style="max-width: 300px;">
                                                        <br>
                                                        <p style="font-size: 24px;"><b>M Dede Hidayat</b></p>
                                                        <div class="dropdown-divider mb-1" style="border-bottom: 1px solid black; width: 200px;"></div>
                                                        <p style="font-size: 24px;"><b>Directur Utama</b></p>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{my_asset('admin/theme/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <script src="{{my_asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <script src="{{my_asset('admin/theme/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{my_asset('admin/theme/js/custom.js')}}"></script>
</body>

</html>