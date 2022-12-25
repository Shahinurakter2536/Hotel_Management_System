@extends('frontend.layouts.app')

@section('title','booking')


@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/Redmond/jquery-ui.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{asset('frontend/mselect/chosen.min.css')}}">
@endpush



@section('content')

<div class="hero-wrap" style="background-image: url({{asset('uploads/room/'. $room->image)}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <h1 class="mb-4 bread"> Booking</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="col-lg-12">
            <div class="sidebar-wrap bg-light ftco-animate">
                <h3 class="heading mb-4">Advanced Search</h3>

                @php
                $stripe_key = 'pk_test_51KxyHYIEYo0gWEDaaiUzb6i8F4yqVaOwX82dZYVtbyhTtQbBk7XT4aUv0uiiTa2jXMiAiIlkHhz6NkUjiYa32maV00zFBppqiU';
                @endphp

                <form action="{{route('store', $room->id)}}" method="post">
                    @csrf
                    <div class="fields col-md-12">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="checkin_date" class="form-control " id="checkin" placeholder="Check In Date" onchange="t_price()" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="checkout_date" class="form-control " id="checkout" placeholder="Check Out Date" onchange="t_price()" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                <small for="">Total Price:</small>
                                    <p class="form_control border p-3" id="show_price">BDT {{$room->price}}/- per night</p>
                                </div>
                                <div class="form-group col-md-6">
                                <small for="">Payable amount in advance using mobile banking (bkash | rocket):</small>
                                <p class="form_control border p-3" id="in_advance">BDT {{$room->price/2}}/- <small>(50%)</small></p>
                                </div>
                            </div>
                            <div class="select-wrap one-third">
                                <input type="hidden" name="price" value="{{$room->price}}" class="form-control" id="total_price" readonly>
                            </div>

                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <small for="">Total adults:</small>
                                    <input type="text" name="person" value="{{$room->person}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <label>Add Facilities</label><br>
                                    <small>choose some of our best food facilities</small>
                                    <select name="facilities[]" id="mselect" multiple="" class="form-select form-control">
                                        @foreach($facilities as $facility)
                                        <option value="{{$facility->name}}">{{$facility->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Payment Method</label><br>
                                <small>Enter the payment method</small>
                                <select name="payment_method" id="payment_method" onchange="payment()" class="form-select form-select-sm form-control p-10" required>
                                    <option value="1" selected>Pay at Hotel</option>
                                    <option value="2">Bkash</option>
                                    <option value="3">Rocket</option>
                                </select>
                            </div>

                            <div class="form-group" id="cod">
                                <div class="card w3-container w3-center w3-animate-right" style="width: 18rem;">
                                    <img src="https://www.pngitem.com/pimgs/m/46-468730_free-business-handshake-png-handshake-icon-png-transparent.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Pay at Hotel</h5>
                                        <p class="card-text">Please pay your advance payment for <strong class="text-success">Confirmation</strong>. and enter the transaction id below</p>
                                        <small class="card-text">Bkash: <small>01xxx xxx xxX</small></small>
                                        <small>t.id: </small>
                                        <input type="text" name="transection_id" class="form-control" placeholder="enter transection id">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="bkash" style="display: none;">
                                <div class="card w3-container w3-center w3-animate-right" style="width: 18rem;">
                                    <img src="https://www.tbsnews.net/sites/default/files/styles/big_2/public/images/2019/07/11/bkash_logo_0.jpg?itok=70lkuu3X&timestamp=1562856146" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Bkash</h5>
                                        <p class="card-text">Send your payment to this number <small>01xxx xxx xxX</small> and enter the transaction id below </p><br>
                                        <input type="text" name="transection_id" class="form-control" placeholder="ex: Td7zcY29cZ">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="rocket" style="display: none;">
                                <div class="card w3-container w3-center w3-animate-right" style="width: 18rem;">
                                    <img src="https://www.gomaxtracker.com/wp-content/uploads/2020/03/290.150-1.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Rocket</h5>
                                        <p class="card-text">Send your payment to this number <small>01xxx xxx xxX</small> and enter the transaction id below </p><br>
                                        <input type="text" name="transection_id" class="form-control" placeholder="ex: Td7zcY29cZ">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button id="card-button" class="btn btn-success btn-block" type="submit"> Confirm </button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</section>
</div>


@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript" src="{{asset('frontend/mselect/chosen.jquery.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#checkin").datepicker({
            showAnim: 'drop',
            numberOfMonth: 1,
            minDate: 0,
            dateFormat: 'mm/dd/yy',
            onClose: function(selectedDate) {
                var dt = new Date(selectedDate);
                dt.setDate(dt.getDate()+1)
                $("#checkout").datepicker("option", "minDate", dt);
            }
        });
        $("#checkout").datepicker({
            showAnim: 'drop',
            numberOfMonth: 1,
            minDate: 0,
            dateFormat: 'mm/dd/yy',
            onClose: function(selectedDate) {
                var dt = new Date(selectedDate);
                dt.setDate(dt.getDate()-1)
                $("#checkin").datepicker("option", "maxDate", dt);
            }
        });
    });
</script>

<script>
    function t_price() {
        var date1 = new Date(document.getElementById("checkin").value);
        var date2 = new Date(document.getElementById("checkout").value);
        if(date2>date1){
            var diffTime = Math.abs(date2 - date1);
        }else{
            var diffTime = Math.abs(date1 - date2);
        }
        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        var subtotal = document.getElementById("total_price").value;
        if (diffDays > 0) {
            var total = subtotal * diffDays;
            document.getElementById("show_price").innerHTML ="<small>BDT</small> "+ total + "/-";
            document.getElementById("in_advance").innerHTML ="<small>BDT</small> "+ total / 2 + "/- <small>(50% of total)</small>";
        }
    }
</script>

<script>
    function payment() {
        var payment_method = document.getElementById("payment_method").value;
        if (payment_method == 1) {
            document.getElementById("cod").style.display = "block";
            document.getElementById("bkash").style.display = "none";
            document.getElementById("rocket").style.display = "none";
        }
        if (payment_method == 2) {
            document.getElementById("bkash").style.display = "block";
            document.getElementById("rocket").style.display = "none";
            document.getElementById("cod").style.display = "none";
        }
        if (payment_method == 3) {
            document.getElementById("rocket").style.display = "block";
            document.getElementById("bkash").style.display = "none";
            document.getElementById("cod").style.display = "none";
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('#mselect').chosen();
    });
</script>
@endpush