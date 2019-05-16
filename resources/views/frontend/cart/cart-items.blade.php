@if($carts)
     @php 
     $i=1;
     $total=0;
     @endphp 

     @foreach($carts as $id => $details)
       @php 
        $total += $details['price'] * $details['quantity'] 
        @endphp
    <div class="item-added">
        <div class="p-15 d-flex">

            <h3 class="font-12 position-relative">
                <span class="item-number">{{$i++}}</span>{{$details['name'] }}</h3>
            <div class="ml-auto">
                <form method="post" action="">
                    <div class="input-group plus-minus-input">
                        <input class="input-group-field" type="number" onchange="commn.updateCart({{$id}},this,'cart-items');"  name="quantity" value="{{ $details['quantity'] }}">
                    </div>
                </form>
            </div>
        </div>
        <div class="p-15">
            <ul class="list-01">
                <li> </li>
                
            </ul>
        </div>
    </div>
    <hr>
    @endforeach
@endif