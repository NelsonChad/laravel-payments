<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <link href="{{ asset('css/poppins.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        input {
            height: 45px;
        }

        
    </style>
</head>

<body class="antialiased">
    <div class="">
        @if (Route::has('login'))
            <div class="navbar navbar-expand-lg navbar-light bg-light justify-content-end px-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" type="button" class="btn btn-success">Login</a>
                @endauth
            </div>
        @endif

        <div class="container">

            <div class="row">
                <div class="col-2">
                    <img style="width: 100px; height: 100px;" class="image rounded" src="img/logo.jpg">
                </div>
                <div class="col">
                    <div>
                        <div class="d-flex justify-content-center">
                            <h3 style="color: #1B6CD3; font-family:verdana">Pagamentos</h3>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h6 style="color: #9a9c9b;">Área somente para efectuar pagamantos dos productos relacionados a Empresa.</h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h6 style="color: #1B6CD3;"><small>Escolha o seu melhor metodo de Pagamentos.</small></h6>
                        </div>
                    </div>
                    
                </div>
            </div>
           
            <br>
            <!-- START CONTENNT -->

            <div class="tab">
                <div style="padding: 10px; background-color: #fff">
                    <b class="title">Carteiras Móveis</b>
                </div>
                <button class="tablinks" onclick="openCity(event, 'mpesa')" id="defaultOpen" data-bs-toggle="tooltip" data-bs-placement="top">
                    <img class="image rounded" src="img/mpesa.png">
                    <label style="padding: 10px">M-Pesa</label>
                </button>
                <button class="tablinks" onclick="openCity(event, 'emola')">
                    <img class="image rounded" src="img/emola.png">
                    <label style="padding: 10px">E-Mola</label>
                </button>
                <button class="tablinks" onclick="openCity(event, 'mkesh')">
                    <img class="image rounded" src="img/mkesh.png">
                    <label style="padding: 10px">M-Kash</label>
                </button>
                <div style="padding: 10px; background-color: #fff">
                    <b class="title">Outros Métodos</b>
                </div>
                <button class="tablinks" onclick="openCity(event, 'visa')">
                    <img class="image rounded" src="img/visa.png">
                    <label style="padding: 10px">Visa</label>
                </button>
                <button class="tablinks" onclick="openCity(event, 'paypal')">
                    <img class="image rounded" src="img/paypal.png">
                    <label style="padding: 10px">Paypal</label>
                </button>
            </div>

            <div id="mpesa" class="tabcontent">
                @include('includes.alerts')
                <!--div class="d-flex justify-content-center">
                    <img style="width: 60px; height: 60px;" class="image rounded" src="img/mpesa.png"><br>
                </div-->
                <div class="d-flex justify-content-center">
                    <img style="width: 50px; height: 50px;" class="image rounded" src="img/mpesa.png"> 
                    <h3 class="title" style="padding: 10px">M-Pesa</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                    <h6>Instruções:</h6>
                    <ol type="1">
                        <li><small>Tenha o seu celular com o M-Pesa na mão</small></li>
                        <li><small>Digite e seu número de celular e montante que pretende transferir e insira o seu PIN do M-Pesa no seu celular</small></li>
                    </ol>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <form style="width: 300px;" method="POST" action="{{ route('customer.mpesa.payment') }}" action="/process-payment" method="POST">
                        @csrf                        
                        <br>
                        <label for="phone_number">Número de Celular</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i style="color: #E41E26" class="fas fa-mobile-alt"></i>
                            </span>
                            <input type="tel" class="form-control" id="phone_number" aria-describedby="numberHelp"
                                placeholder="Digite o número" name="phone_number"  required>
                           
                        </div>
                   
                        <label for="amount">Montante</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <h6>MZN</h6>
                            </span>
                            <input type="number" class="form-control" name="amount" id="amount" required
                                placeholder="digite o montante a transferir">
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger">Transferir</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="emola" class="tabcontent">
                @include('includes.alerts')
                <div class="d-flex justify-content-center">
                    <img style="width: 50px; height: 50px;" class="image rounded" src="img/emola.png"> 
                    <h3 class="title" style="padding: 10px">E-Mola</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                    <h6>Instruções:</h6>
                    <ol type="1">
                        <li><small>Tenha o seu celular com o E-Mola na mão</small></li>
                        <li><small>Digite e seu número de celular e montante que pretende transferir e insira o seu PIN do M-Pesa no seu celular</small></li>
                    </ol>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <form style="width: 300px;" method="POST" action="{{ route('customer.mpesa.payment') }}" action="/process-payment" method="POST">
                        @csrf                        
                        <br>
                        <label for="phone_number">Número de Celular 86</label>
                        <div class="input-group mb-3">
                            <span  class="input-group-text success">
                                <i style="color: #FF8800" class="fas fa-mobile-alt"></i>
                            </span>
                            <input type="tel" class="form-control" id="phone_number" aria-describedby="numberHelp"
                                placeholder="Digite o número" name="phone_number"  required>
                           
                        </div>
                   
                        <label for="amount">Montante</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i style="color: #FF8800" class="fas fa-dollar-sign"></i>
                            </span>
                            <input type="number" class="form-control" name="amount" id="amount" required
                                placeholder="digite o montante a transferir">
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button type="submit" style="background-color: #FF8800" class="btn">Transferir</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="mkesh" class="tabcontent">
                @include('includes.alerts')
                <div class="d-flex justify-content-center">
                    <img style="width: 50px; height: 50px;" class="image rounded" src="img/mkesh.png"> 
                    <h3 class="title" style="padding: 10px">M-Kesh</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                    <h6>Instruções:</h6>
                    <ol type="1">
                        <li><small>Tenha o seu celular com o M-Kesh na mão</small></li>
                        <li><small>Digite e seu número de celular e montante que pretende transferir e insira o seu PIN do M-Pesa no seu celular</small></li>
                    </ol>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <form style="width: 300px;" method="POST" action="{{ route('customer.mpesa.payment') }}" action="/process-payment" method="POST">
                        @csrf                        
                        <br>
                        <label for="phone_number">Número de Celular 82/83</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i style="color: #FFC107" class="fas fa-mobile-alt"></i>
                            </span>
                            <input type="tel" class="form-control" id="phone_number" aria-describedby="numberHelp"
                                placeholder="Digite o número" name="phone_number"  required>
                           
                        </div>
                   
                        <label for="amount">Montante</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i style="color: #FFC107" class="fas fa-dollar-sign"></i>
                            </span>
                            <input type="number" class="form-control" name="amount" id="amount" required
                                placeholder="digite o montante a transferir">
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning">Transferir</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="paypal" class="tabcontent">
                @include('includes.alerts')
                <div class="d-flex flex-wrap justify-content-center">
                    <form style="width: 300px;" action="{{ route('processTransaction') }}" method="POST">
                        @csrf
                        @include('includes.alerts')
                        <br>
                        <div class="d-flex justify-content-center">
                            <img style="width: 100px; height: 100px;" class="image rounded" src="img/paypal.png"><br>
                        </div>
                        <small style="color: red;">NB: O Montante a trasferir tem que ser em dolares (USD)</small>
                        <br>
                        <br>    

                        <div class="form-group">
                            <label for="amount">Montante em USD</label>
                            <input type="number" class="form-control" name="amount" id="amount" required
                                placeholder="digite o montante a transferir">
                            <small id="amount" class="form-text text-muted">Digite o montante que pretende
                                transferir.
                            </small>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Fazer Pagamento</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="visa" class="tabcontent">
                <div class="d-flex justify-content-center">
                    <img style="width: 60px; height: 60px;" class="image rounded" src="img/visa.png"><br>
                </div>
                <br>
                <!-- Credit card form content -->
                <div class="d-flex flex-wrap justify-content-center">
                    <div style="width: 600px; height: 340px; border: 1px solid #DFDFDF; border-radius: 5px; background-color: #f5f5f5;" class="d-flex flex-wrap justify-content-center">
                        <!-- credit card info-->
                        <div style="width: 400px;">
                            <div id="credit-card" sty class="tab-pane fade show active pt-3">
                                <form role="form" onsubmit="event.preventDefault()">
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                    <div class="form-group"> 
                                        <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                       
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Valid card number" aria-label="Recipient's username" required>
                                            <span class="input-group-text" id="basic-addon2">
                                                <i class="fab fa-cc-visa fa-lg"></i>
                                                <i class="fab fa-cc-mastercard fa-lg"></i> 
                                                <i class="fab fa-cc-amex fa-lg"></i>
                                            </span>
                                          </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
                <!-- End -->
            </div>
    


            <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>
            <!-- END CONTENT -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
        </div>
    </div>
</body>

</html>
