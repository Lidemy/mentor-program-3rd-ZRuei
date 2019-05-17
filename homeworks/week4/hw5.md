##  請以自己的話解釋 API 是什麼

API 為 Application Programming Interface 的簡稱，用來作為資料交換的媒介。它提供了開發者串接網路資源的窗口。API 就像麵包機的操作面板，可以根據開發者的需求做出各種他喜歡的麵包；API 文件就像是這台麵包機的說明書，為了取得某種麵包，說明書記錄了所需要的食材，我們可以用現有的工具，配合食材和做法，將麵團投入麵包機，利用麵包機的電力、溫度、揉麵功能，獲得麵包。開發者若想取用某個大型網站的資訊、功能來協助自己的軟硬體開發，或是透過 API 取得大型網站的特定功能（例如，Google Map、Facebook 登入等）改善或增進與使用者的互動，就可以利用該網站所釋出的API文件，依照所制定的規範，一步步取得特定資訊。當然，麵包機的功率、溫度、攪拌功能都是家電公司已經規定好的，大多數時候，他們沒提供的麵包種類，比如蛋塔，我們單憑麵包機是做不出來的。

##  請找出三個課程沒教的 HTTP status code 並簡單介紹

HTTP 狀態碼大致分為五類

#### 1xx－Informational 
#### 2xx Success 成功
- 201 Created 請求 POST 成功建立資料
- 204 No Content 成功處理了請求，但沒有返回任何內容，通常用於 DELETE 成功
#### 3xx Redirection 重新導向
-  304 Not Modified
#### 4xx Client Error 用戶端錯誤
- 400 Bad Request 錯誤的請求語法，使伺服器無法辨認請求
- 401 Unauthorized 缺乏用戶憑證，而拒絕存取
- 403 Forbidden 伺服器已理解請求，但拒絕處理，用戶沒有訪問這個資源的權限
- 409 Conflict 請求存在衝突無法而無法處理請求，例如，PUT 文件版本與 Server 目前的版本發生衝突時
#### 5xx Server Error 伺服器錯誤
- 500 Internal Server Error 內部伺服器錯誤
- 504 Gateway Timeout 未在時限內收到上游伺服器的回應，而無法完成請求

**參考連結**
[HTTP Status Codes](https://www.restapitutorial.com/httpstatuscodes.html)
[NotFalse 技術客－HTTP 狀態碼 (Status Codes)](https://notfalse.net/48/http-status-codes)


## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。

####  API文件：找餐廳 

url: http://www.smellsgood.com


| METHOD | 說明             | PATH             | 參數                    |
| :----- | :--------------- | :--------------- | :-------------------- |
| GET    | 取得所有餐廳資訊 | /restaurants     | _limit: 限制回傳資料數量   |
| GET | 取得單一餐廳資訊 | /resturants/:id |  |
| POST | 新增餐廳資訊 | /restaurants | id: 餐廳編號<br/>name: 餐廳名稱<br/>add: 餐廳地址<br/>tel: 餐廳電話<br/>time: 營業時間 |
| DELETE | 刪除餐廳 | /resturants/:id |  |
| PATCH | 修改餐廳資訊 | /resturants/:id | id: 餐廳編號<br/>name: 餐廳名稱<br/>add: 餐廳地址<br/>tel: 餐廳電話<br/>time: 營業時間 |

1. GET 取得所有（特定）餐廳資訊


```
get http://www.smellsgood.com/restaurants
```
###### 只取得前三筆資料
```
get http://www.smellsgood.com/restaurants?_limit=3
```

###### 回傳
```json=
[
    { "id":"1",
      "name":"九鼎麻油雞",
      "add":"taiwan",
      "tel":"0966791571",
      "time":"11:30-21:30"},          
     { "id":"2",
       "name":"O'somewish",
       "add":"taiwan",
       "tel":"0222040590",
       "time":"07:30-15:00"},          
     {"id":"3", 
      "name":"美香炭烤吐司",
      "add":"taiwan",
      "tel":"0222019802",
      "time":"06:30-14:00"} 
]
```

2. GET 取得單一餐廳資訊
```js
get http://www.smellsgood.com/restaurants/id
```

###### 範例 
```js
get http://www.smellsgood.com/restaurants/2
```

###### 回傳
```json=
 [
    {"id":"2",
      "name":"O'somewish",
       "add":"taiwan",
       "tel":"0222040590",
       "time":"07:30-15:00"
     }
]
```

3. POST 新增餐廳資訊
```
post http://www.smellsgood.com/restaurants
```
+ 為使 request 有效，必須指定 name、add、tel 三個參數

###### 回傳

```json=
[
    {"id":"4",
     "name":"活力早餐",
     "add":"taiwan",
     "tel":"0222056896",
     "time":"06:30-12:00"
    }
]
```

4. DELETE 刪除餐廳
```js
delete http://www.smellsgood.com/restaurants/id
```

5. PATCH 修改餐廳資訊

```javascript
patch http://www.smellsgood.com/restaurants/id
```
* 為使 request 有效，至少必須指定 name、tel、add、time 參數中一個

###### 範例 
```js
patch http://www.smellsgood.com/ /restaurants/1
```

###### 回傳
```json=

[
    {"id":"1",
    "name":"九鼎麻油雞",
    "add":"taiwan",
    "tel":"0966791571",
    "time":"11:30-21:30 週日公休"}
]
```