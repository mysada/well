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
### 9.1 Security in the Web Application

#### Input Validation
- **Function:** Ensures that only properly formatted data is entered into the system.
- **Benefit:** Prevents common vulnerabilities like SQL injection and XSS by validating user input.

#### Output Sanitization
- **Function:** Cleans and encodes output data before sending it to the user's browser.
- **Benefit:** Protects against XSS attacks by ensuring malicious scripts are not executed in the browser.

#### Role-Based Access Control (RBAC)
- **Function:** Restricts access to resources based on the user's role within the application.
- **Benefit:** Ensures that users can only access the functionalities and data that are necessary for their role.

#### CSRF Tokens
- **Function:** Uses unique tokens for each session to prevent Cross-Site Request Forgery attacks.
- **Benefit:** Ensures that unauthorized commands are not executed on behalf of authenticated users.

#### Session Management
- **Function:** Manages user sessions securely with mechanisms like session expiration and regeneration.
- **Benefit:** Prevents session hijacking and fixation by properly managing user sessions.

#### SSL (Secure Sockets Layer)
- **Function:** Encrypts data transmitted between the client and the server.
- **Benefit:** Protects data in transit from being intercepted or tampered with by attackers.

#### Defensive Coding Practices
- **Authentication:** Implementation of strong authentication mechanisms, such as multi-factor authentication (MFA).
- **Error Handling:** Preventing exposing detailed error messages to users, as they can provide valuable information to attackers.
- **Security Headers:** Using HTTP security headers like Content Security Policy (CSP), X-Content-Type-Options, and X-Frame-Options to protect against various attacks.
- **Regular Security Audits:** Conduct regular security audits and vulnerability assessments to identify and address potential security issues.
