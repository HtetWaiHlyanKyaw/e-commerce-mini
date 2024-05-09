<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BottomBanner whereUpdatedAt($value)
 */
	class BottomBanner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $invoice_id
 * @property int $user_id
 * @property string $full_name
 * @property string $payment_method
 * @property string $total_price
 * @property int $total_quantity
 * @property string $phone
 * @property string $address
 * @property string $town
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomerPurchaseDetail> $details
 * @property-read int|null $details_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereTotalQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchase whereUserId($value)
 */
	class CustomerPurchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $customer_purchase_id
 * @property int $product_id
 * @property int $quantity
 * @property string $price
 * @property int $sub_total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CustomerPurchase $CustomerPurchase
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail whereCustomerPurchaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerPurchaseDetail whereUpdatedAt($value)
 */
	class CustomerPurchaseDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MiddleBanner whereUpdatedAt($value)
 */
	class MiddleBanner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int $brand_id
 * @property int $product_model_id
 * @property string $storage_option
 * @property string $color
 * @property string $price
 * @property int $quantity
 * @property int $low_stock
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\ProductModel $productModel
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\review> $reviews
 * @property-read int|null $reviews_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLowStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStorageOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductModel whereUpdatedAt($value)
 */
	class ProductModel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail query()
 */
	class PurchaseDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier whereUpdatedAt($value)
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $invoice_id
 * @property int $supplier_id
 * @property string $payment_method
 * @property string $total_price
 * @property int $total_quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SupplierPurchaseDetail> $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Supplier $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase whereTotalQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchase whereUpdatedAt($value)
 */
	class SupplierPurchase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $supplier_purchase_id
 * @property int $product_id
 * @property int $quantity
 * @property string $price
 * @property int $sub_total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\SupplierPurchase $supplierPurchase
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail whereSupplierPurchaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupplierPurchaseDetail whereUpdatedAt($value)
 */
	class SupplierPurchaseDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopBanner whereUpdatedAt($value)
 */
	class TopBanner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $usertype
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed|null $password
 * @property string|null $google_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $cart
 * @property-read int|null $cart_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsertype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_model_id
 * @property int|null $rating
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $User
 * @method static \Illuminate\Database\Eloquent\Builder|review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|review query()
 * @method static \Illuminate\Database\Eloquent\Builder|review whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|review whereProductModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|review whereUserId($value)
 */
	class review extends \Eloquent {}
}

