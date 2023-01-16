@extends('isp::access')

@section('content')
        @csrf
        <div class="relative overflow-hidden mb-8">
            <div class="overflow-hidden px-3 py-10 flex justify-center">
                <div class="w-full max-w-xs login-card">
                    <h3 style="text-align: center"> - Payment - </h3>
                    <div class="bg-white pt-6 mb-4">
                        <!-- Tab links -->
                        <div class="tab">
                            <a class="tablinks active" onclick="openCity(event, 'STKPUSH')">STK Push</a>
                            <a class="tablinks" onclick="openCity(event, 'TILLNO')">Till No</a>
                            <a class="tablinks" onclick="openCity(event, 'PAYBILL')">Paybill</a>
                        </div>

                        

                        <!-- Tab content -->
                        <div id="STKPUSH" class="tabcontent active" style="display: block">
                            <form method="POST" action="{{ url(route('isp_access_stkpush')) }}">
                                @csrf
        
                                <br>
                                <h3>MPesa STK Push</h3>
                                <small>
                                    - Please Enter you <b>Phone Number</b> that you would like us to send <b>MPESA
                                        STK Push.</b>
                                </small>
                                <br>
                                <div class="mb-4">
                                    <br>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                        Phone Number
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="phone" value="{{ $phone }}"
                                        @if ($request_sent) readonly @endif name="phone" type="text"
                                        placeholder="Phone">
                                </div>
                               
                                <div style="text-align:center; margin-top:20px;">
                                    @if ($request_sent)
                                        <input type="hidden" name="verifying" value="1">
                                        <b>After receiving the payment confirmation message,press "Verify Payment" to finish
                                            making payment.</b>
                                        <button id='stkpush' type="submit" name="view" value="stkpush_{{ $invoice->id }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Verify Payment
                                        </button>
                                    @else
                                        <button id='stkpush' type="submit" name="view" value="stkpush_{{ $invoice->id }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Send STK Push
                                        </button>
                                    @endif
                                </div>


                            </form>
                        </div>

                        <div id="TILLNO" class="tabcontent">
                            <form method="POST" action="{{ url(route('isp_access_tillno')) }}">
                                @csrf
        
                                <br>
                                <h3>TILL No</h3>
                                <small>
                                    - ONLY <strong>SAFARICOM/MPESA</strong> Accepted.<br />
                                    - Please Go to <strong>LIPA na MPesa</strong><br />
                                    - Select <strong>Buy Goods and Services</strong><br />
                                    - Send to Till Number <strong>{{ $gateway->till_bill_no }}</strong><br />
                                </small>
                                <div class="mb-4">
                                    <br>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="mpesa_code">
                                        MPESA CODE
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="mpesa_code" name="mpesa_code" type="text" placeholder="MPesa Code">
                                </div>
                                <div style="text-align:center; margin-top:20px;">
                                    <button id='tillno' type="submit" name="view" value="tillno_{{ $invoice->id }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Verify MPesa Code
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="PAYBILL" class="tabcontent">
                            <form method="POST" action="{{ url(route('isp_access_paybill')) }}">
                                @csrf
        
                                <br>
                                <h3>Paybill No</h3>
                                <small>
                                    - ONLY <strong>SAFARICOM/MPESA</strong> Accepted.<br />
                                    - Please Go to <strong>LIPA na MPesa</strong><br />
                                    - Select <strong>Paybill</strong><br />
                                    - Send to Paybill Number <strong>{{ $gateway->till_bill_no }}</strong><br />
                                    - Send to Account Name <strong>{{ $user->username }}</strong><br />
                                </small>
                                <div style="text-align:center; margin-top:20px;">
                                    <button id='paybill' type="submit" name="view" value="paybill_{{ $invoice->id }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Verify MPesa
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <p class="text-center text-gray-500 text-xs">
                        &copy;2022. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </form>
@endsection
