# Laravel Polymorphic Image Upload Package Example

This is a Laravel project demonstrating how to use a custom reusable **polymorphic image upload package** to attach images to various models like `Product` and `User`.

## 📦 About the Package

The custom package located at:

packages/MyProjectVendor/laravel-polymorphic-images

Includes:

- A reusable `Image` model with a polymorphic relationship.
- An `ImageService` to handle storing, retrieving, and deleting images.
- A migration for creating the `images` table.
- Logic that can be used across any Eloquent model.

## 🛠 Features

- Attach uploaded images to any model using a polymorphic relation.
- Retrieve all images associated with a model.
- Delete specific images.
- Store image paths in database, files on disk (`public`).
- Fully service-based logic for cleaner controller code.

## 🚀 API Routes

### 📁 Product Endpoints

| Method | Endpoint                      | Description                      |
|--------|-------------------------------|----------------------------------|
| POST   | `/products`                   | Create a product with image      |
| GET    | `/products/{product}/images`  | Get all images for a product     |
| POST   | `/products/{product}/images`  | Add image to existing product    |
| DELETE | `/products/images/{image}`    | Delete specific product image    |

### 👤 User Endpoints

| Method | Endpoint                    | Description                  |
|--------|-----------------------------|------------------------------|
| GET    | `/users`                    | Get list of users            |
| POST   | `/users`                    | Create user with image       |
| GET    | `/users/{user}/images`      | Get images associated to user|

## 🧩 Technologies Used

- Laravel 12+
- PHP 8.4.10 
- Polymorphic Eloquent Relationships
- Custom Local Packages (`packages/` structure)
- Laravel Filesystem (for file storage)


## 📸 Image Storage

Images are stored under:

storage/app/public/images/

To make them accessible publicly, run:

```bash
php artisan storage:link
```
Then images can be accessed via:

/storage/images/filename.jpg


Installation
Clone the repository.

Run composer install

Set up .env and database.

Run

You're ready to test the API!


🤝 License
MIT — use it freely, modify it, improve it!
