<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<script src="https://www.paypal.com/sdk/js?client-id=AcAZ1vSjwT-FYf4BRQAKtuTxD_iipsis-2FfihamQLWyaCIgUAdhZpJPkkT7zVSVqx6VRZoDlnqEgn1l&currency=USD"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Fine') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                    <thead>
                      <tr>
                        
                        <th scope="col">Subject</th>
                        <th scope="col">Form</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Price</th>
                        <th scope="col">Pay</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($fine as $row)
                     <tr>
                        
                        <td>{{ $row->TbSubj }}</td>
                        <td>{{ $row->TbForm }}</td>
                        <td>{{ $row->TbCon }}</td>
                        <td>{{ $row->TbPrice }}</td>
                        <td><div id="paypal-button-container"></div>
                        <script>
                            paypal.Buttons({
                               // Sets up the transaction when a payment button is clicked
                                createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                    amount: {
                                        value: '12.50' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                                    }
                                    }]
                                });
                                },
                                // Finalize the transaction after payer approval
                                onApprove: function(data, actions) {
                                return actions.order.capture().then(function(orderData) {
                                    // Successful capture! For dev/demo purposes:
                                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                        var transaction = orderData.purchase_units[0].payments.captures[0];
                                        alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nThank you for your payment');
                                        
                                    
                                });
                                }
                            }).render('#paypal-button-container');
                            </script>
                    </td> 
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                  <a href= 'confirmPayment' class="btn btn-primary">Done</a>
                
                  

                </div>

            
            </div>
        </div>
    </div>
    
</body>
</html>


