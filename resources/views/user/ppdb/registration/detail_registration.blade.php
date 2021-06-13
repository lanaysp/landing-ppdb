@extends('user.app_ppdb')
@section('content')
<div class="container-fluid site-width">
    <div class="row row-eq-height">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="{{route('ppdb.registrasi')}}" class="bg-primary float-left mr-3  py-1 px-2 rounded text-white">
                            Kembali
                        </a>
                        <a href="{{route('ppdb.pdf_view',[$data->id,strtolower(preg_replace("/[^a-zA-Z0-9]/","-",$data->nik))])}}" class="bg-primary float-left mr-3  py-1 px-2 rounded text-white">
                            <i class="fas fa-file"></i> Cetak Ke PDF
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <address>
                                            <strong>Your Store</strong><br>
                                            2940 Rainbow Road Alhambra, CA 91801 California </address>
                                        <b>Telephone:</b> 123456789<br>
                                        <b>E-Mail:</b> demo@demo.com<br>
                                        <b>Web Site:</b> <a href="#">http://abc.com</a>
                                    </td>
                                    <td><b>Date Added:</b> 26/09/2016<br>
                                        <b>Order ID:</b> 3135<br>
                                        <b>Payment Method:</b> Cash On Delivery<br>
                                        <b>Shipping Method:</b> Flat Shipping Rate<br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="card border-0">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td style="width: 50%;"><b>To</b></td>
                                    <td style="width: 50%;"><b>Ship To (if different address)</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <address>
                                            2940 Rainbow Road<br>Alhambra, CA<br>91801 California </address>
                                    </td>
                                    <td>
                                        <address>
                                            1424 Brown Avenue<br>Knoxville, TN<br>91801 Tennessee </address>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="card border-0">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><b>Product</b></td>
                                    <td><b>Model</b></td>
                                    <td class="text-right"><b>Quantity</b></td>
                                    <td class="text-right"><b>Unit Price</b></td>
                                    <td class="text-right"><b>Total</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>HP LP3065 <br>
                                        &nbsp;<small> - Delivery Date: 2011-04-22</small>
                                    </td>
                                    <td>Product 21</td>
                                    <td class="text-right">1</td>
                                    <td class="text-right">$122.00</td>
                                    <td class="text-right">$122.00</td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Sub-Total</b></td>
                                    <td class="text-right">$100.00</td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Flat Shipping Rate</b></td>
                                    <td class="text-right">$5.00</td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Eco Tax (-2.00)</b></td>
                                    <td class="text-right">$4.00</td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>VAT (20%)</b></td>
                                    <td class="text-right">$21.00</td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Total</b></td>
                                    <td class="text-right">$130.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="card redial-border-light redial-shadow">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><b>Comment</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>This is comment section</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
@endsection