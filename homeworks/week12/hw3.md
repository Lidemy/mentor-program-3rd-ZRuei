## 請說明 SQL Injection 的攻擊原理以及防範方法

在網頁中的輸入欄，例如登入頁面的帳號、密碼欄中輸入夾帶 SQL 指令的字串，改變了原本的 SQL 指令，使攻擊者在未授權的狀況下達成竊取、竄改、破壞資料庫、繞過登入等攻擊行為，利用語法結構來變更語意，例如 MySQL 指令是以引號包裹，且可以使用 ```--``` 作為註解，如在帳號輸入處寫入： ```' or 1=1 -- '``` 就是利用這個特性，使 SQL 檢索的篩選條件無效（因為 1=1 永遠為 True），並且註解後方指令，攻擊者在不需要登入的狀態下就能得到全部資料，甚至無需密碼。

通常使用 Prepared statment 來避免這種漏洞。它會預先用 ```$conn->prepare``` 設置好 SQL 指令，並且將變數以「？」替代，再利用 ```bind_param``` 綁定參數的資料類型以及變數名稱，在 SQL 指令執行時才帶入執行。如此一來使用者輸入的內容會經過編譯才帶入 SQL 指令，無法直接改變指令，資料類型也會被限制，降低了 SQL Injection 的機會。 

**範例**

修改前

```php
  $sql = "INSERT INTO comments (nickname, content, id) VALUES ($nickname, $content, $id)"
  $result = $conn->query($sql);
```
修改後

```php
  $sql = "INSERT INTO comments (nickname, content, id) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $nickname, $content, $id);
  $stmt->execute();
```



## 請說明 XSS 的攻擊原理以及防範方法

Cross-site scripting 利用網頁安全漏洞，在使用者能輸入文字的地方，例如留言板、登錄頁面、搜尋框列等，將惡意程式寫入網頁，使網頁無法正常運作、導向釣魚網頁或竊取資料庫資料及使用者隱私。這類攻擊通常是使用 HTML 的 ```<script>``` 標籤將 JavaScript 程式碼帶入，使惡意程式碼被當成正常 HTML 運行，進而控制、或破壞網頁元素，或竊取資料庫資訊。

避免 XSS 的主要方式就是過濾字串和 encoding，確保特殊字元（例如 ```<、>、?、&、%、(、)``` 等會在程式語言中用到的符號）被限制或以純文字的方式被讀取。最常使用的方始便是 escape 跳脫，例如 PHP 的```htmlentities()``` 或是 ```htmlspecialchars()``` 將輸入的文字進行編碼，使之以純文字的形式顯示在網頁上。



## 請說明 CSRF 的攻擊原理以及防範方法

Cross Site Request Forgery，跨站請求偽造，利用使用者的身份進行未經授權的操作或傳送請求。為求方便，當我們登入某些常用的網頁後，該網站會回傳一組 session ID 作為辨識，並且這組 session ID 能持續有效一段時間，直到使用者登出或將瀏覽器關閉，但事實上這組辨別碼只能夠確認請求來自同一瀏覽器，不能確保請求確實來自該使用者，跨站請求偽造就是利用這個漏洞，進行 GET 或 POST的請求偽造，只要使用者在 session ID 有效的期間，不經意的點選攻擊者準備的網址、自動開啟了包含惡意請求的圖片，或提交了攻擊者準備的 ```form```，攻擊者就能以使用者的身分發送請求。

CSRF 必須由 server 端來防範。從 client 端發送的請求必須要有 session ID 以外的授權資料，而且這組資料只有 server 或使用者知道，常用的像是 token。token 是由 sever 端在接收使用者請求時隨機自動產生並存在 session 的一組亂碼，並且在 response 時一併存放在 client 端 ```form``` 裡面的隱藏欄位，這是攻擊者無法取得的資訊，因此當請求被發出時，server 只要比對 token 是否存在或正確便能決定要不要接受請求。另一個方法則是使用驗證碼、驗證圖形或驗證簡訊，因為攻擊者無法得知答案，自然無法攻擊。