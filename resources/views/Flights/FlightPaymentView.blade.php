<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, shrink-to-fit=no" />

    <title>Flight Payment</title>

    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900" rel="stylesheet" /><link href="Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="Assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="Assets/img/globe.png" rel="icon" />
    <link href="https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900" rel="stylesheet">

</head>

<body style="font-family:Heebo; font-size:13px">


    <!-- Begin Page Content -->

                   <div class="container">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-5 d-none d-lg-block bg-gradient-primary">
                                        <h1 style="font-weight:700; margin-left:100px; margin-top:180px; color:white">Seal Travels <i class="fa fa-globe-americas"></i> </h1>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="p-5">
                                            <div class="">
                                                <h4 class="" style="color:#4e73df; font-family:Heebo"><strong>Payment Information</strong> <i class="fa fa-credit-card"></i></h4><br />
                                            </div>

                                    <!--Payment Information Form-->
                                    <form method="post" action="/flightpayment" class="user">

                                    {{ csrf_field() }}

                                       <div class="form-group row">
                                        <!--Name-->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label style = "width: 150px;color: #4e73df;font-weight: bold;font-size: 13px">Name</label>
                                            <input name="name" class="form-control" placeholder="Name" style = "font-size: 13px;" />
                                        </div>

                                        <!--Email-->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label style = "width: 150px;color: #4e73df;font-weight: bold;font-size: 13px">Email</label>
                                            <input name="email" class="form-control" placeholder="Email" style = "font-size: 13px;" />
                                        </div>
                                        </div>

                                        <!--Payment Method-->
                                        <div class="form-group row">
                                        <div class="form-group">
                                            <div class="form-check float-left" style="width: 100px; margin-left: 0px; color: #4e73df; font-weight: bold">
                                                <input type="radio" name="paymentmethod" class="" style = "font-size: 13px;" value="Visa Card" /> Visa Card
                                            </div>
                                            <div class="form-check float-left" style="width: 160px; color: #4e73df; font-weight: bold">
                                                <input type="radio" name="paymentmethod" class="" style = "font-size: 13px;" value="American Express" /> American Express
                                            </div>
                                            <div class="form-check float-left" style="width: 150px; color: #4e73df; font-weight: bold">
                                                <input type="radio" name="paymentmethod" class="" style = "font-size: 13px;" value="Master Card" /> Master Card
                                            </div>
                                        </div>
                                        </div>

                                        <div class="form-group row">
                                        <!--Card Number-->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label style = "width: 150px;color: #4e73df;font-weight: bold;font-size: 13px">Card Number</label>
                                            <input name="cardnumber" class="form-control" placeholder="Card Number" style = "font-size: 13px;" />
                                        </div>

                                        <!--CVV-->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label style = "width: 150px;color: #4e73df;font-weight: bold;font-size: 13px">CVV</label>
                                            <input name="cvv" type="password" class="form-control" placeholder="CVV" style = "font-size: 13px;" />
                                        </div>
                                        </div>

                                        <div class="form-group row">
                                        <!--Expiry Date-->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label style = "width: 150px;color: #4e73df;font-weight: bold;font-size: 13px">Expiry Date</label>
                                            <input name="expirydate" class="form-control" type="date" style = "font-size: 13px;" />
                                        </div>

                                        <!--Amount-->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label style = "width: 150px;color: #4e73df;font-weight: bold;font-size: 13px">Amount</label>
                                            <input name="amount" class="form-control" placeholder="Amount" style = "font-size: 13px;" />
                                        </div>
                                        </div>

                                        <!--Submit-->
                                        <div>
                                            <input type="submit" name="submitpayment" value="SUBMIT PAYMENT" class="btn btn-primary btn-block" style="font-size:13px; font-weight:bold" />
                                        </div>

                                    </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <!-- <a href="#">yvonnevanita.com</a> --> <script>document.write(new Date().getFullYear());</script></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            <!-- End of Content Wrapper -->


        <!-- End of Page Wrapper -->

    <script src="Assets/js/jquery.min.js"></script>
    <script src="Assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="Assets/vendor/jquery/jquery.min.js"></script>
    <script src="Assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="Assets/js/sb-admin-2.min.js"></script>

</body>
</html>
