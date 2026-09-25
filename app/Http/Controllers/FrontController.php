<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Order;
class FrontController extends Controller
{
    public function shop()
    {
        $items=Item::orderBy('id','DESC')->paginate(8);
        // var_dump($items);

        return view('front.shop',compact('items'));
    }
    public function shopItem($id)
    {
        $item=Item::findOrFail($id);
        $category_id=$item->category_id;
        $related_items=Item::where('category_id',$category_id)->where('id',"!=",$id)->orderBy('id','DESC')->limit(4)->get();
        return view('front.shop-item',compact('item','related_items'));
    }
   
      public function carts()
    {
        $payments = Payment::all();

        return view('front.carts', compact('payments'));
    }
   public function orderNow(Request $request)
{
    try {

        $request->validate([
            'payment_method' => 'required',
            'payment_slip'   => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'note'           => 'required',
            'orderItems'     => 'required',
        ]);

        $items = json_decode($request->orderItems, true);

        if (!$items || count($items) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty'
            ], 400);
        }

        // Payment slip
        $paymentSlip = null;

        if ($request->hasFile('payment_slip')) {

            $file = $request->file('payment_slip');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('images/payment-slip'),
                $filename
            );

            $paymentSlip = 'images/payment-slip/' . $filename;
        }

        // Voucher number
        $voucherNo = 'V-' . date('YmdHis');

        foreach ($items as $item) {

            $product = Item::find($item['id']);

            if (!$product) {
                continue;
            }

            $qty = (int) $item['qty'];

            $price = $product->price;

            if ($product->discount > 0) {
                $price = $product->price -
                    ($product->price * $product->discount / 100);
            }

            $total = $price * $qty;

            Order::create([
                'voucher_no'   => $voucherNo,
                'total'        => $total,
                'qty'          => $qty,
                'payment_slip' => $paymentSlip,
                'status'       => 'Pending',
                'note'         => $request->note,
                'item_id'      => $product->id,
                'payment_id'   => $request->payment_method,
                'user_id'      => auth()->id(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully',
            'voucher_no' => $voucherNo
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}
        public function itemcategory($category_id)
        {
            $items=Item::where('category_id',$category_id)->orderBy('id','DESC')->paginate(8);
            return view('front.item-category',compact('items'));
        }
}
