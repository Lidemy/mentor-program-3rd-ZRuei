## 什麼是 DOM？

當瀏覽器載入一個網頁時，會由上而下解析網頁所夾帶的 HTML，而這個文件以文件物件模型 Document Object Model（簡稱為 DOM）組織呈現，是一種樹狀文件結構化的表示法，簡單的說就是 HTML 的資料地圖，每個在 HTML 文件中寫的標籤都是一個節點，而這地圖主要有四大分類：Document 代表文件本身，向下延伸 Element、Text、Attribute，從標籤到文字，在 HTML 文件中形成一個個節點，透過 DOM 所提供的 API 可以監聽節點相關的事件、操作 DOM 的內容、結構以及樣式。 



## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？

一般狀況下，事件傳遞順序是根據 DOM 由上而下，也就是從 root 往 target，再一路逆向往上回傳；實際藉由監聽目標事件 event target，事件監聽的 event phase 從 root 到 target 的階段稱為 capturing phase 捕獲階段，再從 target 回傳 root 稱為 bubbling phase 冒泡階段，也就是「先捕獲再冒泡」的順序，而在 target 本身則是 target phase，無分別捕獲或冒泡。

當目標結點與其他節點有階層關係時，事件傳遞順序就可能會影響網頁的呈現或功能。如果在所有節點上都放置點擊事件監聽，便會發現子代被點擊時，同時一連串親代的事件也被觸發。

此時可以透過事件監聽的 event phase 來觀察事件順序，確實發現當目標節點被點擊時，都會先從根節點一路向下傳遞（捕獲），直到目標後，原路返回根節點（冒泡）。先捕獲後冒泡的順序無論在哪種事件下都不會改變，而要哪一個路徑執行我們希望的函式，則可以透過事件監聽的第三個參數來決定。當不指定時，預設為 false，也就是在冒泡階段執行，因此當點擊目標節點，雖然捕獲階段一樣是由上而下進行，但我們無法觀察，直到他觸發目標，並原路一一往外傳遞，在冒泡階段執行函式，因此我們會觀察到執行順序由子層開始、再傳遞到上層、上上層。相反的，如果我們將參數指定為 true，便可以在補獲階段執行函式，造成先由上層開始動作，依序傳入到目標節點的效果。

結論：由上而下，先捕獲後冒泡，觸發事件監聽的順序由第三參數決定，默認是冒泡。捕獲一直都在，只是我們通常看不到。



## 什麼是 event delegation，為什麼我們需要它？

event delegation 指的是事件代理，網頁的運行是透過許多事件觸發得以和使用者互動，例如最常見的事件：點擊 click，使用者點擊網頁上的任何文字、圖片、按鈕等，都會觸發事件，javascript 或其他可以操作 DOM API 的程式語言，可以透過監控這些事件，來決定事件發生後應該做什麼處理，像是彈出另一個分頁、圖像放大、確認訂單等等。

由於網頁上的元素很多，且常常會需要動態新增、移除元素，倘若逐一為元素掛上監聽 Event Listener，會變得難以維護及管理。透過事件傳遞的特性，將監聽掛附在上層元素，可以統一管理下層元素的事件。

像是中華電信的客服，使用者只需要打 800，客服會依照來電者的需求，再轉接至相關人員，執行相應的處理，而不需要記 10 支不同的電話來處理不同的業務。




## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？

`event.preventDefault()` 和 `event.stopPropagation()` 從網頁看起來都是阻止某個動作發生，但原理並不相同。`event.preventDefault()` 阻止元素的默認行為，像是 `<a>`、`<input>` 等元素都有默認行為，當被觸發時自動執行，使用 `event.preventDefault()` 可以使他不動作，例如點擊超連結並不跳轉頁面、點擊提交也不會提交。

但 `event.preventDefault()` 並不影響事件傳遞，即使該元素停止預設行為，他依然會向上冒泡至上層，如果上層綁定了其他事件，依然能夠作用。`event.stopPropagation()` 則是阻止事件傳遞繼續發生，當事件傳遞到目標，觸發本身事件後，便停止了傳遞，因此不會冒泡至後續的所有事件。

假設利用 HTML 畫了一個同心圓，由外而內而分別是大圓、小圓，小圓內有超連結
```html
  <div class="outer">大圓
      <div class="inner">小圓
          <a href="https://google.com" target="_blank" >點我超連結</a>
      </div>  
  </div>
```

每個元素都放置點擊事件的監聽，一旦被點擊就改變背景顏色。

```javascript
document.querySelector('a').addEventListener('click', (e)=> {
  document.querySelector('a').style.background = 'yellow'
})

document.querySelector('.inner').addEventListener('click',(e)=> {
  document.querySelector('.inner').style.background = 'red'
})

document.querySelector('.outer').addEventListener('click',(e)=>{
  document.querySelector('.outer').style.background = 'blue'
})
```

如果 `<a>` 加上 `event.preventDefault() ` 時網頁效果只有連結失效，但超連結、大小圓的背景變色效果依舊，表示事件傳遞依然存在。

但是當寫入的是 `event.stopPropagation()` 連結的轉跳頁面和顏色改變會正常發生，但大小圓的顏色不變，因為事件傳遞的冒泡停止在超連結身上了。

