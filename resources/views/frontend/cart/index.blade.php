@extends('layouts.frontBody')

@section('body')


<section class="checkout-section sec-pad bg-gray">

        <div class="container">

            <div class="row">

                <div class="col-sm-8 col-md-9 ord1-mobile">

                    

                        <div class="custom-cart-table">

                            <div class="table-responsive">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th scope="col"> </th>

                                            <th scope="col" class="w-30">Product</th>

                                            <th scope="col">Available At

                                                <span class="font-normal">M3C 0C1</span>

                                                <a href="#">

                                                    <i class="fa fa-pencil-alt text-orange"></i>

                                                </a>

                                            </th>

                                            <th scope="col" style="width: 100px;">Quantity</th>

                                            <th scope="col" class="text-center">Price</th>

                                            <th> </th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>

                                            <td>

                                                <img src="{{url('public/front/images/cushion.jpg')}}" /> </td>

                                            <td>

                                                <h5>Persian Cushions</h5>

                                                <p class="d-block font-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione cumque harum</p>

                                            </td>

                                            <td>Delivery By 09 Jan - 10 Jan | FREE</td>

                                            <td>

                                                <input class="form-control" type="number" name="quantity" value="1" />

                                            </td>

                                            <td class="text-center">$30</td>

                                            <td class="text-right">

                                                <button class="btn btn-sm btn-outline-danger">

                                                    <i class="fa fa-trash"></i>

                                                </button>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <img src="{{url('public/front/images/cushion.jpg')}}" /> </td>

                                            <td>

                                                <h5>Memory Foam</h5>

                                                <p class="d-block font-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione cumque harum</p>

                                            </td>

                                            <td>Delivery By 09 Jan - 10 Jan | FREE</td>

                                            <td>

                                                <input class="form-control" type="number" name="quantity" value="2" />

                                            </td>

                                            <td class="text-center">$20</td>

                                            <td class="text-right">

                                                <button class="btn btn-sm btn-outline-danger">

                                                    <i class="fa fa-trash"></i>

                                                </button>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <img src="{{url('public/front/images/cushion.jpg')}}" /> </td>

                                            <td>

                                                <h5>Latex Dunlop</h5>

                                                <p class="d-block font-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione cumque harum</p>

                                            </td>

                                            <td>Delivery By 09 Jan - 10 Jan | FREE</td>

                                            <td>

                                                <input class="form-control" type="number" name="quantity" value="0" />

                                            </td>

                                            <td class="text-center">$40</td>

                                            <td class="text-right">

                                                <button class="btn btn-sm btn-outline-danger">

                                                    <i class="fa fa-trash"></i>

                                                </button>

                                            </td>

                                        </tr>





                                    </tbody>

                                </table>

                            </div>



                            <div class="row btn-block-mob">

                                <div class="col-sm-6  col-md-6">

                                    <a href="persian-cushions.html" class="btn btn-01">Continue Shopping</a>

                                </div>

                                <div class="col-sm-6 col-md-6 text-right">

                                    <a href="checkout.html" class="btn btn-01">Place Order</a>

                                </div>

                            </div>

                        </div>

              





                </div>

                <div class="col-sm-4 col-md-3">

                    <div class="chekc-out-box pay-detail">











                        <div class="cover-total title-section mb-0">

                            <h3 class="font-16 mb-0">Price Detail</h3>



                        </div>

                        <hr class="mt-0">

                        <div class="cover-total subtotal  d-flex">

                            <h3>Subtotal</h3>

                            <h3 class="ml-auto">$90</h3>

                        </div>

                        <div class="cover-total subtotal  d-flex">

                            <h3>Delivery Charges</h3>

                            <h3 class="ml-auto">Free</h3>

                        </div>





                        <div class="cover-total subtotal  d-flex">

                            <h3>+5% GST

                            </h3>

                            <h3 class="ml-auto">$9</h3>

                        </div>

                        <div class="cover-total subtotal  d-flex">

                            <h3>+7% GST</h3>

                            <h3 class="ml-auto">$10</h3>

                        </div>

                        <div class="cover-total  subtotal  d-flex mb-0 pb-0">

                            <span class="font-12 text-orange w-100 d-flex mb-0">Your Total Savings on this order

                                <b class="ml-auto">$10</b>

                            </span>

                        </div>





                        <hr>

                        <div class="cover-total total d-flex align-items-center justify-content-between total mb-0 pb-1">
                            <h5 class="mb-0">Total</h5>
                            <h2 class="mb-0">$118</h2>
                        </div>

                    </div>

                </div>

            </div>

        </div>



        </div>

    </section>


@endsection