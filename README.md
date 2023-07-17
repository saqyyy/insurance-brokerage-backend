<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Please_follow_the_setps_to_setup_backend_0"></a>Please follow the setps to setup backend</h1>
<h1 class="code-line" data-line-start=2 data-line-end=3 ><a id="Requirements_2"></a>Requirements</h1>
<ul>
<li class="has-line-data" data-line-start="3" data-line-end="4">php: ^8.1</li>
<li class="has-line-data" data-line-start="4" data-line-end="5">mysql</li>
<li class="has-line-data" data-line-start="5" data-line-end="7">composer</li>
</ul>
<h1 class="code-line" data-line-start=7 data-line-end=8 ><a id="Steps_7"></a>Steps</h1>
<pre><code> cp env.example .env
 
 create a database for testing in mysql and use that creds in .env file

 php artisan migrate

 php artisan db:seed
 
 composer install
 
 php artisan server
</code></pre>
<p class="has-line-data" data-line-start="16" data-line-end="17">That pretty  much all.</p>
