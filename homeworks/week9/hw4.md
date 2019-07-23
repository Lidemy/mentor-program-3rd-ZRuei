## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

VARCHAR 可限制輸入字元數；TEXT 用於儲存較長的文字內容，透過適當的規劃欄位型態，可以增進檢索效率，節省空間容量。



## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？

1. Cookie 是指在瀏覽網站後，網站儲存在用戶端的部分資料片段（小型文字檔案），包括登入資訊及狀態、瀏覽資訊、網站偏好設定等，方便使用者再一次造訪此網站時，辨別用戶身份（或說同一個瀏覽器），以快速存取相關資料。

2. 收到 HTTP Requesst 時，伺服器可以傳送一組帶有 Set-Cookie Hearder 的 Response 給瀏覽器，可以註明 Cookie 有效及終止時間、限制不傳送至特定網域。Set-Cookie 共有以下幾種基本的屬性可以設定：

   ```http
   Set-Cookie: cookie-name=cookie-value（名稱）; expires=date（過期時間）; path=path（路徑）; domain=domain（網域）; secure（是否為安全連線）
   ```

   瀏覽器收到 Set-Cookie 指令後，將 Cookie 的值存在「存放區」內，當瀏覽器再次發出請求到伺服器時，會開始比對存放區內是否有對應的 Cookie，如果有的話，就會包含在 HTTP Requesst 的 Header 中傳送給伺服器。



## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

1. 登入不安全，資料庫要是被偷走帳號密碼沒有任何保護。
2. 登入太容易，可以每次都隨意輸入亂數註冊並登入。
3. 未限制輸入類型，或許可透過 Script 標籤插入惡意程式？

