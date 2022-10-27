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
                            id="phone" name="phone" type="text" placeholder="Phone">
                    </div>
                </div>

                <div id="TILLNO" class="tabcontent">
                    <br>
                    <h3>TILL No</h3>
                    <small>
                        - Send Money to Till Number <b>232323</b> and enter the Mpesa Code
                    </small>
                    <br>
                    <div class="mb-4">
                        <br>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="mpesa_code">
                            MPESA CODE
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="mpesa_code" name="mpesa_code" type="text" placeholder="MPesa Code">
                    </div>
                </div>

                <div id="PAYBILL" class="tabcontent">
                    <br>
                    <h3>Paybill No</h3>
                    <small>
                        - Send Money to Pay Bill Number <b>232323</b> and enter the Account as
                        <b>{{ $username }}</b>
                    </small>
                    <br>
                 
                </div>




                <div style="text-align:center; margin-top:20px;">
                    <button id='register' type="submit" name="view" value="register"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Complete Payment
                    </button>
                </div>
            </div>
            <p class="text-center text-gray-500 text-xs">
                &copy;2022. All rights reserved.
            </p>
        </div>
    </div>
</div>
