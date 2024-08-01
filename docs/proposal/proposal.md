![Sample Image](./images/head.png)

# Well - Health & Personal Care Web Application Development

- Created By: Team MYDASA
- Created For: Steve George
- Date: 31 July, 2024

## 1. Project Overview
- WELL - Health & Personal Care is an e-commerce website that provides a wide range of health and personal care products. Our offerings include health supplements, personal care products, and organic supplements. The primary goal is to create a user-friendly, secure, and visually appealing platform where customers can easily find and purchase products that enhance their health and beauty.

![Sample Image](./images/project_overview.jpg)

## 2. Target Audience

- Our target audience includes male and female customers aged between 18 and 55 years. They are health-conscious individuals who prioritize wellness and beauty. This demographic is tech-savvy, values convenience, and seeks high-quality products. Our target audience includes both male and female customers aged between 18 and 55 years. They are health-conscious individuals who prioritize wellness and personal care. This demographic is tech-savvy, values convenience, and seeks high-quality products. Our target audience includes both male and female customers aged between 18 and 55 years. They are health-conscious individuals who prioritize wellness and beauty. This demographic is tech-savvy, values convenience, and seeks high-quality products.

![Sample Image](./images/target_audience.jpg)


## 3. Project Details

- **Project Name:** Well - Health & Personal Care
- **Project Duration:** 2 Weeks

### Scope of Work:  User / Guest (Frontend)
![Sample Image](./images/project_details_user.jpg)

### Deliverables

1. Functional Web Application for all listed features
2. High-fidelity design mock-ups
3. UI/UX design specifications
4. Database schema and setup scripts
5. Frontend and backend code
6. Integration with payment gateway
7. Security requirements document and penetration testing report
8. Post-launch maintenance and support plan


### Admin Dashboard
![Sample Image](./images/project_detail_admin.jpg)

### Product Management
- **Create**
  - Add new product
- **Read**
  - View list of all products
  - View product details
- **Update**
  - Edit existing product
- **Delete**
  - Remove product

### Category Management
- **Create**
  - Add new category
- **Read**
  - View list of all categories
- **Update**
  - Edit existing category
- **Delete**
  - Remove category

### User Management
- **Create**
  - Add new user
- **Read**
  - View list of all users
  - View user details
- **Update**
  - Edit existing user
- **Delete**
  - Remove user

### Order Management
- **Create**
  - (Typically, orders are created by users; however, the admin can manually create orders for customers if needed)
- **Read**
  - View list of all orders
  - View order details
- **Update**
  - Edit existing order
- **Delete**
  - Remove order

## 4. Technologies
### Frontend

- HTML
- JavaScript
- Bootstrap
- SCSS
- jQuery
- Node.js
- npm
- Vite

### Backend

- PHP
- Laravel
- Composer

### Database

- MySQL

### Server

- Ubuntu/Apache2
- Certbot

### Payment Gateway

- Stripe/Authorize.net (PCI DSS Compliance Gateway)

## 5. Proposed Design Solution


## 6. User Personas/Use Case Statements

### 1. Jane Doe (28, Female)
![Sample Image](./images/guest_user.jpg)
**Role:** Guest User

#### Description
- **Demographics:** Unauthenticated users, potentially new visitors.
- **Needs:** Explore products, read reviews, and learn about the website's offerings.
- **Behaviour:** Browses products without making purchases, might consider signing up for an account.

#### Use Case Statement
- **As a Guest**, Jane wants to browse a variety of health and beauty products so that she can decide whether to sign up and make a purchase.

### 2. John Smith (35, Male)
![Sample Image](./images/authenticated_user.jpg)
**Role:** Authenticated User

#### Description
- **Demographics:** Registered users, both male and female, aged 18-55.
- **Needs:** Access personalized recommendations, track orders, and manage their account.
- **Behaviour:** Regularly logs in to purchase products, leaves reviews, and participates in the loyalty program.

#### Use Case Statement
- **As an Authenticated User**, John wants to view his order history so that he can track his past purchases and reorder products easily.

### 3. Erik Wilson
![Sample Image](./images/CSR_persona.jpg)
**Role:** Customer Service Representative (CSR)

#### Description
- **Demographics:** Employees of the company responsible for handling customer inquiries.
- **Needs:** Access to user accounts and order details to provide support.
- **Behaviour:** Logs in to assist customers with their queries, resolves issues related to orders, and processes returns.

#### Use Case Statement
- **As a CSR**, Erik wants to access customer order details so that he can assist customers with any issues they may have.

### 4. Joe Root
![Sample Image](./images/admin_persona.jpg)
**Role:** Admin

#### Description
- **Demographics:** Site administrators responsible for managing the website.
- **Needs:** Full access to all site functionalities to manage products, users, and orders.
- **Behaviour:** Regularly updates product listings, manages user accounts, and monitors sales and website performance.

#### Use Case Statement
- **As an Admin**, Joe wants to add new products to the catalogue so that he can keep the website's offerings up to date.


## 7. Sitemap

## 8. Server
![Sample Image](./images/server.jpg)
### Ubuntu Server
- Ubuntu (a popular Linux distribution known for its stability and     user-friendliness)

### Apache2
- Apache2 is a widely used open-source web server that provides a robust, flexible,     and secure platform for hosting websites.

### Certbot
- Certbot is an open-source tool for automatically using Let's Encrypt certificates     on manually administrated websites to enable HTTPS.

## 9. Security on the Server
![Sample Image](./images/server_security.jpg)

### Load Balancers
- **Function**: Distributes incoming network traffic across multiple servers to ensure no single server becomes overwhelmed.
- **Benefit**: Improves availability and reliability of the application by balancing the load. Very useful in protecting the server from DDoS attacks.

### Firewall
- **Function**: Monitors and controls incoming and outgoing network traffic based on predetermined security rules.
- **Benefit**: Protects the server from unauthorized access and potential threats by filtering traffic.

### Data Encryption
- **Function**: Encrypts data both at rest and in transit using algorithms like AES-256.
- **Benefit**: Ensures that sensitive data is protected from unauthorized access and breaches.

### Continuous Security Practices
- **Regular Updates**: Keeping the operating system and all software up to date to protect against vulnerabilities.
- **Access Control**: Use of SSH keys for authentication and disabling password-based logins.
- **Monitoring and Logging**: Implement continuous monitoring and logging to detect and respond to security incidents promptly.
- **Backup and Recovery**: Regularly back up data and have a recovery plan in place in case of data loss or corruption.

## 10. Database
## 11. Value Adds
## 12. Revised ERD for Value Adds

## 13. Our Team
### Manish Kumar
**Role:** Project Manager

### Yongdong Xiang
**Role:** Lead Backend Developer, Git Manager

### Dongqing Ye
**Role:** Lead UI/UX Designer, Front End Developer

### Aman Dawar
**Role:** Front End Developer, Database Engineer

### Shivangi Koradiya
**Role:** Lead Database Engineer, Backend Developer
