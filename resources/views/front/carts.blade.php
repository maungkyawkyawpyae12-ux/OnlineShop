@extends('layouts.front')
@section('content')
<div class="container my-5 py-5">
    <h3 class="text-center py-3">Shopping Carts</h3>
    <div class="table-responsive">
        <table class="table table-border">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Item Name</th>
                    <th>Item Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </div>
    <div class="d-grid gap-2">
        @guest
        <a href="/login" class="btn btn-primary">Login</a>
        @else
        <form  id="paymentForm" class="row" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="payment_slip" class="mb-3">Payment Slip Photo</label>
                <input type="file" name="payment_slip" class="payment_slip form-control" id="payment_slip" required>
            </div>
            <div class="col-md-6">
                <label for="payment_method" class=" mb-3">Payment Method</label>
                <select name="payment_method"  id="payment_method" class="form-select" required>
                    <option value="">Choose payment method</option>
                    @foreach($payments as $payment)
                    <option value="{{$payment->id}}">{{$payment->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="note">Customer Address</label>
                <input type="text" name="note" class="form-control" required>
            </div>
            <button class="btn btn-primary my-3" id="order-now" type="submit">Order Now</button>
</form>
        @endif
    </div>

</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
 
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
 
        // $('#order-now').click(function(e){
 
        //     e.preventDefault();
 
        //     let itemString = localStorage.getItem('shops');
 
        //     $.post("{{ route('orderNow') }}",
        //         {
        //             data: itemString
        //         },
        //         function(response){
        //             console.log(response);
        //         }
        //     );
 
        // });
            $('#paymentForm').on('submit',function(e){
                e.preventDefault();
                console.log("Submited click");
                var formData=new FormData(this);
                let itemString=localStorage.getItem('shops');
                console.log(itemString);
                formData.append('orderItems',itemString);
                $.ajax({
                    type:'POST',
                    url:"{{route('orderNow')}}",
                    data:formData,
                    processData:false,
                    contentType:false,
                    
                   success:function(response){
                    console.log(response);
 
                    if(response.success){
                        alert(response.message);
                        localStorage.removeItem('shops');
                        location.reload();
                        location.href="/";
                    }
                },
                error:function(xhr){
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                }
                });
            });
    });
</script>
@endsection 