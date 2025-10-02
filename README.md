## Tonacao NFT Dashboard (PHP)

Minimal PHP app with user auth, simple NFT model, and a dashboard. Uses MySQL (TablePlus for management) and is deployable on Coolify.

### Features
- User register/login/logout (sessions)
- NFT mint (name, description, image URL) and list user's NFTs
- Simple dashboard with counts

### Requirements
- PHP 8.1+
- MySQL 8+
- Composer (optional; not required)

### Setup
1. Create database in MySQL (TablePlus or CLI). Use the schema below.
2. Copy `.env.example` to `.env` and fill credentials or rely on Coolify envs.
3. Serve the app from the project root with PHP's built-in server:
   ```bash
   php -S 0.0.0.0:8000 -t public
   ```

### Environment variables
The app reads standard Coolify-style envs, falling back to generics and defaults:

```
DB_HOST, DB_PORT, DB_DATABASE (or DB_NAME), DB_USERNAME (or DB_USER), DB_PASSWORD
APP_URL (optional)
SESSION_NAME (optional, default: TONACAOSESSID)
```

### SQL Schema
Apply this in your database (TablePlus):

```sql
CREATE TABLE IF NOT EXISTS users (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS nfts (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NOT NULL,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  image_url VARCHAR(512),
  minted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Run locally
```bash
cp .env.example .env
# edit .env values
php -S 0.0.0.0:8000 -t public
```

Open http://localhost:8000

### Deploy on Coolify
- Add a PHP runtime (Nginx + PHP-FPM image or Apache + PHP)
- Set project root to the repository root; web root to `public`
- Configure environment variables as above
- Ensure database is reachable and schema applied

### Notes
- This is a simple server-rendered PHP app, no framework. Keep it minimal.


