# Quick Start Guide

## Prerequisites
- macOS (required for Laravel Herd)
- [Laravel Herd](https://laravelherd.com) installed on your computer
- VS Code (recommended) or another code editor
- Git

## Initial Setup

1. **Install Laravel Herd**
   - Download and install [Laravel Herd](https://laravelherd.com)
   - Open Herd and ensure PHP 8.2 is selected
   - Start the Herd service

2. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/clean-dronies.git
   cd clean-dronies
   ```

3. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Setup**
   - Open Laravel Herd
   - Click "Databases" in the sidebar
   - Create a new MySQL database named `clean_dronies`
   - Run migrations:
     ```bash
     php artisan migrate
     ```

6. **Compile Assets**
   ```bash
   npm run dev
   ```

7. **Access the Application**
   - Main application: http://clean-dronies.test

## VS Code Setup (Recommended)

1. **Install Extensions**
   - PHP Debug
   - Laravel Artisan
   - Laravel Blade Snippets
   - Vue Language Features
   - Tailwind CSS IntelliSense

2. **Laravel Herd Integration**
   - The `.vscode/settings.json` file is configured for Laravel Herd
   - Use the Laravel Artisan extension to run commands

## Development Workflow

1. **Starting the Development Environment**
   - Open Laravel Herd
   - Ensure the service is running
   - Your site will be available at http://clean-dronies.test

2. **Running Artisan Commands**
   ```bash
   php artisan [command]
   ```

3. **Running NPM Commands**
   ```bash
   npm run dev    # Development
   npm run build  # Production
   ```

4. **Accessing the Database**
   - Open Laravel Herd
   - Click "Databases" in the sidebar
   - Use the built-in database manager

5. **Viewing Logs**
   - Open Laravel Herd
   - Click "Logs" in the sidebar
   - Select the appropriate log file

## Available Artisan Commands

The project includes several custom artisan commands for managing the Dronies collection and voting system:

1. **Data Collection Commands**
   - `php artisan scrape:dronies`
     - Scrapes all Dronies from HowRare.is (IDs 1-10000)
     - Includes error handling and rate limiting
   - `php artisan scrape:single-dronie {id}`
     - Scrapes a single Dronie by ID
     - Collects all attributes, rarity data, and market information

2. **Voting System Commands**
   - `php artisan dronies:backfill-total-votes`
     - Recalculates total votes for all Dronies
     - Updates the `total_votes` field in the database
   - `php artisan votes:translate-score`
     - Converts clean scores into initial votes
     - Used for initializing the voting system
   - `php artisan dronies:compile-top`
     - Compiles and ranks the top Dronies
     - Sorts by clean score, win percentage, and total votes
     - Updates the `top_dronies` table

3. **Data Fix Commands**
   - `php artisan fixes:sale-price`
     - Fixes sale price formatting issues
     - Removes the '◎' symbol from price values

## Common Issues

1. **Site Not Accessible**
   - Ensure Laravel Herd is running
   - Check that the site is enabled in Herd
   - Verify your hosts file has the correct entries

2. **Database Connection Issues**
   - Verify the database exists in Herd
   - Check your `.env` file has the correct credentials
   - Default credentials are:
     ```
     DB_USERNAME=root
     DB_PASSWORD=
     ```

3. **Permission Issues**
   - Ensure storage and bootstrap/cache are writable:
     ```bash
     chmod -R 775 storage bootstrap/cache
     ```

## Additional Resources
- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Herd Documentation](https://laravelherd.com/docs)
- [Vue.js Documentation](https://vuejs.org/guide/introduction.html)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs) 