@extends('layouts.buyer')
@section('title', 'Vehicle Search')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('buyer.includes.navbar')
    <!-- end Topbar -->
    <div class="v-search container-fluid">
        <div class="allMaker mt-4">
            <div class="row">
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-primary btn-block mb-3" id="showRange">Citroen</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-primary btn-block mb-3">Fiat</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-primary btn-block mb-3">Ford</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-primary btn-block mb-3">Peugeot</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-primary btn-block mb-3">Renault</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-primary btn-block mb-3">Volkswagen</a>
                </div>
            </div>
        </div>
        <div class="allRange" style="display: none">
            <h3 class="mt-2 mb-2">Manufacturer: <strong>Audi</strong></h3>
            <div class="row">
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3" id="showModel">A1</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">A3</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">A4</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">A5</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">A6</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">A7</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">A8</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">Q2</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">Q3</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">Q4</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">Q5</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">Q6</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">Q7</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">R8</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">E-TRON</a>
                </div>
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn-success btn-block mb-3">E-TRON GT</a>
                </div>
            </div>
            <div class="float-right mt-2 mb-2">
                <button type="button" class="btn btn-dark" id="goToAllRange">Go Back</button>
            </div>
        </div>
        <div class="allModels" style="display: none;clear:both">
            <h4>Range: <strong>A4</strong></h4>
            <div class="row">
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-danger btn-block mb-3" id="showVariant">A4 Avant</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-danger btn-block mb-3">A4 Diesel Avant</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-danger btn-block mb-3">A4 Diesel Saloon</a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-danger btn-block mb-3">A4 Saloon</a>
                </div>
            </div>
            <div class="float-right mt-2 mb-2">
                <button type="button" class="btn btn-dark" id="goToAllMaker">Go Back</button>
            </div>
        </div>
        <div class="allVariants" style="display: none;clear:both">
            <h4>Model: <strong>A4 Avant</strong></h4>
            <div class="row">
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3" id="showVdetails">35 TFSI Black Edition 5dr S Tronic </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">35 TFSI Black Edition 5dr S Tronic [Tech Pack]  </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">40 TFSI 204 S Line 5dr S Tronic [Tech Pack]  </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">40 TFSI 204 Sport 5dr S Tronic [17" Alloy]  </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">40 TFSI 204 Sport 5dr S Tronic [Tech Pack] </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3"> 35 TFSI S Line 5dr S Tronic  </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">35 TFSI Black Edition 5dr S Tronic </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">35 TFSI Black Edition 5dr S Tronic [Tech Pack]  </a>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn-info btn-block mb-3">40 TFSI 204 S Line 5dr S Tronic [Tech Pack]  </a>
                </div>
            </div>
            <div class="float-right mt-2 mb-2">
                <button type="button" class="btn btn-dark" id="goToAllModel">Go Back</button>
            </div>
        </div>
        <div class="vehicle-details" style="display: none;clear:both">
            <h4 class="mt-3 mb-2">Vehicle details: <strong>A4 Avant</strong></h4>
            <h3 class="mt-4 mb-1 text-center"><span style="color:chocolate">Renault Trafic</span> , 
                <span>SL30 Blue dCi 130PS Start Panel Van</span>
                <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
                <span style="display:inline-block;margin-left: 20px;margin-right:20px"> Model: <span style="color:cadetblue">X82</span></span>
                <span style="display:inline-block;margin-left: 20px;margin-right:20px"> | </span>
                <span>UVC: <span style="color:deeppink">M-BAGAV</span></span>
            </h3>
            <div class="mt-3 table-responsive">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                    <thead>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>List Price</th>
                        <th>Discount Price</th>
                    </thead>
                    <tr>
                        <td>102123</td>
                        <td>Base Vehicle</td>
                        <td></td>
                        <td>£ 20,433.33</td>
                        <td>£ 17,981.33</td>
                    </tr>
                    <tr>
                        <td>102123</td>
                        <td>Additional Discount</td>
                        <td></td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>-1</td>
                        <td>Twelve Months Road Tax</td>
                        <td>on the road</td>
                        <td>£ 210.00</td>
                        <td>£ 210.00</td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>Registration Fee</td>
                        <td>on the road</td>
                        <td>£ 55.00</td>
                        <td>£ 55.00</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Delivery</td>
                        <td>on the road</td>
                        <td>£ 795.00</td>
                        <td>£ 795.00</td>
                    </tr>
                    <tr>
                        <td>142911</td>
                        <td>Black roof and A pillar</td>
                        <td>exterior features</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>181147</td>
                        <td>Two coat premium metallic - Crimson red</td>
                        <td>paintwork</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>150146</td>
                        <td>Alcantara seat trim - Jet black</td>
                        <td>trim</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td>69372</td>
                        <td>Tyre repair kit</td>
                        <td>wheels</td>
                        <td>£ 0.00</td>
                        <td>£ 0.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;background: #000;color:#fff">TOTAL (ex VAT)</td>
                        <td style="background: #000;color:#fff">£ 21,493.33</td>
                        <td style="background: #000;color:#fff">£ 19,041.33</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;color:#000">VAT</td>
                        <td style="background: #000;color:#fff">&nbsp;</td>
                        <td style="color:#000">£ 3,755.27</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;background: #000;color:#fff">Grand Total</td>
                        <td style="background: #000;color:#000">&nbsp;</td>
                        <td style="background: #000;color:#fff">£22,796.60</td>
                    </tr>
                </tbody>
            </table>
            <div class="mb-2">
                <div class="float-right">
                    <button class="btn btn-danger ms-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        VEHICLE STANDARD DETAILS
                    </button>
                    <a href="{{ route('buyer.buyStock') }}" class="btn btn-primary">PLACE ORDER</a>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="vehicle-details" style="clear:both">
                    <h4>Vehicle details</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td><strong>Maker</strong></td>
                                        <td>Ford</td>
                                    </tr>
                                    <tr>
                                        <td><strong>UVC</strong></td>
                                        <td>M-AACQJ</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Range</strong></td>
                                        <td>Transit</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model</strong></td>
                                        <td>Transit 350 Trend EcoBlue</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mark</strong></td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model Series</strong></td>
                                        <td>V63</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fuel Type</strong></td>
                                        <td>Diesel</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicle Class</strong></td>
                                        <td>LCV</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Body Shape</strong></td>
                                        <td>Semi High Roof</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Body Style</strong></td>
                                        <td>Panel Van</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Doors</strong></td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gross Vehicle Weight (KG)</strong></td>
                                        <td>3500</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Power Delivery</strong></td>
                                        <td>ICE</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Engine Capacity (CC)</strong></td>
                                        <td>1996</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Engine Capacity (Litres)</strong></td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Aspiration</strong></td>
                                        <td>Turbocharged</td>
                                    </tr>
                                    <tr>
                                        <td><strong>KW</strong></td>
                                        <td>125</td>
                                    </tr>
                                    <tr>
                                        <td><strong>BHP</strong></td>
                                        <td>167</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number Of Gears</strong></td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Transmission Type</strong></td>
                                        <td>Manual</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Drive Type</strong></td>
                                        <td>4X2</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Driving Axle</strong></td>
                                        <td>Front</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Battery Capacity</strong></td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicle Type</strong></td>
                                        <td>ICE</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Model Status</strong></td>
                                        <td>Current</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vehicles On The Road</strong></td>
                                        <td>TRUE</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Document Version</strong></td>
                                        <td>89</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
  $("#showRange").click(function(){ 
    $(".allRange").slideDown("slow");
    $(".allMaker").hide();
  });
  $("#showModel").click(function(){ 
    $(".allModels").slideDown("slow");
    $(".allRange").hide();
  });
  $("#showVariant").click(function(){ 
    $(".allVariants").slideDown("slow");
    $(".allModels").hide();
  });
  $("#showVdetails").click(function(){ 
    $(".vehicle-details").slideDown("slow");
    $(".allVariants").hide();
  });
  $("#goToAllRange").click(function(){ 
    $(".allMaker").slideDown("slow");
    $(".allRange").hide();
  });
  $("#goToAllMaker").click(function(){ 
    $(".allRange").slideDown("slow");
    $(".allModels").hide();
  });
  $("#goToAllModel").click(function(){ 
    $(".allModels").slideDown("slow");
    $(".allVariants").hide();
  });
  $("#goToAllVariants").click(function(){ 
    $(".allVariants").slideDown("slow");
    $(".vehicle-details").hide();
  });
});
</script>
@endpush

@endsection