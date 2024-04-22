<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductModel;
use App\Models\Supplier;
use App\Models\SupplierPurchase;
use App\Models\SupplierPurchaseDetail;
use App\Models\CustomerPurchase;
use App\Models\User;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(){
        $supplierPurchaseRevenue = SupplierPurchase::sum('total_price');

        // Fetch total revenue from customer purchases
        $customerPurchaseRevenue = CustomerPurchase::sum('total_price');

        $storeAdminCount = User::where('usertype', 'store_admin')->count();
        $supplierAdminCount = User::where('usertype', 'supplier_admin')->count();
        $adminCount = User::where('usertype', 'super_admin')->count();

        $brands = Brand:: all();
        $models = ProductModel:: all();
        $products = Product::with('brand', 'productModel')->paginate(10);
        $suppliers = Supplier:: all();
        $supplierPurchases = SupplierPurchase::with('supplier');
         $customerPurchases = CustomerPurchase::with('user');
        $reviews = Review::with('product')->paginate(10);
        $admins = User::where('usertype', 'LIKE', '%admin')->get();
        $customers = User::where('usertype', 'customer')->get();
        $user = Auth::user();


        $purchases = SupplierPurchase::whereMonth('created_at', Carbon::now()->month)->get();
        $purchasesByDay = $purchases->groupBy(function ($purchase) {
            return $purchase->created_at->format('d'); // Grouping by day
        });

        $supplierPurchaseAmounts = [];
        foreach ($purchasesByDay as $day => $purchasesOfDay) {
            $supplierPurchaseAmounts[$day] = $purchasesOfDay->sum('total_price');
        }
        $days = array_map(function($day) {
            return ltrim($day, '0');
        }, array_keys($supplierPurchaseAmounts));

        $CustomerPurchases = CustomerPurchase::whereMonth('created_at', Carbon::now()->month)->get();
        $customerPurchasesByDay = $CustomerPurchases->groupBy(function ($purchase) {
            return $purchase->created_at->format('d'); // Grouping by day
        });

        $customerPurchaseAmounts = [];
        foreach ($customerPurchasesByDay as $day => $purchasesOfDay) {
            $customerPurchaseAmounts[$day] = $purchasesOfDay->sum('total_price');
        }
        $customerPurchaseDays = array_map(function($day) {
            return ltrim($day, '0');
        }, array_keys($customerPurchaseAmounts));

        $productQuantities = SupplierPurchaseDetail::with('product')
                                                    ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                                                    ->groupBy('product_id')
                                                    ->limit(5)
                                                    ->get();

        $productData = SupplierPurchaseDetail::with('product')
                                                    ->select('product_id', DB::raw('SUM(quantity) as total_quantity'), DB::raw('SUM(quantity * price) as total_sales'))
                                                    ->groupBy('product_id')
                                                    ->limit(5)
                                                    ->get();

        return view('admin.dashboard', compact(
            'customerPurchases',
            'supplierPurchases',
            'customers',
            'suppliers',
            'products',
            'brands',
            'models',
            'supplierPurchaseRevenue',
            'customerPurchaseRevenue',
            'storeAdminCount',
            'supplierAdminCount',
            'adminCount',
            'user',
            'admins',
            'supplierPurchaseAmounts',
            'days',
            'customerPurchaseAmounts',
            'customerPurchaseDays',
            'productQuantities',
            'productData'
        ));
    }
}
