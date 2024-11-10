<h2>Installation</h2>
<ol>
  <li>Clone the repository:
    <pre><code>git clone https://github.com/badz20/classMateApp.git
cd classMateApp</code></pre>
  </li>
  <li>Install dependencies using Composer:
    <pre><code>composer install</code></pre>
  </li>
  <li>Install dependencies using Composer:
    <pre><code>npm install</code></pre>
  </li>
  <li>Set up the <code>.env</code> file:
    <pre><code>cp .env.example .env
</code></pre>
  </li>
  <li>
  change sqlite -> mysql <br>
  </li>
  <li>
    <pre><code>php artisan key:generate</code></pre>
  </li>
  <li>Configure your database in the <code>.env</code> file.</li>
  <li>Run the migrations to create the database tables:
    <pre><code>php artisan migrate:fresh --seed</code></pre>
  </li>
  <li>Serve the application:
    <pre><code>php artisan serve</code></pre>
  </li>
  <li>go to new terminall
    <pre><code>npm run dev</code></pre>
  </li>
</ol>