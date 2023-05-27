**Malware Analysis date: 20230527**<br>
**Malware Spotted on early 202305**<br>
**Type : Wordpress Backdoor**<br>
**Author: Cedric Moris Kelly**<br>
<br>
*DISCLAIMER: This set of files is intended for malware analysis purposes only and should not be used for illegal activities.*

* Starts in /index.php at the root of a Wordpress install.
* The file loads any PHP actions from https?://rkgqvfgevpgrg.bayvarebhgre.klm domain.
* I need more time to investigate, but so far, the actions seem to be persistent through the $_COOKIE globals and can be executed at various entry points in the app directories by other files spread everywhere with random names (some are included in /backdoors_listener).

**GPT4 auto generated explanation about index.php:**
1. The script starts with the opening `<?php` tag.
2. It sets the time limit for script execution to 3600 seconds (1 hour) using `@set_time_limit(3600)`. This ensures that the script won't time out if it takes a long time to execute.
3. It disables the ability for the user to abort the script using `@ignore_user_abort(1)`. This ensures that the script continues to run even if the user closes the browser or terminates the request.
4. It assigns the URL-encoded string '%72%6B%71%76%66%67%65%76%70%67%72%67%2E%62%61%79%76%61%72%65%62%68%67%72%65%2E%6B%6C%6D' to the variable `$xmlname`.
5. The script defines a function `drequest_uri()` that retrieves the current request URI.
6. It checks if the current connection is using HTTPS or HTTP and sets the `$http` variable accordingly.
7. The script URL-encodes the current request URI and assigns it to the variable `$duri`.
8. It applies the `str_rot13` function and URL-decodes the value stored in `$xmlname` and assigns it to the variable `$goweb`.
9. The script defines a function `is_https()` to check if the connection is using HTTPS.
10. It retrieves the value of the `HTTP_HOST` and `HTTP_ACCEPT_LANGUAGE` headers and assigns them to the variables `$host` and `$lang`, respectively. The value of `$lang` is then URL-encoded.
11. It checks if the `HTTP_REFERER` header is set and assigns its value to the variable `$urlshang`, which is also URL-encoded.
12. It computes the SHA-1 hash of the SHA-1 hash of the `pd` query parameter (if present) and assigns it to the variable `$password`.
13. If the computed `$password` matches the value 'f75fd5acd36a7fbd1e219b19881a5348bfc66e79', the script performs various actions based on the `mapname` and `action` query parameters.
14. The script defines a function `ping_sitemap($url)` that pings the provided URLs and returns the response.
15. It defines a function `disbot()` that checks if the current user agent is a search engine bot.
16. The script defines a function `doutdo($url)` that makes an HTTP request to the specified URL using cURL if available, or falls back to `file_get_contents` if cURL is not available.
17. It constructs a URL `$web` with various query parameters.
18. The script retrieves the content from the URL `$web` using the `doutdo` function and assigns it to the variable `$html_content`.
19. It checks the content of `$html_content` for specific strings and performs different actions based on the matching conditions.
20. The script ends with the closing `?>` tag and is immediately followed by another `<?php` tag, which starts a new PHP block.
