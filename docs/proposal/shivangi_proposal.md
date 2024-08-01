### 7. Sitemap

###  FRONT END SITEMAP

![FRONT END SITEMAP](./images/Front_End_SiteMap.png)

### 10. Database

### 11. Value Adds

## BRANDS and VENDORS

To enhance the "WELL" Health & Beauty e-commerce platform, we have added two key features:

## BRANDS Table

- **Attributes**: ID, BrandName, Description, ProductID
  - **Benefit**: Allows products to be categorized by brand, enabling brand-specific promotions and improved customer experience.

## VENDORS Table

- **Attributes**: ID, VendorName, ContactPerson, ContactEmail, ContactPhone, ProductID
  - **Benefit**: Supports multiple vendors, facilitating marketplace expansion with diverse product offerings and competitive pricing.

## Marketplace Expansion

These features prepare "WELL" for future growth in a marketplace. By supporting multiple brands and vendors, the platform can offer a wider variety of products, attract more customers, and create new revenue streams through vendor partnerships. This strategic addition positions "WELL" for scalability and long-term success in the competitive e-commerce landscape.

### 12. Revised ERD for Value Adds

## Changes to the ERD

1. **Addition of BRANDS Table**: Each product can be associated with one brand, and a brand can have multiple products. This introduces a one-to-many relationship between the BRANDS table and the PRODUCTS table.
2. **Addition of VENDORS Table**: Each product can be associated with one vendor, and a vendor can supply multiple products. This creates a one-to-many relationship between the VENDORS table and the PRODUCTS table.

These changes will enable the "WELL" platform to support brand categorization and vendor management, enhancing the system's capability to expand into a marketplace. The revised ERD will incorporate these additional tables and relationships to facilitate the new value-added features.

![ERD WITH VALUE ADD](./images/database_ERD_with_added_value.png)




