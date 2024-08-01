## 7. Sitemap

### 7.1 Backend Panel
![Sample Image](./images/admin_sitepmap_1.jpg)


## 10. Database

### Entities and Relationships

#### 1. Users
- **Attributes**: ID, Username, Password, Email, FullName, Address, PhoneNumber, Is_Admin, Created_At, Updated_At
- **Purpose**: Manages user information, including both customers and administrators.

#### 2. Products
- **Attributes**: ID, ProductName, Description, Price, Stock, ImageURL, Color, Rating, Discount, Created_At, Updated_At
- **Purpose**: Stores detailed information about the products available for sale.

#### 3. Categories
- **Attributes**: ID, CategoryName, Description
- **Purpose**: Organize products into various categories for easy navigation.

#### 4. Orders
- **Attributes**: ID, UserID, OrderDate, TotalAmount, ShippingAddress, Status, Quantity, Price
- **Purpose**: Tracks order details and status for each purchase.

#### 5. Payments
- **Attributes**: ID, OrderID, PaymentMethod, PaymentDate, Amount, Tax, GST, Discount, PaymentStatus, TransactionID
- **Purpose**: Records payment details for orders.

#### 6. Transactions
- **Attributes**: ID, OrderID, Transaction_ID, TransactionStatus, TransactionResponse, SoftDelete, Timestamp
- **Purpose**: Tracks transaction details associated with payments.

#### 7. Reviews
- **Attributes**: ID, ProductID, UserID, Rating, ReviewText, ReviewDate
- **Purpose**: Stores customer reviews and ratings for products.

#### 8. ShoppingCart
- **Attributes**: ID, UserID, CreatedDate
- **Purpose**: Temporarily holds items that users intend to purchase.

#### 9. CartItems
- **Attributes**: ID, CartID, ProductID, Quantity
- **Purpose**: Manages individual items within a shopping cart.

#### 10. Wishlist
- **Attributes**: ID, UserID, CreatedDate
- **Purpose**: Allows users to save products for future reference.

#### 11. WishlistItems
- **Attributes**: ID, WishlistID, ProductID
- **Purpose**: Manages individual items within a wishlist.

### Key Relationships
- **Users to Orders**: A user can place multiple orders.
- **Orders to Payments**: Each order can have multiple payment records.
- **Orders to Transactions**: Each order can have multiple transactions.
- **Products to Reviews**: Each product can have multiple reviews.
- **Products to Categories**: Each product can belong to one category, but a category can have multiple products.
- **ShoppingCart to CartItems**: Each shopping cart can have multiple items.
- **Wishlist to WishlistItems**: Each wishlist can have multiple items.



