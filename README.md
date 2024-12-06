# GrabNGo
## Cafeteria Management System for UNT 

### Product Vision:
FOR students and teachers WHO want a hassle-free way to order meals and skip long cafeteria lines, THE GrabNGo system is an innovative cafeteria management platform THAT enables users to browse menus, customize orders, and schedule pickup times with ease, ensuring their meals are freshly prepared and ready upon arrival. UNLIKE UberEats or similar third-party delivery services, GrabNGo focuses on maximizing convenience and minimizing wait times by allowing users to place, modify, or cancel orders through a user-friendly online interface and receive instant notifications when their food is ready. OUR solution optimizes meal pickup, reduces crowding, and enhances the overall dining experience for a busy academic environment.

<h2>How to Run our Application After Cloning from GitHub</h2>

<p>Follow these steps to set up and run your Laravel application locally after cloning it from GitHub or downloading it as a ZIP file.</p>

<h3>Prerequisites</h3>
<ul>
    <li><strong>PHP:</strong> Version 7.3 or higher</li>
    <li><strong>Composer:</strong> Dependency manager for PHP</li>
    <li><strong>Database:</strong> MySQL</li>
    <li><strong>Node.js and npm:</strong> For asset compilation (optional)</li>
</ul>

<h3>Steps to Run the Application</h3>
<ol>
    <li><strong>Clone or Download the Repository</strong>
        <pre><code>git clone https://github.com/username/repository.git</code></pre>
    </li>
    <li><strong>Navigate to the Project Directory</strong>
        <pre><code>cd repository</code></pre>
    </li>
    <li><strong>Install Dependencies</strong>
        <pre><code>composer install</code></pre>
    </li>
    <li><strong>Set Up the Environment File</strong>
        <pre><code>cp .env.example .env</code></pre>
        <p>Edit the `.env` file to configure your database and other settings.</p>
    </li>
    <li><strong>Generate Application Key</strong>
        <pre><code>php artisan key:generate</code></pre>
    </li>
    <li><strong>Run Migrations</strong>
        <pre><code>php artisan migrate</code></pre>
    </li>
    <li><strong>Seed the Database</strong>
        <pre><code>php artisan db:seed</code></pre>
    </li>
    <li><strong>Serve the Application</strong>
        <pre><code>php artisan serve</code></pre>
        <p>Your application will be accessible at <code>http://localhost:8000</code>.</p>
    </li>
</ol>
